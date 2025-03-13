<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/fun.css">
</head>
<body>
<table>
    <tr>
        <th>課程號</th>
        <th>課程名</th>
        <th>學分</th>
        <th>教師名</th>
        <th>成績</th>
        <th>備註</th>
    </tr>
    <?php
    require_once("../../config/database.php");
    $sid=$_GET["sid"];
    $com="select * from course natural join (select cid,score,status from student_course where score is not null and sid='$sid') as chosen  " ;
    

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
                <td><?php if($row->status==1)echo "重修" ;else echo "首次"?></td>
            </tr>
            <?php
        }
    }

    mysqli_close($db);
    ?>
</table>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="#" onclick="javascript:history.back(-1);">返回</a></div> </div>
</body>
</html>