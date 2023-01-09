<div class="modal fade" id="del-services" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Delete Services
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="" id="msgs_1s"></div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Reference No.</label>
                        <input type="text" class="form-control" id="del_referenceno" alt="category_name2" placeholder="Enter Category Name.." autocomplete="off" readonly="">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="del_servicesid" name="">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                    <button type="button" class="btn btn-primary" id="edit-cat"><i class="fa fa-check"></i> Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#edit-cat');
        btn.addEventListener('click', () => {
            const services_id= document.querySelector('input[id=del_servicesid]').value;
  

            var data = new FormData(this.form);

          data.append('services_id', services_id);

          // if (category_name == '') {

          //   } else {
                $.ajax({
                    url: 'controllers/delete_services.php',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,

                    async: false,
                    cache: false,

                    success: function(data) {
                        $('#msgs_1s').html(data);

                    },
                    error: function(data) {
                        console.log("Failed");
                    }
                });
         //   }     

        });
    });
</script>

