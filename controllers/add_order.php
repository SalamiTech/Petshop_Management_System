
<?php
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){

               $reference_no = trim($_POST['reference_no']);
               $customer_name = trim($_POST['customer_name']);
               $item = trim($_POST['item']);
               $qty = trim($_POST['qty']);
               $price = trim($_POST['price']);
               $status = trim($_POST['status']);
               $remarks = trim($_POST['remarks']);

               $Petshop->add_order($reference_no, $customer_name, $item, $qty, $price, $status, $remarks);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Add Order Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/client-order.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>