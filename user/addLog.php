<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
</head>
<body>
    <h3>獎懲錄入</h3>
<form style="margin:30px;"action="./addLogFunc.php" method="post" id="log">

    <span>類型：</span><input name="type" required type="radio" value="1" >獎<input name="type" type="radio" value="0">懲<br>
    <span>時間：</span><input name="logdate" required type="date" style="width:180px"><br>
    <span>緣由：</span><input name="reason"required  type="text" class="boxwidth">
    <br>
    <span>詳情：</span><br><textarea style="display:block;width:90%;height:60px;"name="detail" required form="log"></textarea><br>
    <span></span><input name="submit" type="submit" value="提交"><br>
</form>
</body>
</html>