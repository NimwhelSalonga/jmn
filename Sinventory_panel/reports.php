<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Sales</title>
   
    <?php include('inc/header.php'); ?>
</head>

<body>
    <?php include('inc/sidebar.php'); ?>
    <div class="content-inner w-100 h-100">
        <header class="bg-white shadow-sm px-4 py-3 z-index-20">
            <div class="container-fluid px-0">
                <h2 class="mb-0 p-1">Manage Sales</h2>
            </div>
        </header>

        <?php
        
        $db_host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "jmn";

        
        $conn = new mysqli($db_host, $username, $password, $dbname);

          
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT receiving_date, reference_no, product_name, supplier_name, price, quantity, receiver_address FROM receiving_report";

        $result = $conn->query($sql);

        $sales = array(); 

        if ($result->num_rows > 0) {
           
            while ($row = $result->fetch_assoc()) {
                $sales[] = $row;
            }
        } else {
            $sales = []; 
        }

        // Close connection
        $conn->close();
        ?>

        <section class="tables">
            <div class="container-fluid">
                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <div class="card-header"></div>
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-striped table-sm" id="dataTable_1">
                                            <thead>
                                                <tr>
                                                    <th>DATE</th>
                                                    <th>REFERENCE #</th>
                                                    <th>PRODUCT NAME</th>
                                                    <th>PRICE</th>
                                                    <th>QUANTITY</th>
                                                    <th>SUPPLIER</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($sales as $row) { ?>
                                                    <tr>
                                                        <td><?php echo date("M d, Y", strtotime($row['receiving_date'])) ?></td>
                                                        <td><?= htmlentities($row['reference_no']); ?></td>
                                                        <td><?= htmlentities($row['product_name']); ?></td>
                                                        <td><?= htmlentities($row['price']); ?></td>
                                                        <td><?= htmlentities($row['quantity']); ?></td>
                                                        <td><?= htmlentities($row['supplier_name']); ?></td>
                                                        <td><?= htmlentities($row['receiver_address']); ?></td>
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
            </div>
        </section>
     
    </div>

</body>

</html  