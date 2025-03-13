<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <title>學生管理 >> 查詢學生</title>
</head>
<body>
<h3 class="subtitle">學生管理 >> 查詢學生</h3>
<form action="./fun/getStudent.php" method="post" target="resultbox">
    <div class="inputbox"><span>學號：</span><input name="sid"  type="text"></div>
    <div class="inputbox"><span>姓名：</span><input name="name"  type="text"></div>
    <div class="inputbox"><span>性別：</span>
        <select  name="sex">
            <option value="">未指定</option>
            <option value="男">男</option>
            <option value="女">女</option>
        </select></div>
    <div class="inputbox"><span>年齡：</span><input name="age"  type="text"></div>
    <div class="inputbox"><span>班級：</span><input name="class"  type="text"></div>
    <div class="inputbox"><span>院科：</span><input name="dname"  type="text"></div>
    <div class="inputbox"><span>證件號：</span><input name="idnum"  type="text"></div>
    <div class="clickbox clearfloat"><span></span><input name="submit" type="submit" value="提交"></div>
    <div class="redbox clickbox "><span></span><input name="reset" type="reset" value="清除"></div>
</form>
<iframe name="resultbox" frameborder="0" width="100%" height="500px" ></iframe>

</body>
</html>