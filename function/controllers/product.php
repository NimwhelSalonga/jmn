<?php
   ob_start();
   error_reporting(0);
   include_once '../database/config.php';
   require_once "../model/class_model.php";
   $conn = new class_model();
   $action = $_GET['action'];  

 if($action == 'add_product'){

 	$product_code = htmlspecialchars(strip_tags($_POST['product_code']));
	$category_name = htmlspecialchars(strip_tags($_POST['category_name']));
	$product_name = htmlspecialchars(strip_tags($_POST['product_name']));
	$description = htmlspecialchars(strip_tags($_POST['description']));
	$product_price = htmlspecialchars(strip_tags($_POST['product_price']));

	$image = addslashes(file_get_contents($_FILES['product_image']['tmp_name']));
    $idcardimg ="../uploads/". addslashes($_FILES['product_image']['name']);
    $image_size = getimagesize($_FILES['product_image']['tmp_name']);
    move_uploaded_file($_FILES["product_image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/SalesAndInventorySystem/uploads/" .   addslashes($_FILES["product_image"]["name"]));


	$add = $conn->add_product($product_code, $category_name, $product_name, $description, $product_price, $idcardimg);
	if($add == TRUE){
		    echo '<div class="alert alert-success">Add Product Successfully!</div><script> setTimeout(function() {  location.replace("product"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Add Product Failed!</div><script> setTimeout(function() {  location.replace("product"); }, 1000); </script>';
	
		}
    }


 if($action == 'edit_product'){

	$category_name = htmlspecialchars(strip_tags($_POST['category_name']));
	$product_name = htmlspecialchars(strip_tags($_POST['product_name']));
	$description = htmlspecialchars(strip_tags($_POST['description']));
	$product_price = htmlspecialchars(strip_tags($_POST['product_price']));
	$product_id = htmlspecialchars(strip_tags($_POST['product_id']));

	$edit = $conn->edit_product($category_name, $product_name, $description, $product_price, $product_id);
	if($edit == TRUE){
		    echo '<div class="alert alert-success">Update Product Successfully!</div><script> setTimeout(function() {  location.replace("product"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Update Product Failed!</div><script> setTimeout(function() {  location.replace("product"); }, 1000); </script>';
	
		}
    }


  if($action == 'delete_product'){

	$product_id = htmlspecialchars(strip_tags($_POST['product_id']));

	$del = $conn->product_delete($product_id);
	if($del == TRUE){
		    echo '<div class="alert alert-success">Delete Product Successfully!</div><script> setTimeout(function() {  location.replace("product"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Delete Product Failed!</div><script> setTimeout(function() {  location.replace("product"); }, 1000); </script>';
	
		}
    }



?>

