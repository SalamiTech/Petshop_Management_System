
<?php
error_reporting(0);
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){

               $first_name = trim($_POST['first_name']);
               $middle_name = trim($_POST['middle_name']);
               $last_name = trim($_POST['last_name']);
               $complete_address = trim($_POST['complete_address']);
               $email_address = trim($_POST['email_address']);
               $contact_number = trim($_POST['contact_number']);
               $civil_status = trim($_POST['civil_status']);
               $age = trim($_POST['age']);
               $birth_date = trim($_POST['birth_date']);
               $username = trim($_POST['username']);
               $password = trim($_POST['password']);
               $status = trim($_POST['status']);
               $gender = trim($_POST['gender']);

              $image = addslashes(file_get_contents($_FILES['image_profile']['tmp_name']));
              $images ="client_uploads/". addslashes($_FILES['image_profile']['name']);
              $image_size = getimagesize($_FILES['image_profile']['tmp_name']);
             // move_uploaded_file($_FILES["images"]["tmp_name"], $images);

              move_uploaded_file($_FILES["image_profile"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/Petshop_Management_System/client_uploads/" .   addslashes($_FILES["image_profile"]["name"]));

               $Petshop->add_client2($first_name, $middle_name, $last_name, $complete_address, $email_address,  $contact_number, $civil_status, $age, $birth_date, $username, $password, $status, $gender, $images);

                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Add Client Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/registrationform.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>