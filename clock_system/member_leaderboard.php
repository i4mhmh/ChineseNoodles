<?php
    header('Content-Type: text/html; charset=utf-8');
    @include('check.php');
    include_once('./connect/conn.php');
    $sql_grades = 'select username,clock_times from members order by clock_times DESC';
    $result = mysqli_query($conn,$sql_grades);
    
?>

<html>
<head><title>个人中心</title></head>

<mata name='viewport' content='width=device-width,initial-scale=1'></mata>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
<link href="./bootstrap/css/jumbotron.css" rel="stylesheet">

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">不会有BUG的打卡系统</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="./welcome.php">主页</a></li>
                <li><a href="./member_leaderboard.php">排行榜</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./personal_info.php">个人打卡记录</a></li>
                <li><a href="./welcome.php">个人中心</a></li>
                <li><a href="./welcome.php?ex_it=1">退出</a></li> 
            </ul>        
            </div>
        </div>
    </nav>
    <br><br><br><br><br>
    <center><h2 class="sub-header">打卡总记录</h2></center>
    <br><br>
          <div  class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>名次&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>姓名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>打卡次数</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                $i ='1';
                $data=array();
                while($msg = mysqli_fetch_array($result)){
                    $member_name = $msg['username'];
                    $clock_times = $msg['clock_times'];
                    $data[]=array($member_name,$clock_times);
                    echo '<tr>'.'<td>'.$i.'</td>'.'<td>'.$member_name.'</td>'.'<td>'.$clock_times.'</td>'.'</tr>';
                    $i++;
                }
                ?>

              </tbody>
            </table>
          </div>
        
    <!--欢迎界面-->
</body>
</html>