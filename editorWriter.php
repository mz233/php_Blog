<?php
    include 'zhuceData.php';
    include 'FileClass.php';
    $data = new DataBase;
    $data->connection("localhost","root","12345678");
    $data->useDatabase("mydb");

    $a=$_POST['editortitle'];
    $content=$_POST['editor'];
    $file=new File;
    $file->filewrite($a, $content);
    $c1=$_POST['q'];
    $c2=$_POST['fenlei'];
    $c3=$_POST['filetag'];

    $con=$data->getConn();

    $sql="UPDATE myfile1 SET file_order='$c1',file_lei='$c2',file_tag='$c3' WHERE filename='$a'";
    $con->query($sql);
    header("location:http://www.mz.com/blogFrame.php");
?>