-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2025 at 06:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inktank_cms`
--

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `image`, `content`) VALUES
(1, 'Why Ink Tank?', 'images/why-icon.png', 'Copywriting and creating new content that breaks through the “noise” is a challenge we all face regardless of industry, starting a new business or an established business. Content is king when it comes to online marketing especially and Copywriting and creating new content that breaks through the \"noise\" is a challenge we all face regardless of Industry, we''re passionate about being able to assist people find their voice and share their brand with the world in a way that connects with their audience and converts to sales.');

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$.G/K4s5pSFLOTDZ/G9CV9OJGUH1J6z/ZLtbenB3G0dTDMpD6T9ppC', '2025-08-25 11:00:45');

--
-- Table structure for table `banner_section`
--

CREATE TABLE `banner_section` (
  `id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner_section`
--

INSERT INTO `banner_section` (`id`, `heading`, `image_path`, `alt_text`, `is_active`, `sort_order`, `created_at`, `link`) VALUES
(1, 'We create content that<br />converts and connects', 'images/banner.png', 'Slide1', 1, 1, '2025-08-25 12:20:28', NULL),
(2, 'We create content that<br />converts and connects', 'images/Services---Authors.jpg', 'Slide2', 1, 2, '2025-08-25 12:20:28', NULL),
(3, 'We create content that<br />converts and connects', 'images/Services---Business-Owners.jpg', 'Slide3', 1, 3, '2025-08-25 12:20:28', NULL),
(4, 'We create content that<br />converts and connects', 'images/Services---Freelance-Writers.jpg', 'Slide4', 1, 4, '2025-08-25 12:20:28', NULL),
(5, 'We create content that<br />converts and connects', 'images/Services---Marketing-Agencies.jpg', 'Slide5', 1, 5, '2025-08-25 12:20:28', NULL);

--
-- Table structure for table `content_expertise`
--

CREATE TABLE `content_expertise` (
  `id` int(11) NOT NULL,
  `expertise_name` varchar(255) NOT NULL,
  `expertise_url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content_expertise`
--

INSERT INTO `content_expertise` (`id`, `expertise_name`, `expertise_url`, `is_active`, `sort_order`, `created_at`) VALUES
(1, 'Blogs', '#Blogs', 1, 1, '2025-08-25 11:00:46'),
(2, 'Video scripts', '#Video scripts', 1, 2, '2025-08-25 11:00:46'),
(3, 'Website copy and landing pages', '#Website copy and landing pages', 1, 3, '2025-08-25 11:00:46'),
(4, 'Email copy', '#Email copy', 1, 4, '2025-08-25 11:00:46'),
(5, 'Sales letters', '#Sales letters', 1, 5, '2025-08-25 11:00:46'),
(6, 'Press releases', '#Press releases', 1, 6, '2025-08-25 11:00:46'),
(7, 'Articles', '#Articles', 1, 7, '2025-08-25 11:00:46'),
(8, 'Submissions', '#Submissions', 1, 8, '2025-08-25 11:00:46'),
(9, 'Social media posts', '#Social media posts', 1, 9, '2025-08-25 11:00:46'),
(10, 'Linked in Bio''s', '#Linked in Bio''s', 1, 10, '2025-08-25 11:00:46');

--
-- Table structure for table `content_sections`
--

CREATE TABLE `content_sections` (
  `id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `heading` text DEFAULT NULL,
  `sub_heading` text DEFAULT NULL,
  `button_text` varchar(100) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content_sections`
--

INSERT INTO `content_sections` (`id`, `section_name`, `heading`, `sub_heading`, `button_text`, `is_active`, `sort_order`, `updated_at`) VALUES
(1, 'main_intro', 'Here at Ink Tank we create content that connects, converts,<br /> and communicates your brand.', NULL, 'Find your copy cure with us', 1, 1, '2025-08-25 11:00:45'),
(2, 'more_than_content', 'We create More than content', 'We can develop strategy, content management plans and engagement execution', NULL, 1, 2, '2025-08-25 11:00:45'),
(3, 'work_with', 'We work with B2B, B2C, SME''S + other acronyms', NULL, 'Click here for our range of services', 1, 3, '2025-08-25 11:00:45');

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) NOT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `company_name`, `logo_path`, `website_url`, `is_active`, `sort_order`, `created_at`) VALUES
(1, 'Client 1', 'images/Logo-1.jpg', NULL, 1, 1, '2025-08-25 11:00:46'),
(2, 'Client 2', 'images/Logo-2.jpg', NULL, 1, 2, '2025-08-25 11:00:46'),
(3, 'Client 3', 'images/Logo-3.jpg', NULL, 1, 3, '2025-08-25 11:00:46'),
(4, 'Client 4', 'images/Logo-4.jpg', NULL, 1, 4, '2025-08-25 11:00:46'),
(5, 'Client 5', 'images/Logo-5.jpg', NULL, 1, 5, '2025-08-25 11:00:46');

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_subtitle` varchar(255) DEFAULT NULL,
  `service_description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_subtitle`, `service_description`, `image_path`, `is_active`, `sort_order`, `created_at`) VALUES
(1, 'BUSINESS OWNERS', 'That need content', 'Great content = great results<br />We have a network of local writers who are passionately creative and highly experienced in marketing copywriting.', 'images/img-1.png', 1, 1, '2025-08-25 11:00:45'),
(2, 'MARKETING AGENCIES', 'overflow content needs', 'Need to outsource copywriting for overflow work?<br /><br />We are experienced with all types of content white labelled for your clients.', 'images/img-2.png', 1, 2, '2025-08-25 11:00:45'),
(3, 'FREELANCE WRITERS', 'That want to up their content game', 'Need to outsource copywriting for overflow work?<br /><br />We are experienced with all types of content white labelled for your clients.', 'images/img-3.png', 1, 3, '2025-08-25 11:00:45'),
(4, 'AUTHORS', 'That need marketing help', 'Need to outsource copywriting for overflow work?<br /><br />We are experienced with all types of content white labelled for your clients.', 'images/img-4.png', 1, 4, '2025-08-25 11:00:45');

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `setting_name`, `setting_value`, `updated_at`) VALUES
(1, 'site_title', 'INKTANK', '2025-08-25 11:00:45'),
(2, 'phone_number', '+123 456 7890', '2025-08-25 11:00:45'),
(3, 'email', 'name@gmail.com', '2025-08-25 11:00:45'),
(4, 'address', 'No, Street Name, City Name,<br>Country, Zip Code', '2025-08-25 11:00:45'),
(5, 'facebook_url', '#facebook.com', '2025-08-25 11:00:45'),
(6, 'twitter_url', '#twitter.com', '2025-08-25 11:00:45'),
(7, 'googleplus_url', '#googleplus.com', '2025-08-25 11:00:45'),
(8, 'linkedin_url', '#linkedin.com', '2025-08-25 11:00:45');

--
-- Indexes for dumped tables
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `banner_section`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `content_expertise`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `content_sections`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_name` (`setting_name`);

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `banner_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `content_expertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `content_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `site_settings`
 MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;