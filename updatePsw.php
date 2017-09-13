<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
    include 'zhuceData.php';
    $data = new DataBase;
    $data->connection("localhost","root","12345678");
    $data->useDatabase("mydb");
    $name = $_COOKIE["username"];
    $psw=$_POST['newPsw'];
    $sql = "update myguest4 set password='$psw'";
    if($data->getConn()->query($sql)){
        echo "改密成功"."<br>";
        echo "<a href='http://www.mz.com/blogFrame.php'>点此返回</a>";
    }

?>
</body>
</html>
