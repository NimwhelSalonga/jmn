 <div class="modal fade text-start" id="add-catrgory" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">

             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Add Category</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>

             <div class="modal-body">
                 <form method="POST">
                     <div class="row">
                         <div class="col-12" id="msg_C">

                         </div>
                     </div>

                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Category Name</label>
                             <input class="form-control" id="category_name" type="text" autocomplete="off" required data-validate-field="">
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Category Decription</label>
                             <textarea class="form-control" rows="2" id="category_decription" autocomplete="off" required data-validate-field=""></textarea>
                       </div>
                     </div>
             </div>

             <div class="modal-footer">
                 <input type="hidden" name="" id="type" value="ADMINISTRATION">
                 <button class="btn btn-success" type="button" id="btn-category">Save</button>
                 <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>

                 </form>
             </div>

          </div>
        </div>
     </div>
     <script>
         document.addEventListener('DOMContentLoaded', () => {
             let btn = document.querySelector('#btn-category');
             btn.addEventListener('click', () => {

                 const category_name = document.querySelector('input[id=category_name]').value;
                 console.log('==============category_name================');
                 console.log(category_name);

                 const category_decription = document.querySelector('textarea[id=category_decription]').value;
                 console.log('==============category_decription================');
                 console.log(category_decription);

                 // var delay = 100;
                 var data = new FormData(this.form);

                 data.append('category_name', category_name);
                 data.append('category_decription', category_decription);


                 if (category_name == '' || category_decription == '') {
                     $('#msg_C').html('<div class="alert alert-danger"><i class="fa fa-plus" aria-hidden="true"></i> Required  fields!</div>');
                 } else {
                     $.ajax({
                         url: '../function/controllers/category.php?action=add_category',
                         type: "POST",
                         data: data,
                         processData: false,
                         contentType: false,

                         async: false,
                         cache: false,
                         success: function(data) {
                             $('#msg_C').html(data);


                         },
                         error: function(data) {
                             console.log("Failed");
                         }
                     });
                 }
             });
         });
     </script>