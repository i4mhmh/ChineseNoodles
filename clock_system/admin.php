<!DOCTYPE html>
<html lang="zh-CN">
<link rel="stylesheet" href="bootstrap/css/signin.css">
<title>管理员登陆</title>

<body>
<div class="container">

  <form class="form-signin" action="./connect/conn_admindex.php" method="post"">
    <center><h2 class="form-signin-heading">管理员登陆</h2></center>    
    <div class="input-group">
    <span class="input-group-addon">管理员账号: </span>
    <label for="inputuser" class="sr-only">用户名</label>
    <input type='text' id='inputuser' class="form-control" name="user" required>
    </div>  
    <!--input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus-->
    <br>
    <div class="input-group">
      <span class="input-group-addon">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码: </span>
      <label for="inputPassword" class="sr-only">密码</label>
      <input type='text' id='inputPassword' class="form-control" name="passwd" required>
      </div> 

    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
  </form>

</div> <!-- /container -->

</body>

</html>
<?php
include_once('theme_ple.php');
include_once('title.php');
header('Content-Type: text/html; charset=utf-8');
@$a = $_GET[a];
echo $a;
?>
</center>