 <div class="modal fade text-start" id="edit-category" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Edit Category</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form  method="POST">
                     <div class="row">
                         <div class="col-12" id="msg_EditC">

                         </div>
                     </div>

                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Category Name</label>
                             <input class="form-control" id="edit_categoryname" type="text" autocomplete="off" required data-validate-field="">
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <label class="form-label" for="modalInputEmail1">Category Decription</label>
                             <textarea class="form-control" rows="2" id="edit_categorydecription" autocomplete="off" required data-validate-field=""></textarea>
                    </div>
      

              </div>
          </div>
             <div class="modal-footer">
                 <input type="hidden" name="" id="edit_categoryid">
                 <button class="btn btn-success" type="button" id="btn-Editcategory">Update</button>
                 <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>

                 </form>
            
             </div>

          </div>
        </div>
     </div>
 <!--      <script type="text/javascript">
     $('select').select2({
        dropdownParent: $('#edit-category'),
      
    })
 </script> -->
 <script>

     document.addEventListener('DOMContentLoaded', () => {
         let btn = document.querySelector('#btn-Editcategory');
         btn.addEventListener('click', () => {

             const category_name = document.querySelector('input[id=edit_categoryname]').value;
             console.log('==============category_name================');
             console.log(category_name);

             const category_decription = document.querySelector('textarea[id=edit_categorydecription]').value;
             console.log('==============category_decription================');
             console.log(category_decription);

             const category_id = document.querySelector('input[id=edit_categoryid]').value;
             console.log('==============category_id================');
             console.log(category_id);

             // var delay = 100;
             var data = new FormData(this.form);

             data.append('category_name', category_name);
             data.append('category_decription', category_decription);
             data.append('category_id', category_id);


             // if (category_name == '' || category_decription == '') {
             //     $('#msg_C').html('<div class="alert alert-danger"><i class="fa fa-plus" aria-hidden="true"></i> Required  fields!</div>');
             // } else {
                 $.ajax({
                     url: '../function/controllers/category.php?action=edit_category',
                     type: "POST",
                     data: data,
                     processData: false,
                     contentType: false,

                     async: false,
                     cache: false,
                     success: function(data) {
                         $('#msg_EditC').html(data);


                     },
                     error: function(data) {
                         console.log("Failed");
                     }
                 });
           //  }
         });
     });
 </script>