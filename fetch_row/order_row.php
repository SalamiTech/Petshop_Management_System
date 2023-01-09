<?php 
	include_once('../config/conn/db_connection.php');
	 if(isset($_POST['order_id'])){ 	
	    $id = trim($_POST['order_id']);
		$stmt = $db->query("SELECT * FROM `tbl_order` WHERE order_id = '$id'");	 
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($row);
    }
?>