
 <div class="modal fade" id="smallmodal4" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">Add Vendor
                       </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST">
                    <div class="card-body">
                      <div id="msgs_vndro"></div>
                        <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                          <label>Company Name</label>
                          <input type="text" class="form-control" alt="company_name" id="company_name" placeholder="Enter Company Name.." autocomplete="off">
                        </div>
                      </div>
                      <div class="col-6">
                      <div class="form-group">
                          <label>Contact Person</label>
                          <input type="text" class="form-control" alt="contact_person" id="contact_person" placeholder="Enter Contact Person .." autocomplete="off">
                        </div>
                      </div>
                      <div class="col-6">
                      <div class="form-group">
                          <label>Email</label>
                          <input type="Email" class="form-control" alt="email" id="email" placeholder="Enter Company Email .." autocomplete="off">
                        </div>
                      </div>
                   <div class="col-6">
                      <div class="form-group">
                          <label>Contact Number</label>
                          <input type="text" class="form-control" maxlength="11" alt="contact_number" id="contact_number" placeholder="Enter Contact Number .." autocomplete="off">
                        </div>
                      </div>
                     <div class="col-6">
                      <div class="form-group">
                          <label>Website</label>
                          <input type="text" class="form-control" alt="website" id="website" placeholder="Enter Company Website .." autocomplete="off">
                        </div>
                      </div>
                       <div class="col-6">
                      <div class="form-group">
                          <label>About the Company</label>
                          <textarea class="form-control" alt="about_company" id="about_company" placeholder="Enter"  autocomplete="off"></textarea>
                        </div>
                      </div>
                       <div class="col-6">
                      <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" alt="username" id="username" placeholder="Enter Username .." autocomplete="off">
                        </div>
                      </div>
                       <div class="col-6">
                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" alt="password" id="password" placeholder="Enter Password .." autocomplete="off">
                        </div>
                      </div>
                      </div>
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                       <button type="button
                       " class="btn btn-primary" id="add-vendor"><i class="fa fa-check"></i> Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

       <script>
                document.addEventListener('DOMContentLoaded', () => {
                    let btn = document.querySelector('#add-vendor');
                    btn.addEventListener('click', () => {

                        const company_name = document.querySelector('input[alt=company_name]').value;
                        const contact_person = document.querySelector('input[alt=contact_person]').value;
                        const email = document.querySelector('input[alt=email]').value;
                        const contact_number = document.querySelector('input[alt=contact_number]').value;
                        const website = document.querySelector('input[alt=website]').value;
                        const about_company = document.querySelector('textarea[alt=about_company]').value;
                        const username = document.querySelector('input[alt=username]').value; 
                        const password = document.querySelector('input[alt=password]').value;

                      var data = new FormData(this.form);

                      data.append('company_name', company_name);
                      data.append('contact_person', contact_person);
                      data.append('email', email);
                      data.append('contact_number', contact_number);
                      data.append('website', website);
                      data.append('about_company', about_company);
                      data.append('username', username);
                      data.append('password', password);

                      if (company_name == '') {

                        } else {
                            $.ajax({
                                url: 'controllers/add_vendor.php',
                                type: "POST",
                                data: data,
                                processData: false,
                                contentType: false,

                                async: false,
                                cache: false,

                                success: function(data) {
                                    $('#msgs_vndro').html(data);

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
                        $("#company_name").focusout(function() {

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

                        $("#contact_person").focusout(function() {

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

                         $("#email").focusout(function() {

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


                         $("#contact_number").focusout(function() {

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


                         $("#website").focusout(function() {

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

                        $("#about_company").focusout(function() {

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


                       $("#username").focusout(function() {

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

                      $("#password").focusout(function() {

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