
<?php
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){

               $vendor_id = trim($_POST['vendor_id']);

               $Petshop->delete_vendor($vendor_id);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Delete Vendor Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/vendor.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>