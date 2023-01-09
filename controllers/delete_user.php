
<?php
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){

               $user_id = trim($_POST['user_id']);

               $Petshop->delete_user($user_id);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Delete User Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/user.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>