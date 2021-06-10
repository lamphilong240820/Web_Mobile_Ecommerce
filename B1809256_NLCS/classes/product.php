<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath. '/../lib/database.php');
	include_once($filepath. '/../helpers/format.php');
?>





<?php
	/**
	 * 
	 */
	class product
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db=new Database();
			$this->fm=new format();
		}
		public function search_product($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT * FROM HangHoa WHERE TenHH LIKE '%$tukhoa%'";
			$result = $this->db->select($query);
			return $result;

		}

		public function insert_product($data, $files){
			

			$TenHH=mysqli_real_escape_string($this->db->link,$data['TenHH']);
			$MaLoaiHang=mysqli_real_escape_string($this->db->link,$data['MaLoaiHang']);
			$QuyCach=mysqli_real_escape_string($this->db->link,$data['QuyCach']);
			$Gia=mysqli_real_escape_string($this->db->link,$data['Gia']);
			$SoLuongHang=mysqli_real_escape_string($this->db->link,$data['SoLuongHang']);		
			$GhiChu=mysqli_real_escape_string($this->db->link,$data['GhiChu']);


			//Kiem tra hinh anh va lay hinh anh cho vao folder upload
			$permited= array('jpg','jpeg','png','gif');
			$file_name= $_FILES['Location']['name'];
			$file_size= $_FILES['Location']['size'];
			$file_temp= $_FILES['Location']['tmp_name'];

			$div=explode('.', $file_name);
			$file_ext=strtolower(end($div));
			$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
			$uploaded_image="uploads/".$unique_image;




			if($TenHH==""||$MaLoaiHang==""||$QuyCach==""||$Gia==""||$SoLuongHang==""||$file_name==""||$GhiChu==""){
				$alert= "<span class='error'>Vui lòng điền đầy đủ thông tin hàng hóa</span>";
				return $alert;
			}
			else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query="INSERT INTO HangHoa(TenHH,MaLoaiHang,QuyCach,Gia,SoLuongHang,Location,GhiChu) 
				values('$TenHH','$MaLoaiHang','$QuyCach','$Gia','$SoLuongHang','$unique_image','$GhiChu')";
				$result=$this->db->insert($query);
				if($result){
					$alert= "<span class='success'>Thêm sản phẩm thành công</span>";
					return $alert;
				}else{
					$alert= "<span class='error'>Thêm sản phẩm không thành công</span>";
					return $alert;
				}

				

			}
		}
		public function show_product(){
			$query="SELECT HangHoa.*,LoaiHangHoa.TenLoaiHang
			FROM HangHoa inner join LoaiHangHoa 
			on HangHoa.MaLoaiHang=LoaiHangHoa.MaLoaiHang
			ORDER BY HangHoa.MSHH desc";
			// $query="SELECT * FROM HangHoa ORDER BY MSHH desc";
				$result=$this->db->select($query);
				return $result;
		}
		public function getproductbyId($id){
			$query="SELECT * FROM HangHoa WHERE MSHH='$id'";
				$result=$this->db->select($query);
				return $result;
		}
		public function update_product($data,$files,$id){

			$TenHH=mysqli_real_escape_string($this->db->link,$data['TenHH']);
			$MaLoaiHang=mysqli_real_escape_string($this->db->link,$data['MaLoaiHang']);
			$QuyCach=mysqli_real_escape_string($this->db->link,$data['QuyCach']);
			$Gia=mysqli_real_escape_string($this->db->link,$data['Gia']);
			$SoLuongHang=mysqli_real_escape_string($this->db->link,$data['SoLuongHang']);		
			$GhiChu=mysqli_real_escape_string($this->db->link,$data['GhiChu']);


			//Kiem tra hinh anh va lay hinh anh cho vao folder upload
			$permited= array('jpg','jpeg','png','gif');
			$file_name= $_FILES['Location']['name'];
			$file_size= $_FILES['Location']['size'];
			$file_temp= $_FILES['Location']['tmp_name'];

			$div=explode('.', $file_name);
			$file_ext=strtolower(end($div));
			$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
			$uploaded_image="uploads/".$unique_image;


			if($TenHH==""||$MaLoaiHang==""||$QuyCach==""||$Gia==""||$SoLuongHang==""||$GhiChu==""){
				$alert= "<span class='error'>Vui lòng điền đầy đủ thông tin hàng hóa</span>";
				return $alert;
			}
			else{
				if(!empty($file_name)){
					//neu nguoi dung chon anh
				if($file_size>20480){
					$alert= "<span class='error'>Kích thước hình ảnh nên nhỏ hơn 2MB</span>";
					return $alert;
					
				}
				elseif (in_array($file_ext,$permited) ==false){
					$alert= "<span class='error'>Bạn chỉ có thể upload:-".implode(', ',$permited)."</span>";
					return $alert;
					

				}

				$query="UPDATE HangHoa SET
				TenHH='$TenHH',
				MaLoaiHang='$MaLoaiHang',
				QuyCach='$QuyCach',
				Gia='$Gia',
				SoLuongHang='$SoLuongHang',
				image='$unique_image',
				 GhiChu='$GhiChu' where MSHH='$id' ";

			}else{
				//neu nguoi dung khong chon anh
				$query="UPDATE HangHoa SET
				TenHH='$TenHH',
				MaLoaiHang='$MaLoaiHang',
				QuyCach='$QuyCach',
				Gia='$Gia',
				SoLuongHang='$SoLuongHang',
				
				 GhiChu='$GhiChu' where MSHH='$id' ";
			}
			
				
				$result=$this->db->update($query);
				if($result){
					$alert= "<span class='success'>Cập nhật hàng hóa thành công</span>";
					return $alert;
				}else{
					$alert= "<span class='error'>Cập nhật hàng hóa không thành công</span>";
					return $alert;
				}

				

			}
	}




	public function del_product($id){
		$query="DELETE FROM HangHoa WHERE MSHH='$id'";
				$result=$this->db->delete($query);
				if($result){

					$alert= "<span class='success'>Xóa hàng hóa thành công</span>";
					return $alert;
				}else{
					$alert= "<span class='error'>Xóa hàng hóa không thành công</span>";
					return $alert;
				}

				
	}
