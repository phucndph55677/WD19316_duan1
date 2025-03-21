-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2025 at 02:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) VALUES
(1, 26, 2, 'Chó đẹp vậy shop?', '2024-11-29', 1),
(2, 26, 2, 'Em cần tư vấn sản phẩm này shop ơii.', '2024-11-29', 1),
(3, 27, 2, 'Chuột gì to vậy xốp?', '2024-11-29', 2),
(4, 27, 2, 'Có ship đến HCM không xốp ơii?', '2024-11-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(7, 33, 26, '9990000.00', 5, '49950000.00'),
(8, 34, 27, '4990000.00', 2, '9980000.00'),
(9, 34, 28, '7990000.00', 2, '15980000.00'),
(10, 36, 30, '4990000.00', 2, '9980000.00'),
(11, 36, 28, '7990000.00', 2, '15980000.00'),
(12, 36, 27, '4990000.00', 2, '9980000.00'),
(13, 37, 27, '4990000.00', 1, '4990000.00'),
(14, 38, 26, '9990000.00', 2, '19980000.00'),
(15, 38, 27, '4990000.00', 3, '14970000.00'),
(16, 38, 30, '4990000.00', 1, '4990000.00'),
(17, 39, 28, '7990000.00', 4, '31960000.00'),
(18, 39, 27, '4990000.00', 3, '14970000.00'),
(19, 39, 30, '4990000.00', 3, '14970000.00'),
(20, 39, 26, '9990000.00', 3, '29970000.00'),
(21, 42, 26, '9990000.00', 2, '19980000.00'),
(22, 43, 27, '4990000.00', 2, '9980000.00'),
(23, 43, 28, '7990000.00', 2, '15980000.00'),
(24, 44, 27, '4990000.00', 1, '4990000.00'),
(25, 44, 28, '7990000.00', 3, '23970000.00'),
(26, 45, 28, '7990000.00', 1, '7990000.00'),
(27, 46, 28, '7990000.00', 2, '15980000.00'),
(28, 46, 31, '2900000.00', 2, '5800000.00'),
(29, 47, 26, '9990000.00', 3, '29970000.00'),
(30, 47, 30, '4990000.00', 1, '4990000.00'),
(31, 48, 28, '7990000.00', 4, '31960000.00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(24, 25, 28, 11),
(39, 35, 27, 3),
(40, 35, 28, 27),
(41, 35, 30, 4),
(43, 37, 27, 3),
(44, 37, 26, 4),
(45, 37, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten_chuc_vu`) VALUES
(1, 'Quản trị viên'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(1, 'Danh mục chó', 'Chọn lựa hoàn hảo cho chú chó của bạn.\r\n'),
(2, 'Danh mục mèo', 'Chăm sóc mèo cưng toàn diện.\r\n'),
(16, 'Danh mục Capybara', 'Capybara – sự dễ thương và yên bình trong từng khoảnh khắc.'),
(26, 'vAerhr', '');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(42, 'DH-6181', 2, 'Phạm Đức Được', 'phdd3107@gmail.com', '083868386', 'Hà Nội', '2024-12-05', '20010000.00', '', 1, 2),
(43, 'DH-6734', 2, 'Phạm Đức Được', 'phdd3107@gmail.com', '083868386', 'Hà Nội', '2024-12-05', '25990000.00', '', 1, 3),
(44, 'DH-2146', 2, 'Phạm Đức Được', 'phdd3107@gmail.com', '083868386', 'Hà Nội', '2024-12-05', '28990000.00', '', 1, 1),
(45, 'DH-7223', 2, 'Phạm Đức Được', 'phdd3107@gmail.com', '083868386', 'Hà Nội', '2024-12-05', '8020000.00', '', 1, 1),
(46, 'DH-1833', 2, 'Phạm Đức Được', 'phdd3107@gmail.com', '083868386', 'Hà Nội', '2024-12-06', '21810000.00', 'Ship nhanh giúp em', 2, 11),
(47, 'DH-6454', 2, 'Phạm Đức ', 'phd123@gmail.com', '083868386', 'Hà Nội', '2024-12-06', '34990000.00', '', 2, 11),
(48, 'DH-8562', 2, 'Phạm Đức Được', 'phdd3107@gmail.com', '083868386', 'Hà Nội', '2024-12-06', '31990000.00', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(9, 14, './uploads/1732471189C12139-8.jpg'),
(27, 15, './uploads/1732509176anh-meo-Tuxedo-6-1247x1496.jpg'),
(69, 26, './uploads/1733229046C12615-1.jpg'),
(70, 26, './uploads/1733229046C12615-2.jpg'),
(71, 26, './uploads/1733229046C12615-3.jpg'),
(72, 26, './uploads/1733229046C12615-4.jpg'),
(73, 26, './uploads/1733229046C12615-5.jpg'),
(74, 26, './uploads/1733229046C12615-6.jpg'),
(88, 27, './uploads/1733229101pebbles.webp'),
(89, 27, './uploads/1733229101filters_fill(transparent)_quality(75).webp'),
(90, 27, './uploads/1733229101capybara-3247363_1280.jpg'),
(91, 27, './uploads/1733229101capybara-landing-photo.jpg'),
(92, 27, './uploads/1733229101capybara-square-1.jpg.optimal.jpg'),
(93, 28, './uploads/1733229153M12034-2.jpg'),
(94, 28, './uploads/1733229153M12034-4.jpg'),
(95, 28, './uploads/1733229153M12034-7.jpg'),
(96, 28, './uploads/1733229153M12034-8.jpg'),
(98, 30, './uploads/1733270394C12139-1.jpg'),
(99, 30, './uploads/1733270394C12139-2.jpg'),
(100, 30, './uploads/1733270394C12139-3.jpg'),
(101, 30, './uploads/1733270394C12139-4.jpg'),
(102, 30, './uploads/1733270394C12139-8.jpg'),
(103, 30, './uploads/1733270394C12139-10.jpg'),
(104, 31, './uploads/1733445252M12073-3 - Copy.jpg'),
(105, 31, './uploads/1733445252M12073-3.jpg'),
(106, 31, './uploads/1733445252M12073-5.jpg'),
(107, 31, './uploads/1733445252M12073-6.jpg'),
(108, 31, './uploads/1733445252M12073-7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD(Thanh toán khi nhận hàng)'),
(2, 'Thanh toán VNPay');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` decimal(11,2) NOT NULL,
  `gia_khuyen_mai` decimal(11,2) DEFAULT NULL,
  `hinh_anh` text,
  `so_luong` int NOT NULL,
  `luot_xem` int DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `mo_ta` text,
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(26, 'Chó Alaska Standard Nâu Đỏ Đực', '10000000.00', '9990000.00', './uploads/1733229012C12615-1.jpg', 10, 0, '2024-12-02', 'Alaska Standard Nâu Đỏ Đực (Alaskan Malamute màu nâu đỏ) là một giống chó kéo xe nổi tiếng, được yêu thích bởi vẻ ngoài mạnh mẽ, uy nghiêm và tính cách trung thành, đáng tin cậy. Chó đực thuộc dòng Alaska Standard thường có kích thước lớn, với chiều cao trung bình từ 63-68 cm và cân nặng khoảng 38-45 kg.\r\n\r\nĐặc điểm ngoại hình:\r\n\r\nBộ lông: Dày, hai lớp, màu nâu đỏ chủ đạo kết hợp với các mảng lông trắng ở mặt, bụng, chân và đuôi. Lớp lông bên ngoài dài và cứng, trong khi lớp lông bên trong mềm mại, giúp chúng chịu được điều kiện lạnh giá.\r\nĐôi mắt: Hình hạnh nhân, thường có màu nâu, tạo nên ánh nhìn hiền lành và thông minh.\r\nĐầu: To, cân đối với mõm rộng và đôi tai dựng đứng.\r\nĐuôi: Xù lông, cong nhẹ trên lưng, đặc trưng của các giống chó kéo xe.', 1, 1),
(27, 'Capybara', '5000000.00', '4990000.00', './uploads/1733229111pebbles.webp', 30, 0, '2024-12-02', 'Capybara, hay còn gọi là chuột lang nước, là loài gặm nhấm lớn nhất thế giới, nổi tiếng với tính cách hiền hòa và thân thiện với cả con người lẫn các loài động vật khác. Tên khoa học của chúng là Hydrochoerus hydrochaeris, thuộc họ hàng gần với chuột lang nhà (guinea pig). Capybara chủ yếu sống ở các khu vực rừng nhiệt đới và đầm lầy của Nam Mỹ.\r\n\r\nĐặc điểm ngoại hình:\r\nKích thước: Capybara có thể dài từ 100-130 cm và cao khoảng 50-60 cm tính từ vai, với cân nặng dao động từ 35-66 kg.\r\nLông: Bộ lông ngắn, thô và màu nâu hoặc vàng nhạt, giúp chúng ngụy trang tốt trong môi trường tự nhiên.\r\nĐầu: Đầu to, mõm tròn và đôi tai nhỏ, với đôi mắt nằm ở vị trí cao trên đầu, thích hợp cho cuộc sống dưới nước.\r\nChân: Chân ngắn và khỏe, với màng giữa các ngón chân giúp chúng bơi lội giỏi.', 16, 1),
(28, 'Mèo Anh Lông Dài Cái', '8000000.00', '7990000.00', './uploads/1733240003M12034-1.jpg', 25, 0, '2024-12-02', 'Mèo Anh Lông Dài (British Longhair) là một giống mèo cảnh thanh lịch và đáng yêu, nổi bật với bộ lông dài mềm mại và vẻ ngoài quý phái. Chúng là một biến thể của Mèo Anh Lông Ngắn, được phát triển khi lai tạo với các giống mèo lông dài, giữ lại những đặc điểm đặc trưng về thân hình chắc khỏe và gương mặt bầu bĩnh dễ thương.\r\n\r\nĐặc điểm ngoại hình: \r\nBộ lông: Dài, dày và mượt mà, với nhiều màu sắc đa dạng như xanh xám, trắng, đen, vàng, hoặc màu vân mướp (tabby). Lông ở cổ và ngực thường dày hơn, tạo cảm giác như một chiếc \"bờm\" nhỏ.\r\nĐôi mắt: Tròn lớn, sáng, với màu sắc phù hợp với màu lông (vàng đồng, xanh lá, xanh lam).\r\nThân hình: Chắc nịch, thân hình cỡ trung với bốn chân ngắn và bàn chân tròn. Đuôi dài vừa phải, phủ lông dày và xù.\r\nMặt: Tròn, với gương mặt biểu cảm và chiếc mũi ngắn nhưng không tẹt.', 2, 1),
(30, 'Chó Samoyed Đực', '5000000.00', '4990000.00', './uploads/1733270394C12139-1.jpg', 20, 0, '2024-12-04', 'Chó Samoyed đực là một giống chó cỡ trung đến lớn, nổi tiếng với bộ lông trắng như tuyết và nụ cười đặc trưng, thường được gọi là \"Samoyed smile\". Chúng có thân hình vạm vỡ nhưng cân đối, ngực sâu, và bộ lông dày hai lớp để chịu được thời tiết lạnh giá. Lớp lông ngoài dài, bóng mượt và không thấm nước, trong khi lớp lông lót mềm mịn giúp giữ ấm.\r\n\r\nChó Samoyed đực thường cao từ 53-60 cm và nặng khoảng 20-30 kg, với kích thước lớn hơn một chút so với con cái. Chúng có đôi mắt hình hạnh nhân, màu nâu sẫm, toát lên vẻ thông minh và thân thiện. Đuôi của Samoyed đực luôn cuộn tròn lên lưng, phủ lông dày, tạo nên dáng vẻ quý phái.\r\n\r\nTính cách của chúng cực kỳ hòa đồng, trung thành và yêu thương gia đình. Chúng rất thích vận động, chạy nhảy và có bản năng làm việc mạnh mẽ, vốn là di sản từ tổ tiên làm việc trong điều kiện khắc nghiệt ở Bắc Cực. Chó Samoyed đực cũng rất dễ huấn luyện, nhưng cần sự kiên nhẫn và nhất quán vì chúng có thể hơi bướng bỉnh.\r\n\r\nChúng phù hợp với những gia đình năng động và cần không gian để vận động. Tuy nhiên, cần lưu ý chăm sóc bộ lông kỹ lưỡng để tránh rối và giữ cho chúng luôn sạch sẽ. Chó Samoyed đực là một người bạn đồng hành tuyệt vời, không chỉ bởi vẻ ngoài đáng yêu mà còn bởi tính cách dễ mến, vui vẻ và trung thành.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 1, 1),
(31, 'Mèo Ba Tư Đực', '3000000.00', '2900000.00', './uploads/1733445252M12073-1.jpg', 30, 0, '2024-12-05', 'Mèo Ba Tư', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `anh_dai_dien` text,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `so_dien_thoai` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gioi_tinh` tinyint(1) DEFAULT '1',
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `chuc_vu_id` int NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(1, 'Nguyễn Đức Phúc', './uploads/1732771025C12615-1.jpg', '2005-01-01', 'ndp112005@gmail.com', '0987654321', 1, 'Thái Bình', '$2y$10$W7NhObkucDm7K3INNt61JeWb2j8mUd9EMv/Xuirt9z.ICu2lrlhs2', 1, 1),
(2, 'Phạm Đức Được', './uploads/1732771025C12615-1.jpg', '2005-07-31', 'phdd3107@gmail.com', '083868386', 1, 'Hà Nội', '$2y$10$cPY./Y0hwmNt5Snc7jNvqOtX.W6L2j/AZyClpa4AwM/W4WA9QKNLC', 1, 1),
(3, 'Đào Thanh Bình', './uploads/1732771025C12615-1.jpg', '2005-01-16', 'binhdt11@gmail.com', '0988776655', 1, 'Thái Bình', '$2y$10$9K.EHAG0SHOkGZuBcmTIwOKBFQuLyGdPZPOdUXrGC2XcacRMp8XeS', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chưa xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Chưa thanh toán'),
(4, 'Đã thanh toán'),
(5, 'Đang chuẩn bị hàng'),
(6, 'Đang giao'),
(7, 'Đã giao'),
(8, 'Đã nhận'),
(9, 'Thành công'),
(10, 'Hoàn hàng'),
(11, 'Hủy đơn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
