<div class="modal fade" id="edit-service" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Edit Services
                              </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <form method="POST">
                      <div class="card-body">
                        <div id="msgs_servicex"></div>
                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                  <label>Reference No.</label>
                                  <input type="text" class="form-control" alt="reference_no2" id="edit_referenceno" placeholder="Enter Reference No .." autocomplete="off" readonly="">
                                </div>
                              </div>
                              <div class="col-6">
                              <div class="form-group">
                                  <label>Service</label>
                                  <input type="text" class="form-control" alt="service2" id="edit_service" placeholder="Enter Service Name .." autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                              <div class="form-group">
                                  <label>Service Detail</label>
                                  <input type="text" class="form-control" alt="service_detail2" id="edit_servicedetail" placeholder="Enter Service Detail .." autocomplete="off">
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
                              <div class="col-3">
                              <div class="form-group">
                                  <label>Service Fee</label>
                                  <input type="number" class="form-control" alt="service_fee2" id="edit_servicefee" placeholder="0"  autocomplete="off">
                                </div> 
                              </div>
                            
                              </div>
                              </div>
                            <div class="modal-footer">
                              <input type="hidden" id="edit_servicesid" name="">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                               <button type="button" class="btn btn-primary" id="edit-services"><i class="fa fa-check"></i> Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    let btn = document.querySelector('#edit-services');
                    btn.addEventListener('click', () => {

                        const reference_no = document.querySelector('input[alt=reference_no2]').value;
                        const service = document.querySelector('input[alt=service2]').value;
                        const service_detail = document.querySelector('input[alt=service_detail2]').value;
                        const vendor = $('#edit_vendor option:selected').val();
                        const service_fee = document.querySelector('input[alt=service_fee2]').value;
                        const services_id = document.querySelector('input[id=edit_servicesid]').value;

                        var data = new FormData(this.form);

                      data.append('reference_no', reference_no);
                      data.append('service', service);
                      data.append('service_detail', service_detail);
                      data.append('vendor', vendor);
                      data.append('service_fee', service_fee);
                      data.append('services_id', services_id);

  
                            $.ajax({
                                url: 'controllers/edit_services.php',
                                type: "POST",
                                data: data,
                                processData: false,
                                contentType: false,

                                async: false,
                                cache: false,

                                success: function(data) {
                                    $('#msgs_servicex').html(data);

                                },
                                error: function(data) {
                                    console.log("Failed");
                                }
                            });
                         

                    });
                });
            </script>