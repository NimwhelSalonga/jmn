<?php
   ob_start();
   error_reporting(0);
   include_once '../database/config.php';
   require_once "../model/class_model.php";
   $conn = new class_model();
   $action = $_GET['action'];  

 if($action == 'add_supplier'){

 	$supplier_name = htmlspecialchars(strip_tags($_POST['supplier_name']));
	$contact_number = htmlspecialchars(strip_tags($_POST['contact_number']));
	$email = htmlspecialchars(strip_tags($_POST['email']));
	$address = htmlspecialchars(strip_tags($_POST['address']));

	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $idcardimg ="../uploads/". addslashes($_FILES['photo']['name']);
    $image_size = getimagesize($_FILES['photo']['tmp_name']);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/SalesAndInventorySystem/uploads/" .   addslashes($_FILES["photo"]["name"]));


	$add = $conn->add_supplier($supplier_name, $contact_number, $email, $address, $idcardimg);
	if($add == TRUE){
		    echo '<div class="alert alert-success">Add Supplier Successfully!</div><script> setTimeout(function() {  location.replace("supplier"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Add Supplier Failed!</div><script> setTimeout(function() {  location.replace("supplier"); }, 1000); </script>';
	
		}
    }


 if($action == 'edit_supplier'){

 	$supplier_name = htmlspecialchars(strip_tags($_POST['supplier_name']));
	$contact_number = htmlspecialchars(strip_tags($_POST['contact_number']));
	$email = htmlspecialchars(strip_tags($_POST['email']));
	$address = htmlspecialchars(strip_tags($_POST['address']));
	$supplier_id = htmlspecialchars(strip_tags($_POST['supplier_id']));

	$edit = $conn->supplier_edit($supplier_name, $contact_number, $email, $address, $supplier_id);
	if($edit == TRUE){
		    echo '<div class="alert alert-success">Update Supplier Successfully!</div><script> setTimeout(function() {  location.replace("supplier"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Update Supplier Failed!</div><script> setTimeout(function() {  location.replace("supplier"); }, 1000); </script>';
	
		}
    }


  if($action == 'delete_supplier'){

	$supplier_id = htmlspecialchars(strip_tags($_POST['supplier_id']));

	$del = $conn->supplier_delete($supplier_id);
	if($del == TRUE){
		    echo '<div class="alert alert-success">Delete Supplier Successfully!</div><script> setTimeout(function() {  location.replace("supplier"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Delete Supplier Failed!</div><script> setTimeout(function() {  location.replace("supplier"); }, 1000); </script>';
	
		}
    }



?>

