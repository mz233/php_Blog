<?php
    include 'zhuceData.php';
    $data = new DataBase;
    $data->connection("localhost","root","12345678");
    $data->useDatabase("mydb");
    //if(isset())
    if(!$_POST['username2']){
        echo "用户名不能为空";
    }elseif(!$_POST['password2']){
        echo "密码不能为空";
    }else {
        //print_r($_COOKIE);
        //$name=$_POST['username2'];
        $data->Query1("myguest4",$_POST['username2'],$_POST['password2']);
        setcookie("username", $_POST['username2'], time()+3600);
        setcookie("password", $_POST['password2'] , time()+3600);

    }

?>