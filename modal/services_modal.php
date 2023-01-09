<div class="modal fade" id="smallmodal5" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Add Services
                              </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <form method="POST">
                      <div class="card-body">
                        <div id="msgs_service"></div>
                        <div class="row">
                            <div class="col-6">

                            <?php 

                              $cur_date = date('d').date('m').date('y');
                              $ref = $cur_date;
                              $customer_id = rand(00000 , 99999);
                              $uRefNo = $ref.'-'.$customer_id;

                           ?>
                              <div class="form-group">
                                  <label>Reference No.</label>
                                  <input type="text" class="form-control" alt="reference_no" value="<?php echo htmlentities($uRefNo) ;?>" id="reference_no" placeholder="Enter Reference No .." autocomplete="off" readonly>
                                </div>
                              </div>
                              <div class="col-6">
                              <div class="form-group">
                                  <label>Service</label>
                                  <input type="text" class="form-control" alt="service" id="service" placeholder="Enter Service Name .." autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                              <div class="form-group">
                                  <label>Service Detail</label>
                                  <input type="text" class="form-control" alt="service_detail" id="service_detail" placeholder="Enter Service Detail .." autocomplete="off">
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
                              <div class="col-3">
                              <div class="form-group">
                                  <label>Service Fee</label>
                                  <input type="number" class="form-control" alt="service_fee" id="service_fee" placeholder="0"  autocomplete="off">
                                </div> 
                              </div>
                            
                              </div>
                              </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                               <button type="button" class="btn btn-primary" id="add-service"><i class="fa fa-check"></i> Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    let btn = document.querySelector('#add-service');
                    btn.addEventListener('click', () => {

                        const reference_no = document.querySelector('input[alt=reference_no]').value;
                        const service = document.querySelector('input[alt=service]').value;
                        const service_detail = document.querySelector('input[alt=service_detail]').value;
                        const vendor = $('#vendor option:selected').val();
                        const service_fee = document.querySelector('input[alt=service_fee]').value;
            

                      var data = new FormData(this.form);

                      data.append('reference_no', reference_no);
                      data.append('service', service);
                      data.append('service_detail', service_detail);
                      data.append('vendor', vendor);
                      data.append('service_fee', service_fee);

                      if (reference_no == '') {

                        } else {
                            $.ajax({
                                url: 'controllers/add_services.php',
                                type: "POST",
                                data: data,
                                processData: false,
                                contentType: false,

                                async: false,
                                cache: false,

                                success: function(data) {
                                    $('#msgs_service').html(data);

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

                        $("#service").focusout(function() {

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

                         $("#service_detail").focusout(function() {

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

                        //////////////////////////////////////////////////


                         $("#service_fee").focusout(function() {

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