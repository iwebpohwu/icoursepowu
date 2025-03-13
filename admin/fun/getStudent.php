<!DOCTYPE html>
<html>
<head>
    <style>

        table th{
            
            font-size: 15px;
            padding: 6px;
            height: 38px;
       }
        table td{
            height: 25px;
            text-align: center;
            font-size: 13px;
            padding: 3px;
        }
    </style>
</head>

<body>
    
<table>
<tr>
    <th style="min-width: 6%;">學號</th>
    <th style="min-width: 5%;">姓名</th>
    <th style="min-width: 3%;">性別</th>
    <th style="min-width: 3%;">年齡</th>
    <th style="min-width: 3%;">班級</th>
    <th style="min-width: 8%;">院科</th>
    <th style="min-width: 8%;">證件號碼</th>
    <th style="min-width: 6%;">操作</th>
</tr>
<?php
require_once("../../config/database.php");

$com='select * from student natural join (select did,dname from department) as didname where 1=1' ;
if($_POST['sid']){
    $com=$com.' and sid like "%'.$_POST['sid'].'%"';
}
if($_POST['name']){
    $com=$com.' and name like "%'.$_POST['name'].'%"';
}
if($_POST['sex']){
    $com=$com.' and sex="'.$_POST['sex'].'"';
}
if($_POST['age']){
    $com=$com.' and age='.$_POST['age'];
}
if($_POST['class']){
    $com=$com.' and class like "%'.$_POST['class'].'%"';
}
if($_POST['dname']){
    $com=$com.' and dname like "%'.$_POST['dname'].'%"';
}
if($_POST['idnum']){
    $com=$com.' and idnum like "%'.$_POST['idnum'].'%"';
}

$result=mysqli_query($db,$com);
if($result){
    while($row=mysqli_fetch_object($result)){
        ?>
        <tr>
            <td><?php echo $row->sid ?></td>
            <td><?php echo $row->name ?></td>
            <td><?php echo $row->sex ?></td>
            <td><?php echo $row->age ?></td>
            <td><?php echo $row->class ?></td>
            <td><?php echo $row->dname ?></td>
            <td><?php echo $row->idnum ?></td>
            <td><a href="modiStudent.php?sid=<?php echo $row->sid?>">修改</a> / <a href="delStudent.php?sid=<?php echo $row->sid?>">刪除</a></td>
        </tr>
        <?php
    }
}

mysqli_close($db);
?>
</table>
</body></html>