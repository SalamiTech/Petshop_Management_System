
         <div class="modal fade" id="smallmodal5" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Add Payment

                              </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                              <form method="POST">
                            <div class="card-body">
                              <div id="msgs_payment"></div>
                              <div class="row">
                            <div class="col-9">
                           <?php 

                              $cur_date = date('d').date('m').date('y');
                              $ref = $cur_date;
                              $customer_id = rand(0000 , 9999);
                              $uRefNo = $ref.'-'.$customer_id;

                           ?>
                              <div class="form-group">
                                  <label>Reference No.</label>
                                  <input type="text" class="form-control" alt="reference_no"  id="reference_no" value="<?php echo htmlentities($uRefNo) ;?>" placeholder="Enter Reference No .." readonly>
                                </div>
                              </div>
                              
                              <div class="col-3">
                              <div class="form-group">
                                  <label>Amount Paid</label>
                                  <input type="number" class="form-control" alt="amount_paid" id="amount_paid" placeholder="0" autocomplete="off" min="1">
                                </div>
                              </div>
                              
                              <div class="col-6">
                              <div class="form-group">
                                  <label>Status</label>
                                  <input type="text" class="form-control" alt="status" id="status" placeholder="Enter Payment Status" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                              <div class="form-group">
                                  <label>Remarks</label>
                                  <textarea class="form-control" row="3" alt="remarks" id="remarks" placeholder="Enter.." autocomplete="off"></textarea>
                                </div>
                              </div>
                               <div class="col-6">
                                <div class="form-group">
                                <label>Customer</label>
                               <?php
                                  require_once 'config/conn/db_connection.php';
                                  $smt = $db->prepare('SELECT last_name, first_name FROM tbl_client');
                                  $smt->execute();
                                  $data = $smt->fetchAll();
                               ?>
                            <select class="form-control" id="customers" alt="customers">
                             <?php foreach ($data as $row): ?>
                               <option value="<?=ucfirst(htmlentities($row["last_name"])).', '.ucfirst(htmlentities($row["first_name"]));?>"><?=ucfirst(htmlentities($row["last_name"])).', '.ucfirst(htmlentities($row["first_name"]));?></option>
                             <?php endforeach ?>
                            </select>
                              </div>
                              </div>
                              <div class="col-6">
                              <div class="form-group">
                                  <label>Paid By</label>
                                  <input type="text" class="form-control" alt="paid_by" id="paid_by" placeholder="Enter Paid By .." autocomplete="off">
                                </div>
                              </div>
                            
                              </div>
                              </div>
                      
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                               <button type="button" class="btn btn-primary" id="add-payment"><i class="fa fa-check"></i> Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
             <script>
                document.addEventListener('DOMContentLoaded', () => {
                    let btn = document.querySelector('#add-payment');
                    btn.addEventListener('click', () => {

                        const reference_no = document.querySelector('input[alt=reference_no]').value;
                        const amount_paid = document.querySelector('input[alt=amount_paid]').value;
                        const status = document.querySelector('input[alt=status]').value;
                        const remarks = document.querySelector('textarea[alt=remarks]').value;
                        const customers = $('#customers option:selected').val();
                        const paid_by = document.querySelector('input[alt=paid_by]').value;
            

                      var data = new FormData(this.form);

                      data.append('reference_no', reference_no);
                      data.append('amount_paid', amount_paid);
                      data.append('status', status);
                      data.append('remarks', remarks);
                      data.append('customers', customers);
                      data.append('paid_by', paid_by);

                      if (reference_no == '') {

                        } else {
                            $.ajax({
                                url: 'controllers/add_payment.php',
                                type: "POST",
                                data: data,
                                processData: false,
                                contentType: false,

                                async: false,
                                cache: false,

                                success: function(data) {
                                    $('#msgs_payment').html(data);

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

                        //////////////////////////////////////////////////

                        $("#amount_paid").focusout(function() {

                                // If it is blank. 
                            if($(this).val()=='') { 
                                $(this).css('border', 'solid 2px red'); 
                            }
                            else {
                                  
                                // If it is not blank.
                                $(this).css('border', 'solid 2px green');    
                            }    
                        }) .trigger("focusout");

                        //////////////////////////////////////////////////

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

                        //////////////////////////////////////////////////


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

                        //////////////////////////////////////////////////


                         $("#customers").focusout(function() {

                                // If it is blank. 
                            if($(this).val()=='') { 
                                $(this).css('border', 'solid 2px red'); 
                            }
                            else {
                                  
                                // If it is not blank.
                                $(this).css('border', 'solid 2px green');    
                            }    
                        }) .trigger("focusout");

                        //////////////////////////////////////////////////


                         $("#paid_by").focusout(function() {

                                // If it is blank. 
                            if($(this).val()=='') { 
                                $(this).css('border', 'solid 2px red'); 
                            }
                            else {
                                  
                                // If it is not blank.
                                $(this).css('border', 'solid 2px green');    
                            }    
                        }) .trigger("focusout");

                        //////////////////////////////////////////////////




                    }); 
                </script> 