<?php
require_once("../../config/database.php");
session_start();
if(!isset($_SESSION["admin"])){
    echo "警告！非法訪問！<br>Warning! Illegal Operation! ";
    exit();
}
$uid=$_SESSION["admin"];
$old=md5($_POST["oldpass"]);
$new=md5($_POST["newpass"]);

$com1="select * from user_admin where adminID='$uid' and pwd='$old'";
$com2="update user_admin set pwd='$new' where adminID='$uid'";

$result1=mysqli_query($db,$com1);


if($result1->num_rows>0){ //user exists
    $result2=mysqli_query($db,$com2);
    if($result2){
        echo '<h4 style="margin:30px;">提示：密碼更改成功。</h4>';
    }
    else{
    echo '<h4 style="margin:30px;">注意：資料未更改！</h4>';
    }
}
else{
    echo '<h4 style="margin:30px;">注意：認證錯誤，資料未更改。請檢查你的輸入。</h4>';
}
mysqli_close($db);
?>