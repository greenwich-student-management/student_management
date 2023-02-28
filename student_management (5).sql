-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 03:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `classmanagement`
--

CREATE TABLE `classmanagement` (
  `id` int(11) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `classcode` varchar(255) NOT NULL,
  `major_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classmanagement`
--

INSERT INTO `classmanagement` (`id`, `classname`, `classcode`, `major_id`) VALUES
(4, 'GCC1002', 'GCC1002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230218025049', '2023-02-23 04:33:55', 58),
('DoctrineMigrations\\Version20230223033346', '2023-02-23 04:33:55', 100),
('DoctrineMigrations\\Version20230224094157', '2023-02-24 10:42:09', 1865),
('DoctrineMigrations\\Version20230224094402', '2023-02-24 10:44:08', 170),
('DoctrineMigrations\\Version20230224094719', '2023-02-24 10:47:22', 242),
('DoctrineMigrations\\Version20230224101324', '2023-02-24 11:13:52', 160);

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(11) NOT NULL,
  `codemajor` varchar(255) NOT NULL,
  `namemajor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `codemajor`, `namemajor`) VALUES
(1, 'GCC', 'IT'),
(2, 'GBC', 'Business Administration'),
(3, 'GDC', 'Graphic Design');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `score` double NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `score`, `student_id`, `subject_id`) VALUES
(1, 6, 5, 3),
(2, 6.5, 2, 3),
(3, 6.6, 3, 3),
(4, 7, 1, 3),
(5, 9, 4, 3),
(7, 6.5, 16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `studentmanagement`
--

CREATE TABLE `studentmanagement` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `studentcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentmanagement`
--

INSERT INTO `studentmanagement` (`id`, `fullname`, `studentcode`, `email`, `image`) VALUES
(1, 'Phan Truong Quoc Thinh', 'GBC210227', 'thinhptqgbc210227@fpt.edu.vn', 'thinh-63fa37b8832c3.jpg'),
(2, 'Huynh Hoang Khiem', 'GCC210280', 'khiemhhgcc210280@fpt.edu.vn', 'z4133568394095_9f81ff822e64b07a71431978acd74d0d.jpg'),
(3, 'Nguyen Ha Nhat Linh', 'GCC210269', 'linhNHNGCC210269@fpt.edu.vn', 'z4133556106279_916bc0b0a459db066e9d106f498a4a42.jpg'),
(4, 'Ta Minh The', 'GCC210145', 'theTMGCC210145@fpt.edu.vn', 'z4133559550507_a7785578dec9488a93368bb763a5046b.jpg'),
(5, 'Giang Tuan', 'GCC210137', 'tuanGGCC210137@fpt.edu.vn', 'z4133557549590_723dd98193bb4920552cd370ce80fc58.jpg'),
(16, 'Dang Tran Quang Huy', 'GCC210095', 'HuyDTQGCC210095', 'HUYAD-63fcde45a4a43.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `study`
--

CREATE TABLE `study` (
  `id` int(11) NOT NULL,
  `term` varchar(255) NOT NULL,
  `part` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study`
--

INSERT INTO `study` (`id`, `term`, `part`, `subject_id`, `class_id`) VALUES
(1, 'Spring', 1, 3, 4),
(2, 'Spring', 2, 3, 4),
(3, 'Summer', 1, 3, 4),
(4, 'Summer', 2, 3, 4),
(5, 'Fall', 1, 3, 4),
(6, 'Fall', 2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subjectmanagement`
--

CREATE TABLE `subjectmanagement` (
  `id` int(11) NOT NULL,
  `subjectname` varchar(255) NOT NULL,
  `subjectcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjectmanagement`
--

INSERT INTO `subjectmanagement` (`id`, `subjectname`, `subjectcode`) VALUES
(3, 'COMP-1589', 'Computer Systems and Internet Technology'),
(4, 'COMP-1752', 'Object Oriented Programming '),
(5, 'COMP-1753', 'Programming Base');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`) VALUES
(1, 'user@gmail.com', '[\"ROLE_USER\"]', '$2y$13$uykGD5LlI/hEu8sKd/dCmenbEelXnwM24PUHPLFG4VacsNGBVFoKK', 'user'),
(3, 'user2@gmail.com', '[\"ROLE_USER\"]', '$2y$13$TasC1Jsf/nK4RHMumMSps.X1YYDxyzJOIxCLLas1rykKHxGGk8E3W', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classmanagement`
--
ALTER TABLE `classmanagement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2D0DAB6DE93695C7` (`major_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_32993751CB944F1A` (`student_id`),
  ADD KEY `IDX_3299375123EDC87` (`subject_id`);

--
-- Indexes for table `studentmanagement`
--
ALTER TABLE `studentmanagement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E67F974923EDC87` (`subject_id`),
  ADD KEY `IDX_E67F9749EA000B10` (`class_id`);

--
-- Indexes for table `subjectmanagement`
--
ALTER TABLE `subjectmanagement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classmanagement`
--
ALTER TABLE `classmanagement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studentmanagement`
--
ALTER TABLE `studentmanagement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `study`
--
ALTER TABLE `study`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjectmanagement`
--
ALTER TABLE `subjectmanagement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classmanagement`
--
ALTER TABLE `classmanagement`
  ADD CONSTRAINT `FK_2D0DAB6DE93695C7` FOREIGN KEY (`major_id`) REFERENCES `major` (`id`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `FK_3299375123EDC87` FOREIGN KEY (`subject_id`) REFERENCES `subjectmanagement` (`id`),
  ADD CONSTRAINT `FK_32993751CB944F1A` FOREIGN KEY (`student_id`) REFERENCES `studentmanagement` (`id`);

--
-- Constraints for table `study`
--
ALTER TABLE `study`
  ADD CONSTRAINT `FK_E67F974923EDC87` FOREIGN KEY (`subject_id`) REFERENCES `subjectmanagement` (`id`),
  ADD CONSTRAINT `FK_E67F9749EA000B10` FOREIGN KEY (`class_id`) REFERENCES `classmanagement` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
