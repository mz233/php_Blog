<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
</html>


<?php

require_once "Smtp.class.php";
require_once "zhuceData.php";
//******************** 配置信息 ********************************
$email = $_POST['mail'];

$smtpserver = "smtp.163.com";//SMTP服务器
$smtpserverport =25;//SMTP服务器端口
$smtpusermail = "18202782053@163.com";//SMTP服务器的用户邮箱
$smtpemailto = $email;//发送给谁
$smtpuser = "18202782053@163.com";//SMTP服务器的用户帐号
$smtppass = "mz13152048";//SMTP服务器的用户密码,这个地方的密码并非邮箱登录密码，而是163邮箱的客户端授权密码。之前因为这个折腾了好久.....



$sql = "select password from myguest4 where email='$email'";
$data = new DataBase;
$data->connection("localhost","root","12345678");
$data->useDatabase("mydb");
$result1=$data->getConn()->query($sql);
$num=0;
$content="";
$state="";

while($row = $result1->fetch_assoc()){
    $content=$row['password'];
    $content="您的密码是".$content."请登录博客修改密码。";
    $num=1;
}

$mailtitle = "博客系统忘记密码";//邮件主题
$mailcontent = "<h1>".$content."</h1>";//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
//************************ 配置信息 ****************************
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
$smtp->debug = false;//是否显示发送的调试信息





//与数据库连接判断数据库中是否存在该邮箱
if($num==0){
    echo "该邮箱尚未注册";
}else{
    $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
}






echo "<div style='width:300px; margin:36px auto;'>";
if($state==""){
    echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";
    echo "<a href='http://www.mz.com/forgetPsw.php'>点此返回</a>";
    exit();
}else{
    echo "恭喜！邮件发送成功！！";
    echo "<a href='http://www.mz.com/userlogin.php'>点此返回</a>";

}

echo "</div>";

?>