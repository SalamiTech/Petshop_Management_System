
<?php
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){

               $description = trim($_POST['description']);
               $category_name = trim($_POST['category_name']);
               $vendor = trim($_POST['vendor']);
               $status = trim($_POST['status']);
               $petmanagement_id = trim($_POST['petmanagement_id']);

               $Petshop->edit_petmanagement($description, $category_name, $vendor, $status, $petmanagement_id);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Edit PET-Mnagement Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/pet_management.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>