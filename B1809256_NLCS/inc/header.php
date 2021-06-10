<?php
    include 'lib/session.php';
    Session::init();
?>
<?php

	include_once 'lib/database.php';
	include_once 'helpers/format.php';

	spl_autoload_register(function($className){
		include_once "classes/".$className.".php";
	});

	$db=new Database();
	$fm=new Format();
	$ct=new cart();
	$us=new user();
	$cat=new category();
	$cs=new customer();
	$pd=new product();

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Lam_Phi_Long_B1809256_Store</title>
<meta http-equiv="charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>

<script src="js/jquerymain.js"></script>

<script src="js/script.js" type="text/javascript"></script>

<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>

<body background="images/background.jpg">
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png"  alt=""  /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa" ><input type="submit" name="search_product" value="Tìm kiếm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<!-- <span class="cart_title">Cart</span> -->
								<span class="no_product"><?php
								$check_cart=$ct->check_cart();
								if($check_cart){
								 $sum=Session::get("sum"); 
								 $SL=Session::get("SL");
								
								echo $sum." VND -SL: ".$SL;}
								else{
									echo 'Trống';
								}
								 ?></span>
								
							</a>
						</div>
			      </div>

			      <?php
			      if(isset($_GET['MSKH'])){
			      	$Session_Id=$ct->get_session_cart();
			      	$delcart_2=$ct->del_all_data_2();
			      	$delcart=$ct->del_all_data($Session_Id);
			      	Session::destroy();
			      }
			      ?>
			     
		   <div class="login1">
		   	<?php
		   	$login_check=Session::get('customer_login');
		   	if($login_check==false){
		   		echo '<a href="login.php">Đăng nhập</a></div>';
		   	}else{
		   		echo '<a href="?MSKH= '.Session::get('MSKH').'">Đăng xuất</a></div>';
		   	}


		   	?>


		   	
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	
	   <!--  <div class="navbar-header">
	      <a class="navbar-brand" href="#">WebSiteName</a>
	    </div> -->
	    <ul id="dc_mega-menu-orange" class="dc_mm-orange"> 
	      <li class="active"><a href="index.php">Trang chủ</a></li>
	      <li class="dropdown">
	        <a class="dropbtn" href="products.php">
	        	Sản phẩm
	        <span class="caret"></span></a>
	        <div class="dropdown-content">
	        	<?php
	        	$cate = $cat->show_category();
	        	if($cate){
	      			while($result_new = $cate->fetch_assoc()){

	      		?>
	        	
	          

	          	<a href="productbycat.php?MaLoaiHang=<?php echo $result_new['MaLoaiHang'] ?>"><?php echo $result_new['TenLoaiHang'] ?></a>
	          
	          <?php
	          	}
	          } 
	          ?>

	        </div>

	      </li>
	       
	     
	      
			<li><a href="cart.php">Giỏ hàng</a></li>
			<li><a href="orderdetails.php">Lịch sử mua hàng</a></li>
						
			<?php
			$login_check = Session::get('customer_login'); 
			if($login_check==false){
				echo '';
			}else{
				echo '<li><a href="profile.php">Tài khoản</a> </li>';
			}
			 ?>
			
			
			 <li><a href="contact.php">Liên hệ</a></li>


			 <div class="clearboth"></div>
	  
	     
	    </ul>
	  </div>
	