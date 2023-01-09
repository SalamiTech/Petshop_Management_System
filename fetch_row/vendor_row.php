<?php 
	include_once('../config/conn/db_connection.php');
	 if(isset($_POST['vendor_id'])){ 	
	    $id = trim($_POST['vendor_id']);
		$stmt = $db->query("SELECT * FROM `tbl_vendor` WHERE vendor_id = '$id'");	 
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($row);
    }
?>