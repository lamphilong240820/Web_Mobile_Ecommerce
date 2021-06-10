<?php 
	include 'inc/header.php';
	 include 'inc/slider.php';
?>


<div class="main" style="background: background.jpg">

    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			
    		<h3>Sản phẩm nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div> 
	      <div class="section group">
	      	<?php
	      		$product_feathered = $pd->getproduct_feathered();
	      		if($product_feathered){
	      			while($result = $product_feathered->fetch_assoc()){

	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?MSHH=<?php echo $result['MSHH'] ?>"><img class="zoom" src="admin/uploads/<?php echo $result['Location'] ?>" width="150px" alt="" /></a>
					 <h2><?php echo $result['TenHH'] ?></h2>
					 <p><?php echo $fm->textShorten($result['QuyCach'], 100) ?></p>
					 <p><span class="Gia"><?php echo $fm->format_currency($result['Gia'])." "."VNĐ" ?></span></p>
					 <span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>

				     <div class="button">
				     	<form action="cart.php" method="post">
						
						

						
					
				     	<span><a href="cart.php?MSHH=<?php echo $result['MSHH'] ?>" class="buysubmit"> Mua</a></span>
				     	<span><a href="details.php?MSHH=<?php echo $result['MSHH'] ?>" class="buysubmit">Chi tiết</a></span></div>
				     	</form>
				</div>
				<?php
				}
			}
				?>
			</div> 
			<div class="content_bottom">
    		<div class="heading">

    		<h3>Sản phẩm được mua nhiều nhất</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
	      		$product_new = $pd->getproduct_new();
	      		if($product_new){
	      			while($result_new = $product_new->fetch_assoc()){

	      		?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?MSHH=<?php echo $result_new['MSHH'] ?>"><img class="zoom"  src="admin/uploads/<?php echo $result_new['Location'] ?>" alt="" /></a>
					 <h2><?php echo $result_new['TenHH'] ?> </h2>
					 

					 <p><span class="Gia"><?php echo $fm->format_currency($result_new['Gia'])." "."VNĐ" ?></span></p>
					 <span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked "></span>
				     <div class="button">
				     	<form action="" method="post">
						
						

						
					
				     	<span><a href="cart.php?MSHH=<?php echo $result_new['MSHH'] ?>" class="buysubmit"> Mua</a></span</span>

				     	<span><a href="details.php?MSHH=<?php echo $result_new['MSHH'] ?>" class="details">Chi tiết</a></span></div>
				     	</form>
				</div>
				
				<?php
				}
			}
				?>
			</div>
			<style type="text/css">
				a.phantrang {
				    border: 1px solid #ddd;
				    padding: 10px;
				    background: #414045;
				    color: #fff;
				    cursor: pointer;
				   
				}
				a.phantrang:hover {
				    background: blue;
				}
			</style>
			<div class="">
				<?php
				if(isset($_GET['trang'])){
					$trang = $_GET['trang'];
				}else{
					$trang = 1;
				}
				$product_all = $pd->get_all_product(); 
				$product_count = mysqli_num_rows($product_all);
				$product_button = ceil($product_count/4);
				$i = 1;
				echo '<p>Trang : </p><br>';
				for($i=1;$i<=$product_button;$i++){
					?>
					<a class="phantrang" <?php if($i==$trang){ echo 'style="background:orange"';} ?> style="margin:0 10px;" href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>	
					<?php
					
				}
				?>
			</div>
    </div>
 </div>
 
<?php 
	include 'inc/footer.php';
	
 ?>
