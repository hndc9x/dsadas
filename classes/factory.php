<?php
class factory_cat implements AbstractFactory {
    public function FactoryCat($catName)
    {
        $catName = $this->fm->validation($catName); //gọi ham validation từ file Format để ktra
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        return $this->insert_category($catName);
    }


public function insert_category($catName){
    // $catName = $this->fm->validation($catName); //gọi ham validation từ file Format để ktra
    // $catName = mysqli_real_escape_string($this->db->link, $catName);
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
?>