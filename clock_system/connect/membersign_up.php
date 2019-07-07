<?php
header('Content-Type: text/html; charset=utf-8');
include_once('conn.php');
$number = $_POST['number'];
$username = $_POST['user'];
$passwd = $_POST['passwd'];
$passwd_conf = $_POST['passwd_confirm'];
$name = $_POST['name'];
$sex = $_POST['sex'];
$QQ = $_POST["QQ"];
$email = $_POST['email'];

if($passwd == $passwd_conf && $username != ''){
    //判断输入信息无误
    $md5_pass = md5($passwd);
    $insert_sql = "insert into members(number,username,password,name,sex,QQ,email)
    values('{$number}','{$username}','{$md5_pass}','{$name}','{$sex}','{$QQ}','{$email}')";
    if(!mysqli_query($conn,$insert_sql)){
        die('error');
    }else{
        echo '注册成功';
        header("Refresh:2; url=../index.php");
    }
    




}elseif(empty($username)){
    header('location:/sign_up.php?status=0');
}
elseif(empty($passwd) || empty($passwd_conf) || $passwd !== $passwd_conf){
    header('location:/sign_up.php?status=1');
}
?>