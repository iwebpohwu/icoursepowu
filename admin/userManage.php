<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/fun.css">
    <title>系統設置 >> 使用者管理</title>
</head>
<body>
<h3 class="subtitle">系統設置 >> 使用者管理</h3>
<p>提示：作為管理員，你可以啟動學生帳戶，為學生帳戶重置密碼。</p>
<form action="./fun/getUser.php" method="get" target="resultbox">
    <div class="inputbox"><span>學號：</span><input name="sid"  type="text"></div>
    <div class="inputbox"><span>姓名：</span><input name="name"  type="text"></div>
    <div class="clickbox clearfloat"><span></span><input name="submit" type="submit" value="提交"></div>
    <div class="redbox clickbox "><span></span><input name="reset" type="reset" value="清除"></div>
</form>
<iframe name="resultbox" frameborder="0" width="100%" height=600px ></iframe>
</body>
</html>