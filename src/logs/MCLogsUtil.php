<?php
/**
 * Created by PhpStorm.
 * User: 陈哲是个好孩子
 * Date: 2017/12/28
 */

namespace mcframework\mclogs;

class MCLogsUtil {
    /*
     * 返回基本错误信息
     * */
    public static function getErrorInfoType1($type,$msg,$code,$file,$line) {
        return json_encode([
            "type"      => $type,
            "msg"       => $msg,
            "code"      => $code,
            "file"      => $file,
            "line"      => $line
        ]);
    }

    /*
    * 返回基本错误信息
    * */
    public static function getErrorInfoType2($type,$msg,$code,$file,$line,$rpcMsg,$rpcCode,$rpcUrl,$rpcParam) {
        return json_encode([
            "type"      => $type,
            "msg"       => $msg,
            "code"      => $code,
            "file"      => $file,
            "line"      => $line,
            "rpcMsg"    => $rpcMsg,
            "rpcCode"   => $rpcCode,
            "rpcUrl"    => $rpcUrl,
            "rpcParam"  => json_encode($rpcParam),
        ]);
    }
}
