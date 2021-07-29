<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
	

?>
<?php
		   	$login_check=Session::get('customer_login');
		   	if($login_check){
		   		header('Location:index.php');
		   	}


?>
<?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        
       

        $insertcustomer=$cs->insert_customer($_POST);
    }

?>
<?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['login'])){
        
       

        $logincustomer=$cs->login_customer($_POST);
    }

?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đã có tài khoản</h3>
        	<p style="font-weight: bold; font-size: 15px; color: purple;">email: longadmin, pass:sa</p>
        	<?php
    		if(isset($logincustomer)){
    			echo $logincustomer;
    		}
    		?>
        	<form action="" method="post" id="member">
                	<input  type="text" name="Email" class="field" placeholder="Nhập địa chỉ email/ tên đăng nhập">
                    <input type="password" name="PassWord" class="field" placeholder="Nhập mật khẩu">
                 
                 <p class="note">Nếu bạn quên mật khẩu, vui lòng  <a href="#">click vào đây</a></p>
                    <div class="buttons"><div><input type="submit" class="grey" name="login" value="Đăng nhập"></div></div>
                    </form>
         	</div>
                 <?php

                    ?>
    	<div class="register_account">
    		<h3>Đăng ký tài khoản</h3>
    		<?php
    		if(isset($insertcustomer)){
    			echo $insertcustomer;
    		}
    		?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
								<input type="text" name="Email" placeholder="Nhập địa chỉ email/ tên đăng nhập..." ">
							</div>
							 <div>
								<input type="text" name="PassWord" placeholder="Nhập mật khẩu..." ">
							</div>
							<div>
								<input type="text" name="PassWord2" placeholder="Nhập lại mật khẩu..." ">
							</div>
							<div>
							<input type="text" name="trinhdo" placeholder="Nhập trình độ học vấn của bạn..." ">
						</div> 
							
							
							
							
		    			 </td>
		    			<td>
		    			<div>
							<input type="text" name="HoTenKH" placeholder="Nhập tên..." >
						</div>
						<div>
							<input type="text" name="DiaChi"placeholder="Nhập địa chỉ của bạn..." ">
						</div>
		    			 <div>
							<input type="text" name="TenCongTy"placeholder="Nhập tên công ty của bạn..." ">
						</div>  
						    
	
		           		<div>
		          			<input type="text" name="SoDienThoai" placeholder="Nhập số điện thoại..." >
		          		</div>
				  
				 
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" value="Đăng ký" class="grey"></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	include 'inc/footer.php';

?>