<?php
date_default_timezone_set("Asia/Shanghai");
$filename = "logs.txt";

$file = fopen($filename,"a+");
$t = date("Y-m-d_H:i:s");
$log = "$t $_SERVER[REMOTE_ADDR] $_SERVER[REQUEST_METHOD] $_SERVER[REQUEST_URI]";

$iipp=$_SERVER["REMOTE_ADDR"];
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$rawdata = file_get_contents("php://input");
	$log.="POST:$rawdata";
	
}
$log.="\n";
fwrite($file,$log);
fclose($file);

?>
