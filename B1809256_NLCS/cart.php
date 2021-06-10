<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
	

?>	
<?php
if(isset($_GET['MSHH']) ){
        $login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
	else{
        
   
        $MSHH=$_GET['MSHH'];
   		$SoLuong=1;
        $AddtoCart=$ct->add_to_cart($SoLuong,$MSHH);     
        
   }
}
?>

<?php
if(isset($_GET['SoDonDH']) ){
        
        
   
        $SoDonDH=$_GET['SoDonDH'];
        
        $del_product_cart=$ct->del_product_cart($SoDonDH);
   }
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])){
        
       	$SoDonDH=$_POST['SoDonDH'];
     	$SoLuong=$_POST['SoLuong'];
        $update_quantity_cart=$ct->update_quantity_cart($SoLuong,$SoDonDH);
        if($SoLuong<=0){
        	$del_product_cart=$ct->del_product_cart($SoDonDH);

        }
    }
?>
<?php
 	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
	
	
?> 
<?php
if(!isset($_GET['MSHH']) ){
        echo "<meta http-equiv='refresh' content='0;URL=?MSHH=live'>";
        
   }
?>  
<?php
	if(isset($_GET['MSKH']) ){
        
        $MSKH=$_GET['MSKH'];        
   }
   else{
   		$MSKH=0;
   }
?>
<?php 


  
     if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $login_check = Session::get('customer_login'); 
		if($login_check==false){
		header('Location:login.php');
		}else{

        $id=$_GET['MSHH'];
    
       
     	$SoLuong=1;
        $AddtoCart=$ct->add_to_cart($SoLuong,$id);
    }
    }

?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ hàng</h2>
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
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Image</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng</th>
								<th width="10%">Action</th>
							</tr>
							<?php

							$get_product_cart=$ct->get_product_cart($MSKH);
							if($get_product_cart){
								$subtotal=0;
								$SoLuong=0;
								while($result = $get_product_cart->fetch_assoc()){

							?>
							<tr>
								<td><?php echo $result['TenHH']?></td>
								<td><img src="admin/uploads/<?php echo $result['Location']?>" alt=""/></td>
								<td><?php echo $result['Gia']?></td>

								<td>
									<form action="" method="post">
										<input type="hidden" name="SoDonDH" value="<?php echo $result['SoDonDH']?>"/>

										<input type="number" name="SoLuong" min="0" value="<?php echo $result['SoLuong']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>

								<td><?php 
								$total=$result['Gia']*$result['SoLuong'];
								 echo $total;
								  ?>
									
								</td>
								<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" href="?SoDonDH=<?php echo $result['SoDonDH']?>">Xóa</a></td>
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
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng đơn : </th>
								<td><?php  

								echo $subtotal;
								
								Session::set("SL",$SoLuong);
								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Tổng cộng :</th>
								<td><?php $gtotal=1.1*$subtotal;
								Session::set("sum",$gtotal);
								 echo $gtotal?>  </td>
							</tr>
					   </table>
					   <?php
					}else{
						echo "<span class='error'>Giỏ hàng của bạn trống! Hãy chọn mua hàng</span>";					
					}
					?>

					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="offlinepayment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	include 'inc/footer.php';

?>	
