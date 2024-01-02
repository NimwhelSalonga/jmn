 <div class="modal fade text-start" id="add-receiving" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Add Receiving</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form enctype="multipart/form-data">
                     <div class="row">
                         <div class="col-12" id="msg_i">

                         </div>
                     </div>

                     <div class="row">
                         <div class="col-12 mb-1">
                             <label class="form-label" for="modalInputEmail1">Supplier</label>
                             <select class="form-select" name="supplier_name" id="supplier_name">
                                 <option selected disabled value="">&larr; Select Supplier Name &rarr;</option>
                                 <?php foreach ($suppliers as $row): ?>
                                 <option value="<?=htmlentities($row["supplier_name"]);?>"><?=htmlentities($row["supplier_name"]);?></option>
                                 <?php endforeach ?>
                             </select>
                         </div>

                     </div>
                     <div class="row">
                         <div class="col-3">
                             <label class="form-label" for="modalInputEmail1">Product</label>
                             <select class="form-select" name="product_name" id="product_id" class="form-control">
                                 <option selected disabled value="">&larr; Select Product &rarr;</option>
                                 <?php foreach ($products as $row): ?>
                                 <option value="<?=htmlentities($row["product_id"]);?>" data-id="<?=htmlentities($row["product_price"]);?>"><?=htmlentities($row["product_name"]);?></option>
                                 <?php endforeach ?>
                             </select>
                         </div>
                         <div class="col-3">
                             <label class="form-label" for="modalInputEmail1">QTY</label>
                             <input class="form-control number" id="quantity" type="text" autocomplete="off" autofocus="autofocus" required data-validate-field="loginUsername">
                         </div>
                         <div class="col-3">
                             <label class="form-label" for="modalInputEmail1">Price</label>
                             <input class="form-control number" id="price" type="text" autocomplete="off" required data-validate-field="loginUsername">
                         </div>
                         <div class="col-3" style="margin-top: 30px">
                             <label class="form-label" for="modalInputEmail1" style="color: #fff"></label>
                             <button type="button" class="btn btn-primary btn-block" id="addlist"><i class="fa fa-plus"></i> Add</button>

                         </div>


                     </div>
                     <div class="row">
                         <div class="col-12 mt-2">
                             <table class="table mb-0 table-striped table-sm" id="dataTable_2">
                                 <thead>
                                     <tr>
                                         <th>Product Code</th>
                                         <th>Product Name</th>
                                         <th>Description</th>
                                         <th>QTY</th>
                                         <th>Price</th>

                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php foreach ($receivings as $row) { ?>
                                     <tr>
                                         <td><?= ucfirst(htmlentities($row['product_code'])); ?></td>
                                         <td><?= ucfirst(htmlentities($row['product_name'])); ?></td>
                                         <td><?= ucfirst(htmlentities($row['description'])); ?></td>
                                         <td><?= ucfirst(htmlentities($row['quantity'])); ?></td>
                                         <td><?= ucfirst(htmlentities($row['price'])); ?></td>


                                     </tr>

                                     <?php } ?>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>


                                         <?php foreach ($receivingstotal as $row1) { ?>

                                         <td colspan="5"><B>Total: </B> <?php echo number_format($row1['count'],2);?></td>
                                         <?php } ?>

                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>

             </div>

             <div class="modal-footer">
                 <input type="hidden" name="" id="type" value="ADMINISTRATION">
                 <button class="btn btn-success" type="button" id="btn-customer">Save</button>
                 <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>

                 </form>
             </div>
         </div>
     </div>
 </div>
 <!--  <script type="text/javascript">
     $('select').select2({
        dropdownParent: $('#add-receiving'),
     
   
    })
 </script>
 -->
 <script type="text/javascript">
     function myFunction(e) {
         // var value =  $(this).data("id");

         var product_id = document.getElementById("product_id").value;
         console.log(product_id);

         var data = new FormData(this.form);
         data.append('product_id', product_id);

         $.ajax({
             url: '',
             type: "POST",
             data: data,
             processData: false,
             contentType: false,

             async: false,
             cache: false,
             success: function(data) {
                 $('#msg_i').html(data);


             },
             error: function(data) {
                 console.log("Failed");
             }
         });
     }
 </script>


 <script>
     $('#quantity').keyup(function() {

         var quantity = document.getElementById("quantity").value;
         console.log(quantity);

         var price = document.getElementById("price").value;
         console.log(price);

         var amount = parseFloat(quantity) * parseFloat(price);
         console.log(amount);
         $('#price').val(amount);

     });
 </script>

 <script>
     $('#product_id').change(function() {
         var product_id = document.getElementById("product_id").value;
         console.log(product_id);

         $.ajax({
             url: "../function/controllers/receiving.php?action=get_productID",
             data: {
                 product_id: product_id
             },
             type: "post",
             success: function(data) {
                 $('#price').val(data);
             }
         });
     });
 </script>
 <script>
     document.addEventListener('DOMContentLoaded', () => {
         let btn = document.querySelector('#addlist');
         btn.addEventListener('click', (e) => {
             e.preventDefault();


             const supplier_name = $('#supplier_name option:selected').val();
             console.log('==============supplier_name================');
             console.log(supplier_name);

             const product_id = $('#product_id option:selected').val();
             console.log('==============product_id================');
             console.log(product_id);

             const quantity = document.querySelector('input[id=quantity]').value;
             console.log('==============quantity================');
             console.log(quantity);

             const price = document.querySelector('input[id=price]').value;
             console.log('==============price================');
             console.log(price);


             var data = new FormData(this.form);

             data.append('supplier_name', supplier_name);
             data.append('product_id', product_id);
             data.append('quantity', quantity);
             data.append('price', price);



             if (supplier_name == '' || product_id == '' || quantity == '' || price == '') {
                 $('#msg_i').html('<div class="alert alert-danger"><i class="fa fa-plus" aria-hidden="true"></i> Required  fields!</div>');
             } else {

                 $.ajax({
                     url: '../function/controllers/receiving.php?action=add_receiving',
                     type: "POST",
                     data: data,
                     processData: false,
                     contentType: false,

                     async: false,
                     cache: false,
                     success: function(data) {
                         setInterval('refreshPage()', 1000);

                     },
                     error: function(data) {
                         console.log("Failed");
                     }
                 });
             }
         });
     });

     function refreshPage() {
         location.reload(true);
         // setInterval($('#add-receiving').modal('show'), 2000);

     }
 </script>
 <!--  <script type="text/javascript">
           $(document).ready(function() {
     
          var table = $('#dataTable_2').DataTable({
      
        });
        table.ajax.reload();

      });
 </script> -->


 <script>
     document.addEventListener('DOMContentLoaded', () => {
         let btn = document.querySelector('#btn-customer');
         btn.addEventListener('click', (e) => {
             e.preventDefault();

             const customer_name = document.querySelector('input[id=fullname]').value;
             console.log('==============customer_name================');
             console.log(customer_name);

             const contact_number = document.querySelector('input[id=contact]').value;
             console.log('==============contact_number================');
             console.log(contact_number);

             const email = document.querySelector('input[id=email]').value;
             console.log('==============email================');
             console.log(email);

             const address = document.querySelector('input[id=address]').value;
             console.log('==============address================');
             console.log(address);

             const photo = document.querySelector('input[id=photo]').value;
             console.log('==============photo================');
             console.log(photo);

             // var delay = 100;
             var data = new FormData(this.form);

             data.append('customer_name', customer_name);
             data.append('contact_number', contact_number);
             data.append('email', email);
             data.append('address', address);
             data.append('photo', $('#photo')[0].files[0]);


             if (customer_name == '' || contact_number == '' || address == '') {
                 $('#msg_c').html('<div class="alert alert-danger"><i class="fa fa-plus" aria-hidden="true"></i> Required some fields!</div>');
             } else {
                 $.ajax({
                     url: '../function/controllers/customer.php?action=add_customer',
                     type: "POST",
                     data: data,
                     processData: false,
                     contentType: false,

                     async: false,
                     cache: false,
                     success: function(data) {
                         $('#msg_c').html(data);


                     },
                     error: function(data) {
                         console.log("Failed");
                     }
                 });
             }
         });
     });
 </script>