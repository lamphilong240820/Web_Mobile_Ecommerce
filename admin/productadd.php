<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>

<?php
    $pd= new product();
    if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])){
        
       

        $insertProduct=$pd->insert_product($_POST,$_FILES);
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm hàng hóa mới</h2>
        <div class="block">               
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên hàng hóa</label>
                    </td>
                    <td>
                        <input type="text" name="TenHH" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Loại hàng hóa</label>
                    </td>
                    <td>
                        <select id="select" name="MaLoaiHang">
                            <option>Select Category</option>
                            <?php 
                            $cat= new category();
                            $catlist= $cat->show_category();
                            if($catlist){
                                while($result = $catlist->fetch_assoc()){
                            


                             ?>
                            <option value="<?php echo $result['MaLoaiHang'] ?>" ><?php echo $result['TenLoaiHang'] ?></option>
                            

                            <?php
                        }
                    }

                            ?>
                        </select>
                    </td>
                </tr>
				
				<tr>
                    <td style="vertical-align: top; padding-top: 5px;">
                        <label>Quy cách</label>
                    </td>
                    <td>
                        <textarea name="QuyCach" class="tinymce"></textarea>
                    </td>
                </tr>
				 
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="Gia" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Số lượng hàng</label>
                    </td>
                    <td>
                        <input type="text" name="SoLuongHang" placeholder="Enter Number..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="Location" />
                    </td>
                </tr>
				
				

                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Ghi chú</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="GhiChu"></textarea>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


