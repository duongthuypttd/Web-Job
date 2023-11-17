-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 21, 2023 lúc 04:05 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apply_job`
--

CREATE TABLE `apply_job` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(200) NOT NULL,
  `userId` int(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL DEFAULT 'Waiting',
  `img` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `interviewDate` varchar(100) NOT NULL,
  `businessNote` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `apply_job`
--

INSERT INTO `apply_job` (`id`, `name`, `position`, `userId`, `userName`, `state`, `img`, `language`, `experience`, `area`, `interviewDate`, `businessNote`) VALUES
(1, 'FPT', 'FPT Solfware', 1, 'ngoc', 'Yes', '../images/logo_fpt.png', 'Java', '1-2 năm', 'Quan 1', '', 'chào mừng bạn'),
(2, 'Techcombank', 'Fresher Software Engineer', 1, 'ngoc', 'Waiting', '../images/logo_techcombank.PNG', 'Python', 'Dưới 6 tháng', 'Quan 7', '', ''),
(32, 'FPT', 'FPT Solfware', 3, 'duong', 'Yes', '../images/logo_fpt.png', 'Java', '1-2 năm', 'Quan 1', '', ''),
(33, 'ANTSOMI', 'Junior', 5, 'vinh', 'Waiting', '../images/anto.png', 'Java', '1 - 2 năm', 'Bình Thạnh', '', ''),
(34, 'F88', 'Software Deveploper', 4, 'tuyen', 'Waiting', '../images/logo_F88.PNG', 'Python', '2 - 3 năm', 'Quan 10', '', ''),
(35, '<br />\n<b>Warning</b>:  Undefined variable $row in <b>C:xampphtdocsJob_handlejobDetail.php</b> on li', '<br />\n<b>Warning</b>:  Undefined variable $row in <b>C:xampphtdocsJob_handlejobDetail.php</b> on line <b>86</b><br />\n<br />\n<b>Warning</b>:  Trying to access array offset on value of type null in <b', 7, 'ngoc', 'Waiting', '<br />\n<b>Warning</b>:  Undefined variable $row in <b>C:xampphtdocsJob_handlejobDetail.php</b> on li', '<br />\n<b>Warning</b>:  Undefined variable $row in <b>C:xampphtdocsJob_handlejobDetail.php</b> on li', '<br />\n<b>Warning</b>:  Undefined variable $row in <b>C:xampphtdocsJob_handlejobDetail.php</b> on li', '<br />\n<b>Warning</b>:  Undefined variable $row in <b>C:xampphtdocsJob_handlejobDetail.php</b> on li', '', ''),
(36, 'ACB', 'Senior (Database Science)', 7, 'ngoc', 'Waiting', '../images/acb.png', '.NET', '2 - 3 năm', 'Quan 1', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hotline` int(20) NOT NULL,
  `customer_mail` varchar(100) NOT NULL,
  `official_website` varchar(100) NOT NULL,
  `official_facebook` varchar(100) NOT NULL,
  `head_offices` varchar(2000) NOT NULL,
  `progress` varchar(2000) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `business`
--

