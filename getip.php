<?php
    include 'zhuceData.php';
    //从请求url地址中获取q参数
    $q=$_GET["q"];
    //$q=trim("$q");


    $data = new DataBase;
    $data->connection("localhost","root","12345678");
    $data->useDatabase("mydb");
    $sql = "select email from myguest4";
    $result = $data->getConn()->query($sql);
    $a[]='';
    $h=0;
    while($row=$result->fetch_assoc()){
        $a[$h++]=$row['email'];
    }


    //查找是否有匹配值
    $hint="";
    $response=strtolower($q);
    if(strlen($q)>0){
        for($i=0; $i<count($a); $i++) {
            if (strtolower($q) == strtolower($a[$i])) {
                $hint = "该邮箱已注册";
            }
        }
        if(!preg_match("/^[a-zA-Z0-9 ]11$/",$q) and !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$q)){
            $hint="邮箱格式不正确";
        }
    }
    if($hint==""){
        $response=" ";
    }
    else {
        $response = $hint;
    }
    echo $response;

?>