 <div class="modal fade text-start" id="add-customer" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Add Customer</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form enctype="multipart/form-data" method="POST">
                     <div class="row">
                         <div class="col-12" id="msg_c">

                         </div>
                     </div>

                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Customer Full Name</label>
                             <input class="form-control" id="fullname" type="text" autocomplete="off" required data-validate-field="loginUsername">
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Contact Number</label>
                             <input class="form-control" id="contact" type="text" minlength="11" maxlength="11" autocomplete="off" required data-validate-field="loginUsername">
                         </div>
                         <div class="col-6">
                             <label class="form-label" for="modalInputEmail1">Email</label>
                             <input class="form-control" id="email" type="email" autocomplete="off" required data-validate-field="loginUsername">
                         </div>

                     </div>
                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Address</label>
                             <input class="form-control" id="address" type="text" autocomplete="off" required data-validate-field="loginUsername">
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Photo</label>
                             <input type="file" class="form-control" id="photo" autocomplete="off" required data-validate-field="loginUsername">
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
 <script>
     document.addEventListener('DOMContentLoaded', () => {
         let btn = document.querySelector('#btn-customer');
         btn.addEventListener('click', () => {

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