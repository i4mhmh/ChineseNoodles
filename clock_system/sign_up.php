<!DOCTYPE html>
<html lang="zh-CN">
<title>注册</title>

<div align="center" style=" background-color:#0054A7">  
<table cellpadding="0" cellspacing="0" width="1200" height="100" align="center" background="/images/top.png">
<tbody><tr>
</table>
</div>
<?php header('Content-Type: text/html; charset=utf-8');
include('theme_ple.php');
include('title.php');
@$status = $_GET['status'];
if($status == '0'){
    echo'用户名不能为空';
}elseif($status == '1'){
    echo '两次输入的密码不同';
}

?>
<link rel="stylesheet" href="bootstrap/css/signin.css">
<body>
<div class="container">

  <form class="form-signin" action="./connect/membersign_up.php" method="post"">
    <center><h2 class="form-signin-heading">注册页面</h2></center>  
    <div class="input-group">
            <span class="input-group-addon">工号: </span>
            <label for="inputuser" class="sr-only">工号</label>
            <input type='text' id='inputuser' class="form-control" name="number" required>
            </div>  
            <br>  
    <div class="input-group">
    <span class="input-group-addon">用户名: </span>
    <label for="inputuser" class="sr-only">用户名</label>
    <input type='text' id='inputuser' class="form-control" name="user" required>
    </div>  
    <br>
    <div class="input-group">
      <span class="input-group-addon">密&nbsp;&nbsp;&nbsp;&nbsp;码: </span>
      <label for="inputPassword" class="sr-only">密码</label>
      <input type='text' id='inputPassword' class="form-control" name="passwd" required>
      </div> 
      <br>
    <div class="input-group">
            <span class="input-group-addon">确认密码: </span>
            <label for="inputPassword" class="sr-only">密码</label>
            <input type='text' id='inputPassword' class="form-control" name="passwd_confirm" required>
    </div> 
    <br>
    <div class="input-group">
            <span class="input-group-addon">真实姓名: </span>
            <label for="inputPassword" class="sr-only">姓名</label>
            <input type='text' id='inputPassword' class="form-control" name="name" required>
    </div> 
    <br>
    <div class="input-group">
            <span class="input-group-addon">性&nbsp;&nbsp;&nbsp;&nbsp;别: </span>
            <label for="inputPassword" class="sr-only">性别</label>
            <input type='text' id='inputPassword' class="form-control" name="sex" required>
    </div> 
    <br>
    <div class="input-group">
            <span class="input-group-addon">Q&nbsp;&nbsp;&nbsp;&nbsp;Q: </span>
            <label for="inputPassword" class="sr-only">QQ</label>
            <input type='text' id='inputPassword' class="form-control" name="QQ" required>
    </div> 
    <br>
    <div class="input-group">
            <span class="input-group-addon">邮&nbsp;&nbsp;&nbsp;&nbsp;箱: </span>
            <label for="inputPassword" class="sr-only">邮箱</label>
            <input type='email' id='email' class="form-control" name="email" required>
    </div> 
    <br>
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
  </form>

</div> <!-- /container -->

</body>

</html>