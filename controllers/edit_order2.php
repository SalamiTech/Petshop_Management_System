
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
               $order_id = trim($_POST['order_id']);

               $Petshop->edit_order2($reference_no, $customer_name, $item, $qty, $price, $status, $remarks, $order_id);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Edit Order Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/vendor-order.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>