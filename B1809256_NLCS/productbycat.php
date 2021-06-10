<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
	

?>
<?php
 if(!isset($_GET['MaLoaiHang']) || $_GET['MaLoaiHang']== NULL){
        echo "<script>window.location='404.php'</script>";
        
    }else{
        $id=$_GET['MaLoaiHang'];
    }
    // if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //     $TenLoaiHang=$_POST['TenLoaiHang'];
       

    //     $updateCat=$cat->update_category($TenLoaiHang,$id);
    // }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php
				$name_cat=$cat->get_name_by_cat($id);
				if($name_cat){
					while($result_name=$name_cat->fetch_assoc()){

				
				?>
    		<div class="heading">
    		<h3>Loại hàng: <?php echo $result_name['TenLoaiHang'];?></h3>
    		</div>
    		
    		<div class="clear"></div>
    		
    	</div>
    	<?php
			   }
			   }
			   ?>
	      <div class="section group">
	      	<?php
				$productbycat=$cat->get_product_by_cat($id);
				if($productbycat){
					while($result=$productbycat->fetch_assoc()){

				
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?MSHH=<?php echo $result['MSHH'] ?>"><img class="zoom"src="admin/uploads/<?php echo $result['Location'];?>" width="200px" alt="" /></a>
					 <h2><?php echo $result['TenHH'];?> </h2>
					 <p><?php echo $fm->textShorten($result['QuyCach'], 120) ?></p>
					 <p><span class="price"><?php echo $result['Gia']." VND";?> </span></p>
					  <span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
				      <div class="button">
				     	<form action="cart.php" method="post">
						
						
						
					
				     	<span><a href="cart.php?MSHH=<?php echo $result['MSHH'] ?>" class="buysubmit"> Mua</a></span</span>
				     	<span><a href="details.php?MSHH=<?php echo $result['MSHH'] ?>" class="buysubmit">Chi tiết</a></span></div>
				     	</form>
				</div>
				<?php
			   }
			   }
			   else{
			   	echo "<div class='content_top'>Loại hàng không có sản phẩm </div>";			   	
			   	echo "<img  align='center' src='images/no-resultfound.jpg'>";

			   }
			   ?>	
			</div>

	
	
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
				$productall=$cat->getproductbycat($id);	
				if($productall){			
				$product_count = mysqli_num_rows($productall);
				


				$product_button = ceil($product_count/8);
				$i = 1;
				echo '<p>Trang : </p><br>';
				for($i=1;$i<=$product_button;$i++){
					?>
					<a class="phantrang" <?php if($i==$trang){ echo 'style="background:orange"';} ?> style="margin:0 10px;" href="productbycat.php?trang=<?php echo $i ?>"><?php echo $i ?></a>	

					<?php
					
				}
			}
			

				?>
			

			</div>
 </div>
 <br>
<?php
	include 'inc/footer.php';

?>	