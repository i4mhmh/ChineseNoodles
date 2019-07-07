<!DOCTYPE html>
<html lang="zh-CN">
<title>主页</title>
<mata name='viewport' content='width=device-width,initial-scale=1'></mata>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">不会有BUG的打卡系统</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">主页</a></li>
                <li><a href="./leaderboard.php">排行榜</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./sign_in.php">登陆</a></li>
                <li><a href="./sign_up.php">注册</a></li>
                <li><a href="./admin.php">管理员登陆</a></li>
            </ul>        
            </div>
        </div>
    </nav>
    <!-- 依照轮子写好标签栏 -->
    
    <br><br><br><br><br><br><br>
    <div class="container theme-showcase" role="main">
        <div class="jumbotron">
            <h2>最新公告</h2>
            <br>
            <p>没有打卡的人员会被记为旷工,可以在排行榜页面查看总打卡次数!</p>
        </div>
    </div>    
    <!--欢迎界面-->
	
	<div align='right' id="footer">
		<span style="font-family:arial;">Copyright &copy; 2019 全世界的面我都吃一遍&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br><a href='https://github.com/i4mhmh'>github:i4mhmh</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	</div>

</body>
</html>
<?php
header('Content-Type: text/html; charset=utf-8');
@$a = $_GET[a];
echo $a;
?>
</center>