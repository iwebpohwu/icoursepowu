<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>院科信息</title>
    <link rel="stylesheet" type="text/css" href="./css/fun.css">
</head>
<body>
    <h3 class="subtitle">院科管理 >> 院科列表</h3>
<table>
    <tr>
        <th>院科序號</th>
        <th>院科名稱</th>
        <th>所在地址</th>
        <th>負責人</th>
        <th>聯繫方式</th>
        <th>操作</th>
    </tr>
    <?php
    require_once("../config/database.php");
    $com='select * from department order by did' ;
    
    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tr>
                
                <td><?php echo $row->did ?></td>
                <td><?php echo $row->dname ?></td>
                <td><?php echo $row->dadd ?></td>
                <td><?php echo $row->dmng ?></td>
                <td><?php echo $row->dtel ?></td>
                <td><a href="./fun/modiDept.php?did=<?php echo $row->did; ?>">修改</a></td>
            </tr>
            <?php
        }
    }

    mysqli_close($db);
    ?>
</table>
</body>
</html>