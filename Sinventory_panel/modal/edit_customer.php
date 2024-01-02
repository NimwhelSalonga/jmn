 <div class="modal fade text-start" id="edit-customer" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Edit Customer</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form  method="POST">
                     <div class="row">
                         <div class="col-12" id="msg_E">

                         </div>
                     </div>

                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Customer Full Name</label>
                             <input class="form-control" id="edit_customername" type="text" autocomplete="off" required data-validate-field="">
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Contact Number</label>
                             <input class="form-control" id="edit_contactnumber" type="text" minlength="11" maxlength="11" autocomplete="off" required data-validate-field="">
                         </div>
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Email</label>
                             <input class="form-control" id="edit_email" type="email" autocomplete="off" required data-validate-field="">
                         </div>

                     </div>
                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Address</label>
                             <input class="form-control" id="edit_address" type="text" autocomplete="off" required data-validate-field="">
                         </div>
                     </div>


             </div>

             <div class="modal-footer">
                 <input type="hidden" name="" id="type" value="ADMINISTRATION">
                 <input type="hidden" name="" id="edit_customerid">
                 <button class="btn btn-success" type="button" id="btn-editcustomer">Update</button>
                 <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>

                 </form>
             </div>
         </div>
     </div>
 </div>
 <script>
     document.addEventListener('DOMContentLoaded', () => {
         let btn = document.querySelector('#btn-editcustomer');
         btn.addEventListener('click', () => {

             const customer_name = document.querySelector('input[id=edit_customername]').value;
             console.log('==============customer_name================');
             console.log(customer_name);

             const contact_number = document.querySelector('input[id=edit_contactnumber]').value;
             console.log('==============contact_number================');
             console.log(contact_number);

             const email = document.querySelector('input[id=edit_email]').value;
             console.log('==============email================');
             console.log(email);

             const address = document.querySelector('input[id=edit_address]').value;
             console.log('==============address================');
             console.log(address);

             const customer_id = document.querySelector('input[id=edit_customerid]').value;
             console.log('==============customer_id================');
             console.log(customer_id);

             // var delay = 100;
             var data = new FormData(this.form);

             data.append('customer_name', customer_name);
             data.append('contact_number', contact_number);
             data.append('email', email);
             data.append('address', address);
             data.append('customer_id', customer_id);


             // if (customer_name == '' || contact_number == '' || address == '') {
             //     $('#msg_c').html('<div class="alert alert-danger"><i class="fa fa-plus" aria-hidden="true"></i> Required some fields!</div>');
             // } else {
                 $.ajax({
                     url: '../function/controllers/customer.php?action=edit_customer',
                     type: "POST",
                     data: data,
                     processData: false,
                     contentType: false,

                     async: false,
                     cache: false,
                     success: function(data) {
                         $('#msg_E').html(data);


                     },
                     error: function(data) {
                         console.log("Failed");
                     }
                 });
             //}
         });
     });
 </script>