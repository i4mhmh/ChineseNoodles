<?php
header('Content-Type :text/html;charset=utf-8');
include_once('/connect/conn.php');
//查询打卡次数表信息
$sql = 'select username,clock_times from members';
$res = mysqli_query($conn,$sql);
while($result = mysqli_fetch_array($res)){
    echo $result['username'];
    echo '------>正常打卡次数: '.$result['clock_times']; 
    echo '<br>';
}
?>