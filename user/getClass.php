<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="./user.css">
</head>
<body>
<table>
    <tr>
        <th>課程號</th>
        <th>課程名</th>
        <th>學分</th>
        <th>上課地址</th>
        <th>開課學院</th>
        <th>教師名</th>
    </tr>
    <?php
   require_once("../config/database.php");

    $com='select * from course natural join (select did,dname from department) as didname where 1=1  ' ;
    if($_GET['cid']){
        $com=$com." and cid like '%".$_GET['cid']."%'";
    }
    if($_GET['cname']){
        $com=$com." and cname like '%".$_GET['cname']."%'";
    }
    if($_GET['credit']){
        $com=$com." and credit like '%".$_GET['credit']."%'";
    }
    if($_GET['cadd']){
        $com=$com." and cadd like '%".$_GET['cadd']."%'";
    }
    if($_GET['dname']){
        $com=$com." and dname like '%".$_GET['dname']."%'";
    }
    if($_GET['tname']){
        $com=$com." and tname like '%".$_GET['tname']."%'";
    }

    $result=mysqli_query($db,$com);
    if($result){
        while($row=mysqli_fetch_object($result)){
            ?>
            <tr>
                
                <td><?php echo $row->cid ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->credit ?></td>
                <td><?php echo $row->cadd ?></td>
                <td><?php echo $row->dname ?></td>
                <td><?php echo $row->tname ?></td>
                <td><a href="./chooseClass.php?cid=<?php echo $row->cid ?>">選課</a></td>
            </tr>
            <?php
        }
    }

    mysqli_close($db);
    ?>
</table>
</body>
</html>