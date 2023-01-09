
<?php
   // session_start();
    include_once('../config/conn/db_connection.php');
    include_once('../config/class/petshop_class.php');

      $Petshop = new Petshop_class();
        if(ISSET($_POST)){

               $product_code = trim($_POST['product_code']);
               $product_name = trim($_POST['product_name']);
               $detail = trim($_POST['detail']);
               $category = trim($_POST['category']);
               $qty = trim($_POST['qty']);        
               $vendor_price = trim($_POST['vendor_price']);
               $retail_price = trim($_POST['retail_price']);
               $disc = trim($_POST['disc']);
               $vendor = trim($_POST['vendor']);
               $status = trim($_POST['status']);
               $product_id = trim($_POST['product_id']);

               $Petshop->edit_product($product_code, $product_name, $detail, $category, $qty, $vendor_price, $retail_price, $disc, $vendor, $status, $product_id);
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Edit Product Successfully!","Message!","success");';
                  echo '}, 1000);</script>';
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function(){';
                  echo 'window.location = "/Petshop_Management_System/product.php"';
                  echo '},1000)';
                  echo '</script>';
             
        }
?>