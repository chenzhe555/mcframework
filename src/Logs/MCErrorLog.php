<?php
/**
 * Created by PhpStorm.
 * User: 陈哲是个好孩子
 * Date: 2017/12/28
 */

namespace mcframework\mclogs;

class MCErrorLog {
    private static $_instance = null;

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self))
        {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function error(\Error $error)
    {
        try {
            $this->logError($error);
        } catch (\Exception $exception) {
            //不处理，保证不影响主流程
        } catch (\Error $error) {
            //不处理，保证不影响主流程
        }
    }

    private function logError(\Error $error)
    {
        \Yii::error(MCLogsUtil::getErrorInfoType1("MCLog_Error",$error->getMessage(),$error->getCode(),$error->getFile(),$error->getLine()));
    }
}
