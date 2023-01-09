<?php 
	include_once('../config/conn/db_connection.php');
	 if(isset($_POST['usergroup_id'])){ 	
	    $id = trim($_POST['usergroup_id']);
		$stmt = $db->query("SELECT *,a.status as stat FROM tbl_usergroup a INNER JOIN tbl_user b ON a.user_id = b.user_id WHERE a.usergroup_id = '$id'");	 
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($row);
    }
?>