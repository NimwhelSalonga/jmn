 <div class="modal fade text-start" id="add-product" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Add Product</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form enctype="multipart/form-data" method="POST">
                     <div class="row">
                         <div class="col-12" id="msg_P">

                         </div>
                     </div>
                     <?php 
                          $RandomNumber = rand(10000000,99999999);
                      ?>
                     <div class="row">
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Product Code</label>
                             <input class="form-control" id="product_code" type="text" value="<?php echo $RandomNumber;?>" autocomplete="off" required data-validate-field="" readonly="">
                         </div>
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Category</label>
                                 <select class="form-select" name="category_name" id="category_name" class="form-control">
                                     <option selected disabled value="">&larr; Select Category  &rarr;</option>
                                     <?php foreach ($categories as $row): ?>
                                     <option value="<?=htmlentities($row["category_name"]);?>"><?=htmlentities($row["category_name"]);?></option>
                                     <?php endforeach ?>
                             </select>
                          </div>
                     </div>
                    
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Product Name</label>
                             <input class="form-control" id="product_name" type="text" autocomplete="off" required data-validate-field="">
                         </div>
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Description</label>
                             <input class="form-control" id="description" type="text" autocomplete="off" required data-validate-field="">
                         </div>

                    
                     <div class="row">
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Product Price</label>
                             <input class="form-control" id="product_price" type="text" autocomplete="off" placeholder="₱ 00.0" required data-validate-field="">
                         </div>
                    
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Product Image</label>
                             <input type="file" class="form-control" id="product_image" autocomplete="off" required data-validate-field="">
                         </div>
                     </div>

             </div>

             <div class="modal-footer">
                 <input type="hidden" name="" id="type" value="ADMINISTRATION">
                 <button class="btn btn-success" type="button" id="btn-product">Save</button>
                 <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>

                 </form>
             </div>
         </div>
     </div>
 </div>
<!--   <script type="text/javascript">
     $('select').select2({
        dropdownParent: $('#add-product'),
       
   
    })
 </script> -->
 <script>
     document.addEventListener('DOMContentLoaded', () => {
         let btn = document.querySelector('#btn-product');
         btn.addEventListener('click', () => {

             const product_code = document.querySelector('input[id=product_code]').value;
             console.log('==============product_code================');
             console.log(product_code);
      
             const category_name = $('#category_name option:selected').val();
             console.log('==============category_name================');
             console.log(category_name);

             const product_name = document.querySelector('input[id=product_name]').value;
             console.log('==============product_name================');
             console.log(product_name);

             const description = document.querySelector('input[id=description]').value;
             console.log('==============description================');
             console.log(description);


             const product_price = document.querySelector('input[id=product_price]').value;
             console.log('==============product_price================');
             console.log(product_price);

             const product_image = document.querySelector('input[id=product_image]').value;
             console.log('==============product_image================');
             console.log(product_image);

             // var delay = 100;
             var data = new FormData(this.form);

             data.append('product_code', product_code);
             data.append('category_name', category_name);
             data.append('product_name', product_name);
             data.append('description', description);
             data.append('product_price', product_price);
             data.append('product_image', $('#product_image')[0].files[0]);


             if (category_name == '' || product_name == '' || product_price == '') {
                 $('#msg_P').html('<div class="alert alert-danger"><i class="fa fa-plus" aria-hidden="true"></i> Required some fields!</div>');
             } else {
                 $.ajax({
                     url: '../function/controllers/product.php?action=add_product',
                     type: "POST",
                     data: data,
                     processData: false,
                     contentType: false,

                     async: false,
                     cache: false,
                     success: function(data) {
                         $('#msg_P').html(data);


                     },
                     error: function(data) {
                         console.log("Failed");
                     }
                 });
             }
         });
     });
 </script>
<!--  <script type="text/javascript">
     $(document).ready(function() {
    $('#category_name').select2();
});
 </script> -->