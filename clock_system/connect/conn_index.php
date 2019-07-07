<?php
session_start();
$user = $_POST["username"];
$pass = $_POST['password'];
$passwd = md5($pass);

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = 'clock_db';

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
 
// 检测连接
if ($conn->connect_error) {
    die("databases connect failed" . $conn->connect_error);
} 

$sql_login = "select password from members where username='{$user}'";
$result_login = $conn->query($sql_login); 
$members = $result_login->fetch_row();
//判断是否为空
if ($user && $passwd !== ""){
    if ($members[0]==$passwd){
        $_SESSION['user'] = $user;
        header("location:/welcome.php");
    }else{
        header("location:/resign_in.php");
    };
}else{
        header("location:/resign_in.php");
}


//echo "success";

?>