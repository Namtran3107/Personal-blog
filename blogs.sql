-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 10, 2023 lúc 04:55 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blogs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_user`
--

CREATE TABLE `admin_user` (
  `user_id` int(1) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `user_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `user_name`, `user_password`, `user_email`, `user_phone`, `user_image`) VALUES
(0, 'namtran', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'namtran0928@gmail.com', '0342484124', 'IMG_2092.JPG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_contact`
--

CREATE TABLE `blog_contact` (
  `contact_id` int(200) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `contact_email` varchar(30) NOT NULL,
  `contact_message` varchar(500) NOT NULL,
  `contact_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_contact`
--

INSERT INTO `blog_contact` (`contact_id`, `contact_name`, `contact_email`, `contact_message`, `contact_date`) VALUES
(1, 'namtran', 'namtran0928@gmail.com', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.', '2023-05-17 22:30:18'),
(4, 'Khoa', 'KhoaPug@gmail.com', 'Em ở đâu đấy em cho anh xin cái địa chỉ', '2023-05-22 09:17:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_posts`
--

CREATE TABLE `blog_posts` (
  `blog_post_id` int(200) NOT NULL,
  `blog_post_id_random` int(200) NOT NULL,
  `blog_image_topic` varchar(200) NOT NULL,
  `blog_image_topic_random` varchar(200) NOT NULL,
  `blog_topic` varchar(100) NOT NULL,
  `blog_content` varchar(100) NOT NULL,
  `blog_recomment` varchar(500) NOT NULL,
  `blog_avatar_topic` varchar(200) NOT NULL,
  `blog_avatar_topic_random` varchar(200) NOT NULL,
  `blog_name_owner` varchar(30) NOT NULL,
  `blog_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_posts`
--

INSERT INTO `blog_posts` (`blog_post_id`, `blog_post_id_random`, `blog_image_topic`, `blog_image_topic_random`, `blog_topic`, `blog_content`, `blog_recomment`, `blog_avatar_topic`, `blog_avatar_topic_random`, `blog_name_owner`, `blog_date`) VALUES
(15, 1, 'image_2.jpg', '64662929a7fbd.jpg', 'Travel', 'What to pack when visiting Sea', 'Even the all-powerful Pointing has no control about the blind texts it is an almost', 'person_1.jpg', '64662929a8113.jpg', 'Khoa Pug', '2023-05-18 20:33:29'),
(16, 5, 'image_3.jpg', '6466297bd37b0.jpg', 'Fashion', 'Awesome Fashion Trend in For Summer', 'Even the all-powerful Pointing has no control about the blind texts it is an almost', 'person_3.jpg', '6466297bd3935.jpg', 'Khánh đần', '2023-05-18 20:34:51'),
(17, 1, 'image_4.jpg', '646629be6bc38.jpg', 'Travel', '10 Most Awesome Place', 'Even the all-powerful Pointing has no control about the blind texts it is an almost', 'person_1.jpg', '646629be6bf02.jpg', 'Khoa Pug', '2023-05-18 20:41:34'),
(19, 1, 'image_1.jpg', '64662ae95c666.jpg', 'Technology', 'The Newest Technology On This Year 2019', 'Even the all-powerful Pointing has no control about the blind texts it is an almost', 'person_2.jpg', '64662ae95c868.jpg', 'Dave Lewis', '2023-05-18 20:41:48'),
(20, 1, 'image_5.jpg', '64662b4794223.jpg', 'Travel', '10 Most Awesome Beach in Asia', 'Even the all-powerful Pointing has no control about the blind texts it is an almost', 'person_2.jpg', '64662b47943a5.jpg', 'Dave Lewis', '2023-05-18 20:43:46'),
(21, 1, 'image_6.jpg', '64662bff58aff.jpg', 'Travel', 'Top Amazing Places to Go in Summer', 'Even the all-powerful Pointing has no control about the blind texts it is an almos', 'person_3.jpg', '64662bff58d44.jpg', 'Khánh đần', '2023-05-18 20:45:35'),
(22, 5, 'image_7.jpg', '64662c2fefd1a.jpg', 'Fashion', '7 Beginner Photographer’s Mistakes', 'Even the all-powerful Pointing has no control about the blind texts it is an almost', 'person_1.jpg', '64662c2feff8b.jpg', 'Khoa Pug', '2023-05-18 20:46:23'),
(23, 4, 'bg_3.jpg', '64662ca599f19.jpg', 'Photography', 'Excited to Visit in Palawan Philippines', 'Even the all-powerful Pointing has no control about the blind texts it is an almost', 'person_2.jpg', '64662ca59a239.jpg', 'Dave Lewis', '2023-05-18 20:48:21'),
(24, 2, 'image_9.jpg', '64662cd241a74.jpg', 'Technology', 'How to Make a Paper Boat in Scratch', 'Even the all-powerful Pointing has no control about the blind texts it is an almost', 'person_3.jpg', '64662cd241ca8.jpg', 'Khánh đần', '2023-05-18 20:49:06'),
(25, 5, 'image_10.jpg', '6466312e138f3.jpg', 'Travel', '10 Best Way to Styling Your Lifestyle', 'Even the all-powerful Pointing has no control about the blind texts it is an almost', 'person_1.jpg', '6466312e13bee.jpg', 'Khoa Pug', '2023-05-18 21:08:58'),
(26, 1, 'image_11.jpg', '6466319bc1a74.jpg', 'Travel', '10 Tips to Become a Fashion Pro', 'Even the all-powerful Pointing has no control about the blind texts it is an almost', 'person_2.jpg', '6466319bc1ba3.jpg', 'Dave Lewis', '2023-05-18 21:09:31'),
(27, 4, 'image_12.jpg', '64663228c5a4f.jpg', 'Photography', 'Visit the Most Amazing Place in North America', 'Even the all-powerful Pointing has no control about the blind texts it is an almost', 'person_3.jpg', '64663228c5c83.jpg', 'Dave Lewis', '2023-05-18 21:11:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_topics`
--

CREATE TABLE `blog_topics` (
  `topic_id` int(200) NOT NULL,
  `topic_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_topics`
--

INSERT INTO `blog_topics` (`topic_id`, `topic_name`) VALUES
(1, 'Travel'),
(2, 'Technology'),
(4, 'Photography'),
(5, 'Fashion');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `blog_contact`
--
ALTER TABLE `blog_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`blog_post_id`);

--
-- Chỉ mục cho bảng `blog_topics`
--
ALTER TABLE `blog_topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog_contact`
--
ALTER TABLE `blog_contact`
  MODIFY `contact_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `blog_post_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `blog_topics`
--
ALTER TABLE `blog_topics`
  MODIFY `topic_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
