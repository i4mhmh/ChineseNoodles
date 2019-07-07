<?php
include('check_admin.php');
@include('/connect/conn.php');
@$result = $_GET['result'];
if($result){
    if($result == 'ok'){
        echo '删除成功';
    }elseif($result == 'wrong'){
        echo'删除失败,请稍后再试';
    }else{
        echo '遇到了未知问题请联系管理员';
    }
}
//显示所有人名称可供查询
$sql_name = 'select username from members';
$result_names = mysqli_query($conn,$sql_name);
?>

<mata name='viewport' content='width=device-width,initial-scale=1'></mata>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
<title>员工打卡页面</title>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            <a class="navbar-brand" href="welcome_admin.php">管理员主页</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="./member_msg.php">员工打卡信息</a></li>
                <li><a href="./admin_leaderboard.php">排行榜</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./welcome_admin.php?ex_it=1">退出</a></li>
            </ul>        
            </div>
        </div>
    </nav>
    <br></br><br></br><br></br>
    <div class="jumbotron">
      <div class="container">
          <center>
          <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">姓名</th>
      <th scope="col">查看详细信息</th>
      <th scope="col">删除</th>

    </tr>
  </thead>
  <tbody>
  <?php
//循环输出每个人的名字信息 用于查看，修改
while($data = mysqli_fetch_array($result_names)){
    $name = $data['username'];
    echo '<tr><td>'.$name.'</td>';?>
    <td><a href="<?php echo "/connect/conn_userdetail.php?name=".$name ?>">查看打卡信息</a></td>
    <td><a href="<?php echo "/connect/conn_userdelete.php?name=".$name ?>">删除员工</a></td>
    
    <?php 
    }
    ?>
      <td>
    </tr>
    
  </tbody>
</table>
      
          </center>
      </div>
    </div>
</body>

