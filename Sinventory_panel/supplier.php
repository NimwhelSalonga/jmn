
 <?php include('inc/header.php');?>
  <?php include('inc/sidebar.php');?>
        <div class="content-inner w-100 h-100">
         
          <header class="bg-white shadow-sm px-4 py-3 z-index-20">
            <div class="container-fluid px-0">
              <h2 class="mb-0 p-1">Manage Supplier</h2>
            </div>
          </header>
          
          <div class="bg-white">
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                  <li class="breadcrumb-item"><a class="fw-light" href="dashboard">Dashboard</a></li>
                  <li class="breadcrumb-item active fw-light" aria-current="page">Manage Supplier</li>
                </ol>
              </nav>
            </div>
          </div>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row gy-4">
                <div class="col-lg-12">
                  <div class="card mb-0">
                    <div class="card-header">
                       <button type="button" class="btn btn-warning" style="float: right;" data-bs-toggle="modal" data-bs-target="#add-supplier"><i class="fa fa-plus"></i> Add Supplier</button>
                      </div>
                    <div class="col-lg-12">
                    <div class="card-body">
                      <div class="table-responsive">
                            <table class="table mb-0 table-striped table-sm" id="dataTable_1">
                          <thead>
                            <tr>
                              <th>PHOTO</th>
                              <th>SUPPLIER&nbsp;NAME</th>
                              <th>CONTACT&nbsp;NUMBER</th>
                              <th>EMAIL</th>
                              <th>ADDRESS</th>
                              <th>ACTION</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($suppliers as $row) { 
                            $pic = htmlentities($row['photo']);
                            $image = $pic ? $pic :"../uploads/no-photo-icon-vector-14123362.jpg";//sets your image

                            ?>
                            <tr>
                              <td><center><img src="<?php echo $image;?>" width="50px" height="50px" ></center></td>
                              <td><?= ucfirst(htmlentities($row['supplier_name'])); ?></td>
                              <td><?= ucfirst(htmlentities($row['contact_number'])); ?></td>
                              <td><?= ucfirst(htmlentities($row['email'])); ?></td>
                              <td><?= ucfirst(htmlentities($row['address'])); ?></td>

                              <td> <i class="fa fa-edit edit_E" style="color: green" data-bs-toggle="modal" data-bs-target="#edit-supplier" data-id="<?= htmlentities($row['supplier_id']); ?>"></i> | <i class="fa fa-trash _delete_sup" style="color:red" title="Delete" data-bs-toggle="modal" data-bs-target="#del-supplier" data-del="<?= htmlentities($row['supplier_id']); ?>" ></i></td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
       
        
        </div>
      </div>
    </div>
    <?php include 'modal/add_supplier.php';?>
    <?php include 'modal/edit_supplier.php';?>
    <?php include 'modal/delete_supplier.php';?>
     <script>
       $(document).ready(function() {   
           load_data();    
           var count = 1; 
           function load_data() {
               $(document).on('click', '.edit_E', function() {
                    var supplier_id = $(this).data("id");
                    console.log(supplier_id);
                      get_Id(supplier_id);   
             
               });
            }

             function get_Id(supplier_id) {
                  $.ajax({
                      type: 'POST',
                      url: 'fetch_row/supplier_row.php',
                      data: {
                          supplier_id: supplier_id
                      },
                      dataType: 'json',
                      success: function(response) {
                      $('#edit_supplierid').val(response.supplier_id);
                      $('#edit_suppliername').val(response.supplier_name);
                      $('#edit_contactnumber').val(response.contact_number);
                      $('#edit_email').val(response.email);
                      $('#edit_address').val(response.address);
                      
      
                   }
                });
             }
       
       });
        
 </script>
  <script>
         $(document).ready(function() {   
               load_data();    
               var count = 1; 
               function load_data() {
                   $(document).on('click', '._delete_sup', function() {
                        let supplier_id = $(this).data("del");
                        getIDs_del(supplier_id);    
                 
                   });
                }

                 function getIDs_del(supplier_id) {
                      $.ajax({
                          type: 'POST',
                            url: 'fetch_row/supplier_row.php',
                          data: {
                              supplier_id: supplier_id
                          },
                          dataType: 'json',
                          success: function(responses2) {
                          $('#delete_supplierid').val(responses2.supplier_id);
                          $('#delete_suppliername').html(responses2.supplier_name);

                       }
                    });
                 }
           
           });
            
    </script>
    <?php include 'inc/footer.php';?>
    
