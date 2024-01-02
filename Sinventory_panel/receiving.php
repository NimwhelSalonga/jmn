
 <?php include('inc/header.php');?>
  <?php include('inc/sidebar.php');?>
        <div class="content-inner w-100 h-100">
          <!-- Page Header-->
          <header class="bg-white shadow-sm px-4 py-3 z-index-20">
            <div class="container-fluid px-0">
              <h2 class="mb-0 p-1">Manage Receiving</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="bg-white">
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                  <li class="breadcrumb-item"><a class="fw-light" href="dashboard">Dashboard</a></li>
                  <li class="breadcrumb-item active fw-light" aria-current="page">Manage Receiving</li>
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
                       <button type="button" class="btn btn-warning" style="float: right;" data-bs-toggle="modal" data-bs-target="#add-receiving"><i class="fa fa-plus"></i> Add Receiving</button>
                      </div>
                    <div class="col-lg-12">
                    <div class="card-body">
                      <div class="table-responsive">
                            <table class="table mb-0 table-striped table-sm" id="dataTable_1">
                          <thead>
                            <tr>
                             <th>CATEGORY NAME</th>
                              <th>PRODUCT&nbsp;NAME</th>
                              <th>SUPPLIER&nbsp;NAME</th>
                              <th>ACTION</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($categories as $row) { ?>
                            <tr>
      
                              <td><?= ucfirst(htmlentities($row['category_name'])); ?></td>
                              <td><?= ucfirst(htmlentities($row['category_decription'])); ?></td>
                              <td><?= ucfirst(htmlentities($row['category_decription'])); ?></td>

                              <td> <i class="fa fa-edit edit_C" style="color: green" data-bs-toggle="modal" data-bs-target="#edit-category" data-id="<?= htmlentities($row['category_id']); ?>"></i> | <i class="fa fa-trash _delete_cat" style="color:red" title="Delete" data-bs-toggle="modal" data-bs-target="#del-category" data-del="<?= htmlentities($row['category_id']); ?>" ></i></td>
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
        <!-- Page Footer-->
         
        </div>
      </div>
    </div>
    <?php include 'modal/add_receiving.php';?>
    <?php include 'modal/edit_category.php';?>
    <?php include 'modal/delete_category.php';?>
     <script>
       $(document).ready(function() {   
           load_data();    
           var count = 1; 
           function load_data() {
               $(document).on('click', '.edit_C', function() {
                    var category_id = $(this).data("id");
                    console.log(category_id);
                      get_Id(category_id); //argument    
             
               });
            }

             function get_Id(category_id) {
                  $.ajax({
                      type: 'POST',
                      url: 'fetch_row/category_row.php',
                      data: {
                          category_id: category_id
                      },
                      dataType: 'json',
                      success: function(response) {
                      $('#edit_categoryid').val(response.category_id);
                      $('#edit_categoryname').val(response.category_name);
                     $('#edit_categorydecription').val(response.category_decription);
      
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
                   $(document).on('click', '._delete_cat', function() {
                        let category_id = $(this).data("del");
                        getIDs_del(category_id); //argument    
                 
                   });
                }

                 function getIDs_del(category_id) {
                      $.ajax({
                          type: 'POST',
                          url: 'fetch_row/category_row.php',
                          data: {
                              category_id: category_id
                          },
                          dataType: 'json',
                          success: function(responses2) {
                          $('#delete_categoryid').val(responses2.category_id);
                          $('#delete_categoryname').html(responses2.category_name);

                       }
                    });
                 }
           
           });
            
    </script>
    <?php include 'inc/footer.php';?>
    
