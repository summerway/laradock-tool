<?php
/**
 * Created by PhpStorm.
 * User: Maple.xia
 * Date: 24/08/2017
 * Time: 10:13 AM
 */

namespace App\Http\Controllers;

use App\Helper\Common\UploadHelper;

class UploadController extends BaseController {

    /**
     * 单张图片上传
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadPic(){
        $path = UploadHelper::storage('upload','projects');
        return $this->responseSuccess($path);
    }

    /**
     * 移除图片
     * @return \Illuminate\Http\JsonResponse
     */
    public function removePic(){
        //默认图片不处理
        if(0 == \Request::get('key')){
            return $this->responseSuccess();
        }
    }
}