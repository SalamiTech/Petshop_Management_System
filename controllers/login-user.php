<?php 

    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');
    $Petshop = new Petshop_class();

	
	if(isset($_POST)){
		$username=trim($_POST['username']);
		$password=trim($_POST['password']);
		$status=trim($_POST['status']);

	    $Petshop->Login_user($username, $password, $status);

	}
?>