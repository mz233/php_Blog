<?php
session_start();
//存储session数据
if(isset($_SESSION['views1'])){
    $_SESSION['views1']=$_SESSION['views1']+1;
}else{
    $_SESSION['views1']=1;
}

?>
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
        .write{
            font-size: 20px;
            margin-left: 50px;

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
        .comment{
            margin-left: 100px;
        }
    </style>
    <script>
        function del() {
            alert("删除成功！");
        }
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
        function al() {
            alert("评论成功！");
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
<p style="font-size: 30px;" >博客内容:</p>

<div class="btn1" onclick="display3()">
    <img style="width:30px;height:30px;" src="https://i.loli.net/2017/07/27/5979a8e786cb8.jpg">
</div>

<div id="blog">
    <div style='margin-left: 50px;font-size: 20px'>
        <?php
        include 'FileClass.php';
        $filename = $_GET["filename"];

        $sql = "select username from myfile1 where filename= '$filename'";
        $results2 = $data1->getConn()->query($sql);
        while($row = $results2->fetch_assoc()){
            $a1=$row['username'];

        }
        echo "<div style='color: dimgrey;'>发表于:";
        $data1->QueryTime('myfile1',$a1,$filename);
        echo "作者："."$a1"." ";
        echo "浏览量：".$_SESSION['views1']."</div>";
        echo "<hr></br></br>";

        echo"<div ><span style='margin: 30px;margin-left: 30px;'>";
        $a1=new File();
        $a1->fileread($filename);
        echo "<br></span></div><hr>";

        //echo"<p style='margin-left: 50px;margin-top:100px;font-size: 20px;color:red;'><a  onclick='del()' href='del.php?file=$filename'>删除</a></p>";

        ?>
    </div>


</div>
<div>
    <br><br><br>
    <lable class='write' style='color:white;background-color: black; font-size: 22px;'>评论：</lable><br>
        <?php
        $sql = "select username,comment,commenttime from mycomment where filename= '$filename'";
        $results2 = $data1->getConn()->query($sql);
        while($row = $results2->fetch_assoc()){
            $a1=$row['username'];
            $a2=$row['comment'];
            $a3=$row['commenttime'];
            echo "<span class='comment'style='font-size: 20px;left: 10%;color: dimgrey;'>$a2</span>"."<br>";
            echo"<span class='comment' style='font-size: 15px;left: 10%;color: gray;'>$a1</span>"." "."<span style='font-size: 15px;left: 10%;color: gray;'>$a3</span>"."<br><br>";
            echo "<span style='margin-left: 100px;'>-----------------------------------------</span>";
            echo "</br></br>";
        }

        ?>

</div>
<br><br><br><hr style="margin-left: 50px;"><br><br>
<div>

    <form method='post' action="comment.php">
        <lable class="write">对于本博客：<br>
            <?php
            echo"<input class='write' type='text' value='$filename' name='wen' style='background-color: gray;'>"."<br>";
    ?>
            <lable class="write">你想说：<br>
    <textarea class='write' name='comm' rows='3' cols='20'></textarea><br><br>
    <input class='write' type='submit' value='评论' onclick="al()">
    </form><br><br><br>

</div>
</body>
</html>

