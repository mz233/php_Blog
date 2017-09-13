<?php
    include_once("zhuceData.php");//连接数据库

    $token = stripslashes(trim($_GET['token']));
    $email = stripslashes(trim($_GET['email']));
    $sql = "select * from `t_user` where email='$email'";

    $data = new DataBase;
    $data->connection("localhost","root","12345678");
    $data->useDatabase("mydb");
    $result=$data->getConn()->query($sql);
    $row = $result->fetch_assoc();


    if($row){
        $mt = md5($row['id'].$row['username'].$row['password']);
        if($mt==$token){
            if(time()-$row['getpasstime']>24*60*60){
                $msg = '该链接已过期！';
            }else{
                //重置密码...
                $msg = '请重新设置密码，显示重置密码表单，<br/>这里只是演示，略过。';
            }
        }else{
            $msg =  '无效的链接';
        }
    }else{
        $msg =  '错误的链接！';
    }
    echo $msg;
?>