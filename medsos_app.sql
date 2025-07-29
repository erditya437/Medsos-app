-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Jul 2025 pada 12.08
-- Versi server: 8.0.30
-- Versi PHP: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medsos_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chats`
--

CREATE TABLE `chats` (
  `id` bigint UNSIGNED NOT NULL,
  `from_user_id` bigint UNSIGNED NOT NULL,
  `to_user_id` bigint UNSIGNED NOT NULL,
  `message` text,
  `media` varchar(255) DEFAULT NULL,
  `media_type` enum('image','video','none') NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `chats`
--

INSERT INTO `chats` (`id`, `from_user_id`, `to_user_id`, `message`, `media`, `media_type`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'oy jancok', NULL, 'none', '2025-07-16 05:37:56', '2025-07-16 05:37:56'),
(2, 2, 3, 'bangsat', NULL, 'none', '2025-07-16 05:38:28', '2025-07-16 05:38:28'),
(3, 2, 3, NULL, 'chat_media/4AgadFy4129qjvQx6mhrHRcx7rlocOx3iVmVCEfM.png', 'image', '2025-07-16 05:38:37', '2025-07-16 05:38:37'),
(4, 2, 3, NULL, 'chat_media/uALJ0Fm9Zznmo53Az3JGRGBCOuZtQ7YbUbvfdF9l.mp4', 'video', '2025-07-16 05:38:59', '2025-07-16 05:38:59'),
(5, 2, 1, 'oy dit', NULL, 'none', '2025-07-16 05:45:25', '2025-07-16 05:45:25'),
(6, 1, 2, 'oy ada apa', NULL, 'none', '2025-07-16 05:45:57', '2025-07-16 05:45:57'),
(7, 1, 2, 'oy', NULL, 'none', '2025-07-16 05:54:15', '2025-07-16 05:54:15'),
(8, 3, 2, 'apaansii!', NULL, 'none', '2025-07-16 06:01:46', '2025-07-16 06:01:46'),
(9, 2, 1, 'mantao', NULL, 'none', '2025-07-16 20:39:58', '2025-07-16 20:39:58'),
(10, 2, 1, 'mantul', NULL, 'none', '2025-07-16 20:51:51', '2025-07-16 20:51:51'),
(11, 2, 1, 'nah', 'chat_media/HXjNx5vSs5YBbRUwqfoUZry3KPsu8rzQ5FYyNlm0.mp4', 'video', '2025-07-16 21:01:18', '2025-07-16 21:01:18'),
(12, 2, 1, '📣 Membagikan postingan: ahhh', NULL, 'none', '2025-07-17 00:53:52', '2025-07-17 00:53:52'),
(13, 1, 2, '📣 Membagikan postingan: <a href=\"http://127.0.0.1:8000/home?scroll_to=11\" style=\"color:blue;\">ahhh</a>', NULL, 'none', '2025-07-17 00:58:52', '2025-07-17 00:58:52'),
(14, 2, 1, '📣 Membagikan postingan: <a href=\"http://127.0.0.1:8000/home?scroll_to=7\" style=\"color:blue;\">uhuy</a>', NULL, 'none', '2025-07-17 00:59:41', '2025-07-17 00:59:41'),
(15, 1, 2, '📣 Membagikan postingan: <a href=\"http://127.0.0.1:8000/home?scroll_to=2#post-2\" style=\"color:blue;\">edan</a>', NULL, 'none', '2025-07-17 01:15:54', '2025-07-17 01:15:54'),
(16, 2, 1, '📣 Membagikan postingan: <a href=\"http://127.0.0.1:8000/home?scroll_to=11#post-11\" style=\"color:blue;\">ahhh</a>', NULL, 'none', '2025-07-17 01:19:50', '2025-07-17 01:19:50'),
(17, 2, 1, 'oyy', NULL, 'none', '2025-07-17 03:14:52', '2025-07-17 03:14:52'),
(18, 1, 2, 'apa', NULL, 'none', '2025-07-17 03:15:41', '2025-07-17 03:15:41'),
(19, 1, 4, '📣 Membagikan postingan: <a href=\"http://127.0.0.1:8000/home?scroll_to=7#post-7\" style=\"color:blue;\">uhuy</a>', NULL, 'none', '2025-07-17 03:23:29', '2025-07-17 03:23:29'),
(20, 1, 5, '📣 Membagikan postingan: <a href=\"http://127.0.0.1:8000/home?scroll_to=7#post-7\" style=\"color:blue;\">uhuy</a>', NULL, 'none', '2025-07-17 05:05:28', '2025-07-17 05:05:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment` text,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `media_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `parent_id`, `created_at`, `updated_at`, `media`, `media_type`) VALUES
(1, 6, 1, 'edan', NULL, '2025-07-15 22:58:03', '2025-07-15 22:58:03', NULL, NULL),
(2, 6, 1, 'edan', 1, '2025-07-15 22:58:36', '2025-07-15 22:58:36', NULL, NULL),
(3, 6, 1, 'edan', 2, '2025-07-15 23:10:28', '2025-07-15 23:10:28', NULL, NULL),
(4, 6, 1, 'apanya yg edan', 3, '2025-07-15 23:10:54', '2025-07-15 23:10:54', NULL, NULL),
(5, 5, 1, 'edan', NULL, '2025-07-15 23:18:43', '2025-07-15 23:18:43', NULL, NULL),
(6, 5, 1, 'mantap', 5, '2025-07-15 23:18:54', '2025-07-15 23:18:54', NULL, NULL),
(7, 5, 1, 'mantap', NULL, '2025-07-15 23:25:01', '2025-07-15 23:25:01', NULL, NULL),
(8, 5, 1, 'oy', 7, '2025-07-15 23:25:13', '2025-07-15 23:25:13', NULL, NULL),
(9, 5, 1, 'oy', 7, '2025-07-15 23:25:13', '2025-07-15 23:25:13', NULL, NULL),
(10, 5, 1, 'uy', 9, '2025-07-15 23:46:06', '2025-07-15 23:46:06', NULL, NULL),
(11, 4, 1, 'heh kasar', NULL, '2025-07-15 23:46:35', '2025-07-15 23:46:35', NULL, NULL),
(12, 4, 1, 'uhuy', 11, '2025-07-15 23:46:49', '2025-07-15 23:46:49', NULL, NULL),
(13, 4, 1, 'lah', 12, '2025-07-15 23:47:08', '2025-07-15 23:47:08', NULL, NULL),
(14, 4, 1, 'entis', NULL, '2025-07-15 23:47:43', '2025-07-15 23:47:43', NULL, NULL),
(15, 7, 1, 'cantik jir', NULL, '2025-07-16 00:29:28', '2025-07-16 00:29:28', NULL, NULL),
(16, 7, 2, 'pacar lu bang?', 15, '2025-07-16 00:30:41', '2025-07-16 00:30:41', NULL, NULL),
(17, 7, 1, 'bukan wkwk', 16, '2025-07-16 00:31:17', '2025-07-16 00:31:17', NULL, NULL),
(18, 7, 1, 'edan', NULL, '2025-07-16 00:32:12', '2025-07-16 00:32:12', NULL, NULL),
(19, 6, 1, 'oy cantik', NULL, '2025-07-16 01:21:46', '2025-07-16 01:21:46', NULL, NULL),
(20, 6, 1, 'hahay', 19, '2025-07-16 01:22:09', '2025-07-16 01:22:09', NULL, NULL),
(21, 8, 1, 'bagus', NULL, '2025-07-16 03:06:12', '2025-07-16 03:06:12', NULL, NULL),
(22, 8, 2, 'makasii', 21, '2025-07-16 03:08:36', '2025-07-16 03:08:36', NULL, NULL),
(23, 7, 1, 'iyah', 16, '2025-07-16 04:39:07', '2025-07-16 04:39:07', NULL, NULL),
(24, 9, 1, 'oy bang', NULL, '2025-07-16 06:20:26', '2025-07-16 06:20:26', NULL, NULL),
(25, 8, 3, 'bagus kak', NULL, '2025-07-16 06:25:11', '2025-07-16 06:25:11', NULL, NULL),
(26, 9, 2, 'mantap', NULL, '2025-07-16 06:33:52', '2025-07-16 06:33:52', NULL, NULL),
(27, 10, 2, 'ang pangan ang bagpng todo', NULL, '2025-07-16 06:35:51', '2025-07-16 06:35:51', NULL, NULL),
(28, 10, 3, 'mantap', 27, '2025-07-16 06:50:45', '2025-07-16 06:50:45', NULL, NULL),
(29, 7, 3, 'anjay', NULL, '2025-07-16 07:39:42', '2025-07-16 07:39:42', NULL, NULL),
(30, 7, 3, 'edan', NULL, '2025-07-16 08:13:27', '2025-07-16 08:13:27', NULL, NULL),
(31, 7, 3, 'wawww', NULL, '2025-07-16 08:13:36', '2025-07-16 08:13:36', NULL, NULL),
(32, 7, 3, 'wiih', NULL, '2025-07-16 08:13:59', '2025-07-16 08:13:59', NULL, NULL),
(33, 7, 3, 'auuu', NULL, '2025-07-16 08:14:05', '2025-07-16 08:14:05', NULL, NULL),
(34, 7, 3, 'anjay', NULL, '2025-07-16 08:14:30', '2025-07-16 08:14:30', NULL, NULL),
(35, 7, 3, 'wuih', NULL, '2025-07-16 08:14:38', '2025-07-16 08:14:38', NULL, NULL),
(36, 7, 3, 'mantap', NULL, '2025-07-16 08:51:43', '2025-07-16 08:51:43', NULL, NULL),
(37, 7, 3, 'hah', 15, '2025-07-16 09:13:59', '2025-07-16 09:13:59', NULL, NULL),
(38, 7, 3, 'anjany', 17, '2025-07-16 09:14:30', '2025-07-16 09:14:30', NULL, NULL),
(39, 11, 2, 'like guys', NULL, '2025-07-16 21:08:47', '2025-07-16 21:08:47', NULL, NULL),
(40, 11, 2, 'mantap', NULL, '2025-07-16 21:31:07', '2025-07-16 21:31:07', NULL, NULL),
(41, 11, 2, 'uhuy', NULL, '2025-07-16 21:32:48', '2025-07-16 21:32:48', NULL, NULL),
(42, 11, 2, 'ayy', NULL, '2025-07-16 21:33:01', '2025-07-16 21:33:01', 'comments/SIP40MIjRtggkzGlR7jeMduB0kDZOMIxg3zJdJR1.mp4', 'video'),
(43, 11, 2, 'mantao', NULL, '2025-07-16 21:35:48', '2025-07-16 21:35:48', 'comments/RQeFvnEt0nXfqsQ0Jmjf0YmcNGE7n74EiBoyPOv2.png', 'photo'),
(44, 10, 2, 'bagus jooo', NULL, '2025-07-16 21:36:54', '2025-07-16 21:36:54', 'comments/8CSGAUFvdRGA5y875kuSsqEJ7McHV9UyWMwLPyPF.png', 'photo'),
(45, 10, 2, 'edan', NULL, '2025-07-16 21:38:22', '2025-07-16 21:38:22', 'comments/IoHk9I3oiols9H5jspkyIHwUG7kAgL12K818kaAx.mp4', 'video'),
(46, 9, 3, 'edan', NULL, '2025-07-16 21:39:28', '2025-07-16 21:39:28', 'comments/nRefJXZVORvhHQ83928ikTWm9Ab3uG0a86E3FFsk.mp4', 'video'),
(47, 11, 2, NULL, NULL, '2025-07-16 21:46:05', '2025-07-16 21:46:05', 'comments/181KebP3OQrmR8RWLCYTHvHOHsHuJir7r7uCERVO.jpg', 'photo'),
(48, 11, 2, 'uhuy', NULL, '2025-07-16 21:46:39', '2025-07-16 21:46:39', 'comments/eSrvGg22voTwbi4trqHrkUBnm1R85z1q49UAt6g2.jpg', 'photo'),
(49, 11, 2, '', NULL, '2025-07-16 21:48:19', '2025-07-16 21:48:19', NULL, 'video'),
(50, 11, 2, 'edan', NULL, '2025-07-16 21:48:44', '2025-07-16 21:48:44', NULL, NULL),
(51, 11, 2, 'edan', NULL, '2025-07-16 21:49:02', '2025-07-16 21:49:02', NULL, 'video'),
(52, 11, 2, '', NULL, '2025-07-16 21:49:25', '2025-07-16 21:49:25', NULL, 'photo'),
(53, 6, 2, 'edan', 20, '2025-07-16 21:50:57', '2025-07-16 21:50:57', 'comments/LtwCsm2s1xrgpQT6us3CzCYC5SXlFRKUfhnCL2ny.mp4', 'video'),
(54, 6, 2, 'uhuy', NULL, '2025-07-16 21:51:28', '2025-07-16 21:51:28', 'comments/EhBGgVy3tU5iU8yU85HyjKryIlV61yurK6t2cPOX.mp4', 'video'),
(55, 6, 2, '', NULL, '2025-07-16 21:54:34', '2025-07-16 21:54:34', 'comments/4OC9ZInUrfHUJK14vL73XqkiEfAVk8ZJPzIZa5EB.jpg', 'photo'),
(56, 10, 1, '', NULL, '2025-07-16 22:03:59', '2025-07-16 22:03:59', 'comments/qzR21xWTwwHJh67o4e4GX3x8nWvdhvrmI9tpGikM.jpg', 'photo'),
(57, 10, 1, '', 28, '2025-07-16 22:04:43', '2025-07-16 22:04:43', 'comments/8Qkcq720HcZpBUelcnqgjgq8wkNsty8v438ML1lj.mp4', 'video'),
(58, 9, 1, '', NULL, '2025-07-16 22:09:12', '2025-07-16 22:09:12', 'comments/6V3TO5pCskIFNuGUhB25xUU1NRHBb7RUlFTtzFzO.jpg', 'photo'),
(59, 11, 1, '', NULL, '2025-07-16 22:22:18', '2025-07-16 22:22:18', 'comments/jcg97AQGbLBkPjz4q330akvsLQYXv9TcyRMr4hZ7.mp4', 'video'),
(60, 11, 1, 'mantap', NULL, '2025-07-16 22:25:36', '2025-07-16 22:25:36', NULL, NULL),
(61, 11, 1, 'apanya hayo', 60, '2025-07-16 22:26:06', '2025-07-16 22:26:06', NULL, NULL),
(62, 10, 1, 'wih siapa tuh', 45, '2025-07-16 22:39:15', '2025-07-16 22:39:15', NULL, NULL),
(63, 3, 1, 'cantik', NULL, '2025-07-16 22:47:59', '2025-07-16 22:47:59', NULL, NULL),
(64, 10, 1, 'mantap', NULL, '2025-07-16 22:49:14', '2025-07-16 22:49:14', NULL, NULL),
(65, 10, 1, 'mantap', NULL, '2025-07-16 22:49:16', '2025-07-16 22:49:16', NULL, NULL),
(66, 10, 1, 'mantap', NULL, '2025-07-16 22:49:19', '2025-07-16 22:49:19', NULL, NULL),
(67, 10, 1, 'mantap', NULL, '2025-07-16 22:49:20', '2025-07-16 22:49:20', NULL, NULL),
(68, 10, 1, 'mantap', NULL, '2025-07-16 22:49:21', '2025-07-16 22:49:21', NULL, NULL),
(69, 10, 1, 'mantap', NULL, '2025-07-16 22:49:21', '2025-07-16 22:49:21', NULL, NULL),
(70, 10, 1, 'mantap', NULL, '2025-07-16 22:49:21', '2025-07-16 22:49:21', NULL, NULL),
(71, 3, 1, 'cantik', NULL, '2025-07-16 22:50:01', '2025-07-16 22:50:01', NULL, NULL),
(72, 3, 1, 'edan', NULL, '2025-07-16 22:50:08', '2025-07-16 22:50:08', NULL, NULL),
(73, 3, 1, 'uhuy', NULL, '2025-07-16 22:50:16', '2025-07-16 22:50:16', NULL, NULL),
(74, 7, 1, 'rdan', NULL, '2025-07-16 22:52:39', '2025-07-16 22:52:39', NULL, NULL),
(75, 7, 1, 'uhy', NULL, '2025-07-16 22:52:46', '2025-07-16 22:52:46', NULL, NULL),
(76, 7, 1, '', NULL, '2025-07-16 22:52:55', '2025-07-16 22:52:55', 'comments/zvfgS8rXooa1t4XxzCI6HgrlLB4lftGyNmkh4PMf.mp4', 'video');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `follows`
--

CREATE TABLE `follows` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `followed_user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','accepted') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `follows`
--

