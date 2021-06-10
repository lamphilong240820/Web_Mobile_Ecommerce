<?php
	
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath. '/../lib/database.php');
	include_once($filepath. '/../helpers/format.php');
?>





<?php
	/**
	 * 
	 */
	class cart
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db=new Database();
			$this->fm=new format();
		}
		public function add_to_cart($SoLuong,$MSHH){
			$SoLuong=$this->fm->validation($SoLuong);
			$SoLuong=mysqli_real_escape_string($this->db->link,$SoLuong);
			$MSHH=mysqli_real_escape_string($this->db->link,$MSHH);
			$Session_Id=session_id();
			$query= "SELECT * FROM  HangHoa where MSHH='$MSHH'";
			$result_2=$this->db->select($query);
			if($result_2){
			while($result = $result_2->fetch_assoc()){
				$GiaDatHang=$result['Gia']*$SoLuong;
				$image=$result['Location'];
				$MSKH=0;
				$MSNV="B9256";
				$NgayDH = date("d/m/Y");
				$NgayGH = null;
				$TrangThai=0;
				$SoLuong_max=$result['SoLuongHang'];
				// 0: Đặt hàng
				// 1: Giao hàng
				// 2: Đã giao
			}

			if ($SoLuong>$SoLuong_max){
				// $alert="<span class='error'>Số lượng hàng tối đa trong kho có là: </span>";
				return $SoLuong_max;
				
			}
			else {
				# code...
			
			$query_order_2="INSERT INTO DatHang(MSKH,MSNV,NgayDH,NgayGH,TrangThai) 
				values('$MSKH','$MSNV','$NgayDH','$NgayGH','$TrangThai')";
				$insert_order_2=$this->db->insert($query_order_2);

			$query_select_SoDonDH="SELECT SoDonDH from DatHang ORDER BY SoDonDH desc limit 1";
				$get_SoDonDH=$this->db->select($query_select_SoDonDH);
				while ( $result_SoDonDH=$get_SoDonDH->fetch_assoc()){
				
					$SoDonDH=$result_SoDonDH['SoDonDH'];
					$query_insert="INSERT INTO ChiTietDatHang(SoDonDH,MSHH,Session_Id,SoLuong,GiaDatHang,GiamGia,Location) 
				values('$SoDonDH','$MSHH','$Session_Id','$SoLuong','$GiaDatHang',0,'$image')";
				$insert_cart=$this->db->insert($query_insert);


				}

			
				$query_update_hh=" UPDATE HangHoa set SoLuongHang=SoLuongHang-$SoLuong Where MSHH='$MSHH'";
				$update_hh=$this->db->update($query_update_hh);

			}
				if($insert_cart){
					header('Location:cart.php');
					
				}else{
					header('Location:404.php');
				}
				}			// }
		}
		public function get_inbox_cart(){
			$query = "SELECT * FROM ChiTietDatHang, DatHang ,HangHoa WHERE  DatHang.SoDonDH=ChiTietDatHang.SoDonDH and ChiTietDatHang.MSHH=HangHoa.MSHH order by ChiTietDatHang.SoDonDH desc ";
			$result = $this->db->select($query);
			return $result;
		}

		public function get_product_cart($MSKH){
			$Session_Id=session_id();
		
			$query="SELECT ChiTietDatHang.SoDonDH,chitietdathang.Location,HangHoa.TenHH, HangHoa.Gia,sum(chitietdathang.SoLuong) as SoLuong FROM ChiTietDatHang, HangHoa, DatHang where ChiTietDatHang.MSHH=HangHoa.MSHH  and ChiTietDatHang.SoDonDH=DatHang.SoDonDH and Session_Id='$Session_Id'  and DatHang.MSKH='$MSKH' AND  ChiTietDatHang.Session_Id='$Session_Id' group by ChiTietDatHang.MSHH ";
			$result=$this->db->select($query);
			return $result;
		}
		// public function getproductbyId($id){
		// 	$query="SELECT * FROM HangHoa WHERE MaLoaiHang='$id'";
		// 		$result=$this->db->select($query);
		// 		return $result;
		// }
		public function update_quantity_cart($SoLuong,$SoDonDH){
			$SoLuong=mysqli_real_escape_string($this->db->link,$SoLuong);
			$SoDonDH=mysqli_real_escape_string($this->db->link,$SoDonDH);

			$query_old_hh="SELECT * from ChiTietDatHang where SoDonDH='$SoDonDH'";
			$result_old_hh=$this->db->select($query_old_hh);
			if($result_old_hh){
				while ( $result_old_hh_2 = $result_old_hh->fetch_assoc()) {
					$SoLuong_old=$result_old_hh_2['SoLuong'];
					$MSHH=$result_old_hh_2['MSHH'];
					# code...
				}
				$query_update_hh1=" UPDATE HangHoa set SoLuongHang=SoLuongHang+$SoLuong_old Where MSHH='$MSHH'";
				$update_hh1=$this->db->update($query_update_hh1);


			}


			$query_1= "SELECT HangHoa.* FROM  HangHoa inner join ChiTietDatHang on HangHoa.MSHH=ChiTietDatHang.MSHH where ChiTietDatHang.SoDonDH='$SoDonDH'";
			$result_2=$this->db->select($query_1);
			while($result_1 = $result_2->fetch_assoc()){
				
				
				$SoLuong_max=$result_1['SoLuongHang'];
				// 0: Đặt hàng
				// 1: Giao hàng
				// 2: Đã giao
			}
			if ($SoLuong>$SoLuong_max){
				$alert='<span style="color:red;font-size:20px;">Số lượng hàng tối đa trong kho có là:'.$SoLuong_max.'</span>' ;
				$query_update_hh2=" UPDATE HangHoa set SoLuongHang=0 Where MSHH='$MSHH'";
				$update_hh2=$this->db->update($query_update_hh2);

				$query_ud_ctdt="UPDATE ChiTietDatHang SET
				SoLuong='$SoLuong_max' 
				 where SoDonDH='$SoDonDH' ";
				 $result_up_ctdt=$this->db->update($query_ud_ctdt);

				// $alert="<span class='error'>Số lượng hàng tối đa trong kho có là: </span>";
				return $alert;
				
			}
			else{

			$query="UPDATE ChiTietDatHang SET
				SoLuong='$SoLuong' 
				 where SoDonDH='$SoDonDH' ";
				 $result=$this->db->update($query);
				 $query_update_hh=" UPDATE HangHoa set SoLuongHang=SoLuongHang-$SoLuong Where MSHH='$MSHH'";
				$update_hh=$this->db->update($query_update_hh);

				 if($result){
				header('Location:cart.php');
			}
			else{
				$alert="<span class='error'>Cập nhật số lượng sản phẩm thất bại</span>";
				return $alert;
			}
		}


		}
		public function del_product_cart($SoDonDH){
			$SoDonDH=mysqli_real_escape_string($this->db->link,$SoDonDH);
			$query_ctdt="SELECT * from ChiTietDatHang where SoDonDH=$SoDonDH";
				$result_ctdh=$this->db->select($query_ctdt);
				if($result_ctdh){
				while ( $result_ctdh_2=$result_ctdh->fetch_assoc()) {
					$MSHH=$result_ctdh_2['MSHH'];
					$SoLuong=$result_ctdh_2['SoLuong'];
					$query_update_hh="UPDATE HangHoa set SoLuongHang=SoLuongHang+$SoLuong where MSHH='$MSHH'";
					$result_update_hh=$this->db->update($query_update_hh);
					# code...
				}
			}
			

			$query= "DELETE  FROM  ChiTietDatHang where SoDonDH='$SoDonDH'";
			$result=$this->db->delete($query);
			 if($result){
				header('Location:cart.php');
			}
			else{
				$alert="<span class='error'>Xóa sản phẩm thất bại</span>";
				return $alert;
			}

		}
		public function check_cart(){
			$Session_Id=session_id();
			$query="SELECT * FROM ChiTietDatHang inner join HangHoa 
			on ChiTietDatHang.MSHH=HangHoa.MSHH  where Session_Id='$Session_Id'";
			$result=$this->db->select($query);
			return $result;

		}
		public function get_session_cart(){
			return session_id();
		}
		public function del_all_data($Session_Id){
			
			
		$query= "DELETE FROM ChiTietDatHang where SoDonDH NOT IN (SELECT ChiTietDatHang.SoDonDH FROM ChiTietDatHang inner join DatHang on ChiTietDatHang.SoDonDH=DatHang.SoDonDH where Session_Id='$Session_Id')";		
					$result=$this->db->delete($query);

			 return $result;
		}
		public function del_all_data_2(){
			$query_dt="SELECT SoDonDH from DatHang where MSKH=0";
			$result_dh=$this->db->select($query_dt);
			if($result_dh){
			while ($result_dh_2=$result_dh->fetch_assoc()) {
				$SoDonDH=$result_dh_2['SoDonDH'];
				$query_ctdt="SELECT * from ChiTietDatHang where SoDonDH=$SoDonDH";
				$result_ctdh=$this->db->select($query_ctdt);
				if($result_ctdh){
				while ( $result_ctdh_2=$result_ctdh->fetch_assoc()) {
					$MSHH=$result_ctdh_2['MSHH'];
					$SoLuong=$result_ctdh_2['SoLuong'];
					$query_update_hh="UPDATE HangHoa set SoLuongHang=SoLuongHang+$SoLuong where MSHH='$MSHH'";
					$result_update_hh=$this->db->update($query_update_hh);
					# code...
				}
			}

				# code...
			}
		}
			$query="DELETE FROM DatHang where MSKH=0";
			$result=$this->db->select($query);
			 return $result;
		}
		public function insert_order($MSKH){
			


			$MSKH=mysqli_real_escape_string($this->db->link,$MSKH);
			
			
			$query_order_2="UPDATE DatHang SET MSKH='$MSKH' where MSKH=0 ";
				$insert_order_2=$this->db->update($query_order_2);
			
				



			// 	$Session_Id=session_id();
			// $query="SELECT ChiTietDatHang.*,HangHoa.TenHH FROM ChiTietDatHang inner join HangHoa 
			// on ChiTietDatHang.MSHH=HangHoa.MSHH  where Session_Id='$Session_Id'";
			// $get_product=$this->db->select($query);




			// $query_select_SoDonDH="SELECT SoDonDH from DatHang ORDER BY SoDonDH desc limit 1";
			// 	$get_SoDonDH=$this->db->select($query_select_SoDonDH);
			// 	while ( $result_SoDonDH=$get_SoDonDH->fetch_assoc()){
				
			// 		$SoDonDH=$result_SoDonDH['SoDonDH'];
			// 	}

			// if($get_product){
				
			// 	while ( $result=$get_product->fetch_assoc()) {
			// 		$MSHH=$result['MSHH'];
			// 		$SoLuong=$result['SoLuong'];
			// 		$GiaDatHang=$result['GiaDatHang'];
			// 		$GiamGia=0;
			// 		$image=$result['image'];										
			// 		$Session_Id=session_id();			

			// $query_order_1="INSERT INTO ChiTietDatHang(SoDonDH,MSHH,Session_Id,SoLuong,GiaDatHang,GiamGia,image) 
			// 	values('$SoDonDH','$MSHH','$Session_Id','$SoLuong','$GiaDatHang','$GiamGia','$image')";
			// 	$insert_order=$this->db->insert($query_order_1);


			// }
			
			// }
					
		}
		public function getAmountPrice($MSKH){
			$NgayDH = date("d/m/Y");
			$query="SELECT GiaDatHang from  ChiTietDatHang inner join DatHang on ChiTietDatHang.SoDonDH=DatHang.SoDonDH and DatHang.MSKH='$MSKH' and DatHang.NgayDH='$NgayDH'";
			$result=$this->db->select($query);
			return $result;

		}
		public function get_cart_ordered($MSKH){

			
			$query="SELECT ChiTietDatHang.SoDonDH,chitietdathang.Location,DatHang.NgayDH,HangHoa.TenHH, ChiTietDatHang.GiaDatHang,DatHang.TrangThai,chitietdathang.SoLuong as SoLuong FROM ChiTietDatHang, HangHoa, DatHang where ChiTietDatHang.MSHH=HangHoa.MSHH  and ChiTietDatHang.SoDonDH=DatHang.SoDonDH  and DatHang.MSKH='$MSKH' order by ChiTietDatHang.SoDonDH desc  ";
			$result=$this->db->select($query);
			return $result;
		}
		public function check_order($MSKH){
			$sId = session_id();
			$query = "SELECT * FROM ChiTietDatHang, DatHang WHERE MSKH = '$MSKH' and DatHang.SoDonDH=ChiTietDatHang.SoDonDH ";
			$result = $this->db->select($query);
			return $result;
		}
		public function shifted($id,$time){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			
			$query = "UPDATE DatHang SET

					TrangThai = '1'

					WHERE SoDonDH = '$id' AND NgayDH='$time' and TrangThai='0'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Cập nhật đơn hàng thành công</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Cập nhật đơn hàng không thành công</span>";
				return $msg;
			}
		}
		public function del_shifted($id,$time){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$NgayGH = date("d/m/Y");
			$query = "UPDATE DatHang SET

					TrangThai = '3',NgayGH='$NgayGH'

					WHERE SoDonDH = '$id' AND NgayDH='$time'";
			$result = $this->db->update($query);	


			if($result){
				$msg = "<span class='success'>Xóa đơn hàng thành công</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Xóa đơn hàng thành công</span>";
				return $msg;
			}
		}
		public function shifted_confirm($id,$time){
			
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			
			$query = "UPDATE DatHang SET

					TrangThai = '2'

					WHERE SoDonDH = '$id' AND NgayDH='$time' and TrangThai='1'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Cập nhật đơn hàng thành công</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Cập nhật đơn hàng không thành công</span>";
				return $msg;
			}
		}
		public function del_order_id($id,$time,$SoDonDH){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$SoDonDH = mysqli_real_escape_string($this->db->link, $SoDonDH);

			
			$query_old_hh="SELECT * from ChiTietDatHang where SoDonDH='$SoDonDH'";
			$result_old_hh=$this->db->select($query_old_hh);
			if($result_old_hh){
				while ( $result_old_hh_2 = $result_old_hh->fetch_assoc()) {
					$SoLuong_old=$result_old_hh_2['SoLuong'];
					$MSHH=$result_old_hh_2['MSHH'];
					# code...
				}
				$query_update_hh1=" UPDATE HangHoa set SoLuongHang=SoLuongHang+$SoLuong_old Where MSHH='$MSHH'";
				$update_hh1=$this->db->update($query_update_hh1);


			}
			
			$query = "DELETE FROM DatHang

					WHERE SoDonDH = '$SoDonDH' AND NgayDH='$time' AND MSKH='$id'";
			$result = $this->db->delete($query);

			$query_2="DELETE FROM ChiTietDatHang

					WHERE SoDonDH = '$SoDonDH'";
			$result_2 = $this->db->delete($query_2);
			if($result && $result_2 ){
				$msg = "<span class='success'>Hủy đơn hàng thành công</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Hủy đơn hàng không thành công</span>";
				return $msg;
			}

			
		}
		
		


		
}


?>
