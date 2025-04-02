<?php
/**
 * Created by Powu University.
 * User: Powu University
 * Date: 2018-11-08
 * Time: 16:17
 */
include 'conn.php';
if(!session_id()){
    session_start();
}
$listrow=5;
$pSql="select c.term,c.cname,c.credit,t.tname,t.tel,c.cid from teacher as t inner join course as c where t.id=c.tid";
$preSult=$pdo->query($pSql);
$totalrow=$preSult->rowCount();
$totalpage=ceil($totalrow/$listrow);
if(empty($_GET['page'])){
    $page=1;
}else{
    $page=$_GET['page'];
}
$startrow=((int)$page-1)*$listrow;
if(!$_SESSION['sid']){
    echo "<script>
alert('非法操作');
location.href='index.html';
</script>";
}
$sid=$_SESSION['sid'];
$sql="select c.term,c.cname,c.credit,t.tname,t.tel,c.cid from teacher as t inner join course as c where t.id=c.tid limit $startrow,$listrow";
$result=$pdo->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery文件。務必在bootstrap.min.js 之前引入 -->
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .head{
            font-weight: bold;
            text-align: center;
        }
        table tr,table td{
            text-align: center;
            vertical-align: middle!important;
        }
    </style>
</head>
<body>
        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><h1>選課列表</h1></div>
                    <div class="col-md-4"></div>
                </div>
                <table class="table table-bordered table-condensed table-hover">
                    <tr class="head">
                        <td>學年學期</td>
                        <td>選課名稱</td>
                        <td>學分</td>
                        <td>指導老師</td>
                        <td>指導老師電話</td>
                        <td>操作</td>
                    </tr>
                    <?php
                    while($arr=$result->fetch(PDO::FETCH_ASSOC)){
                        $cid=$arr['cid'];
                        $Sql="select * from course_student where cid='$cid' and sid='$sid'";
                        $Result=$pdo->query($Sql);
                        $row=$Result->rowCount();
                        echo "<tr>";
                        echo "<td>".$arr['term']."</td>";
                        echo "<td>".$arr['cname']."</td>";
                        echo "<td>".$arr['credit']."</td>";
                        echo "<td>".$arr['tname']."</td>";
                        echo "<td>".$arr['tel']."</td>";
                        if($row>0){
                            echo "<td><font color='red'>已選中</font>
                                   <a href='nonchoosed.php?cid=$cid&n=1&page=$page' class='btn btn-default'>取消</a></td>";
                        }else{
                            echo "<td><a href='choosed.php?cid=$cid&page=$page' class='btn btn-default'>選中</a>
                                   <a href='' class='btn btn-default'>取消</a></td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </table>
                <div class="row">
                    <div class="col-md-4"><a href="showCourse.php" class="btn btn-default">查看已選課程</a></div>
                    <div class="col-md-4"><a href="choose.php?page=<?php echo ($page-1); ?>">上一頁</a>&nbsp;&nbsp;
                        <?php
                        for($i=1;$i<=$totalpage;$i++){
                            if($i==$page){
                                echo "第".$i."頁"." ";
                            }else{
                                echo "<a href='choose.php?page=$i' >第{$i}頁</a>"." ";
                            }
                        }
                        ?>
                                             <a href="choose.php?page=<?php if($page<$totalpage){
                                                                                        echo $page+1;
                                                                                        } else{
                                                                                        echo $totalpage;
                                             }
                                             ?>">下一頁</a></div>
                    <div class="col-md-4">共<?php echo $totalpage."頁 "."每頁".$listrow."條"; ?></div>
                </div>
            </div>

            <div class="col-md-2">
                <?php
                echo "歡迎你: " . $_SESSION['sname'];
                ?>
                <br>
                <a href="quit.php" class="btn btn-default">點擊退出</a>
            </div>
        </div>
</body>
</html>
