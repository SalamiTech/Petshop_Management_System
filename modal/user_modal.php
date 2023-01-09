         <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Add User
                              </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST">
                            <div class="card-body">
                              <div id="msgs_user"></div>
                                <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                  <label>Fullname</label>
                                    <input type="text" class="form-control" alt="full_name" id="full_name" placeholder="-          Firstname           -        Middlename         -         Lastname          -" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Username</label>
                                  <input type="text" class="form-control" alt="username" id="username" placeholder="Enter Username .." autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Password</label>
                                  <input type="password" class="form-control" alt="password" id="password" placeholder="Enter Password .." autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Contact</label>
                                  <input type="text" class="form-control" alt="contact" id="contact" maxlength="11" placeholder="Enter Contact .." autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email</label>
                                  <input type="email" class="form-control" row="5" alt="email" id="email" placeholder="Enter Email .." autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Category</label>
                                  <input type="text" class="form-control" alt="user_category" id="user_category" placeholder="Enter User Category .." autocomplete="off">
                                </div>
                              </div>
                                <div class="col-6">
                                <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" alt="status" id="status">
                                  <option>Active</option>
                                  <option>Inactive</option>
                                </select>
                              </div>
                              </div>
                              
                              
                              <div class="col-12">
                              <div class="form-group">
                                   <input type="file" id="avatar" alt="avatar">
                                    <label for="file" class="btn-2"><!-- <i class="fa fa-file-image"></i> Avatar</label> -->
                                </div>
                              </div>
                              </div>
                              </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                               <button type="button" class="btn btn-primary" id="add-users"><i class="fa fa-check"></i> Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <script>
           document.addEventListener('DOMContentLoaded', () => {
              let btn = document.querySelector('#add-users');
              btn.addEventListener('click', () => {

                  const avatar = $('input[id=avatar]').val();
                  const full_name = document.querySelector('input[alt=full_name]').value; 
                  const username = document.querySelector('input[alt=username]').value;
                  const password = document.querySelector('input[alt=password]').value;
                  const contact = document.querySelector('input[alt=contact]').value;
                  const email = document.querySelector('input[alt=email]').value;
                  const user_category = document.querySelector('input[alt=user_category]').value; 
                  const status = $('#status option:selected').val();
      

                  var data = new FormData(this.form);

                data.append('avatar', $('#avatar')[0].files[0]);
                data.append('full_name', full_name);
                data.append('username', username);
                data.append('password', password);
                data.append('contact', contact);
                data.append('email', email);
                data.append('user_category', user_category);
                data.append('status', status);
   


                if (full_name == '') {//continue niyo nalang ito

                  } else {
                      $.ajax({
                          url: 'controllers/add_user.php',
                          type: "POST",
                          data: data,
                          processData: false,
                          contentType: false,

                          async: false,
                          cache: false,

                          success: function(data) {
                              $('#msgs_user').html(data);

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

                  $("#full_name").focusout(function() {

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

               $("#contact").focusout(function() {

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

               //////////////////////////////////////////////////////

                $("#user_category").focusout(function() {

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


                  $("#avatar").focusout(function() {

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