<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>

<?php
$pd = new product();
$fm = new Format();
if(isset($_GET['MSHH']) ){
        
        
   
        $id=$_GET['MSHH'];
        $delpro=$pd->del_product($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách hàng hóa</h2>
        <div class="block">  
        	<?php
        	if(isset($delpro)){

        		echo $delpro;
        	}
        		?>
        	
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="10%">Tên hàng hóa</th>
					<th width="10%">Loại Hàng</th>
					<th width="20%">Quy cách</th>
					<th width="10%">Giá</th>
					<th width="10%">Số Lượng Hàng</th>
					<th width="10%">Ghi Chú</th>
					<th width="10%">Hình Ảnh</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				
				$pdlist= $pd->show_product();
				if($pdlist){
					$i=0;
					while($result = $pdlist->fetch_assoc()){
						$i++;
				


				 ?>
				<tr class="odd gradeX">
					
					<td><?php echo $result['TenHH']?></td>
					<td><?php echo $result['TenLoaiHang']?></td>
					<td><?php echo $fm->textShorten( $result['QuyCach'],50)?></td>
					<td><?php echo $result['Gia']?></td>
					<td><?php echo $result['SoLuongHang']?></td>
					<td><?php echo $fm->textShorten($result['GhiChu'],50)?></td>
					<td><img src="uploads/<?php echo $result['Location']?>" width="80"></td>			
					
					<td><a href="productedit.php?MSHH=<?php echo $result['MSHH'] ?>">Sửa</a> || <a href="?MSHH=<?php echo $result['MSHH'] ?>">Xóa</a></td>
				</tr>
				<?php 
}
}
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
