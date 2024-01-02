 <div class="modal fade text-start" id="edit-product" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Edit Product</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form enctype="multipart/form-data" method="POST">
                     <div class="row">
                         <div class="col-12" id="msg_editP">

                         </div>
                     </div>
             
                     <div class="row">
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Product Code</label>
                             <input class="form-control" id="edit_productcode" type="text"  autocomplete="off" required data-validate-field="" readonly="">
                         </div>
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Category</label>
                                 <select class="form-select" name="category_name" id="edit_categoryname" class="form-control">
                                     <!-- <option selected disabled value="">&larr; Select Category Name &rarr;</option> -->
                                     <?php foreach ($categories as $row): ?>
                                     <option value="<?=htmlentities($row["category_name"]);?>"><?=htmlentities($row["category_name"]);?></option>
                                     <?php endforeach ?>
                             </select>
                          </div>
                     </div>
                    
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Product Name</label>
                             <input class="form-control" id="edit_productname" type="text" autocomplete="off" required data-validate-field="">
                         </div>
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Description</label>
                             <input class="form-control" id="edit_description" type="text" autocomplete="off" required data-validate-field="">
                         </div>

                    
                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Product Price</label>
                             <input class="form-control" id="edit_productprice" type="text" autocomplete="off" placeholder="₱ 00.0" required data-validate-field="">
                         </div>
                    
                
                     </div>

             </div>

             <div class="modal-footer">
                 <input type="hidden" name="" id="edit_productid">
                 <button class="btn btn-success" type="button" id="btn-editproduct">Update</button>
                 <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>

                 </form>
             </div>
         </div>
     </div>
 </div>
 <script>
     document.addEventListener('DOMContentLoaded', () => {
         let btn = document.querySelector('#btn-editproduct');
         btn.addEventListener('click', () => {

     
      
             const category_name = $('#edit_categoryname option:selected').val();
             console.log('==============category_name================');
             console.log(category_name);

             const product_name = document.querySelector('input[id=edit_productname]').value;
             console.log('==============product_name================');
             console.log(product_name);

             const description = document.querySelector('input[id=edit_description]').value;
             console.log('==============description================');
             console.log(description);


             const product_price = document.querySelector('input[id=edit_productprice]').value;
             console.log('==============product_price================');
             console.log(product_price);

             const product_id = document.querySelector('input[id=edit_productid]').value;
             console.log('==============product_id================');
             console.log(product_id);

             // var delay = 100;
             var data = new FormData(this.form);


             data.append('category_name', category_name);
             data.append('product_name', product_name);
             data.append('description', description);
             data.append('product_price', product_price);
             data.append('product_id', product_id);
   

             // if (category_name == '' || product_name == '' || product_price == '') {
             //     $('#msg_P').html('<div class="alert alert-danger"><i class="fa fa-plus" aria-hidden="true"></i> Required some fields!</div>');
             // } else {
                 $.ajax({
                     url: '../function/controllers/product.php?action=edit_product',
                     type: "POST",
                     data: data,
                     processData: false,
                     contentType: false,

                     async: false,
                     cache: false,
                     success: function(data) {
                         $('#msg_editP').html(data);


                     },
                     error: function(data) {
                         console.log("Failed");
                     }
                 });
            // }
         });
     });
 </script>
<!--  <script type="text/javascript">
     $(document).ready(function() {
    $('#category_name').select2();
});
 </script> -->