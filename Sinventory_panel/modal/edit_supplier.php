 <div class="modal fade text-start" id="edit-supplier" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Edit Supplier</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form enctype="multipart/form-data" method="POST">
                     <div class="row">
                         <div class="col-12" id="msg_Ec">

                         </div>
                     </div>

                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Supplier Full Name</label>
                             <input class="form-control" id="edit_suppliername" type="text" autocomplete="off" required data-validate-field="loginUsername">
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Contact Number</label>
                             <input class="form-control" id="edit_contactnumber" type="text" minlength="11" maxlength="11" autocomplete="off" required data-validate-field="loginUsername">
                         </div>
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Email</label>
                             <input class="form-control" id="edit_email" type="email" autocomplete="off" required data-validate-field="loginUsername">
                         </div>

                     </div>
                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Address</label>
                             <input class="form-control" id="edit_address" type="text" autocomplete="off" required data-validate-field="loginUsername">
                         </div>
                     </div>


             </div>

             <div class="modal-footer">
                 <input type="hidden" name="" id="edit_supplierid" >
                 <button class="btn btn-success" type="button" id="btn-editsupplier">Update</button>
                 <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>

                 </form>
             </div>
         </div>
     </div>
 </div>
 <script>
     document.addEventListener('DOMContentLoaded', () => {
         let btn = document.querySelector('#btn-editsupplier');
         btn.addEventListener('click', () => {

             const supplier_name = document.querySelector('input[id=edit_suppliername]').value;
             console.log('==============supplier_name================');
             console.log(supplier_name);

             const contact_number = document.querySelector('input[id=edit_contactnumber]').value;
             console.log('==============contact_number================');
             console.log(contact_number);

             const email = document.querySelector('input[id=edit_email]').value;
             console.log('==============email================');
             console.log(email);

             const address = document.querySelector('input[id=edit_address]').value;
             console.log('==============address================');
             console.log(address);

             const supplier_id = document.querySelector('input[id=edit_supplierid]').value;
             console.log('==============supplier_id================');
             console.log(supplier_id);

             // var delay = 100;
             var data = new FormData(this.form);

             data.append('supplier_name', supplier_name);
             data.append('contact_number', contact_number);
             data.append('email', email);
             data.append('address', address);
             data.append('supplier_id', supplier_id);



             // if (supplier_name == '' || contact_number == '' || address == '') {
             //     $('#msg_c').html('<div class="alert alert-danger"><i class="fa fa-plus" aria-hidden="true"></i> Required some fields!</div>');
             // } else {
                 $.ajax({
                     url: '../function/controllers/supplier.php?action=edit_supplier',
                     type: "POST",
                     data: data,
                     processData: false,
                     contentType: false,

                     async: false,
                     cache: false,
                     success: function(data) {
                         $('#msg_Ec').html(data);


                     },
                     error: function(data) {
                         console.log("Failed");
                     }
                 });
             //}
         });
     });
 </script>