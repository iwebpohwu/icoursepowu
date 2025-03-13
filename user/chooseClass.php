<?php
    require_once("../config/database.php");
    session_start();
    // 1.first time cid not exist add and set status 0 2.exist status 0 score is null refuse 3.exist 0 score is not null 1 exist score is not nu
    $sid=$_SESSION['user'];
    $cid=$_GET["cid"];
    $checkfirst="select * from student_course where cid='$cid' and sid='$sid' and status='0'";
    $checkretake="select * from student_course where cid='$cid' and sid='$sid' and status='1'";
    $checkretakenotfinish="select * from student_course where cid='$cid' and sid='$sid' and status='1' and score is null";
    $insertfirst="insert into student_course (sid,cid,status) values ('$sid','$cid','0')";
    $insertretake="insert into student_course (sid,cid,status) values ('$sid','$cid','1')";
    $deleteretake="delete from student_course where sid='$sid' and cid='$cid' and score is null and status='1'" ;

    $resultfirst=mysqli_query($db,$checkfirst);
    $resultretake=mysqli_query($db,$checkretake);
    
    $ok=false;

    echo "<h3>";
    if($resultretake->num_rows>0){ //有重修記錄
        echo("當前課程有重修記錄");
        $checknotfinish=mysqli_query($db,$checkretakenotfinish);
        if($checknotfinish->num_rows>0){
             echo('，且當前已有選課記錄，退出。');
        }
        else{
            $delretake=mysqli_query($db,$deleteretake);
            $addretake=mysqli_query($db,$insertretake);
            if($addretake && $delretake){
            $ok=true;
            echo('，刪除先前的重修記錄，新增選課。');
            }
        }
    }
    else if($resultfirst->num_rows>0){ //有選課記錄
        echo("當前課程有選課記錄");
        while($row=mysqli_fetch_object($resultfirst)){
            if($row->score==null){
                echo('，未完成的課程，退出。');
            }
            else{
                $addretake=mysqli_query($db,$insertretake);
                if($addretake){
                $ok=true;
                echo('，新增首次重修記錄。');
                }
            }
        }
    }
    else{ //沒有記錄
        echo("當前課程為首次選課，新增選課記錄。");
        $addfirst=mysqli_query($db,$insertfirst);
        if($addfirst){
            $ok=true;
        }
    }
    
    if($ok){
        echo "<br>資料已更新。";
    }
    else{
        echo "<br>資料未更改。";
    }

    mysqli_close($db);
?>
<div style="width: 90%;height: 55px;margin: 50px"><div style="margin: 0 auto;width: 90px;height: 30px;background-color: #117700"><a style="text-decoration: none;padding:3px;color: #f3f3f3;text-align: center;display: block" href="#" onclick="javascript:history.back(-1);">返回</a></div> </div>