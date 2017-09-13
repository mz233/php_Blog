<?php
include 'zhuceData.php';
//从请求url地址中获取q参数
$q=$_GET["q"];
$q=trim($q);

//查找是否有匹配值
$response="";
if(strlen($q)>0){
   if(!preg_match("/^[a-zA-Z0-9 ]*$/",$q)){
       $response="密码格式不正确，必须为3-10位数字或字母";
   }
   if(strlen($q)<3){
       $response="密码位数太少，必须为3-10位数字或字母";
   }
}

echo $response;

?>