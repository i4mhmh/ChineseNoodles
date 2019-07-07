<?php
ignore_user_abort();
include('key.php');
include('conn.php');
$time_day = date('Y-m-d h:i:s', time());
$t = date('H:i:s');

$time=3600*24;
if ($key == 1){
    $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $sql_name = 'select username from members';
    $result_names = mysqli_query($conn,$sql_name);
    while($names = mysqli_fetch_array($result_names)){
        $name = $names['username'];
        $sql_in = "insert into time_data(name,clock_time,status) values('".$name."','".$time_day."','2')";
        if(!mysqli_query($conn,$sql_in)){
            echo $sql_in    ;
            die ('wrong');
        }else{
            echo $t;
        }

    }
    while($t == '00:00:01'){
        file_get_contents($url);
    }
  }

?>