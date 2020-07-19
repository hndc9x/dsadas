<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	$login_check = Session::get('customer_login');
	if ($login_check) {
		header('Location:order.php'); 
	}
?>

<?php
    // gọi class category
     
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $cs -> insert_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
 <?php 
 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $login_Customer = $cs -> login_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Login</h3>
        	<?php 
    		if (isset($login_Customer)) {
    			echo $login_Customer;
    		}
    		 ?>
        	<form action="" method="POST">
                	<input type="text" name="email" class="field" placeholder="Nhập email..." >
                    <input type="password" name="password" class="field" placeholder="Nhập password..." >
     
                    <div class="buttons"><div><input type="submit" name="login" class="grey" value="Đăng nhập" style="
    background: #ffffff;
"></div></div>
                    </form>
                    <p>Quên mật khẩu</p>
                    </div>

    	<div class="register_account">
    		<h3>Đăng ký tài khoản</h3>
    		<p>Nhập đầy đủ thông tin</p>
    		<p>Vui lòng nhập đầy đủ tất cả</p>
    		<?php 
    		if (isset($insertCustomer)) {
    			echo $insertCustomer;
    		}
    		 ?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter Name...">
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Enter địa chỉ..." >
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Enter Zipcode...">
							</div>
							<div>
								<input type="text" name="email" placeholder="Enter E-Mail...">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Enter country...">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="hcm">TPHCM</option>
							<option value="hn">Hà Nội</option>
							<option value="dn">Đà Nẵng</option>
							<option value="ct">Cần Thơ</option> 
							<option value="bd">Bình Dương</option>
							<option value="py">Phú Yên</option>    
							<option value="th">Tuy Hòa</option>

		         </select>
				 </div>		        
		           <div>
		          <input type="text" name="phone" placeholder="Enter số điện thoại...">
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="Enter Password..." style="
    width: 95%;
    height: 33px;
    margin-top: 7px;
">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" class="grey" value="Tạo tài khoản" style="
    background: #ffffff;
"></div></div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>


<?php 
	include 'inc/footer.php';
 ?>
