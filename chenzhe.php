<?php

require "vendor/autoload.php";

use mcframework\MCUtils\MCCommonUtil;
use mcframework\Exceptions\MCException;

echo MCException::testException();
$test = new MCCommonUtil();
echo $test->testUtil();
