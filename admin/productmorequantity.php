
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/brand.php';  ?> 
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $pd = product::getInstance();
    if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        echo "<script> window.location = 'productlist.php' </script>";
        
    }else {
        $id = $_GET['productid']; // Lấy productid trên host
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $updatemoreProduct = $pd->update_quantity_product($_POST, $_FILES, $id); // hàm check catName khi submit lên
    }
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Import</h2>
        <?php 
            if(isset($updatemoreProduct)){
                echo $updatemoreProduct;
            }
         ?>
         <?php 
         $get_product_by_id = $pd->getproductbyId($id);
         if($get_product_by_id){
            while ($result_product = $get_product_by_id->fetch_assoc()) {
                # code...
            
          ?>   
        <div class="block">

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Product Name</label>
                    </td>
                    <td>
                        <input readonly name="productName" value="<?php echo $result_product['productName'] ?>" type="text" class="medium" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Product_Code</label>
                    </td>
                    <td>
                        <input readonly name="product_code" value="<?php echo $result_product['product_code'] ?>" type="text" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Remain</label>
                    </td>
                    <td>
                        <input  readonly name="product_remain" value="<?php echo $result_product['product_remain'] ?>" type="text" class="medium" />
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Add Amount</label>
                    </td>
                    <td>
                        <input name="product_more_quantity" type="text" placeholder="Nhập thêm số lượng" class="medium" />
                    </td>
                </tr>  
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Save" />
                    </td>
                </tr>
            </table>
            </form>
            <?php 
            }
            }
             ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


