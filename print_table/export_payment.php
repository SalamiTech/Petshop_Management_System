<?php

	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=Export_payment.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");

	error_reporting(0);

	session_start();

    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');


   if(!isset($_SESSION['logged_in']))
    {
       header("location:../index.php");
    }else{

    $user_session = trim($_SESSION['user_no']);
    $pay = new Petshop_class();
    $payments = $pay->fetch_payment();
	
	$output = "";
	
	if(ISSET($_POST['export'])){
		$output .="
			<table>
				<thead>
					<tr>
	                    <th>Reference No.</th>
	                    <th>Amount Paid</th>
	                    <th>Remarks</th>
	                    <th>Payment Status</th>
	                    <th>Customer</th>
	                    <th>Paid By</th>
	                    <th>Process By</th>
					</tr>
				<tbody>
		";

			//$data = $db->query("SELECT * FROM tbl_payment")->fetchAll();
	    	// and somewhere later:
	    	foreach ($payments as $fetch) {

		$output .= "
					<tr>
						<td>".htmlentities($fetch['reference_no'])."</td>
						<td>&#8369;".htmlentities(number_format($fetch['amount_paid'],2))."</td>
						<td>".htmlentities($fetch['status'])."</td>
						<td>".ucfirst(htmlentities($fetch['remarks']))."</td>
						<td>".htmlentities($fetch['customers'])."</td>
						<td>".ucfirst(htmlentities($fetch['paid_by']))."</td>
						<td>".ucfirst(htmlentities($fetch['process_by']))."</td>
					</tr>
		";
		}
		
		$output .="
				</tbody>
				
			</table>
		";
		
		echo $output;
	}
 } 
	
?>