<?php
header('Content-type:text/html;charset=utf-8');
                    include_once('./connect/conn.php');
                    $sql_grades = 'select username,clock_times from members order by clock_times DESC';
                    $result = mysqli_query($conn,$sql_grades);
                    
?>
<!DOCTYPE html>
<html lang="zh-CN">
<title>排行榜</title>
<mata name='viewport' content='width=device-width,initial-scale=1'></mata>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
<link href="./bootstarp/css/dashboard.css" rel="stylesheet">
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">不会有BUG的打卡系统</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="./index.php">主页</a></li>
                <li class='active'><a href="#">排行榜</a></li>
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
	<div align='right' id="footer">
		<span style="font-family:arial;">Copyright &copy; 2019 全世界的面我都吃一遍&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br><a href='https://github.com/i4mhmh'>github:i4mhmh</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	</div>
</body>
</html>
