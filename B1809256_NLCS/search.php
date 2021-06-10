<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
?>

 <div class="main">
    <div class="content">
    	<?php
	     	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $tukhoa = $_POST['tukhoa'];
			        $search_product = $pd->search_product($tukhoa);
			        
			    }
	      	?>
    	<div class="content_top">
    		
    		<div class="heading">	
    		<h3>Từ khóa tìm kiếm : <?php echo $tukhoa ?></h3>
    		</div>
    		
    		<div class="clear"></div>

    	</div>
    	
	      <div class="section group">
	      	<?php
	      	
	      	 if($search_product){
	      	 	while($result = $search_product->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?MSHH=<?php echo $result['MSHH'] ?>"><img class="zoom" src="admin/uploads/<?php echo $result['Location'] ?>" width="150px" alt="" /></a>
					 <h2><?php echo $result['TenHH'] ?></h2>
					 <p><?php echo $fm->textShorten($result['QuyCach'], 130) ?></p>
					 <p><span class="Gia"><?php echo $fm->format_currency($result['Gia'])." "."VNĐ" ?></span></p>
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

		}else{
			echo "<div class='content_top'>Sản phẩm không tồn tại </div>";
			echo "<img src='images/no-resultfound.jpg'>";
		}
			?>
			</div>

	
	
    </div>
 </div>
<?php 
	include 'inc/footer.php';
	
 ?>
