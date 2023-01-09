         <div class="modal fade" id="edit-corder" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
             <div class="modal-dialog modal-md" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="smallmodalLabel">Edit Order
                         </h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                      <form method="POST">
                        <div id="msg-orderedit"></div>
                         <div class="row">
                             <div class="col-5">

                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Reference No.</label>
                                     <input type="text" class="form-control" alt="reference_no2"  id="edit_referenceno" placeholder="Enter Reference No .." autocomplete="off" readonly>
                                 </div>
                             </div>
                             <div class="col-5">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Item</label>
                                     <?php
                                        require_once 'config/conn/db_connection.php';
                                        $smt = $db->prepare('SELECT productcategory_name FROM tbl_productcategory');
                                        $smt->execute();
                                        $data = $smt->fetchAll();
                                     ?>
                                     <select class="form-control" alt="item" id="edit_item">
                                         <?php foreach ($data as $row): ?>
                                         <option value="<?=ucfirst(htmlentities($row["productcategory_name"]));?>"><?=ucfirst(htmlentities($row["productcategory_name"]));?></option>
                                         <?php endforeach ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-2">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">QTY</label>
                                     <input type="number" class="form-control" alt="qty2" id="edit_qty" placeholder="0">
                                 </div>
                             </div>
                         </div>

                           <div class="row">
                             <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Price</label>
                                     <input type="text" class="form-control" alt="price2" id="edit_price"  placeholder="00.00">
                                 </div>
                             </div>
                              <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Status</label>
                                         <select class="form-control" alt="status" id="edit_status">
                                          <option value="Approved">Approved</option>
                                          <option value="To Deliver">To Deliver</option>
                                          <option value="Received">Received</option>
                                          <option value="Cancelled">Cancelled</option>
                                         </select>
                                 </div>
                             </div>

                           </div>

                           <div class="row">
                             <div class="col-12">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Remarks</label>
                                     <textarea  type="text" class="form-control" alt="remarks2" id="edit_remarks" placeholder="Remarks..."></textarea>
                                     
                                 </div>
                             </div>

                           </div>

                       </div>

                         <div class="modal-footer">
                            <input type="hidden" id="edit_orderid" name="">
                             <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                             <button type="button" class="btn btn-primary" id="edit-orders"><i class="fa fa-check"></i> Submit</button>
                        </div>  
                    </div>
                   </form>
                </div>
            </div>
       </div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#edit-orders');
        btn.addEventListener('click', () => {

            const reference_no = document.querySelector('input[alt=reference_no2]').value;
            const item = $('#edit_item option:selected').val();
            const qty = document.querySelector('input[alt=qty2]').value;
            const price = document.querySelector('input[alt=price2]').value;
            const status = $('#edit_status option:selected').val();
            const remarks = document.querySelector('textarea[alt=remarks2]').value;
            const order_id = document.querySelector('input[id=edit_orderid]').value;

            var data = new FormData(this.form);

          data.append('reference_no', reference_no);
          data.append('item', item);
          data.append('qty', qty);
          data.append('price', price);
          data.append('status', status);
          data.append('remarks', remarks);
          data.append('order_id', order_id);


                $.ajax({
                    url: 'controllers/edit_order.php',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,

                    async: false,
                    cache: false,

                    success: function(data) {
                        $('#msg-orderedit').html(data);

                    },
                    error: function(data) {
                        console.log("Failed");
                    }
                });
          //  }     

        });
    });
</script>


