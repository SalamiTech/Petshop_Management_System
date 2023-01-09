
         <div class="modal fade" id="smallmodal3" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Add Product

                               </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST">
                            <div class="card-body">
                              <div class="" id="msgs_8"></div>
                                <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                  <label>Code</label>
                                  <input type="text" class="form-control" alt="product_code" id="product_code" placeholder="Enter Product Code.." autocomplete="off">
                                </div>
                              </div>
                               <div class="col-6">
                              <div class="form-group">
                                  <label>Name</label>
                                  <input type="text" class="form-control" alt="product_name" id="product_name" placeholder="Enter Product Name.. " autocomplete="off">
                                </div>
                              </div>
                               <div class="col-6">
                              <div class="form-group">
                                  <label>Detail</label>
                                  <input type="text" class="form-control" alt="detail" id="detail" placeholder="Enter Product Detail.." autocomplete="off">
                                </div>
                              </div>
                               <div class="col-6">
                              <div class="form-group">
                                  <label>Category</label>
                                <?php
                                  require_once 'config/conn/db_connection.php';
                                  $smt = $db->prepare('SELECT productcategory_name FROM tbl_productcategory');
                                  $smt->execute();
                                  $data = $smt->fetchAll();
                               ?>
                            <select class="form-control" alt="category" id="category">
                             <?php foreach ($data as $row): ?>
                               <option value="<?=ucfirst(htmlentities($row["productcategory_name"]));?>"><?=ucfirst(htmlentities($row["productcategory_name"]));?></option>
                             <?php endforeach ?>
                            </select>
                                </div>
                              </div>
                               <div class="col-3">
                              <div class="form-group">
                                  <label>Qty</label>
                                  <input type="number" class="form-control" min="1" alt="qty" id="qty" placeholder="0" autocomplete="off">
                                </div>
                              </div>
                               <div class="col-3">
                              <div class="form-group">
                                  <label>Vendor Price</label>
                                  <input type="text" class="form-control" alt="vendor_price" id="vendor_price" placeholder="P 00.00" autocomplete="off">
                                </div>
                              </div>
                               <div class="col-3">
                              <div class="form-group">
                                  <label>Retail Price</label>
                                  <input type="text" class="form-control" alt="retail_price" id="retail_price" placeholder="P 00.00" autocomplete="off" readonly="">
                                </div>
                              </div>
                               <div class="col-1">
                               </div>
                              <div class="col-2">
                              <div class="form-group">
                                  <label>Disc.</label>
                                  <input type="text" class="form-control" alt="disc" id="disc" placeholder="0%" autocomplete="off">
                                </div>
                              </div>
                                <div class="col-6">
                                <div class="form-group">
                                <label>Vendor</label>
                              <?php
                                  require_once 'config/conn/db_connection.php';
                                  $smt = $db->prepare('SELECT username FROM tbl_vendor');
                                  $smt->execute();
                                  $data = $smt->fetchAll();
                               ?>
                            <select class="form-control" id="vendor" alt="vendor">
                             <?php foreach ($data as $row): ?>
                               <option value="<?=ucfirst(htmlentities($row["username"]));?>"><?=ucfirst(htmlentities($row["username"]));?></option>
                             <?php endforeach ?>
                            </select>
                              </div>
                              </div>
                              
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Status</label>
                                  <input type="text" class="form-control" alt="status" id="status" placeholder="Enter Status Name.." autocomplete="off">
                                </div>
                              </div>
                              </div>
                              </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                               <button type="button" class="btn btn-primary" id="add-product"><i class="fa fa-check"></i> Submit</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
          <script>
           document.addEventListener('DOMContentLoaded', () => {
              let btn = document.querySelector('#add-product');
              btn.addEventListener('click', () => {

                  const product_code = document.querySelector('input[alt=product_code]').value; 
                  const product_name = document.querySelector('input[alt=product_name]').value;
                  const detail = document.querySelector('input[alt=detail]').value;
                  const category = $('#category option:selected').val();
                  const qty = document.querySelector('input[alt=qty]').value;
                  const vendor_price = document.querySelector('input[alt=vendor_price]').value;     
                  const retail_price = document.querySelector('input[alt=retail_price]').value;
                  const disc = document.querySelector('input[alt=disc]').value;
                  const vendor = $('#vendor option:selected').val();
                  const status = document.querySelector('input[alt=status]').value;

                  var data = new FormData(this.form);

                data.append('product_code', product_code);
                data.append('product_name', product_name);
                data.append('detail', detail);
                data.append('category', category);
                data.append('qty', qty);
                data.append('vendor_price', vendor_price);
                data.append('retail_price', retail_price);
                data.append('disc', disc);
                data.append('vendor', vendor);
                data.append('status', status);


                if (product_code == '') {//continue niyo nalang ito

                  } else {
                      $.ajax({
                          url: 'controllers/add_product.php',
                          type: "POST",
                          data: data,
                          processData: false,
                          contentType: false,

                          async: false,
                          cache: false,

                          success: function(data) {
                              $('#msgs_8').html(data);

                          },
                          error: function(data) {
                              console.log("Failed");
                          }
                      });
                  }     

              });
          });
      </script>

      <script type="text/javascript">
           $('#vendor_price').change(function() {
            $('#retail_price').val($(this).val());
        });
      </script>

    <script>
        $(document).on("change keyup blur", "#disc", function() {
            var main = $('#vendor_price').val();
            var disc = $('#disc').val();
            var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
            var mult = main * dec; // gives the value for subtract from main value
            var discont = main - mult;
            $('#retail_price').val(discont);
        });
    </script>
       <script> 
              $(document).ready(function() { 

                  $("#product_code").focusout(function() {

                          // If it is blank. 
                      if($(this).val()=='') { 
                          $(this).css('border', 'solid 2px red'); 
                      }
                      else {
                            
                          // If it is not blank.
                          $(this).css('border', 'solid 2px green');    
                      }    
                  }) .trigger("focusout");

               //////////////////////////////////////////////////////

                 $("#product_name").focusout(function() {

                          // If it is blank. 
                      if($(this).val()=='') { 
                          $(this).css('border', 'solid 2px red'); 
                      }
                      else {
                            
                          // If it is not blank.
                          $(this).css('border', 'solid 2px green');    
                      }    
                  }) .trigger("focusout");

               //////////////////////////////////////////////////////

                $("#detail").focusout(function() {

                          // If it is blank. 
                      if($(this).val()=='') { 
                          $(this).css('border', 'solid 2px red'); 
                      }
                      else {
                            
                          // If it is not blank.
                          $(this).css('border', 'solid 2px green');    
                      }    
                  }) .trigger("focusout");

               //////////////////////////////////////////////////////

               $("#category").focusout(function() {

                          // If it is blank. 
                      if($(this).val()=='') { 
                          $(this).css('border', 'solid 2px red'); 
                      }
                      else {
                            
                          // If it is not blank.
                          $(this).css('border', 'solid 2px green');    
                      }    
                  }) .trigger("focusout");

               //////////////////////////////////////////////////////


                $("#qty").focusout(function() {

                          // If it is blank. 
                      if($(this).val()=='') { 
                          $(this).css('border', 'solid 2px red'); 
                      }
                      else {
                            
                          // If it is not blank.
                          $(this).css('border', 'solid 2px green');    
                      }    
                  }) .trigger("focusout");

               //////////////////////////////////////////////////////

                $("#vendor_price").focusout(function() {

                          // If it is blank. 
                      if($(this).val()=='') { 
                          $(this).css('border', 'solid 2px red'); 
                      }
                      else {
                            
                          // If it is not blank.
                          $(this).css('border', 'solid 2px green');    
                      }    
                  }) .trigger("focusout");

               //////////////////////////////////////////////////////

                 $("#retail_price").focusout(function() {

                          // If it is blank. 
                      if($(this).val()=='') { 
                          $(this).css('border', 'solid 2px red'); 
                      }
                      else {
                            
                          // If it is not blank.
                          $(this).css('border', 'solid 2px green');    
                      }    
                  }) .trigger("focusout");

               //////////////////////////////////////////////////////


                  $("#disc").focusout(function() {

                          // If it is blank. 
                      if($(this).val()=='') { 
                          $(this).css('border', 'solid 2px red'); 
                      }
                      else {
                            
                          // If it is not blank.
                          $(this).css('border', 'solid 2px green');    
                      }    
                  }) .trigger("focusout");

               //////////////////////////////////////////////////////


                  $("#vendor").focusout(function() {

                          // If it is blank. 
                      if($(this).val()=='') { 
                          $(this).css('border', 'solid 2px red'); 
                      }
                      else {
                            
                          // If it is not blank.
                          $(this).css('border', 'solid 2px green');    
                      }    
                  }) .trigger("focusout");

               //////////////////////////////////////////////////////


                  $("#status").focusout(function() {

                          // If it is blank. 
                      if($(this).val()=='') { 
                          $(this).css('border', 'solid 2px red'); 
                      }
                      else {
                            
                          // If it is not blank.
                          $(this).css('border', 'solid 2px green');    
                      }    
                  }) .trigger("focusout");

               //////////////////////////////////////////////////////

              }); 
          </script> 