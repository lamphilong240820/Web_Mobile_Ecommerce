<?php
	
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath. '/../lib/database.php');
	include_once($filepath. '/../helpers/format.php');
?>





<?php
	/**
	 * 
	 */
	class customer
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db=new Database();
			$this->fm=new format();
		}
		public function insert_customer($data){
			$HoTenKH=mysqli_real_escape_string($this->db->link,$data['HoTenKH']);
			$DiaChi=mysqli_real_escape_string($this->db->link,$data['DiaChi']);
			$SoDienThoai=mysqli_real_escape_string($this->db->link,$data['SoDienThoai']);
			$Email=mysqli_real_escape_string($this->db->link,$data['Email']);
			$TenCongTy=mysqli_real_escape_string($this->db->link,$data['TenCongTy']);
			$PassWord=mysqli_real_escape_string($this->db->link,md5($data['PassWord']));
			$PassWord2=mysqli_real_escape_string($this->db->link,md5($data['PassWord2']));
			if($HoTenKH==""||$DiaChi==""||$SoDienThoai==""||$Email==""||$PassWord==""||$PassWord2==""){
				$alert= "<span class='error'>Vui lòng điền đầy đủ thông tin </span>";
				return $alert;
			}else{
				$check_email="SELECT * FROM KhachHang where Email='$Email' limit 1";
				$result_check=$this->db->select($check_email);
				if($result_check){
					$alert= "<span class='error'>Email đã tồn tại. Vui lòng sử dụng một email khác</span>";
				return $alert;
				}
				else if($PassWord != $PassWord2){
					$alert= "<span class='error'>Hai mật khẩu không trùng khớp. Vui lòng nhập lại</span>";
				return $alert;
				}
				else{

					$query="INSERT INTO KhachHang(HoTenKH,TenCongTy,SoDienThoai,Email,PassWord) 
				values('$HoTenKH','$TenCongTy','$SoDienThoai','$Email','$PassWord')";
				$result=$this->db->insert($query);


				$select_MSKH="SELECT MSKH FROM KhachHang where Email='$Email' limit 1";
				$get_MSKH=$this->db->select($select_MSKH);
				while ($result_MSKH=$get_MSKH->fetch_assoc()) {
					$MSKH=$result_MSKH['MSKH'];

				$query_1="INSERT INTO DiaChiKH(DiaChi,MSKH) values ('$DiaChi', '$MSKH')";
				$result_2=$this->db->insert($query_1);
				}
				

				
				if($result){
					$alert= "<span class='success'>Tạo tài khoản thành công</span>";
					return $alert;
				}else{
					$alert= "<span class='error'>Tạo tài khoản không thành công</span>";
					return $alert;
				}
				}
			}


		}
		public function login_customer($data){
			$Email=mysqli_real_escape_string($this->db->link,$data['Email']);
			$PassWord=mysqli_real_escape_string($this->db->link,md5($data['PassWord']));
			if($Email==""||$PassWord==""){
				$alert= "<span class='error'>Vui lòng điền đầy đủ thông tin </span>";
				return $alert;
			}else{
				$check_email="SELECT * FROM KhachHang where Email='$Email' and PassWord='$PassWord' limit 1";
				$result_check=$this->db->select($check_email);
				if($result_check ){
					$value=$result_check->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('MSKH',$value['MSKH']);
					Session::set('HoTenKH',$value['HoTenKH']);
					header('Location:index.php');

					
				}
				else {
					$alert= "<span class='error'>Tên đặng nhập/ Email và PassWord không đúng</span>";
				return $alert;
				}	
			}
		}
public function show_customers($MSKH){
		$query="SELECT KhachHang.*,DiaChi FROM KhachHang inner join DiaChiKH on KhachHang.MSKH=DiaChiKH.MSKH where KhachHang.MSKH='$MSKH' ";
		$result=$this->db->select($query);
		return $result;
}
public function update_customer($data,$MSKH){
			$HoTenKH=mysqli_real_escape_string($this->db->link,$data['HoTenKH']);
			$DiaChi=mysqli_real_escape_string($this->db->link,$data['DiaChi']);
			$TenCongTy=mysqli_real_escape_string($this->db->link,$data['TenCongTy']);
			$SoDienThoai=mysqli_real_escape_string($this->db->link,$data['SoDienThoai']);
			$Email=mysqli_real_escape_string($this->db->link,$data['Email']);
			
			if($HoTenKH==""||$DiaChi==""||$SoDienThoai==""||$Email==""){
				$alert= "<span class='error'>Vui lòng điền đầy đủ thông tin </span>";
				return $alert;
			}else{
				
					$query="UPDATE KhachHang SET HoTenKH='$HoTenKH',TenCongTy='$TenCongTy'
					,SoDienThoai='$SoDienThoai',Email='$Email'
				where MSKH='$MSKH'";
				$result=$this->db->update($query);
				$query_1="UPDATE DiaChiKH set DiaChi='$DiaChi' where MSKH='$MSKH'";
				$result_1=$this->db->update($query_1);
				if($result ){
					$alert= "<span class='success'>Cập nhật tài khoản thành công</span>";
					return $alert;
				}else{
					$alert= "<span class='error'>Cập nhật tài khoản không thành công</span>";
					return $alert;
				}
				
			}

}
}

?>
