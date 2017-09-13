<?php
    include 'zhuceData.php';
    $data = new DataBase;
            $data->connection("localhost","root","12345678");
            $data->useDatabase("mydb");
            $name = $_COOKIE["username"];
            $comment=$_POST['comm'];
            $filename=$_POST['wen'];
            echo "$filename";
            $m=date('Y-m-d H:i:s',time()+21600);
            $sql = "insert into mycomment(username,comment,filename,commenttime)values('$name','$comment','$filename','$m')";
            $data->getConn()->query($sql);
            header("location:http://www.mz.com/otherBlog.php?filename=$filename");
?>