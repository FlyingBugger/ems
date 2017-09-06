<?php

session_start();
set_time_limit(0);

$user_agent = $_SERVER['HTTP_USER_AGENT'];
/*
if (strpos($user_agent, 'MicroMessenger') === false) {
    // 非微信浏览器禁止浏览
    echo "HTTP/1.1 401 Unauthorized";
} else {
    // 微信浏览器，允许访问
*/
$t1 = microtime();
define("PE_VERSION",'4.0');
require "lib/init.cls.php";

$ginkgo = new ginkgo;
$ginkgo->run();


//echo $t2[0]- $t1[0];
?>