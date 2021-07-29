<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/customer.php');
include_once ($filepath.'/../helpers/format.php');

 ?>
<?php
   
    if(!isset($_GET['MSKH']) || $_GET['MSKH']==NULL){
       echo "<script>window.location ='inbox.php'</script>";
    }else{
         $MSKH = $_GET['MSKH']; 
    }
     $cs = new customer();
  

?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thông tin khách hàng</h2>

               <div class="block copyblock"> 
                
                <?php
                    $get_customer = $cs->show_customers($MSKH);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){
                       
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Họ tên khách hàng</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['HoTenKH'] ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>Công ty:</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['TenCongTy'] ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['SoDienThoai'] ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        
                        
                         <tr>
                            <td>Địa chỉ</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['DiaChi'] ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Email</td>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['Email'] ?>" name="catName" class="medium" />
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