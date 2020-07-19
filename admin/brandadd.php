<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/brand.php';  ?>
<?php
    // gọi class category
    //$brand = brand::getInstance();
    $factory = new brand;
  //  $brand = $factory->Factory();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ // bat bc co
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $brandName = $_POST['brandName'];
        $insertBrand = $factory->Factory($brandName); //insert_brand($brandName); // hàm check catName khi submit lên
    }
  ?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add brand</h2>      
               <div class="block copyblock"> 
                <?php 
                    if(isset($insertBrand)){
                        echo $insertBrand;
                    }
                 ?>
                 <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Nhập tên thương hiệu..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Lưu" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>