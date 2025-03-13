<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/fun.css">
    <title>選課管理 >> 登記分數</title>
</head>
<body>

<div class="titlebox">
    <h3>選課管理 >> 登記分數</h3>
    <p>使用提示：在這裡你可以登記學生的成績。查找到學生後修改成績。下面的選項可以模糊搜索。</p>
</div>

<div class="formbox">
    <form action="./fun/getMark.php" method="get" target="resultbox">
        <div class="input_mid">學號<input name="sid"  type="text"></div>
        <div class="input_mid">學生姓名<input name="name"  type="text"></div>
        <div class="input_mid">課程號<input name="cid"  type="text"></div>
        <div class="input_mid">課程名<input name="cname"  type="text"></div>
        <div class="clickbox clearfloat firstbox"><input name="submit" type="submit" value="提交"></div>
        <div class="redbox clickbox "><input name="reset" type="reset" value="清除"></div>
    </form>
</div>

<div class="resultbox">
    <iframe name="resultbox" frameborder="0" width="100%" height=500px ></iframe>
</div>


</body>
</html>