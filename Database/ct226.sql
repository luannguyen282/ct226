-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 06:30 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `magiohang` int(10) NOT NULL,
  `username` char(30) NOT NULL,
  `matailieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hinhtailieu`
--

CREATE TABLE `hinhtailieu` (
  `mahinh` int(10) NOT NULL,
  `tenhinh` char(10) NOT NULL,
  `matailieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` char(30) NOT NULL,
  `password` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `time`
-- (See below for the actual view)
--
CREATE TABLE `time` (
`CURRENT_TIMESTAMP` datetime
);

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

-- --------------------------------------------------------

--
-- Structure for view `time`
--
DROP TABLE IF EXISTS `time`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `time`  AS SELECT current_timestamp() AS `CURRENT_TIMESTAMP` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD UNIQUE KEY `madonhang` (`madonhang`);

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
  MODIFY `madonhang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `magiohang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hinhtailieu`
--
ALTER TABLE `hinhtailieu`
  MODIFY `mahinh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tailieu`
--
ALTER TABLE `tailieu`
  MODIFY `matailieu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
