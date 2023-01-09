
<?php

   session_start();

    include_once('config/conn/db_connection.php');
    include_once('config/class/petshop_class.php');



    if(!isset($_SESSION['logged_in']))
    {
       header("location:index.php");
    }else{

    $user_session = trim($_SESSION['user_no']);
    $pro = new Petshop_class();
    $productcategory = $pro->fetch_productcategory(); 
    $controls = $pro->fetch_usergroupControl($user_session); 


    foreach ($controls as $row) {

//////////////////////////allow add///////////////////////////////

           if (htmlentities($row['allow_add']) == 0) {
               echo "<style>
                     #control_add {
                       display: none;   
                      }        
                   </style>";
              } else if (htmlentities($row['allow_add']) == 1) {
               echo "<style>
                     #control_add {
                       display: block;   
                      }        
                   </style>";
              }
 //////////////////////////allow edit///////////////////////////////


//////////////////////////allow add///////////////////////////////

           if (htmlentities($row['allow_edit']) == 0) {
               echo "<style>
                     #control_edit {
                       display: none;   
                      }        
                   </style>";
              } else if (htmlentities($row['allow_edit']) == 1) {
               echo "<style>
                     #control_edit {
                       display: block;   
                      }        
                   </style>";
              }
 //////////////////////////allow edit///////////////////////////////

//////////////////////////allow delete///////////////////////////////

           if (htmlentities($row['allow_delete']) == 0) {
               echo "<style>
                     #control_delete {
                       display: none;   
                      }        
                   </style>";
              } else if (htmlentities($row['allow_delete']) == 1) {
               echo "<style>
                     #control_delete {
                       display: block;   
                      }        
                   </style>";
              }
 //////////////////////////allow delete///////////////////////////////


         }

?>

<?php include 'header/main-header.php';?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks" style="padding-top:30%"></i></a>
   
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong style="color: #007bff;" class="mt-2">Welcome !, <?= ucfirst($user_session) ;?></strong> &nbsp;<img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
   <!--                          <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a> -->

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="main.php">Dashboard</a></li>
                            <li class="active">Product Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Product Category Table</strong>
                                <button type="button" id="control_add" class="btn btn-success btn-sm" data-toggle="modal" data-target="#smallmodal2" style="margin-left:87%"><i class="fa fa-plus">Add</i>
                               </button>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                       <thead>
                                        <tr>
                                            <th>Product Category Name</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                       <?php
                                          foreach($productcategory as $procat){ ?>
                                        <td><?= ucfirst(htmlentities($procat['productcategory_name'])); ?></td>
                                        <td>
                                          <div class="d-flex">
                                            <div class="flex-1">
                                            <button type="button" id="control_edit" class="btn btn-info btn-xs procat" data-toggle="modal" data-target="#edit-productcategory" data-proctgry="<?= htmlentities($procat['productcategory_id']); ?>"><i class="fa fa-pencil"></i> 
                                            </button>
                                          </div>
                                          <div class="flex-1">
                                            <button type="button" id="control_delete" class="btn btn-danger btn-xs prodet" data-toggle="modal" data-target="#del-productcategory" data-del="<?= htmlentities($procat['productcategory_id']); ?>"><i class="fa fa-trash"></i> 
                                            </button>
                                          </div>
                                          </div>
                                        </td>
                                        </tr>

                                      <?php $found_rows = true; }  if (!isset($found_rows)) echo "<tr><td colspan ='2'><div class='alert alert-danger' style='font-weight:bold;'>No records found.</div></td></tr>"; 
                                      ?>   
            
                                    </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php } ?>
    <?php include 'modal/productcategory_modal.php';?>
    <?php include 'modal/productcategoryedit_modal.php';?>
    <?php include 'modal/productcategorydelete_modal.php';?>


        <script>
           $(document).ready(function() {   
               load_data();    
               var count = 1; 
               function load_data() {
                   $(document).on('click', '.procat', function() {
                    // $('#edit_category').modal('show');
                        var productcategory_id = $(this).data("proctgry");
                      // console.log(category_id);
                          getIDa(productcategory_id); //argument    
                 
                   });
                }

                 function getIDa(productcategory_id) {
                      $.ajax({
                          type: 'POST',
                          url: 'fetch_row/productcategory_row.php',
                          data: {
                              productcategory_id: productcategory_id
                          },
                          dataType: 'json',
                          success: function(response) {
                          $('#edit_procatid').val(response.productcategory_id);
                          $('#edit_procategoryname').val(response.productcategory_name);

                       }
                    });
                 }
           
           });
            
     </script>

          <script>
           $(document).ready(function() {   
               load_data();    
               var count = 1; 
               function load_data() {
                   $(document).on('click', '.prodet', function() {
                    // $('#delete-activity').modal('show');
                        let productcategory_id = $(this).data("del");
                       // console.log(logid);
                        getIDs_del(productcategory_id); //argument    
                 
                   });
                }

                 function getIDs_del(productcategory_id) {
                      $.ajax({
                          type: 'POST',
                          url: 'fetch_row/productcategory_row.php',
                          data: {
                              productcategory_id: productcategory_id
                          },
                          dataType: 'json',
                          success: function(responses2) {
                          $('#del_procatid').val(responses2.productcategory_id);
                          $('#del_procategoryname').val(responses2.productcategory_name);

                       }
                    });
                 }
           
           });
            
    </script>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>