INSERT INTO `business` (`id`, `name`, `hotline`, `customer_mail`, `official_website`, `official_facebook`, `head_offices`, `progress`, `img`) VALUES
(2, 'FPT', 19006600, 'hotrokhachhang@fpt.com.vn', '&#039;www.fpt.vn', 'www.facebook.com/fpttelecom', 'PVI Building, No. 1 Pham Van Bach Street, Cau Giay District', 'Sau 22 năm, FPT được triển khai ở 20 tỉnh thành trên toàn quốc với hơn 1.500 dịch vụ công trực tuyến, trên 600000 hồ sơ được giải quyết/năm tiết kiệm chi', '../images/fpt.png'),
(3, 'F88', 19206100, '88@gmail.com', 'www.f88.vn', 'www.facebook.com/f88', 'Quận 5', '12 năm', '../images/logo_F88.PNG'),
(4, 'ACB', 285412035, 'acbank@gmail.com', 'http://www.acbjobs.com.vn/', 'https://www.facebook.com/NganHangACB', '442 Nguyễn Thị Minh Khai, Phường 5, Quận 3', 'Liên hệ : 1800 577775 -Công ty con: Công ty Chứng khoán ACB&#039;, &#039;Ngân hàng cho vay vốn', '../images/acb.png'),
(6, 'CAFE24 VINA', 909111545, '9095@gmail.com', 'https://cafe24.vn', 'www.facebook.com//cafe24.vn/', 'Tầng 20, AP Tower, 518B Điện Biên Phủ, Phường 21, Quận Bình Thạnh, Thành phố Hồ Chí Minh', '-Mã số doanh nghiệp: 0315766045 \r\nTriển khai các dự án đến máy chủ sản xuất Tư vấn giải pháp kỹ thuật', '../images/logo_cafe24.png'),
(7, 'SAMSUNG ELECTRONICS VIỆT NAM', 222369687, 'im.promo.licence.samsung@gmail.com', 'https://news.samsung.com/global', 'https://www.facebook.com/samsungelectronics', 'Số 2, đường Hải Triều, Phường Bến Nghé, Quận 1', 'Bán buôn máy móc, thiết bị và phụ tùng máy', '../images/sse.png'),
(9, 'Techcombank', 1800588822, 'techcombank@techcombank.com.vn', 'www.techcombank.vn', 'https://www.facebook.com/Techcombank', 'Lim Tower, 9-11 Đ. Tôn Đức Thắng, Bến Nghé, Quận 1', 'LH : 1800 588822&#039;, &#039;Xây dựng và thiết kế cơ sở dữ liệu&#039;', '../images/logo_techcombank.PNG'),
(23, 'VINHOMES', 1900232389, 'info@vinhomes.vn', 'https://vinhomes.vn/vi/thong-tin-lien-he-vinhomes', 'https://www.facebook.com/vinhomes.vn', '08 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh', '08 Nguyễn Hữu Cảnh, Phường 22, Quận --Bình Thạnh, TP. Hồ Chí Minh. rn-Địa chỉ 2: 720 A Điện Biên Phủ, Phường 22, Quận Bình Thạnh, TP. Hồ Chí Minh.rn-Điện thoại : 1900 2323 89rn-Email : info@vinh', '../images/vin.png'),
(25, 'THANKSLAB', 19206102, 'ssa@gmail.com', 'www.thankslab.vn', 'www.facebook.com/thankslab', '124 nguyễn hữu thọ', 'mới phát triển', '../images/slab.png'),
(26, 'INFINIUM RESEARCH', 190066455, 'infinium@gmail.com', 'www.infinium.vn', 'https://www.facebook.com/infinium', '123 nguyễn hữu thọ quận 7 tp hcm', 'đã thành lập được 20 năm', '../images/infu.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `area` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `worktime` varchar(20) NOT NULL,
  `availableApply` varchar(20) NOT NULL,
  `benefits` varchar(1500) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `area`, `language`, `experience`, `salary`, `position`, `description`, `address`, `worktime`, `availableApply`, `benefits`, `img`) VALUES
