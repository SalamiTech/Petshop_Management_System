<?php 

    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');
    $Petshop = new Petshop_class();

	
	if(isset($_POST)){
		$username=trim($_POST['username']);
		$pass1=trim($_POST['password']);
		$pass=sha1($pass1);
        $salt="a1Bz20ym1wql90834wEz02";
        $password = $salt.$pass;
		$status=trim($_POST['status']);

		 $Petshop->admin_user($username, $password, $status);

	}
?>