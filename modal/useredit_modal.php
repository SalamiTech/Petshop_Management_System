         <div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Edit User
                              </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST">
                            <div class="card-body">
                              <div id="msgs_ex"></div>
                                <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                  <label>Fullname</label>
                                    <input type="text" class="form-control" alt="full_name2" id="edit_fullname" placeholder="-          Firstname           -        Middlename         -         Lastname          -" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Username</label>
                                  <input type="text" class="form-control" alt="username2" id="edit_username" placeholder="Enter Username .." autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Password</label>
                                  <input type="password" class="form-control" alt="password2" id="edit_password" placeholder="Enter Password .." autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Contact</label>
                                  <input type="text" class="form-control" alt="contact2" id="edit_contact" maxlength="11" placeholder="Enter Contact .." autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email</label>
                                  <input type="email" class="form-control" row="5" alt="email2" id="edit_email" placeholder="Enter Email .." autocomplete="off">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Category</label>
                                  <input type="text" class="form-control" alt="user_category2" id="edit_usercategory" placeholder="Enter User Category .." autocomplete="off">
                                </div>
                              </div>
                                <div class="col-6">
                                <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" alt="status" id="edit_status">
                                  <option id="edit_status" hidden></option>
                                  <option>Active</option>
                                  <option>Inactive</option>
                                </select>
                              </div>
                              </div>
                              
                              
<!--                               <div class="col-12">
                              <div class="form-group">
                                   <input type="file" id="avatar" alt="avatar">
                                    <label for="file" class="btn-2">
                                </div>
                              </div> -->
                              </div>
                              </div>
                            <div class="modal-footer">
                               <input type="hidden" id="edit_userid" name="">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                               <button type="button" class="btn btn-primary" id="edit-users"><i class="fa fa-check"></i> Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <script>
           document.addEventListener('DOMContentLoaded', () => {
              let btn = document.querySelector('#edit-users');
              btn.addEventListener('click', () => {

                  const full_name = document.querySelector('input[alt=full_name2]').value; 
                  const username = document.querySelector('input[alt=username2]').value;
                  const password = document.querySelector('input[alt=password2]').value;
                  const contact = document.querySelector('input[alt=contact2]').value;
                  const email = document.querySelector('input[alt=email2]').value;
                  const user_category = document.querySelector('input[alt=user_category2]').value;  
                  const status = $('#edit_status option:selected').val();
                  const user_id = document.querySelector('input[id=edit_userid]').value;  

               var data = new FormData(this.form);

                data.append('full_name', full_name);
                data.append('username', username);
                data.append('password', password);
                data.append('contact', contact);
                data.append('email', email);
                data.append('user_category', user_category);
                data.append('status', status);
                data.append('user_id', user_id);
   


                // if (full_name == '') {//continue niyo nalang ito

                //   } else {
                      $.ajax({
                          url: 'controllers/edit_user.php',
                          type: "POST",
                          data: data,
                          processData: false,
                          contentType: false,

                          async: false,
                          cache: false,

                          success: function(data) {
                              $('#msgs_ex').html(data);

                          },
                          error: function(data) {
                              console.log("Failed");
                          }
                      });
                //  }     

              });
          });
      </script>

<!--        <script> 
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
          </script>  -->