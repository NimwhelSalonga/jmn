<?php
   ob_start();
   error_reporting(0);
   include_once '../database/config.php';
   require_once "../model/class_model.php";
   $conn = new class_model();
   $action = $_GET['action'];  


  if($action == 'get_productID'){

 	$product_id = htmlspecialchars(strip_tags($_POST['product_id']));

     $prod = $conn->get_productID($product_id);
    foreach( $prod as $row) {
       echo $row['product_price'];
      }

    }


 if($action == 'add_receiving'){

 	$supplier_name = htmlspecialchars(strip_tags($_POST['supplier_name']));
	$product_id = htmlspecialchars(strip_tags($_POST['product_id']));
	$quantity = htmlspecialchars(strip_tags($_POST['quantity']));
	$price = htmlspecialchars(strip_tags($_POST['price']));


     $add = $conn->add_receiving1($supplier_name, $product_id, $quantity, $price);

  //    	if($add == TRUE){
		//     echo '<div class="alert alert-success">Add Receiving Successfully!</div><script> setTimeout(function() {  location.replace("receiving"); }, 1000); </script>';
		    
		//   }else{
		//     echo '<div class="alert alert-danger">Add Receiving Failed!</div><script> setTimeout(function() {  location.replace("receiving"); }, 1000); </script>';
	
		// }
    

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

