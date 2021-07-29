
<?php
	include 'inc/header.php';
	
	
	

?>
<?php 
  if(isset($_GET['MSHH']) && $_GET['MSHH']== 'MSHH'){
  	$MSKH=Session::get('MSKH');
  	$insertorder=$ct->insert_order($MSKH);
  	
  	header('Location:success.php');
        
        
    }

  //    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        
       
  //    	$SoLuong=$_POST['SoLuong'];
  //       $AddtoCart=$ct->add_to_cart($SoLuong,$id);
  //   }

?>
<?php
	if(isset($_GET['MSKH']) ){
        
        $MSKH=$_GET['MSKH'];        
   }
   else{
   		$MSKH=0;
   }
?>
<style type="text/css">
	.box_left {
    width: 67%;
    border: 1px;
    float: left;
    padding: 4px

}
.box_right {
	background-color: #f2f2f2;
    width: 30%;
    border: 1px solid #666;
    float: right;
    padding: 4px
}
.submit_order {
     background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 22px;
}
.submit_order:hover {
  background-color:red ;
}
</style>
<form action="" method="post">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="heading">
    		<h3>Thanh toán khi nhận hàng</h3>
    		</div>
    		<div class="clear"></div>
    		<div class="box_left">
    			<div class="cartpage">
			    	
			    	<?php
			    	if(isset($update_quantity_cart)){
			    		echo $update_quantity_cart;
			    	}
			    	?>
			    	<?php
			    	if(isset($del_product_cart)){
			    		echo $del_product_cart;
			    	}
			    	?>
						<table class="tblone">
							<tr>
								<th width="3%">ID<?php echo $MSKH ?></th>
								<th width="25%">Tên sản phẩm</th>
								<th width="20%">Image</th>
								<th width="17%">Giá</th>
								<th width="10%">Số lượng</th>
								<th width="10%">Tổng</th>
								
							</tr>
							<?php
							$get_product_cart=$ct->get_product_cart($MSKH);
							if($get_product_cart){
								$subtotal=0;
								$SoLuong=0;
								$i=0;
								while($result = $get_product_cart->fetch_assoc()){
									$i++;

							?>
							<tr>
								<!-- <td><?php
								 $today = date("d/m/Y") ;
  								echo $today;
																		 ?></td> -->
								<td><?php echo $i;?></td>
								<td><?php echo $result['TenHH']?></td>
								<td><img src="admin/uploads/<?php echo $result['Location']?>" alt=""/></td>
								<td><?php echo $result['Gia']." VND"?></td>
								<td><?php echo $result['SoLuong']?></td>
						

								<td><?php 
								$total=$result['Gia']*$result['SoLuong'];
								 echo $total;
								  ?>
									
								</td>
								
							</tr>
							<?php
							$subtotal+=$total;
							$SoLuong+=$result['SoLuong'];
						}
						}
							?>
							
						</table>
						<?php
								$check_cart=$ct->check_cart();
								if(isset($subtotal)){
								 
								 ?>
						<table style="float:right;text-align:left;margin: 5px" width="40%">
							<tr>
								<th>Tổng đơn : </th>
								<td><?php  

								echo $subtotal." VND";
								
								Session::set("SL",$SoLuong);
								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10% </td>
							</tr>
							<tr>
								<th>Tổng cộng :</th>
								<td><?php $gtotal=1.1*$subtotal;
								Session::set("sum",$gtotal);
								 echo $gtotal." VND"?>  </td>
							</tr>
					   </table>
					   <?php
					}else{
						echo "Giỏ hàng của bạn trống! Hãy chọn mua hàng";					
					}
					?>

					</div>
    		</div>
    		<div class="box_right">
    			<table class="tblone" width="500px">
    			<?php
    			$MSKH=Session::get('MSKH');
    			$get_customer=$cs->show_customers($MSKH);
    			if($get_customer){
    				while($result=$get_customer->fetch_assoc()){
    			?>
    			<h3 style="text-align: center; font-weight: bold; font-size: 20px;">Thông tin khách hàng</h3>
    			<tr>
    				<td><i class="fa fa-user"></i> Họ và tên:</td>
    				
    				<td><?php echo $result['HoTenKH']?></td>
    			</tr>
    			<tr>
    				<td><i class="fa fa-institution"></i> Công ty:</td>
    				
    				<td><?php echo $result['TenCongTy']?></td>
    			</tr>
    			<tr>
    				<td><i class="fa fa-address-card-o"></i> Địa chỉ:</td>
    				
    				<td><?php echo $result['DiaChi']?></td>
    			</tr>
    			<tr>
    				<td><i class="fa fa-ravelry" aria-hidden="true"></i> Số điện thoại:</td>
    				
    				<td><?php echo $result['SoDienThoai']?></td>
    			</tr>
    			<tr>
    				<td><i class="fa fa-envelope"></i>Email:</td>
    				
    				<td><?php echo $result['Email']?></td>
    			</tr>
                <tr>
                    <td colspan="3"><a href="editprofile.php">Cập nhật thông tin</a></td>
                    
                    
                </tr>
    			
    			<?php
    		}
    	}
    	?>
    		</table>
    		</div>
    	
 		</div>

 	</div>
 	<center><a href="?MSHH=MSHH" class="submit_order">Đặt hàng</a></center>
 </div>
 <br>
 </form>
	<?php
	include 'inc/footer.php';

?>	