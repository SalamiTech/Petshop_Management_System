
         <div class="modal fade" id="edit-payment<?php echo $user_session;?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Edit Payment

                              </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                              <form method="POST">
                            <div class="card-body">
                              <div id="msgs_paymentx"></div>
                              <div class="row">
                            <div class="col-9">

                              <div class="form-group">
                                  <label>Reference No.</label>
                                  <input type="text" class="form-control" alt="reference_no2"  id="edit_referenceno"  placeholder="Enter Reference No .." readonly>
                                </div>
                              </div>
                              
                              <div class="col-3">
                              <div class="form-group">
                                  <label>Amount Paid</label>
                                  <input type="number" class="form-control" alt="amount_paid2" id="edit_amountpaid" placeholder="0" autocomplete="off" min="1">
                                </div>
                              </div>
                              
                              <div class="col-6">
                              <div class="form-group">
                                  <label>Status</label>
                                  <input type="text" class="form-control" alt="status2" id="edit_status" placeholder="Enter Payment Status" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                              <div class="form-group">
                                  <label>Remarks</label>
                                  <textarea class="form-control" row="3" alt="remarks2" id="edit_remarks" placeholder="Enter.." autocomplete="off"></textarea>
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
                            <select class="form-control" id="edit_customers" alt="customers">
                             <?php foreach ($data as $row): ?>
                               <option value="<?=ucfirst(htmlentities($row["last_name"])).', '.ucfirst(htmlentities($row["first_name"]));?>"><?=ucfirst(htmlentities($row["last_name"])).', '.ucfirst(htmlentities($row["first_name"]));?></option>
                             <?php endforeach ?>
                            </select>
                              </div>
                              </div>
                              <div class="col-6">
                              <div class="form-group">
                                  <label>Paid By</label>
                                  <input type="text" class="form-control" alt="paid_by2" id="edit_paidby" placeholder="Enter Paid By .." autocomplete="off">
                                </div>
                              </div>
                            
                              </div>
                              </div>
                      
                            <div class="modal-footer">
                                <input type="hidden" id="edit_paymentid" name="">
                                <input type="hidden" id="process_by" alt="process_by" value="<?php echo $user_session;?>">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                               <button type="button" class="btn btn-primary" id="edit-payments"><i class="fa fa-check"></i> Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
             <script>
                document.addEventListener('DOMContentLoaded', () => {
                    let btn = document.querySelector('#edit-payments');
                    btn.addEventListener('click', () => {

                        const reference_no = document.querySelector('input[alt=reference_no2]').value;
                        const amount_paid = document.querySelector('input[alt=amount_paid2]').value;
                        const status = document.querySelector('input[alt=status2]').value;
                        const remarks = document.querySelector('textarea[alt=remarks2]').value;
                        const customers = $('#edit_customers option:selected').val();
                        const paid_by = document.querySelector('input[alt=paid_by2]').value;
                        const process_by = document.querySelector('input[alt=process_by]').value;
                        const payment_id = document.querySelector('input[id=edit_paymentid]').value;

                      var data = new FormData(this.form);

                      data.append('reference_no', reference_no);
                      data.append('amount_paid', amount_paid);
                      data.append('status', status);
                      data.append('remarks', remarks);
                      data.append('customers', customers);
                      data.append('paid_by', paid_by);
                      data.append('process_by', process_by);
                      data.append('payment_id', payment_id);

                            $.ajax({
                                url: 'controllers/edit_payment.php',
                                type: "POST",
                                data: data,
                                processData: false,
                                contentType: false,

                                async: false,
                                cache: false,

                                success: function(data) {
                                    $('#msgs_paymentx').html(data);

                                },
                                error: function(data) {
                                    console.log("Failed");
                                }
                            });
                       // }     

                    });
                });
            </script>
