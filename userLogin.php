<?php
    /*if(isset($_COOKIE["username"])){
        if(isset($_COOKIE["password"])){
             header("Location:https://mz233.github.io/");
        }
    }*/
?>
<html>
<head>
    <meta charset="utf-8">
    <title>/login</title>
    <style>
        .background{
            margin-left:auto;
            margin-right:auto;
            width:70%;
        }
        .loginimage{
            position:absolute;
            top:20%;
            right:5%;
            width:300px;
        }
        .zhuce{
            font-size: 20px;
            margin-left:50%;
        }
    </style>
</head>
<body>



    <form method="post" action="queryUser.php">

        <div >
            <img class="background" src="https://i.loli.net/2017/07/19/596ece0309ffe.jpg"><br><br>
            <span class="loginimage">
                <fieldset>
                <!--<lable id="title1" style="font-size: 40px" >用户登录</lable><br><br>-->
                    <legend style="font-size: 40px;">用户登录</legend>
                <lable style="font-size: 25px">用户名：</lable><input type="text" name="username2"   style="font-size: 25px"><br><br>
                <lable style="font-size: 25px">密  码：</lable><input type="password" name="password2"  style="font-size: 25px"><br><br>
                <input type="submit" id="btn" value="登录" style="font-size: 25px"><br><br>
                    <span ><a href="http://www.mz.com/forgetPsw.php" style="color: blue;font-size: 20px;margin-left:3%;text-decoration: none;">忘记密码</a></span>
                <span class="zhuce"><a href="http://www.mz.com/zhuce.html" style="color: blue;text-decoration: none;">注册</a></span>
                    </fieldset>
            </span>

        </div>
    </form>

</body>
</html>