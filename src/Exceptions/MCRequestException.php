<?php
/**
 * Created by PhpStorm.
 * User: 陈哲是个好孩子
 * Date: 2017/12/29
 */

namespace mcframework\exceptions;

class MCRequestException extends MCBaseException {

    public function getName()
    {
        return "MCParameterException";
    }

    //请求的URL地址
    private $requestUrl;

    //请求的参数
    private $requestParam;

    /*
     * 处理RPC调用中的错误，要求业务层必须传入5个参数
     * */
    public function __construct5($message = "", $code = 0,Throwable $previous = null,$requestUrl = "",$requestParam = [])
    {
        parent::__construct($message, $code);
        $this->requestUrl = $requestUrl;
        $this->requestParam = $requestParam;
    }

    public function getRequestUrl() {
        return $this->requestUrl;
    }

    public function getRequestParam() {
        return $this->requestParam;
    }
}