-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2022 lúc 03:53 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `atm_banking`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `atms`
--

CREATE TABLE `atms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `atm_name` varchar(255) DEFAULT NULL,
  `atm_address` varchar(255) DEFAULT NULL,
  `place_id` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longtitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `atms`
--

INSERT INTO `atms` (`id`, `bank_id`, `atm_name`, `atm_address`, `place_id`, `latitude`, `longtitude`, `created_at`, `updated_at`) VALUES
(2, 1, 'Trụ ATM Vietcombank', 'Trụ ATM Vietcombank, Đường Đào Trinh Nhất, An Bình, Dĩ An, Bình Dương, Việt Nam', 'ChIJIaYCHXbYdDERSYT68xO7ojM', '10.8735727', '106.7537077', '2022-12-14 07:44:38', '2022-12-14 07:44:38'),
(3, 1, 'Trụ ATM Đông Á', 'Trụ ATM Đông Á, Quang Trung, phường 11, Gò Vấp, Thành phố Hồ Chí Minh, Việt Nam', 'ChIJM574QqcpdTERfmQHe3t7HIk', '10.8359088', '106.6598825', '2022-12-14 07:45:24', '2022-12-14 07:45:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `atm_cards`
--

CREATE TABLE `atm_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `card_name` varchar(255) DEFAULT NULL,
  `place_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_address` varchar(255) DEFAULT NULL,
  `bank_number` varchar(255) DEFAULT NULL,
  `place_id` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longtitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `bank_address`, `bank_number`, `place_id`, `latitude`, `longtitude`, `created_at`, `updated_at`) VALUES
(1, 'SACOMBANK Ngân Hàng TMCP Sài Gòn Thương Tín - Chi Nhánh Cần Thơ', 'SACOMBANK Cần Thơ, Võ Văn Tần, Tân An, Ninh Kiều, Cần Thơ, Việt Nam', NULL, 'ChIJp7VJiJ9ioDER06dwQeWsTvo', '10.0326206', '105.7840607', '2022-12-14 07:32:53', '2022-12-14 07:32:53');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_12_10_025659_create_users_table', 1),
(3, '2022_12_10_033022_create_banks_table', 1),
(4, '2022_12_10_034322_create_transactions_table', 1),
(5, '2022_12_10_035236_create_atm_cards_table', 1),
(6, '2022_12_12_134822_create_atms_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `trans_name` varchar(255) DEFAULT NULL,
  `trans_address` varchar(255) DEFAULT NULL,
  `trans_phone` varchar(255) DEFAULT NULL,
  `place_id` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longtitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `bank_id`, `trans_name`, `trans_address`, `trans_phone`, `place_id`, `latitude`, `longtitude`, `created_at`, `updated_at`) VALUES
(1, 1, 'Phòng Giao Dịch Sacombank- Etown', 'Phòng Giao Dịch Sacombank- Etown, Đường Cộng Hòa, phường 13, Tân Bình, Thành phố Hồ Chí Minh, Việt Nam', NULL, 'ChIJ-z6p7k8pdTER1siHc5-p70k', '10.8022291', '106.6419754', '2022-12-14 07:43:05', '2022-12-14 07:43:05'),
(2, 1, 'ATM Sacombank Phòng Giao Dịch Tân Thành', 'ATM Sacombank Phòng Giao Dịch Tân Thành, Phú Mỹ, Tân Thành, Bà Rịa - Vũng Tàu, Việt Nam', NULL, 'ChIJh-XcatETdTERwstM8VH7mZQ', '10.589185', '107.0466446', '2022-12-14 07:45:47', '2022-12-14 07:45:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `full_name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', 'zwzYkcROHQ', '$2y$10$2Yoc/H/v6XcRG4Trdv/Zzu9FynaahbYqs5MOPSEwxjHIN5SoZieXm', NULL, '2022-12-14 06:51:17', '2022-12-14 06:51:17');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `atms`
--
ALTER TABLE `atms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atms_bank_id_foreign` (`bank_id`);

--
-- Chỉ mục cho bảng `atm_cards`
--
ALTER TABLE `atm_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atm_cards_bank_id_foreign` (`bank_id`);

--
-- Chỉ mục cho bảng `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_bank_id_foreign` (`bank_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `atms`
--
ALTER TABLE `atms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `atm_cards`
--
ALTER TABLE `atm_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `atms`
--
ALTER TABLE `atms`
  ADD CONSTRAINT `atms_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `atm_cards`
--
ALTER TABLE `atm_cards`
  ADD CONSTRAINT `atm_cards_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
