<?php
/*
public function https_request($url, $data="")
{
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//文件流
	if ($data) {
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}
	$request=curl_exec($ch);

	$tempArr=json_decode($request,TRRUE);
	if (is_array($tempArr)) {
	  return $tempArr;
	}
	else
	{
		return $request
	}
	curl_close($ch);
}*/
var_dump($_GET);
?>