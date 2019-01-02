<?php
while (1) {
$pid=/*查看到的马的id*/;
@unlink('demo.php');
exec('kill -9 $pid');
}
?>