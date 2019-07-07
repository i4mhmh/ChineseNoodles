<?php
include('theme_ple.php');
include('title.php');
?>
<link rel="stylesheet" href="bootstrap/css/signin.css">
<body>
<div class="container">

  <form class="form-signin" action="./connect/conn_index.php" method="post"">
    <center><h2 class="form-signin-heading">用户名或密码错误,请确认后重新输入</h2></center>    
    <div class="input-group">
    <span class="input-group-addon">用户名: </span>
    <label for="inputuser" class="sr-only">用户名</label>
    <input type='text' id='inputuser' class="form-control" name="username" required>
    </div>  
    <!--input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus-->
    <br>
    <div class="input-group">
      <span class="input-group-addon">密&nbsp;&nbsp;&nbsp;&nbsp;码: </span>
      <label for="inputPassword" class="sr-only">密码</label>
      <input type='text' id='inputPassword' class="form-control" name="password" required>
      </div> 

    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
  </form>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>