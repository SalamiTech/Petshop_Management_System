<div class="modal fade" id="del-client" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Delete Client
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="" id="msgs_1v"></div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Client Name</label>
                        <input type="text" class="form-control" id="del_name" alt="category_name2" placeholder="Enter Category Name.." autocomplete="off" readonly="">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="del_clientid" name="">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                    <button type="button" class="btn btn-primary" id="del-clientss"><i class="fa fa-check"></i> Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#del-clientss');
        btn.addEventListener('click', () => {

            const client_id= document.querySelector('input[id=del_clientid]').value;
  

            var data = new FormData(this.form);

       
          data.append('client_id', client_id);

          // if (category_name == '') {

          //   } else {
                $.ajax({
                    url: 'controllers/delete_client.php',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,

                    async: false,
                    cache: false,

                    success: function(data) {
                        $('#msgs_1v').html(data);

                    },
                    error: function(data) {
                        console.log("Failed");
                    }
                });
         //   }     

        });
    });
</script>

