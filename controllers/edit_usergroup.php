
<?php
error_reporting(0);
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){


               $user_id = trim($_POST['user_id']);
               $status = trim($_POST['status']);
               $description = trim($_POST['description']);
               $allow_add = trim($_POST['allow_add']);
               $allow_edit = trim($_POST['allow_edit']);
               $allow_delete = trim($_POST['allow_delete']);
               $allow_export = trim($_POST['allow_export']);
               $usergroup_id = trim($_POST['usergroup_id']);
               // $notallow_delete = trim($_POST['notallow_delete']);

               $Petshop->edit_usergroup($user_id, $status, $description, $allow_add, $allow_edit, $allow_delete, $allow_export, $usergroup_id);

                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Edit User Group Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/usergroup.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>