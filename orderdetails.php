<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
 //    if(isset($_GET['cartid'])){
 //        $cartid = $_GET['cartid']; 
 //        $delcart = $ct->del_product_cart($cartid);
 //    }
        
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
 //        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 //        $cartId = $_POST['cartId'];
 //        $quantity = $_POST['quantity'];
 //        $update_quantity_Cart = $ct -> update_quantity_Cart($cartId, $quantity); // hàm check catName khi submit lên
 //    	if ($quantity <= 0) {
 //    		$delcart = $ct->del_product_cart($cartId);
 //    	}
 //    } 
 ?>
<?php 
	$login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
 ?>
 <?php
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    }
?>
 <div class="main">
    <div class="content">
		<div class="section group">
			<div class="content_top">
				<div class="heading">
    				<h3>Chi tiết hóa đơn</h3>
    			</div>
				<div class="clear"></div>
			</div>
		</div>
		
    	<div class="cartoption">		
			<div class="cartpage">
			    	
						<table class="tblone">
							<tr>
								<th width="0%">STT</th>
								<th width="25%">Tên sản phẩm</th>
								<th width="20%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="15%">Số lượng</th>
								<th width="10%">Ngày</th>
								<th width="10%">Trạng thái</th>
								<th width="10%">Xử lý</th>
							</tr>
							<?php
							$customer_id = Session::get('customer_id');  
							$get_cart_ordered = $ct->get_cart_ordered($customer_id);
							if($get_cart_ordered){
								$i=0;
								$qty = 0;
								while ($result = $get_cart_ordered->fetch_assoc()) {
								$i++;
							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" width="100px"/></td>
								<td><?php echo $result['price'].' VND' ?></td>
								<td><?php echo $result['quantity'] ?></td>
								<td><?php echo $fm->formatDate($result['date_order'])  ?></td>
								<td>
								<?php 
									if ($result['status'] == '0') {
										echo "Đang chờ xử lý";
									}elseif($result['status'] == 1) {
								?>
								<span>Đã gửi hàng</span>
								
								<?php

									}elseif($result['status']==2){
										echo 'Đã nhận';
									}
								 ?>	

								</td>
								<?php 
								if ($result['status'] == '0') {
								 ?>

								<td><?php echo 'N/A'; ?></td>

								 <?php 
								 }elseif($result['status']==1) {
								 ?>	
								 <td>
								 	<a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xác nhận</a>
								 </td>
								 <?php 
								}else{
								  ?>
								  
								<td><?php echo 'Đã nhận'; ?></td>
								<?php 
								}
								 ?>
							</tr>
							<?php 							
								}
							}
							 ?>
	
						</table>
						
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>
