 <div class="modal fade" id="smallmodal2" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">Add Product Category
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                     <form method="POST">
                    <div class="modal-body">
                        <div class="" id="msgs_5"></div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Product Category</label>
                          <input type="text" class="form-control" id="productcategory_name" alt="productcategory_name" placeholder="Enter Product Category Name.." autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                       <button type="button" class="btn btn-primary" id="add-procat"><i class="fa fa-check"></i> Submit</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>

   <script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#add-procat');
        btn.addEventListener('click', () => {

            const productcategory_name = document.querySelector('input[alt=productcategory_name]').value;

            var data = new FormData(this.form);

          data.append('productcategory_name', productcategory_name);

          if (productcategory_name == '') {

            } else {
                $.ajax({
                    url: 'controllers/add_productcategory.php',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,

                    async: false,
                    cache: false,

                    success: function(data) {
                        $('#msgs_5').html(data);

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
            $("#productcategory_name").focusout(function() {

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