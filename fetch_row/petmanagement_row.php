<?php 
	include_once('../config/conn/db_connection.php');
	 if(isset($_POST['petmanagement_id'])){ 	
	    $id = trim($_POST['petmanagement_id']);
		$stmt = $db->query("SELECT * FROM `tbl_petmanagement` WHERE petmanagement_id = '$id'");	 
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($row);
    }
?>