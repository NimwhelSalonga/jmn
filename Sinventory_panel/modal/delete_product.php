 <div class="modal fade text-start" id="del-product" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Delete Product</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="row">
                      <div class="col-12" id="msg_dels">
                      </div>
                    </div>
                   <h5><center>Do you want to delete ? <u id="delete_categoryname"></u></center></h5>
               </div>
              <div class="modal-footer">
                  <input type="hidden" id="delete_productid">
                  <button class="btn btn-danger" type="button" data-bs-dismiss="modal">No</button>
                  <button class="btn btn-info" type="button" id="btn-dels">Yes</button>
                </div>
          </form>
       </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#btn-dels');
        btn.addEventListener('click', () => {

            const product_id = document.querySelector('input[id=delete_productid]').value;

           // var delay = 100;
            var data = new FormData(this.form);

            data.append('product_id', product_id);

            $.ajax({
                url: '../function/controllers/product.php?action=delete_product',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,

                async: false,
                cache: false,
                success: function(data) {
                        $('#msg_dels').html(data);

                },
                error: function(data) {
                    console.log("Failed");
                }
            });

        });
    });
</script>

