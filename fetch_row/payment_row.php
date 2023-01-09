<?php 
	include_once('../config/conn/db_connection.php');
	 if(isset($_POST['payment_id'])){ 	
	    $id = trim($_POST['payment_id']);
		$stmt = $db->query("SELECT * FROM `tbl_payment` WHERE payment_id = '$id'");	 
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($row);
    }
?>