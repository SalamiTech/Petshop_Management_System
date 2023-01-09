
<?php
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){

               $company_name = trim($_POST['company_name']);
               $contact_person = trim($_POST['contact_person']);
               $email = trim($_POST['email']);
               $contact_number = trim($_POST['contact_number']);
               $website = trim($_POST['website']);        
               $about_company = trim($_POST['about_company']);
               $username = trim($_POST['username']);
               $password = trim($_POST['password']);

               $Petshop->add_vendor($company_name, $contact_person, $email, $contact_number, $website, $about_company, $username, $password);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Add Vendor Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/vendor.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>