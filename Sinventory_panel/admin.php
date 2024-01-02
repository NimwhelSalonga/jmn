
 <?php include('inc/header.php');?>
  <?php include('inc/sidebar.php');?>
        <div class="content-inner w-100 h-100">
          
          <header class="bg-white shadow-sm px-4 py-3 z-index-20">
            <div class="container-fluid px-0">
              <h2 class="mb-0 p-1">Manage Admin</h2>
            </div>
          </header>
          
          <div class="bg-white">
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                  <li class="breadcrumb-item"><a class="fw-light" href="dashboard">Dashboard</a></li>
                  <li class="breadcrumb-item active fw-light" aria-current="page">Manage Admin</li>
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
                              <th>USERNAME</th>
                              <th>PASSWORD</th>
                              <th>STATUS</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($admin as $row) { ?>
                            <tr>

                              <td><?= ucfirst(htmlentities($row['username'])); ?></td>
                              <td><?= ucfirst(htmlentities($row['password'])); ?></td>
                              <td><span class="badge badge-primary" style="background-color: green"><?= ucfirst(htmlentities($row['status'])); ?></span></td>
                             

                            
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

    <?php include 'inc/footer.php';?>
    
