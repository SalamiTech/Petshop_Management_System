
<?php
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){
               $category_name = trim($_POST['category_name']);
               $category_id = trim($_POST['category_id']);

               $Petshop->edit_category($category_name, $category_id);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Edit Category Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/category.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>