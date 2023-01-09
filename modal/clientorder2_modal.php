         <div class="modal fade" id="smallmodal_o2<?php echo $user_session;?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
             <div class="modal-dialog modal-md" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="smallmodalLabel">Add Order
                         </h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                      <form method="POST">
                        <div id="msg-order"></div>
                         <div class="row">
                             <div class="col-5">
                            <?php 

                              $cur_date = date('d').date('m').date('y');
                              $ref = $cur_date;
                              $customer_id = rand(00000 , 999);
                              $uRefNo = $ref.'-'.$customer_id;

                           ?>
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Reference No.</label>
                                     <input type="text" class="form-control" alt="reference_no" value="<?php echo htmlentities($uRefNo) ;?>" id="reference_no" placeholder="Enter Reference No .." autocomplete="off" readonly>
                                 </div>
                             </div>
                             <div class="col-5">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Item</label>
                                     <?php
                                        require_once 'config/conn/db_connection.php';
                                        $smt = $db->prepare('SELECT productcategory_name FROM tbl_productcategory');
                                        $smt->execute();
                                        $data = $smt->fetchAll();
                                     ?>
                                     <select class="form-control" alt="item" id="item">
                                         <?php foreach ($data as $row): ?>
                                         <option value="<?=ucfirst(htmlentities($row["productcategory_name"]));?>"><?=ucfirst(htmlentities($row["productcategory_name"]));?></option>
                                         <?php endforeach ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-2">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">QTY</label>
                                     <input type="number"  min="1" class="form-control" alt="qty" id="qty" placeholder="0">
                                 </div>
                             </div>
                         </div>

                           <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                <label>Customer Name</label>
                              <?php
                                  require_once 'config/conn/db_connection.php';
                                  $smt = $db->prepare('SELECT username FROM tbl_client');
                                  $smt->execute();
                                  $data = $smt->fetchAll();
                               ?>
                            <select class="form-control" id="customer_name" alt="customer_name">
                             <?php foreach ($data as $row): ?>
                               <option value="<?=ucfirst(htmlentities($row["username"]));?>"><?=ucfirst(htmlentities($row["username"]));?></option>
                             <?php endforeach ?>
                            </select>
                              </div>
                              </div>
                             <div class="col-4">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Price</label>
                                     <input type="text" class="form-control" alt="price" id="price"  placeholder="00.00">
                                 </div>
                             </div>
                              <div class="col-4">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Status</label>
                                         <select class="form-control" alt="status" id="status">
                                          <option value="Approved">Approved</option>
                                          <option value="To Deliver">To Deliver</option>
                                          <option value="Received">Received</option>
                                          <option value="Cancelled">Cancelled</option>
                                         </select>
                                 </div>
                             </div>

                           </div>

                           <div class="row">
                             <div class="col-12">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Remarks</label>
                                     <textarea  type="text" class="form-control" alt="remarks" id="remarks" placeholder="Remarks..."></textarea>
                                     
                                 </div>
                             </div>

                           </div>

                       </div>

                         <div class="modal-footer">
                             <input type="hidden" alt="customer_name" id="customer_name" value="<?php echo $user_session;?>">
                             <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                             <button type="button" class="btn btn-primary" id="add-order"><i class="fa fa-check"></i> Submit</button>
                     </div>  
                    </div>
                   </form>
                </div>
            </div>
     <script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#add-order');
        btn.addEventListener('click', () => {

            const reference_no = document.querySelector('input[alt=reference_no]').value;
            const customer_name = document.querySelector('input[alt=customer_name]').value;
            const item = $('#item option:selected').val();
            const qty = document.querySelector('input[alt=qty]').value;
            const price = document.querySelector('input[alt=price]').value;
            const status = $('#status option:selected').val();
            const remarks = document.querySelector('textarea[alt=remarks]').value;

            var data = new FormData(this.form);

          data.append('reference_no', reference_no);
          data.append('customer_name', customer_name);
          data.append('item', item);
          data.append('qty', qty);
          data.append('price', price);
          data.append('status', status);
          data.append('remarks', remarks);

          if (reference_no == '') {

            } else {
                $.ajax({
                    url: 'controllers/add_order2.php',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,

                    async: false,
                    cache: false,

                    success: function(data) {
                        $('#msg-order').html(data);

                    },
                    error: function(data) {
                        console.log("Failed");
                    }
                });
            }     

        });
    });
</script>

 <script> 
        $(document).ready(function() { 

            $("#reference_no").focusout(function() {

                    // If it is blank. 
                if($(this).val()=='') { 
                    $(this).css('border', 'solid 2px red'); 
                }
                else {
                      
                    // If it is not blank.
                    $(this).css('border', 'solid 2px green');    
                }    
            }) .trigger("focusout");

            ///////////////////////////////////////////////////////

                 $("#item").focusout(function() {

                    // If it is blank. 
                if($(this).val()=='') { 
                    $(this).css('border', 'solid 2px red'); 
                }
                else {
                      
                    // If it is not blank.
                    $(this).css('border', 'solid 2px green');    
                }    
            }) .trigger("focusout");

            ///////////////////////////////////////////////////////

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

            ///////////////////////////////////////////////////////


                 $("#customer_name").focusout(function() {

                    // If it is blank. 
                if($(this).val()=='') { 
                    $(this).css('border', 'solid 2px red'); 
                }
                else {
                      
                    // If it is not blank.
                    $(this).css('border', 'solid 2px green');    
                }    
            }) .trigger("focusout");

            ///////////////////////////////////////////////////////

                 $("#price").focusout(function() {

                    // If it is blank. 
                if($(this).val()=='') { 
                    $(this).css('border', 'solid 2px red'); 
                }
                else {
                      
                    // If it is not blank.
                    $(this).css('border', 'solid 2px green');    
                }    
            }) .trigger("focusout");

            ///////////////////////////////////////////////////////

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

            ///////////////////////////////////////////////////////

                    $("#remarks").focusout(function() {

                    // If it is blank. 
                if($(this).val()=='') { 
                    $(this).css('border', 'solid 2px red'); 
                }
                else {
                      
                    // If it is not blank.
                    $(this).css('border', 'solid 2px green');    
                }    
            }) .trigger("focusout");

            ///////////////////////////////////////////////////////


        }); 
    </script> 