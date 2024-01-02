<?php
   ob_start();
   error_reporting(0);
   include_once '../database/config.php';
   require_once "../model/class_model.php";
   $conn = new class_model();
   $action = $_GET['action'];  

 if($action == 'add_customer'){

 	$customer_name = htmlspecialchars(strip_tags($_POST['customer_name']));
	$contact_number = htmlspecialchars(strip_tags($_POST['contact_number']));
	$email = htmlspecialchars(strip_tags($_POST['email']));
	$address = htmlspecialchars(strip_tags($_POST['address']));

	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $idcardimg ="../uploads/". addslashes($_FILES['photo']['name']);
    $image_size = getimagesize($_FILES['photo']['tmp_name']);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/SalesAndInventorySystem/uploads/" .   addslashes($_FILES["photo"]["name"]));


	$add = $conn->add_customer($customer_name, $contact_number, $email, $address, $idcardimg);
	if($add == TRUE){
		    echo '<div class="alert alert-success">Add Customer Successfully!</div><script> setTimeout(function() {  location.replace("customer"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Add Customer Failed!</div><script> setTimeout(function() {  location.replace("customer"); }, 1000); </script>';
	
		}
    }


 if($action == 'edit_customer'){

 	$customer_name = htmlspecialchars(strip_tags($_POST['customer_name']));
	$contact_number = htmlspecialchars(strip_tags($_POST['contact_number']));
	$email = htmlspecialchars(strip_tags($_POST['email']));
	$address = htmlspecialchars(strip_tags($_POST['address']));
	$customer_id = htmlspecialchars(strip_tags($_POST['customer_id']));

	$edit = $conn->customer_edit($customer_name, $contact_number, $email, $address, $customer_id);
	if($edit == TRUE){
		    echo '<div class="alert alert-success">Update Customer Successfully!</div><script> setTimeout(function() {  location.replace("customer"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Update Customer Failed!</div><script> setTimeout(function() {  location.replace("customer"); }, 1000); </script>';
	
		}
    }


  if($action == 'delete_customer'){

	$customer_id = htmlspecialchars(strip_tags($_POST['customer_id']));

	$del = $conn->customer_delete($customer_id);
	if($del == TRUE){
		    echo '<div class="alert alert-success">Delete Customer Successfully!</div><script> setTimeout(function() {  location.replace("customer"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Delete Customer Failed!</div><script> setTimeout(function() {  location.replace("customer"); }, 1000); </script>';
	
		}
    }



?>

