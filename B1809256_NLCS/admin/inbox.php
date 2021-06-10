<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php
	$ct = new cart();
	if(isset($_GET['shiftid'])){
     	$id = $_GET['shiftid'];
     	$time = $_GET['NgayDH'];     	
     	$shifted = $ct->shifted($id,$time);
    }

    if(isset($_GET['delid'])){
     	$id = $_GET['delid'];
     	$time = $_GET['NgayDH'];
     	
     	$del_shifted = $ct->del_shifted($id,$time);
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Hộp thư</h2>
                <div class="block">
                <?php 
                if(isset($shifted)){
                	echo $shifted;
                }

                ?>  
                <?php 
                if(isset($del_shifted)){
                	echo $del_shifted;
                }
                
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Ngày đặt hàng</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th>Khách hàng</th>
							<th>Địa chỉ</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ct = new cart();
						$fm = new Format();
						$get_inbox_cart = $ct->get_inbox_cart();
						if($get_inbox_cart){
							$i = 0;
							while($result = $get_inbox_cart->fetch_assoc()){
								$i++;
						 ?>
						
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['NgayDH'] ?></td>
							<td><?php echo $result['TenHH'] ?></td>
							<td><?php echo $result['SoLuong'] ?></td>
							<td><?php echo $result['GiaDatHang'].' '.'VNĐ' ?></td>
							<td><?php echo $result['MSKH'] ?></td>
							<td><a href="customer.php?MSKH=<?php echo $result['MSKH'] ?>">Xem thông tin khách hàng</a></td>
							<td>
							<?php 
							if($result['TrangThai']==0){
							?>

								<a href="?shiftid=<?php echo $result['SoDonDH'] ?>&GiaDatHang=<?php echo $result['GiaDatHang'] ?>&NgayDH=<?php echo $result['NgayDH'] ?>">Đang chờ xử lí</a>

								<?php
							}if($result['TrangThai']==1){
								?>
								<?php
								echo 'Đang vận chuyển...';
								?>
							<?php
							}if($result['TrangThai']==2){
							?>

							<a href="?delid=<?php echo $result['SoDonDH'] ?>&GiaDatHang=<?php echo $result['GiaDatHang'] ?>&NgayDH=<?php echo $result['NgayDH'] ?>">Đã giao</a>

							<?php
								}if ($result['TrangThai']==3) {
									echo 'Đã bán';
								}
							
							?>
							</td>
						</tr>
						<?php
					}}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
