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
    <h3>重修查詢</h3>
    <h4>正在重修課程</h4>
<table>
    <tr>
        <th>課程號</th>
        <th>課程名</th>
        <th>學分</th>
        <th>教師名</th>
    </tr>
    <?php

    $com="select * from course natural join (select * from student_course where sid='$sid' and status='1' and score is null) as chosen  " ;
    
    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tr>
                <td><?php echo $row->cid ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->tname ?></td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<h4>已重修課程</h4>
<table>
    <tr>
        <th>課程號</th>
        <th>課程名</th>
        <th>學分</th>
        <th>教師名</th>
        <th>成績</th>
    </tr>
    <?php

    $com="select * from course natural join (select * from student_course where sid='$sid' and status='1' and score is not null) as chosen  " ;
    
    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tr>
                <td><?php echo $row->cid ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->tname ?></td>
                <td><?php echo $row->score ?></td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<h4>不及格課程記錄</h4>
<table>
    <tr>
        <th>課程號</th>
        <th>課程名</th>
        <th>學分</th>
        <th>教師名</th>
        <th>成績</th>
    </tr>
    <?php

    $com="select * from course natural join (select * from student_course where sid='$sid' and status='0' and score<60 ) as chosen  " ;
    
    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tr>
                <td><?php echo $row->cid ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->tname ?></td>
                <td><?php echo $row->score ?></td>
            </tr>
            <?php
        }
    }
    mysqli_close($db);
    ?>
</table>
</body>
</html>