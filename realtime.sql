-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2024 lúc 05:33 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `realtime`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groupchat`
--

CREATE TABLE `groupchat` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `leader` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groupchat`
--

INSERT INTO `groupchat` (`id`, `name`, `leader`, `created_at`, `updated_at`) VALUES
(5, 'Nhom Chat 2', 1, '2024-06-09 08:02:59', '2024-06-09 08:02:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groupchat_detail`
--

CREATE TABLE `groupchat_detail` (
  `id` int(11) NOT NULL,
  `groupchat_id` int(11) NOT NULL,
  `menber_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groupchat_detail`
--

INSERT INTO `groupchat_detail` (`id`, `groupchat_id`, `menber_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2024-06-08 08:09:46', '2024-06-08 08:09:46'),
(2, 3, 3, '2024-06-08 08:09:46', '2024-06-08 08:09:46'),
(3, 3, 4, '2024-06-08 08:09:46', '2024-06-08 08:09:46'),
(4, 4, 2, '2024-06-08 08:10:13', '2024-06-08 08:10:13'),
(5, 4, 3, '2024-06-08 08:10:13', '2024-06-08 08:10:13'),
(6, 4, 4, '2024-06-08 08:10:13', '2024-06-08 08:10:13'),
(7, 5, 2, '2024-06-09 08:02:59', '2024-06-09 08:02:59'),
(8, 5, 3, '2024-06-09 08:02:59', '2024-06-09 08:02:59'),
(9, 5, 4, '2024-06-09 08:02:59', '2024-06-09 08:02:59'),
(10, 5, 5, '2024-06-09 08:02:59', '2024-06-09 08:02:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Elwin Adams I 234', 'https://i.9mobi.vn/cf/Images/di/2023/4/24/avatar-facebook-32.jpg', 'mhammes@example.com', '2024-06-04 06:49:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jYp5GIpZADYIfs2zJ2Rp0doXUFhMZdZsCDY3jE89mKEjK7YDHE7JBoenlKU6', '2024-06-04 06:49:33', '2024-06-06 09:17:21'),
(2, 'Vanessa Mann DVM', 'https://www.taoanhpro.com/wp-content/uploads/2022/10/tao-avatar-instagram-facebook-vien-mau.jpeg', 'jadon.kuphal@example.org', '2024-06-04 06:49:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kyEmT4owjsWPborFNfMkEUKgnvNBT3GQ2ZNZFyrbaWucRj4WlKqbLjvmieGu', '2024-06-04 06:49:33', '2024-06-04 06:49:33'),
(3, 'Ava Howell DVM', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSErw42HlaI6rYMuP0UE6pfVuExQNQGcXlCOg&s', 'elvie.buckridge@example.org', '2024-06-04 06:49:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IVVlbTvkw16yRNGWeqFhG62s2q3wG0qzHu28fjofX8T4XJ9myiPIduKXuydM', '2024-06-04 06:49:33', '2024-06-04 06:49:33'),
(4, 'Gaston Gusikowski', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY6vjXrihfo1H_aym3QWDwHpz3X4PlHYqC6Q&s', 'xcassin@example.org', '2024-06-04 06:49:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Zz5LebbBxtFbO5dhu7AH9E88mC0KpzDd1FWe3FkRZwAAPOV1lrPplkeY4cuP', '2024-06-04 06:49:33', '2024-06-04 06:49:33'),
(5, 'Jorge Hettinger', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbrZa7HIH68EmFZLYv8Ph6LmjnZMwNmfU4sw&s', 'jamison27@example.com', '2024-06-04 06:49:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Y9lC3cCOX7', '2024-06-04 06:49:33', '2024-06-04 06:49:33'),
(6, 'Ms. Gwen Weissnat', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5FAby8oZ-6HEpdg1oWMlPcIVtI7KE-WdGrRl4-lgh8brpxa95uVVIJUcnEY2WTOuH2E0&usqp=CAU', 'ignacio37@example.org', '2024-06-04 06:49:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2thH3FNVXgXEP3QA4NjTEiW4l9XKC650tPhbvpATdP2UbfXKOyCf0Hd62Pj6', '2024-06-04 06:49:33', '2024-06-04 06:49:33'),
(7, 'Franco King', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-SndOvCOLXCwMTGzOVqFmvq5od4VmGTMfPQ&s', 'jamison48@example.net', '2024-06-04 06:49:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UnkAV5mONI', '2024-06-04 06:49:33', '2024-06-04 06:49:33'),
(8, 'Prof. Carolyn Kerluke Jr.', 'https://i.pinimg.com/736x/58/5c/3b/585c3baa56d1384ff1b0b1e80c24bbe1.jpg', 'jayce03@example.com', '2024-06-04 06:49:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GR39NFtPFIJazZWyxLCSWWlD6hiPlhBQyeau2X1rTgf8kccFMjREtAyMdV9v', '2024-06-04 06:49:33', '2024-06-04 06:49:33'),
(9, 'Dr. Mozell Boyle', 'https://i.pinimg.com/236x/37/5b/67/375b6792815c706f14a14bc027ea0a40.jpg', 'krempel@example.org', '2024-06-04 06:49:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'k3KM1aOsEC', '2024-06-04 06:49:33', '2024-06-04 06:49:33'),
(10, 'Josue Waters Sr.', 'https://ema.edu.vn/anh-cap-doi-dep-cute/imager_19_1499_700.jpg', 'merritt53@example.net', '2024-06-04 06:49:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GeUKxDuSMk', '2024-06-04 06:49:33', '2024-06-04 06:49:33'),
(11, 'Đặng Quốc Phong', 'https://hoanghamobile.com/Uploads/2023/09/13/iphone-15-pro-max-natural-titanium-pure-back-iphone-15-pro-max-natural-titanium-pure-front-2up-screen-usen-1.png', 'phong@gmail.com', NULL, '$2y$10$.0hMwPUQ3EefB4ZMnOnkd.lbwJkyU0Xy/0kIoMXndJWAQeGJ0SrZ.', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `groupchat`
--
ALTER TABLE `groupchat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `groupchat_detail`
--
ALTER TABLE `groupchat_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `groupchat`
--
ALTER TABLE `groupchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `groupchat_detail`
--
ALTER TABLE `groupchat_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
