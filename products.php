<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
	

?>
 <div class="main">

    <div class="content">
    	<div class="content_top"> <h3 style="font-family: 'Monda', sans-serif;
    font-size: 22px;
    color: #602D8D;
    text-transform: uppercase;">DANH SÁCH SẢN PHẨM</h3>
    <!-- <div class="dataTables_wrapper" id="example_wrapper"><div id="example_length" class="dataTables_length"><label>Show <select size="1" name="example_length"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="dataTables_filter" id="example_filter"><label>Search: <input type="text"></label></div><table class="data display datatable" id="example">
					
					
				<tbody><tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No data available in table</td></tr></tbody></table><div class="dataTables_info" id="example_info">Showing 0 to 0 of 0 entries</div><div class="dataTables_paginate paging_two_button" id="example_paginate"><div class="paginate_disabled_previous" title="Previous" id="example_previous"></div><div class="paginate_disabled_next" title="Next" id="example_next"></div></div></div> -->

    		<div class="heading">
    		<h3></h3>
    		</div>
    		<div class="clear"></div>
    	</div> 
	      <div class="section group">
	      	<?php
	      		$product_feathered = $pd->getproduct_all();
	      		if($product_feathered){
	      			while($result = $product_feathered->fetch_assoc()){

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
				$product_all = $pd->get_all_product(); 
				$product_count = mysqli_num_rows($product_all);
				$product_button = ceil($product_count/8);
				$i = 1;
				echo '<p>Trang : </p><br>';
				for($i=1;$i<=$product_button;$i++){
					?>
					<a class="phantrang" <?php if($i==$trang){ echo 'style="background:orange"';} ?> style="margin:0 10px;" href="products.php?trang=<?php echo $i ?>"><?php echo $i ?></a>	

					<?php
					
				}
				?>

			</div>
	</div> 
	<br>
<?php
	include 'inc/footer.php';

?>	