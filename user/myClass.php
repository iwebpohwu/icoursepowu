<?php
session_start();
$sid=$_SESSION["user"];
require_once("../config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./user.css">
</head>
<body>
    <h3>選課管理</h3>
<table>
    <tr>
        <th>課程號</th>
        <th>課程名</th>
        <th>學分</th>
        <th>地點</th>
        <th>教師名</th>
        <th>操作</th>
    </tr>
    <?php

    $com="select * from course natural join (select cid from student_course where score is null and sid='$sid') as chosen" ;
    
    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tr>
                <td><?php echo $row->cid ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->cadd ?></td>
                <td><?php echo $row->tname ?></td>
                <td><a href="delCourse.php?cid=<?php echo $row->cid."&sid=".$row->sid; ?>">退選</a></td>
            </tr>
            <?php
        }
    }

    mysqli_close($db);
    ?>
</table>
</body>
</html>