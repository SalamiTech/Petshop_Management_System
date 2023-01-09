
<?php
error_reporting(0);
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){


              $image = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
              $images ="user_uploads/". addslashes($_FILES['avatar']['name']);
              $image_size = getimagesize($_FILES['avatar']['tmp_name']);
             // move_uploaded_file($_FILES["images"]["tmp_name"], $images);

              move_uploaded_file($_FILES["avatar"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/Petshop_Management_System/user_uploads/" .   addslashes($_FILES["avatar"]["name"]));

               $full_name = trim($_POST['full_name']);
               $username = trim($_POST['username']);
               $pass1=trim($_POST['password']);
               $pass=sha1($pass1);
               $salt="a1Bz20ym1wql90834wEz02";
               $password = $salt.$pass;
               $contact = trim($_POST['contact']);
               $email = trim($_POST['email']);
               $user_category = trim($_POST['user_category']);
               $status = trim($_POST['status']);

               $Petshop->add_user($images, $full_name, $username, $password, $contact, $email, $user_category, $status);

                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Add User Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/user.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>