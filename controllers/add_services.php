
<?php
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){

               $reference_no = trim($_POST['reference_no']);
               $service = trim($_POST['service']);
               $service_detail = trim($_POST['service_detail']);
               $vendor = trim($_POST['vendor']);
               $service_fee = trim($_POST['service_fee']);

               $Petshop->add_services($reference_no, $service, $service_detail, $vendor, $service_fee);

                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Add Services Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/services.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>