INSERT INTO `follows` (`id`, `user_id`, `followed_user_id`, `created_at`, `updated_at`, `status`) VALUES
(9, 3, 2, '2025-07-16 05:13:51', '2025-07-16 05:14:11', 'accepted'),
(11, 1, 2, '2025-07-16 05:25:46', '2025-07-16 05:26:06', 'accepted'),
(13, 3, 1, '2025-07-16 19:54:10', '2025-07-16 19:54:31', 'accepted'),
(14, 1, 3, '2025-07-16 19:55:14', '2025-07-16 19:55:36', 'accepted'),
(23, 4, 1, '2025-07-17 02:55:39', '2025-07-17 02:56:11', 'accepted'),
(24, 1, 4, '2025-07-17 02:56:40', '2025-07-17 02:56:59', 'accepted'),
(25, 4, 2, '2025-07-17 03:08:42', '2025-07-17 03:09:06', 'accepted'),
(26, 2, 1, '2025-07-17 03:16:17', '2025-07-17 03:17:28', 'accepted'),
(27, 5, 1, '2025-07-17 03:44:17', '2025-07-17 03:44:32', 'accepted');

-- --------------------------------------------------------

--
-- Struktur dari tabel `friends`
--

CREATE TABLE `friends` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `friend_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `created_at`, `updated_at`) VALUES
(4, 2, 3, '2025-07-16 06:01:11', '2025-07-16 06:01:11'),
(5, 3, 1, '2025-07-16 19:55:36', '2025-07-16 19:55:36'),
(7, 4, 1, '2025-07-17 02:56:59', '2025-07-17 02:56:59'),
(8, 1, 4, '2025-07-17 02:56:59', '2025-07-17 02:56:59'),
(9, 1, 2, '2025-07-17 03:17:28', '2025-07-17 03:17:28'),
(10, 2, 1, '2025-07-17 03:17:28', '2025-07-17 03:17:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `likes`
--

CREATE TABLE `likes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED DEFAULT NULL,
  `comment_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `comment_id`, `created_at`, `updated_at`) VALUES
(3, 1, 7, NULL, '2025-07-16 00:55:18', '2025-07-16 00:55:18'),
(5, 2, 7, NULL, '2025-07-16 00:55:42', '2025-07-16 00:55:42'),
(6, 2, 6, NULL, '2025-07-16 00:55:45', '2025-07-16 00:55:45'),
(7, 1, 5, NULL, '2025-07-16 00:56:31', '2025-07-16 00:56:31'),
(15, 1, NULL, 15, '2025-07-16 01:05:19', '2025-07-16 01:05:19'),
(17, 1, NULL, 16, '2025-07-16 01:09:13', '2025-07-16 01:09:13'),
(21, 1, NULL, 18, '2025-07-16 01:21:09', '2025-07-16 01:21:09'),
(26, 1, NULL, 2, '2025-07-16 01:21:37', '2025-07-16 01:21:37'),
(31, 1, NULL, 1, '2025-07-16 01:21:59', '2025-07-16 01:21:59'),
(32, 1, NULL, 19, '2025-07-16 01:22:02', '2025-07-16 01:22:02'),
(33, 1, NULL, 20, '2025-07-16 01:22:18', '2025-07-16 01:22:18'),
(34, 2, 8, NULL, '2025-07-16 02:08:55', '2025-07-16 02:08:55'),
(36, 2, 4, NULL, '2025-07-16 02:50:40', '2025-07-16 02:50:40'),
(37, 1, 8, NULL, '2025-07-16 03:05:15', '2025-07-16 03:05:15'),
(38, 2, NULL, 21, '2025-07-16 03:08:29', '2025-07-16 03:08:29'),
(39, 3, NULL, 21, '2025-07-16 03:44:04', '2025-07-16 03:44:04'),
(40, 2, NULL, 15, '2025-07-16 06:08:54', '2025-07-16 06:08:54'),
(41, 1, 9, NULL, '2025-07-16 06:10:16', '2025-07-16 06:10:16'),
(42, 2, 9, NULL, '2025-07-16 06:29:06', '2025-07-16 06:29:06'),
(43, 2, 10, NULL, '2025-07-16 06:35:39', '2025-07-16 06:35:39'),
(44, 3, 7, NULL, '2025-07-16 09:11:18', '2025-07-16 09:11:18'),
(45, 3, NULL, 28, '2025-07-16 18:28:37', '2025-07-16 18:28:37'),
(46, 1, 10, NULL, '2025-07-16 20:23:04', '2025-07-16 20:23:04'),
(47, 2, 11, NULL, '2025-07-16 21:09:19', '2025-07-16 21:09:19'),
(48, 2, NULL, 39, '2025-07-16 21:11:37', '2025-07-16 21:11:37'),
(49, 3, 9, NULL, '2025-07-16 21:39:08', '2025-07-16 21:39:08'),
(50, 3, NULL, 46, '2025-07-16 21:39:34', '2025-07-16 21:39:34'),
(53, 2, NULL, 47, '2025-07-16 21:46:16', '2025-07-16 21:46:16'),
(54, 2, NULL, 49, '2025-07-16 21:48:31', '2025-07-16 21:48:31'),
(55, 2, NULL, 20, '2025-07-16 21:50:45', '2025-07-16 21:50:45'),
(56, 2, NULL, 53, '2025-07-16 21:51:07', '2025-07-16 21:51:07'),
(57, 2, NULL, 55, '2025-07-16 21:54:47', '2025-07-16 21:54:47'),
(60, 1, NULL, 61, '2025-07-16 22:26:19', '2025-07-16 22:26:19'),
(61, 1, NULL, 57, '2025-07-16 22:38:53', '2025-07-16 22:38:53'),
(63, 1, NULL, 45, '2025-07-16 22:39:06', '2025-07-16 22:39:06'),
(64, 4, 11, NULL, '2025-07-17 01:10:44', '2025-07-17 01:10:44'),
(65, 4, 10, NULL, '2025-07-17 01:13:38', '2025-07-17 01:13:38'),
(66, 1, 2, NULL, '2025-07-17 01:15:49', '2025-07-17 01:15:49'),
(68, 1, 11, NULL, '2025-07-17 03:22:55', '2025-07-17 03:22:55'),
(69, 1, 6, NULL, '2025-07-17 03:26:52', '2025-07-17 03:26:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_16_040136_create_posts_table', 2),
(5, '2025_07_16_042344_add_tag_to_posts_table', 3),
(6, '2025_07_16_052204_create_comments_table', 4),
(7, '2025_07_16_073520_create_likes_table', 5),
(8, '2025_07_16_085001_create_follows_table', 6),
(9, '2025_07_16_093813_create_notifications_table', 7),
(10, '2025_07_16_103846_add_status_to_follows_table', 8),
(11, '2025_07_16_105842_create_friends_table', 9),
(12, '2025_07_16_105956_create_chats_table', 10),
(13, '2025_07_16_132323_add_post_id_to_notifications_table', 11),
(14, '2025_07_17_042108_add_media_to_comments_table', 12),
(15, '2025_07_17_044434_alter_comments_comment_nullable', 13),
(16, '2025_07_17_071300_create_shares_table', 14),
(17, '2025_07_17_073721_add_to_user_id_to_shares_table', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `from_user_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `message` text,
  `post_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `from_user_id`, `type`, `message`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'like_post', '', NULL, '2025-07-16 03:05:15', '2025-07-16 03:05:15'),
(2, 2, 1, 'comment_post', 'bagus', NULL, '2025-07-16 03:06:12', '2025-07-16 03:06:12'),
(3, 1, 2, 'like_comment', '', NULL, '2025-07-16 03:08:29', '2025-07-16 03:08:29'),
(4, 1, 2, 'reply_comment', 'makasii', NULL, '2025-07-16 03:08:36', '2025-07-16 03:08:36'),
(8, 1, 3, 'like_comment', '', NULL, '2025-07-16 03:44:04', '2025-07-16 03:44:04'),
(9, 2, 1, 'reply_comment', 'iyah', NULL, '2025-07-16 04:39:07', '2025-07-16 04:39:07'),
(13, 2, 1, 'chat', 'mengirim pesan.', NULL, '2025-07-16 05:54:15', '2025-07-16 05:54:15'),
(15, 2, 3, 'chat', 'mengirim pesan.', NULL, '2025-07-16 06:01:46', '2025-07-16 06:01:46'),
(16, 1, 2, 'like_comment', '', NULL, '2025-07-16 06:08:54', '2025-07-16 06:08:54'),
(17, 3, 1, 'like_post', '', NULL, '2025-07-16 06:10:16', '2025-07-16 06:10:16'),
(18, 3, 1, 'comment_post', 'oy bang', NULL, '2025-07-16 06:20:26', '2025-07-16 06:20:26'),
(19, 2, 3, 'comment_post', 'bagus kak', NULL, '2025-07-16 06:25:11', '2025-07-16 06:25:11'),
(20, 3, 2, 'like_post', '', NULL, '2025-07-16 06:29:06', '2025-07-16 06:29:06'),
(21, 3, 2, 'comment_post', 'mantap', 9, '2025-07-16 06:33:52', '2025-07-16 06:33:52'),
(22, 3, 2, 'like_post', '', 10, '2025-07-16 06:35:39', '2025-07-16 06:35:39'),
(23, 3, 2, 'comment_post', 'ang pangan ang bagpng todo', 10, '2025-07-16 06:35:51', '2025-07-16 06:35:51'),
(24, 2, 3, 'reply_comment', 'mantap', 10, '2025-07-16 06:50:46', '2025-07-16 06:50:46'),
(25, 1, 3, 'comment_post', 'anjay', 7, '2025-07-16 07:39:42', '2025-07-16 07:39:42'),
(26, 1, 3, 'comment_post', 'edan', 7, '2025-07-16 08:13:27', '2025-07-16 08:13:27'),
(27, 1, 3, 'comment_post', 'wawww', 7, '2025-07-16 08:13:36', '2025-07-16 08:13:36'),
(28, 1, 3, 'comment_post', 'wiih', 7, '2025-07-16 08:13:59', '2025-07-16 08:13:59'),
(29, 1, 3, 'comment_post', 'auuu', 7, '2025-07-16 08:14:05', '2025-07-16 08:14:05'),
(30, 1, 3, 'comment_post', 'anjay', 7, '2025-07-16 08:14:30', '2025-07-16 08:14:30'),
(31, 1, 3, 'comment_post', 'wuih', 7, '2025-07-16 08:14:38', '2025-07-16 08:14:38'),
(32, 1, 3, 'comment_post', 'mantap', 7, '2025-07-16 08:51:43', '2025-07-16 08:51:43'),
(33, 1, 3, 'like_post', '', 7, '2025-07-16 09:11:18', '2025-07-16 09:11:18'),
(34, 1, 3, 'reply_comment', 'hah', 7, '2025-07-16 09:13:59', '2025-07-16 09:13:59'),
(35, 1, 3, 'reply_comment', 'anjany', 7, '2025-07-16 09:14:30', '2025-07-16 09:14:30'),
(38, 3, 1, 'like_post', '', 10, '2025-07-16 20:23:04', '2025-07-16 20:23:04'),
(39, 1, 2, 'chat', 'mengirim pesan.', NULL, '2025-07-16 20:39:58', '2025-07-16 20:39:58'),
(40, 1, 2, 'chat', 'mengirim pesan.', NULL, '2025-07-16 20:51:51', '2025-07-16 20:51:51'),
(41, 1, 2, 'chat', 'mengirim pesan.', NULL, '2025-07-16 21:01:18', '2025-07-16 21:01:18'),
(42, 3, 2, 'comment_post', 'bagus jooo', 10, '2025-07-16 21:36:54', '2025-07-16 21:36:54'),
(43, 3, 2, 'comment_post', 'edan', 10, '2025-07-16 21:38:22', '2025-07-16 21:38:22'),
(44, 1, 2, 'like_comment', '', 6, '2025-07-16 21:50:45', '2025-07-16 21:50:45'),
(45, 1, 2, 'reply_comment', 'edan', 6, '2025-07-16 21:50:57', '2025-07-16 21:50:57'),
(46, 1, 2, 'comment_post', 'uhuy', 6, '2025-07-16 21:51:28', '2025-07-16 21:51:28'),
(47, 1, 2, 'comment_post', NULL, 6, '2025-07-16 21:54:34', '2025-07-16 21:54:34'),
(48, 2, 1, 'like_post', '', 11, '2025-07-16 21:57:13', '2025-07-16 21:57:13'),
(49, 3, 1, 'comment_post', NULL, 10, '2025-07-16 22:03:59', '2025-07-16 22:03:59'),
(50, 3, 1, 'reply_comment', NULL, 10, '2025-07-16 22:04:43', '2025-07-16 22:04:43'),
(51, 3, 1, 'comment_post', NULL, 9, '2025-07-16 22:09:12', '2025-07-16 22:09:12'),
(52, 2, 1, 'comment_post', NULL, 11, '2025-07-16 22:22:18', '2025-07-16 22:22:18'),
(53, 2, 1, 'comment_post', 'mantap', 11, '2025-07-16 22:25:36', '2025-07-16 22:25:36'),
(54, 2, 1, 'like_comment', '', 10, '2025-07-16 22:39:03', '2025-07-16 22:39:03'),
(55, 2, 1, 'like_comment', '', 10, '2025-07-16 22:39:06', '2025-07-16 22:39:06'),
(56, 2, 1, 'reply_comment', 'wih siapa tuh', 10, '2025-07-16 22:39:15', '2025-07-16 22:39:15'),
(57, 3, 1, 'comment_post', 'mantap', 10, '2025-07-16 22:49:14', '2025-07-16 22:49:14'),
(58, 3, 1, 'comment_post', 'mantap', 10, '2025-07-16 22:49:16', '2025-07-16 22:49:16'),
(59, 3, 1, 'comment_post', 'mantap', 10, '2025-07-16 22:49:19', '2025-07-16 22:49:19'),
(60, 3, 1, 'comment_post', 'mantap', 10, '2025-07-16 22:49:20', '2025-07-16 22:49:20'),
(61, 3, 1, 'comment_post', 'mantap', 10, '2025-07-16 22:49:21', '2025-07-16 22:49:21'),
(62, 3, 1, 'comment_post', 'mantap', 10, '2025-07-16 22:49:21', '2025-07-16 22:49:21'),
(63, 3, 1, 'comment_post', 'mantap', 10, '2025-07-16 22:49:21', '2025-07-16 22:49:21'),
(64, 2, 4, 'like_post', '', 11, '2025-07-17 01:10:44', '2025-07-17 01:10:44'),
(65, 3, 4, 'like_post', '', 10, '2025-07-17 01:13:38', '2025-07-17 01:13:38'),
(66, 1, 2, 'share_post', 'membagikan postingan kepada kamu.', 11, '2025-07-17 01:19:50', '2025-07-17 01:19:50'),
(67, 2, 1, 'like_post', '', 11, '2025-07-17 01:24:59', '2025-07-17 01:24:59'),
(79, 1, 2, 'chat', 'mengirim pesan.', NULL, '2025-07-17 03:14:52', '2025-07-17 03:14:52'),
(80, 2, 1, 'chat', 'mengirim pesan.', NULL, '2025-07-17 03:15:41', '2025-07-17 03:15:41'),
(82, 2, 1, 'like_post', '', 11, '2025-07-17 03:22:55', '2025-07-17 03:22:55'),
(83, 4, 1, 'share_post', 'membagikan postingan kepada kamu.', 7, '2025-07-17 03:23:29', '2025-07-17 03:23:29'),
(85, 5, 1, 'share_post', 'membagikan postingan kepada kamu.', 7, '2025-07-17 05:05:28', '2025-07-17 05:05:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `caption` text,
  `media` varchar(255) NOT NULL,
  `media_type` enum('photo','video') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `caption`, `media`, `media_type`, `created_at`, `updated_at`, `tag`) VALUES
(1, 1, 'edan', 'posts/lqQzZkX6rYwN5bdaL0dDLuPIWsWn3TtrCES4P6yC.png', 'photo', '2025-07-15 21:09:56', '2025-07-15 21:09:56', NULL),
(2, 1, 'edan', 'posts/egmd9r8Z1aNoaJJ7Oo2PgehN0vsGCt2jw5KEbrTJ.mp4', 'video', '2025-07-15 21:22:38', '2025-07-15 21:22:38', NULL),
(3, 1, 'edan', 'posts/KaGbfSFlz2Z2l8rX1D4hVm4fdw705xEgbliAODwH.mp4', 'video', '2025-07-15 21:27:38', '2025-07-15 21:27:38', NULL),
(4, 1, 'anjing', 'posts/tQMnbcG3TjOGEhBzTgEDsDw9q8VcPOL1d0roSBzu.mp4', 'video', '2025-07-15 21:34:55', '2025-07-15 21:34:55', NULL),
(5, 1, 'aaa', 'posts/xqk178HIGrjJPb6B7CKDedN4W8xZTYRaxh2vCQO9.jpg', 'photo', '2025-07-15 21:41:02', '2025-07-15 21:41:02', NULL),
(6, 1, 'ff', 'posts/gDaZ9O06X93O5NhGW7JzgcavsfNqR8SZEIFANbrA.mp4', 'video', '2025-07-15 21:46:55', '2025-07-15 21:46:55', 'edukasi'),
(7, 1, 'uhuy', 'posts/y0a1wApz1PEN864TQLsHYbuxnzm92wG23tX1nEH1.mp4', 'video', '2025-07-16 00:29:08', '2025-07-16 00:29:08', 'sekolah'),
(8, 2, 'aww', 'posts/z5xPOOuqcHbR8Hz7igRD5ZeGbQr8N5o8gQ3IMrO0.png', 'photo', '2025-07-16 02:08:50', '2025-07-16 02:08:50', 'romance'),
(9, 3, 'tes', 'posts/0zkScj4KGFZylO3e6CRivcjugHtEJQz12DFEBrwt.jpg', 'photo', '2025-07-16 06:00:25', '2025-07-16 06:00:25', 'bisnis'),
(10, 3, 'ang pangalan bagong', 'posts/TVFScS6zi54OnUJCtgR3xr9JB2qkg7a4M2jjKi5U.mp4', 'video', '2025-07-16 06:35:17', '2025-07-16 06:35:17', 'netflix'),
(11, 2, 'ahhh', 'posts/XEqYSUsuPc4Sd20cujoxZHXh0TAREmJyoh8MRcmj.mp4', 'video', '2025-07-16 21:08:23', '2025-07-16 21:08:23', 'trending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0W6hT91kaiafv3PfFAnoEnq9ZrXRbBaFWP87Tlfi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGtQMmJ3VVY4QTVveUJ4OW1ua0luMGVhZDZCeTlMRUxvbm5aWkp2ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1752754006);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shares`
--

