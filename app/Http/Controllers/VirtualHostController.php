<?php
/**
 * Created by PhpStorm.
 * User: Maple.xia
 * Date: 23/08/2017
 * Time: 3:56 PM
 */

namespace App\Http\Controllers;

use App\Helper\Common\BashHelper;
use App\Helper\Common\UploadHelper;
use App\Lib\Response;
use App\Models\VirtualHostModel;
use Illuminate\Http\Request;
use Illuminate\Session\CacheBasedSessionHandler;

class VirtualHostController{
    use Response;

    private $virtual_host;
    function __construct(){
        $this->virtual_host = new VirtualHostModel();
    }

    /**
     * 项目列表
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataList(Request $request){
        $page = $request['page'] > 0 ? $request['page'] -1 : 0;
        $listRows = $request['listRows'];

        $max_page = ceil($this->virtual_host->count() / $listRows);
        $receive_lists = $this->virtual_host->skip($page*$listRows)->
            take($listRows)->orderby('id','desc')->get()->toArray();

        return $this->responseSuccess(['list' => $receive_lists,'max_page' => $max_page]);
    }

    /**
     * 创建项目
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request){
        $keys = ['server_name','project_name','path','cover'];
        $post = $request->only($keys);
        try{
            $exist = $this->virtual_host->where(['server_name' => $post['server_name']])->first();
            if($exist){
                throw new \Exception('主机名已存在');
            }

            $exist = $this->virtual_host->where(['project_name' => $post['project_name']])->first();
            if($exist){
                throw new \Exception('项目已存在');
            }

            BashHelper::createVirtualHost($post['server_name'],$post['project_name'],$post['path']);
            BashHelper::createHost($post['server_name']);
            BashHelper::restartApache();

            foreach($keys as $key){
                $this->virtual_host->$key = $post[$key];
            }

            if($request['desc']){
                $this->virtual_host->desc = $request['desc'];
            }
            $this->virtual_host->save();
        }catch (\Exception $ex){
            return $this->responseError($this::$code_parameter_error,$ex->getMessage());
        }

        return $this->responseMessage('新建项目成功');
    }

    /**
     * 删除项目
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request){
        try{
            $model = $this->virtual_host->find($request['id']);
            if(!$model){
                throw new \Exception('虚拟主机不存在');
            }

            $res = UploadHelper::remove($model->cover);
            if(!$res){
                throw new \Exception('删除封面出错');
            }

            BashHelper::removeVirtualHost($model->project_name);
            BashHelper::removeHost($model->server_name);
            BashHelper::restartApache();
            $model->delete();

        }catch (\Exception $ex){
            return $this->responseError($this::$code_parameter_error,$ex->getMessage());
        }

        return $this->responseMessage('项目删除成功');
    }

    private function insertVirtualHost(){
        $server_name = 'adl.rel';
        $project_name = 'adl_rel';
        $path = 'projects/adl_rel/public';
        $script = 'VHOST="
            # '. $project_name .'
            <VirtualHost *:80>
                DocumentRoot \"/Users/summerway/workSpace/DevDock/'. $path .'\"
                ServerName '. $server_name .'
                ServerAlias '. $server_name .'
                <Directory \"/Users/summerway/workSpace/DevDock/'. $path .'\">
                    Options Indexes FollowSymLinks
                    AllowOverride All
                    Order deny,allow
                    Allow from all
                </Directory>
                ErrorLog \"logs/'. $server_name .'-error_log\"
                CustomLog \"logs/'. $server_name .'-access_log\" common
            </VirtualHost>"
                        echo "Add virtual host ";
                        sudo -- sh -c "echo \'$VHOST\' >> /Applications/MAMP/conf/apache/extra/httpd-vhosts.conf";
                    ';


        shell_exec($script);

    }

    private function insertHost($server_name){
        $script = 'SITE_DOMAIN="'. $server_name .'";
                HOSTS_LINE="127.0.0.1 $SITE_DOMAIN";
                
                echo "Add $SITE_DOMAIN to your /etc/hosts";
                sudo -- sh -c "echo \'$HOSTS_LINE\' >> /etc/hosts";';
        shell_exec($script);
    }

    private function restartApache(){
        $script = "/Applications/MAMP/Library/bin/apachectl restart";
        shell_exec($script);
    }
}