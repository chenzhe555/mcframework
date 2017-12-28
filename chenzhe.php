<?php

require "vendor/autoload.php";

use mcframework\exceptions\MCBaseException;
use mcframework\exceptions\MCParameterException;
use mcframework\exceptions\MCRPCException;

use mcframework\mcutils\MCCommonUtil;


//Exceptions测试代码

try {
//    throw new MCParameterException("chenzhe",72311101);
//    throw new MCRPCException("msg",101,null,"rpcMsh",202,"rpcUrl",["aa" => "cccc"]);
} catch (MCParameterException $exception) {
    echo $exception->getName() . " ***  " . $exception->getMessage() . " ***  " . $exception->getCode() . "\n";
} catch (MCRPCException $exception) {
    echo $exception->getName() . " ===  " . $exception->getMessage() . " ===  " . $exception->getCode() . " ===  " . $exception->getRPCMessage() . " ===  " . $exception->getRPCCode() . " ===  " . $exception->getRPCUrl() . " ===  " . $exception->getRPCParam() . "\n";
} catch (MCBaseException $exception) {
    echo $exception->getName() . " ^^^  " . $exception->getMessage() . " ^^^  " . $exception->getCode() . "\n";
}


//MCUtils测试代码

try {
//    MCCommonUtil::checkIsSet(["sa" => "asd"],["chenzhe"]);
   echo MCCommonUtil::compareNumber("1.0.1.2","1.0.2") . "\n";
} catch (MCParameterException $exception) {
    echo $exception->getName() . " ***  " . $exception->getMessage() . " ***  " . $exception->getCode() . "\n";
}