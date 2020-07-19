<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php 
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       $customer_id = Session::get('customer_id');
       $insertOrder = $ct->insertOrder($customer_id);
       $delCart = $ct->del_all_data_cart();
       header('Location:success.php');
    }
 ?>
 <style type="text/css">
	.box_left {
    width: 50%;
    border: 1px solid #666;
    float: left;
    padding: 4px;	

	}
 	.box_right {
    width: 47%;
    border: 1px solid #666;
    float: right;
    padding: 4px;
	}
	.a_order {
    background: #653092;
    color: aliceblue;
    padding: 10px;
    font-size: 25px;
    border-radius: none;
    cursor: pointer;
	}
}
</style>

<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="heading">
    		     <h3>Pay by COD</h3>
    		</div>
    		<div class="clear"></div>
    		<div class="box_left">
    			<div class="cartpage">
			    	<h2>My Cart</h2>
			    	<?php 
			    	if (isset($update_quantity_Cart)) {
			    		echo $update_quantity_Cart;
			    	}
			    	 ?>
			    	<?php 
			    	if (isset($delcart)) {
			    		echo $delcart;
			    	}
			    	 ?>
			    	 <?php
			    	 if(isset($delcart)){
			    	 	echo $delcart;
			    	 }
			    	?>
						<table class="tblone">
							<tr>
								<th width="5%">No.</th>
								<th width="15%">Product Name</th>
								<th width="15%">Price</th>
								<th width="25%">Amount</th>
								<th width="20%">Total</th>
								
							</tr>
							<?php 
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								$i=0;
								while ($result = $get_product_cart->fetch_assoc()) {
									$i++;
								
							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								
								<td><?php echo $result['price'].' VND' ?></td>
								<td>
									<?php echo $result['quantity'] ?>
								</td>
								<td>
									<?php 
									$total = $result['price'] * $result['quantity'];
									echo $total.' VND';
									 ?>
								</td>
								
							</tr>
							<?php 

							$subtotal += $total;
							$qty = $qty + $result['quantity'];
								}
							}
							 ?>
	
						</table>
						<?php
							$check_cart = $ct->check_cart();
							if ($check_cart) {

							 ?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Price : </th>
								<td>
								<?php echo $subtotal.' VND';

									  Session::set('sum',$subtotal);
									  Session::set('qty',$qty);
								?>
								</td>
							</tr>
							<tr>
								<th>Vat : </th>
								<td>10% (<?php echo $vat = $subtotal * 0.1. ' VND';?>)</td>
							</tr>
							<tr>
								<th>Total :</th>
								<td><?php 
								$vat = $subtotal * 0.1;
								$grandTotal = $subtotal + $vat;
								echo $grandTotal.' VND';
								 ?> </td>
							</tr>
					   </table>
					   <?php 
						}else {
							echo 'Your cart is Empty ! Please Shopping now';
						}
					    ?>
					</div>
					

    		</div>
    		<div class="box_right">
    			<table class="tblone">
		    		<?php 
		    		$id = Session::get('customer_id');
		    		$get_customers = $cs->show_customers($id);
		    		if ($get_customers) {
		    			while ($result = $get_customers->fetch_assoc()) {
		    			
		    		 ?>
		    		<tr>
		    			<td>Name</td>
		    			<td>:</td>
		    			<td><?php echo $result['name']; ?></td>
		    		</tr>
		    		<tr>
		    			<td>City</td>
		    			<td>:</td>
		    			<td><?php echo $result['city']; ?></td>
		    		</tr>
		    		<tr>
		    			<td>Phone</td>
		    			<td>:</td>
		    			<td><?php echo $result['phone']; ?></td>
		    		</tr>
		    		<!-- <tr>
		    			<td>Country</td>
		    			<td>:</td>
		    			<td><?php echo $result['country']; ?></td>
		    		</tr> -->
		    		<tr>
		    			<td>Zipcode</td>
		    			<td>:</td>
		    			<td><?php echo $result['zipcode']; ?></td>
		    		</tr>
		    		<tr>
		    			<td>Email</td>
		    			<td>:</td>
		    			<td><?php echo $result['email']; ?></td>
		    		</tr>
		    		<tr>
		    			<td>Address</td>
		    			<td>:</td>
		    			<td><?php echo $result['address']; ?></td>
		    		</tr>
		            <tr>
		                <td colspan="3"><a href="editprofile.php">Update</a></td>
		               
		            </tr>
		    		
		    		<?php 
		    		}
		    		}
		    		 ?>
		    	</table>	

    		</div>
 		</div>
 	</div>
 	<center style="padding-bottom: 20px;"><a href="?orderid=order" class="a_order">Buy Now</a></center>
 </div>
</form>
<?php 
	include 'inc/footer.php';
 ?>