CREATE TABLE `shares` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `to_user_id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `caption` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `shares`
--

INSERT INTO `shares` (`id`, `user_id`, `to_user_id`, `post_id`, `caption`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 11, NULL, '2025-07-17 00:15:03', '2025-07-17 00:15:03'),
(2, 2, 3, 11, NULL, '2025-07-17 00:50:36', '2025-07-17 00:50:36'),
(3, 2, 3, 11, NULL, '2025-07-17 00:50:53', '2025-07-17 00:50:53'),
(4, 2, 1, 11, NULL, '2025-07-17 00:51:23', '2025-07-17 00:51:23'),
(5, 2, 1, 11, NULL, '2025-07-17 00:53:52', '2025-07-17 00:53:52'),
(6, 1, 2, 11, NULL, '2025-07-17 00:58:52', '2025-07-17 00:58:52'),
(7, 2, 1, 7, NULL, '2025-07-17 00:59:41', '2025-07-17 00:59:41'),
(8, 1, 2, 2, NULL, '2025-07-17 01:15:54', '2025-07-17 01:15:54'),
(9, 2, 1, 11, NULL, '2025-07-17 01:19:50', '2025-07-17 01:19:50'),
(10, 1, 4, 7, NULL, '2025-07-17 03:23:29', '2025-07-17 03:23:29'),
(11, 1, 5, 7, NULL, '2025-07-17 05:05:28', '2025-07-17 05:05:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text,
  `profile_photo` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `bio`, `profile_photo`, `cover_photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'erditya megantoro', 'dit@gmail.com', NULL, '$2y$12$ePPJSvWjzPmF8x576FWBFOHeGkvwWPrgQpjlpgepDTZI.9Ma96tEC', 'mantap', 'profile_photos/IkkpdpqOc5UJkBR0R1xUK8FSYI5EP4ZaxMrHDNp9.png', 'cover_photos/txkyOvByTl2qMF11gy3z2n1307tRdm7yvqHP7xgY.png', NULL, '2025-07-15 20:58:04', '2025-07-16 01:47:57'),
