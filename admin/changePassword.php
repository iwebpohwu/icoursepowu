<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/fun.css">
    <title>系統設置 >> 更改密碼</title>
</head>
<body>
<h3 class="subtitle">系統設置 >> 更改密碼</h3>
<p>注意：下次將使用新密碼登錄，請保管好新設置的密碼。</p>
<form action="./fun/changePassword.php" method="post" target="resultbox">
    <div class="inputbox"><span>當前密碼：</span><input name="oldpass"  type="password"></div>
    <div class="inputbox"><span>新密碼：</span><input name="newpass"  type="password"></div>
    <div class="clickbox clearfloat"><span></span><input name="submit" type="submit" value="提交"></div>
    <div class="redbox clickbox "><span></span><input name="reset" type="reset" value="清除"></div>
</form>
<iframe name="resultbox" frameborder="0" width="100%" height=600px ></iframe>
</body>
</html>