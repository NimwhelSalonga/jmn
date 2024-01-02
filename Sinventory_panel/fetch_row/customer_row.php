<?php 

    ob_start();
    error_reporting(0);
    include_once '../../function/database/config.php';
     require_once "../../function/model/class_model.php";
     $conn = new class_model();
	if(isset($_POST['customer_id'])){
		$id = htmlspecialchars(strip_tags($_POST['customer_id']));
    	$x = $conn->getcustomer_id($id);
    	echo $x;
    	
	}
    
?>

