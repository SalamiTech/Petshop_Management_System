<?php 
	include_once('../config/conn/db_connection.php');
	 if(isset($_POST['client_id'])){ 	
	    $id = trim($_POST['client_id']);
		$stmt = $db->query("SELECT * FROM `tbl_client` WHERE client_id = '$id'");	 
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($row);
    }
?>