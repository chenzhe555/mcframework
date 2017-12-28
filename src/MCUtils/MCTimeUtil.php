<?php
/**
 * Created by PhpStorm.
 * User: 陈哲是个好孩子
 * Date: 2017/12/28
 */

namespace mcframework\mcutils;

class MCTimeUtil {

    //getSecond:获取时间戳(秒)
    //getMillSecond:获取时间戳(毫秒)


    

    /*
     * 获取时间戳(秒)
     * */
    public static function getSecond() {
        return round(microtime(true));
    }

    /*
     * 获取时间戳(毫秒)
     * */
    public static function getMillSecond()
    {
        return round(microtime(true) * 1000);
    }

}
