<?php
header('Content-type:text/html;charset=utf-8');
                    include_once('./connect/conn.php');
                    $sql_grades = 'select username,clock_times from members order by clock_times DESC';
                    $result = mysqli_query($conn,$sql_grades);
?>
<mata name='viewport' content='width=device-width,initial-scale=1'></mata>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
<title>排行榜</title>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            <a class="navbar-brand" href="welcome_admin.php">管理员主页</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="./member_msg.php">员工信息</a></li>
                <li class='active'><a href="./admin_leaderboard.php">排行榜</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./welcome_admin.php?ex_it=1">退出</a></li>
            </ul>        
            </div>
        </div>
    </nav>


    <center><h2 class="sub-header">打卡总记录</h2></center>
    <br><br>
          <div  class="table-responsive">
            <table class="table table-hover">
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