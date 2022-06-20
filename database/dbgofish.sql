-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 16, 2022 lúc 05:19 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbgofish`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'Xuân Bình', 'xb2721', '123'),
(2, 'Administrator', 'admin', 'admin'),
(3, 'Phạm Văn Phú', 'phamvanphu', 'phamvanphu'),
(4, 'Dương Công', 'duongcong', 'duongcong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `time_add` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`userID`, `productID`, `quantity`, `time_add`) VALUES
(2, 71, 2, '2022-03-16 15:42:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productSKU` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productName` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`productID`, `productSKU`, `productName`, `category`, `detail`, `price`, `stock`, `sold`, `status`, `image`, `userID`) VALUES
(63, 'FH74HD', 'Cá bút chì DỌN DẸP hồ thuỷ sinh', 'Cá, tép, ốc cảnh', 'Đặc điểm của cá bút chì thái:\r\n- Tên khoa học: crossocheilus oblongus\r\n- Xuất xứ: Thái Lan.\r\n- Kích thước: 5-7 cm.\r\n- Màu sắc: trắng và đen.\r\n- Thức ăn: Là giống cá ăn tạp, đặc biệt là rêu hại, nhớt lũa… (nên hạn chế \r\n cho cá ăn bột cám để cá có thể giúp bạn dọn vệ sinh nhé).\r\n- Tuổi thọ: 5-6 năm.', 20000, 45, 0, 1, '63-1.jpg,63-2.jpg', 2),
(64, 'TEPCAM', 'Tép cam một trong những dòng tép cảnh dễ thương nhất', 'Cá, tép, ốc cảnh', 'Với một màu vàng cam phủ đầy khắp mình, tép cam là dòng tép cảnh được anh em chơi thủy sinh tép cảnh chơi phổ biến bậc nhất hiện nay.', 10000, 500, 0, 1, '64-1.jpg,64-2.jpg', 2),
(65, 'NANAW', 'Ráy nana white dòng cây thủy sinh cao cấp dễ trồng', 'Cây thủy sinh', 'Ráy nana white hay còn gọi là ráy trắng là dòng cây thủy sinh được rất nhiều anh em giới chơi thuỷ sinh săn lùng bởi vẻ đẹp sang trọng của chúng.', 300000, 215, 0, 1, '65-1.jpg,65-2.jpg', 1),
(66, 'MYLITTLEOCEAN', 'Bể cá mini dành cho hồ cá biển OF My Little Ocean', 'Bể cá', 'Bể cá mini dành cho hồ cá biển OF My Little Ocean thích hợp với những anh em mới bắt đầu chơi, bởi bộ sản phẩm trang bị hệ thống phụ kiện cho một hồ cá biển', 2700000, 66, 0, 1, '66-1.jpg,66-2.jpg', 3),
(68, 'AQUABLUELED', 'Đèn led thủy sinh siêu sáng Aquablue nhiều kích thước', 'Phụ kiện thủy sinh', 'Đèn led thủy sinh siêu sáng Aquablue nhiều kích thước như Aquablue 30,45,60,80,100,120cm. Đèn led Aquablue cho ra ánh sáng 10000k 65LM siêu sáng.', 300000, 641, 0, 1, '68-1.jpg', 1),
(69, 'RLBL1', 'Tép rili đen hay còn gọi là rili carbon', 'Cá, tép, ốc cảnh', 'Rili đen hay còn gọi là rili carbon là dòng tép cảnh đẹp với đặc điểm nổi bật là các khoang màu đen phân cách bởi phần thân giữa trong suốt rất thu hút người chơi.', 15000, 900, 0, 1, '69-1.jpg', 3),
(70, 'OCTAO1', 'Ốc Táo vệ sinh hồ chuyên ăn thức ăn thừa và phân cá', 'Cá, tép, ốc cảnh', 'Ốc Táo hiện nay đang rất được ưa chuộng không chỉ làm cảnh trong hồ thủy sinh, mà chúng còn có tác dụng dọn vệ sinh hồ vô cùng hiệu quả.', 10000, 400, 0, 1, '70-1.jpg', 3),
(71, 'CA856H', 'Cá phượng hoàng lam', 'Cá, tép, ốc cảnh', 'Đặc điểm của cá phượng hoàng lam:\r\nMàu sắc: màu xanh lam.\r\nKích thước: 3-6 cm.\r\nTên khoa học: Mikrogeophagus ramirezi.\r\nThức ăn: cá phượng hoàng là giống cá ăn tạp, có thể ăn bột cám, trùn chỉ, bo bo…\r\nNhiệt độ nước thích hợp: 26-30 độ C.\r\nĐộ pH nước: 5,5- 6.\r\nXuất xứ: cá được nhân giống tại Việt Nam.\r\nGiá bán: 25.000 VND / 1 con.', 25000, 550, 0, 1, '71-1.jpg', 1),
(72, 'CAXECAN', 'Cá XECAN (cá tứ vân).', 'Cá, tép, ốc cảnh', 'Đặc điểm của cá xecan thuỷ sinh:\r\nTên khoa học: Puntius tetrazona.\r\nXuất xứ: Cambodia (nhân giống tại Việt Nam).\r\nMàu sắc: nhiều màu.\r\nĐặc điểm nhận dạng: có 4 sọc đen.\r\nTuổi thọ: 5 năm.\r\nĐộ pH nước: 5,5 – 7.\r\nĐộ cứng nước: đến 6 dgH.\r\nNhiệt độ nước: 21-30 độ C.', 10000, 256, 0, 1, '72-1.jpg', 3),
(74, 'HCPT045', 'Hồ thuỷ sinh bố cục tượng phật và đá trầm tích.', 'Bể cá', 'Hãng sản xuất: Thuỷ Sinh Xanh', 1400000, 26, 0, 1, '74-1.jpg', 1),
(75, 'HCTX009', 'Hồ thuỷ sinh mini mẫu TX-009', 'Bể cá', 'Đặc điểm nỗi bật của hồ thuỷ sinh mini để bàn mẫu TX-009:\r\nKích thước hồ: 50x33x35 (dài-rộng-cao)\r\nĐầy đủ phụ kiện, tặng kèm cá khi lắp đặt.\r\nDễ chăm sóc, dễ vệ sinh.\r\nSử dụng hồ kính Đúc nên rất an toàn khi có trẻ em.\r\nBố cục tươi mát, có thể nuôi thêm TÉP và ỐC cảnh.\r\nThuỷ sinh xanh hỗ trợ sửa chữa bảo hành.', 2500000, 32, 0, 1, '75-1.jpg', 1),
(76, 'HCTX011', 'Hồ thủy sinh mini mẫu TX-011', 'Bể cá', 'Đặc điểm nỗi bật của hồ thuỷ sinh mini để bàn mẫu TX-011:\r\nKích thước hồ: 40x23x27 (dài-rộng-cao)\r\nĐầy đủ phụ kiện, tặng kèm cá khi lắp đặt.\r\nDễ chăm sóc, dễ vệ sinh.\r\nSử dụng hồ kính Đúc nên rất an toàn khi có trẻ em.\r\nBố cục tươi mát, có thể nuôi thêm TÉP và ỐC cảnh.\r\nThuỷ sinh xanh hỗ trợ sửa chữa bảo hành.', 6300000, 160, 0, 1, '76-1.jpg', 3),
(77, 'CAYNGM053', 'Cỏ ngưu mao chiên lùn xoè “loại 1” chất lượng.', 'Cây thủy sinh', 'Cỏ ngưu mao chiên trồng tiền cảnh hồ thuỷ sinh:\r\nCỏ có dạng hình lá kim, màu xanh tươi.\r\nVị trí trồng: nên trồng cỏ ngưu mao chiên ở vị trí tiền cảnh (vị trí phía trước bể cá). Có thể trồng giữa các vách đá, tạo cảnh núi đá.\r\nNhiệt độ nước: 20-27 độ C.\r\nĐộ pH nước: 6-7,5.\r\nYêu cầu ánh sáng và chất dinh dưỡng: cao.', 30000, 346, 0, 1, '77-1.jpg', 3),
(78, 'VAY-OC-DO', 'Vảy ốc đỏ dòng cây thủy sinh dễ trồng không cần co2', 'Cây thủy sinh', 'Cây thủy sinh Vảy ốc đỏ là dòng cây dễ trồng thường được anh em chơi thủy sinh sử dụng làm trang trí bể cá, bể thủy sinh. Do đặc thù không cần co2 vẫn phát triển tốt nên Vảy ốc đỏ được rất nhiều anh em chơi thủy sinh yêu thích.', 25000, 500, 0, 1, '78-1.jpg', 1),
(80, 'DLEDOA', 'Đèn Led Chihiros chuyên dụng cho hồ thủy sinh dòng A Series', 'Phụ kiện hồ cá', 'Đèn Led Chihiros là mẫu đèn led cao cấp chuyên dụng cho hồ thủy sinh, Đèn Led Chihiros Dòng A Series phù hợp với hầu hết các loại cây thủy sinh.', 365000, 0, 0, 1, '80-1.jpg', 3),
(81, 'AT304S', 'Máy bơm Atman 304s thế hệ mới tiết kiệm điện', 'Phụ kiện hồ cá', 'Máy bơm Atman 304s có mã sản phẩm là at-304s là loại máy bơm bể cá thể hệ mới của hãng Atman, một thương hiệu đến từ Trung Quốc, thiết kế nhỏ gọn và an toà', 130000, 64, 0, 1, '81-1.jpg', 1),
(82, 'HAILEA60', 'Máy sủi oxy dự phòng cúp điện Hailea CP60', 'Phụ kiện hồ cá', 'Hailea CP60 là loại máy sủi oxy công suất cao dự phòng khi cúp điện nhờ hệ thống acquy tics điện bên trong máy sủi. Máy vận hành mạnh và êm.', 1600000, 60, 0, 1, '82-1.jpg,82-2.jpg', 3),
(83, 'KOIFOOD', 'Thức ăn chuyên dụng cho cá Koi Sera Koi Professional Summer', 'Thức ăn', 'Thức ăn chuyên dụng cho cá Koi Sera Koi Professional Summer được chế biến theo công thức đặc biệt cung cấp hàm lượng protein / chất béo cân bằng.', 1450000, 60, 0, 1, '83-1.jpg,83-2.jpg', 2),
(84, 'OFDISC', 'Thức ăn cho cá Dĩa OF Pro Discus', 'Thức ăn', 'Thức ăn cho cá Dĩa OF Pro Discus được chế tạo với công thức đặc chuẩn cho các loài cá Dĩa như Red Melon, Blue Turquoise, Albino, Pigeon Blood...', 140000, 200, 0, 1, '84-1.jpg,84-2.jpg', 1),
(85, 'FLAHAN', 'Thức ăn nhập khẩu cho cá La Hán JBL NovoFlower Maxi', '', 'JBL NovoFlower Maxi là loại thức ăn cho cá cảnh La Hán được sản xuất và nhập khẩu từ Đức, thức ăn dạng cám hạt hỗ trợ cho cá La Hán tăng kích thước đầu.', 370000, 60, 0, 1, '85-1.jpg,85-2.jpg', 1),
(86, '0KAGAYAKI', 'Thức ăn cho cá Koi Kagayaki Koi Food Growth', 'Thức ăn', 'Kagayaki Koi Food Growth là loại thức ăn dạng cám hạt chuyên hỗ trợ cho cá Koi kích màu sắc, phân dải màu chuẩn không bị lem có nguồn gốc Sigapore.', 500000, 250, 0, 1, '86-1.jpg', 2),
(87, 'BELUCGIAC', 'Set bể cá mini hình lục giác cực đẹp Aquael Hexa Set Aquarium', 'Bể cá', 'Aquael Hexa Set Aquarium là loại bể cá mini trọn bộ bao gồm đèn, hồ và lọc. Đây là mẫu bể cá mini vô cùng độc đáo với thiết kế hình lục giác mới lạ.', 3600000, 55, 0, 1, '87-1.jpg,87-2.jpg', 1),
(88, 'CANGUSAC', 'CÁ BA ĐUÔI NGŨ SẮC', 'Cá, tép, ốc cảnh', 'Nếu bạn đang muốn tìm mua một chú cá Ba Đuôi Ngũ Sắc đẹp, lộng lẫy mà vẫn chưa tìm được cửa hàng bán cá cảnh đẹp tại TPHCM, thì cửa hàng cá cảnh Trung Tín là địa chỉ đáng tin cậy để bạn chọn mua. Ngoài cá loại cá cảnh thì cửa hàng hiện đang bán rất nhiều mặc hàng khác nhau phục vụ cho việc thiết kế một hồ cá cảnh sinh động nhất.', 78000, 657, 0, 1, '88-1.jpg,88-2.jpg', 2),
(89, 'CASACGAM', 'CÁ SẶC GẤM', 'Cá, tép, ốc cảnh', 'Cá Sặc Gấm là một trong những loại cá cảnh độc đáo và đẹp mắt được nhiều dân chơi cá cảnh yêu thích và nuôi trong bể cảnh. Đặc biệt, cá sặc gấm còn được đánh giá là loại cá dễ nuôi, có thể thích hợp với những người mới chơi bể cảnh.', 105000, 0, 0, 1, '89-1.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `email_verification_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `phone`, `address`, `password`, `status`, `email_verification_link`, `email_verified_at`) VALUES
(1, 'xuân bình', 'xb2721', 'binhphan2721@gmail.com', '0974486946', 'HN', '$2y$10$RTg/l1ilFEAOdcKHETSiVedKx7yI64XNKPzjJFvsP3HOlAtVIwbPu', 1, 'f9127d2b51814398c924fa37eacb36c62863', '2022-03-05 16:48:28'),
(2, 'Dương Văn Công', 'duongcong', 'duongcong0412hc@gmail.com', '0123456789', 'Bắc Giang', '$2y$10$FgCMKIkt5pvdlSQTcXSQY.n3JyK66iVDZk8Zvj.eg2O9a8L8xo9V6', 1, 'ertujghki67r7iMKIyguSQTcXSQY.n3JyK66iVDZk8Zvj.eg2O9a8L8xo9V6', '2022-03-23 16:32:08'),
(3, 'Công Minh', 'congminh', 'congminh@gmail.com', '03547151268', 'Việt Nam', '$2y$10$UtJ82BrbjIEX0sQ8Vt5Yb.nP1IGKb6m6GFNbVP8GWkN7McGdfpD1K', 1, 'fed0fgu9814398c924fa37eacb36c62863', '2022-03-13 04:47:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`userID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
