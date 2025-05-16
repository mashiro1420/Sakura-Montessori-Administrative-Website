-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2025 at 05:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_parttime`
--
CREATE DATABASE IF NOT EXISTS `ql_parttime` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ql_parttime`;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ca`
--

CREATE TABLE `dm_ca` (
  `id` int(11) NOT NULL,
  `ten_ca` varchar(500) NOT NULL,
  `tu_gio` time NOT NULL,
  `den_gio` time NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_ca`
--

INSERT INTO `dm_ca` (`id`, `ten_ca`, `tu_gio`, `den_gio`, `trang_thai`) VALUES
(1, 'Sáng', '08:00:00', '12:00:00', 1),
(2, 'Chiều', '13:00:00', '17:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_chucvu`
--

CREATE TABLE `dm_chucvu` (
  `id` int(11) NOT NULL,
  `ten_chuc_vu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_chucvu`
--

INSERT INTO `dm_chucvu` (`id`, `ten_chuc_vu`) VALUES
(4, 'Admin'),
(1, 'Giám đốc'),
(3, 'Nhân viên'),
(2, 'Quản lý');

-- --------------------------------------------------------

--
-- Table structure for table `dm_danhgia`
--

CREATE TABLE `dm_danhgia` (
  `id` int(11) NOT NULL,
  `ten_danh_gia` varchar(500) NOT NULL,
  `gia_tri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_danhgia`
--

INSERT INTO `dm_danhgia` (`id`, `ten_danh_gia`, `gia_tri`) VALUES
(1, 'Xuất sắc', 5),
(2, 'Tốt', 4),
(3, 'Bình thường', 3),
(4, 'Kém', 2),
(5, 'Tệ', 1),
(6, 'Không hoàn thành', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dm_loaicongviec`
--

CREATE TABLE `dm_loaicongviec` (
  `id` int(11) NOT NULL,
  `ten_loai_cong_viec` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_loaicongviec`
--

INSERT INTO `dm_loaicongviec` (`id`, `ten_loai_cong_viec`) VALUES
(1, 'Liên hệ khách hàng'),
(3, 'Nhập tài liệu'),
(2, 'Đăng bài');

-- --------------------------------------------------------

--
-- Table structure for table `dm_mucthuong`
--

CREATE TABLE `dm_mucthuong` (
  `id` int(11) NOT NULL,
  `ten_muc_thuong` varchar(500) NOT NULL,
  `tu_kpi` int(11) NOT NULL,
  `den_kpi` int(11) DEFAULT NULL,
  `tien_thuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_mucthuong`
--

INSERT INTO `dm_mucthuong` (`id`, `ten_muc_thuong`, `tu_kpi`, `den_kpi`, `tien_thuong`) VALUES
(1, 'Mức 1', 100, 100, 500000),
(2, 'Mức 2', 101, 105, 800000),
(3, 'Mức 3', 106, 110, 1000000),
(4, 'Mức 4', 111, 120, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `dm_ngayle`
--

CREATE TABLE `dm_ngayle` (
  `id` int(11) NOT NULL,
  `ten_ngay_le` varchar(500) NOT NULL,
  `tu_ngay` date NOT NULL,
  `den_ngay` date NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_quyen`
--

CREATE TABLE `dm_quyen` (
  `id` int(11) NOT NULL,
  `ten_quyen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_quyen`
--

INSERT INTO `dm_quyen` (`id`, `ten_quyen`) VALUES
(1, 'Admin'),
(3, 'Nhân viên'),
(2, 'Quản lý');

-- --------------------------------------------------------

--
-- Table structure for table `dm_trangthaicongviec`
--

CREATE TABLE `dm_trangthaicongviec` (
  `id` int(11) NOT NULL,
  `ten_trang_thai` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_trangthaicongviec`
--

INSERT INTO `dm_trangthaicongviec` (`id`, `ten_trang_thai`) VALUES
(6, 'Chờ xác nhận'),
(5, 'Hủy'),
(4, 'Không hoàn thành'),
(2, 'Đã giao'),
(3, 'Đã hoàn thành');

-- --------------------------------------------------------

--
-- Table structure for table `dm_trangthaihopdong`
--

CREATE TABLE `dm_trangthaihopdong` (
  `id` int(11) NOT NULL,
  `ten_trang_thai` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_trangthaihopdong`
--

INSERT INTO `dm_trangthaihopdong` (`id`, `ten_trang_thai`) VALUES
(4, 'Chưa có hiệu lực'),
(3, 'Hết hiệu lực'),
(1, 'Vô thời hạn'),
(2, 'Đang có hiệu lực');

-- --------------------------------------------------------

--
-- Table structure for table `ql_chamcong`
--

CREATE TABLE `ql_chamcong` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `thoi_gian` time NOT NULL,
  `xac_nhan` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_danhgiahieusuat`
--

CREATE TABLE `ql_danhgiahieusuat` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` int(11) NOT NULL,
  `id_thang` int(11) NOT NULL,
  `kpi` float DEFAULT NULL,
  `id_muc_thuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_dauviec`
--

CREATE TABLE `ql_dauviec` (
  `id` int(11) NOT NULL,
  `id_loai_viec` int(11) NOT NULL,
  `noi_dung` text NOT NULL,
  `id_trang_thai` int(11) NOT NULL DEFAULT 2,
  `thoi_gian_tao` datetime NOT NULL DEFAULT current_timestamp(),
  `thoi_gian_giao` date NOT NULL,
  `id_nhan_vien` int(11) DEFAULT NULL,
  `id_danh_gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_hopdong`
--

CREATE TABLE `ql_hopdong` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` int(11) NOT NULL,
  `tu_ngay` date DEFAULT NULL,
  `den_ngay` date DEFAULT NULL,
  `id_trang_thai` int(11) NOT NULL DEFAULT 4,
  `link_hop_dong` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_hopdong`
--

INSERT INTO `ql_hopdong` (`id`, `id_nhan_vien`, `tu_ngay`, `den_ngay`, `id_trang_thai`, `link_hop_dong`) VALUES
(1, 2, '2025-03-31', '2025-04-17', 2, 'bb2b86db7ba5996eb06a6148d60c7389.docx'),
(3, 2, '2025-04-25', '2025-05-03', 4, '93e6a5235faf5c5261e0028b586d6860.docx');

-- --------------------------------------------------------

--
-- Table structure for table `ql_nhanvien`
--

CREATE TABLE `ql_nhanvien` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `ca_mac_dinh` int(11) DEFAULT NULL,
  `gioi_tinh` varchar(32) NOT NULL,
  `noi_sinh` varchar(255) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `ngay_nghi_viec` date DEFAULT NULL,
  `ngay_vao_lam` date DEFAULT NULL,
  `id_chuc_vu` int(11) NOT NULL,
  `cmnd` bigint(15) NOT NULL,
  `ngay_cap` date NOT NULL,
  `noi_cap` varchar(255) NOT NULL,
  `quoc_tich` varchar(255) NOT NULL,
  `dan_toc` varchar(255) NOT NULL,
  `ton_giao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_nhanvien`
--

INSERT INTO `ql_nhanvien` (`id`, `ho_ten`, `ca_mac_dinh`, `gioi_tinh`, `noi_sinh`, `ngay_sinh`, `ngay_nghi_viec`, `ngay_vao_lam`, `id_chuc_vu`, `cmnd`, `ngay_cap`, `noi_cap`, `quoc_tich`, `dan_toc`, `ton_giao`) VALUES
(1, 'Admin', NULL, 'Nam', 'HP', '2025-01-01', NULL, NULL, 4, 1, '2025-04-01', 'HP', 'VN', 'Kinh', 'Khong'),
(2, 'Nguyễn Văn A', 2, 'Nam', 'Hải Phòng', '2025-03-31', NULL, '2025-04-01', 2, 42323, '2025-04-10', 'Hải Phòng', 'Việt Nam', 'Kinh', 'hồi giáo');

-- --------------------------------------------------------

--
-- Table structure for table `ql_phanca`
--

CREATE TABLE `ql_phanca` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` int(11) NOT NULL,
  `id_ca` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `id_ca2` int(11) DEFAULT NULL,
  `ngay_phan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_taikhoan`
--

CREATE TABLE `ql_taikhoan` (
  `tai_khoan` varchar(11) NOT NULL,
  `mat_khau` varchar(255) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `id_nhan_vien` int(11) NOT NULL,
  `id_quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_taikhoan`
--

INSERT INTO `ql_taikhoan` (`tai_khoan`, `mat_khau`, `id_nhan_vien`, `id_quyen`) VALUES
('00002', 'e10adc3949ba59abbe56e057f20f883e', 2, 3),
('99999', 'e10adc3949ba59abbe56e057f20f883e', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ql_tinhluong`
--

CREATE TABLE `ql_tinhluong` (
  `id` int(11) NOT NULL,
  `so_cham_cong` int(11) NOT NULL,
  `id_hieu_suat` int(11) NOT NULL,
  `tien_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tg_thang`
--

CREATE TABLE `tg_thang` (
  `id` int(11) NOT NULL,
  `ten_thang` varchar(255) NOT NULL,
  `tu_ngay` date NOT NULL,
  `den_ngay` date NOT NULL,
  `nam` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_ca`
--
ALTER TABLE `dm_ca`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_ca` (`ten_ca`);

--
-- Indexes for table `dm_chucvu`
--
ALTER TABLE `dm_chucvu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_chuc_vu` (`ten_chuc_vu`);

--
-- Indexes for table `dm_danhgia`
--
ALTER TABLE `dm_danhgia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_danh_gia` (`ten_danh_gia`);

--
-- Indexes for table `dm_loaicongviec`
--
ALTER TABLE `dm_loaicongviec`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_trang_thai` (`ten_loai_cong_viec`);

--
-- Indexes for table `dm_mucthuong`
--
ALTER TABLE `dm_mucthuong`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_muc_thuong` (`ten_muc_thuong`);

--
-- Indexes for table `dm_ngayle`
--
ALTER TABLE `dm_ngayle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_ngay_le` (`ten_ngay_le`,`tu_ngay`,`den_ngay`);

--
-- Indexes for table `dm_quyen`
--
ALTER TABLE `dm_quyen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_quyen` (`ten_quyen`);

--
-- Indexes for table `dm_trangthaicongviec`
--
ALTER TABLE `dm_trangthaicongviec`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_trang_thai` (`ten_trang_thai`);

--
-- Indexes for table `dm_trangthaihopdong`
--
ALTER TABLE `dm_trangthaihopdong`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_trang_thai` (`ten_trang_thai`);

--
-- Indexes for table `ql_chamcong`
--
ALTER TABLE `ql_chamcong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhan_vien` (`id_nhan_vien`);

--
-- Indexes for table `ql_danhgiahieusuat`
--
ALTER TABLE `ql_danhgiahieusuat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nhan_vien` (`id_nhan_vien`,`id_thang`),
  ADD KEY `id_muc_thuong` (`id_muc_thuong`),
  ADD KEY `id_thang` (`id_thang`);

--
-- Indexes for table `ql_dauviec`
--
ALTER TABLE `ql_dauviec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai_viec` (`id_loai_viec`),
  ADD KEY `id_nhan_vien` (`id_nhan_vien`),
  ADD KEY `id_trang_thai` (`id_trang_thai`),
  ADD KEY `id_danh_gia` (`id_danh_gia`);

--
-- Indexes for table `ql_hopdong`
--
ALTER TABLE `ql_hopdong`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nhan_vien` (`id_nhan_vien`,`tu_ngay`,`den_ngay`),
  ADD KEY `id_trang_thai` (`id_trang_thai`);

--
-- Indexes for table `ql_nhanvien`
--
ALTER TABLE `ql_nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cmnd` (`cmnd`),
  ADD KEY `id_chuc_vu` (`id_chuc_vu`),
  ADD KEY `ca_mac_dinh` (`ca_mac_dinh`);

--
-- Indexes for table `ql_phanca`
--
ALTER TABLE `ql_phanca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ql_phanca_ibfk_1` (`id_ca`),
  ADD KEY `ql_phanca_ibfk_2` (`id_ca2`);

--
-- Indexes for table `ql_taikhoan`
--
ALTER TABLE `ql_taikhoan`
  ADD PRIMARY KEY (`tai_khoan`),
  ADD UNIQUE KEY `tai_khoan` (`tai_khoan`,`id_nhan_vien`),
  ADD KEY `ql_taikhoan_ibfk_1` (`id_nhan_vien`),
  ADD KEY `ql_taikhoan_ibfk_2` (`id_quyen`);

--
-- Indexes for table `ql_tinhluong`
--
ALTER TABLE `ql_tinhluong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hieu_suat` (`id_hieu_suat`);

--
-- Indexes for table `tg_thang`
--
ALTER TABLE `tg_thang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_ca`
--
ALTER TABLE `dm_ca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dm_chucvu`
--
ALTER TABLE `dm_chucvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dm_danhgia`
--
ALTER TABLE `dm_danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dm_loaicongviec`
--
ALTER TABLE `dm_loaicongviec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dm_mucthuong`
--
ALTER TABLE `dm_mucthuong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dm_ngayle`
--
ALTER TABLE `dm_ngayle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dm_quyen`
--
ALTER TABLE `dm_quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dm_trangthaicongviec`
--
ALTER TABLE `dm_trangthaicongviec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dm_trangthaihopdong`
--
ALTER TABLE `dm_trangthaihopdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ql_chamcong`
--
ALTER TABLE `ql_chamcong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_danhgiahieusuat`
--
ALTER TABLE `ql_danhgiahieusuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_dauviec`
--
ALTER TABLE `ql_dauviec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_hopdong`
--
ALTER TABLE `ql_hopdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ql_nhanvien`
--
ALTER TABLE `ql_nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ql_phanca`
--
ALTER TABLE `ql_phanca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_tinhluong`
--
ALTER TABLE `ql_tinhluong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tg_thang`
--
ALTER TABLE `tg_thang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ql_chamcong`
--
ALTER TABLE `ql_chamcong`
  ADD CONSTRAINT `ql_chamcong_ibfk_1` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_nhanvien` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_danhgiahieusuat`
--
ALTER TABLE `ql_danhgiahieusuat`
  ADD CONSTRAINT `ql_danhgiahieusuat_ibfk_1` FOREIGN KEY (`id_muc_thuong`) REFERENCES `dm_mucthuong` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_danhgiahieusuat_ibfk_2` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_nhanvien` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_danhgiahieusuat_ibfk_3` FOREIGN KEY (`id_thang`) REFERENCES `tg_thang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_dauviec`
--
ALTER TABLE `ql_dauviec`
  ADD CONSTRAINT `ql_dauviec_ibfk_1` FOREIGN KEY (`id_loai_viec`) REFERENCES `dm_loaicongviec` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_dauviec_ibfk_2` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_nhanvien` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_dauviec_ibfk_3` FOREIGN KEY (`id_trang_thai`) REFERENCES `dm_trangthaicongviec` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_dauviec_ibfk_4` FOREIGN KEY (`id_danh_gia`) REFERENCES `dm_danhgia` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_hopdong`
--
ALTER TABLE `ql_hopdong`
  ADD CONSTRAINT `ql_hopdong_ibfk_1` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_nhanvien` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_hopdong_ibfk_2` FOREIGN KEY (`id_trang_thai`) REFERENCES `dm_trangthaihopdong` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_nhanvien`
--
ALTER TABLE `ql_nhanvien`
  ADD CONSTRAINT `ql_nhanvien_ibfk_1` FOREIGN KEY (`id_chuc_vu`) REFERENCES `dm_chucvu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_nhanvien_ibfk_2` FOREIGN KEY (`ca_mac_dinh`) REFERENCES `dm_ca` (`id`);

--
-- Constraints for table `ql_phanca`
--
ALTER TABLE `ql_phanca`
  ADD CONSTRAINT `ql_phanca_ibfk_1` FOREIGN KEY (`id_ca`) REFERENCES `dm_ca` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_phanca_ibfk_2` FOREIGN KEY (`id_ca2`) REFERENCES `dm_ca` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_taikhoan`
--
ALTER TABLE `ql_taikhoan`
  ADD CONSTRAINT `ql_taikhoan_ibfk_2` FOREIGN KEY (`id_quyen`) REFERENCES `dm_quyen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ql_taikhoan_ibfk_3` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_nhanvien` (`id`);

--
-- Constraints for table `ql_tinhluong`
--
ALTER TABLE `ql_tinhluong`
  ADD CONSTRAINT `ql_tinhluong_ibfk_1` FOREIGN KEY (`id_hieu_suat`) REFERENCES `ql_danhgiahieusuat` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
