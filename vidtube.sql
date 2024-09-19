-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 03:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vidtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel_list`
--

CREATE TABLE `channel_list` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `author_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `links` text DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `channel_list`
--

INSERT INTO `channel_list` (`id`, `unique_id`, `author_id`, `name`, `description`, `links`, `profile_photo`, `cover_photo`, `status`) VALUES
(2, 'mHA2h0qjDZ', 'mjTl7vpg', 'mohatamim', NULL, NULL, 'mjTl7vpg.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `vid_id` varchar(20) NOT NULL,
  `parent_id` varchar(20) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `privacy` tinyint(2) DEFAULT 0,
  `videos` text DEFAULT NULL,
  `status` tinyint(2) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `favourite` text DEFAULT NULL,
  `watch_later` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `unique_id`, `first_name`, `last_name`, `email`, `password`, `photo`, `user_name`, `gender`, `birthday`, `status`, `role`, `favourite`, `watch_later`, `created_at`) VALUES
(1, 'mjTl7vpg', 'Mohatamim', 'Haque', 'mohatamim0haque@gmail.com', 'Mohatamim1@', 'mjTl7vpg.jpg', 'mohatamim', 'Male', '2002-02-23', 1, 0, '9dkkcFYLLb1W,E879ojuTJD6E', 'E879ojuTJD6E', '2024-08-24 23:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `title` varchar(255) DEFAULT '',
  `video` varchar(255) DEFAULT '',
  `duration` float DEFAULT 0,
  `thumbnail` varchar(500) DEFAULT '',
  `specifier` text DEFAULT NULL,
  `tags` varchar(500) DEFAULT '',
  `category` text DEFAULT NULL,
  `cast` text DEFAULT NULL,
  `about` text DEFAULT '  ',
  `moment` text DEFAULT NULL,
  `owner` varchar(255) NOT NULL,
  `active_thumbnail` tinyint(2) DEFAULT 1,
  `scrubbing_img` text DEFAULT '',
  `subtitle` text DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT 'long',
  `views` int(11) NOT NULL DEFAULT 0,
  `comments` int(11) NOT NULL DEFAULT 0,
  `comments_status` tinyint(2) NOT NULL DEFAULT 1,
  `audience` tinyint(2) NOT NULL DEFAULT 0,
  `status` tinyint(2) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `unique_id`, `title`, `video`, `duration`, `thumbnail`, `specifier`, `tags`, `category`, `cast`, `about`, `moment`, `owner`, `active_thumbnail`, `scrubbing_img`, `subtitle`, `type`, `views`, `comments`, `comments_status`, `audience`, `status`, `created_at`) VALUES
