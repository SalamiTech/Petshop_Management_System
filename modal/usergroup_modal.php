<div class="modal fade" id="smallmodal-g" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Add User Control
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <form method="POST">
            <div class="card-body">
              <div id="msgs-ugroup"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Full Name</label>
                            <?php
                                  require_once 'config/conn/db_connection.php';
                                  $smt = $db->prepare('SELECT user_id,full_name FROM tbl_user');
                                  $smt->execute();
                                  $data = $smt->fetchAll();
                               ?>
                            <select class="form-control" id="user_id" alt="user_id">
                                <?php foreach ($data as $row): ?>
                                <option value="<?=ucfirst(htmlentities($row["user_id"]));?>"><?=ucfirst(htmlentities($row["full_name"]));?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                       <div class="form-group">
                            <label>Status</label>
                               <select type = "text" class="form-control" id="status" alt="status">
                                <option selected disabled value="">&larr; Select Status &rarr;</option>
                                 <option value="Super Admin">Super Admin</option>
                                 <option value="Admin Assistant">Admin Assistant</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" rows="3" alt="description" id="description" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="col-sm-6">
                        <!-- checkbox -->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input allow_add" type="checkbox" alt="allow_add" id="customCheckbox1">
                                <label for="customCheckbox1" class="custom-control-label">Allow Add</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input allow_edit" type="checkbox" alt="allow_edit" id="customCheckbox2">
                                <label for="customCheckbox2" class="custom-control-label">Allow Edit</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input allow_delete" type="checkbox" alt="allow_delete" id="customCheckbox3">
                                <label for="customCheckbox3" class="custom-control-label">Allow Delete</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- checkbox -->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input allow_export" alt="allow_export" type="checkbox" id="customCheckbox4">
                                <label for="customCheckbox4" class="custom-control-label">Allow Export</label>
                            </div>
 <!--                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input notallow_edit" alt="notallow_edit" type="checkbox" id="customCheckbox5">
                                <label for="customCheckbox5" class="custom-control-label">Allow Import</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input notallow_delete" alt="notallow_delete" type="checkbox" id="customCheckbox6">
                                <label for="customCheckbox6" class="custom-control-label">Allow Export</label>
                            </div> -->
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary" id="add-ugroup"><i class="fa fa-check"></i> Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#add-ugroup');
        btn.addEventListener('click', () => {

            const user_id = $('#user_id option:selected').val();
            const status = $('#status option:selected').val();
            const description = document.querySelector('textarea[alt=description]').value;
            const allow_add = $('.allow_add').prop("checked") ? 1 : 0 ;
            const allow_edit = $('.allow_edit').prop("checked") ? 1 : 0 ;
            const allow_delete = $('.allow_delete').prop("checked") ? 1 : 0 ;
            const allow_export = $('.allow_export').prop("checked") ? 1 : 0 ;
            // const notallow_edit = $('.notallow_edit').prop("checked") ? 1 : 0 ;
            // console.log('==============notallow_edit=================');
            // console.log(notallow_edit);

            // const notallow_delete = $('.notallow_delete').prop("checked") ? 1 : 0 ;
            // console.log('==============notallow_delete=================');
            // console.log(notallow_delete);



          var data = new FormData(this.form);

          data.append('user_id', user_id);
          data.append('status', status);
          data.append('description', description);
          data.append('allow_add', allow_add);
          data.append('allow_edit', allow_edit);
          data.append('allow_delete', allow_delete);
          data.append('allow_export', allow_export);
          // data.append('notallow_edit', notallow_edit);
          // data.append('notallow_delete', notallow_delete);

          if (description == '') {

            } else {
                $.ajax({
                    url: 'controllers/add_usergroup.php',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,

                    async: false,
                    cache: false,

                    success: function(data) {
                        $('#msgs-ugroup').html(data);

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
            $("#user_id").focusout(function() {

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

        }); 
    </script> 