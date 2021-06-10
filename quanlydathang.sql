-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 05:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(5) NOT NULL,
  `MSHH` int(5) NOT NULL,
  `Session_Id` varchar(255) NOT NULL,
  `SoLuong` int(100) NOT NULL,
  `GiaDatHang` int(11) NOT NULL,
  `GiamGia` double NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(5) NOT NULL,
  `MSKH` char(5) NOT NULL,
  `MSNV` char(5) NOT NULL,
  `NgayDH` varchar(30) NOT NULL,
  `NgayGH` varchar(30) DEFAULT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThai`) VALUES
(250, '4', 'B9256', '25/05/2021', '', 2),
(253, '4', 'B9256', '25/05/2021', '', 2),
(255, '4', 'B9256', '25/05/2021', '', 2),
(256, '4', 'B9256', '25/05/2021', '', 2),
(257, '4', 'B9256', '25/05/2021', '', 2),
(258, '4', 'B9256', '25/05/2021', '', 2),
(259, '4', 'B9256', '25/05/2021', '', 2),
(260, '4', 'B9256', '25/05/2021', '', 2),
(261, '4', 'B9256', '27/05/2021', '', 2),
(262, '4', 'B9256', '27/05/2021', '', 2),
(263, '4', 'B9256', '27/05/2021', '', 2),
(264, '4', 'B9256', '27/05/2021', '', 2),
(265, '4', 'B9256', '27/05/2021', '', 2),
(266, '4', 'B9256', '27/05/2021', '', 2),
(267, '4', 'B9256', '01/06/2021', '', 0),
(268, '4', 'B9256', '01/06/2021', '', 0),
(269, '4', 'B9256', '01/06/2021', '', 0),
(270, '4', 'B9256', '04/06/2021', '', 0),
(271, '4', 'B9256', '04/06/2021', '', 0),
(272, '4', 'B9256', '04/06/2021', '', 0),
(273, '4', 'B9256', '04/06/2021', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(30) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `MSKH` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(1, 'sdad', 13),
(3, '57B/7 Nguyễn Chí Thanh,TPCT', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(255) NOT NULL,
  `TenHH` varchar(50) NOT NULL,
  `MaLoaiHang` int(30) NOT NULL,
  `QuyCach` varchar(255) NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` int(11) NOT NULL,
  `GhiChu` varchar(255) DEFAULT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `MaLoaiHang`, `QuyCach`, `Gia`, `SoLuongHang`, `GhiChu`, `Location`) VALUES
