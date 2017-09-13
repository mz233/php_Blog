<?php
    if(isset($_SESSION['username']))
    {
        unset($_SESSION['username']);
    }
    header("location:http://www.mz.com/userlogin.php");
?>