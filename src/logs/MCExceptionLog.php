<?php
/**
 * Created by PhpStorm.
 * User: 陈哲是个好孩子
 * Date: 2017/12/28
 */


namespace mcframework\mclogs;

use mcframework\exceptions\MCBaseException;
use mcframework\exceptions\MCParameterException;
use mcframework\exceptions\MCRPCException;
use mcframework\exceptions\MCRequestException;

class MCExceptionLog {
    private static $_instance = null;

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
        {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /*
     * 打印 Exception 的信息，输出文件地址在log的 file->logFile配置
     * */
    public function error(\Exception $exception) {
        if ($exception instanceof MCBaseException)
        {
            $this->handleBaseException($exception);
        }
        else
        {
            $this->handleException($exception);
        }
    }

    /*
     * 处理自定义异常
     * */
    private function handleBaseException(MCBaseException $exception) {
        try {
            $exception_name = $exception->getName();
            if ($exception_name == "MCParameterException")
            {
                $this->logParameterException($exception);
            }
            elseif ($exception_name == "MCRPCException")
            {
                $this->logRPCException($exception);
            }
            elseif ($exception_name == "MCRequestException")
            {
                $this->logRequestException($exception);
            }
            else
            {
                $this->logBaseException($exception);
            }
        } catch (\Exception $exception) {
            //不处理，保证不影响主流程
        } catch (\Error $error) {
            //不处理，保证不影响主流程
        }


    }

    /*
     * 处理非自定义异常
     * */
    private function handleException(\Exception $exception) {
        $this->logException($exception);
    }


    /*
     * 打印BaseException类型的信息
     * $type 打印类型 目前只支持error
     * */
    private function logException(\Exception $exception,$type = "error") {
        if ($type == "error")
        {
            \Yii::error(MCLogsUtil::getErrorInfoType1("MCLog_Exception",$exception->getMessage(),$exception->getCode(),$exception->getFile(),$exception->getLine()));
        }
    }

    /*
     * 打印BaseException类型的信息
     * $type 打印类型 目前只支持error
     * */
    private function logBaseException(MCBaseException $exception,$type = "error") {
        if ($type == "error")
        {
            \Yii::error(MCLogsUtil::getErrorInfoType1("MCLog_BaseException",$exception->getMessage(),$exception->getCode(),$exception->getFile(),$exception->getLine()));
        }
    }

    /*
     * 打印ParameterException类型的信息
     * $type 打印类型 目前只支持error
     * */
    private function logParameterException(MCParameterException $exception,$type = "error") {
        if ($type == "error")
        {
            \Yii::error(MCLogsUtil::getErrorInfoType1("MCLog_ParameterException",$exception->getMessage(),$exception->getCode(),$exception->getFile(),$exception->getLine()));
        }
    }

    /*
     * 打印RPCException类型的信息
     * $type 打印类型 目前只支持error
     * */
    private function logRPCException(MCRPCException $exception,$type = "error") {
        if ($type == "error")
        {
            \Yii::error(MCLogsUtil::getErrorInfoType2("MCLog_RPCException",$exception->getMessage(),$exception->getCode(),$exception->getFile(),$exception->getLine(),$exception->getRPCMessage(),$exception->getRPCCode(),$exception->getRPCUrl(),$exception->getRPCParam()));
        }
    }

    private function logRequestException(MCRequestException $exception,$type = "error") {
        if ($type == "error")
        {
            \Yii::error(MCLogsUtil::getErrorInfoType3("MCLog_RequestException",$exception->getMessage(),$exception->getCode(),$exception->getFile(),$exception->getLine(),$exception->getRequestUrl(),$exception->getRequestParam()));
        }
    }
}