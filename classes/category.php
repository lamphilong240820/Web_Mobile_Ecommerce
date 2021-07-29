<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath. '/../lib/database.php');
	include_once($filepath. '/../helpers/format.php');
?>





<?php
	/**
	 * 
	 */
	class category
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db=new database();
			$this->fm=new format();
		}

		public function insert_category($TenLoaiHang){
			$TenLoaiHang=$this->fm->validation($TenLoaiHang);
			

			$TenLoaiHang=mysqli_real_escape_string($this->db->link,$TenLoaiHang);

			if(empty($TenLoaiHang)){
				$alert= "<span class='error'>Tên loại hàng không được trống</span>";
				return $alert;
			}
			else{
				$query="INSERT INTO LoaiHangHoa(TenLoaiHang) values('$TenLoaiHang')";
				$result=$this->db->insert($query);
				if($result){
					$alert= "<span class='success'>Thêm danh mục sản phẩm thành công</span>";
					return $alert;
				}else{
					$alert= "<span class='error'>Thêm danh mục sản phẩm không thành công</span>";
					return $alert;
				}

				

			}
		}
		public function show_category(){
			$query="SELECT * FROM LoaiHangHoa ORDER BY MaLoaiHang desc";
				$result=$this->db->select($query);
				return $result;
		}
		public function getcatbyId($id){
			$query="SELECT * FROM LoaiHangHoa WHERE MaLoaiHang='$id'";
				$result=$this->db->select($query);
				return $result;
		}
		public function update_category($TenLoaiHang,$id){
		$TenLoaiHang=$this->fm->validation($TenLoaiHang);
			
			$TenLoaiHang=mysqli_real_escape_string($this->db->link,$TenLoaiHang);
			$id=mysqli_real_escape_string($this->db->link,$id);


			if(empty($TenLoaiHang)){
				$alert= "<span class='error'>Tên loại hàng không được trống</span>";
				return $alert;
			}
			else{
				$query="UPDATE LoaiHangHoa SET TenLoaiHang='$TenLoaiHang' where MaLoaiHang='$id' ";
				$result=$this->db->update($query);
				if($result){
					$alert= "<span class='success'>Cập nhật danh mục sản phẩm thành công</span>";
					return $alert;
				}else{
					$alert= "<span class='error'>Cập nhật  danh mục sản phẩm không thành công</span>";
					return $alert;
				}

				

			}
	}




	public function del_category($id){
		$query="DELETE FROM LoaiHangHoa WHERE MaLoaiHang='$id'";
				$result=$this->db->delete($query);
				if($result){

					$alert= "<span class='success'>Xóa danh mục sản phẩm thành công</span>";
					return $alert;
				}else{
					$alert= "<span class='error'>Xóa danh mục sản phẩm không thành công</span>";
					return $alert;
				}

				
	}
	public function show_category_fontend(){
			$query="SELECT * FROM LoaiHangHoa ORDER BY MaLoaiHang desc";
				$result=$this->db->select($query);
				return $result;
		}
		public function get_product_by_cat($id){
			$sp_tungtrang = 4;
			if(!isset($_GET['trang'])){
				$trang = 1;
			}else{
				$trang = $_GET['trang'];
			}
			$tung_trang = ($trang-1)*$sp_tungtrang;
			
			$query="SELECT * FROM HangHoa WHERE MaLoaiHang='$id' limit $tung_trang,$sp_tungtrang";
				$result=$this->db->select($query);
				return $result;
		}
		public function get_name_by_cat($id){
			$query="SELECT HangHoa.*,LoaiHangHoa.TenLoaiHang FROM HangHoa inner join LoaiHangHoa on
			HangHoa.MaLoaiHang=LoaiHangHoa.MaLoaiHang
			 WHERE HangHoa.MaLoaiHang='$id' limit 1";
				$result=$this->db->select($query);
				return $result;
		}
		

}


?>
