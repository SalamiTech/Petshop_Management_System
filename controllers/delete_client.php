
<?php
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){
               $client_id = trim($_POST['client_id']);

               $Petshop->delete_client($client_id);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Delete Client Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/client_form.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>