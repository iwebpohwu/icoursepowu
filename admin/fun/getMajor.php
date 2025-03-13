<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/fun.css">
    <script>
        function reName(mname){
            var nname = prompt("請輸入要更改的名稱",mname);
            if(nname){
                window.location.href="./editMajor.php?mname="+mname+"&nname="+nname;
            }
        }
    </script>
    <style>
        a{
            font-size: 10px;
            margin: 3px;
        }
    </style>
</head>
<body>

    <?php
    require_once("../../config/database.php");

    $com="select * from major where did='".$_GET['did']."'" ;
    $result=mysqli_query($db,$com);
    if($result){
        echo ("<h3>當前開設的專業有：</h3><ul>");
        while($row=mysqli_fetch_object($result)){
            ?>
            <li><?php echo $row->mname ?><a href="#" onclick="reName('<?php echo $row->mname ?>')">改</a><a href="./delMajor.php?mname=<?php echo $row->mname ?>">刪</a></li>
            <?php
        }
        echo("</ul>");
    }
    else{
        echo ("<h3>提示：你選擇的學院當前沒有開設專業</h3>");
    }

    mysqli_close($db);
    ?>
</table>
</body>
</html>