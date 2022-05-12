-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 06:59 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct226`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `madonhang` int(10) NOT NULL,
  `dathang` datetime NOT NULL,
  `chapnhan` datetime DEFAULT NULL,
  `lienhe` datetime DEFAULT NULL,
  `huy` datetime DEFAULT NULL,
  `hoantat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`madonhang`, `dathang`, `chapnhan`, `lienhe`, `huy`, `hoantat`) VALUES
(1, '2022-04-22 23:24:39', NULL, NULL, NULL, NULL),
(2, '2022-04-23 22:49:11', NULL, NULL, NULL, NULL),
(3, '2022-05-11 19:22:48', NULL, NULL, '2022-05-11 19:22:56', NULL),
(4, '2022-05-11 23:48:57', '2022-05-12 11:18:15', '2022-05-12 11:18:20', NULL, '2022-05-12 11:18:25'),
(5, '2022-05-12 11:07:46', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chitietgyvkn`
--

CREATE TABLE `chitietgyvkn` (
  `ma` int(10) NOT NULL,
  `dagui` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `xuli` datetime DEFAULT NULL,
  `ketqua` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietgyvkn`
--

INSERT INTO `chitietgyvkn` (`ma`, `dagui`, `xuli`, `ketqua`) VALUES
(1, '2022-05-07 08:41:41', '2022-05-07 15:41:41', 'Đã xử lí rồi'),
(3, '2022-05-09 14:18:51', '2022-05-07 15:41:41', 'Đã xử lí'),
(4, '2022-05-10 16:31:04', NULL, NULL),
(5, '2022-05-10 16:32:00', NULL, NULL),
(6, '2022-05-10 17:13:05', NULL, NULL),
(7, '2022-05-10 17:20:16', NULL, NULL),
(8, '2022-05-10 17:21:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `madonhang` int(10) NOT NULL,
  `manguoimua` char(30) NOT NULL,
  `manguoiban` char(30) NOT NULL,
  `matailieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`madonhang`, `manguoimua`, `manguoiban`, `matailieu`) VALUES
(1, 'nghia', 'luan', 1),
(2, 'luan', 'nghia', 9),
(3, 'luan', 'nghia', 10),
(4, 'luan', 'nghia', 8);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `magiohang` int(10) NOT NULL,
  `username` char(30) NOT NULL,
  `matailieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`magiohang`, `username`, `matailieu`) VALUES
(13, 'thai', 2),
(14, 'luan', 9),
(15, 'luan', 10);

-- --------------------------------------------------------

--
-- Table structure for table `gopyvakhieunai`
--

CREATE TABLE `gopyvakhieunai` (
  `ma` int(10) NOT NULL,
  `username` char(30) NOT NULL,
  `loai` char(10) NOT NULL,
  `manguoidung` char(30) DEFAULT NULL,
  `matailieu` int(10) DEFAULT NULL,
  `mota` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gopyvakhieunai`
--

INSERT INTO `gopyvakhieunai` (`ma`, `username`, `loai`, `manguoidung`, `matailieu`, `mota`) VALUES
(1, 'nam', 'tctl', NULL, 1, 'Tài liệu không như mô tả'),
(2, 'nghia', 'tcnd', 'nam', NULL, 'Đăng sai'),
(3, 'luan', 'tctl', NULL, 12, 'Mô tảad'),
(4, 'luan', 'gy', NULL, NULL, 'Giao diện xấu'),
(5, 'luan', 'kn', NULL, NULL, 'khiếu nại\r\n'),
(6, 'luan', 'gy', NULL, NULL, 'góp ý'),
(7, 'luan', 'gy', NULL, NULL, 'góp ý'),
(8, 'luan', 'gy', NULL, NULL, 'góp ý mới');

-- --------------------------------------------------------

--
-- Table structure for table `hinhtailieu`
--

CREATE TABLE `hinhtailieu` (
  `mahinh` int(10) NOT NULL,
  `tenhinh` char(10) NOT NULL,
  `matailieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhtailieu`
--

INSERT INTO `hinhtailieu` (`mahinh`, `tenhinh`, `matailieu`) VALUES
(1, '1.jpg', 1),
(2, '2.jpg', 2),
(3, '3.jpg', 3),
(4, '4.jpg', 4),
(5, '5.jpg', 5),
(6, '6.jpg', 7),
(7, '7.jpg', 8),
(8, '8.jpg', 9),
(9, '9.jpg', 10),
(13, '13.jpg', 2),
(14, '14.jpg', 2),
(15, '15.jpg', 6),
(16, '16.jpg', 13),
(17, '17.jpg', 13),
(18, '18.jpg', 14),
(19, '19.jpg', 14),
(20, '20.jpg', 14),
(21, '21.jpg', 15),
(22, '22.jpg', 15),
(23, '23.jpg', 15),
(25, '25.jpg', 18),
(26, '26.jpg', 19),
(27, '27.jpg', 19),
(28, '28.jpg', 20),
(29, '29.jpg', 20),
(30, '30.jpg', 20),
(31, '31.jpg', 21),
(32, '32.jpg', 21),
(33, '33.jpg', 21);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `makhoa` char(10) NOT NULL,
  `tenkhoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`makhoa`, `tenkhoa`) VALUES
('CN', 'Công nghệ'),
('CNTTTT', 'Công nghệ thông tin và Truyền thông'),
('DBDT', 'Dự bị dân tộc'),
('K', 'Khác'),
('KHCT', 'Khoa học Chính trị'),
('KHTN', 'Khoa học Tự nhiên'),
('KHXHNV', 'Khoa học Xã hội và Nhân văn'),
('KT', 'Kinh Tế'),
('L', 'Luật'),
('MTTNTN', 'Môi trường và Tài nguyên thiên nhiên'),
('NN', 'Ngoại ngữ'),
('NNSHUD', 'Nông nghiệp và Sinh học ứng dụng'),
('PTNT', 'Phát triển nông thôn'),
('SP', 'Sư phạm'),
('TS', 'Thuỷ sản');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `username` char(30) NOT NULL,
  `facebook` char(30) DEFAULT NULL,
  `zalo` char(30) DEFAULT NULL,
  `gmail` char(30) NOT NULL,
  `phone` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`username`, `facebook`, `zalo`, `gmail`, `phone`) VALUES
