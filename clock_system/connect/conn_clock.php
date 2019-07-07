<?php
session_start();
@$name = $_SESSION['user'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = 'clock_db';
$time = date('Y-m-d H:i:s', time());    
$clock_time =  date( "H");
if($clock_time > '9' || $clock_time ==9){
	$data_time ='4';
}else{
	$data_time = '1';
}


// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
 
// 检测连接
if ($conn->connect_error) {
    die("databases connect failed" . $conn->connect_error);
} 

$require_data = "SELECT * from time_data";
$require_result = mysqli_query($conn,$require_data);
while($require_row = mysqli_fetch_assoc($require_data)) {
    echo $require_row["name"];
}
//取出上次打卡时间做对比
$check_time = "SELECT max(clock_time) from time_data where name='".$name."'";
$result = mysqli_query($conn, $check_time);
$row = mysqli_fetch_assoc($result);
$time_conf = current($row); 
if (substr($time_conf,0,10) == substr($time,0,10)){
    header("location:/welcome.php?time=exist");
}else{
    $sql_clock = "INSERT INTO time_data (name,clock_time,status)
    VALUES('{$name}','{$time}','{$data_time}')";
    $sql_update = 'update members set clock_times =clock_times+1 where username ="'.$name.'"';
    if($data_time == 1){
        if ($conn -> query($sql_update) === TRUE){
            if ($conn->query($sql_clock) === TRUE) {
                //判断插入是否成功
                header("location:/clock_in_success.php");
                }else{
                header("location:/welcome.php?a=failed");
                }
        }else{
            echo '数据库出错';
        }
        }else{
            if ($conn->query($sql_clock) === TRUE) {
                //判断插入是否成功
                header("location:/clock_in_success.php");
                }else{
                header("location:/welcome.php?a=failed");
                }
        }
        
    }
   
    

?>