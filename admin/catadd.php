<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/AbstractFactory.php'; ?>
<?php
    // gọi class category
    //$cat = new category();
    $factory = new categoty();
    //$cat = category::getInstance(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $catName = $_POST['catName'];
        //$insertCat = $cat -> FactoryCat($catName); // hàm check catName khi submit lên
        $insertCat = $factory->insert($catName);
    }
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục</h2>      
               <div class="block copyblock"> 
                <?php 
                    if(isset($insertCat)){
                        echo $insertCat;
                    }
                 ?>
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Nhập tên danh mục..." class="medium" />
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