<?php
session_start();
$sid=$_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./user.css">
    <title>更改密碼</title>
</head>
<body>
<h3 class="subtitle">更改密碼</h3>
<p>注意：下次將使用新密碼登錄，請保管好新設置的密碼。</p>
<form action="./changePassword.php" method="post" target="resultbox">
    <div class="inputbox"><span>當前密碼：</span><input name="oldpass"  type="password"></div>
    <div class="inputbox"><span>新密碼：</span><input name="newpass"  type="password"></div>
    <div class="clickbox clearfloat"><span></span><input name="submit" type="submit" value="提交"></div>
</form>
<iframe name="resultbox" frameborder="0" width="100%" height=200px ></iframe>
</body>
</html>