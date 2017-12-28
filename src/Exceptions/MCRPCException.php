<?php
/**
 * Created by PhpStorm.
 * User: 陈哲是个好孩子
 * Date: 2017/12/28
 */

namespace mcframework\exceptions;


use Throwable;

class MCRPCException extends MCBaseException {

    //RPC调用失败之后 业务内的错误信息
    private $rpcMessage;

    //RPC调用失败之后 业务内的错误码
    private $rpcCode;

    //RPC调用地址
    private $rpcUrl;

    //RPC调用的参数信息
    private $rpcParam;

    /*
     * 处理RPC调用中的错误，要求业务层必须传入7个参数
     * */
    public function __construct7($message = "", $code = 0,Throwable $previous = null,$rpcMessage = "",$rpcCode = 0,$rpcUrl = "",$rpcParam = [])
    {
        parent::__construct($message, $code);
        $this->rpcMessage = $rpcMessage;
        $this->rpcCode = $rpcCode;
        $this->rpcUrl = $rpcUrl;
        $this->rpcParam = $rpcParam;
    }

    public function getName()
    {
        return "MCRPCException";
    }

    public function getRPCMessage() {
        return $this->rpcMessage;
    }

    public function getRPCCode() {
        return $this->rpcCode;
    }

    public function getRPCUrl() {
        return $this->rpcUrl;
    }

    public function getRPCParam() {
        return $this->rpcParam;
    }
}
