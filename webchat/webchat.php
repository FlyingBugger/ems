<?php
session_start();
session_unset();
header("Content-type: text/html; charset=utf-8");
$appid='wx6f1fa092a4f5e263';
$appsecret='51eb6b33ee16bfa2e213c037f9d4c4f8';
$uri="http://weixin.scnjnews.com/kaoshi/webchat/webchat.php";
$scope='snsapi_userinfo';
$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$uri&response_type=code&scope=$scope&state=STATE#wechat_redirect";
if(!$_GET){
header("Location:$url");
exit;
}
$code=$_GET['code'];
$_SESSION['code']=$code;
$arr=range(1,13);
shuffle($arr);
$math='0.';

foreach($arr as $values)
{
	$math.=$values;
}
$website="http://weixin.scnjnews.com/kaoshi/index.php?user-phone-login-webchat";
header("Location:$website");