(2, 'amel', 'mel@gmail.com', NULL, '$2y$12$8P0FGc7G4idQlc5.nolVLu8my8crLk5BIroKcksmvD9C7yZvQsVBu', 'aku tak tahu', 'profile_photos/QROyoQnsIt0E0NDiS08eYUucgNEyahw7GDbd269F.png', 'cover_photos/RyJnQUciqiHZEetNmozxhu1FP3GiZN0ANy7GMlNr.png', NULL, '2025-07-16 00:30:04', '2025-07-16 03:08:01'),
(3, 'agus', 'gus@gmail.com', NULL, '$2y$12$h4M0V46AdL4KavUPNTxT2e4I9MQoOQdjEkjOUWzwQn71rJXIf141m', NULL, NULL, NULL, NULL, '2025-07-16 03:31:23', '2025-07-16 03:31:23'),
(4, 'nguyen', 'yen@gmail.com', NULL, '$2y$12$86fINE.SCZl7s8ZJQq8zReWX6RGzWnkw6NxKRv/VDebQtZafZdJlK', NULL, NULL, NULL, NULL, '2025-07-17 01:10:00', '2025-07-17 01:10:00'),
(5, 'siska', 'sis@gmail.com', NULL, '$2y$12$4qiHr59Q3EZsWBucSJcAHOIhGTZD5TqRukuSWv3cbtSa9bo80CvMK', NULL, NULL, NULL, NULL, '2025-07-17 03:43:46', '2025-07-17 03:43:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_from_user_id_foreign` (`from_user_id`),
  ADD KEY `chats_to_user_id_foreign` (`to_user_id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `follows_user_id_followed_user_id_unique` (`user_id`,`followed_user_id`),
  ADD KEY `follows_followed_user_id_foreign` (`followed_user_id`);

--
-- Indeks untuk tabel `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `friends_user_id_friend_id_unique` (`user_id`,`friend_id`),
  ADD KEY `friends_friend_id_foreign` (`friend_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`),
  ADD KEY `likes_comment_id_foreign` (`comment_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_from_user_id_foreign` (`from_user_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shares_user_id_foreign` (`user_id`),
  ADD KEY `shares_post_id_foreign` (`post_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `shares`
--
ALTER TABLE `shares`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_followed_user_id_foreign` FOREIGN KEY (`followed_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_friend_id_foreign` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friends_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `shares`
--
ALTER TABLE `shares`
  ADD CONSTRAINT `shares_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shares_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
