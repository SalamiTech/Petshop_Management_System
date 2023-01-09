<?php 
	include_once('../config/conn/db_connection.php');
	 if(isset($_POST['productcategory_id'])){ 	
	    $id = trim($_POST['productcategory_id']);
		$stmt = $db->query("SELECT * FROM `tbl_productcategory` WHERE productcategory_id = '$id'");	 
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($row);
    }
?>