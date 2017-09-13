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
        #from{
            border-top-style: solid;
            border-right-style:solid;
            border-bottom-style:solid;
            border-left-style:solid;
            margin-right: 30%;

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

<div>
    <?php
    include 'zhuceData.php';
    $data1 = new DataBase;
    $data1->connection("localhost","root","12345678");
    $data1->useDatabase("mydb");
    $name1 = $_COOKIE["username"];
    $sql="select file_lei,count(*) from myfile1 where username='$name1'group by file_lei";
    $result=$data1->getConn()->query($sql);
    //$num=1;
   // $temp='';
    echo "<div style='margin-top: 100px;margin-left: 10%;font-size: 25px;color: dimgrey;'>";
   // echo "你目前共计".$num."个分类"."<br><br><br>";
    while($row=$result->fetch_assoc()){
        $a=$row['count(*)'];
        $b=$row['file_lei'];
        echo "$b"."($a)"."<br>";
        $sql1="select filename from myfile1 where username='$name1'and file_lei='$b'";
        $result1=$data1->getConn()->query($sql1);
        while($row1=$result1->fetch_assoc()) {
            $h=$row1['filename'];
            echo "::&nbsp;&nbsp;&nbsp;&nbsp;"."<a style='color: black;' href='http://www.mz.com/filereader.php?filename=$h&fileuser=$name1'>$h</a>"."<br>";
        }

        //echo var_dump($row);
        //if($temp!=$b){
       //     $num++;
       // }
        //echo "::&nbsp; $a"."&nbsp;&nbsp;&nbsp;&nbsp;"."<a style='color: dimgrey;' href='http://www.mz.com/filereader.php?filename=$b&fileuser=$name1'>$b</a>"."<br>";
    }
    echo "</div>";
    ?>

</div>




</body>
</html>