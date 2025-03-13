<?php 
session_start();
if(!isset($_SESSION["user"])||!$_SESSION["login"]==true){
        header ("HTTP/1.1 302 Moved Temporatily"); 
        header ("Location: "."../"); 
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="container topnav">
    <div class="logo">
        學生選課資訊管理系統
    </div>
    <div class="userbox" style="float:right">
        當前用戶：<?php echo $_SESSION["user"]?>  <a href="../logout.php">登出</a>
    </div>

</div>
<div class="container main">
    <div class="leftnav">
        <div class="homepage">
            <a href="./welcome.php" target="frame">首頁</a>
        </div>
        <div class="subtitle">
            個人資訊
        </div>
        <div class="item">
            <a href="./myInfo.php" target="frame">學籍信息</a>
        </div>
        <div class="item">
            <a href="./editInfo.php" target="frame">修改資訊</a>
        </div>
        <div class="subtitle">
            選課管理
        </div>
        <div class="item">
            <a href="./queueClass.php" target="frame">開課查詢</a>
        </div>
        <div class="item">
            <a href="./myClass.php" target="frame">選課管理</a>
        </div>
        <div class="subtitle">
            成績查詢
        </div>
        <div class="item">
            <a href="./myScore.php" target="frame">學科成績</a>
        </div>
        <div class="item">
            <a href="./myRetake.php" target="frame">重修管理</a>
        </div>
        <div class="subtitle">
            獎懲管理
        </div>
        <div class="item">
            <a href="./myLog.php" target="frame">獎懲查詢</a>
        </div>
        <div class="item">
            <a href="./addLog.php" target="frame">項目錄入</a>
        </div>
        <div class="subtitle">
            系統管理
        </div>
        <div class="item">
            <a href="./editPass.php" target="frame">修改密碼</a>
        </div>



    </div>
    <div class="content">
        <iframe name="frame" frameborder="0" width="100%" src="./welcome.php"></iframe>
    </div>

</div>
<div class="container footer">
    <span>資料庫系統課程設計@2019</span>
</div>
</body>
</html>