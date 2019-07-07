<?php
    header('Content-Type: text/html; charset=utf-8');
    @include('check.php');
    @include('./connect/conn_showlogs.php');
    while($data = mysqli_fetch_array($require_result)){
        $clock_name = $data['name'];
        $clock_time = $data['clock_time'];
    }
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
    <br></br><br></br>
    <div class="jumbotron">
        <div align='center' class="container">
        <h1><?=$name;?>,欢迎来到您的个人主页</h1>
        <br></br>
        <p>请确认您的个人信息并点击打卡按钮
        </p>
        <br></br>
        <center><p><a class="btn btn-info btn-lg" href="/connect/conn_clock.php" role="button">打卡</a></p>
        </center>
        
        
        </div>
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

