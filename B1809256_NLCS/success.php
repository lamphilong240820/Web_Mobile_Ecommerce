
<?php
	include 'inc/header.php';
	
	
	

?>
<?php 
  if(!isset($_GET['MSHH']) || $_GET['MSHH']== 'MSHH'){
  	$MSKH=Session::get('MSKH');
  	$insertorder=$ct->insert_order($MSKH);
  	
  	
        
        
    }
  //    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        
       
  //    	$SoLuong=$_POST['SoLuong'];
  //       $AddtoCart=$ct->add_to_cart($SoLuong,$id);
  //   }

?>
<style type="text/css">
	h2.success_order{
		text-align: center;
		color: red;
	}
  p.success_note{
    text-align: center;
    padding: 8px;
    font-size: 17px;
  }
</style>
<form action="" method="post">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<h2 class="success_order">Đặt hàng thành công</h2>
        <?php
        $MSKH=Session::get('MSKH');
        $get_amount=$ct->getAmountPrice($MSKH);
        if($get_amount){
          $amount=0;
          while($result=$get_amount->fetch_assoc()){
            $GiaDatHang=$result['GiaDatHang'];
            $amount+= $GiaDatHang;

          }
        }
        ?>
        <p class="success_note">Tổng đơn hàng của bạn là: <?php $total=$amount*1.1; echo $total." VND"; ?></p>
        <p class="success_note">Chúng tôi sẽ giao đến bạn nhanh nhất có thể. Vui lòng kiểm tra chi tiết đơn hàng tại đây<a href="orderdetails.php">Click here</a></p>
    	
 		</div>

 	</div>
 	
 </div>
 </form>
	<?php
	include 'inc/footer.php';

?>	