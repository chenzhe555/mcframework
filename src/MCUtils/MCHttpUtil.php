<?php
/**
 * Created by PhpStorm.
 * User: 陈哲是个好孩子
 * Date: 2017/12/28
 */

namespace mcframework\mcutils;

class MCHttpUtil {

    /*
     * 构建网络请求成功结果
     * */
    public static function buildSuccessResult($param = []) {
        return [
            "ret" => 1,
            "data" => $param
        ];
    }

    /*
     * 构建网络请求失败结果
     * */
    public static function buildFailResult($msg = "",$code = 0) {
        return [
            "ret" => 0,
            "error" => [
                "msg" => $msg,
                "code" => $code
            ]
        ];
    }
}