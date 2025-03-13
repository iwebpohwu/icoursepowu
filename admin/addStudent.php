<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/fun.css">
    <title>學生管理 >> 新增學生</title>
</head>
<body>
<h3 class="subtitle">學生管理 >> 新增學生</h3>
<form action="./fun/addStudent.php" method="post" target="resultbox">
    <div class="inputbox"><span>學號：</span><input name="sid" required type="text"></div>
    <div class="inputbox"><span>姓名：</span><input name="name" required type="text"></div>
    <div class="inputbox"><span>性別：</span>
        <select required name="sex">
            <option value="男">男</option>
            <option value="女">女</option>
        </select></div>
    <div class="inputbox"><span>年齡：</span><input name="age" required type="text"></div>
    <div class="inputbox"><span>班級：</span><input name="class" required type="text"></div>
    <div class="inputbox"><span>院科：</span>
    <?php
    require_once '../config/database.php';
    echo '<select required name="did">';
    $dept=mysqli_query($db,"select did,dname from department");
    while($dr=mysqli_fetch_object($dept)) {
        var_dump($dr);
        echo '<option value="'.$dr->did.'" ';  echo '> '.$dr->dname.'</option>' ;
    }
    echo '</select>';
    mysqli_close($db);
    ?></div>
    <div class="inputbox"><span>證件號：</span><input name="idnum" required type="text"></div>
    <br>
    <div class="clickbox clearfloat"><span></span><input name="submit" type="submit" value="提交"></div>
    <div class="redbox clickbox "><span></span><input name="reset" type="reset" value="清除"></div>
    <p>注：所有項必填！</p>
</form>

    <iframe name="resultbox" frameborder="0" width="100%" height=200px ></iframe>


</body>
</html>