//END BACKEND

	public function getproduct_feathered(){
		$sp_tungtrang = 4;
			if(!isset($_GET['trang'])){
				$trang = 1;
			}else{
				$trang = $_GET['trang'];
			}
			$tung_trang = ($trang-1)*$sp_tungtrang;
			$query = "SELECT * FROM HangHoa order by MSHH  LIMIT $tung_trang,$sp_tungtrang";
			$result = $this->db->select($query);
			return $result;
		// $query="SELECT * FROM HangHoa WHERE MSHH='1' or MSHH='2' or MSHH='3' or MSHH='4'";
		// 		$result=$this->db->select($query);
		// 		return $result;
}
public function getproduct_all(){
	$sp_tungtrang = 8;
			if(!isset($_GET['trang'])){
				$trang = 1;
			}else{
				$trang = $_GET['trang'];
			}
			$tung_trang = ($trang-1)*$sp_tungtrang;
			$query = "SELECT * FROM HangHoa  LIMIT $tung_trang,$sp_tungtrang";
			$result = $this->db->select($query);
			return $result;
		// $query="SELECT * FROM HangHoa ";
		// 		$result=$this->db->select($query);
		// 		return $result;
}
public function getproduct_new(){
		$sp_tungtrang = 4;
			if(!isset($_GET['trang'])){
				$trang = 1;
			}else{
				$trang = $_GET['trang'];
			}
			$tung_trang = ($trang-1)*$sp_tungtrang;
			$query = "SELECT * FROM HangHoa order by MSHH desc LIMIT $tung_trang,$sp_tungtrang";
			$result = $this->db->select($query);
			return $result;
		
}
public function get_all_product(){
			$query = "SELECT * FROM HangHoa";
			$result = $this->db->select($query);
			return $result;
		} 
public function get_details($id){
		$query="SELECT HangHoa.*,LoaiHangHoa.TenLoaiHang
			FROM HangHoa inner join LoaiHangHoa 
			on HangHoa.MaLoaiHang=LoaiHangHoa.MaLoaiHang
			where HangHoa.MSHH='$id'";
			// $query="SELECT * FROM HangHoa ORDER BY MSHH desc";
				$result=$this->db->select($query);
				return $result;
}

public function get_lasted_dell(){
	$query="SELECT * FROM HangHoa where MaLoaiHang='2' order by MSHH desc limit 1";
				$result=$this->db->select($query);
				return $result;
}
public function get_lasted_oppo(){
	$query="SELECT * FROM HangHoa where MaLoaiHang='4' order by MSHH desc limit 1";
				$result=$this->db->select($query);
				return $result;
}
public function get_lasted_apple(){
	$query="SELECT * FROM HangHoa where MaLoaiHang='5' order by MSHH desc limit 1";
				$result=$this->db->select($query);
				return $result;
}
public function get_lasted_samsung(){
	$query="SELECT * FROM HangHoa where MaLoaiHang='6' order by MSHH desc limit 1";
				$result=$this->db->select($query);
				return $result;
}



}

?>
