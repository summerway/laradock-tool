<?php
/**
 * Created by PhpStorm.
 * User: Maple.xia
 * Date: 09/11/2017
 * Time: 5:27 PM
 */

namespace App\Helper\Common;

use App\Helper\Api\ApiException;
use App\Helper\Config\ConfigHelper;
use App\Helper\Config\Lan;
use App\Lib\Response;
use Mockery\Exception;

/**
 * 上传类
 * Class UploadHelper
 * @package App\Helper\Common
 */
class UploadHelper{
    use Response;

    /**
     * 保存
     * @param string $key 文件key值
     * @param string $path 文件径路
     * @return string
     * @throws \Exception
     */
    public static function storage($key,$path = ""){
        $hasFile = request()->hasFile($key);
        if($hasFile){
            $file = request()->file($key);
        }else{
            throw new \Exception("上传文件出错",self::$code_parameter_error);
        }

        $config = \Config::get('filesystems.default','uploads');
        switch ($config){
            case 'qiniu':   //七牛上传 todo 上线修改七牛相关配置
                $fileName = md5($file->getClientOriginalName() . time())
                    . '.' . $file->getClientOriginalExtension();

                \Storage::disk($config)->put($fileName, \File::get($file->path()));

                $path = \Storage::disk($config)->getDriver()->downloadUrl($fileName);
                break;
            case 'local':   //本地上传
            case 'public':
            default:
                $fileName =  (empty($path) ? '' : $path.'/') .md5($file->getClientOriginalName() . time())
                . '.' . $file->getClientOriginalExtension();

                \Storage::disk($config)->put($fileName, \File::get($file->path()));

                $path = '/storage/' . $fileName;
                break;
        }

        return $path;
    }

    /**
     * 移除上传文件
     * @param string $file 文件名
     * @return bool
     */
    public static function remove($file){
        $path = storage_path('app/public/'.$file);
        if(\File::exists($path)){
            return \File::delete($path);
        }
        return true;
    }
}