(1, 'FPT', 'Quan 1', 'Java', '1-2 năm', '1000$', 'FPT Solfware', 'Work closely with the product team to involve in new systems development, enhancements and maintenance to existing applications to ensure alignment with business objectivesrn-Responsible for programming, problem resolution and user support for one or more system applicationsrnPlan, execute, and monitor projects assigned to ensure deliverables are within scope, resources, budget and schedulern-Responsible for guiding teams of senior and junior developers in their daily workrnEnsure codes are written to industry standards in terms of security and designrnMaintains version control with the team using Gitrn-Manages deliverables with the Agile/ SCRUM methodology (on the JIRA platform)rnResponsible for setting up, maintaining and deploying different environments including but not limited to Development, Staging, and Production in a Microservice ArchitecturernPrepares technical and user documentation', '12 Quan 1', 'Part-time', '12/5/2023', 'Lương CB từ 7.300.000 đến 13.800.000 + commision', '../images/logo_fpt.png'),
(2, 'F88', 'Quan 10', 'Python', '2 - 3 năm', '10000$', 'Software Deveploper', 'Tham gia xây dựng kế hoạch thực hiện tích hợp/chuyển đổi hệ thống.rn-Tham gia xây dựng tài liệu thiết kế kỹ thuật, Tham mưu giải pháp tích hợp hệ thống.rn-Tham mưu và đề xuất phương án cải tiến nhằm nâng cao khả năng chịu tải và an toàn cho các kết nối giữa các hệ thống với nhau.rn-Lập trình tích hợp, kiểm tra, sửa lỗi các hệ thống theo kế hoạch đảm bảo tuân thủ theo quy trình nghiệp vụ, tiến độ, tiêu chuẩn, chất lượng, sản phẩm CNTT.', '142 Quan 10 tp HCM', 'Full-time', '12/5/2023', 'lương cao', '../images/logo_F88.PNG'),
(3, 'Techcombank', 'Quan 7', 'Python', 'Dưới 6 tháng', '500$', 'Fresher Software Engineer', 'm gia vào hoạt động phát triển phần mềmrn-Nghiên cứu, đề xuất các giải pháp kỹ thuật giúp nâng cao chất lượng sản phẩmrn-Chủ động kiểm tra &amp; xử lý ở mức cơ bản các sự cố đang gặp phải', 'Số 9-11 Tôn Đức Thắng, Phường Bến Nghé, Quận 1', 'Part-time', '12/5/2023', 'thưởng Tết lên đến 1.84 tháng lương', '../images/logo_techcombank.PNG'),
(4, 'ACB', 'Quan 1', '.NET', '2 - 3 năm', '1000$', 'Senior (Database Science)', 'át triển và cho phép dữ liệu lớn và các giải pháp phân tích hàng loạt/thời gian thực tận dụng các công nghệ mới nổi.rn-Làm việc theo nhóm để xây dựng các ứng dụng phân tích và hồ dữ liệu Hadoop thế hệ tiếp theo trên một nhóm các công nghệ cốt lõi của Hadoop', '567 lê văn lương quận 7', 'Part-time', '12/5/2023', 'lương cứng cao', '../images/acb.png'),
(5, 'ANTSOMI', 'Bình Thạnh', 'Java', '1 - 2 năm', '5200$', 'Junior', 'iao tiếp và hợp tác chặt chẽ với nhiều nhóm nội bộ (BOD, tiếp thị, sản phẩm, nhà điều hành,...) để xác định và hiểu nhu cầu và mong muốn của khách hàng', '2 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh', 'Part-time', '12/5/2023', 'Được hưởng đầy đủ các chế độ phúc lợi: đóng BHXH, BHYT, BHTN,..', '../images/anto.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `love_jobs`
--

CREATE TABLE `love_jobs` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `available` varchar(20) NOT NULL,
  `area` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `job_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `love_jobs`
--

INSERT INTO `love_jobs` (`id`, `name`, `position`, `language`, `salary`, `experience`, `available`, `area`, `img`, `user_id`, `job_id`) VALUES
(10, 'F88', 'Software Deveploper', 'Python', 'Software Deveploper', '2 - 3 năm', '12/5/2023', 'Quan 10', '../images/logo_F88.PNG', 1, 2),
(11, 'FPT', 'FPT Solfware', 'Java', 'FPT Solfware', '1-2 năm', '12/5/2023', 'Quan 1', '../images/logo_fpt.png', 1, 1),
(12, 'FPT', 'FPT Solfware', 'Java', 'FPT Solfware', '1-2 năm', '12/5/2023', 'Quan 1', '../images/logo_fpt.png', 3, 1),
(13, 'Techcombank', 'Fresher Software Engineer', 'Python', 'Fresher Software Engineer', 'Dưới 6 tháng', '12/5/2023', 'Quan 7', '../images/logo_techcombank.PNG', 5, 3),
(14, 'FPT', 'FPT Solfware', 'Java', 'FPT Solfware', '1-2 năm', '12/5/2023', 'Quan 1', '../images/logo_fpt.png', 4, 1),
(15, 'ACB', 'Senior (Database Science)', '.NET', 'Senior (Database Science)', '2 - 3 năm', '12/5/2023', 'Quan 1', '../images/acb.png', 4, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
(2, 'admin', '123456'),
(3, 'duong', '123456'),
(4, 'tuyen', '123456'),
(5, 'vinh', '123456'),
(6, 'ngoc1', '123456'),
(7, 'ngoc', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_cv`
--

CREATE TABLE `user_cv` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `cccd` varchar(100) NOT NULL,
  `study` varchar(1000) NOT NULL,
  `experience` varchar(1000) NOT NULL,
  `certificate` varchar(1000) NOT NULL,
  `award` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_cv`
--

INSERT INTO `user_cv` (`id`, `user_id`, `name`, `birthday`, `sex`, `phone`, `email`, `address`, `cccd`, `study`, `experience`, `certificate`, `award`) VALUES
(15, 3, 'Phạm Thị Thùy Dương', '01/01/2002', 'Nữ', '03244530788', 'duong@gmail.com', '12 cầu Sài Gòn, tp HCM', '1467128994', '12/12', '2 năm developer', 'chưa', 'không'),
(16, 4, 'Trần Thị Anh Tuyền', '01/02/2002', 'Nữ', '0345234466', 'tuyen@gmail.com', '344 quận 8, tp hcm', '7554666339', '12/12', 'chưa', 'chưa', 'không'),
(17, 5, 'Do Tran Anh Vanh', '04/05/2003', 'Nam', '0233445255', 'vinh@gmail.com', '53 nguyễn đức cảnh quận7 tp hcm', '866745121', '12/12', '3 năm', 'chưa', 'không'),
(18, 7, 'Lam Bich Ngoc', '09/09/2002', 'Nữ', '0233445255', 'ngoc@gmail.com', '568 lê văn lương quận 7', '7554666339', '12/12', 'trên 3 năm', 'chưa', 'không');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `apply_job`
--
ALTER TABLE `apply_job`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `love_jobs`
--
ALTER TABLE `love_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `user_cv`
--
ALTER TABLE `user_cv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `apply_job`
--
ALTER TABLE `apply_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `love_jobs`
--
ALTER TABLE `love_jobs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `user_cv`
--
ALTER TABLE `user_cv`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
