<?php
include 'zhuceData.php';
    $filename = $_GET["file"];
    $data = new DataBase;
    $data->connection("localhost","root","12345678");
    $data->useDatabase("mydb");
    $sql= "delete from myfile1 where filename= '$filename'";
    $data->getConn()->query($sql);
    unlink ("D:\\temp1\\$filename");
    $sql= "delete from mycomment where filename= '$filename'";
    $data->getConn()->query($sql);
    header("location:http://www.mz.com/blogFrame.php");
?>