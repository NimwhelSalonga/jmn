<?php
   ob_start();
   error_reporting(0);
   include_once '../database/config.php';
   require_once "../model/class_model.php";
   $conn = new class_model();
   $action = $_GET['action'];  

 if($action == 'add_category'){

 	$category_name = htmlspecialchars(strip_tags($_POST['category_name']));
	$category_decription = htmlspecialchars(strip_tags($_POST['category_decription']));

	$add = $conn->add_category($category_name, $category_decription);
	if($add == TRUE){
		    echo '<div class="alert alert-success">Add Category Successfully!</div><script> setTimeout(function() {  location.replace("category"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Add Category Failed!</div><script> setTimeout(function() {  location.replace("category"); }, 1000); </script>';
	
		}
    }


 if($action == 'edit_category'){

    $category_name = htmlspecialchars(strip_tags($_POST['category_name']));
	$category_decription = htmlspecialchars(strip_tags($_POST['category_decription']));
	$category_id = htmlspecialchars(strip_tags($_POST['category_id']));

	$edit = $conn->edit_category($category_name, $category_decription, $category_id);
	if($edit == TRUE){
		    echo '<div class="alert alert-success">Update Category Successfully!</div><script> setTimeout(function() {  location.replace("category"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Update Category Failed!</div><script> setTimeout(function() {  location.replace("category"); }, 1000); </script>';
	
		}
    }


  if($action == 'delete_category'){

	$category_id = htmlspecialchars(strip_tags($_POST['category_id']));

	$del = $conn->category_delete($category_id);
	if($del == TRUE){
		    echo '<div class="alert alert-success">Delete Category Successfully!</div><script> setTimeout(function() {  location.replace("category"); }, 1000); </script>';
		    
		  }else{
		    echo '<div class="alert alert-danger">Delete Category Failed!</div><script> setTimeout(function() {  location.replace("category"); }, 1000); </script>';
	
		}
    }



?>

