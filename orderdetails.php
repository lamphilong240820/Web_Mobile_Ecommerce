<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
?>


 <?php
 	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
	
	
?> 
<?php
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['NgayDH'];     	
     	$shifted = $ct->shifted_confirm($id,$time);
     	
    }
?> 
<?php
	if(isset($_GET['del_order_id'])){
     	$id = $_GET['del_order_id'];
     	$time = $_GET['NgayDH'];
     	$SoDonDH=$_GET['SoDonDH'];
     	
     	$shifted_confirm = $ct->del_order_id($id,$time,$SoDonDH);
    }
?> 
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Chi tiết các sản phẩm đã đặt</h2>			    	
			    	
						<table class="tblone">
							<tr>
								<th width="10%">ID</th>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Image</th>
								<th width="15%">Giá bán lẻ</th>
								<th width="15%">Số lượng</th>
								<th width="10%">Ngày đặt hàng</th>
								<th width="10%">Trạng thái</th>
								
								<th width="10%">Action</th>
							</tr>
							<?php
							$MSKH = Session::get('MSKH');
							$get_cart_ordered = $ct->get_cart_ordered($MSKH);
							if($get_cart_ordered){
								$i = 0;
								$qty = 0;
								$total = 0;
								while($result = $get_cart_ordered->fetch_assoc()){
									$i++;
									$total = $result['GiaDatHang'];
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['TenHH'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['Location'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['GiaDatHang'])." "."VNĐ" ?></td>
								<td>
									
										
										<?php echo $result['SoLuong'] ?>
									
									
								</td>
								<td><?php echo $result['NgayDH'] ?></td>
								<td>
									<?php
									if($result['TrangThai']=='0'){
										echo 'Đang chờ xác nhận';
									}elseif($result['TrangThai']==1){ 
									?>
									<span>Đang vận chuyển</span>
									
									<?php
									}elseif($result['TrangThai']==2){
										echo 'Đã nhận hàng';
									}

									 ?>


								</td>
								<?php
								if($result['TrangThai']=='0'){
								?>
								<td><a href="?del_order_id=<?php echo $MSKH ?>&NgayDH=<?php echo $result['NgayDH'] ?>&SoDonDH=<?php echo $result['SoDonDH'] ?>">Hủy bỏ</a></td>
								<?php
								
								}elseif($result['TrangThai']=='1'){
								
								?>
								<td><a href="?confirmid=<?php echo $result['SoDonDH'] ?>&NgayDH=<?php echo $result['NgayDH'] ?>">Xác nhận đã nhận hàng</a></td>
								<?php
							}else{
								?>
								<td><?php echo 'Đã nhận hàng'; ?></td>
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
						
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php 
	include 'inc/footer.php';
	
 ?>