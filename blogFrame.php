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
        .write{
            font-size: 24px;
            margin-left: 100px;

        }
        #from{

            border-right-style:dotted;
            border-bottom-style:dotted;
            border-left-style:dotted;
        }
        .body1{
            width:80%;
        }
        .right{
            position: fixed;
            top:0px;
            right:0px;
            width:20%;
            height:100%;
            background-color: black;
        }
        .btn1{
            position: fixed;
            top:80%;
            right:200px;
            width:30px;
            height:30px;

        }
        .htmlcontent{
            position:absolute;
            left:110px;
            top:65%;
            font-size: 24px;
        }
        .kuang{
            margin-left: 300px;
            font-size: 24px;
        }
        #photo{
            width:150px;
            height:150px;
            margin-top:40px;
            margin-left:25%;
        }
        #outlogin{
            position: fixed;
            top:70%;
            right:100px;
        }

    </style>
    <script>
        function updateBlog(){
            document.getElementById("from").style.display='';
        }
        function display1(){
            document.getElementById("blog").style.display='';
        }
        function display5(){
            document.getElementById("blog1").style.display='';
        }
        function display2(){
            alert("上传成功");
        }
        function display3(){
           if(document.getElementById("right").style.display=='none'){
               document.getElementById("right").style.display='';
            }else{
               document.getElementById("right").style.display='none';
            }
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="set-title">············</div>
        <div name="tltle1" class="set-title">My Blog</div>
        <div class="set-title">············</div>
        <div style="text-align:center">
            <span class="tag">首页</span>
            <a style="text-decoration: none;"href="fenlei.php" class="tag">分类</a>
            <a style="text-decoration: none;" href="guidang.php" class="tag">归档</a>
            <a style="text-decoration: none;" href="tag.php" class="tag">标签</a>
        </div>
    </div>
    <div class="body1">
        <p style="font-size: 30px; background-color: white;width: 100px;" onclick="updateBlog()">写博客</p><hr>
        <div id="from" style="display: none;">
            <form  method="post" action="fileInsert.php" enctype="multipart/form-data"><br><br>
                <lable class="write">博客标题:</lable><input class="write" type="text" name="articleTitle"><br><br>
                <lable class="write">文章权限:</lable>
                <select class="write" name="q">
                    <option class="write" value="">请选择</option>
                    <option class="write" value="private">仅自己可见</option>
                    <option class="write" value="public">所有人可见</option>
                </select><br><br>
                <lable class="write">分类于 :&nbsp;&nbsp;&nbsp;&nbsp;</lable><input class="write" type="text" name="fenlei"><br><br>
                <lable class="write">标签:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</lable><input class="write" type="text" name="filetag"><br><br>
                <lable class="htmlcontent">文章内容:</lable>
                <textarea class="kuang" name="comment" rows="70" cols="60"></textarea><br>
                <p style="font-size: 30px;text-align: center;color:indianred;">or</p>
                <lable class="write">上传文件:</lable>
                <input type="file" class="write" style="background-color: white;" name="file"><br><br>
                <input style="font-size: 24px;margin-left: 650px;" type="submit" value="发表" onclick="display2()"><br><br>
            </form>
        </div><br>

        <p class="myblog" style="font-size: 30px; background-color: white;width: 130px; " onclick="display1()">我的博客</p><hr>
        <div id="blog" style="display: none;">
            <?php

            //header("Location:http://www.mz.com/file.php");
            include 'zhuceData.php';
            //include 'queryUser.php';
            $data = new DataBase;
            $data->connection("localhost","root","12345678");
            $data->useDatabase("mydb");
            $name = $_COOKIE["username"];
            $sql = "select filename from myfile1 where username= '$name'";
            $results = $data->getConn()->query($sql);
            while($row = $results->fetch_assoc()){
                $a1=$row['filename'];
                echo "<p style='font-size: 25px;margin-left: 50px;'><a href='filereader.php?filename=$a1&fileuser=$name' style='color: blue;' id='$a1' >".$a1."</a></p>";
            }
           // $data->getConn()->close();
            ?>
        </div><br>

        <p class="myblog" style="font-size: 30px; background-color: white;width: 130px; " onclick="display5()">其他博客</p><hr>
        <div id="blog1" style="display: none;">
            <?php


            $sql = "select filename from myfile1 where file_order= 'public'";
            $results = $data->getConn()->query($sql);
            while($row = $results->fetch_assoc()){
                $a1=$row['filename'];
                echo "<p style='font-size: 25px;margin-left: 50px;'><a style='color: blue;'href='otherBlog.php?filename=$a1&fileuser=$name' id='$a1' >".$a1."</a></p>";
            }
            // $data->getConn()->close();
            ?>
        </div>

    </div>
    <div class="right" id="right" style="display: none;">
        <img id="photo" src="https://i.loli.net/2017/07/19/596ecde746c43.jpg"><br><br>
        <span style="font-size: 20px;color: white;margin-left:140px;" ><?php
            $name=$_COOKIE["username"];
            echo $name;
            ?></span><br><br>
            <div style="font-size: 18px;color: white;text-align:center;"><span onclick="display1()">文章（
            <?php
            //include 'zhuceData.php';
            $data1 = new DataBase;
            $data1->connection("localhost","root","12345678");
            $data1->useDatabase("mydb");
            $name1 = $_COOKIE["username"];
            $sql1 = "select filename from myfile1 where username= '$name1'";
            $results1 = $data1->getConn()->query($sql1);
            echo $results1->num_rows;
            ?>
                    ）</span>|日志（10）|标签（5）</div>
            <div  id="outlogin">
                <a style="font-size: 18px;color: white;text-align:center;" href="loginOut.php" >退出当前账号</a><br>
                <a style="font-size: 18px;color: white;text-align:center;" href="updatePswFrame.php" >修改密码</a>
            </div>
    </div>
<div class="btn1" onclick="display3()">
    <img style="width:30px;height:30px;" src="https://i.loli.net/2017/07/27/5979a8e786cb8.jpg">
</div>
</body>
</html>