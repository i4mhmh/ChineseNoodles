<?php
include('conn.php');
include('../check_admin.php');
$name = $_GET['name'];
$time_change = $_GET['member_res'];
$status = substr($_GET['member_status'],1,-1);

$t = date('Y-m-d H:i:s',$time_change);
header('Content-type: text/html;charset=utf-8');
$sql = 'update time_data set status="'.$status.'" where name = "'.$name.'" and clock_time ="'.$t.'"';
$sql_check = 'update members set clock_times=(select count(status) from time_data where status = "1") where username="'.$name.'"';
$result = mysqli_query($conn,$sql);
if(!$result){
    die('修改失败,请检查数据库'.mysqli_error($conn));
}
$res = mysqli_query($conn,$sql_check);
if(!$res){
    die('更新数据失败');
}
echo '修改成功';
header("Refresh:2; url=conn_userdetail.php?name=".$name."");

mysqli_close($conn);

?>