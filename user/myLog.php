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
    <h3>獎懲查詢</h3>
<table>
    <tr>
        <th>獎懲</th>
        <th>緣由</th>
        <th>詳情</th>
        <th>發生時間</th>
        <th>錄入時間</th>
        <th>操作</th>
    </tr>
    <?php

    $com="select * from student_log left join (select sid sid2,name from student) as sname on student_log.sid=sname.sid2 where sid='$sid' " ;
    
    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tr>
                <td><?php
                    if ($row->type==1){
                        echo '獎';
                    }
                    else{
                        echo '懲';
                    }
                    ?></td>
                <td><?php echo $row->reason ?></td>
                <td><?php echo $row->detail ?></td>
                <td><?php echo $row->logdate ?></td>
                <td><?php echo $row->addtime ?></td>
                <td><a href="modiLog.php?sid=<?php echo $row->sid."&addtime=".$row->addtime; ?>">修改</a></td>
            </tr>
            <?php
        }
    }

    mysqli_close($db);
    ?>
</table>
</body>
</html>