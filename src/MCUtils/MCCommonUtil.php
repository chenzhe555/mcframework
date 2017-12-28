<?php
/**
 * Created by PhpStorm.
 * User: 陈哲是个好孩子
 * Date: 2017/12/28
 */

namespace mcframework\mcutils;

use mcframework\exceptions\MCParameterException;

class MCCommonUtil {

    private static $KeyValueEmpty = 10000100;

    //checkIsSet:校验数组对象中的key对应是否有设置值
    //checkEmpty:校验数组对象中的key对应是否有值,"" 0 0.0 "0" null false [] 声明了没设置值 都认为值不存在

    /*
     * 校验数组对象中的key对应是否有设置值
     * $params 校验数据
     * $keys, 校验参数，数组形式，以逗号隔开  [test1,test2,test3]
     * */
    public static function checkIsSet($params,$keys)
    {
        if (!empty($params) && is_array($params))
        {
            foreach ($keys as $key)
            {
                if (!isset($params[$key]))
                {
                    throw new MCParameterException($key."为空",self::$KeyValueEmpty);
                }
            }
        }
    }

    /*
     * 校验数组对象中的key对应是否有值,"" 0 0.0 "0" null false [] 声明了没设置值 都认为值不存在
     * $params 校验数据
     * $keys, 校验参数，数组形式，以逗号隔开  [test1,test2,test3]
     * */
    public static function checkEmpty($params,$keys)
    {
        if (!empty($params) && is_array($params))
        {
            foreach ($keys as $key)
            {
                if (empty($params[$key]))
                {
                    throw new MCParameterException($key."为空",self::$KeyValueEmpty);
                }
            }
        }
    }

    /*
     * 比较版本号
     *
     * */
    public static function compareNumber($version1,$version2)
    {
        //以.号隔开获取数值数组
        $version1_arr = explode(".",$version1);
        $version2_arr = explode(".",$version2);
        //以个数最大为准
        $maxNum = max(count($version1_arr),count($version2_arr));
        for ($i = 0;$i < $maxNum;++$i)
        {
            //没有值补默认值0
            $v1 = isset($version1_arr[$i]) ? $version1_arr[$i] : 0;
            $v2 = isset($version2_arr[$i]) ? $version2_arr[$i] : 0;
            if ($v1 > $v2) return 1;
            if ($v1 < $v2) return -1;
        }
        return 0;
    }

}