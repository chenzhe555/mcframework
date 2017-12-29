<?php
/**
 * Created by PhpStorm.
 * User: 陈哲是个好孩子
 * Date: 2017/12/28
 */

namespace mcframework\exceptions;

use Throwable;

class MCBaseException extends \Exception {

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        try {
            //参数个数
            $arg_num = func_num_args();
            //参数值
            $arg_values = func_get_args();

            //根据参数个数的不同，走不同的业务逻辑
            if ($arg_num == 7 || $arg_num == 5)
            {
                $method_name = "__construct".$arg_num;
                if (method_exists($this,$method_name))
                {
                    call_user_func_array([$this,$method_name],$arg_values);
                }
            }
            else
            {
                parent::__construct($message, $code, $previous);
            }
        } catch (\Exception $exception) {
            //不处理，保证不影响主流程
        } catch (\Error $error) {
            //不处理，保证不影响主流程
        }

    }

    /*
     * 修改Exception返回的异常名字
     * */
    public function getName()
    {
        return "MCBaseException";
    }

}