<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>

<?php
    $pd= new product();
     if(!isset($_GET['MSHH']) || $_GET['MSHH']== NULL){
        echo "<script>window.location='productlist.php'</script>";
        
    }else{
        $id=$_GET['MSHH'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        
       

        $updateProduct=$pd->update_product($_POST,$_FILES,$id);
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa hàng hóa</h2>
        <div class="block">               
            <?php

            if(isset($updateProduct)){
                echo $updateProduct;
            }
            ?>

            <?php
            $get_product_by_id=$pd->getproductbyId($id);
                if($get_product_by_id){
                    while($result_product=$get_product_by_id->fetch_assoc()){

            ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên hàng hóa</label>
                    </td>
                    <td>
                        <input type="text" name="TenHH" value="<?php echo $result_product['TenHH']?>" class="medium" />
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
                            <option
                            <?php
                            if($result['MaLoaiHang']==$result_product['MaLoaiHang']){
                                echo 'selected';
                            }
                            ?>


                             value="<?php echo $result['MaLoaiHang'] ?>" ><?php echo $result['TenLoaiHang'] ?></option>
                            

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
                        <textarea name="QuyCach" class="tinymce"><?php echo $result_product['QuyCach']?></textarea>
                    </td>
                </tr>
				 
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="Gia" value="<?php echo $result_product['Gia']?>"class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Số lượng hàng</label>
                    </td>
                    <td>
                        <input type="text" name="SoLuongHang" value="<?php echo $result_product['SoLuongHang']?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_product['Location']?>" width="90"><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				

                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Ghi chú</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="GhiChu"><?php echo $result_product['GhiChu']?></textarea>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
        }
    }
            ?>
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


