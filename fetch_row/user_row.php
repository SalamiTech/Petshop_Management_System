<?php 
	include_once('../config/conn/db_connection.php');
	 if(isset($_POST['user_id'])){ 	
	    $id = trim($_POST['user_id']);
		$stmt = $db->query("SELECT * FROM `tbl_user` WHERE user_id = '$id'");	 
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($row);
    }
?>