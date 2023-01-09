
<?php
error_reporting(0);
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){


               $full_name = trim($_POST['full_name']);
               $username = trim($_POST['username']);
               $pass1=trim($_POST['password']);
               $pass=sha1($pass1);
               $salt="a1Bz20ym1wql90834wEz02";
               $password = $salt.$pass;
                $status=trim($_POST['status']);
               $contact = trim($_POST['contact']);
               $email = trim($_POST['email']);
               $user_category = trim($_POST['user_category']);
               $status = trim($_POST['status']);
               $user_id = trim($_POST['user_id']);

               $Petshop->edit_user($full_name, $username, $password, $contact, $email, $user_category, $status, $user_id);

                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Edit User Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/user.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>