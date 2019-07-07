<?php
include_once('conn.php');
include_once('../check_admin.php');
@$name = $_GET['name'];
//查询员工打卡时间并回显
if ($name){
    $sql = "delete members from members where username='".$name."'";
    if($conn -> query($sql) === TRUE){
        header("location:/member_msg.php?result=ok");
    }else{
        header("location:/member_msg.php?result=wrong");
    };


    }else{
        echo "Error deleting record: " . $conn->error;
    }
    
    $conn->close();
?>