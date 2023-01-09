
         <div class="modal fade" id="edit-petmanagement" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Edit Management
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                          <form enctype="multipart/form-data" method="POST">
                          <div class="modal-body">
                            <div class="" id="msgs_pet"></div>
                           <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                  <label>Description</label>
                                  <textarea class="form-control" alt="description2" id="edit_description" rows="3" placeholder="Enter ..."  autocomplete="off"></textarea>
                                </div>
                              </div>
                                <div class="col-6">
                                <div class="form-group">
                                <label>Category</label>
                              <?php
                                  require_once 'config/conn/db_connection.php';
                                  $smt = $db->prepare('SELECT category_name FROM tbl_category');
                                  $smt->execute();
                                  $data = $smt->fetchAll();
                               ?>
                            <select name="residentFullname" id="edit_catname" class="form-control" >
                             <option id="edit_catname" hidden></option>
                             <?php foreach ($data as $row): ?>
                               <option value="<?=ucfirst(htmlentities($row["category_name"]));?>"><?=ucfirst(htmlentities($row["category_name"]));?></option>
                             <?php endforeach ?>
                            </select>
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
                            <select name="residentFullname" alt="vendor" id="edit_vendor" class="form-control" >
                             <option id="edit_vendor" hidden></option>
                             <?php foreach ($data as $row): ?>
                               <option value="<?=ucfirst(htmlentities($row["username"]));?>"><?=ucfirst(htmlentities($row["username"]));?></option>
                             <?php endforeach ?>
                            </select>
                              </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Status</label>
                                  <input type="text" class="form-control" row="5" id="edit_status" alt="status2" placeholder="Enter Status Name.." autocomplete="off">
                                </div>
                              </div>
      <!--                          <div class="col-12">
                              <div class="form-group">
                                   <input type="file" id="images" accept=".jpg,.JPEG,.gif, .png">
                                  <label for="file" class="btn-2">
                                </div>
                              </div> -->
                              </div>
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" id="edit_petmanagementid" name="">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                               <button type="button" class="btn btn-primary" id="edit-petmngment"><i class="fa fa-check"></i> Update</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    let btn = document.querySelector('#edit-petmngment');
                    btn.addEventListener('click', () => {

                        const description = document.querySelector('textarea[alt=description2]').value;
                        const category_name = $('#edit_catname option:selected').val();
                        const vendor = $('#edit_vendor option:selected').val();
                        const status = document.querySelector('input[alt=status2]').value;
                        const petmanagement_id = document.querySelector('input[id=edit_petmanagementid]').value;
                        // const images = $('input[id=images]').val(); ;

                      var data = new FormData(this.form);

                      data.append('description', description);
                      data.append('category_name', category_name);
                      data.append('vendor', vendor);
                      data.append('status', status);
                      data.append('petmanagement_id', petmanagement_id);
                     // data.append('images', $('#images')[0].files[0]);
                      // if (description == '') {

                      //   } else {
                            $.ajax({
                                url: 'controllers/edit_petmanagement.php',
                                type: "POST",
                                data: data,
                                processData: false,
                                contentType: false,

                                async: false,
                                cache: false,

                                success: function(data) {
                                    $('#msgs_pet').html(data);

                                },
                                error: function(data) {
                                    console.log("Failed");
                                }
                            });
                     //  }     

                    });
                });
            </script>
<!-- 
             <script> 
                    $(document).ready(function() { 
                        $("#category_name").focusout(function() {

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

                        $("#description").focusout(function() {

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


                         $("#Status").focusout(function() {

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
                </script>  -->