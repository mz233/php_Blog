<?php
class DataBase{
    var $servername;//服务器名
    var $password;//密码
    var $username;//用户名
    var $conn;
    //var $login_user;//登录用户名
    //var $login_password;//登录密码
    //数据库连接
    function connection($sever,$user,$pass){
        $this->servername = $sever;
        $this->password = $pass;
        $this->username = $user;
        $this->conn = new mysqli($sever,$user,$pass);
        if ($this->conn->connect_error) {
            die("数据库连接错误：" . $this->conn->connect_error);
        }

    }
    //数据库选择
    function useDatabase($database){
        $sql = "use $database";
        if(!$this->conn->query($sql)){
            echo "数据库选择失败: " . $this->conn->error;
        }

    }
    //创建数据库
    function creat($database){
        $sql = "creat $database";
        if(!$this->conn->query($sql)){
            echo "数据库创建失败: " . $this->conn->error;
        }
    }
    //插入数据
    function Insert($login1,$login2,$login3,$table1){
        $sql = "insert into $table1(username,password,email)values('$login1','$login2','$login3')";
        if(!$this->conn->query($sql)){
            echo "数据插入失败: " . $this->conn->error;
        }else{
            echo "注册成功";
        }
    }
    function Insert1($login1,$login2,$login3,$login4,$login5,$login6,$login7,$table1){
        $sql = "insert into $table1(username,filename,file_order,file_lei,file_tag,updatetime,modifytime)values('$login1','$login2','$login3','$login4','$login5','$login6','$login7')";
        if(!$this->conn->query($sql)){
            echo "数据插入失败: " . $this->conn->error;
        }else{
            echo "发表成功";
        }
    }
    //查询数据
    function Query1($table1,$user1,$pass1){
        $sql = "select *from $table1 where username= '$user1'";
        $results = $this->conn->query($sql);
        if($results->num_rows > 0){
            $row = $results->fetch_assoc();
            if($row['password'] == $pass1){
                echo "登录成功";
                header("Location:http://www.mz.com/blogFrame.php");
            }else{
                echo "密码错误";
            }
        }else{
            echo "该用户不存在";
        }

    }
    function Query2($table1,$user1){
        $sql = "select filename from $table1 where username= '$user1'";
        $results = $this->conn->query($sql);
        while($row = $results->fetch_assoc()){
            echo $row['filename']."</br>";
        }
    }
    function QueryTime($table1,$user1,$title){
        $sql = "select updatetime from $table1 where username= '$user1'and filename='$title'";
        $results = $this->conn->query($sql);
        while($row = $results->fetch_assoc()){
            echo $row['updatetime']."</br>";
        }
    }
    function getConn(){
        return $this->conn;
    }
}
?>