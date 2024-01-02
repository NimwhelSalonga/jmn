
 <?php include('inc/header.php');?>
  <?php include('inc/sidebar.php');?>
        <div class="content-inner w-100 h-100">
          <!-- Page Header-->
          <header class="bg-white shadow-sm px-4 py-3 z-index-20">
            <div class="container-fluid px-0">
              <h2 class="mb-0 p-1">Manage Sales</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="bg-white">
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                  <li class="breadcrumb-item"><a class="fw-light" href="dashboard">Dashboard</a></li>
                  <li class="breadcrumb-item active fw-light" aria-current="page">Manage Sales</li>
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
                       
                      </div>
                    <div class="col-lg-12">
                    <div class="card-body">
                      <div class="table-responsive">
                            <table class="table mb-0 table-striped table-sm" id="dataTable_1">
                          <thead>
                            <tr>
                              <th>DATE</th>
                              <th>REFERENCE #</th>
                              <th>CUSTOMER&nbsp;NAME</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($sales as $row) { ?>
                            <tr>

                              <td><?php echo date("M d, Y",strtotime($row['date_created'])) ?></td>
                              <td><?= ucfirst(htmlentities($row['product_name'])); ?></td>
                              <td><?= ucfirst(htmlentities($row['supplier_name'])); ?></td>
                             

                              
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

    <?php include 'inc/footer.php';?>
    
