<?php
include_once('../check_admin.php');
include_once('conn.php');
@$name = $_GET['name'];
//查询员工打卡时间并回显
if ($name){
    $sql = 'select clock_time,status from time_data where name ="'.$name.'" order by clock_time DESC';
    $result = mysqli_query($conn,$sql);
    if (!$result){
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }  
}

?>
<!DOCTYPE html>
<html lang="zh-CN">
<title><?php echo $name.'的个人详细信息'?></title>
<mata name='viewport' content='width=device-width,initial-scale=1'></mata>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
<link href="../bootstarp/css/dashboard.css" rel="stylesheet">
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            <a class="navbar-brand" href="../welcome_admin.php">管理员主页</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="../member_msg.php">员工信息</a></li>
                <li><a href="../admin_leaderboard.php">排行榜</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../welcome_admin.php?ex_it=1">退出</a></li>
            </ul>        
            </div>
        </div>
    </nav>
    <br></br><br></br><br></br>
<center><h2 class="sub-header">员工<?=$name?>的打卡总记录</h2></center>
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">打卡时间</th>
      <th scope="col">打卡状态</th>
      <th scope="clo">修改状态</th>
    </tr>
  </thead>
  <tbody>
      
    <?php
    $i='1';
    while($times = mysqli_fetch_array($result)){
        $member_time = $times['clock_time'];
        $member_status = $times['status'];
        echo '<tr><td>'.$i.'</td>';
        echo '<td>'.$member_time.'</td>';
        $time_res = strtotime($member_time);
        if($member_status == 1){
            echo '<td>正常打卡</td>'?>
            <td><a href="conn_userchange.php?name=<?=$name?>&member_status='2'&member_res=<?=$time_res?>">旷工</a>&nbsp;
                <a href="conn_userchange.php?name=<?=$name?>&member_status='3'&member_res=<?=$time_res?>">请假</a>&nbsp;
                <a href="conn_userchange.php?name=<?=$name?>&member_status='4'&member_res=<?=$time_res?>">迟到</a>
            </td></tr>
<?php
        }if($member_status == 2){
            echo '<td>旷工</td>';
            ?>
            <td><a href="conn_userchange.php?name=<?=$name?>&member_res=<?=$time_res?>&member_status='1'">正常打卡</a>&nbsp;
                <a href="conn_userchange.php?name=<?=$name?>&member_res=<?=$time_res?>&member_status='3'">请假</a>&nbsp;
                <a href="conn_userchange.php?name=<?=$name?>&member_res=<?=$time_res?>&member_status='4'">迟到</a>
            </td></tr>
<?php
        }if($member_status == 3){
            echo '<td>请假</td>';
            ?>
            <td><a href="conn_userchange.php?name=<?=$name?>&member_res=<?=$time_res?>&member_status='1'">正常打卡</a>&nbsp;
                <a href="conn_userchange.php?name=<?=$name?>&member_res=<?=$time_res?>&member_status='2'">旷工</a>&nbsp;
                <a href="conn_userchange.php?name=<?=$name?>&member_res=<?=$time_res?>&member_status='4'">迟到</a>
            </td></tr>
<?php
        }if($member_status == 4){
            echo '<td>迟到</td>';?>
            <td><a href="conn_userchange.php?name=<?=$name?>&member_res=<?=$time_res?>&member_status='1'">正常打卡</a>&nbsp;
                <a href="conn_userchange.php?name=<?=$name?>&member_res=<?=$time_res?>&member_status='2'">旷工</a>&nbsp;
                <a href="conn_userchange.php?name=<?=$name?>&member_res=<?=$time_res?>&member_status='3'">请假</a>
            </td></tr>
        <?php
        }
        $i++;
    }
    
    ?>

  </tbody>
  copyright@
</table>