<?php
    header('Content-Type: text/html; charset=utf-8');
    @include('check.php');
    @include('./connect/conn_showlogs.php');
    @include('./connect/conn.php');
    
?>
<html>
<head><title>个人打卡记录</title></head>

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
    <br></br><br></br>
    <center><h2 class="sub-header">打卡记录</h2></center>
    <br><br>
          <div  class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>顺序&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>打卡时间&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>状态</th>
                  
                </tr>
              </thead>
              <tbody>
              
                <?php
                $i = '1';
    while($data = mysqli_fetch_array($require_result)){
        switch ($data['status']){
        case '1':
            $clock_status = '正常打卡';
            break;
        case '2':
            $clock_status = '旷工';
            break;
        case '3':
            $clock_status ='请假';
            break;
        case '4':
            $clock_status ='迟到';
            break;
        }
    $clock_name = $data['name'];
    $clock_time = $data['clock_time'];
    echo '<tr><td>'.$i.'</td><td>'.$clock_time.'</td><td>'.$clock_status.'</td></tr>';
    $i++;
}
                ?>

              </tbody>
            </table>
          </div>
</body>
    <!-- 依照轮子写好标签栏 -->

</body>
</html>

<?php
    
    @$a = $_GET['a'];
    @$time = $_GET['time'];
    @$exit = $_GET['ex_it'];
    
    if ($a == 'failed'){
        echo '系统遇到了未知错误,请稍后再试';
    }
    if($time == 'exist'){
        echo '你今天已经打过卡了,请不要重复打卡';
    }
    if ($exit == 1){
        session_destroy();
        header('location:/index.php');
        
    }
?>

