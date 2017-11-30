<?php
/**
 * Created by PhpStorm.
 * User: Maple.xia
 * Date: 23/08/2017
 * Time: 2:19 PM
 */

namespace App\Http\Controllers;

use App\Helper\Common\BashHelper;

/**
 * 调试台
 * Class DebugController
 * @package App\Http\Controllers
 */
class DebugController{

    public function index(){

        /*$server_name = 'adl.rel';
        $project_name = 'adl_rel';
        $path = 'projects/adl_rel/public';
        $script = 'VHOST="# '. $project_name .'\\n<VirtualHost *:80>\nDocumentRoot \"/Users/summerway/workSpace/DevDock/'. $path .'\"ServerName '. $server_name .'
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


        dd($script);*/
        return BashHelper::removeVirtualHost('短信收发系统');
    }
}