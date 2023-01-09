<?php 
	include_once('../config/conn/db_connection.php');
	 if(isset($_POST['category_id'])){ 	
	    $id = trim($_POST['category_id']);
		$stmt = $db->query("SELECT * FROM `tbl_category` WHERE category_id = '$id'");	 
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($row);
    }
?>