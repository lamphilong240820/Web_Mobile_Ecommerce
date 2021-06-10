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

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thông tin khách hàng</h2>

               <div class="block copyblock"> 
                
                 <form action="" method="post">
        <table class="tblone" width="500px">
                <tr>
                    
                        <?php
                        if(isset($updatecustomer)){
                            echo '<td colspan="2">'.$updatecustomer.'</td>';
                        }
                        ?>
                    
                </tr>
          <?php
          $MSKH=Session::get('MSKH');
          $get_customer=$cs->show_customers($MSKH);
          if($get_customer){
            while($result=$get_customer->fetch_assoc()){
          ?>
          <tr>
            <td><i class="fa fa-user"></i> Họ và tên:</td>
                    <td><input type="text" name="HoTenKH" value="<?php echo $result['HoTenKH']?>"></td>
            
            
          </tr>
                <tr>
                    <td><i class="fa fa-institution"></i> Công ty:</td>
                    <td><input type="text" name="TenCongTy" value="<?php echo $result['TenCongTy']?>"></td>
                    
                    
                </tr>
          <tr>
            <td><i class="fa fa-address-card-o"></i> Địa chỉ:</td>
                    <td><input type="text" name="DiaChi" value="<?php echo $result['DiaChi']?>"></td>
            
            
          </tr>
          <tr>
            <td><i class="fa fa-ravelry" aria-hidden="true"></i> Số điện thoại:</td>
            <td><input type="text" name="SoDienThoai" value="<?php echo $result['SoDienThoai']?>"></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-envelope"></i> Email:</td>
            <td><input type="text" name="Email" value="<?php echo $result['Email']?>"></td>
            
          </tr>
                <tr>
                    <td colspan="3"><input type="submit" name="save" value="Save"></td>
                    
                    
                </tr>
          
          <?php
        }
      }
      ?>
        </table>
            </form>

               

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>