('admin1', NULL, NULL, 'admin1@gmnail.com', NULL),
('luan', 'fb.com/luan', '0357119449', 'luan@gmail.com', '0378367310'),
('nam', 'fb.com/nam', '0123456789', 'nam@gmail.com', '0123456789'),
('nghia', 'fb.com/nghia', '0824244627', 'nghia@gmail.com', '0123456789'),
('thai', 'fb.com/thai', '033333333', 'thai@gmail.com', '033333333');

-- --------------------------------------------------------

--
-- Table structure for table `loaitailieu`
--

CREATE TABLE `loaitailieu` (
  `maloai` char(5) NOT NULL,
  `tenloai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaitailieu`
--

INSERT INTO `loaitailieu` (`maloai`, `tenloai`) VALUES
('BG', 'Bài giảng'),
('GT', 'Giáo trình'),
('GTTH', 'Giáo trình thực hành'),
('K', 'Khác'),
('TLTK', 'Tài liệu tham khảo');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `username` char(30) NOT NULL,
  `ho` varchar(10) NOT NULL,
  `ten` varchar(30) NOT NULL,
  `k` int(2) DEFAULT NULL,
  `makhoa` char(10) DEFAULT NULL,
  `diachi` varchar(50) DEFAULT NULL,
  `hinhdaidien` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`username`, `ho`, `ten`, `k`, `makhoa`, `diachi`, `hinhdaidien`) VALUES