(10, 'Samsung Galaxy S21 5G', 6, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A12 Bionic</p>\r\n<p>RAM 3 GB, ROM 64 GB</p>\r\n<p>Camera sau: 12 MP</p>\r\n<p>Camera trước: 7 MP</p>\r\n<p>Pin 2942 mAh, Sạc 15 W</p>', 1800000, 80, '<p>Samsung Galaxy S21 5G nổi bật với cụm camera sau được thiết kế đầy mới lạ, phần khu&ocirc;n h&igrave;nh chữ nhật chứa bộ 3 camera &ocirc;m trọn cạnh tr&aacute;i của chiếc smartphone, viền khu&ocirc;n cong uyển chuyển, hạn chế tối đa độ nh&ocirc; ra so<', 'cd7efb2d08.jpg'),
(11, 'Samsung Galaxy A02', 6, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A12 Bionic</p>\r\n<p>RAM 3 GB, ROM 64 GB</p>\r\n<p>Camera sau: 12 MP</p>\r\n<p>Camera trước: 7 MP</p>\r\n<p>Pin 2942 mAh, Sạc 15 W</p>', 2000000, 100, '<p>Nổi bật với cụm camera sau được thiết kế đầy mới lạ, phần khu&ocirc;n h&igrave;nh chữ nhật chứa bộ 3 camera &ocirc;m trọn cạnh tr&aacute;i của chiếc smartphone, viền khu&ocirc;n cong uyển chuyển, hạn chế tối đa độ nh&ocirc; ra so với mặt lưng, mang lại', '7bb3207e77.jpg'),
(12, 'Samsung Galaxy M51', 6, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A13 Bionic</p>\r\n<p>RAM 4 GB, ROM 128 GB</p>\r\n<p>Camera sau: 2 camera 12 MP</p>\r\n<p>Camera trước: 12 MP</p>\r\n<p>Pin 3110 mAh, Sạc 18 W</p>', 2000000, 100, '<p>Samsung Galaxy Note 20 Ultra 5G Trắng nổi bật với cụm camera sau được thiết kế đầy mới lạ, phần khu&ocirc;n h&igrave;nh chữ nhật chứa bộ 3 camera &ocirc;m trọn cạnh tr&aacute;i của chiếc smartphone, viền khu&ocirc;n cong uyển chuyển, hạn chế tối đa độ ', '5c9397258d.jpg'),
(13, 'Samsung Galaxy Z Fold2 5G', 6, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A12 Bionic</p>\r\n<p>RAM 3 GB, ROM 64 GB</p>\r\n<p>Camera sau: 12 MP</p>\r\n<p>Camera trước: 7 MP</p>\r\n<p>Pin 2942 mAh, Sạc 15 W</p>', 3000000, 100, '<p>Samsung Galaxy Note 20 Ultra 5G Trắng nổi bật với cụm camera sau được thiết kế đầy mới lạ, phần khu&ocirc;n h&igrave;nh chữ nhật chứa bộ 3 camera &ocirc;m trọn cạnh tr&aacute;i của chiếc smartphone, viền khu&ocirc;n cong uyển chuyển, hạn chế tối đa độ ', 'b6b5df053c.jpg'),
(14, 'Samsung Galaxy Z Fold2 5G Đặc Biệt', 6, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A13 Bionic</p>\r\n<p>RAM 4 GB, ROM 128 GB</p>\r\n<p>Camera sau: 2 camera 12 MP</p>\r\n<p>Camera trước: 12 MP</p>\r\n<p>Pin 3110 mAh, Sạc 18 W</p>', 4000000, 100, '<p>Samsung Galaxy Note 20 Ultra 5G Trắng được trang bị m&agrave;n h&igrave;nh, hỗ trợ HDR10+ ti&ecirc;n tiến do Samsung ph&aacute;t triển, c&oacute; thể đạt được độ s&aacute;ng cao nhất l&ecirc;n đến 1300 nits, ngay cả khi dưới &aacute;nh s&aacute;ng mặt ', '08a4ecbccd.jpg'),
(15, 'Samsung Galaxy Note 20 Ultra 5G Trắng', 6, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A12 Bionic</p>\r\n<p>RAM 3 GB, ROM 64 GB</p>\r\n<p>Camera sau: 12 MP</p>\r\n<p>Camera trước: 7 MP</p>\r\n<p>Pin 2942 mAh, Sạc 15 W</p>', 3500000, 100, '<p>Samsung Galaxy Note 20 Ultra 5G Trắng được trang bị m&agrave;n h&igrave;nh, hỗ trợ HDR10+ ti&ecirc;n tiến do Samsung ph&aacute;t triển, c&oacute; thể đạt được độ s&aacute;ng cao nhất l&ecirc;n đến 1300 nits, ngay cả khi dưới &aacute;nh s&aacute;ng mặt ', '2759c02759.jpg'),
(16, 'Samsung Galaxy Note 10+', 6, '<p>M&agrave;n h&igrave;nh 6.5\", Chip MediaTek MT6739W</p>\r\n<p>RAM 3 GB, ROM 32 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 13 MP &amp; Phụ 2 MP</p>\r\n<p>Camera trước: 5 MP</p>\r\n<p>Pin 5000 mAh, Sạc 7.8 W</p>', 2500000, 100, '<p>Samsung Galaxy Note 10+ được trang bị m&agrave;n h&igrave;nh, hỗ trợ HDR10+ ti&ecirc;n tiến do Samsung ph&aacute;t triển, c&oacute; thể đạt được độ s&aacute;ng cao nhất l&ecirc;n đến 1300 nits, ngay cả khi dưới &aacute;nh s&aacute;ng mặt trời Galaxy S2', '47bb68e8cc.jpg'),
(17, 'iPhone 12 64GB', 5, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A14 Bionic</p>\r\n<p>RAM 4 GB, ROM 64 GB</p>\r\n<p>Camera sau: 2 camera 12 MP</p>\r\n<p>Camera trước: 12 MP</p>\r\n<p>Pin 2815 mAh, Sạc 20 W</p>', 2000000, 81, '<p><span>Apple đ&atilde; trang bị con chip mới nhất của h&atilde;ng (t&iacute;nh đến 11/2020) cho iPhone 12 đ&oacute; l&agrave; A14 Bionic</span><span>, được sản xuất tr&ecirc;n tiến tr&igrave;nh 5 nm với hiệu suất ổn định hơn so với chip A13 được trang b', '5743fae88d.jpg'),
(18, 'iPhone 12 Pro Max 128GB', 5, '<p>M&agrave;n h&igrave;nh 6.7\", Chip Apple A14 Bionic</p>\r\n<p>RAM 6 GB, ROM 128 GB</p>\r\n<p>Camera sau: 3 camera 12 MP</p>\r\n<p>Camera trước: 12 MP</p>\r\n<p>Pin 3687 mAh, Sạc 20 W</p>', 3500000, 190, '<p>Theo chu kỳ cứ mỗi 3 năm th&igrave; iPhone lại thay đổi thiết kế v&agrave; 2020 l&agrave; năm đ&aacute;nh dấu cột mốc quan trong n&agrave;y, v&igrave; thế rất c&oacute; thể đ&acirc;y l&agrave; thời điểm c&aacute;c mẫu iphone 12&nbsp;sẽ c&oacute; một sự', 'd9d62f71b4.jpg'),
(19, 'iPhone 11 128GB', 5, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A13 Bionic</p>\r\n<p>RAM 4 GB, ROM 128 GB</p>\r\n<p>Camera sau: 2 camera 12 MP</p>\r\n<p>Camera trước: 12 MP</p>\r\n<p>Pin 3110 mAh, Sạc 18 W</p>', 4000000, 298, '<p>iPhone 11 cũng l&agrave; chiếc iphone đầu ti&ecirc;n hỗ trợ quay video si&ecirc;u chậm ở camera trước với t&ecirc;n gọi l&agrave;&nbsp;Slofies, bạn c&oacute; thể c&oacute; được cho m&igrave;nh những thước phim kh&aacute; th&uacute; vị với t&iacute;nh n', '024c461427.jpg'),
(20, 'iPhone Xr 128GB', 5, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A12 Bionic</p>\r\n<p>RAM 3 GB, ROM 128 GB</p>\r\n<p>Camera sau: 12 MP</p>\r\n<p>Camera trước: 7 MP</p>\r\n<p>Pin 2942 mAh, Sạc 15 W</p>', 3000000, 50, '<p><span>Thực tế khi chơi game tr&ecirc;n iPhone Xr, m&ocirc;i trường v&agrave; hiệu ứng trong game rất thật. Hơn nữa tr&ecirc;n chiếc iPhone c&ograve;n hỗ trợ&nbsp;thực tế tăng cường: Chơi game thực tế ảo với nhiều người c&ugrave;ng chơi, trải nghiệm c&u', '6b1e9ab379.jpg'),
(21, 'iPhone Xr 256GB', 5, '<p>M&agrave;n h&igrave;nh 8.1\", Chip Apple A17 Bionic</p>\r\n<p>RAM 3 GB, ROM 128 GB</p>\r\n<p>Camera sau: 12 MP</p>\r\n<p>Camera trước: 7 MP</p>\r\n<p>Pin 2942 mAh, Sạc 15 W</p>', 6000000, 50, '<p><span>Thực tế khi chơi game tr&ecirc;n iPhone Xr, m&ocirc;i trường v&agrave; hiệu ứng trong game rất thật. Hơn nữa tr&ecirc;n chiếc iPhone c&ograve;n hỗ trợ&nbsp;thực tế tăng cường: Chơi game thực tế ảo với nhiều người c&ugrave;ng chơi, trải nghiệm c&u', 'f5dda5f1ea.jpg'),
(22, 'iPhone 12 256GB', 5, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A14 Bionic</p>\r\n<p>RAM 4 GB, ROM 256 GB</p>\r\n<p>Camera sau: 2 camera 12 MP</p>\r\n<p>Camera trước: 12 MP</p>\r\n<p>Pin 2815 mAh, Sạc 20 W</p>', 14000000, 200, '<p><span>iPhone 12 sử dụng c&ocirc;ng nghệ k&iacute;nh cường lực mới, lần đầu được giới thiệu bởi Apple với t&ecirc;n gọi Ceramic Shield. Nhờ việc đưa c&aacute;c tinh thể sứ nano v&agrave;o cấu tr&uacute;c b&ecirc;n trong, qua đ&oacute; giảm thiểu t&aacut', '41026a3a5a.jpg'),
(23, 'iPhone 12 128GB', 5, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A14 Bionic</p>\r\n<p>RAM 4 GB, ROM 128 GB</p>\r\n<p>Camera sau: 2 camera 12 MP</p>\r\n<p>Camera trước: 12 MP</p>\r\n<p>Pin 2815 mAh, Sạc 20 W</p>', 3200000, 40, '<p>Apple cho biết A14 Bionic sẽ mạnh hơn gần 40% chipset, trong đ&oacute; khả năng xử l&yacute; đồ họa nhanh hơn 50% cũng như c&aacute;c t&aacute;c vụ học m&aacute;y mượt m&agrave; hơn 80% khi so s&aacute;nh với bộ xử l&yacute; tiền nhiệm.</p>\r\n<p>Apple c', '65c501498b.jpg'),
(24, 'iPhone 11 64GB', 5, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A13 Bionic</p>\r\n<p>RAM 4 GB, ROM 64 GB</p>\r\n<p>Camera sau: 2 camera 12 MP</p>\r\n<p>Camera trước: 12 MP</p>\r\n<p>Pin 3110 mAh, Sạc 18 W</p>', 13000000, 55, '<p><span>Đ&acirc;y l&agrave; một điều được xem l&agrave; bước ngoặt bởi những chiếc smartphone</span><span>&nbsp;Android c&oacute; nhiều camera hiện nay sẽ thường bị sai lệch về m&agrave;u sắc khi chuyển đổi qua lại giữa c&aacute;c ống k&iacute;nh g&acirc', '2a6e910310.jpg'),
(25, 'iPhone XR 64GB', 5, '<p>M&agrave;n h&igrave;nh 6.1\", Chip Apple A12 Bionic</p>\r\n<p>RAM 3 GB, ROM 64 GB</p>\r\n<p>Camera sau: 12 MP</p>\r\n<p>Camera trước: 7 MP</p>\r\n<p>Pin 2942 mAh, Sạc 15 W</p>', 1000000, 120, '<p><span>Thực tế khi chơi game tr&ecirc;n iPhone Xr, m&ocirc;i trường v&agrave; hiệu ứng trong game rất thật. Hơn nữa tr&ecirc;n chiếc iPhone n&agrave;y c&ograve;n hỗ trợ&nbsp;thực tế tăng cường: Chơi game thực tế ảo với nhiều người c&ugrave;ng chơi, trải', '69e5c4494d.jpg'),
(26, 'OPPO A93', 4, '<p>M&agrave;n h&igrave;nh 6.43\", Chip MediaTek Helio P95</p>\r\n<p>RAM 8 GB, ROM 128 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</p>', 18990000, 100, '<p><span>OPPO A93 được trang bị chipset MediaTek Helio P95 tốc độ CPU đạt 2.2 GHz với sức mạnh như thế n&agrave;y th&igrave; A93 sẽ kh&ocirc;ng l&agrave;m bạn thất vọng khi c&oacute; thể hoạt động tốt với nhiều ứng dụng nặng hay thao t&aacute;c cuộn trang', '776c87c44f.jpg'),
(27, 'OPPO Reno5', 4, '<p>M&agrave;n h&igrave;nh 6.43\", Chip Snapdragon 720G</p>\r\n<p>RAM 8 GB, ROM 128 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 64 MP &amp; Phụ 8 MP, 2 MP, 2 MP</p>', 2000000, 190, '<p>C&oacute; thể n&oacute;i OPPO Reno5 l&agrave; mẫu điện thoại ph&ocirc; diễn được đỉnh cao thiết kế v&agrave; c&ocirc;ng nghệ chế t&aacute;c của OPPO&nbsp;khi bề mặt lưng được phủ lớp Reno Glow với ng&agrave;n tinh thể ph&aacute;t s&aacute;ng si&ecirc;u', 'af33235731.jpg'),
(28, 'OPPO Find X3 Pro 5G', 4, '<p>Tặng Oppo Watch 41mm + Trả g&oacute;p 0% + Bảo h&agrave;nh to&agrave;n cầu.&nbsp;</p>\r\n<div class=\"utility\">\r\n<p>M&agrave;n h&igrave;nh 6.7\", Chip Snapdragon 888</p>\r\n<p>RAM 12 GB, ROM 256 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 50 MP &am', 3000000, 200, '<p>OPPO được trang bị chipset MediaTek Helio P95 tốc độ CPU đạt 2.2 GHz với sức mạnh như thế n&agrave;y th&igrave; A93 sẽ kh&ocirc;ng l&agrave;m bạn thất vọng khi c&oacute; thể hoạt động tốt với nhiều ứng dụng nặng hay thao t&aacute;c cuộn trang đều diễn ', '7ec8dec78f.jpg'),
(31, 'OPPO A94', 4, '<p>M&agrave;n h&igrave;nh 6.43\", Chip MediaTek Helio P95</p>\r\n<p>RAM 8 GB, ROM 128 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</p>\r\n<p>Camera trước: 32 MP</p>\r\n<p>Pin 4310 mAh, Sạc 30 W</p>', 18990000, 100, '<p><span>Nếu l&agrave; một người theo d&otilde;i thường xuy&ecirc;n sản phẩm của OPPO</span><span>, c&oacute; thể bạn sẽ nhận thấy OPPO A94 sở hữu thiết kế giống R</span>eno5<span>&nbsp;đến 99% từ thiết kế cho đến th&ocirc;ng số b&ecirc;n trong, m&aacute;', '5e6662f7c1.jpg'),
(32, 'OPPO Reno4 Pro', 4, '<p>M&agrave;n h&igrave;nh 6.4\", Chip Snapdragon 720G</p>\r\n<p>RAM 8 GB, ROM 128 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</p>\r\n<p>Camera trước: Ch&iacute;nh 32 MP &amp; Phụ cảm biến th&ocirc;ng minh A.I</p>\r\n<p>Pin 4015 mAh, Sạc ', 2000000, 200, '<p><span>Tiếp đến là m&agrave;n h&igrave;nh hyperbol kích thước 6.4 inch c&oacute; phần viền benzel được l&agrave;m si&ecirc;u mỏng, đ&ocirc;̣ ph&acirc;n giải Full HD+ (1080 x 2400 Pixels) tr&ecirc;n n&ecirc;̀n màu AMOLED mang đến chất lượng h&igrav', 'bc72e69e0e.jpg'),
(33, 'OPPO Reno5 Marvel', 4, '<p>M&agrave;n h&igrave;nh 6.43\", Chip Snapdragon 720G</p>\r\n<p>RAM 8 GB, ROM 128 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 64 MP &amp; Phụ 8 MP, 2 MP, 2 MP</p>\r\n<p>Camera trước: 44 MP</p>\r\n<p>Pin 4310 mAh, Sạc 65 W</p>', 12990000, 200, '<p><span>Nếu l&agrave; một người theo d&otilde;i thường xuy&ecirc;n sản phẩm của OPPO</span><span>, c&oacute; thể bạn sẽ nhận thấy OPPO A94 sở hữu thiết kế giống Reno</span><span>&nbsp;đến 99% từ thiết kế cho đến th&ocirc;ng số b&ecirc;n trong, m&aacute;y', '650c51e273.jpg'),
(34, 'OPPO A74 5G', 4, '<p>M&agrave;n h&igrave;nh 6.5\", Chip Snapdragon 480 8 nh&acirc;n 5G</p>\r\n<p>RAM 6 GB, ROM 128 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</p>\r\n<p>Camera trước: 16 MP</p>\r\n<p>Pin 5000 mAh, Sạc 18 W</p>', 19990000, 100, '<p>OPPO A74 5G c&oacute; thiết kế đặc trưng thường thấy ở c&aacute;c mẫu điện thoại OPPO được ra mắt gần đ&acirc;y, dải s&aacute;ng phản chiếu đẹp mắt tạo điểm nhấn ở mặt lưng, c&aacute;c đường n&eacute;t vuốt mỏng dần về cạnh viền, mang đến một chiếc điệ', '7002384320.jpg'),
(35, 'OPPO A15s', 4, '<p>M&agrave;n h&igrave;nh 6.52\", Chip MediaTek Helio P35</p>\r\n<p>RAM 4 GB, ROM 64 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 13 MP &amp; Phụ 2 MP, 2 MP</p>\r\n<p>Camera trước: 8 MP</p>\r\n<p>Pin 4230 mAh, Sạc 10 W</p>', 10304320, 100, '<p><span>Nh&igrave;n chung, thi&ecirc;́t k&ecirc;́ của OPPO A15s v&acirc;̃n mang đến cho người d&ugrave;ng cảm gi&aacute;c mạnh mẽ, cá tính nhưng cũng kh&ocirc;ng k&eacute;m phần sang trọng, mỏng chỉ 7.9 mm với mặt k&iacute;nh cường lực</span><span', '0daf404ced.jpg'),
(36, 'Nokia 5.4', 7, '<p>M&agrave;n h&igrave;nh 6.39\", Chip Snapdragon 662</p>\r\n<p>RAM 4 GB, ROM 128 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 48 MP &amp; Phụ 5 MP, 2 MP, 2 MP</p>\r\n<p>Camera trước: 16 MP</p>\r\n<p>Pin 10 W</p>', 3290000, 100, '<p><span>Mặc dù là m&ocirc;̣t chi&ecirc;́c smartphone</span><span>&nbsp;được sản xu&acirc;́t trong ph&acirc;n kh&uacute;c gi&aacute; tầm trung nhưng Nokia 5.4 kh&ocirc;ng h&ecirc;̀ l&ocirc;̃i thời với lối thi&ecirc;́t k&ecirc;́ nguy&ecirc;n kh&ocirc', '0f138ebdb9.jpg'),
(37, 'Nokia 3.4', 7, '<p>M&agrave;n h&igrave;nh 6.39\", Chip Snapdragon 460</p>\r\n<p>RAM 4 GB, ROM 64 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 13 MP &amp; Phụ 5 MP, 2 MP</p>\r\n<p>Camera trước: 8 MP</p>\r\n<p>Pin 4000 mAh, Sạc 10 W</p>', 2590000, 100, 'Nokia 3.4 sở hữu màn hình IPS LCD kích thước 6.39 inch độ phân giải HD+, màn hình có thiết kế theo kiểu đục lỗ đang là xu hướng, với một màn hình lớn thì bạn có thể tận dụng được tối đa khả năng hiển thị để phục vụ các nhu cầu như vui chơi, giải trí.', '10ea9b406a.jpg'),
(38, 'Nokia 2.4', 7, '<p>M&agrave;n h&igrave;nh 6.5\", Chip MediaTek MT6762 (Helio P22)</p>\r\n<p>RAM 2 GB, ROM 32 GB</p>\r\n<p>Camera sau: Ch&iacute;nh 13 MP &amp; Phụ 2 MP</p>\r\n<p>Camera trước: 5 MP</p>\r\n<p>Pin 4500 mAh, Sạc 5 W</p>', 2290000, 100, '<p><span>Nokia 2.4 mang ng&ocirc;n ngữ thiết kế ho&agrave;n to&agrave;n kh&aacute;c với c&aacute;c thế hệ Nokia</span><span>&nbsp;hay Nokia 2.2</span><span>&nbsp;khi được trang bị mặt lưng 3D họa tiết phay xước độc đ&aacute;o kết hợp c&ugrave;ng hiệu ứng ', '7b9a5cea11.jpg'),
(39, 'Nokia 8000 4G', 7, '<p>M&agrave;n h&igrave;nh 2.8\", 16 triệu m&agrave;u</p>\r\n<p>Camera sau 2 MP</p>\r\n<p>2 Nano SIM, Hỗ trợ 4G</p>\r\n<p>Thẻ nhớ MicroSD, hỗ trợ tối đa 32 GB</p>\r\n<p>Pin 1500 mAh</p>', 1990000, 200, '<p><span>Chiếc điện thoại c&oacute; khung v&agrave; mặt lưng được l&agrave;m từ nhựa với lớp vỏ s&aacute;ng b&oacute;ng như thủy tinh cao cấp v&agrave; c&aacute;c m&agrave;u sắc lấy cảm hứng từ đ&aacute; qu&yacute;, Nokia 8000 4G được thiết kế để tỏa s&aa', '5680009ece.jpg'),
(40, 'Nokia C2', 7, '<p>M&agrave;n h&igrave;nh 5.7\", Chip Spreadtrum SC9832E</p>\r\n<p>RAM 1 GB, ROM 16 GB</p>\r\n<p>Camera sau: 5 MP</p>\r\n<p>Camera trước: 5 MP</p>\r\n<p>Pin 2800 mAh, Sạc 5 W</p>', 1690000, 188, '<p><span>Điểm n&acirc;ng cấp đầu ti&ecirc;n của Nokia C2 so với thế hệ trước Nokia C1</span><span>&nbsp;đ&oacute; l&agrave; k&iacute;ch thước m&agrave;n h&igrave;nh, nay đ&atilde; được mở rộng l&ecirc;n đến 5.7 inch. M&agrave;n h&igrave;nh lớn sẽ gi&uacut', '5fc03b8cea.jpg'),
(41, 'Nokia 6300 4G', 7, '<p>M&agrave;n h&igrave;nh 2.4\", 16 triệu m&agrave;u</p>\r\n<p>Camera sau VGA (480 x 640 pixels)</p>\r\n<p>2 Nano SIM, Hỗ trợ 4G</p>\r\n<p>Thẻ nhớ MicroSD, hỗ trợ tối đa 32 GB</p>\r\n<p>Pin 1500 mAh</p>', 1290000, 16, '<p><span>Nokia 6300 4G vẫn mang d&aacute;ng dấp của Nokia 6300 năm n&agrave;o, ch&iacute;nh l&agrave; thiết kế cổ điển với những cải tiến mới hợp xu hướng người d&ugrave;ng. Tổng thể của chiếc m&aacute;y nhỏ gọn cho việc cầm nằm chắc chắn v&agrave; mang đ', '828bb7f766.jpg'),
(42, 'Nokia 5310 (2020)', 7, '<p>M&agrave;n h&igrave;nh 2.4\"</p>\r\n<p>Camera sau VGA (480 x 640 pixels)</p>\r\n<p>2 SIM thường, Hỗ trợ 2G</p>\r\n<p>Thẻ nhớ MicroSD, hỗ trợ tối đa 32 GB</p>\r\n<p>Pin 1200 mAh</p>', 1200000, 80, '<p><span>Được thiết kế tập trung v&agrave;o khả năng nghe nhạc, Nokia 5310 (2020) hỗ trợ thẻ nhớ gắn ngo&agrave;i l&ecirc;n đến 32 GB, gi&uacute;p thiết bị trở th&agrave;nh m&aacute;y nghe nhạc MP3 truyền thống, lưu trữ được thật nhiều b&agrave;i h&aacute', 'f05fe45ddf.jpg'),
(43, 'Nokia 210', 7, '<p>M&agrave;n h&igrave;nh 2.4\", 65.536 m&agrave;u</p>\r\n<p>Camera sau 0.3 MP</p>\r\n<p>2 SIM thường, Hỗ trợ 2G</p>\r\n<p>Thẻ nhớ MicroSD, hỗ trợ tối đa 32 GB</p>\r\n<p>Pin 1020 mAh</p>', 2200000, 2, '<p><span>Tuy nhi&ecirc;n th&igrave; Nokia 210 chạy tr&ecirc;n nền tảng S30 c&oacute; hỗ trợ tr&igrave;nh duyệt Opera Mini, ứng dụng Facebook v&agrave; tr&ograve; chơi rắn huyền thoại được c&agrave;i đặt sẵn tr&ecirc;n m&aacute;y gi&uacute;p bạn c&oacute; ', '6a6f5b31d2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(50) NOT NULL,
  `TenCongTy` varchar(50) NOT NULL,
  `SoDienThoai` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PassWord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `Email`, `PassWord`) VALUES
(4, 'Lâm Phi Long', 'Đại học Cần Thơ', '0799667992', 'test', 'c12e01f2a13ff5587e1e9e4aedb8242d'),
(5, 'Nguyễn Văn A', 'Đại học Cần Thơ', '01219667992', 'longadmin2', 'c12e01f2a13ff5587e1e9e4aedb8242d'),
(13, 'Nguyễn Văn B', 'Đại học Cần Thơ', '01219667992', 'test@gmail.com', 'c12e01f2a13ff5587e1e9e4aedb8242d');

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(5) NOT NULL,
  `TenLoaiHang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(4, 'OPPO'),
(5, 'IPHONE'),
(6, 'SAMSUNG'),
(7, 'NOKIA');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` char(5) NOT NULL,
  `HoTenNV` varchar(50) NOT NULL,
  `ChucVu` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SoDienThoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'long', 'long@gmail.com', 'longadmin', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `chitietdathang_ibfk_2` (`MSHH`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`);

--
-- Indexes for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `hanghoa_ibfk_1` (`MaLoaiHang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Indexes for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
