<?php
include('check_admin.php');
@include('/connect/conn.php');

@$ex_it = $_GET['ex_it'];
if($ex_it == '1'){
    session_destroy();
    header('location:/index.php');
}

?>
<mata name='viewport' content='width=device-width,initial-scale=1'></mata>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
<title>管理员主页</title>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            <a class="navbar-brand" href="welcome_admin.php">管理员主页</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="./member_msg.php">员工信息</a></li>
                <li><a href="./admin_leaderboard.php">排行榜</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./welcome_admin.php?ex_it=1">退出</a></li>
            </ul>        
            </div>
        </div>
    </nav>

</body>
<div class="jumbotron">
      <div class="container">
        <h1>Hello, Administrator!</h1>
        <p>你只能对员工的打卡信息操作</p>
      </div>
    </div>

