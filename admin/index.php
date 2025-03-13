<?php 
session_start();
if(!isset($_SESSION["admin"])||!$_SESSION["login"]==true){
        header ("HTTP/1.1 302 Moved Temporatily"); 
        header ("Location: "."../"); 
        exit();
    }
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>學生選課資訊管理系統@2019</title>
</head>
<body>
<div class="container topnav">
    <div class="logo">
        學生選課資訊管理系統
    </div>
    <div class="userbox" style="float:right">
        你好，管理員 <?php echo $_SESSION["admin"]?> <a href="../logout.php"> 登出</a>
    </div>

</div>
<div class="container main">
    <div class="leftnav">
        <div class="homepage">
            <a href="./welcome.php" target="frame">首頁</a>
        </div>
        <div class="subtitle">
            學生管理
        </div>
        <div class="item">
            <a href="./addStudent.php" target="frame">新增學生</a>
        </div>
        <div class="item">
            <a href="./queueStudent.php" target="frame">查詢學生</a>
        </div>
        <div class="item">
            <a href="./getLog.php" target="frame">獎懲管理</a>
        </div>
        <div class="subtitle">
            院科管理
        </div>
        <div class="item">
            <a href="./queueDept.php" target="frame">院科信息</a>
        </div>
        <div class="item">
            <a href="./queueMajor.php" target="frame">專業列表</a>
        </div>
        <div class="subtitle">
            課程管理
        </div>
        <div class="item">
            <a href="./queueCourse.php" target="frame">課程查詢</a>
        </div>
        <div class="item">
            <a href="./addCourse.php" target="frame">新增課程</a>
        </div>
        <div class="subtitle">
            選課管理
        </div>
        <div class="item">
            <a href="./queueChoose.php" target="frame">學生選課</a>
        </div>
        <div class="item">
            <a href="./queueMark.php" target="frame">登記分數</a>
        </div>
        <div class="item">
            <a href="./queueRetake.php" target="frame">補考重修</a>
        </div>
        <div class="subtitle">
            資料統計
        </div>
        <div class="item">
            <a href="./scoreStatistic.php" target="frame">成績統計</a>
        </div>
        <div class="item">
            <a href="./classStatistic.php" target="frame">選課統計</a>
        </div>
        <div class="subtitle">
            系統設置
        </div>
        <div class="item">
            <a href="./userManage.php" target="frame">用戶管理</a>
        </div>
        <div class="item">
            <a href="./changePassword.php" target="frame">修改密碼</a>
        </div>


    </div>
    <div class="content">
        <iframe name="frame" frameborder="0" width="100%"  scrolling="yes"  src="./welcome.php"></iframe>
    </div>

</div>
<div class="container footer">
    <span>資料庫系統課程設計@2019</span>
</div>
</body>
</html>