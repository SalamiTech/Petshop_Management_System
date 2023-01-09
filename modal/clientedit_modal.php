
     <div class="modal fade" id="edit-client" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Edit Client
                          </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                       <form method="POST">
                      <div class="card-body">
                        <div id="msgs_clnt"></div>
                            <div class="row">
                        <div class="col-4">
                          <div class="form-group">
                              <label>First Name</label>
                              <input type="text" class="form-control"  alt="first_name2" id="edit_firstname" placeholder="Enter First Name.." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-4">
                          <div class="form-group">
                              <label>Middle Name</label>
                              <input type="text" class="form-control" alt="middle_name2" id="edit_middlename" placeholder="Enter Middle Name.." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-4">
                          <div class="form-group">
                              <label>Last Name</label>
                              <input type="text" class="form-control" alt="last_name2" id="edit_lastname" placeholder="Enter Last Name.." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-6">
                          <div class="form-group">
                              <label>Complete Address</label>
                              <input type="text" class="form-control" alt="complete_address2" id="edit_completeaddress" placeholder="-    Street/Purok      -          City          -       Province     - " autocomplete="off">
                            </div>
                          </div>
                          <div class="col-6">
                          <div class="form-group">
                            <label>Email Address</label>
                              <input type="email" class="form-control" alt="email_address2" id="edit_emailaddress" placeholder="Enter Email Address .." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-4">
                          <div class="form-group">
                              <label>Contact Number</label>
                              <input type="text" class="form-control" alt="contact_number2" id="edit_contactnumber" maxlength="11" placeholder="Enter Contact Number .." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-4">
                          <div class="form-group">
                              <label>Civil Status</label>
                              <input type="text" class="form-control" alt="civil_status2" id="edit_civilstatus" placeholder="Enter Civil Status" autocomplete="off">
                            </div>
                          </div>
                           <div class="col-4">
                          <div class="form-group">
                              <label>Birth Date</label>
                              <input type="date" class="form-control" alt="birth_date2" id="edit_birthdate" autocomplete="off">
                            </div>
                          </div>
                           <div class="col-3">
                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" alt="username2" id="edit_username" placeholder="Enter Username .." autocomplete="off">
                            </div>
                          </div>
                          
                           <div class="col-3">
                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" alt="password2" id="edit_password" placeholder="Enter Password .." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-3">
                          <div class="form-group">
                              <label>Status</label>
                               <select class="form-control" alt="status" id="edit_status">
<!--                                <option id="edit_status" hidden></option> -->
                               <option value="Active">Active</option>
                               <option value="Inactive">Inactive</option>
                            </select>
                            </div>
                          </div>
                           <div class="col-3">
                            <div class="form-group">
                             <label>Gender</label>
                           <select class="form-control" alt="gender" id="edit_gender">
                               <option id="edit_gender" hidden></option>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
     <!--                    
                         <div class="col-3">
                          <div class="form-group">
                               <input type="file" id="image_profile"  accept=".jpg,.JPEG,.gif, .png" alt="image_profile" autocomplete="off">

                            </div>
                          </div> -->
                            </div>
                          
                          </div>
                        <div class="modal-footer">
                            <input type="hidden" id="edit_clientid" name="">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                           <button type="button" class="btn btn-primary" id="edit-clientsx"><i class="fa fa-check"></i> Update</button>
                        </div>  
                    </div>
                   </form>
                </div>
            </div>
        <script>
                document.addEventListener('DOMContentLoaded', () => {
                    let btn = document.querySelector('#edit-clientsx');
                    btn.addEventListener('click', () => {

                        const first_name = document.querySelector('input[alt=first_name2]').value;
                        const middle_name = document.querySelector('input[alt=middle_name2]').value;
                        const last_name = document.querySelector('input[alt=last_name2]').value;
                        const complete_address = document.querySelector('input[alt=complete_address2]').value;
                        const email_address = document.querySelector('input[alt=email_address2]').value;
                        const contact_number = document.querySelector('input[alt=contact_number2]').value;
                        const civil_status = document.querySelector('input[alt=civil_status2]').value;
                        const birth_date = document.querySelector('input[alt=birth_date2]').value;
                        const username = document.querySelector('input[alt=username2]').value;
                        const password = document.querySelector('input[alt=password2]').value;
                        const status = $('#edit_status option:selected').val();
                        const gender = $('#edit_gender option:selected').val();
                        const client_id = document.querySelector('input[id=edit_clientid]').value;
                        // const images = $('input[id=images]').val(); ;

                      var data = new FormData(this.form);

                      data.append('first_name', first_name);
                      data.append('middle_name', middle_name);
                      data.append('last_name', last_name);
                      data.append('complete_address', complete_address);
                      data.append('email_address', email_address);
                      data.append('contact_number', contact_number);
                      data.append('civil_status', civil_status);
                      data.append('birth_date', birth_date);
                      data.append('username', username);
                      data.append('password', password);
                      data.append('status', status);
                      data.append('gender', gender);
                      data.append('client_id', client_id);

                     // data.append('images', $('#images')[0].files[0]);
                      // if (description == '') {

                      //   } else {
                            $.ajax({
                                url: 'controllers/edit_client.php',
                                type: "POST",
                                data: data,
                                processData: false,
                                contentType: false,

                                async: false,
                                cache: false,

                                success: function(data) {
                                    $('#msgs_clnt').html(data);

                                },
                                error: function(data) {
                                    console.log("Failed");
                                }
                            });
                     // }     

                    });
                });
            </script>

