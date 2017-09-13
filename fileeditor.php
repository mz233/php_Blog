<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My blog</title>
    <style>
        .header{
            background-color: #E8E8E8;
            height:30%;
            width:100%;
        }
        .set-title{
            text-align:center;
            font-size: 40px;
        }
        .tag{
            font-size: 25px;
            background-color: black;
            margin-right: 20px;
            color:white;
        }
        body{
            background-image:url('https://i.loli.net/2017/07/18/596dd5ebb8a92.jpg');
        }
        .right{
            position: fixed;
            top:0px;
            right:0px;
            width:20%;
            height:120%;
            background-color: black;
        }
        .btn1{
            position: fixed;
            top:80%;
            right:200px;
            width:30px;
            height:30px;

        }
        #photo{
            width:150px;
            height:150px;
            margin-top:40px;
            margin-left:25%;
        }
        .write{
            font-size: 24px;
            margin-left: 100px;

        }
    </style>
    <script>

        function display1(){
            document.getElementById("blog").style.display='';
        }
        function display3(){
            if(document.getElementById("right1").style.display=='none'){
                document.getElementById("right1").style.display='';
            }else{
                document.getElementById("right1").style.display='none';
            }
        }
        function display4(){
            document.getElementById("editor").style.display='block';
        }
    </script>
</head>
<body>
<div class="header">
    <div class="set-title">············</div>
    <div name="tltle1" class="set-title">My Blog</div>
    <div class="set-title">············</div>
    <div style="text-align:center">
        <span class="tag"><a style="color:white;text-decoration:none;" href="http://www.mz.com/blogFrame.php">首页</a></span>
        <a style="text-decoration: none;"href="fenlei.php" class="tag">分类</a>
        <a style="text-decoration: none;" href="guidang.php" class="tag">归档</a>
        <a style="text-decoration: none;" href="tag.php" class="tag">标签</a>
    </div>
</div>

<div class="right" id="right1" style="display: none;">
    <img id="photo" src="https://i.loli.net/2017/07/19/596ecde746c43.jpg"><br><br>
    <span style="font-size: 20px;color: white;margin-left:140px;" ><?php
        echo $_COOKIE["username"];
        ?></span><br><br>
    <span style="font-size: 18px;color: white;text-align:center;margin-left: 20px;" ><a href="blogFrame.php" style="text-decoration: none;color:black;">文章（
            <?php
            include 'zhuceData.php';
            $data1 = new DataBase;
            $data1->connection("localhost","root","12345678");
            $data1->useDatabase("mydb");
            $name1 = $_COOKIE["username"];
            echo "$name1";
            $sql1 = "select filename from myfile1 where username= '$name1'";
            $results1 = $data1->getConn()->query($sql1);
            echo $results1->num_rows;
            ?>
            ）|日志（10）|标签（5）</span>
</div>
<p style="font-size: 30px;" >我的博客:</p>

<div class="btn1" onclick="display3()">
    <img style="width:30px;height:30px;" src="https://i.loli.net/2017/07/27/5979a8e786cb8.jpg">
</div>

<?php
$filename=$_GET['filename2'];
$filename1 = "D:\\temp1\\$filename";

?>

<div id="editor" style="">
        <form method="post" action="editorWriter.php">
            <lable class="write">标题:</lable>
            <?php
            $filename=$_GET['filename2'];
            $filename1 = "D:\\temp1\\$filename";
            echo"<input style='font-size: 24px;background-color: gainsboro;' type='text' name='editortitle' value='$filename' ><br><br>";
            ?>
            <lable class="write">文章权限:</lable>
            <select style="font-size: 24px;" name="q">
                <option style="font-size: 24px;" value="">请选择</option>
                <option style="font-size: 24px;" value="private">仅自己可见</option>
                <option style="font-size: 24px;" value="public">所有人可见</option>
            </select><br><br>
            <lable class="write">分类于:</lable><input  style="font-size: 24px;" type="text" name="fenlei"><br><br>
            <lable class="write">标签:</lable><input style="font-size: 24px;" type="text" name="filetag"><br><br>
            <lable class="write">内容:</lable><br>
            <textarea  class="write" name="editor" rows="70" cols="60">
                <?php

                $file = fopen("$filename1", 'r');
                while (!feof($file)) {
                    //echo iconv('gb2312', 'utf-8', fgets($file)) . "<br>";
                    //echo iconv('utf-8', 'gb2312', fgets($file)) . "<br>";
                    echo fgets($file);
                }
                ?>
            </textarea><br>
            <br><br><br>
            <input class="write"type="submit" value="保存">
        </form>
</div>

</body>
</html>