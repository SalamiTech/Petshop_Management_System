
<?php
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
               $birth_date = trim($_POST['birth_date']);
               $username = trim($_POST['username']);
               $password = trim($_POST['password']);
               $status = trim($_POST['status']);
               $gender = trim($_POST['gender']);
               $client_id = trim($_POST['client_id']);

               $Petshop->edit_client($first_name, $middle_name, $last_name, $complete_address, $email_address, $contact_number, $civil_status, $birth_date, $username, $password, $status, $gender, $client_id);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Edit Client Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/client_form.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>