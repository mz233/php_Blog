<?php
include 'zhuceData.php';
$data = new DataBase;
$data->connection("localhost","root","12345678");
$data->useDatabase("mydb");
if(!$_POST['username1']){
    echo "用户名不能为空";
}elseif(!$_POST['password1']){
    echo "密码不能为空";
}elseif($_POST['password1']!=$_POST['password11']) {
    echo "两次输入密码不一致";
}else{
    $data->Insert($_POST['username1'], $_POST['password1'], $_POST['email'],'myguest4');
    header("Location:http://www.mz.com/userLogin.php");
}
?>