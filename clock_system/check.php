<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
@$name = $_SESSION['user'];
if ($name == null){
    echo '请重新登录';
    header("Refresh:2; url=index.php");
    session_destroy();
    exit();
}

?>
<div align='right' id="footer">
		<span style="font-family:arial;">Copyright &copy; 2019 全世界的面我都吃一遍&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br><a href='https://github.com/i4mhmh'>github:i4mhmh</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	</div>