<?php
session_start();
if(isset($_GET["retry"])){
    $wrong='<div class="inputbox">
                <span style="color:#df3a01;font-size:10px;margin:10px;display:block">用戶名或密碼錯誤</span>
            </div>';
}
if (!$_SESSION['login']==true) {
    print <<<END

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, height=device-height, inital-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="static/login.css" type="text/css" media="all" />
        <title>登錄到系統 - 學生選課資訊管理系統</title>
    </head>
    
    <body>
        <div class="loginbox">
            <div class="title">
            <span>
                學生選課資訊管理系統
            </span>
            </div>
            <div class="subtitle">
                用戶登錄
            </div>
            <form action="./login.php" method="post">
            <div class="inputbox">
                <span>帳號</span>
                <input name="user" required type="text">
            </div>
            <div class="inputbox">
                <span>密碼</span>
                <input name="pass" required type="password">
            </div>
            <div class="submitbox">
                <input name="submit" type="submit" value="提交">
            </div>
            $wrong
            </form>
        </div>
        <div class="footer">
        Copyright © 2019 Database Course Design. All rights reserved. 
        </div>
        <!-- Written by mrning -->
        <!-- 2019.12 -->
    </body>
</html>


END;

exit();
}
else{
    if(isset($_SESSION["admin"])){
        header ("HTTP/1.1 302 Moved Temporatily"); 
        header ("Location: "."./admin/"); 
        exit();
    }
    else{
        header ("HTTP/1.1 302 Moved Temporatily"); 
        header ("Location: "."./user/"); 
        exit();
    }
    
}

?>