(1, 'IYimyspUhu3m', 'Rabi Ul Awal Title Naat 2020 - Pukaro Ya Rasool Allah ﷺ  - Ghulam Mustafa Qadri', 'IYimyspUhu3m.mp4', 429.685, ',1725323822521.jpg,1725323827402.jpg,1725323831924.jpg', NULL, '', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, 'mjTl7vpg', 3, '1.jpeg///2.jpeg///3.jpeg///4.jpeg///5.jpeg///6.jpeg///7.jpeg///8.jpeg///9.jpeg///10.jpeg///11.jpeg///12.jpeg///13.jpeg///14.jpeg///15.jpeg///16.jpeg///17.jpeg///18.jpeg///19.jpeg///20.jpeg///21.jpeg///22.jpeg///23.jpeg///24.jpeg///25.jpeg///26.jpeg///27.jpeg///28.jpeg///29.jpeg///30.jpeg///31.jpeg///32.jpeg///33.jpeg///34.jpeg///35.jpeg///36.jpeg///37.jpeg///38.jpeg///39.jpeg///40.jpeg///41.jpeg///42.jpeg///43.jpeg', '', 'long', 2, 0, 1, 0, 0, '2024-09-03 00:36:17'),
(2, 'yYQWPhizHVaJ', 'Woh Mera Nabi Hai - Syed Hassan Ullah Hussaini - Muhammad Shaffan - Muhammad Junaid - Home Islamic', 'yYQWPhizHVaJ.mp4', 301.743, ',1725323876839.jpg,1725323877077.jpg,1725323877300.jpg', NULL, '', '3', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, 'mjTl7vpg', 3, '1.jpeg///2.jpeg///3.jpeg///4.jpeg///5.jpeg///6.jpeg///7.jpeg///8.jpeg///9.jpeg///10.jpeg///11.jpeg///12.jpeg///13.jpeg///14.jpeg///15.jpeg///16.jpeg///17.jpeg///18.jpeg///19.jpeg///20.jpeg///21.jpeg///22.jpeg///23.jpeg///24.jpeg///25.jpeg///26.jpeg', '', 'long', 0, 0, 1, 0, 0, '2024-09-03 00:37:23'),
(3, 'Z7tnwHyK9Qpw', 'faslon ko takalluf hai humse agar bangla - فاصلوں کو تکلف ہے ہم سے اگر  - HTR', 'Z7tnwHyK9Qpw.mp4', 379.646, ',1725323923260.jpg,1725323924783.jpg,1725323925896.jpg,1725323927182.jpg', NULL, '', NULL, NULL, NULL, NULL, 'mjTl7vpg', 3, '1.jpeg///2.jpeg///3.jpeg///4.jpeg///5.jpeg///6.jpeg///7.jpeg///8.jpeg///9.jpeg///10.jpeg///11.jpeg///12.jpeg///13.jpeg///14.jpeg///15.jpeg///16.jpeg///17.jpeg///18.jpeg///19.jpeg///20.jpeg///21.jpeg///22.jpeg///23.jpeg///24.jpeg///25.jpeg///26.jpeg///27.jpeg///28.jpeg///29.jpeg///30.jpeg///31.jpeg///32.jpeg///33.jpeg///34.jpeg///35.jpeg///36.jpeg///37.jpeg', '', 'long', 0, 0, 1, 0, 0, '2024-09-03 00:38:28'),
(4, 'CR0FgKJBMsXD', 'Humne Aankhon Se Dekha Nahin Hai Mgar -- Mazharul Islam -- The Most Beautiful Naat 2023', 'CR0FgKJBMsXD.mp4', 305.11, ',1725323951902.jpg,1725323953803.jpg,1725323955422.jpg,1725323956712.jpg', NULL, '', NULL, NULL, NULL, NULL, 'mjTl7vpg', 4, '1.jpeg///2.jpeg///3.jpeg///4.jpeg///5.jpeg///6.jpeg///7.jpeg///8.jpeg///9.jpeg///10.jpeg///11.jpeg///12.jpeg///13.jpeg///14.jpeg///15.jpeg///16.jpeg///17.jpeg///18.jpeg///19.jpeg///20.jpeg///21.jpeg///22.jpeg///23.jpeg///24.jpeg///25.jpeg///26.jpeg', '', 'long', 0, 0, 1, 0, 0, '2024-09-03 00:38:59'),
(5, 'g7smQJkHwsIL', 'ছেড়েদে নৌকা মাঝি যাবো মদিনায় - Shafi Mandal - Channel i Music', 'g7smQJkHwsIL.mp4', 469.415, ',1725323988991.jpg,1725323991813.jpg,1725323993972.jpg,1725323996298.jpg', NULL, '', NULL, NULL, NULL, NULL, 'mjTl7vpg', 4, '1.jpeg///2.jpeg///3.jpeg///4.jpeg///5.jpeg///6.jpeg///7.jpeg///8.jpeg///9.jpeg///10.jpeg///11.jpeg///12.jpeg///13.jpeg///14.jpeg///15.jpeg///16.jpeg///17.jpeg///18.jpeg///19.jpeg///20.jpeg///21.jpeg///22.jpeg///23.jpeg///24.jpeg///25.jpeg///26.jpeg///27.jpeg///28.jpeg///29.jpeg///30.jpeg///31.jpeg///32.jpeg///33.jpeg///34.jpeg///35.jpeg///36.jpeg///37.jpeg///38.jpeg///39.jpeg///40.jpeg///41.jpeg///42.jpeg///43.jpeg///44.jpeg///45.jpeg///46.jpeg///47.jpeg', '', 'long', 0, 0, 1, 0, 0, '2024-09-03 00:39:23'),
(6, 'm1sdIDhWz4Mt', 'ইঞ্চি ইঞ্চি মাটি । Inchi Inchi Mati । Muhib Khan । Desher Gaan । Remake 2022', 'm1sdIDhWz4Mt.mp4', 258.926, ',1725324018926.jpg,1725324018962.jpg', NULL, '', NULL, NULL, NULL, NULL, 'mjTl7vpg', 1, '1.jpeg///2.jpeg///3.jpeg///4.jpeg///5.jpeg///6.jpeg///7.jpeg///8.jpeg///9.jpeg///10.jpeg///11.jpeg///12.jpeg///13.jpeg///14.jpeg///15.jpeg///16.jpeg///17.jpeg///18.jpeg///19.jpeg///20.jpeg///21.jpeg///22.jpeg///23.jpeg///24.jpeg///25.jpeg///26.jpeg///27.jpeg///28.jpeg///29.jpeg///30.jpeg///31.jpeg///32.jpeg///33.jpeg///34.jpeg///35.jpeg///36.jpeg///37.jpeg///38.jpeg///39.jpeg///40.jpeg///41.jpeg///42.jpeg///43.jpeg///44.jpeg///45.jpeg///46.jpeg///47.jpeg///48.jpeg///49.jpeg///50.jpeg///51.jpeg///52.jpeg', '', 'long', 0, 0, 1, 0, 0, '2024-09-03 00:40:06'),
(7, 'j0piuax0AAb6', 'Ore Nil Doriya ( New Version ) ওরে নীল দরিয়া _ Old Bangla Song New Version _ Saif Zohan', 'j0piuax0AAb6.mp4', 380.854, ',1725324045960.jpg,1725324046057.jpg', NULL, '', NULL, NULL, NULL, NULL, 'mjTl7vpg', 2, '1.jpeg///2.jpeg///3.jpeg///4.jpeg///5.jpeg///6.jpeg///7.jpeg///8.jpeg///9.jpeg///10.jpeg///11.jpeg///12.jpeg///13.jpeg///14.jpeg///15.jpeg///16.jpeg///17.jpeg///18.jpeg///19.jpeg///20.jpeg///21.jpeg///22.jpeg///23.jpeg///24.jpeg///25.jpeg///26.jpeg///27.jpeg///28.jpeg///29.jpeg///30.jpeg///31.jpeg///32.jpeg///33.jpeg///34.jpeg///35.jpeg///36.jpeg///37.jpeg///38.jpeg', '', 'long', 0, 0, 1, 0, 0, '2024-09-03 00:40:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel_list`
--
ALTER TABLE `channel_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `unique_id` (`unique_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `id` (`id`,`unique_id`,`title`,`video`,`duration`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel_list`
--
ALTER TABLE `channel_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
