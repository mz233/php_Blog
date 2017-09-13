<?php

class File
{
    //成员变量
    /*file类：
    属性：
    1、文件本身的私有还是公有
    2、文件名
    方法：
    1、读文件的方法
        （1）传入文件名
      2、写文件的方法
        （1）传入文件名、文件权限->文件位置
      3、修改文件的方法
        （1）传入文件名*/
    //成员函数

    //读文件
    function fileread($filename)
    {
        $filename1 = "D:\\temp1\\$filename";
        $file = fopen("$filename1", 'r');
        while (!feof($file)) {
            //echo iconv('gb2312', 'utf-8', fgets($file)) . "<br>";
            //echo iconv('utf-8', 'gb2312', fgets($file)) . "<br>";
            echo fgets($file)."<br>";
        }
        fclose($file);
    }

    //写文件.修改文件都用这个
    function filewrite($targetName, $content)
    {
        //如果判断存在这个文件，那么数据库中修改 修改时间的选项 如果不存在，则上传时间等于修改时间
        $file = fopen("D:\\temp1\\$targetName", 'w');
        fwrite($file, $content);
        fclose($file);
    }

    //
}

?>