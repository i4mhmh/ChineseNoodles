<?php
session_start();
$user = $_POST["user"];
$pass = $_POST['passwd'];
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

//查询所有用户的用户名

$sql_name = 'select username from members';
$result_names = mysqli_query($conn,$sql_name);

//检查是否存在该管理员
$sql_login = "select password from admin_members where username='{$user}'";
$result_login = $conn->query($sql_login); 
$members = $result_login->fetch_row();
//判断是否为空
if ($user && $passwd !== ""){
    if ($members[0]==$passwd){
        $_SESSION['admin_name'] = $user;
        header("location:/welcome_admin.php");
    }else{
        header("location:/admin.php?a=wrong");
    };
}else{
        
        header("location:/admin.php?a=null");
}


//echo "success";

?>