<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/account.php';  ?>
<<?php
    $account = new account(); 
    if(!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script> window.location = 'brandlist.php' </script>";
        
    }else {
        $id = $_GET['id']; // Lấy catid trên host
    }
    // gọi class category
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $pass = $_POST['pass'];
        $update_admin = $account ->update_pass_admin($pass,$id); // hàm check catName khi submit lên
    }
    
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thay đổi mật khẩu</h2>      
               <div class="block copyblock"> 
                <?php 
                    if(isset($update_admin)){
                        echo $update_admin;
                    }
                 ?>

                <?php 
                    $get_id = $brand->getAdminbyId($id);
                    if($get_id){
                        while ($result = $get_id->fetch_assoc()) {
                            
                        ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Mật khẩu cũ </label>..
                                <input type="text" name="brandName" placeholder="Nhập mật khẩu cũ..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mật khẩu mới </label>
                                <input type="text" name="pass" placeholder="Nhập mật khẩu mới..." class="medium" />
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