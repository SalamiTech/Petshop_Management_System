
<?php
 ###############################################################################################
// WebDeveloper: junil toledo => Wag po natin ibinta sa iba kung libre mo na nakuha sa akin... //
//contact number: 09991050748                                                                  //
//gmail: toledojonel557@gmail.com                                                              //
 ###############################################################################################
class Petshop_class
    {
        private $db = null;
        private $_supportFormats = ['image/png','image/jpeg','image/jpg','image/gif'];



   //=================login user admin=================//

        public function admin_user($username, $password, $status) {
              global $db;
              session_start();
               $stmt = $db->prepare("SELECT * FROM tbl_user WHERE username = :uname and password= :upass and status= :stat");
               $stmt->execute(array(':uname' => $username, ':upass' => $password, ':stat' => $status));
               $row=$stmt->fetch(PDO::FETCH_ASSOC);

                if ($stmt->rowCount() > 0){
                 
                    $_SESSION['user_no']   = htmlentities($row['username']);
                    $_SESSION['logged_in'] = true;

                    echo '1';
                  
                      exit();
                }else{
                 //echo '0';
                    ?>
                        <span><i class="fa fa-user"></i> Login Failed. User not Found.</span>
                    <?php 
                }
            }

   //=================end login user admin=================//


 //=================login user customer=================//

        public function Login_user($username, $password, $status) {
              global $db;
              session_start();
               $stmt = $db->prepare("SELECT * FROM tbl_client WHERE username = :uname and password= :upass  and status= :stat");
               $stmt->execute(array(':uname' => $username, ':upass' => $password, ':stat' => $status));
               $row=$stmt->fetch(PDO::FETCH_ASSOC);

                if ($stmt->rowCount() > 0){
                 
                    $_SESSION['user_no']   = htmlentities($row['username']);
                    $_SESSION['logged_in'] = true;

                    echo '1';
                  
                      exit();
                }else{
                    //echo '0';
                    ?>
                        <span><i class="fa fa-user"></i> Login Failed. User not Found.</span>
                    <?php 
                }
            }

   //=================end login user customer=================//

   //=================login vendor=================//

        public function vendor_user($username, $password) {
              global $db;
              session_start();
               $stmt = $db->prepare("SELECT * FROM tbl_vendor WHERE username = :uname and password= :upass");
               $stmt->execute(array(':uname' => $username, ':upass' => $password));
               $row=$stmt->fetch(PDO::FETCH_ASSOC);

                if ($stmt->rowCount() > 0){
                 
                    $_SESSION['user_no']   = htmlentities($row['username']);
                    $_SESSION['logged_in'] = true;

                    echo '1';
                  
                      exit();
                }else{
                    //echo '0';
                    ?>
                        <span><i class="fa fa-user"></i> Login Failed. User not Found.</span>
                    <?php 
                }
            }

   //=================end login vendor=================//

 //=================count Total Pets table=================//

        public function count_pets() {
                global $db;

                $query = $db->prepare("SELECT COUNT(category_name) as cat_name FROM tbl_petmanagement");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end count Total Pets  table=================//

 //=================count Total Petproducts table=================//

        public function count_petproducts() {
                global $db;

                $query = $db->prepare("SELECT COUNT(product_name) as pro_name FROM tbl_product");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end count Total Petproducts  table=================//


  //=================count Total vendors table=================//

        public function count_vendors() {
                global $db;

                $query = $db->prepare("SELECT COUNT(username) as uname FROM tbl_vendor");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end count Total vendors  table=================//


  //=================count Total incomes table=================//

        public function count_incomes() {
                global $db;

                $query = $db->prepare("SELECT SUM(amount_paid) as apaid FROM tbl_payment");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end count Total incomes  table=================//


  //=================count Total services table=================//

        public function count_services() {
                global $db;

                $query = $db->prepare("SELECT SUM(service_fee) as s_fee FROM  tbl_services");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end count Total services  table=================//


  //=================count Total qty  order table=================//

        public function count_qty() {
                global $db;

                $query = $db->prepare("SELECT SUM(qty) as o_qty FROM  tbl_order");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end count Total qty  order table=================//



  //=================count Total price  order table=================//

        public function count_price() {
                global $db;

                $query = $db->prepare("SELECT *  FROM  tbl_order WHERE `status` = 'Received' ");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end count Total price  order table=================//
  

    //=================fetching category table=================//

        public function fetch_category() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_category");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end fetching category table=================//

   //=================insert into category table=================//

         public function add_category($category_name){
               global $db;

                $stmt = $db->prepare("INSERT INTO tbl_category(`category_name`) VALUES(?)");
                $true = $stmt->execute([$category_name]);

              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into category table=================//

   //=================end update  category table=================//
        public function edit_category($category_name, $category_id){
            global $db;

            $sql = "UPDATE `tbl_category` SET  `category_name` = ? WHERE category_id=?";
            $update = $db->prepare($sql)->execute([$category_name, $category_id]);
            if ($update == true) {
                return true;
            } else {
                return false;
           }

       }

   //=================end update  category table=================//

   //================= delete  category table=================//

        public function delete_category($category_id){

            global $db;

            $sql = "DELETE FROM `tbl_category` WHERE category_id = ?";
            $delete = $db->prepare($sql)->execute([$category_id]);
            if ($delete == true) {
                return true;
            } else {
                return false;
            }
        }

     //=================end delete  category table=================/


    //=================fetching petmanagement table=================//

        public function fetch_petmanagement() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_petmanagement");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end fetching petmanagement table=================//


     //=================insert into petmanagement table=================//

         public function add_petmanagement($description, $category_name, $vendor, $status, $images){
               global $db;


                $stmt = $db->prepare("INSERT INTO tbl_petmanagement(`description`,`category_name`,`vendor`,`status`,`images`) VALUES(?,?,?,?,?)");
                $true = $stmt->execute([$description, $category_name, $vendor, $status, $images]);


              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into petmanagement table=================//


   //=================end update  petmanagement table=================//
        public function edit_petmanagement($description, $category_name, $vendor, $status, $petmanagement_id){
            global $db;

            $sql = "UPDATE `tbl_petmanagement` SET  `description` = ?, `category_name` = ?, `vendor` = ?, `status` = ?  WHERE petmanagement_id=?";
            $update = $db->prepare($sql)->execute([$description, $category_name, $vendor, $status, $petmanagement_id]);
            if ($update == true) {
                return true;
            } else {
                return false;
           }

       }

      //=================end update  petmanagement table=================//

       //================= delete  petmanagement table=================//

        public function delete_petmanagement($petmanagement_id){

            global $db;

            $sql = "DELETE FROM `tbl_petmanagement` WHERE petmanagement_id = ?";
            $delete = $db->prepare($sql)->execute([$petmanagement_id]);
            if ($delete == true) {
                return true;
            } else {
                return false;
            }
        }

     //=================end delete  petmanagement table=================/

    //=================fetching productcategory table=================//

        public function fetch_productcategory() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_productcategory");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end fetching productcategory table=================//

    //=================insert into productcategory table=================//

         public function add_productcategory($productcategory_name){
               global $db;

                $stmt = $db->prepare("INSERT INTO tbl_productcategory(`productcategory_name`) VALUES(?)");
                $true = $stmt->execute([$productcategory_name]);

              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into productcategory table=================//

    //=================end update  productcategory table=================//
        public function edit_productcategory($productcategory_name, $productcategory_id){
            global $db;

            $sql = "UPDATE `tbl_productcategory` SET  `productcategory_name` = ? WHERE productcategory_id=?";
            $update = $db->prepare($sql)->execute([$productcategory_name, $productcategory_id]);
            if ($update == true) {
                return true;
            } else {
                return false;
           }

       }

   //=================end update  productcategory table=================//

    //================= delete  productcategory table=================//

        public function delete_productcategory($productcategory_id){

            global $db;

            $sql = "DELETE FROM `tbl_productcategory` WHERE productcategory_id = ?";
            $delete = $db->prepare($sql)->execute([$productcategory_id]);
            if ($delete == true) {
                return true;
            } else {
                return false;
            }
        }

     //=================end delete  productcategory table=================/


    //=================fetching product table=================//

        public function fetch_product() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_product");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end fetching product table=================//



    //=================insert into product table=================//

         public function add_product($product_code, $product_name, $detail, $category, $qty, $vendor_price, $retail_price, $disc, $vendor, $status){
               global $db;

                $stmt = $db->prepare("INSERT INTO tbl_product(`product_code`, `product_name`, `detail`, `category`, `qty`, `vendor_price`, `retail_price`, `disc`, `vendor`, `status`) VALUES(?,?,?,?,?,?,?,?,?,?)");
                $true = $stmt->execute([$product_code, $product_name, $detail, $category, $qty, $vendor_price, $retail_price, $disc, $vendor, $status]);

              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into product table=================//

     //=================end update  product table=================//
        public function edit_product($product_code, $product_name, $detail, $category, $qty, $vendor_price, $retail_price, $disc, $vendor, $status, $product_id){
            global $db;

            $sql = "UPDATE `tbl_product` SET `product_code` = ?, `product_name` = ?, `detail` = ?, `category` = ?, `qty` = ?, `vendor_price` = ?, `retail_price` = ?, `disc` = ?, `vendor` = ?, `status` = ? WHERE product_id=?";
            $update = $db->prepare($sql)->execute([$product_code, $product_name, $detail, $category, $qty, $vendor_price, $retail_price, $disc, $vendor, $status, $product_id]);
            if ($update == true) {
                return true;
            } else {
                return false;
           }

       }

   //=================end update  product table=================//


    //================= delete  product table=================//

        public function delete_product($product_id){

            global $db;

            $sql = "DELETE FROM `tbl_product` WHERE product_id = ?";
            $delete = $db->prepare($sql)->execute([$product_id]);
            if ($delete == true) {
                return true;
            } else {
                return false;
            }
        }

     //=================end delete  product table=================/



    //=================fetching vendor table=================//

        public function fetch_vendor() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_vendor");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end fetching vendor table=================//

  //=================insert into vendor table=================//

         public function add_vendor($company_name, $contact_person, $email, $contact_number, $website, $about_company, $username, $password){
               global $db;

                $stmt = $db->prepare("INSERT INTO tbl_vendor(`company_name`, `contact_person`, `email`, `contact_number`, `website`, `about_company`, `username`, `password`) VALUES(?,?,?,?,?,?,?,?)");
                $true = $stmt->execute([$company_name, $contact_person, $email, $contact_number, $website, $about_company, $username, $password]);

              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into vendor table=================//

    //=================end update  vendor table=================//
        public function edit_vendor($company_name, $contact_person, $email, $contact_number, $website, $about_company, $username, $password, $vendor_id){
            global $db;

            $sql = "UPDATE `tbl_vendor` SET  `company_name` = ?, `contact_person` = ?, `email` = ?, `contact_number` = ?, `website` = ?, `about_company` = ?, `username` = ?, `password` = ? WHERE vendor_id=?";
            $update = $db->prepare($sql)->execute([$company_name, $contact_person, $email, $contact_number, $website, $about_company, $username, $password, $vendor_id]);
            if ($update == true) {
                return true;
            } else {
                return false;
           }

       }

   //=================end update  vendor table=================//

     //================= delete  vendor table=================//

        public function delete_vendor($vendor_id){

            global $db;

            $sql = "DELETE FROM `tbl_vendor` WHERE vendor_id = ?";
            $delete = $db->prepare($sql)->execute([$vendor_id]);
            if ($delete == true) {
                return true;
            } else {
                return false;
            }
        }

     //=================end delete  vendor table=================/

    //=================fetching client table=================//

        public function fetch_client() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_client");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end fetching client table=================//


  //=================insert into client table=================//

         public function add_client($first_name, $middle_name, $last_name, $complete_address, $email_address,  $contact_number, $civil_status, $birth_date, $username, $password, $status, $gender, $images){
               global $db;

                $stmt = $db->prepare("INSERT INTO tbl_client(`first_name`, `middle_name`, `last_name`, `complete_address`, `email_address`,  `contact_number`, `civil_status`, `birth_date`, `username`, `password`, `status`, `gender`,`image_profile`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $true = $stmt->execute([$first_name, $middle_name, $last_name, $complete_address, $email_address,  $contact_number, $civil_status, $birth_date, $username, $password, $status, $gender, $images]);

              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into client table=================//


  //=================insert into client table=================//

         public function add_client2($first_name, $middle_name, $last_name, $complete_address, $email_address,  $contact_number, $civil_status, $age, $birth_date, $username, $password, $status, $gender, $images){
               global $db;

                $stmt = $db->prepare("INSERT INTO tbl_client(`first_name`, `middle_name`, `last_name`, `complete_address`, `email_address`,  `contact_number`, `civil_status`, `age`, `birth_date`, `username`, `password`, `status`, `gender`,`image_profile`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $true = $stmt->execute([$first_name, $middle_name, $last_name, $complete_address, $email_address,  $contact_number, $civil_status, $age, $birth_date, $username, $password, $status, $gender, $images]);

              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into client table=================//

  //=================end update  client table=================//
        public function edit_client($first_name, $middle_name, $last_name, $complete_address, $email_address, $contact_number, $civil_status, $birth_date, $username, $password, $status, $gender, $client_id){
            global $db;

            $sql = "UPDATE `tbl_client` SET  `first_name` = ?, `middle_name` = ?, `last_name` = ?, `complete_address` = ?, `email_address` = ?, `contact_number` = ?, `civil_status` = ?, `birth_date` = ?, `username` = ?, `password` = ?, `status` = ?, `gender` = ? WHERE client_id=?";
            $update = $db->prepare($sql)->execute([$first_name, $middle_name, $last_name, $complete_address, $email_address, $contact_number, $civil_status, $birth_date, $username, $password, $status, $gender, $client_id]);
            if ($update == true) {
                return true;
            } else {
                return false;
           }

       }

   //=================end update  client table=================//



        //================= delete  client table=================//

        public function delete_client($client_id){

            global $db;

            $sql = "DELETE FROM `tbl_client` WHERE client_id = ?";
            $delete = $db->prepare($sql)->execute([$client_id]);
            if ($delete == true) {
                return true;
            } else {
                return false;
            }
        }

     //=================end delete  client table=================/

   //=================fetching services table=================//

        public function fetch_services() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_services");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end fetching services table=================//


     //=================insert into services table=================//

         public function add_services($reference_no, $service, $service_detail, $vendor, $service_fee){
               global $db;

                $stmt = $db->prepare("INSERT INTO tbl_services(`reference_no`, `service`, `service_detail`, `vendor`, `service_fee`) VALUES(?,?,?,?,?)");
                $true = $stmt->execute([$reference_no, $service, $service_detail, $vendor, $service_fee]);

              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into services table=================//

    //=================end update  services table=================//
        public function edit_services($reference_no, $service, $service_detail, $vendor, $service_fee, $services_id){
            global $db;

            $sql = "UPDATE `tbl_services` SET  `reference_no` = ?, `service` = ?, `service_detail` = ?, `vendor` = ?, `service_fee` = ? WHERE services_id=?";
            $update = $db->prepare($sql)->execute([$reference_no, $service, $service_detail, $vendor, $service_fee, $services_id]);
            if ($update == true) {
                return true;
            } else {
                return false;
           }

       }

   //=================end update  services table=================//

     //================= delete  services table=================//

        public function delete_services($services_id){

            global $db;

            $sql = "DELETE FROM `tbl_services` WHERE services_id = ?";
            $delete = $db->prepare($sql)->execute([$services_id]);
            if ($delete == true) {
                return true;
            } else {
                return false;
            }
        }

     //=================end delete  services table=================/

    //=================fetching user table=================//

        public function fetch_users() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_user");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end fetching user table=================//



     //=================insert into user table=================//

         public function add_user($images, $full_name, $username, $password, $contact, $email, $user_category, $status){
               global $db;

                $stmt = $db->prepare("INSERT INTO tbl_user(`avatar`, `full_name`, `username`, `password`, `contact`, `email`, `user_category`, `status`) VALUES(?,?,?,?,?,?,?,?)");
                $true = $stmt->execute([$images, $full_name, $username, $password, $contact, $email, $user_category, $status]);

              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into user table=================//



    //=================update user table=================//

         public function edit_user($full_name, $username, $password, $contact, $email, $user_category, $status, $user_id){
               global $db;

                 $sql = "UPDATE `tbl_user` SET  `full_name` = ?, `username` = ?, `password` = ?, `contact` = ?, `email` = ?, `user_category` = ?, `status` = ? WHERE user_id=?";
                 $update = $db->prepare($sql)->execute([$full_name, $username, $password, $contact, $email, $user_category, $status, $user_id]);


              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end update user table=================//

  //================= delete  user table=================//

        public function delete_user($user_id){

            global $db;

            $sql = "DELETE FROM `tbl_user` WHERE user_id = ?";
            $delete = $db->prepare($sql)->execute([$user_id]);
            if ($delete == true) {
                return true;
            } else {
                return false;
            }
        }

     //=================end delete  user table=================/


    //=================fetching payment table=================//

        public function fetch_payment() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_payment");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end fetching payment table=================//


     //=================insert into payment table=================//

         public function add_payment($reference_no, $amount_paid, $status, $remarks, $customers, $paid_by){
               global $db;

                $stmt = $db->prepare("INSERT INTO tbl_payment(`reference_no`, `amount_paid`, `status`, `remarks`, `customers`, `paid_by`) VALUES(?,?,?,?,?,?)");
                $true = $stmt->execute([$reference_no, $amount_paid, $status, $remarks, $customers, $paid_by]);

              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into payment table=================//


   //=================update payment table=================//

         public function edit_payment($reference_no, $amount_paid, $status, $remarks, $customers, $paid_by, $process_by, $payment_id){
               global $db;

                 $sql = "UPDATE `tbl_payment` SET  `reference_no` = ?, `amount_paid` = ?, `status` = ?, `remarks` = ?, `customers` = ?, `paid_by` = ?, `process_by` = ? WHERE payment_id=?";
                 $update = $db->prepare($sql)->execute([$reference_no, $amount_paid, $status, $remarks, $customers, $paid_by, $process_by, $payment_id]);


              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end update payment table=================//

        //================= delete  payment table=================//

        public function delete_payment($payment_id){

            global $db;

            $sql = "DELETE FROM `tbl_payment` WHERE payment_id = ?";
            $delete = $db->prepare($sql)->execute([$payment_id]);
            if ($delete == true) {
                return true;
            } else {
                return false;
            }
        }

     //=================end delete  payment table=================/


    //=================fetching usergroup table=================//

        public function fetch_usergroup() {
                global $db;
                $query = $db->prepare("SELECT *,a.status as stat FROM tbl_usergroup a INNER JOIN tbl_user b ON a.user_id = b.user_id");
                $query->execute(array());
                return $query->fetchAll();
            }

   //=================end fetching usergroup table=================//


    //=================fetching usergroup table=================//

          public function fetch_usergroupControl($user_session) {
                global $db;
                $query = $db->prepare("SELECT *,a.status as stat FROM tbl_usergroup a INNER JOIN tbl_user b ON a.user_id = b.user_id WHERE b.username = ?");
                $query->execute(array($user_session));
                return $query->fetchAll();

            }

   //=================end fetching usergroup table=================//


   //=================insert into usergroup table=================//

         public function add_usergroup($user_id, $status, $description, $allow_add, $allow_edit, $allow_delete, $allow_export){
               global $db;

                $stmt = $db->prepare("INSERT INTO tbl_usergroup(`user_id`, `status`, `description`, `allow_add`, `allow_edit`, `allow_delete`, `allow_export`) VALUES(?,?,?,?,?,?,?)");
                $true = $stmt->execute([$user_id, $status, $description, $allow_add, $allow_edit, $allow_delete, $allow_export]);

              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into usergroup table=================//

    //=================update usergroup table=================//

         public function edit_usergroup($user_id, $status, $description, $allow_add, $allow_edit, $allow_delete, $allow_export, $usergroup_id){
               global $db;

                 $sql = "UPDATE `tbl_usergroup` SET  `user_id` = ?, `status` = ?, `description` = ?, `allow_add` = ?, `allow_edit` = ?, `allow_delete` = ?, `allow_export` = ? WHERE usergroup_id=?";
                 $update = $db->prepare($sql)->execute([$user_id, $status, $description, $allow_add, $allow_edit, $allow_delete, $allow_export, $usergroup_id]);


              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end update usergroup table=================//

    //================= delete  usergroup table=================//

        public function delete_usergroup($usergroup_id){

            global $db;

            $sql = "DELETE FROM `tbl_usergroup` WHERE usergroup_id = ?";
            $delete = $db->prepare($sql)->execute([$usergroup_id]);
            if ($delete == true) {
                return true;
            } else {
                return false;
            }
        }

     //=================end delete  usergroup table=================/


   //=================fetching order by name =================//

        public function fetch_order($user_session) {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_order WHERE customer_name = ?");
                $query->execute(array($user_session));
                return $query->fetchAll();

            }

   //=================end fetching order by name =================//


   //=================fetching order table=================//

        public function fetch_orderAll() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_order");
                $query->execute(array());
                return $query->fetchAll();

            }

   //=================end fetching order table=================//

  //=================fetching Approved table=================//

        public function fetch_orderApproved() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_order WHERE `status` = 'Approved'");
                $query->execute(array());
                return $query->fetchAll();

            }

   //=================end fetching Approved table=================//

  //=================fetching Deliver table=================//

        public function fetch_orderDeliver() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_order WHERE `status` = 'To Deliver'");
                $query->execute(array());
                return $query->fetchAll();

            }

   //=================end fetching Deliver table=================//

   //=================fetching Deliver table=================//

        public function fetch_orderReceived() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_order WHERE `status` = 'Received'");
                $query->execute(array());
                return $query->fetchAll();

            }

   //=================end fetching Deliver table=================//

   //=================fetching Cancelled table=================//

        public function fetch_orderCancelled() {
                global $db;
                $query = $db->prepare("SELECT * FROM tbl_order WHERE `status` = 'Cancelled'");
                $query->execute(array());
                return $query->fetchAll();

            }

   //=================end fetching Cancelled table=================//



   //=================insert into order table=================//

         public function add_order($reference_no, $customer_name, $item, $qty, $price, $status, $remarks){
               global $db;

                $stmt = $db->prepare("INSERT INTO tbl_order(`reference_no`, `customer_name`, `item`, `qty`, `price`, `status`, `remarks`) VALUES(?,?,?,?,?,?,?)");
                $true = $stmt->execute([$reference_no, $customer_name, $item, $qty, $price, $status, $remarks]);

              if ($true == true) {
                     return true;
                  } else {
                     return false;
                }
            }
    //=================end insert into order table=================//



   //================= update  order table=================//
        public function edit_order($reference_no, $item, $qty, $price, $status, $remarks, $order_id){
            global $db;

            $sql = "UPDATE `tbl_order` SET  `reference_no` = ?, `item` = ?, `qty` = ?, `price` = ?, `status` = ?, `remarks` = ?  WHERE order_id=?";
            $update = $db->prepare($sql)->execute([$reference_no, $item, $qty, $price, $status, $remarks, $order_id]);
            if ($update == true) {
                return true;
            } else {
                return false;
           }

       }

      //=================end update  order table=================//

          //================= update  order2 table=================//
        public function edit_order2($reference_no, $customer_name, $item, $qty, $price, $status, $remarks, $order_id){
            global $db;

            $sql = "UPDATE `tbl_order` SET  `reference_no` = ?, `customer_name` = ?, `item` = ?, `qty` = ?, `price` = ?, `status` = ?, `remarks` = ?  WHERE order_id=?";
            $update = $db->prepare($sql)->execute([$reference_no, $customer_name, $item, $qty, $price, $status, $remarks, $order_id]);
            if ($update == true) {
                return true;
            } else {
                return false;
           }

       }

      //=================end update  order2 table=================//

      //================= delete  order table=================//

        public function delete_order($order_id){

            global $db;

            $sql = "DELETE FROM `tbl_order` WHERE order_id = ?";
            $delete = $db->prepare($sql)->execute([$order_id]);
            if ($delete == true) {
                return true;
            } else {
                return false;
            }
        }

     //=================end delete  order table=================/


    }
?>


