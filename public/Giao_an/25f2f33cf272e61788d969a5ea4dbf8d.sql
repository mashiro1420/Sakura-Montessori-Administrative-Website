-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 09:50 PM
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
-- Database: `ql_mau_giao`
--
CREATE DATABASE IF NOT EXISTS `ql_mau_giao` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ql_mau_giao`;

-- --------------------------------------------------------

--
-- Table structure for table `dm_chucvu`
--

CREATE TABLE `dm_chucvu` (
  `id` int(11) NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL,
  `khoi_nhan_vien` varchar(255) NOT NULL,
  `bo_phan` varchar(255) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_chucvu`
--

INSERT INTO `dm_chucvu` (`id`, `ten_chuc_vu`, `khoi_nhan_vien`, `bo_phan`, `trang_thai`) VALUES
(1, 'Giám đốc', 'Chuyên môn', 'Quản lý', 1),
(2, 'Giáo viên chủ nhiệm', 'Chuyên môn', 'Giáo viên VN', 1),
(3, 'Bảo vệ', 'Vận hành', 'Bảo vệ', 1),
(4, 'Phó giám đốc', 'Chuyên môn', 'Quản lý', 1),
(5, 'Giáo viên tiếng Anh', 'Chuyên môn', 'Giáo viên nước ngoài', 1),
(6, 'Giáo viên', 'Chuyên môn', 'Giáo viên VN', 1),
(9, 'Hiệu trưởng', 'Chuyên môn', 'Quản lý', 1),
(10, 'Nhân viên nhân sự', 'Vận hành', 'Nhân sự', 1),
(11, 'Giáo viên mỹ thuật', 'Chuyên môn', 'Giáo viên VN', 1),
(12, 'Lái xe', 'Vận hành', 'Dịch vụ', 1),
(13, 'Nhân viên Monitor', 'Vận hành', 'Dịch vụ', 1),
(14, 'Nhân viên kế toán', 'Vận hành', 'Kế toán', 1),
(15, 'Nhân viên dinh dưỡng', 'Vận hành', 'Dịch vụ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_chuyennganh`
--

CREATE TABLE `dm_chuyennganh` (
  `id` int(11) NOT NULL,
  `ten_chuyen_nganh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_chuyennganh`
--

INSERT INTO `dm_chuyennganh` (`id`, `ten_chuyen_nganh`) VALUES
(1, 'Giáo dục mầm non'),
(4, 'Giáo dục tiểu học'),
(7, 'Kế toán'),
(2, 'Kỹ thuật chế biến món ăn'),
(3, 'Quản trị kinh doanh');

-- --------------------------------------------------------

--
-- Table structure for table `dm_dichvu`
--

CREATE TABLE `dm_dichvu` (
  `id` int(11) NOT NULL,
  `ten_dich_vu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_dichvu`
--

INSERT INTO `dm_dichvu` (`id`, `ten_dich_vu`) VALUES
(2, 'Ăn bán trú'),
(3, 'Học phí'),
(4, 'Năng khiếu'),
(1, 'Đưa đón');

-- --------------------------------------------------------

--
-- Table structure for table `dm_hedaotao`
--

CREATE TABLE `dm_hedaotao` (
  `id` int(11) NOT NULL,
  `ten_he_dao_tao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_hedaotao`
--

INSERT INTO `dm_hedaotao` (`id`, `ten_he_dao_tao`) VALUES
(2, 'Quốc tế'),
(1, 'Song ngữ');

-- --------------------------------------------------------

--
-- Table structure for table `dm_khoahoc`
--

CREATE TABLE `dm_khoahoc` (
  `id` int(11) NOT NULL,
  `ten_khoa_hoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_khoahoc`
--

INSERT INTO `dm_khoahoc` (`id`, `ten_khoa_hoc`) VALUES
(2, '2025'),
(1, '2026');

-- --------------------------------------------------------

--
-- Table structure for table `dm_khoi`
--

CREATE TABLE `dm_khoi` (
  `id` int(11) NOT NULL,
  `ten_khoi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_khoi`
--

INSERT INTO `dm_khoi` (`id`, `ten_khoi`) VALUES
(1, '0-3'),
(2, '3-6');

-- --------------------------------------------------------

--
-- Table structure for table `dm_lop`
--

CREATE TABLE `dm_lop` (
  `id` int(11) NOT NULL,
  `ten_lop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_lop`
--

INSERT INTO `dm_lop` (`id`, `ten_lop`) VALUES
(10, 'Apple'),
(4, 'Bee'),
(5, 'Bunny'),
(8, 'Cherry'),
(3, 'Chestinut'),
(13, 'Grape'),
(6, 'Kiwi'),
(7, 'Lemon'),
(9, 'Mango'),
(12, 'Orange'),
(11, 'Peach'),
(2, 'Pumpkin'),
(1, 'Tomato');

-- --------------------------------------------------------

--
-- Table structure for table `dm_monhoc`
--

CREATE TABLE `dm_monhoc` (
  `id` int(11) NOT NULL,
  `ten_mon_hoc` varchar(255) NOT NULL,
  `nang_khieu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_monhoc`
--

INSERT INTO `dm_monhoc` (`id`, `ten_mon_hoc`, `nang_khieu`) VALUES
(1, 'Vận động', 0),
(2, 'Múa', 1),
(3, 'Mỹ thuật', 1),
(4, 'Tiếng Anh', 0),
(5, 'Tiếng Việt', 0),
(6, 'Âm nhạc Echo', 0),
(7, 'Kỹ năng sống', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dm_phonghoc`
--

CREATE TABLE `dm_phonghoc` (
  `id` int(11) NOT NULL,
  `ten_phong_hoc` varchar(255) NOT NULL,
  `so_tang` int(11) DEFAULT NULL,
  `suc_chua` int(11) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_phonghoc`
--

INSERT INTO `dm_phonghoc` (`id`, `ten_phong_hoc`, `so_tang`, `suc_chua`, `trang_thai`) VALUES
(1, 'A307', 3, 30, 1),
(3, '205', 2, 30, 0),
(4, 'A409', 4, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_quyen`
--

CREATE TABLE `dm_quyen` (
  `id` int(11) NOT NULL,
  `ten_quyen` varchar(255) NOT NULL,
  `ma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_quyen`
--

INSERT INTO `dm_quyen` (`id`, `ten_quyen`, `ma`) VALUES
(1, 'Quản lý tài khoản', 'tai_khoan'),
(2, 'Quản lý danh mục', 'danh_muc'),
(3, 'Quản lý nhân viên', 'nhan_vien'),
(4, 'Quản lý học sinh', 'hoc_sinh'),
(5, 'Kiểm soát bus', 'monitor_bus'),
(6, 'Quản lý bảng giá', 'bang_gia'),
(7, 'Quản lý phân lớp', 'phan_lop'),
(8, 'Quản lý thực đơn', 'thuc_don'),
(9, 'Quản lý đăng ký dịch vụ', 'dang_ky_dv'),
(10, 'Quản lý giảng dạy', 'giang_day');

-- --------------------------------------------------------

--
-- Table structure for table `dm_tuyenxe`
--

CREATE TABLE `dm_tuyenxe` (
  `id` int(11) NOT NULL,
  `ten_tuyen_xe` varchar(255) NOT NULL,
  `dinh_nghia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_tuyenxe`
--

INSERT INTO `dm_tuyenxe` (`id`, `ten_tuyen_xe`, `dinh_nghia`) VALUES
(1, '2025', NULL),
(2, '2024', NULL),
(3, '2023', NULL),
(4, '2022', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ql_banggia`
--

CREATE TABLE `ql_banggia` (
  `id` int(11) NOT NULL,
  `ten_gia` varchar(255) NOT NULL,
  `id_dich_vu` int(11) NOT NULL,
  `dinh_nghia` text DEFAULT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_banggia`
--

INSERT INTO `ql_banggia` (`id`, `ten_gia`, `id_dich_vu`, `dinh_nghia`, `gia`) VALUES
(1, 'học năng khiêu', 4, 'a', 132412),
(2, 'Học phí 1 tháng', 3, 'học phí 1 tháng', 10000),
(3, 'Đi bus 1 ngày', 1, 'a', 10000),
(4, 'Phí phát triển', 3, NULL, 9),
(5, 'Học phí 1 tháng hệ Song ngữ', 3, 'Học phí 1 tháng hệ Song ngữ', 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `ql_diemdanh`
--

CREATE TABLE `ql_diemdanh` (
  `id` int(11) NOT NULL,
  `id_hoc_sinh` varchar(255) NOT NULL,
  `ngay` date NOT NULL,
  `loai_diem_danh` int(11) NOT NULL,
  `trang_thai` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_diemdanh`
--

INSERT INTO `ql_diemdanh` (`id`, `id_hoc_sinh`, `ngay`, `loai_diem_danh`, `trang_thai`) VALUES
(28, 'SB0000000001', '2025-05-16', 1, '0'),
(29, 'SB0000000003', '2025-05-16', 1, '0'),
(30, 'SB0000000004', '2025-05-16', 1, '0'),
(31, 'SB0000000005', '2025-05-16', 1, '0'),
(32, 'SB0000000006', '2025-05-16', 1, '0'),
(33, 'SB0000000007', '2025-05-16', 1, '0'),
(34, 'SB0000000008', '2025-05-16', 1, '0'),
(35, 'SB0000000009', '2025-05-16', 1, '0'),
(36, 'SB0000000010', '2025-05-16', 1, '0'),
(37, 'SB0000000011', '2025-05-16', 1, '0'),
(38, 'SB0000000012', '2025-05-16', 1, '0'),
(39, 'SB0000000013', '2025-05-16', 1, '0'),
(40, 'SB0000000001', '2025-05-16', 2, '0'),
(41, 'SB0000000003', '2025-05-16', 2, '0'),
(42, 'SB0000000004', '2025-05-16', 2, '0'),
(43, 'SB0000000006', '2025-05-16', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ql_giangday`
--

CREATE TABLE `ql_giangday` (
  `id` int(11) NOT NULL,
  `id_phan_lop` int(11) NOT NULL,
  `id_ky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_giaytohocsinh`
--

CREATE TABLE `ql_giaytohocsinh` (
  `id` int(11) NOT NULL,
  `id_hoc_sinh` varchar(255) NOT NULL,
  `ten_giay_to` text DEFAULT NULL,
  `ngay_upload` date NOT NULL DEFAULT current_timestamp(),
  `link_giay_to` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_giaytohocsinh`
--

INSERT INTO `ql_giaytohocsinh` (`id`, `id_hoc_sinh`, `ten_giay_to`, `ngay_upload`, `link_giay_to`) VALUES
(1, 'SB0000000002', 'Đăng ký: Dịch vụ xe bus - 2025-05-15', '2025-05-15', NULL),
(2, 'SB0000000006', 'Đăng ký: Dịch vụ xe bus - 2025-05-15', '2025-05-15', NULL),
(3, 'SB0000000008', 'Đăng ký: Dịch vụ xe bus - 2025-05-16', '2025-05-16', NULL),
(4, 'SB0000000003', 'Đăng ký: Dịch vụ xe bus - 2025-05-16', '2025-05-16', NULL),
(5, 'SB0000000007', 'Đăng ký: Dịch vụ xe bus - 2025-05-16', '2025-05-16', 'bedadab188054c7dd23e10c26de7277c.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `ql_hocphi`
--

CREATE TABLE `ql_hocphi` (
  `id` int(11) NOT NULL,
  `id_hoc_sinh` varchar(255) NOT NULL,
  `ngay_tao` date NOT NULL DEFAULT current_timestamp(),
  `ngay_thanh_toan` date DEFAULT NULL,
  `loai_hoc_phi` int(11) DEFAULT 1,
  `tong_dich_vu` int(11) DEFAULT NULL,
  `tong_hoc_phi` int(11) NOT NULL,
  `phat_trien` tinyint(1) NOT NULL DEFAULT 0,
  `tong_so_tien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ql_hocsinh`
--

CREATE TABLE `ql_hocsinh` (
  `id` varchar(55) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `ngay_nhap_hoc` date NOT NULL,
  `ngay_update` date NOT NULL DEFAULT current_timestamp(),
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `ngay_thoi_hoc` date DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `gioi_tinh` int(11) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `id_phan_lop` int(11) DEFAULT NULL,
  `quoc_tich` varchar(255) NOT NULL,
  `ngon_ngu` varchar(255) DEFAULT NULL,
  `can_nang` int(11) DEFAULT NULL,
  `chieu_cao` int(11) DEFAULT NULL,
  `noi_sinh` text DEFAULT NULL,
  `thong_tin_suc_khoe` text DEFAULT NULL,
  `an_com` tinyint(1) NOT NULL DEFAULT 0,
  `di_bus` tinyint(1) NOT NULL DEFAULT 0,
  `ho_ten_me` varchar(255) DEFAULT NULL,
  `sdt_me` varchar(55) DEFAULT NULL,
  `email_me` varchar(500) DEFAULT NULL,
  `nghe_nghiep_me` varchar(255) DEFAULT NULL,
  `cmnd_me` varchar(255) DEFAULT NULL,
  `nam_sinh_me` year(4) DEFAULT NULL,
  `quoc_tich_me` varchar(255) DEFAULT NULL,
  `ho_ten_bo` varchar(255) DEFAULT NULL,
  `sdt_bo` varchar(55) DEFAULT NULL,
  `email_bo` varchar(500) DEFAULT NULL,
  `nghe_nghiep_bo` varchar(255) DEFAULT NULL,
  `cmnd_bo` varchar(255) DEFAULT NULL,
  `nam_sinh_bo` year(4) DEFAULT NULL,
  `quoc_tich_bo` varchar(255) DEFAULT NULL,
  `thuong_tru` text DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `loai_hoc_phi` int(11) NOT NULL DEFAULT 0,
  `id_nang_khieu` int(11) DEFAULT NULL,
  `id_khoa_hoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_hocsinh`
--

INSERT INTO `ql_hocsinh` (`id`, `ho_ten`, `ngay_nhap_hoc`, `ngay_update`, `trang_thai`, `ngay_thoi_hoc`, `nickname`, `gioi_tinh`, `ngay_sinh`, `id_phan_lop`, `quoc_tich`, `ngon_ngu`, `can_nang`, `chieu_cao`, `noi_sinh`, `thong_tin_suc_khoe`, `an_com`, `di_bus`, `ho_ten_me`, `sdt_me`, `email_me`, `nghe_nghiep_me`, `cmnd_me`, `nam_sinh_me`, `quoc_tich_me`, `ho_ten_bo`, `sdt_bo`, `email_bo`, `nghe_nghiep_bo`, `cmnd_bo`, `nam_sinh_bo`, `quoc_tich_bo`, `thuong_tru`, `dia_chi`, `loai_hoc_phi`, `id_nang_khieu`, `id_khoa_hoc`) VALUES
('SB0000000001', 'Đỗ Văn Bình', '2025-03-30', '2025-03-30', 1, NULL, NULL, 1, '2025-03-29', NULL, 'Việt Nam', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Số 50 Lê Lợi , Hải Phòng', NULL, 0, NULL, 1),
('SB0000000002', 'Lâm Gia Bảo', '2025-03-30', '2025-03-30', 0, NULL, NULL, 1, '2025-03-29', NULL, 'Việt Nam', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Số 30 Cát Dài , Hải Phòng', NULL, 0, NULL, 1),
('SB0000000003', 'Nguyễn Tú Anh', '2025-05-10', '2025-05-12', 1, NULL, NULL, 0, '2022-06-25', NULL, 'Việt Nam', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Không', 2, NULL, 2),
('SB0000000004', 'Nghiêm Hà Anh', '2025-05-10', '2025-05-12', 1, NULL, NULL, 1, '2023-08-29', 3, 'Việt Nam', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Số 5 Lương Khánh Thiện , Hải Phòng', 0, NULL, 2),
('SB0000000005', 'Nguyễn Hoàng Hà', '2025-05-10', '2025-05-12', 1, NULL, NULL, 0, '2022-06-25', NULL, 'Việt Nam', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Không', 2, NULL, 2),
('SB0000000006', 'Đoàn Thị Thùy Trang', '2025-05-10', '2025-05-12', 1, NULL, NULL, 0, '2023-08-12', 3, 'Việt Nam', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Số 5 Lương Khánh Thiện , Hải Phòng', 0, NULL, 2),
('SB0000000007', 'Đặng Quốc Minh', '2025-05-10', '2025-05-12', 1, NULL, NULL, 1, '2022-12-18', NULL, 'Việt Nam', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Số 12 Lương Khánh Thiện , Hải Phòng', 0, NULL, 2),
('SB0000000008', 'Lê Đăng Khoa', '2025-05-10', '2025-05-12', 1, NULL, NULL, 1, '2021-09-11', NULL, 'Việt Nam', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Số 15 Lương Khánh Thiện , Hải Phòng', 0, NULL, 2),
('SB0000000009', 'Trần Chấn Hưng', '2025-05-10', '2025-05-12', 1, NULL, NULL, 1, '2022-04-16', NULL, 'Việt Nam', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Số 9 Lương Khánh Thiện , Hải Phòng', 0, NULL, 2),
('SB0000000010', 'Hoàng Tuấn Khang', '2025-05-10', '2025-05-12', 1, NULL, NULL, 1, '2024-08-05', NULL, 'Việt Nam', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2),
('SB0000000011', 'Ngô Chí Hào', '2025-05-10', '2025-05-12', 1, NULL, NULL, 1, '2023-05-02', NULL, 'Trung Quốc', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2),
('SB0000000012', ' Davis Tom', '2025-05-10', '2025-05-12', 1, NULL, NULL, 1, '2022-07-16', NULL, 'Pháp', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2),
('SB0000000013', 'Nguyễn Hải Linh', '2025-05-10', '2025-05-12', 1, NULL, NULL, 0, '2021-03-11', NULL, 'Việt Nam', 'Tiếng Việt', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ql_lotrinhxe`
--

CREATE TABLE `ql_lotrinhxe` (
  `id` int(11) NOT NULL,
  `id_tuyen_xe` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `id_lai_xe` varchar(8) NOT NULL,
  `id_monitor` varchar(8) NOT NULL,
  `bien_so_xe` varchar(55) NOT NULL,
  `danh_sach` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_lotrinhxe`
--

INSERT INTO `ql_lotrinhxe` (`id`, `id_tuyen_xe`, `ngay`, `id_lai_xe`, `id_monitor`, `bien_so_xe`, `danh_sach`) VALUES
(2, 1, '2025-05-15', 'NV000003', 'NV000005', '15A-1420', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ql_nhanvien`
--

CREATE TABLE `ql_nhanvien` (
  `id` varchar(8) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `gioi_tinh` varchar(32) NOT NULL,
  `noi_sinh` varchar(255) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `ngay_nghi_viec` date DEFAULT NULL,
  `ngay_vao_lam` date DEFAULT NULL,
  `id_chuc_vu` int(11) NOT NULL,
  `cmnd` varchar(15) NOT NULL,
  `ngay_cap` date NOT NULL,
  `noi_cap` varchar(255) NOT NULL,
  `quoc_tich` varchar(255) NOT NULL,
  `dan_toc` varchar(255) NOT NULL,
  `ton_giao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_nhanvien`
--

INSERT INTO `ql_nhanvien` (`id`, `ho_ten`, `gioi_tinh`, `noi_sinh`, `ngay_sinh`, `ngay_nghi_viec`, `ngay_vao_lam`, `id_chuc_vu`, `cmnd`, `ngay_cap`, `noi_cap`, `quoc_tich`, `dan_toc`, `ton_giao`) VALUES
('NV000001', 'Đỗ Đức Mạnh', 'Nam', 'Hải Phòng', '2000-04-14', NULL, '2025-03-24', 1, '31200005031', '2025-02-26', 'Hải Phòng', 'Việt Nam', 'Kinh', 'Không'),
('NV000002', 'Vũ Thu Trang', 'Nữ', 'Hải Phòng', '1990-04-25', NULL, '2014-06-04', 2, '0155344489', '2014-10-10', 'CA Hải Phòng', 'Việt Nam', 'Kinh', 'Không'),
('NV000003', 'Trần Văn Hùng', 'Nam', 'Hải Phòng', '1978-06-26', NULL, '2015-06-17', 12, '01678490', '2010-10-11', 'Cục Cảnh sát QLHC về TTXH', 'Việt Nam', 'Kinh', 'Không'),
('NV000004', 'LêThị Hà', 'Nữ', 'Hải Phòng', '1970-09-12', '2025-03-30', '2016-06-06', 2, '0127237491', '2011-04-12', 'Cục Cảnh sát QLHC về TTXH', 'Việt Nam', 'Kinh', 'Không'),
('NV000005', 'Nguyễn Quỳnh Trang', 'Nữ', 'Quảng Ninh', '1984-04-09', NULL, '2017-06-07', 13, '01432488492', '2012-05-13', 'CA Quảng Ninh', 'Việt Nam', 'Kinh', 'Không'),
('NV000006', 'Nguyễn Thu Hiền', 'Nữ', 'Hà Nội', '1961-11-27', NULL, '2014-03-18', 1, '0196784493', '2013-07-14', 'CA Hà Nội', 'Việt Nam', 'Kinh', 'Không'),
('NV000007', 'Đinh Thu Ngọc', 'Nữ', 'Thanh Hóa', '1965-04-05', NULL, '2014-06-09', 2, '0123344494', '2016-08-15', 'CA Thanh Hóa', 'Việt Nam', 'Kinh', 'Không'),
('NV000008', 'Nguyễn Vân Anh', 'Nữ', 'Hải Phòng', '1990-05-01', NULL, '2011-10-02', 2, '046544495', '2014-03-01', 'CA Hải Phòng', 'Việt Nam', 'Kinh', 'Không'),
('NV000009', 'Đoàn Thu Hòa', 'Nữ', 'Tuyên Quang', '1992-05-02', NULL, '2020-10-12', 2, '03321586396', '2012-05-06', 'CA Tuyên Quang ', 'Việt Nam', 'Kinh', 'Không'),
('NV000010', 'Raisa Peter', 'Nam', 'Philipines', '1992-03-08', NULL, '2019-10-28', 2, 'TE82165', '2014-03-12', 'Philipines', 'Philipines', 'Philipine', 'Không'),
('NV000011', 'CHRISTO  DITO WILLIAM', 'Nam', 'Anh', '1968-04-14', NULL, '2016-05-24', 2, 'SA12345', '2010-04-25', 'Anh Quốc', 'Anh', 'Anh', 'Không'),
('NV000012', 'David Smith', 'Nam', 'Anh', '1971-05-13', NULL, '2019-05-25', 5, 'SYA12346', '2013-05-25', 'Anh Quốc', 'Anh', 'Anh', 'Không');

-- --------------------------------------------------------

--
-- Table structure for table `ql_phanlop`
--

CREATE TABLE `ql_phanlop` (
  `id` int(11) NOT NULL,
  `id_gv_cn` varchar(8) NOT NULL,
  `id_gv_nuoc_ngoai` varchar(8) NOT NULL,
  `id_gv_viet` varchar(8) NOT NULL,
  `id_phong_hoc` int(11) NOT NULL,
  `id_lop` int(11) NOT NULL,
  `id_khoi` int(11) NOT NULL,
  `id_he_dao_tao` int(11) NOT NULL,
  `id_ky` int(11) NOT NULL,
  `id_khoa_hoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_phanlop`
--

INSERT INTO `ql_phanlop` (`id`, `id_gv_cn`, `id_gv_nuoc_ngoai`, `id_gv_viet`, `id_phong_hoc`, `id_lop`, `id_khoi`, `id_he_dao_tao`, `id_ky`, `id_khoa_hoc`) VALUES
(3, 'NV000002', 'NV000012', 'NV000007', 1, 3, 1, 2, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ql_phanquyen`
--

CREATE TABLE `ql_phanquyen` (
  `id` int(11) NOT NULL,
  `id_tai_khoan` varchar(255) NOT NULL,
  `id_quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_phanquyen`
--

INSERT INTO `ql_phanquyen` (`id`, `id_tai_khoan`, `id_quyen`) VALUES
(63, 'NV000000', 1),
(64, 'NV000000', 2),
(65, 'NV000000', 3),
(66, 'NV000000', 4),
(67, 'NV000000', 5),
(68, 'NV000000', 6),
(69, 'NV000000', 7),
(70, 'NV000000', 8),
(71, 'NV000000', 9),
(72, 'NV000000', 10),
(62, 'NV000012', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ql_taikhoan`
--

CREATE TABLE `ql_taikhoan` (
  `tai_khoan` varchar(255) NOT NULL,
  `mat_khau` text NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `la_khach` tinyint(1) NOT NULL DEFAULT 0,
  `id_hoc_sinh` varchar(55) DEFAULT NULL,
  `id_nhan_vien` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_taikhoan`
--

INSERT INTO `ql_taikhoan` (`tai_khoan`, `mat_khau`, `la_khach`, `id_hoc_sinh`, `id_nhan_vien`) VALUES
('NV000000', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, NULL),
('NV000001', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000001'),
('NV000002', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000002'),
('NV000003', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000003'),
('NV000004', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000004'),
('NV000005', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000005'),
('NV000006', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000006'),
('NV000007', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000007'),
('NV000008', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000008'),
('NV000009', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000009'),
('NV000010', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000010'),
('NV000011', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000011'),
('NV000012', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 'NV000012'),
('SB0000000001', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000001', NULL),
('SB0000000002', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000002', NULL),
('SB0000000003', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000003', NULL),
('SB0000000004', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000004', NULL),
('SB0000000005', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000005', NULL),
('SB0000000006', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000006', NULL),
('SB0000000007', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000007', NULL),
('SB0000000008', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000008', NULL),
('SB0000000009', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000009', NULL),
('SB0000000010', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000010', NULL),
('SB0000000011', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000011', NULL),
('SB0000000012', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000012', NULL),
('SB0000000013', 'e10adc3949ba59abbe56e057f20f883e', 1, 'SB0000000013', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ql_thoikhoabieu`
--

CREATE TABLE `ql_thoikhoabieu` (
  `id` int(11) NOT NULL,
  `id_phan_lop` int(11) NOT NULL,
  `id_tuan` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_thoikhoabieu`
--

INSERT INTO `ql_thoikhoabieu` (`id`, `id_phan_lop`, `id_tuan`, `trang_thai`) VALUES
(1, 3, 20, 2),
(2, 3, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ql_thucdon`
--

CREATE TABLE `ql_thucdon` (
  `id` int(11) NOT NULL,
  `id_tuan` int(11) NOT NULL,
  `thu` int(11) NOT NULL,
  `sang1` text DEFAULT NULL,
  `sang2` text DEFAULT NULL,
  `chinh` text DEFAULT NULL,
  `rau` text DEFAULT NULL,
  `canh` text DEFAULT NULL,
  `com` text DEFAULT NULL,
  `chao` text DEFAULT NULL,
  `chieu1` text DEFAULT NULL,
  `chieu2` text DEFAULT NULL,
  `nhe` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ql_thucdon`
--

INSERT INTO `ql_thucdon` (`id`, `id_tuan`, `thu`, `sang1`, `sang2`, `chinh`, `rau`, `canh`, `com`, `chao`, `chieu1`, `chieu2`, `nhe`) VALUES
(1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 5, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 6, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 6, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 6, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 7, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 7, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 7, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 7, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 7, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 8, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 8, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 8, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 9, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 9, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 9, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 9, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 9, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 10, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 10, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 10, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 10, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 10, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 11, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 11, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 11, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 11, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 11, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 12, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 12, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 12, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 12, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 12, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 13, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 13, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 13, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 13, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 13, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 14, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 14, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 14, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 14, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 14, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 15, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 15, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 15, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 15, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 16, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 16, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 16, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 16, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 16, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 17, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 17, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 17, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 17, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 17, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 18, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 18, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 18, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 18, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 18, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 19, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 19, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 19, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 19, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 19, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 20, 2, 'Phở gà\nNoodles with chicken', 'Sữa Yakult\nYakult milk', 'Bò hầm củ quả\nStewed beef and vegetables', 'Củ quả luộc chấm muối vừng\nVegetables and fruits', 'Canh chua thịt băm\nMinced pork sour soup', 'Cơm trắng\nRice', 'Cháo bò cà rốt\nBeef and carrot porridge', 'Hủ tiếu tôm thịt\nNoodles with shrimp and pork', 'Sữa Promess\nPromess milk', 'Dưa vàng\nYellow melon'),
(97, 20, 3, 'Cháo chim bồ câu hạt sen\nPigeon porridge with green bean', 'Sữa chua Vinamilk ít đường\nLow sugar Vinamilk yogurt', 'Cá chiên tẩm vừng\nSesame fried fish', 'Bắp cải xào\nStir-fried cabbages', 'Canh bí xanh tôm nõn\nWinter with shrimp soup', 'Cơm trắng\nRice', 'Cháo cá thì là\nFish and dill porridge', 'Mỳ ý sốt bò băm\nMinced beef spaghetti', 'Nước chanh dây\nPassion fruit juice', 'Táo gala\nGala apple'),
(98, 20, 4, 'Bún riêu cua đồng\nField crab noodles', 'Sữa Yakult\nYakult milk', 'Thịt đậu om đậu đỏ\nBraised pork and red bean', 'Rau cải ngồng luộc\nMixed spinach with sesame', 'Canh bina nấu thịt\nSpinach with pork soup', 'Cơm trắng\nRice', 'Cháo thịt rau củ\nMinced pork and vegetable porridge', 'Bún cá thì là\nFish and dill noodles', 'Sữa Promess\nPromess milk', 'Bưởi da xanh\nGrapefruit'),
(99, 20, 5, 'Xôi thịt kho\nSteamed sticky rice and caramelized pork', 'Sữa chua Vinamilk ít đường\nLow sugar Vinamilk yogurt', 'Tôm mực om nấm\nBraised shrimp and squid', 'Cải thảo xào nấm\nStir-fried chicory and mushrooms', 'Canh khoai tây hầm xương\nTaro stew soup with bone', 'Cơm trắng\nRice', 'Cháo tôm bí đỏ\nShrimp and pumpkin porridge', 'Súp thịt bí đỏ\nMeat soup and pumpkin porridge', 'Nước ép dưa hấu\nWatermelon juice', 'Chuối Fessia Bảo Phương\nBao Phuong Fessia banana'),
(100, 20, 6, 'Bò sốt vang + bánh mì\nRed wine beef stew + Bread', 'Sữa Yakult\nYakult milk', 'Gà rang gừng\nGinger chicken', 'Súp lơ luộc\nBoiled broccoli', 'Canh đậu non\nTofu soup', 'Cơm trắng\nRice', 'Cháo gà đậu xanh\nChicken and green bean porridge', 'Bánh su kem\nSukem cake', 'Sữa Promess\nPromess milk', 'Nho đen không hạt Mỹ\nAmerican grapes'),
(101, 21, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 21, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 21, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 21, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 21, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 22, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 22, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 22, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 22, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 22, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 23, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 23, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 23, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 23, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 23, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 24, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 24, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 24, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 24, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 24, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 25, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 25, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 25, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 25, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 25, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 26, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 26, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 26, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 26, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 26, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 27, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 27, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 27, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 27, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 27, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 28, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 28, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 28, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 28, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 28, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 29, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 29, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 29, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 29, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 29, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 30, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 30, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 30, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 30, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 30, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 31, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 31, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 31, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 31, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 31, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 32, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 32, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 32, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 32, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 32, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 33, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 33, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 33, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 33, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 33, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 34, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 34, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 34, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 34, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 34, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 35, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 35, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 35, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 35, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 35, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 36, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 36, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 36, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 36, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 36, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 37, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 37, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 37, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 37, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 37, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 38, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 38, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 38, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 38, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 38, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 39, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 39, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 39, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 39, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 39, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 40, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 40, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 40, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 40, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 40, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 41, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 41, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 41, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 41, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 41, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 42, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 42, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 42, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 42, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 42, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 43, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 43, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 43, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 43, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 43, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, 44, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 44, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 44, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, 44, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, 44, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, 45, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, 45, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, 45, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, 45, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, 45, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, 46, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, 46, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, 46, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, 46, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, 46, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, 47, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, 47, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, 47, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, 47, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, 47, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, 48, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(237, 48, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(238, 48, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, 48, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(240, 48, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(241, 49, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(242, 49, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(243, 49, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(244, 49, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(245, 49, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, 50, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(247, 50, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(248, 50, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(249, 50, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(250, 50, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(251, 51, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(252, 51, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(253, 51, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(254, 51, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(255, 51, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(256, 52, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(257, 52, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(258, 52, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(259, 52, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(260, 52, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tt_bangcap`
--

CREATE TABLE `tt_bangcap` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` varchar(8) NOT NULL,
  `id_chuyen_nganh` int(11) DEFAULT NULL,
  `trinh_do_hoc_van` varchar(10) DEFAULT NULL,
  `trinh_do_chuyen_mon` text DEFAULT NULL,
  `trinh_do_chinh` text DEFAULT NULL,
  `truong_dao_tao` text DEFAULT NULL,
  `xep_loai` varchar(255) DEFAULT NULL,
  `hinh_thuc_dao_tao` text DEFAULT NULL,
  `nam_tot_nghiep` year(4) DEFAULT NULL,
  `chung_chi` text DEFAULT NULL,
  `montessori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tt_bangcap`
--

INSERT INTO `tt_bangcap` (`id`, `id_nhan_vien`, `id_chuyen_nganh`, `trinh_do_hoc_van`, `trinh_do_chuyen_mon`, `trinh_do_chinh`, `truong_dao_tao`, `xep_loai`, `hinh_thuc_dao_tao`, `nam_tot_nghiep`, `chung_chi`, `montessori`) VALUES
(1, 'NV000001', 3, NULL, NULL, NULL, 'Đại học Hải Phòng', NULL, NULL, NULL, NULL, NULL),
(2, 'NV000002', NULL, '12/12', 'Đại học', 'Giáo dục mầm non', 'Đại học Hải Phòng', 'Giỏi', 'Chính quy', '2014', 'Chứng chỉ quản trị trường học ', 1),
(3, 'NV000003', NULL, '12/12', 'Đại học', 'Cử nhân quản trị kế toán', 'Đại học Thương Mại', 'Giỏi', 'Chính quy', '2017', NULL, 1),
(4, 'NV000004', NULL, '12/12', 'Đại học', 'Cử nhân quản trị kinh doanh', 'Đại học Thương Mại', 'Khá', 'Chính quy', '2014', NULL, 1),
(5, 'NV000005', NULL, '12/12', 'Cao đẳng', 'Sư phạm giáo dục tiểu học', 'Cao đẳng Hải Dương', 'Giỏi', 'Chính quy', '2016', 'Chứng chỉ tập huấn y tế', NULL),
(6, 'NV000006', NULL, '12/12', 'Đại học', 'Sư Phạm Mầm Non', 'Đại học Hải Phòng', 'Khá', 'Chính quy', '2014', NULL, NULL),
(7, 'NV000007', NULL, '12/12', 'Trung cấp', 'Giáo dục mầm non', 'Đại học Hải Phòng', 'Giỏi', 'Chính quy', '2016', 'Chứng chỉ Montessori', 1),
(8, 'NV000008', NULL, '12/12', 'Đại học', 'Cử nhân Văn học', 'Đại học Khọc xã hội và nhân văn - ĐHQG Hà Nội', 'Khá', 'Chính quy', '2016', NULL, NULL),
(9, 'NV000009', NULL, '12/12', 'Trung cấp', 'Giáo dục mầm non', 'Đại học Hải Phòng', 'Giỏi', 'Chính quy', '2018', NULL, NULL),
(10, 'NV000010', NULL, 'Đại học', 'Bachelor in modern history of Winchester University', 'Bachelor in modern history of Winchester University', 'Winchester', 'Giỏi', 'Chính quy', '2019', NULL, NULL),
(11, 'NV000011', NULL, 'Thạc sỹ', 'Bachelor in English studies', 'ử nhân nghiên cứu ngôn ngữ Anh', 'Moulay Ismail University', 'Giỏi', 'Chính quy', '2018', 'Chứng chỉ Montessori', 1),
(111, 'NV000012', NULL, 'Tiến sĩ', 'Bachelor in English studies', 'ử nhân nghiên cứu ngôn ngữ Anh', 'Moulay Ismail University', 'Giỏi', 'Chính quy', '2018', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tt_dansu`
--

CREATE TABLE `tt_dansu` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` varchar(8) NOT NULL,
  `so_bhxh` varchar(20) DEFAULT NULL,
  `thang_tham_gia_bhxh` text DEFAULT NULL,
  `ma_so_thue` varchar(10) DEFAULT NULL,
  `thuong_tru` text DEFAULT NULL,
  `tam_tru` text DEFAULT NULL,
  `khai_sinh` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tt_dansu`
--

INSERT INTO `tt_dansu` (`id`, `id_nhan_vien`, `so_bhxh`, `thang_tham_gia_bhxh`, `ma_so_thue`, `thuong_tru`, `tam_tru`, `khai_sinh`) VALUES
(1, 'NV000001', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'NV000002', '5566789512', '2014-10-10', '89631234', 'Số 5 Lê Lợi , Hải Phòng ', 'Số 5 Lê Lợi  , Hải Phòng ', 'Số 5 Cát Dài , Hải Phòng'),
(3, 'NV000003', '5566789513', '2010-10-11', '89631235', 'Số 25 Đường Phạm Văn Đồng, Quận Dương Kinh, Hải Phòng', 'Số 25 Đường Phạm Văn Đồng, Quận Dương Kinh, Hải Phòng', 'Số 3 Khu phố Chợ, Thị trấn Vĩnh Bảo, Hải Phòng'),
(4, 'NV000004', '5566789514', '2011-04-12', '89631236', 'Số 55 Tân Thành, Huyện Kiến Thụy, Hải Phòng', 'Số 55 Tân Thành, Huyện Kiến Thụy, Hải Phòng', 'Số 88 Quốc lộ 10, Xã Thủy Đường, Thủy Nguyên, Hải Phòng'),
(5, 'NV000005', '5566789515', '2012-05-13', '89631237', 'Số 22 Khu đô thị Sao Đỏ 2, Dương Kinh, Hải Phòng', 'Số 22 Khu đô thị Sao Đỏ 2, Dương Kinh, Hải Phòng', 'Số 22 Khu đô thị Sao Đỏ 2, Dương Kinh, Hải Phòng'),
(6, 'NV000006', '5566789516', '2013-07-14', '89631238', 'Số 30 Quốc lộ 353, Xã Hưng Đạo, Dương Kinh, Hải Phòng', 'Số 30 Quốc lộ 353, Xã Hưng Đạo, Dương Kinh, Hải Phòng', 'Số 15 Trần Nguyên Hãn, Quận Lê Chân, Hải Phòng'),
(7, 'NV000007', '5566789517', '2016-08-15', '89631239', 'Số 12 Khu dân cư Đa Phúc, Quận Dương Kinh, Hải Phòng', 'Số 12 Khu dân cư Đa Phúc, Quận Dương Kinh, Hải Phòng', 'Số 25 Hoàng Văn Thụ, Quận Hồng Bàng, Hải Phòng'),
(8, 'NV000008', '5566789518', '2012-05-06', '89631241', 'Số 88 Tô Hiệu, Quận Lê Chân, Hải Phòng', 'Số 88 Tô Hiệu, Quận Lê Chân, Hải Phòng', 'Số 88 Tô Hiệu, Quận Lê Chân, Hải Phòng'),
(9, 'NV000009', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'NV000010', '5566789520', '2014-03-12', '89631242', 'Số 77 Khu đô thị Anh Dũng, Dương Kinh, Hải Phòng', 'Số 77 Khu đô thị Anh Dũng, Dương Kinh, Hải Phòng', 'Số 77 Khu đô thị Anh Dũng, Dương Kinh, Hải Phòng'),
(11, 'NV000011', '5566789521', '2010-04-25', '89631243', 'Số 5A Hoàng Văn Thụ, Quận Hồng Bàng, Hải Phòng', 'Số 5A Hoàng Văn Thụ, Quận Hồng Bàng, Hải Phòng', 'Số 10 Lạch Tray, Quận Ngô Quyền, Hải Phòng\n'),
(155, 'NV000012', '5566789522', '2019-05-25', '89631244', 'Số 109 Lê Hồng Phong, Quận Hồng Bàng, Hải Phòng', 'Số 109 Lê Hồng Phong, Quận Hồng Bàng, Hải Phòng', 'Số 109 Lê Hồng Phong, Quận Hồng Bàng, Hải Phòng');

-- --------------------------------------------------------

--
-- Table structure for table `tt_giangday`
--

CREATE TABLE `tt_giangday` (
  `id` int(11) NOT NULL,
  `id_giang_day` int(11) NOT NULL,
  `id_tuan` int(11) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `link_giao_an` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tt_hocsinhdichvu`
--

CREATE TABLE `tt_hocsinhdichvu` (
  `id` int(11) NOT NULL,
  `id_hoc_sinh` varchar(255) NOT NULL,
  `id_bang_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tt_honnhan`
--

CREATE TABLE `tt_honnhan` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` varchar(8) NOT NULL,
  `tinh_trang_hon_nhan` varchar(255) DEFAULT NULL,
  `so_con` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tt_honnhan`
--

INSERT INTO `tt_honnhan` (`id`, `id_nhan_vien`, `tinh_trang_hon_nhan`, `so_con`) VALUES
(2, 'NV000001', NULL, 1),
(3, 'NV000002', 'Đã kết hôn', 1),
(4, 'NV000003', 'Chưa kết hôn', NULL),
(5, 'NV000004', 'Đã kết hôn', 2),
(6, 'NV000005', 'Chưa kết hôn', NULL),
(7, 'NV000006', 'Chưa kết hôn', NULL),
(8, 'NV000007', 'Chưa kết hôn', NULL),
(9, 'NV000008', 'Đã kết hôn', 1),
(10, 'NV000009', 'Chưa kết hôn', NULL),
(11, 'NV000010', 'Chưa kết hôn', NULL),
(12, 'NV000011', 'Đã kết hôn', 2),
(158, 'NV000012', 'Chưa kết hôn', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tt_hopdong`
--

CREATE TABLE `tt_hopdong` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` varchar(8) NOT NULL,
  `loai_hd` text DEFAULT NULL,
  `so_hd` text DEFAULT NULL,
  `ngay_ky` date DEFAULT NULL,
  `ngay_ket_thuc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tt_hopdong`
--

INSERT INTO `tt_hopdong` (`id`, `id_nhan_vien`, `loai_hd`, `so_hd`, `ngay_ky`, `ngay_ket_thuc`) VALUES
(1, 'NV000001', NULL, NULL, NULL, NULL),
(2, 'NV000002', 'HĐ XĐTH', 'SS10000/2019/HĐKXĐTH-SMIS', '2019-06-02', '2019-06-02'),
(3, 'NV000003', 'HĐ KXĐTH', 'SS10001/2019/HĐKXĐTH-SMIS', '2019-09-01', NULL),
(4, 'NV000004', 'HĐ XĐTH	', 'SS10000/2015/HĐKXĐTH-SMIS', '2015-05-10', '2015-05-10'),
(5, 'NV000005', 'HĐ KXĐTH', 'SS10001/2016/HĐKXĐTH-SMIS', '2016-07-20', NULL),
(6, 'NV000006', 'HĐ XĐTH', 'SS10002/2016/HĐKXĐTH-SMIS', '2016-09-15', '2016-09-15'),
(7, 'NV000007', 'HĐ KXĐTH', 'SS10003/2017/HĐKXĐTH-SMIS', '2017-11-25', NULL),
(8, 'NV000008', 'HĐ XĐTH', 'SS10004/2018/HĐKXĐTH-SMIS', '2018-03-05', '2018-03-05'),
(9, 'NV000009', 'HĐ KXĐTH', 'SS10005/2018/HĐKXĐTH-SMIS', '2018-06-18', NULL),
(10, 'NV000010', 'HĐ XĐTH', 'SS10006/2019/HĐKXĐTH-SMIS', '2019-08-30', '2020-12-12'),
(11, 'NV000011', 'HĐ KXĐTH', 'SS10007/2020/HĐKXĐTH-SMIS', '2020-12-12', NULL),
(155, 'NV000012', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tt_hsdixe`
--

CREATE TABLE `tt_hsdixe` (
  `id` int(11) NOT NULL,
  `id_hoc_sinh` varchar(55) NOT NULL,
  `id_tuyen_xe` int(255) NOT NULL,
  `diem_don` text NOT NULL,
  `so_km` varchar(30) NOT NULL,
  `nguoi_dua_don` varchar(255) DEFAULT NULL,
  `lien_he_khan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tt_hsdixe`
--

INSERT INTO `tt_hsdixe` (`id`, `id_hoc_sinh`, `id_tuyen_xe`, `diem_don`, `so_km`, `nguoi_dua_don`, `lien_he_khan`) VALUES
(2, 'SB0000000001', 1, 'a', '12KM', '123', '124'),
(3, 'SB0000000004', 1, 'a', '12KM', '123', '124'),
(4, 'SB0000000002', 1, 'a', '12KM', '123', '124'),
(5, 'SB0000000006', 1, 'a', '12KM', '123', '124'),
(6, 'SB0000000008', 2, 'a', '12KM', '123', '124'),
(7, 'SB0000000003', 1, 'a', '12KM', '123', '124'),
(8, 'SB0000000007', 2, 'a', '12KM', '123', '124');

-- --------------------------------------------------------

--
-- Table structure for table `tt_ky`
--

CREATE TABLE `tt_ky` (
  `id` int(11) NOT NULL,
  `ten_ky` varchar(255) NOT NULL,
  `tu_ngay` date DEFAULT NULL,
  `den_ngay` date DEFAULT NULL,
  `nam_hoc` int(11) NOT NULL,
  `ky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tt_ky`
--

INSERT INTO `tt_ky` (`id`, `ten_ky`, `tu_ngay`, `den_ngay`, `nam_hoc`, `ky`) VALUES
(5, 'Kỳ I năm 2025 - 2026', '2025-07-01', '2025-12-31', 2025, 1),
(6, 'Kỳ II năm 2025 - 2026', '2026-01-01', '2026-07-01', 2026, 2),
(7, 'Kỳ I năm 2024 - 2025', '2024-07-01', '2024-12-31', 2024, 1),
(8, 'Kỳ II năm 2024 - 2025', '2025-01-01', '2025-07-01', 2025, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tt_lienhe`
--

CREATE TABLE `tt_lienhe` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` varchar(8) NOT NULL,
  `sdt_rieng` varchar(15) DEFAULT NULL,
  `sdt_noi_bo` varchar(15) DEFAULT NULL,
  `email_rieng` varchar(255) DEFAULT NULL,
  `email_noi_bo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tt_lienhe`
--

INSERT INTO `tt_lienhe` (`id`, `id_nhan_vien`, `sdt_rieng`, `sdt_noi_bo`, `email_rieng`, `email_noi_bo`) VALUES
(2, 'NV000001', '0834285958', NULL, NULL, NULL),
(3, 'NV000002', '0733335721', NULL, 'trang@gmail.com', NULL),
(4, 'NV000003', '0734565726', NULL, 'hung@gmail.com', NULL),
(5, 'NV000004', '1', NULL, NULL, NULL),
(6, 'NV000005', '0788335722', NULL, 'hien@gmail.com', NULL),
(7, 'NV000006', '0799335723', NULL, 'ngoc@gmail.com', NULL),
(8, 'NV000007', '0723335724', NULL, 'anh@gmail.com', NULL),
(9, 'NV000008', '0712335725', NULL, 'hoa@gmail.com', NULL),
(10, 'NV000009', NULL, NULL, NULL, NULL),
(11, 'NV000010', '0731235727', '11125', 'peter@gmail.com', NULL),
(12, 'NV000011', '0933335728', '11123', 'will@gmail.com', NULL),
(158, 'NV000012', '0952335729', '11126', 'smit@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tt_tkbngay`
--

CREATE TABLE `tt_tkbngay` (
  `id` int(11) NOT NULL,
  `thu` int(11) NOT NULL,
  `id_thoi_khoa_bieu` int(11) NOT NULL,
  `tiet1` int(11) DEFAULT NULL,
  `tiet2` int(11) DEFAULT NULL,
  `tiet3` int(11) DEFAULT NULL,
  `tiet4` int(11) DEFAULT NULL,
  `tiet5` int(11) DEFAULT NULL,
  `tiet6` int(11) DEFAULT NULL,
  `tiet7` int(11) DEFAULT NULL,
  `tiet8` int(11) DEFAULT NULL,
  `tiet9` int(11) DEFAULT NULL,
  `tiet10` int(11) DEFAULT NULL,
  `tiet11` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tt_tkbngay`
--

INSERT INTO `tt_tkbngay` (`id`, `thu`, `id_thoi_khoa_bieu`, `tiet1`, `tiet2`, `tiet3`, `tiet4`, `tiet5`, `tiet6`, `tiet7`, `tiet8`, `tiet9`, `tiet10`, `tiet11`) VALUES
(6, 2, 1, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL),
(7, 3, 1, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(8, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL),
(27, 3, 2, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 5, 2, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL),
(30, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tt_tuan`
--

CREATE TABLE `tt_tuan` (
  `id` int(11) NOT NULL,
  `tuan` varchar(255) NOT NULL,
  `nam` int(11) NOT NULL,
  `tu_ngay` date DEFAULT NULL,
  `den_ngay` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tt_tuan`
--

INSERT INTO `tt_tuan` (`id`, `tuan`, `nam`, `tu_ngay`, `den_ngay`) VALUES
(1, '1', 2025, '2024-12-30', '2025-01-05'),
(2, '2', 2025, '2025-01-06', '2025-01-12'),
(3, '3', 2025, '2025-01-13', '2025-01-19'),
(4, '4', 2025, '2025-01-20', '2025-01-26'),
(5, '5', 2025, '2025-01-27', '2025-02-02'),
(6, '6', 2025, '2025-02-03', '2025-02-09'),
(7, '7', 2025, '2025-02-10', '2025-02-16'),
(8, '8', 2025, '2025-02-17', '2025-02-23'),
(9, '9', 2025, '2025-02-24', '2025-03-02'),
(10, '10', 2025, '2025-03-03', '2025-03-09'),
(11, '11', 2025, '2025-03-10', '2025-03-16'),
(12, '12', 2025, '2025-03-17', '2025-03-23'),
(13, '13', 2025, '2025-03-24', '2025-03-30'),
(14, '14', 2025, '2025-03-31', '2025-04-06'),
(15, '15', 2025, '2025-04-07', '2025-04-13'),
(16, '16', 2025, '2025-04-14', '2025-04-20'),
(17, '17', 2025, '2025-04-21', '2025-04-27'),
(18, '18', 2025, '2025-04-28', '2025-05-04'),
(19, '19', 2025, '2025-05-05', '2025-05-11'),
(20, '20', 2025, '2025-05-12', '2025-05-18'),
(21, '21', 2025, '2025-05-19', '2025-05-25'),
(22, '22', 2025, '2025-05-26', '2025-06-01'),
(23, '23', 2025, '2025-06-02', '2025-06-08'),
(24, '24', 2025, '2025-06-09', '2025-06-15'),
(25, '25', 2025, '2025-06-16', '2025-06-22'),
(26, '26', 2025, '2025-06-23', '2025-06-29'),
(27, '27', 2025, '2025-06-30', '2025-07-06'),
(28, '28', 2025, '2025-07-07', '2025-07-13'),
(29, '29', 2025, '2025-07-14', '2025-07-20'),
(30, '30', 2025, '2025-07-21', '2025-07-27'),
(31, '31', 2025, '2025-07-28', '2025-08-03'),
(32, '32', 2025, '2025-08-04', '2025-08-10'),
(33, '33', 2025, '2025-08-11', '2025-08-17'),
(34, '34', 2025, '2025-08-18', '2025-08-24'),
(35, '35', 2025, '2025-08-25', '2025-08-31'),
(36, '36', 2025, '2025-09-01', '2025-09-07'),
(37, '37', 2025, '2025-09-08', '2025-09-14'),
(38, '38', 2025, '2025-09-15', '2025-09-21'),
(39, '39', 2025, '2025-09-22', '2025-09-28'),
(40, '40', 2025, '2025-09-29', '2025-10-05'),
(41, '41', 2025, '2025-10-06', '2025-10-12'),
(42, '42', 2025, '2025-10-13', '2025-10-19'),
(43, '43', 2025, '2025-10-20', '2025-10-26'),
(44, '44', 2025, '2025-10-27', '2025-11-02'),
(45, '45', 2025, '2025-11-03', '2025-11-09'),
(46, '46', 2025, '2025-11-10', '2025-11-16'),
(47, '47', 2025, '2025-11-17', '2025-11-23'),
(48, '48', 2025, '2025-11-24', '2025-11-30'),
(49, '49', 2025, '2025-12-01', '2025-12-07'),
(50, '50', 2025, '2025-12-08', '2025-12-14'),
(51, '51', 2025, '2025-12-15', '2025-12-21'),
(52, '52', 2025, '2025-12-22', '2025-12-28'),
(53, '1', 2026, '2025-12-29', '2026-01-04'),
(54, '2', 2026, '2026-01-05', '2026-01-11'),
(55, '3', 2026, '2026-01-12', '2026-01-18'),
(56, '4', 2026, '2026-01-19', '2026-01-25'),
(57, '5', 2026, '2026-01-26', '2026-02-01'),
(58, '6', 2026, '2026-02-02', '2026-02-08'),
(59, '7', 2026, '2026-02-09', '2026-02-15'),
(60, '8', 2026, '2026-02-16', '2026-02-22'),
(61, '9', 2026, '2026-02-23', '2026-03-01'),
(62, '10', 2026, '2026-03-02', '2026-03-08'),
(63, '11', 2026, '2026-03-09', '2026-03-15'),
(64, '12', 2026, '2026-03-16', '2026-03-22'),
(65, '13', 2026, '2026-03-23', '2026-03-29'),
(66, '14', 2026, '2026-03-30', '2026-04-05'),
(67, '15', 2026, '2026-04-06', '2026-04-12'),
(68, '16', 2026, '2026-04-13', '2026-04-19'),
(69, '17', 2026, '2026-04-20', '2026-04-26'),
(70, '18', 2026, '2026-04-27', '2026-05-03'),
(71, '19', 2026, '2026-05-04', '2026-05-10'),
(72, '20', 2026, '2026-05-11', '2026-05-17'),
(73, '21', 2026, '2026-05-18', '2026-05-24'),
(74, '22', 2026, '2026-05-25', '2026-05-31'),
(75, '23', 2026, '2026-06-01', '2026-06-07'),
(76, '24', 2026, '2026-06-08', '2026-06-14'),
(77, '25', 2026, '2026-06-15', '2026-06-21'),
(78, '26', 2026, '2026-06-22', '2026-06-28'),
(79, '27', 2026, '2026-06-29', '2026-07-05'),
(80, '28', 2026, '2026-07-06', '2026-07-12'),
(81, '29', 2026, '2026-07-13', '2026-07-19'),
(82, '30', 2026, '2026-07-20', '2026-07-26'),
(83, '31', 2026, '2026-07-27', '2026-08-02'),
(84, '32', 2026, '2026-08-03', '2026-08-09'),
(85, '33', 2026, '2026-08-10', '2026-08-16'),
(86, '34', 2026, '2026-08-17', '2026-08-23'),
(87, '35', 2026, '2026-08-24', '2026-08-30'),
(88, '36', 2026, '2026-08-31', '2026-09-06'),
(89, '37', 2026, '2026-09-07', '2026-09-13'),
(90, '38', 2026, '2026-09-14', '2026-09-20'),
(91, '39', 2026, '2026-09-21', '2026-09-27'),
(92, '40', 2026, '2026-09-28', '2026-10-04'),
(93, '41', 2026, '2026-10-05', '2026-10-11'),
(94, '42', 2026, '2026-10-12', '2026-10-18'),
(95, '43', 2026, '2026-10-19', '2026-10-25'),
(96, '44', 2026, '2026-10-26', '2026-11-01'),
(97, '45', 2026, '2026-11-02', '2026-11-08'),
(98, '46', 2026, '2026-11-09', '2026-11-15'),
(99, '47', 2026, '2026-11-16', '2026-11-22'),
(100, '48', 2026, '2026-11-23', '2026-11-29'),
(101, '49', 2026, '2026-11-30', '2026-12-06'),
(102, '50', 2026, '2026-12-07', '2026-12-13'),
(103, '51', 2026, '2026-12-14', '2026-12-20'),
(104, '52', 2026, '2026-12-21', '2026-12-27'),
(105, '53', 2026, '2026-12-28', '2027-01-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_chucvu`
--
ALTER TABLE `dm_chucvu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_chuc_vu` (`ten_chuc_vu`);

--
-- Indexes for table `dm_chuyennganh`
--
ALTER TABLE `dm_chuyennganh`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_chuyen_nganh` (`ten_chuyen_nganh`);

--
-- Indexes for table `dm_dichvu`
--
ALTER TABLE `dm_dichvu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_dich_vu` (`ten_dich_vu`);

--
-- Indexes for table `dm_hedaotao`
--
ALTER TABLE `dm_hedaotao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_he_dao_tao` (`ten_he_dao_tao`);

--
-- Indexes for table `dm_khoahoc`
--
ALTER TABLE `dm_khoahoc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_khoa` (`ten_khoa_hoc`);

--
-- Indexes for table `dm_khoi`
--
ALTER TABLE `dm_khoi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_khoi` (`ten_khoi`);

--
-- Indexes for table `dm_lop`
--
ALTER TABLE `dm_lop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_lop` (`ten_lop`);

--
-- Indexes for table `dm_monhoc`
--
ALTER TABLE `dm_monhoc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_mon_hoc` (`ten_mon_hoc`);

--
-- Indexes for table `dm_phonghoc`
--
ALTER TABLE `dm_phonghoc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_phong_hoc` (`ten_phong_hoc`);

--
-- Indexes for table `dm_quyen`
--
ALTER TABLE `dm_quyen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_quyen` (`ten_quyen`);

--
-- Indexes for table `dm_tuyenxe`
--
ALTER TABLE `dm_tuyenxe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_tuyen_xe` (`ten_tuyen_xe`);

--
-- Indexes for table `ql_banggia`
--
ALTER TABLE `ql_banggia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_gia` (`ten_gia`),
  ADD KEY `ql_banggia_ibfk_1` (`id_dich_vu`);

--
-- Indexes for table `ql_diemdanh`
--
ALTER TABLE `ql_diemdanh`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_hoc_sinh` (`id_hoc_sinh`,`ngay`,`loai_diem_danh`);

--
-- Indexes for table `ql_giangday`
--
ALTER TABLE `ql_giangday`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_phan_lop` (`id_phan_lop`,`id_ky`),
  ADD KEY `ql_giangday_ibfk_1` (`id_ky`);

--
-- Indexes for table `ql_giaytohocsinh`
--
ALTER TABLE `ql_giaytohocsinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hoc_sinh` (`id_hoc_sinh`);

--
-- Indexes for table `ql_hocphi`
--
ALTER TABLE `ql_hocphi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hoc_sinh` (`id_hoc_sinh`);

--
-- Indexes for table `ql_hocsinh`
--
ALTER TABLE `ql_hocsinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_phan_lop` (`id_phan_lop`),
  ADD KEY `id_khoa_hoc` (`id_khoa_hoc`),
  ADD KEY `id_nang_khieu` (`id_nang_khieu`);

--
-- Indexes for table `ql_lotrinhxe`
--
ALTER TABLE `ql_lotrinhxe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_tuyen_xe` (`id_tuyen_xe`,`ngay`),
  ADD KEY `id_lai_xe` (`id_lai_xe`),
  ADD KEY `ql_lotrinhxe_ibfk_2` (`id_monitor`);

--
-- Indexes for table `ql_nhanvien`
--
ALTER TABLE `ql_nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chuc_vu` (`id_chuc_vu`);

--
-- Indexes for table `ql_phanlop`
--
ALTER TABLE `ql_phanlop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_ky` (`id_ky`,`id_lop`),
  ADD KEY `id_he_dao_tao` (`id_he_dao_tao`),
  ADD KEY `id_khoi` (`id_khoi`),
  ADD KEY `id_lop` (`id_lop`),
  ADD KEY `id_phong_hoc` (`id_phong_hoc`),
  ADD KEY `id_gv_cn` (`id_gv_cn`),
  ADD KEY `id_gv_nuoc_ngoai` (`id_gv_nuoc_ngoai`),
  ADD KEY `id_gv_viet` (`id_gv_viet`),
  ADD KEY `id_khoa` (`id_khoa_hoc`);

--
-- Indexes for table `ql_phanquyen`
--
ALTER TABLE `ql_phanquyen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_tai_khoan` (`id_tai_khoan`,`id_quyen`),
  ADD KEY `id_quyen` (`id_quyen`);

--
-- Indexes for table `ql_taikhoan`
--
ALTER TABLE `ql_taikhoan`
  ADD PRIMARY KEY (`tai_khoan`),
  ADD UNIQUE KEY `id_hoc_sinh` (`id_hoc_sinh`),
  ADD KEY `id_nhan_vien` (`id_nhan_vien`);

--
-- Indexes for table `ql_thoikhoabieu`
--
ALTER TABLE `ql_thoikhoabieu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_lop` (`id_phan_lop`,`id_tuan`),
  ADD KEY `ql_thoikhoabieu_ibfk_2` (`id_tuan`);

--
-- Indexes for table `ql_thucdon`
--
ALTER TABLE `ql_thucdon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`id_tuan`),
  ADD KEY `id_tuan` (`id_tuan`);

--
-- Indexes for table `tt_bangcap`
--
ALTER TABLE `tt_bangcap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nhan_vien` (`id_nhan_vien`),
  ADD KEY `id_chuyen_nganh` (`id_chuyen_nganh`);

--
-- Indexes for table `tt_dansu`
--
ALTER TABLE `tt_dansu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nhan_vien` (`id_nhan_vien`),
  ADD UNIQUE KEY `so_bhxh` (`so_bhxh`),
  ADD UNIQUE KEY `ma_so_thue` (`ma_so_thue`);

--
-- Indexes for table `tt_giangday`
--
ALTER TABLE `tt_giangday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_giang_day` (`id_giang_day`),
  ADD KEY `id_tuan` (`id_tuan`);

--
-- Indexes for table `tt_hocsinhdichvu`
--
ALTER TABLE `tt_hocsinhdichvu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_hoc_sinh` (`id_hoc_sinh`,`id_bang_gia`),
  ADD KEY `id_bang_gia` (`id_bang_gia`);

--
-- Indexes for table `tt_honnhan`
--
ALTER TABLE `tt_honnhan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nhan_vien` (`id_nhan_vien`);

--
-- Indexes for table `tt_hopdong`
--
ALTER TABLE `tt_hopdong`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nhan_vien` (`id_nhan_vien`);

--
-- Indexes for table `tt_hsdixe`
--
ALTER TABLE `tt_hsdixe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_hoc_sinh` (`id_hoc_sinh`),
  ADD KEY `id_tuyen_xe` (`id_tuyen_xe`);

--
-- Indexes for table `tt_ky`
--
ALTER TABLE `tt_ky`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_ky` (`ten_ky`);

--
-- Indexes for table `tt_lienhe`
--
ALTER TABLE `tt_lienhe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nhan_vien` (`id_nhan_vien`),
  ADD UNIQUE KEY `sdt_rieng` (`sdt_rieng`),
  ADD UNIQUE KEY `email_noi_bo` (`email_noi_bo`),
  ADD UNIQUE KEY `email_rieng` (`email_rieng`),
  ADD UNIQUE KEY `sdt_noi_bo` (`sdt_noi_bo`);

--
-- Indexes for table `tt_tkbngay`
--
ALTER TABLE `tt_tkbngay`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `thu` (`thu`,`id_thoi_khoa_bieu`),
  ADD KEY `tt_tkbngay_ibfk_1` (`id_thoi_khoa_bieu`),
  ADD KEY `tiet1` (`tiet1`),
  ADD KEY `tiet2` (`tiet2`),
  ADD KEY `tiet3` (`tiet3`),
  ADD KEY `tiet4` (`tiet4`),
  ADD KEY `tiet6` (`tiet6`),
  ADD KEY `tiet7` (`tiet7`),
  ADD KEY `tiet8` (`tiet8`),
  ADD KEY `tiet9` (`tiet9`),
  ADD KEY `tiet10` (`tiet10`),
  ADD KEY `tiet11` (`tiet11`);

--
-- Indexes for table `tt_tuan`
--
ALTER TABLE `tt_tuan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tuan` (`tuan`,`nam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_chucvu`
--
ALTER TABLE `dm_chucvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dm_chuyennganh`
--
ALTER TABLE `dm_chuyennganh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dm_dichvu`
--
ALTER TABLE `dm_dichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dm_hedaotao`
--
ALTER TABLE `dm_hedaotao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dm_khoahoc`
--
ALTER TABLE `dm_khoahoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dm_khoi`
--
ALTER TABLE `dm_khoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dm_lop`
--
ALTER TABLE `dm_lop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dm_monhoc`
--
ALTER TABLE `dm_monhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dm_phonghoc`
--
ALTER TABLE `dm_phonghoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dm_quyen`
--
ALTER TABLE `dm_quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dm_tuyenxe`
--
ALTER TABLE `dm_tuyenxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ql_banggia`
--
ALTER TABLE `ql_banggia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ql_diemdanh`
--
ALTER TABLE `ql_diemdanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ql_giangday`
--
ALTER TABLE `ql_giangday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_giaytohocsinh`
--
ALTER TABLE `ql_giaytohocsinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ql_hocphi`
--
ALTER TABLE `ql_hocphi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ql_lotrinhxe`
--
ALTER TABLE `ql_lotrinhxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ql_phanlop`
--
ALTER TABLE `ql_phanlop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ql_phanquyen`
--
ALTER TABLE `ql_phanquyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `ql_thoikhoabieu`
--
ALTER TABLE `ql_thoikhoabieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ql_thucdon`
--
ALTER TABLE `ql_thucdon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `tt_bangcap`
--
ALTER TABLE `tt_bangcap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tt_dansu`
--
ALTER TABLE `tt_dansu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `tt_giangday`
--
ALTER TABLE `tt_giangday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tt_hocsinhdichvu`
--
ALTER TABLE `tt_hocsinhdichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tt_honnhan`
--
ALTER TABLE `tt_honnhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tt_hopdong`
--
ALTER TABLE `tt_hopdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `tt_hsdixe`
--
ALTER TABLE `tt_hsdixe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tt_ky`
--
ALTER TABLE `tt_ky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tt_lienhe`
--
ALTER TABLE `tt_lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tt_tkbngay`
--
ALTER TABLE `tt_tkbngay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tt_tuan`
--
ALTER TABLE `tt_tuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ql_banggia`
--
ALTER TABLE `ql_banggia`
  ADD CONSTRAINT `ql_banggia_ibfk_1` FOREIGN KEY (`id_dich_vu`) REFERENCES `dm_dichvu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_diemdanh`
--
ALTER TABLE `ql_diemdanh`
  ADD CONSTRAINT `ql_diemdanh_ibfk_1` FOREIGN KEY (`id_hoc_sinh`) REFERENCES `ql_hocsinh` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_giangday`
--
ALTER TABLE `ql_giangday`
  ADD CONSTRAINT `ql_giangday_ibfk_1` FOREIGN KEY (`id_ky`) REFERENCES `tt_ky` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_giaytohocsinh`
--
ALTER TABLE `ql_giaytohocsinh`
  ADD CONSTRAINT `ql_giaytohocsinh_ibfk_1` FOREIGN KEY (`id_hoc_sinh`) REFERENCES `ql_hocsinh` (`id`);

--
-- Constraints for table `ql_hocphi`
--
ALTER TABLE `ql_hocphi`
  ADD CONSTRAINT `ql_hocphi_ibfk_1` FOREIGN KEY (`id_hoc_sinh`) REFERENCES `ql_hocsinh` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_hocsinh`
--
ALTER TABLE `ql_hocsinh`
  ADD CONSTRAINT `ql_hocsinh_ibfk_1` FOREIGN KEY (`id_phan_lop`) REFERENCES `ql_phanlop` (`id`),
  ADD CONSTRAINT `ql_hocsinh_ibfk_2` FOREIGN KEY (`id_khoa_hoc`) REFERENCES `dm_khoahoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_hocsinh_ibfk_3` FOREIGN KEY (`id_nang_khieu`) REFERENCES `dm_monhoc` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_lotrinhxe`
--
ALTER TABLE `ql_lotrinhxe`
  ADD CONSTRAINT `ql_lotrinhxe_ibfk_1` FOREIGN KEY (`id_lai_xe`) REFERENCES `ql_nhanvien` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_lotrinhxe_ibfk_2` FOREIGN KEY (`id_monitor`) REFERENCES `ql_nhanvien` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_lotrinhxe_ibfk_3` FOREIGN KEY (`id_tuyen_xe`) REFERENCES `dm_tuyenxe` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_nhanvien`
--
ALTER TABLE `ql_nhanvien`
  ADD CONSTRAINT `ql_nhanvien_ibfk_1` FOREIGN KEY (`id_chuc_vu`) REFERENCES `dm_chucvu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_phanlop`
--
ALTER TABLE `ql_phanlop`
  ADD CONSTRAINT `ql_phanlop_ibfk_1` FOREIGN KEY (`id_he_dao_tao`) REFERENCES `dm_hedaotao` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_phanlop_ibfk_10` FOREIGN KEY (`id_ky`) REFERENCES `tt_ky` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_phanlop_ibfk_11` FOREIGN KEY (`id_khoa_hoc`) REFERENCES `dm_khoahoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_phanlop_ibfk_3` FOREIGN KEY (`id_khoi`) REFERENCES `dm_khoi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_phanlop_ibfk_5` FOREIGN KEY (`id_lop`) REFERENCES `dm_lop` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_phanlop_ibfk_6` FOREIGN KEY (`id_phong_hoc`) REFERENCES `dm_phonghoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_phanlop_ibfk_7` FOREIGN KEY (`id_gv_cn`) REFERENCES `ql_nhanvien` (`id`),
  ADD CONSTRAINT `ql_phanlop_ibfk_8` FOREIGN KEY (`id_gv_nuoc_ngoai`) REFERENCES `ql_nhanvien` (`id`),
  ADD CONSTRAINT `ql_phanlop_ibfk_9` FOREIGN KEY (`id_gv_viet`) REFERENCES `ql_nhanvien` (`id`);

--
-- Constraints for table `ql_phanquyen`
--
ALTER TABLE `ql_phanquyen`
  ADD CONSTRAINT `ql_phanquyen_ibfk_1` FOREIGN KEY (`id_quyen`) REFERENCES `dm_quyen` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_phanquyen_ibfk_2` FOREIGN KEY (`id_tai_khoan`) REFERENCES `ql_taikhoan` (`tai_khoan`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_taikhoan`
--
ALTER TABLE `ql_taikhoan`
  ADD CONSTRAINT `ql_taikhoan_ibfk_1` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_taikhoan_ibfk_3` FOREIGN KEY (`id_hoc_sinh`) REFERENCES `ql_hocsinh` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_thoikhoabieu`
--
ALTER TABLE `ql_thoikhoabieu`
  ADD CONSTRAINT `ql_thoikhoabieu_ibfk_1` FOREIGN KEY (`id_phan_lop`) REFERENCES `ql_phanlop` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ql_thoikhoabieu_ibfk_2` FOREIGN KEY (`id_tuan`) REFERENCES `tt_tuan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ql_thucdon`
--
ALTER TABLE `ql_thucdon`
  ADD CONSTRAINT `ql_thucdon_ibfk_1` FOREIGN KEY (`id_tuan`) REFERENCES `tt_tuan` (`id`);

--
-- Constraints for table `tt_bangcap`
--
ALTER TABLE `tt_bangcap`
  ADD CONSTRAINT `tt_bangcap_ibfk_1` FOREIGN KEY (`id_chuyen_nganh`) REFERENCES `dm_chuyennganh` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_bangcap_ibfk_2` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_nhanvien` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tt_dansu`
--
ALTER TABLE `tt_dansu`
  ADD CONSTRAINT `tt_dansu_ibfk_1` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_nhanvien` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tt_giangday`
--
ALTER TABLE `tt_giangday`
  ADD CONSTRAINT `tt_giangday_ibfk_1` FOREIGN KEY (`id_giang_day`) REFERENCES `ql_giangday` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_giangday_ibfk_2` FOREIGN KEY (`id_tuan`) REFERENCES `tt_tuan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tt_hocsinhdichvu`
--
ALTER TABLE `tt_hocsinhdichvu`
  ADD CONSTRAINT `tt_hocsinhdichvu_ibfk_1` FOREIGN KEY (`id_bang_gia`) REFERENCES `ql_banggia` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_hocsinhdichvu_ibfk_2` FOREIGN KEY (`id_hoc_sinh`) REFERENCES `ql_hocsinh` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tt_honnhan`
--
ALTER TABLE `tt_honnhan`
  ADD CONSTRAINT `tt_honnhan_ibfk_1` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_nhanvien` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tt_hopdong`
--
ALTER TABLE `tt_hopdong`
  ADD CONSTRAINT `tt_hopdong_ibfk_1` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_nhanvien` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tt_hsdixe`
--
ALTER TABLE `tt_hsdixe`
  ADD CONSTRAINT `tt_hsdixe_ibfk_1` FOREIGN KEY (`id_hoc_sinh`) REFERENCES `ql_hocsinh` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_hsdixe_ibfk_2` FOREIGN KEY (`id_tuyen_xe`) REFERENCES `dm_tuyenxe` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tt_lienhe`
--
ALTER TABLE `tt_lienhe`
  ADD CONSTRAINT `tt_lienhe_ibfk_1` FOREIGN KEY (`id_nhan_vien`) REFERENCES `ql_nhanvien` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tt_tkbngay`
--
ALTER TABLE `tt_tkbngay`
  ADD CONSTRAINT `tt_tkbngay_ibfk_1` FOREIGN KEY (`id_thoi_khoa_bieu`) REFERENCES `ql_thoikhoabieu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_tkbngay_ibfk_10` FOREIGN KEY (`tiet10`) REFERENCES `dm_monhoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_tkbngay_ibfk_11` FOREIGN KEY (`tiet11`) REFERENCES `dm_monhoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_tkbngay_ibfk_2` FOREIGN KEY (`tiet1`) REFERENCES `dm_monhoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_tkbngay_ibfk_3` FOREIGN KEY (`tiet2`) REFERENCES `dm_monhoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_tkbngay_ibfk_4` FOREIGN KEY (`tiet3`) REFERENCES `dm_monhoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_tkbngay_ibfk_5` FOREIGN KEY (`tiet4`) REFERENCES `dm_monhoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_tkbngay_ibfk_6` FOREIGN KEY (`tiet6`) REFERENCES `dm_monhoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_tkbngay_ibfk_7` FOREIGN KEY (`tiet7`) REFERENCES `dm_monhoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_tkbngay_ibfk_8` FOREIGN KEY (`tiet8`) REFERENCES `dm_monhoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tt_tkbngay_ibfk_9` FOREIGN KEY (`tiet9`) REFERENCES `dm_monhoc` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
