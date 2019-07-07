<?php
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
?>