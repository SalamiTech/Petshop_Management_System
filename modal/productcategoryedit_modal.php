<div class="modal fade" id="edit-productcategory" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Edit Product Category
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="" id="msgs_6"></div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Category</label>
                        <input type="text" class="form-control" id="edit_procategoryname" alt="procategoryname_name2" placeholder="Enter Category Name.." autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="edit_procatid" name="">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="button" class="btn btn-primary" id="edit-procat"><i class="fa fa-check"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#edit-procat');
        btn.addEventListener('click', () => {

            const productcategory_name = document.querySelector('input[alt=procategoryname_name2]').value;
            const productcategory_id= document.querySelector('input[id=edit_procatid]').value;
  

            var data = new FormData(this.form);

          data.append('productcategory_name', productcategory_name);
          data.append('productcategory_id', productcategory_id);

          // if (category_name == '') {

          //   } else {
                $.ajax({
                    url: 'controllers/edit_productcategory.php',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,

                    async: false,
                    cache: false,

                    success: function(data) {
                        $('#msgs_6').html(data);

                    },
                    error: function(data) {
                        console.log("Failed");
                    }
                });
         //   }     

        });
    });
</script>

