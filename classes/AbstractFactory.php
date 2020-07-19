<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
    interface AbstractFactory
    {
        //abstract 
        public function insert($name);
        //abstract 
        public function delete($id);
    }
    class categoty implements AbstractFactory
    {
        private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
        }
        public function insert($catName){
			$catName = $this->fm->validation($catName); //gọi ham validation từ file Format để ktra
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($catName)){
				$alert = "<span class='error'>Category must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_category(catName) VALUES('$catName') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert Category Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Insert Category NOT Success</span>";
					return $alert;
				}
			}
        }
        public function delete($id)
		{
			$query = "DELETE FROM tbl_category where catId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Category Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Category Deleted Not Success</span>";
				return $alert;
			}
		}

    }
    class brand implements AbstractFactory
    {
        private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

        }
        public function insert($brandName){
			$brandName = $this->fm->validation($brandName); //gọi ham validation để ktra có rỗng hay ko để ktra
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($brandName)){
				$alert = "<span class='error'>Brand must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert brand Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Insert brand NOT Success</span>";
					return $alert;
				}
			}
        }
        public function delete($id)
		{
			$query = "DELETE FROM tbl_brand where brandId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Brand Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Brand Deleted Not Success</span>";
				return $alert;
			}
		}
    }
?>
