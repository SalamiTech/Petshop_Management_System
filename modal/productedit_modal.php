
         <div class="modal fade" id="edit-product" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Edit Product

                               </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST">
                            <div class="card-body">
                              <div class="" id="msgs_9"></div>
                                <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                  <label>Code</label>
                                  <input type="text" class="form-control" alt="product_code2" id="edit_productcode" placeholder="Enter Product Code.." autocomplete="off" readonly="">
                                </div>
                              </div>
                               <div class="col-6">
                              <div class="form-group">
                                  <label>Name</label>
                                  <input type="text" class="form-control" alt="product_name2" id="edit_productname" placeholder="Enter Product Name.. " autocomplete="off">
                                </div>
                              </div>
                               <div class="col-6">
                              <div class="form-group">
                                  <label>Detail</label>
                                  <input type="text" class="form-control" alt="detail2" id="edit_detail" placeholder="Enter Product Detail.." autocomplete="off">
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
                            <select class="form-control"  alt="category2" id="edit_category">
                             <?php foreach ($data as $row): ?>
                               <option value="<?=ucfirst(htmlentities($row["productcategory_name"]));?>"><?=ucfirst(htmlentities($row["productcategory_name"]));?></option>
                             <?php endforeach ?>
                            </select>


                                </div>
                              </div>
                               <div class="col-3">
                              <div class="form-group">
                                  <label>Qty</label>
                                  <input type="number" class="form-control" min="1" alt="qty2" id="edit_qty" placeholder="0" autocomplete="off">
                                </div>
                              </div>
                               <div class="col-3">
                              <div class="form-group">
                                  <label>Vendor Price</label>
                                  <input type="text" class="form-control" alt="vendor_price2" id="edit_vendorprice" placeholder="P 00.00" autocomplete="off">
                                </div>
                              </div>
                               <div class="col-3">
                              <div class="form-group">
                                  <label>Retail Price</label>
                                  <input type="text" class="form-control" alt="retail_price2" id="edit_retailprice" placeholder="P 00.00" autocomplete="off" readonly="">
                                </div>
                              </div>
                               <div class="col-1">
                               </div>
                              <div class="col-2">
                              <div class="form-group">
                                  <label>Disc.</label>
                                  <input type="text" class="form-control" alt="disc2" id="edit_disc" placeholder="0%" autocomplete="off">
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
                            <select class="form-control" id="edit_vendor" alt="vendor">
                              <option id="edit_vendor" hidden></option>
                             <?php foreach ($data as $row): ?>
                               <option value="<?=ucfirst(htmlentities($row["username"]));?>"><?=ucfirst(htmlentities($row["username"]));?></option>
                             <?php endforeach ?>
                            </select>
                              </div>
                              </div>
                              
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Status</label>
                                  <input type="text" class="form-control" alt="status2" id="edit_status" placeholder="Enter Status Name.." autocomplete="off">
                                </div>
                              </div>
                              </div>
                              </div>
                            <div class="modal-footer">
                               <input type="hidden" id="edit_productid" name="">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                               <button type="button" class="btn btn-primary" id="edit-products"><i class="fa fa-check"></i> Update</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
          <script>
           document.addEventListener('DOMContentLoaded', () => {
              let btn = document.querySelector('#edit-products');
              btn.addEventListener('click', () => {

                  const product_code = document.querySelector('input[alt=product_code2]').value; 
                  const product_name = document.querySelector('input[alt=product_name2]').value;
                  const detail = document.querySelector('input[alt=detail2]').value;
                 const category = $('#edit_category option:selected').val();
                  const qty = document.querySelector('input[alt=qty2]').value;
                  const vendor_price = document.querySelector('input[alt=vendor_price2]').value;     
                  const retail_price = document.querySelector('input[alt=retail_price2]').value;
                  const disc = document.querySelector('input[alt=disc2]').value;
                  const vendor = $('#edit_vendor option:selected').val();
                  const status = document.querySelector('input[alt=status2]').value;
                  const product_id = document.querySelector('input[id=edit_productid]').value;

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
                data.append('product_id', product_id);


                if (product_code == '') {//continue niyo nalang ito

                  } else {
                      $.ajax({
                          url: 'controllers/edit_product.php',
                          type: "POST",
                          data: data,
                          processData: false,
                          contentType: false,

                          async: false,
                          cache: false,

                          success: function(data) {
                              $('#msgs_9').html(data);

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
           $('#edit_vendorprice').change(function() {
            $('#edit_retailprice').val($(this).val());
        });
      </script>

    <script>
        $(document).on("change keyup blur", "#edit_disc", function() {
            var main = $('#edit_vendorprice').val();
            var disc = $('#edit_disc').val();
            var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
            var mult = main * dec; // gives the value for subtract from main value
            var discont = main - mult;
            $('#edit_retailprice').val(discont);
        });
    </script>
<!-- 
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
          </script>  -->