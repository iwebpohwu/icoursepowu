<?php
/**
 * Created by Powu University.
 * User: Powu University
 * Date: 2018-11-08
 * Time: 17:00
 */
$dbms="mysql";
$host="dpg-cvml6d49c44c73ef52j0-a";
$dbname="edu_u2wq";
$dns="$dbms:host=$host;dbname=$dbname";
$user="edu_u2wq_user";
$pass="yOOOqel1OxUR84AungNXDehDcjyayjmh";
try{
    $pdo=new PDO($dns,$user,$pass);
}catch(Exception $exception) {
    echo "errormessege: " . $exception->getMessage();
}
