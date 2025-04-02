<?php
/**
 * Created by Powu University.
 * User: Powu University
 * Date: 2018-11-08
 * Time: 15:46
 */
if(!empty($_POST)){
    $sid=isset($_POST['sid'])? $_POST['sid'] : '';
    $sname=isset($_POST['sname'])? $_POST['sname'] : '';
    $password=isset($_POST['password'])? $_POST['password'] : '';
    include 'conn.php';
    $sql="insert into student(sid,sname,password) values('$sid','$sname','$password')";
    $r=$pdo->exec($sql);
    if($r>0){
        $redis=new redis();
        $redis->connect("127.0.0.1",6379);
        $redis->hMset("$sid",array(
            'sname'=>$sname,
            'password'=>$password
        ));
        echo "<script>
        alert('註冊成功，點擊登錄');
        location.href='index.html';
            </script>";
    }else{
        echo "<script>
        alert('註冊失敗，點擊返回');
        location.href='register.html';
            </script>";
    }
}else{
    echo "<script>
    alert('您未填寫任何資料');
    location.href='register.html';
        </script>";
}