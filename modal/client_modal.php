
     <div class="modal fade" id="smallmodal4" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Add Client
                          </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                       <form method="POST">
                      <div class="card-body">
                        <div id="msgs_10"></div>
                            <div class="row">
                        <div class="col-4">
                          <div class="form-group">
                              <label>First Name</label>
                              <input type="text" class="form-control"  alt="first_name" id="first_name" placeholder="Enter First Name.." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-4">
                          <div class="form-group">
                              <label>Middle Name</label>
                              <input type="text" class="form-control" alt="middle_name" id="middle_name" placeholder="Enter Middle Name.." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-4">
                          <div class="form-group">
                              <label>Last Name</label>
                              <input type="text" class="form-control" alt="last_name" id="last_name" placeholder="Enter Last Name.." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-6">
                          <div class="form-group">
                              <label>Complete Address</label>
                              <input type="text" class="form-control" alt="complete_address" id="complete_address" placeholder="-    Street/Purok      -          City          -       Province     - " autocomplete="off">
                            </div>
                          </div>
                          <div class="col-6">
                          <div class="form-group">
                            <label>Email Address</label>
                              <input type="email" class="form-control" alt="email_address" id="email_address" placeholder="Enter Email Address .." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-4">
                          <div class="form-group">
                              <label>Contact Number</label>
                              <input type="text" class="form-control" alt="contact_number" id="contact_number" maxlength="11" placeholder="Enter Contact Number .." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-4">
                          <div class="form-group">
                              <label>Civil Status</label>
                              <input type="text" class="form-control" alt="civil_status" id="civil_status" placeholder="Enter Civil Status" autocomplete="off">
                            </div>
                          </div>
                           <div class="col-4">
                          <div class="form-group">
                              <label>Birth Date</label>
                              <input type="date" class="form-control" alt="birth_date" id="birth_date" autocomplete="off">
                            </div>
                          </div>
                           <div class="col-3">
                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" alt="username" id="username" placeholder="Enter Username .." autocomplete="off">
                            </div>
                          </div>
                          
                           <div class="col-3">
                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" alt="password" id="password" placeholder="Enter Password .." autocomplete="off">
                            </div>
                          </div>
                          <div class="col-3">
                          <div class="form-group">
                              <label>Status</label>
                              <input type="text" class="form-control" alt="status" id="status" value="Active" placeholder="Enter Account Status .." autocomplete="off" readonly="">
                            </div>
                          </div>
                           <div class="col-3">
                            <div class="form-group">
                             <label>Gender</label>
                           <select class="form-control" id="gender" alt="gender" id="gender">
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        
                         <div class="col-3">
                          <div class="form-group">
                               <input type="file" id="image_profile"  accept=".jpg,.JPEG,.gif, .png" alt="image_profile" autocomplete="off">
                     <!--            <label for="file" class="btn-2"><i class="fa fa-file-image"></i> Profile</label> -->
                            </div>
                          </div>
                            </div>
                          
                          </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                           <button type="button" class="btn btn-primary" id="add-clientsx"><i class="fa fa-check"></i> Submit</button>
                        </div>  
                    </div>
                   </form>
                </div>
            </div>

       <script>
           document.addEventListener('DOMContentLoaded', () => {
              let btn = document.querySelector('#add-clientsx');
              btn.addEventListener('click', () => {

                  const first_name = document.querySelector('input[alt=first_name]').value; 
                  const middle_name = document.querySelector('input[alt=middle_name]').value;
                  const last_name = document.querySelector('input[alt=last_name]').value;
                  const complete_address = document.querySelector('input[alt=complete_address]').value;
                  const email_address = document.querySelector('input[alt=email_address]').value;
                  const contact_number = document.querySelector('input[alt=contact_number]').value;   
                  const civil_status = document.querySelector('input[alt=civil_status]').value;
                  const birth_date = document.querySelector('input[alt=birth_date]').value;
                  const username = document.querySelector('input[alt=username]').value;
                  const password = document.querySelector('input[alt=password]').value;
                  const status = document.querySelector('input[alt=status]').value;
                  const gender = $('#gender option:selected').val();
                  const image_profile = $('input[id=image_profile]').val();

                   

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
                data.append('image_profile', $('#image_profile')[0].files[0]);


                if (first_name == '') {//continue niyo nalang ito

                  } else {
                      $.ajax({
                          url: 'controllers/add_client.php',
                          type: "POST",
                          data: data,
                          processData: false,
                          contentType: false,

                          async: false,
                          cache: false,

                          success: function(data) {
                              $('#msgs_10').html(data);

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

                  $("#first_name").focusout(function() {

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

                 $("#middle_name").focusout(function() {

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

                $("#last_name").focusout(function() {

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

               $("#complete_address").focusout(function() {

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


                $("#email_address").focusout(function() {

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

               //////////////////////////////////////////////////////

                 $("#civil_status").focusout(function() {

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


                  $("#birth_date").focusout(function() {

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

               //////////////////////////////////////////////////////


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


                  $("#gender").focusout(function() {

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

               $("#image_profile").focusout(function() {

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