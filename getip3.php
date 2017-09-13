<?php
include 'zhuceData.php';
//从请求url地址中获取q参数
$q=$_GET["q"];
$q=trim("$q");
$sql = "select username from myguest4";

$data = new DataBase;
$data->connection("localhost","root","12345678");
$data->useDatabase("mydb");
$result = $data->getConn()->query($sql);

$a[]='';
$h=0;
while($row=$result->fetch_assoc()){
    $a[$h++]=$row['username'];
}


//查找是否有匹配值
$hint="";
$response="";
if(strlen($q)>0){
        for($i=0; $i<count($a); $i++) {
            if (strtolower($q) == strtolower($a[$i])) {
                $hint = "该用户名已注册";
            }
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