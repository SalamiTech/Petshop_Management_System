
<?php
   // session_start();
 error_reporting(0);
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){

               $reference_no = trim($_POST['reference_no']);
               $amount_paid = trim($_POST['amount_paid']);
               $status = trim($_POST['status']);
               $remarks = trim($_POST['remarks']);
               $customers = trim($_POST['customers']);
               $paid_by = trim($_POST['paid_by']);
               $process_by = trim($_POST['process_by']);
               $payment_id = trim($_POST['payment_id']);

               $Petshop->edit_payment($reference_no, $amount_paid, $status, $remarks, $customers, $paid_by, $process_by, $payment_id);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Edit Payment Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/payment.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>