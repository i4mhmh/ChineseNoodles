<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
@$name = $_SESSION['user'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = 'clock_db';
@$time = date('Y-m-d h:i:s', time());

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
 
// 检测连接
if ($conn->connect_error) {
    die("databases connect failed" . $conn->connect_error);
} 

$require_data = "SELECT * from time_data where name ='".$name."' order by clock_time DESC";
$require_result = mysqli_query($conn,$require_data);


$conn -> close()
?>