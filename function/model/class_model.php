<?php
        ini_set('display_errors', 1);
		class Class_model {	

		    public $host = db_host;
			public $user = db_user;
			public $pass = db_pass;
			public $dbname = db_name;
			public $conn;
			public $error;
	 
			public function __construct(){
				ob_start();
				$this->connect();
			}
	 
			private function connect(){
				$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
				if(!$this->conn){
					$this->error = "Fatal Error: Can't connect to database".$this->conn->connect_error;
					return false;
				}
			}
			    
			
		   public function login($user, $pass){
					$stmt = $this->conn->prepare("SELECT * FROM tbl_admin WHERE `username` = ? AND `password` = ?") or die($this->conn->error);
					$stmt->bind_param("ss", $user, $pass);
					if($stmt->execute()){
						$result = $stmt->get_result();
						$valid = $result->num_rows;
						$fetch = $result->fetch_array();
						return array(
							'admin_id'=> htmlentities($fetch['admin_id']),
							'count'=>$valid
						);
					}
				}


		   public function get_customer(){ 
               $sql = "SELECT * FROM tbl_customer ORDER BY customer_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		  public function get_logs(){ 
			$sql = "SELECT * FROM logs ORDER BY id DESC";
			 $stmt = $this->conn->prepare($sql);
			 $stmt->execute();
			 $result = $stmt->get_result();
			 $data = array();
			  while ($row = $result->fetch_assoc()) {
						$data[] = $row;
				 }
			  return $data;

	   }

		   public function getcustomer_id($id){
		    	//extract($_POST);
				$sql = "SELECT * FROM `tbl_customer` WHERE customer_id = ?";
			    $stmt = $this->conn->prepare($sql);
			    $stmt->bind_param("i", $id);
			    $stmt->execute();
			    $result = $stmt->get_result();
		        $row = $result->fetch_assoc();
			    return json_encode($row);

			}

		    public function add_customer($customer_name, $contact_number, $email, $address, $idcardimg){
			       $stmt = $this->conn->prepare("`tbl_customer` (`customer_name`, `contact_number`, `email`, `address`, `photo`) VALUES(?, ?, ?, ?, ?)") or die($this->conn->error);
					$stmt->bind_param("sssss", $customer_name, $contact_number, $email, $address, $idcardimg);
					if($stmt->execute()){
						$stmt->close();
						$this->conn->close();
						return true;
					}
				}



			 public function customer_edit($customer_name, $contact_number, $email, $address, $customer_id){
				$sql = "UPDATE `tbl_customer` SET  `customer_name` = ?, `contact_number` = ?, `email` = ?, `address` = ? WHERE customer_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("ssssi", $customer_name, $contact_number, $email, $address, $customer_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

			public function customer_delete($customer_id){
				$sql = "DELETE FROM `tbl_customer` WHERE customer_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $customer_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

		    public function get_category(){ 
               $sql = "SELECT * FROM tbl_category ORDER BY category_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		    public function add_category($category_name, $category_decription){
			       $stmt = $this->conn->prepare("INSERT INTO `tbl_category` (`category_name`, `category_decription`) VALUES(?, ?)") or die($this->conn->error);
					$stmt->bind_param("ss", $category_name, $category_decription);
					if($stmt->execute()){
						$stmt->close();
						$this->conn->close();
						return true;
					}
				}

            public function getcategory_id($id){
		    	//extract($_POST);
				$sql = "SELECT * FROM `tbl_category` WHERE category_id = ?";
			    $stmt = $this->conn->prepare($sql);
			    $stmt->bind_param("i", $id);
			    $stmt->execute();
			    $result = $stmt->get_result();
		        $row = $result->fetch_assoc();
			    return json_encode($row);

			}

		    public function edit_category($category_name, $category_decription, $category_id){
				$sql = "UPDATE `tbl_category` SET  `category_name` = ?, `category_decription` = ? WHERE category_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("ssi", $category_name, $category_decription, $category_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

		    public function category_delete($category_id){
				$sql = "DELETE FROM `tbl_category` WHERE category_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $category_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

			public function get_product(){ 
               $sql = "SELECT * FROM tbl_product ORDER BY product_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		     public function add_product($product_code, $category_name, $product_name, $description, $product_price, $idcardimg){
			       $stmt = $this->conn->prepare("INSERT INTO `tbl_product` (`product_code`, `category_name`, `product_name`, `description`, `product_price`, `product_image`) VALUES(?, ?, ?, ?, ?, ?)") or die($this->conn->error);
					$stmt->bind_param("ssssss", $product_code, $category_name, $product_name, $description, $product_price, $idcardimg);
					if($stmt->execute()){
						$stmt->close();
						$this->conn->close();
						return true;
					}
				}

		     public function getproduct_id($id){
		    	//extract($_POST);
				$sql = "SELECT * FROM `tbl_product` WHERE product_id = ?";
			    $stmt = $this->conn->prepare($sql);
			    $stmt->bind_param("i", $id);
			    $stmt->execute();
			    $result = $stmt->get_result();
		        $row = $result->fetch_assoc();
			    return json_encode($row);

			}

			 public function edit_product($category_name, $product_name, $description, $product_price, $product_id){
				$sql = "UPDATE `tbl_product` SET   `category_name` = ?, `product_name` = ?, `description` = ?, `product_price` = ? WHERE product_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("ssssi", $category_name, $product_name, $description, $product_price, $product_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}


            public function product_delete($product_id){
				$sql = "DELETE FROM `tbl_product` WHERE product_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $product_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

		     public function get_supplier(){ 
               $sql = "SELECT * FROM tbl_supplier ORDER BY supplier_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
				   $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		     
		         return $data;

		  }

		    public function add_supplier($supplier_name, $contact_number, $email, $address, $idcardimg){
			       $stmt = $this->conn->prepare("INSERT INTO `tbl_supplier` (`supplier_name`, `contact_number`, `email`, `address`, `photo`) VALUES(?, ?, ?, ?, ?)") or die($this->conn->error);
					$stmt->bind_param("sssss", $supplier_name, $contact_number, $email, $address, $idcardimg);
					if($stmt->execute()){
						$stmt->close();
						$this->conn->close();
						return true;
					}
				}
            
             public function getsupplier_id($id){
		    	//extract($_POST);
				$sql = "SELECT * FROM `tbl_supplier` WHERE supplier_id = ?";
			    $stmt = $this->conn->prepare($sql);
			    $stmt->bind_param("i", $id);
			    $stmt->execute();
			    $result = $stmt->get_result();	
		        $row = $result->fetch_assoc();
			    return json_encode($row);

			}

			 public function supplier_edit($supplier_name, $contact_number, $email, $address, $supplier_id){
				$sql = "UPDATE `tbl_supplier` SET  `supplier_name` = ?, `contact_number` = ?, `email` = ?, `address` = ? WHERE supplier_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("ssssi", $supplier_name, $contact_number, $email, $address, $supplier_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

			 public function supplier_delete($supplier_id){
				$sql = "DELETE FROM `tbl_supplier` WHERE supplier_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $supplier_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

			  public function add_receiving1($supplier_name, $product_id, $quantity, $price){

			  	$today = date("Ymd");
                $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
                 $unique = $today . $rand;

			       $stmt = $this->conn->prepare("INSERT INTO `tbl_receiving` (`reference_no`, `supplier_name`, `product_id`, `quantity`, `price`) VALUES(?, ?, ?, ?, ?)") or die($this->conn->error);
					$stmt->bind_param("ssiss",  $unique, $supplier_name, $product_id, $quantity, $price);
					if($stmt->execute()){
						$stmt->close();
						$this->conn->close();
						return true;
					}
				}

              public function get_productID($product_id){
		    	//extract($_POST);
				$sql = "SELECT * FROM `tbl_product` WHERE product_id = ?";
			    $stmt = $this->conn->prepare($sql);
			    $stmt->bind_param("i", $product_id);
			    $stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
			}

			 public function get_receiving(){ 
               $sql = "SELECT * FROM tbl_receiving a INNER JOIN tbl_product b ON a.product_id = b.product_id  ORDER BY a.receiving_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		   public function get_receivingtotal(){ 
               $sql = "SELECT SUM(price) AS count  FROM tbl_receiving";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		     public function get_sales(){ 
               $sql = "SELECT * FROM tbl_receiving a INNER JOIN tbl_product b ON a.product_id = b.product_id  ORDER BY a.receiving_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		     public function get_admin(){ 
               $sql = "SELECT * FROM tbl_admin";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		 



			
	}
?>