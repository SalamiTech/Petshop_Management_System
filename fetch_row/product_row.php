<?php 
	include_once('../config/conn/db_connection.php');
	 if(isset($_POST['product_id'])){ 	
	    $id = trim($_POST['product_id']);
		$stmt = $db->query("SELECT * FROM `tbl_product` WHERE product_id = '$id'");	 
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($row);
    }
?>