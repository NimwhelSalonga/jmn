 <div class="modal fade text-start" id="del-supplier" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Delete Supplier</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="row">
                      <div class="col-12" id="msg_del">
                      </div>
                    </div>
                   <h5><center>Do you want to delete ? <u id="delete_suppliername"></u></center></h5>
               </div>
              <div class="modal-footer">
                  <input type="hidden" id="delete_supplierid">
                  <button class="btn btn-danger" type="button" data-bs-dismiss="modal">No</button>
                  <button class="btn btn-info" type="button" id="btn-del">Yes</button>
                </div>
          </form>
       </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#btn-del');
        btn.addEventListener('click', () => {

            const supplier_id = document.querySelector('input[id=delete_supplierid]').value;

           // var delay = 100;
            var data = new FormData(this.form);

            data.append('supplier_id', supplier_id);

            $.ajax({
                url: '../function/controllers/supplier.php?action=delete_supplier',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,

                async: false,
                cache: false,
                success: function(data) {
                        $('#msg_del').html(data);

                },
                error: function(data) {
                    console.log("Failed");
                }
            });

        });
    });
</script>

