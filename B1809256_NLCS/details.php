<?php
	include 'inc/header.php';
	
	
	

?>

<?php 
  if(!isset($_GET['MSHH']) || $_GET['MSHH']== NULL){
        echo "<script>window.location='404.php'</script>";
        
    }else{
        $id=$_GET['MSHH'];
    }

     if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $login_check = Session::get('customer_login'); 
		if($login_check==false){
		header('Location:login.php');
		}else{
       
     	$SoLuong=$_POST['SoLuong'];
        $AddtoCart=$ct->add_to_cart($SoLuong,$id);
    }
    }

?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php
    		$get_product_details=$pd->get_details($id);
    		if($get_product_details){
    			while($result_details=$get_product_details->fetch_assoc()){
    		

    		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['Location']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['TenHH'] ?> </h2>
					<div><span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<div class="row">
  <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div>150</div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4"></div>
    </div>
  </div>
  <div class="side right">
    <div>63</div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3"></div>
    </div>
  </div>
  <div class="side right">
    <div>15</div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2"></div>
    </div>
  </div>
  <div class="side right">
    <div>6</div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1"></div>
    </div>
  </div>
  <div class="side right">
    <div>20</div>
  </div>
</div>

					</div>

						
					<p><?php echo$fm->textShorten( $result_details['QuyCach'],100) ?> </p>					
					<div class="price">
						<p>Giá: <span><?php echo $result_details['Gia']." "."VND" ?> </span></p>
						<p>Loại Hàng: <span><?php echo $result_details['TenLoaiHang'] ?> </span></p>
						

						
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="SoLuong" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua hàng"/>

						
					</form>
					<?php
						if(isset($AddtoCart)){
							
							echo'<span style="color:red;font-size:20px;">Số lượng hàng tối đa trong kho có là:'.$AddtoCart.'</span>' ;
							
							
						}

							?>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Chi tiết sản phẩm</h2>
			<p><?php echo $result_details['GhiChu'] ?> </p>					
	    </div>
				
	</div>
	<?php
}
}?>


				<div class="">
					
					<ul>
						<!-- <?php
						$getall_category=$cat->show_category_fontend();
						if($getall_category){
							while($result=$getall_category->fetch_assoc()){
						?>
				      <li><a href="productbycat.php?MaLoaiHang=<?php echo $result['MaLoaiHang'] ?> "><?php echo $result['TenLoaiHang'] ?> </a></li>
				      <?php
				  }
				}
				      ?> -->
    				</ul>
    	
 				</div> 
 		</div>
 	</div>
	<?php
	include 'inc/footer.php';

?>	