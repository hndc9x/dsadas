<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>



<?php 
	/**
	* 
	*/
	class account
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function update_pass_admin($pass,$id)
		{
			$pass = $this->fm->validation($pass); //gọi ham validation từ file Format để ktra
			$pass = mysqli_real_escape_string($this->db->link, $pass);
			$id = mysqli_real_escape_string($this->db->link, $id);
			if(empty($pass)){
				$alert = "<span class='error'>Pass must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_admin SET adminPass= '$pass' WHERE id = '$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'> Update Pass Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Update Pass NOT Success</span>";
					return $alert;
				}
			}

		}	
		public function getAdmin()
		{
			$query = "SELECT * FROM tbl_admin ;
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>