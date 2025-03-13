<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/fun.css">
    <title>學生管理 >> 查詢學生</title>
</head>
<body>
<h3 class="subtitle">選課管理 >> 學生選課查詢</h3>
<form action="./fun/getChoose.php" method="get" target="resultbox">
    <div class="inputbox"><span>學號：</span><input name="sid"  type="text"></div>
    <div class="inputbox"><span>姓名：</span><input name="name"  type="text"></div>
    <div class="inputbox"><span>課程號：</span><input name="cid"  type="text"></div>
    <div class="inputbox"><span>課程名：</span><input name="cname"  type="text"></div>
    <div class="clickbox clearfloat"><span></span><input name="submit" type="submit" value="提交"></div>
    <div class="redbox clickbox "><span></span><input name="reset" type="reset" value="清除"></div>
</form>
<iframe name="resultbox" frameborder="0" width="100%" height=600px ></iframe>
</body>
</html>