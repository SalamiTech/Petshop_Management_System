
<?php
error_reporting(0);
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){

               $description = trim($_POST['description']);
               $category_name = trim($_POST['category_name']);
               $vendor = trim($_POST['vendor']);
               $status = trim($_POST['status']);

              $image = addslashes(file_get_contents($_FILES['images']['tmp_name']));
              $images ="uploads/". addslashes($_FILES['images']['name']);
              $image_size = getimagesize($_FILES['images']['tmp_name']);
             // move_uploaded_file($_FILES["images"]["tmp_name"], $images);

              move_uploaded_file($_FILES["images"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/Petshop_Management_System/uploads/" .   addslashes($_FILES["images"]["name"]));


               $Petshop->add_petmanagement($description, $category_name, $vendor, $status, $images);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Add PET-Mnagement Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/pet_management.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>