<html>
<head>
    <meta charset="utf-8">
    <title>My blog</title>
</head>
<body>
alert("上传成功");
<?php

    include 'zhuceData.php';
    include 'FileClass.php';

    $data = new DataBase;
    $data->connection("localhost","root","12345678");
    $data->useDatabase("mydb");
    $name = $_COOKIE["username"];
    if(!$_POST['articleTitle']){
        echo "标题不能为空";
    }elseif(!$_POST['q']){
        echo "权限不能为空";
    } elseif($_POST['comment']){
        $a=$_POST['articleTitle'];
        $titlename="$a.txt";
        $content=$_POST['comment'];
        $file=new File;
        $file->filewrite($titlename, $content);
        $c=$_POST['q'];
        $time2=date('Y-m-d H:i:s',time()+21600);
        $fenlei=$_POST['fenlei'];
        $tag=$_POST['filetag'];
        $data->Insert1("$name", "$titlename","$c","$fenlei", "$tag","$time2","$time2","myfile1");
        header("location:http://www.mz.com/blogFrame.php");
    } else {


            if ($_FILES["file"]["error"] > 0)
            {
                echo "错误：: " . $_FILES["file"]["error"] . "<br>";
            }
            else
            {
                // 判断当期目录下的 upload 目录是否存在该文件
                // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
                if (file_exists("D://temp1//" . $_FILES["file"]["name"]))
                {
                    echo $_FILES["file"]["name"] . " 文件已经存在。 ";
                }
                else
                {
                    // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                    move_uploaded_file($_FILES["file"]["tmp_name"], "D://temp1//" . $_FILES["file"]["name"]);
                    $b=$_FILES["file"]["name"];
                    $c1=$_POST['q'];
                    $m=date('Y-m-d H:i:s',time()+21600);
                    $fenlei1=$_POST['fenlei'];
                    $tag1=$_POST['filetag'];
                    $data->Insert1("$name", "$b","$c1","$fenlei1", "$tag1","$m","$m","myfile1");
                    header("location:http://www.mz.com/blogFrame.php");
                   // echo "上传成功";
                }
            }

    }

?>
</body>
</html>
