-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th3 08, 2021 lúc 04:36 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(4, 'Asus'),
(5, 'LG'),
(14, 'nhom 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muahang`
--

DROP TABLE IF EXISTS `muahang`;
CREATE TABLE IF NOT EXISTS `muahang` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `IdUser` int(20) NOT NULL,
  `DateCreate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `Message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muahang_product`
--

DROP TABLE IF EXISTS `muahang_product`;
CREATE TABLE IF NOT EXISTS `muahang_product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IdProduct` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `IdOrder` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pro_image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `manu_id` (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`, `created_at`) VALUES
(2, 'Apple Watch S6 LTE', 1, 1, 14391000, 'apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-ava-600x600.jpg', 'Apple Watch S6 LTE 40mm viền nhôm dây cao su sở hữu màn hình 1.57 inch giúp hiển thị đầy đủ thông tin và hình ảnh sắc nét. Dây đeo được làm từ chất liệu cao su dẻo dai và êm ái, cho cảm giác dễ chịu khi mang. Thêm vào đó, mặt kính cường lực Sapphire giúp chống trầy, tăng độ bền cho thiết bị. Các đường nét được thiết kế tinh xảo làm nên sự đẳng cấp của Apple Watch.', 0, '2021-01-05 06:49:45'),
(3, 'Laptop LG Gram 17 i7 1065G7/8GB/512GB/Win10', 5, 3, 38490000, 'lg-gram-17-i7-17z90n-vah75a5-142120-022156-600x600.jpg', 'LG Gram đem đến thiết kế siêu mỏng nhẹ chỉ 1.35 kg với một chiếc laptop 17 inch.\r\n\r\nThân máy được hoàn thiện từ chất liệu hợp kim Nano Carbon - Magie sang trọng và bền bỉ, tự tin đồng hành cùng bạn trong mọi tình huống.', NULL, '2020-11-17 08:13:38'),
(4, 'Điện thoại iPhone 11 128GB (Hộp mới)\r\n\r\n', 3, 1, 21990000, 'iphone-11-128gb-hop-moi-292520-102507-400x460.png', 'Năm nay với iPhone 11 thì Apple đã nâng cấp khá nhiều về camera nếu so sánh với chiếc iPhone Xr 128GB năm ngoái.', 1, '2020-11-17 08:28:05'),
(5, 'Điện thoại Realme C15\r\n', 3, 1, 4190000, 'realme-c15-xanh-duong-600x600-600x600.jpg', 'Realme C15 sử dụng màn hình IPS LCD 6.5 inch có độ phân giải HD+, màn hình này không thật sự ấn tượng về mặt thông số nhưng vẫn đảm bảo về chất lượng hình ảnh, màn hình không quá rỗ và gây cảm giác khó chịu. Với kích thước này cùng với thiết kế màn hình giọt nước nên tạo hiệu ứng khung ảnh lớn để trải nghiệm xem phim hay chơi game đã mắt.', 1, '2021-01-04 20:58:05'),
(6, 'Máy tính để bàn Apple Mac Mini i3 3.6GHz/8GB/256GB (MXNF2SA/A)\r\n\r\n', 2, 1, 21490000, 'apple-mac-mini-i3-mxnf2saa-600x600.jpg', 'Một thiết bị nhỏ nhưng có thể giải quyết các công việc lớn, đó chỉ có thể là Mac Mini.\r\n\r\nVới sự nhỏ gọn của Mac Mini, đây sẽ là một thiết bị tích hợp hiệu năng di động tuyệt vời. Máy Mac có thiết kế là một khối hình vuông với cạnh dài 19.7 cm, độ dày chỉ 3.6 cm và chỉ nặng 1.3 kg, rất tiện lợi mang đi bất cứ đâu. Mac Mini mở ra khái niệm mới về máy tính để bàn, không còn là chiếc CPU cồng kềnh nặng gần chục kí.', 1, '2020-11-17 08:33:45'),
(7, 'Máy tính bảng iPad 8 Wifi 32GB (2020)\r\n', 2, 1, 9990000, 'ipad-gen-8-wifi-bac-new-600x600-600x600.jpg', 'Chất liệu thân thiện với môi trường\r\niPad 2020 được thiết kế để thân thiện với môi trường và hỗ trợ kế hoạch của Apple để tất cả sản phẩm của họ trung tính carbon trong tương lai. iPad 8 sử dụng vỏ nhôm và thiếc tái chế 100%, chất liệu này vừa an toàn lại cho chiếc máy sự sang trọng đầy sức hút.', 1, '2021-01-04 21:17:23'),
(8, 'Đồng hồ Nam SR Watch SG10051.1101PL', 1, 2, 3160000, 'sr-watch-sg10051-1101pl-nam-600x600.jpg', 'Chỉn chu trong thiết kế, bền bỉ và mạnh mẽ\r\nThương hiệu đồng hồ SR Watch đại diện cho những người trẻ nhiệt tình, thời thượng, muốn hướng đến phong cách thời trang sang trọng. Tuy có cùng phong cách thiết kế Bauhaus thời thượng như các hãng thời trang Daniel Wellington, MVMT… nhưng về mặt chất lượng thì đồng hồ SR vượt trội so với các hãng cùng phân khúc và giá cao hơn SR. ', 1, '2020-11-17 08:43:23'),
(9, 'Điện thoại iPhone SE 256GB (2020) (Hộp mới)\r\n', 1, 2, 16990000, 'iphone-se-256gb-2020-hop-moi-292720-102747-600x600.jpg', 'Gọn nhẹ chắc chắn thoải mái sử dụng\r\niPhone SE 2020 có thiết kế khá nhỏ bé khi đặt cạnh các smartphone màn hình khủng hiện nay, nhưng với những ai không thích kiểu thiết kế tràn viền và màn hình lớn, thì đây sẽ là lựa chọn tốt nhất cho họ.\r\n\r\nVới màn hình 4.7 inch, viền màn hình khá dày, cùng cảm biến vân tay Touch ID, các cạnh bo cong hoàn hảo, iPhone SE 2020 mang lại cảm giác cầm nắm quen thuộc, kích thước nhỏ gọn để bạn sử dụng 1 tay một cách dễ dàng.\r\n\r\nChiếc điện thoại mới nhà Táo trang bị màn hình Retina 4.7 inch, tuy chỉ có độ phân giải HD nhưng vẫn cho chất lượng hiển thị tốt với công nghệ True Tone tự cân chỉnh màu theo môi trường xung quanh.', 0, '2021-01-04 21:00:36'),
(10, 'Đồng hồ định vị trẻ em Kidcare 08S', 1, 2, 1390000, 'kidcare-08s-ava-600x600.jpg', 'Đặc điểm nổi bật của Đồng hồ định vị trẻ em Kidcare 08S\r\n\r\nMàu sắc trẻ trung, năng động\r\nĐồng hồ thông minh trẻ em Kidcare 08S có thiết kế màn hình 1.3 Inch, độ phân giải 240 x 240 Pixels cùng với dây đeo làm từ silicone mang đến cảm giác êm ái khi đeo. Tính năng nổi trội ở mẫu đồng hồ này là khả năng định vị chuẩn xác, cảnh báo vùng nguy hiểm và gọi điện khẩn cấp, giúp phụ huynh của bé có thể yên tâm theo dõi bé từ xa.', 1, '2020-11-17 08:46:06'),
(11, 'Realme 7', 1, 2, 6990000, 'realme-7-043120-113149-400x460.png', 'Mặt sau của máy lấy cảm hứng từ không gian gương trong tự nhiên, Realme 7 có thiết kế gương rực rỡ. Sự chia cắt táo bạo mang đến một tác động thị giác mới với hiệu ứng ánh sáng tuyệt đẹp, vẻ đẹp tự nhiên cân bằng được bộc lộ.', 1, '2020-11-17 09:19:22'),
(12, 'Samsung Galaxy Tab S6 Lite', 5, 1, 9990000, 'samsung-galaxy-tab-s6-lite-xanh-400x460-400x460.png', 'Máy tính bảng Galaxy Tab S6 Lite sở hữu thiết ấn tượng với độ dày chỉ 7mm và trọng lượng siêu nhẹ 467g, giúp người dùng dễ dàng bỏ vào túi xách hay mang theo bất kì đâu.', 0, '2021-02-26 01:38:18'),
(13, 'Xiaomi Redmi 9C', 1, 2, 2490000, 'realme-7-043120-113149-400x460.png', 'Xiaomi Redmi 9C sở hữu trong mình thiết kế bo tròn mềm mại ở các cạnh mang lại cảm giác thoải mái khi cầm nắm, các nhà sản xuất hoàn thiện rất tỉ mỉ từ đó mang lại sự sang trọng và tinh tế cho sản phẩm.', 1, '2020-11-17 09:19:22'),
(14, 'Vsmart Star 4', 4, 7, 7290000, 'vsmart-star-4-3gb-071120-101129-400x460.png', 'Vsmart Star 4 trang bị màn hình viền mỏng, độ phân giải HD+ sắc nét mọi góc nhìn với tấm nền IPS LCD, nâng cao trải nghiệm hình ảnh cho người dùng khi xem phim, lướt web, chơi game', 0, '2020-11-17 09:19:22'),
(15, 'Xiaomi Redmi Note 8 Pro', 1, 8, 5990000, 'xiaomi-redmi-note-8-pro-trang-new-600x600-600x600.jpg', 'Mặt sau của máy lấy cảm hứng từ không gian gương trong tự nhiên, Realme 7 có thiết kế gương rực rỡ. Sự chia cắt táo bạo mang đến một tác động thị giác mới với hiệu ứng ánh sáng tuyệt đẹp, vẻ đẹp tự nhiên cân bằng được bộc lộ.', 1, '2021-01-04 21:01:36'),
(16, 'Xiaomi Redmi Note 9', 5, 4, 4790000, 'xiaomi-redmi-note-9-5g-600x600-600x600.jpg', 'Mặt sau của máy lấy cảm hứng từ không gian gương trong tự nhiên, Realme 7 có thiết kế gương rực rỡ. Sự chia cắt táo bạo mang đến một tác động thị giác mới với hiệu ứng ánh sáng tuyệt đẹp, vẻ đẹp tự nhiên cân bằng được bộc lộ.', 0, '2021-01-04 20:59:15'),
(17, 'Vivo Y12s', 5, 1, 4290000, 'vivo-y12s-xanh-600x600.jpg', 'Mặt sau của máy lấy cảm hứng từ không gian gương trong tự nhiên, Realme 7 có thiết kế gương rực rỡ. Sự chia cắt táo bạo mang đến một tác động thị giác mới với hiệu ứng ánh sáng tuyệt đẹp, vẻ đẹp tự nhiên cân bằng được bộc lộ.', 1, '2021-02-26 01:38:07'),
(18, 'Vivo V19', 3, 1, 7990000, 'vivo-v19-neo-den-600x600.jpg', 'Mặt sau của máy lấy cảm hứng từ không gian gương trong tự nhiên, Realme 7 có thiết kế gương rực rỡ. Sự chia cắt táo bạo mang đến một tác động thị giác mới với hiệu ứng ánh sáng tuyệt đẹp, vẻ đẹp tự nhiên cân bằng được bộc lộ.', 1, '2021-02-26 01:38:10'),
(19, 'iPhone 11 Pro 256GB', 1, 2, 30990000, 'iphone-12-pro-512gb-190620-020621-400x400.png', 'Mặt sau của máy lấy cảm hứng từ không gian gương trong tự nhiên, Realme 7 có thiết kế gương rực rỡ. Sự chia cắt táo bạo mang đến một tác động thị giác mới với hiệu ứng ánh sáng tuyệt đẹp, vẻ đẹp tự nhiên cân bằng được bộc lộ.', 0, '2021-01-04 21:03:56'),
(20, 'Nokia 5.3', 1, 2, 2890000, 'nokia-53-xam-600x600-600x600.jpg', 'Mặt sau của máy lấy cảm hứng từ không gian gương trong tự nhiên, Realme 7 có thiết kế gương rực rỡ. Sự chia cắt táo bạo mang đến một tác động thị giác mới với hiệu ứng ánh sáng tuyệt đẹp, vẻ đẹp tự nhiên cân bằng được bộc lộ.', 1, '2021-01-04 21:16:15'),
(21, 'Vivo V20', 1, 2, 8490000, 'vivo-v20-400-xanh-hong-400x460.png', 'V20 có thiết kế hiện đại theo xu hướng của những smartphone cao cấp hiện nay với thiết kế nguyên khối kết hợp cùng mặt lưng kính cao cấp tạo nên độ bóng bẩy, ấn tượng ngay từ cái nhìn đầu tiên.', 0, '2020-11-17 09:19:22'),
(22, 'iPhone 11 Pro Max 512GB', 1, 2, 37990000, 'iphone-11-pro-max-512gb-gold-600x600.jpg', 'iPhone 11 Pro Max 512GB năm nay sử dụng chip Apple A13 Bionic mới nhất, nhanh và tiết kiệm điện hơn so với A12 năm ngoái dễ dàng giúp điện thoại chơi game tốt và mượt mà ở mức cấu hình max setting mà không phải lo về vấn đề giật lag.', 0, '2021-01-04 21:13:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Điện Thoại'),
(2, 'Đồng Hồ'),
(3, 'Laptop'),
(4, 'Table'),
(5, 'PC'),
(32, 'nhom 22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `UserName` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PassWord` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Role` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PhoneNumber` int(10) DEFAULT NULL,
  `Name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username` (`UserName`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `UserName`, `PassWord`, `Role`, `Email`, `PhoneNumber`, `Name`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'admin123@yahoo,com', 1644240014, 'Quan Ly');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
