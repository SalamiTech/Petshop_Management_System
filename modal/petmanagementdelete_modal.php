<div class="modal fade" id="del-petmanagement" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Delete Petmanagement
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="" id="msgs_3"></div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" class="form-control" id="del_catname" placeholder="Enter Category Name.." autocomplete="off" disabled="">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="del_petmanagementid" name="">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                    <button type="button" class="btn btn-primary" id="del-petmngment"><i class="fa fa-check"></i> Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#del-petmngment');
        btn.addEventListener('click', () => {

            const petmanagement_id = document.querySelector('input[id=del_petmanagementid]').value;
  

            var data = new FormData(this.form);

          data.append('petmanagement_id', petmanagement_id);

          // if (category_name == '') {

          //   } else {
                $.ajax({
                    url: 'controllers/delete_petmanagement.php',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,

                    async: false,
                    cache: false,

                    success: function(data) {
                        $('#msgs_3').html(data);

                    },
                    error: function(data) {
                        console.log("Failed");
                    }
                });
         //   }     

        });
    });
</script>

