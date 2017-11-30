<?php
/**
 * Created by PhpStorm.
 * User: Maple.xia
 * Date: 09/05/2017
 * Time: 11:42 AM
 */

namespace {

    /************  global const *************/
    const ONE_DAY = 86400;  //一天的时间戳

    if (! function_exists('accessLog')) {
        /**
         * 访问日志
         * @param $msg
         * @return bool
         */
        function accessLog($msg = ''){
            $info = \Request::ip(). ' call open api function --'.$msg;
            Log::info($info,\Request::all());
            return true;


        }
    }

    if (! function_exists('errorLog')) {
        /**
         * 错误日志
         * @param string $msg 错误信息
         * @return bool
         */
        function errorLog($msg){
            Log::error("Ip:".\Request::ip().",send request:".\Request::fullUrl()." failed, ErrorMsg:".$msg,\Request::all());
            return true;
        }

    }

    if (! function_exists('checkEmpty')) {
        /**
         * 检查参数是否为空
         * @param $request
         * @param $keys
         * @param bool $allowNull
         * @return bool
         * @throws Exception
         */
        function checkEmpty($request,$keys,$allowNull = false){
            $result = checkMissingParam($request,$keys,$allowNull);
            if($result !== true){
                throw new Exception("参数".$result."缺失",CODE_PARAMETER_ERROR);
            }
            return true;
        }
    }

    if (! function_exists('checkMissingParam')) {
        /**
         * 检查传参丢失
         * @param array $arr 原始请求数组
         * @param array|string $keys 必须的键
         * @param bool|false $allowNull 是否允许为空
         * @return bool|string true/丢失的键名
         */
        function checkMissingParam($arr,$keys,$allowNull = false){
            if(!is_array($keys)){
                $keys = explode(',',$keys);
            }
            foreach($keys as $key){
                if($allowNull){
                    if(!isset($arr[$key])){
                        return $key;
                    }
                }elseif(empty($arr[$key])){
                    return $key;
                }
            }
            return true;
        }
    }
}


