<?php
/**
 * Created by PhpStorm.
 * User: Maple.xia
 * Date: 12/10/2017
 * Time: 10:52 AM
 */

namespace App\Lib;

/**
 * api 通用返回
 * Trait ApiResponse
 * @package App\Helper\Api
 */
trait Response{

    /**
     * @var string 成功返回
     */
    public static $code_success = 200;

    /**
     * 失败返回
     */
    /** @var string 参数错误 */
    public static $code_parameter_error = 400;
    /**@var string 参数缺失*/
    public static $code_parameter_miss = 402;
    /** @var string 未授权，请求需要先登录后才能够访问 */
    public static $code_unauthorized = 401;
    /** @var string (已登录)无权限 */
    public static $code_forbidden = 403;
    /** @var string 请求的资源没有找到 */
    public static $code_no_resource_found = 404;
    /** @var string 操作错误 */
    public static $code_operate_error = 405;
    /** @var string 未知错误，服务器未知错误 */
    public static $code_system_error = 500;
    /** @var string 未知错误，服务未响应 */
    public static $code_service_no_response = 600;

    /**
     * 成功消息返回
     * @param string $message 消息
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseMessage($message){
        return $this->response($this::$code_success,$message);
    }

    /**
     * 成功返回
     * @param array $data 数据
     * @param string $message 返回信息
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($data = [], $message = ""){
        return $this->response($this::$code_success,$message,$data);
    }

    /**
     * 失败返回
     * @param int $code 错误代码
     * @param string $message 返回信息
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($code, $message = ""){
        $message && errorLog($message);
        return $this->response($code,$message);
    }

    /**
     * 统一接口返回
     * @param $code
     * @param string $message
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    private function response($code,$message = "",$data = []){
        return \Response::json(['code' => $code, 'message' => $message, 'data' => $data]);
    }
}