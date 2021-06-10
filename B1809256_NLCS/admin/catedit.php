<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
    $cat= new category();
    if(!isset($_GET['MaLoaiHang']) || $_GET['MaLoaiHang']== NULL){
        echo "<script>window.location='catlist.php'</script>";
        
    }else{
        $id=$_GET['MaLoaiHang'];
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $TenLoaiHang=$_POST['TenLoaiHang'];
       

        $updateCat=$cat->update_category($TenLoaiHang,$id);
    }
    

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                <div class="block copyblock"> 
                <?php 
                if(isset($updateCat)){
                    echo $updateCat;
                }
                ?>



               
                <?php
                    $get_cate_name=$cat->getcatbyId($id);
                    if($get_cate_name){
                        while($result = $get_cate_name->fetch_assoc()){
                    

                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['TenLoaiHang'] ?>"name='TenLoaiHang' placeholder="Sửa danh mục sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
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
<?php include 'inc/footer.php';?>