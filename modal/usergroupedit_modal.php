<div class="modal fade" id="edit-guser" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Edit User Control
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <form method="POST">
            <div class="card-body">
              <div id="msgs-ugroupedit"></div>
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
                            <select class="form-control" id="edit_userid" alt="user_id">
                                <!-- <option id="edit_userid" hidden></option> -->
                                <?php foreach ($data as $row): ?>
                                <option value="<?=ucfirst(htmlentities($row["user_id"]));?>"><?=ucfirst(htmlentities($row["full_name"]));?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                     <div class="col-12">
                       <div class="form-group">
                            <label>Status</label>
                               <select type = "text" class="form-control" id="edit_status" alt="status">
                                <option id="edit_status" hidden></option>
                                 <option value="Super Admin">Super Admin</option>
                                 <option value="Admin Assistant">Admin Assistant</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" rows="3" id="edit_description" alt="description" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="col-sm-6">
                        <!-- checkbox -->
                      
                           <div class="custom-control custom-checkbox">
                              <input class="form-check-input"  type="checkbox" id="edit_allowadd">
                              <label class="form-check-label" for="inlineCheckbox1">Allow Add</label>
                            </div>


                           <div class="custom-control custom-checkbox">
                              <input class="form-check-input"  type="checkbox" alt="allow_edit" id="edit_allowedit">
                              <label class="form-check-label" for="inlineCheckbox2">Allow Edit</label>
                            </div>



                           <div class="custom-control custom-checkbox">
                              <input class="form-check-input"  type="checkbox" alt="allow_delete" id="edit_allowdelete">
                              <label class="form-check-label" for="inlineCheckbox3">Allow Delete</label>
                            </div>       
                    </div>


                     <div class="col-sm-6">
                        <!-- checkbox -->
                      
                           <div class="custom-control custom-checkbox">
                              <input class="form-check-input" alt="allow_export" type="checkbox" id="edit_allowexport" >
                              <label class="form-check-label" for="inlineCheckbox1">Allow Export</label>
                            </div>

<!-- 
                           <div class="custom-control custom-checkbox">
                              <input class="form-check-input"  alt="notallow_edit" type="checkbox" id="edit_notallowedit">
                              <label class="form-check-label" for="inlineCheckbox2">Not Allow Edit</label>
                            </div>



                           <div class="custom-control custom-checkbox">
                              <input class="form-check-input"  alt="notallow_delete" type="checkbox" id="edit_notallowdelete">
                              <label class="form-check-label" for="inlineCheckbox3">Not Allow Delete</label>
                            </div>   -->     
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <input type="hidden" id="edit_usergroupid" name="">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary" id="edit-ugroupz"><i class="fa fa-check"></i> Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#edit-ugroupz');
        btn.addEventListener('click', () => {

            const user_id = $('#edit_userid option:selected').val();
            const status = $('#edit_status option:selected').val();
            const description = document.querySelector('textarea[id=edit_description]').value;
            const allow_add = $('#edit_allowadd').prop("checked") ? 1 : 0 ;
            const allow_edit = $('#edit_allowedit').prop("checked") ? 1 : 0 ;
            const allow_delete = $('#edit_allowdelete').prop("checked") ? 1 : 0 ;
            const allow_export = $('#edit_allowexport').prop("checked") ? 1 : 0 ;
            const usergroup_id = document.querySelector('input[id=edit_usergroupid]').value;


          var data = new FormData(this.form);

          data.append('user_id', user_id);
          data.append('status', status);
          data.append('description', description);
          data.append('allow_add', allow_add);
          data.append('allow_edit', allow_edit);
          data.append('allow_delete', allow_delete);
          data.append('allow_export', allow_export);
          data.append('usergroup_id', usergroup_id);
          

          // if (description == '') {

          //   } else {
                $.ajax({
                    url: 'controllers/edit_usergroup.php',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,

                    async: false,
                    cache: false,

                    success: function(data) {
                        $('#msgs-ugroupedit').html(data);

                    },
                    error: function(data) {
                        console.log("Failed");
                    }
                });
           // }     

        });
    });
</script>