<?php
	include 'inc/header.php';
	
	
	

?>
<?php
	  	$login_check=Session::get('customer_login');
		   	if($login_check==false){
		   		header('Location:login.php');
		   	}

	  ?>
<?php 
  // if(!isset($_GET['MSHH']) || $_GET['MSHH']== NULL){
  //       echo "<script>window.location='404.php'</script>";
        
  //   }else{
  //       $id=$_GET['MSHH'];
    // }
    $MSKH=Session::get('MSKH');
     if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['save'])){
        
       
     	
        $updatecustomer=$cs->update_customer($_POST,$MSKH);
    }

?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Cập nhật thông tin Khách hàng</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    		<form action="" method="post">
    		<table class="tblone" width="500px">
                <tr>
                    
                        <?php
                        if(isset($updatecustomer)){
                            echo '<td colspan="2">'.$updatecustomer.'</td>';
                        }
                        ?>
                    
                </tr>
    			<?php
    			$MSKH=Session::get('MSKH');
    			$get_customer=$cs->show_customers($MSKH);
    			if($get_customer){
    				while($result=$get_customer->fetch_assoc()){
    			?>
    			<tr>
    				<td><i class="fa fa-user"></i> Họ và tên:</td>
                    <td><input type="text" name="HoTenKH" value="<?php echo $result['HoTenKH']?>"></td>
    				
    				
    			</tr>
                <tr>
                    <td><i class="fa fa-institution"></i> Công ty:</td>
                    <td><input type="text" name="TenCongTy" value="<?php echo $result['TenCongTy']?>"></td>
                    
                    
                </tr>
    			<tr>
                    <td><i class="fa fa-address-card-o"></i> Địa chỉ:</td>
                    <td><input type="text" name="DiaChi" value="<?php echo $result['DiaChi']?>"></td>
    				
    				
    			</tr>
    			<tr>
                    <td><i class="fa fa-ravelry" aria-hidden="true"></i> Số điện thoại:</td>
    				<td><input type="text" name="SoDienThoai" value="<?php echo $result['SoDienThoai']?>"></td>
    				
    			</tr>
    			<tr>
                    <td><i class="fa fa-envelope"></i>Email:</td>
    				<td><input type="text" name="Email" value="<?php echo $result['Email']?>"></td>
    				
    			</tr>
                <tr>
                    <td colspan="3"><input type="submit" name="save" value="Save"></td>
                    
                    
                </tr>
    			
    			<?php
    		}
    	}
    	?>
    		</table>
            </form>
        </div>
    </div>    
	<?php
	include 'inc/footer.php';

?>	