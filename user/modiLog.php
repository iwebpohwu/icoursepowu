<?php
session_start();
require_once("../config/database.php");

$com="select * from student_log where sid=".$_SESSION['user']." and addtime='". $_GET['addtime']."'";


$result=mysqli_query($db,$com);
if($result){
    while($row=mysqli_fetch_object($result)){
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./user.css">
</head>
<body>
<h3 class="subtitle">獎懲管理 >> 修改資訊</h3>
    <form action="./editLog.php" method="post" id="log">
    
    <span>學號：</span><input name="sid" required type="text" style="width:180px" value="<?php echo $row->sid ?>"><br>
    <span>類型：</span><input name="type" required type="radio" value="1" <?php  if($row->type=='1') echo "checked"; ?>>獎<input name="type" type="radio" value="0" <?php  if($row->type=='0') echo "checked"; ?>>懲<br>
    <span>時間：</span><input name="logdate" required type="date" style="width:180px" value="<?php echo $row->logdate ?>"><br>
    <input name="addtime"required  type="text" style="display:none;" value="<?php echo $row->addtime ?>">
    <span>緣由：</span><input name="reason"required  type="text" class="boxwidth" value="<?php echo $row->reason ?>">
    <br>
    <span>詳情：</span><br><textarea style="display:block;width:90%;height:60px;"name="detail" required form="log" ><?php echo $row->detail ?></textarea><br>
   

        <div class="clickbox clearfloat"><span></span><input name="submit" type="submit" value="修改資訊"></div>
        <div class="redbox clickbox "><span></span><input name="back" type="button" onclick="javascript:history.back(-1);" value="返回"></div>
    </form>

        <?php
    }
}
mysqli_close($db);
?>