('admin1', 'Nguyễn', 'Minh Luân', NULL, NULL, NULL, 'avatar.png'),
('luan', 'Nguyễn', 'Minh Luân', 44, 'CNTTTT', 'KTX B', 'dd960d42bb47da21af3b3b0c31684540.png'),
('nam', 'Ngô', 'Hoàng Nam', 44, 'CN', 'KTX A', '22c78aadb8d25a53ca407fae265a7154.png'),
('nghia', 'Trịnh', 'Hữu Nghĩa', 44, 'NNSHUD', 'KTX B', '9e87373408a6cd425ae9b19bf870d893.jpg'),
('thai', 'Trần', 'Hoàng Thái', 44, 'MTTNTN', 'KTX B', '1aafcfcd9efdd2e7ac43e80ce77bba79.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` char(30) NOT NULL,
  `password` char(50) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 2,
  `trangthai` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`username`, `password`, `role`, `trangthai`) VALUES
('admin1', 'c4ca4238a0b923820dcc509a6f75849b', 1, 0),
('luan', 'c4ca4238a0b923820dcc509a6f75849b', 2, 0),
('nam', 'c4ca4238a0b923820dcc509a6f75849b', 2, 0),
('nghia', 'c4ca4238a0b923820dcc509a6f75849b', 2, 0),
('root', 'c4ca4238a0b923820dcc509a6f75849b', 0, 0),
('thai', 'c4ca4238a0b923820dcc509a6f75849b', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tailieu`
--

CREATE TABLE `tailieu` (
  `matailieu` int(10) NOT NULL,
  `tentailieu` varchar(50) NOT NULL,
  `hocphan` char(5) NOT NULL,
  `makhoa` char(10) NOT NULL,
  `tacgia` varchar(50) NOT NULL,
  `sotrang` int(4) NOT NULL,
  `maloai` char(5) NOT NULL,
  `chatluong` int(3) NOT NULL,
  `gia` int(6) NOT NULL,
  `mota` varchar(50) NOT NULL,
  `username` char(30) NOT NULL,
  `matrangthai` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tailieu`
--

INSERT INTO `tailieu` (`matailieu`, `tentailieu`, `hocphan`, `makhoa`, `tacgia`, `sotrang`, `maloai`, `chatluong`, `gia`, `mota`, `username`, `matrangthai`) VALUES
(1, 'Bảo mật Website', 'CT223', 'CNTTTT', 'Trần Thị Tố Quyên', 101, 'BG', 100, 10000, 'Chưa sử dụng', 'luan', 'exchanging'),
(2, 'Lập trình cho thiết bị di động', 'CT225', 'CNTTTT', 'Đoàn Hoà Minh', 50, 'BG', 57, 1000, 'Tốt', 'luan', 'sharing'),
(3, 'Lập trình hướng đối tượng', 'CT100', 'CNTTTT', 'Trần Thị Tố Quyên', 100, 'BG', 98, 1000, 'Tốt', 'luan', 'sharing'),
(4, 'Quản trị hệ thống', 'CT111', 'CNTTTT', 'Ngô Bá Hùng', 100, 'GT', 100, 12000, 'Còn tốt', 'luan', 'sharing'),
(5, 'Lý thuyết đồ thị', 'CT123', 'CNTTTT', 'Đỗ Thanh Nghị', 200, 'GT', 50, 0, 'Xấu', 'luan', 'sharing'),
(6, 'Lập trình căn bản A', 'CT001', 'CNTTTT', 'Phạm Phương Lan', 200, 'GTTH', 99, 1000, 'Tốt', 'luan', 'sharing'),
(7, 'Giáo trình Mác Lê nin', 'ML001', 'KHCT', 'Không rõ', 300, 'GT', 90, 0, 'Rách', 'nghia', 'sharing'),
(8, 'Đại số tuyến tính', 'TN101', 'KHTN', 'Phạm Xuân Lộc', 50, 'BG', 50, 11000, 'Còn tốt', 'nghia', 'shared'),
(9, 'Hoá cơ bản', 'SH001', 'NNSHUD', 'Ngô Hữu Nghĩa', 123, 'K', 80, 0, 'Rách', 'nghia', 'sharing'),
(10, 'Công nghệ sinh học', 'SH002', 'NNSHUD', 'Ngô Hữu Nghĩa', 9, 'K', 9, 0, 'Xấu', 'nghia', 'lock'),
(11, 'Bảo vệ môi trường', 'MT001', 'MTTNTN', 'Ngô Hoàng Thái', 41, 'TLTK', 41, 0, 'Mới', 'thai', 'lock'),
(12, 'Bảo vệ môi trường', 'MT001', 'MTTNTN', 'Ngô Hoàng Thái', 60, 'TLTK', 60, 0, 'Mới', 'thai', 'lock'),
(13, 'Kĩ thuật xử lý nước thải', 'MT347', 'MTTNTN', 'Lê Hoàng Việt', 268, 'GT', 100, 600000, 'mới, hàng real', 'thai', 'sharing'),
(14, 'Anh văn chuyên ngành', 'MT157', 'MTTNTN', 'Nguyễn Xuân Hoàng', 156, 'GT', 87, 320000, 'hơi cũ, hàng real', 'thai', 'sharing'),
(15, 'Vi sinh công nghiệp', 'CS104', 'NNSHUD', 'TS. NGUYỄN VĂN THÀNH', 100, 'BG', 5, 99000, 'học đàng quàn môn này tui học 2 lần', 'nghia', 'sharing'),
(18, 'Toán rời rạc', 'CT123', 'KHTN', 'Ngô Hữu Nghĩa', 78, 'BG', 80, 10000, 'Xấu', 'nam', 'sharing'),
(19, 'Test', 'TEST', 'CN', 'tetet', 123, 'BG', 11, 1000, 'adad', 'nam', 'lock'),
(20, 'Thực tập xử lý nước cấp-nước thải', 'MT244', 'MTTNTN', 'Huỳnh Long Toản', 96, 'BG', 51, 150000, 'hơi cũ, dính hóa chất, hàng real', 'thai', 'sharing'),
(21, 'Thực tập xử lý nước cấp-nước thải', 'MT157', 'MTTNTN', 'Huỳnh Long Toản', 96, 'BG', 52, 150000, 'hơi cũ, dính hóa chất, hàng real', 'thai', 'lock');

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `username` char(30) NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `noidung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thongbao`
--

INSERT INTO `thongbao` (`username`, `thoigian`, `noidung`) VALUES
('nam', '2022-05-11 07:51:58', 'Bạn vừa bị cảnh cáo. Tổng số lần bị cảnh cáo: 1. Nếu bị cảnh cáo quá 3 lần tài khoản sẽ bị khoá!'),
('nam', '2022-05-11 09:15:21', 'Bạn vừa được gỡ cảnh cáo. Tổng số lần bị cảnh cáo: 0. Nếu bị cảnh cáo quá 3 lần tài khoản sẽ bị khoá');

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `matrangthai` char(10) NOT NULL,
  `tentrangthai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`matrangthai`, `tentrangthai`) VALUES
('exchanging', 'Đang trao đổi'),
('lock', 'Tạm khoá'),
('shared', 'Chia sẻ thành công'),
('sharing', 'Đang chia sẻ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD UNIQUE KEY `madonhang` (`madonhang`);

--
-- Indexes for table `chitietgyvkn`
--
ALTER TABLE `chitietgyvkn`
  ADD UNIQUE KEY `ma` (`ma`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madonhang`),
  ADD KEY `manguoiban` (`manguoiban`),
  ADD KEY `manguoimua` (`manguoimua`),
  ADD KEY `matailieu` (`matailieu`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`magiohang`),
  ADD KEY `matailieu` (`matailieu`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `gopyvakhieunai`
--
ALTER TABLE `gopyvakhieunai`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `username` (`username`),
  ADD KEY `matailieu` (`matailieu`),
  ADD KEY `gopyvakhieunai_ibfk_1` (`manguoidung`);

--
-- Indexes for table `hinhtailieu`
--
ALTER TABLE `hinhtailieu`
  ADD PRIMARY KEY (`mahinh`),
  ADD KEY `hinhtailieu_ibfk_1` (`matailieu`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`makhoa`),
  ADD UNIQUE KEY `tenkhoa` (`tenkhoa`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `loaitailieu`
--
ALTER TABLE `loaitailieu`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`username`),
  ADD KEY `nguoidung_ibfk_1` (`makhoa`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tailieu`
--
ALTER TABLE `tailieu`
  ADD PRIMARY KEY (`matailieu`),
  ADD KEY `makhoa` (`makhoa`),
  ADD KEY `maloai` (`maloai`),
  ADD KEY `username` (`username`),
  ADD KEY `matrangthai` (`matrangthai`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD KEY `username` (`username`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`matrangthai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madonhang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `magiohang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gopyvakhieunai`
--
ALTER TABLE `gopyvakhieunai`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hinhtailieu`
--
ALTER TABLE `hinhtailieu`
  MODIFY `mahinh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tailieu`
--
ALTER TABLE `tailieu`
  MODIFY `matailieu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietgyvkn`
--
ALTER TABLE `chitietgyvkn`
  ADD CONSTRAINT `chitietgyvkn_ibfk_1` FOREIGN KEY (`ma`) REFERENCES `gopyvakhieunai` (`ma`) ON DELETE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`manguoiban`) REFERENCES `nguoidung` (`username`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`manguoimua`) REFERENCES `nguoidung` (`username`),
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`matailieu`) REFERENCES `tailieu` (`matailieu`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`matailieu`) REFERENCES `tailieu` (`matailieu`),
  ADD CONSTRAINT `giohang_ibfk_3` FOREIGN KEY (`username`) REFERENCES `nguoidung` (`username`);

--
-- Constraints for table `gopyvakhieunai`
--
ALTER TABLE `gopyvakhieunai`
  ADD CONSTRAINT `gopyvakhieunai_ibfk_1` FOREIGN KEY (`manguoidung`) REFERENCES `nguoidung` (`username`),
  ADD CONSTRAINT `gopyvakhieunai_ibfk_2` FOREIGN KEY (`username`) REFERENCES `nguoidung` (`username`),
  ADD CONSTRAINT `gopyvakhieunai_ibfk_3` FOREIGN KEY (`matailieu`) REFERENCES `tailieu` (`matailieu`);

--
-- Constraints for table `hinhtailieu`
--
ALTER TABLE `hinhtailieu`
  ADD CONSTRAINT `hinhtailieu_ibfk_1` FOREIGN KEY (`matailieu`) REFERENCES `tailieu` (`matailieu`) ON DELETE CASCADE;

--
-- Constraints for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD CONSTRAINT `lienhe_ibfk_1` FOREIGN KEY (`username`) REFERENCES `nguoidung` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`makhoa`) REFERENCES `khoa` (`makhoa`);

--
-- Constraints for table `tailieu`
--
ALTER TABLE `tailieu`
  ADD CONSTRAINT `tailieu_ibfk_1` FOREIGN KEY (`makhoa`) REFERENCES `khoa` (`makhoa`),
  ADD CONSTRAINT `tailieu_ibfk_2` FOREIGN KEY (`maloai`) REFERENCES `loaitailieu` (`maloai`),
  ADD CONSTRAINT `tailieu_ibfk_3` FOREIGN KEY (`username`) REFERENCES `nguoidung` (`username`),
  ADD CONSTRAINT `tailieu_ibfk_4` FOREIGN KEY (`matrangthai`) REFERENCES `trangthai` (`matrangthai`);

--
-- Constraints for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_1` FOREIGN KEY (`username`) REFERENCES `taikhoan` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
