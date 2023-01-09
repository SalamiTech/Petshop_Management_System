<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Add Category
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="" id="msgs"></div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" class="form-control" id="category_name" alt="category_name" placeholder="Enter Category Name.." autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="button" class="btn btn-primary" id="add-cat"><i class="fa fa-check"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#add-cat');
        btn.addEventListener('click', () => {

            const category_name = document.querySelector('input[alt=category_name]').value;

            var data = new FormData(this.form);

          data.append('category_name', category_name);

          if (category_name == '') {

            } else {
                $.ajax({
                    url: 'controllers/add_category.php',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,

                    async: false,
                    cache: false,

                    success: function(data) {
                        $('#msgs').html(data);

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
        }); 
    </script> 