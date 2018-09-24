-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2018 at 06:11 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MedicalCentersManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `Adresses`
--

CREATE TABLE IF NOT EXISTS `Adresses` (
  `id` int(11) NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Adresses`
--

INSERT INTO `Adresses` (`id`, `adress`, `city`, `zip_code`, `province`, `country`, `details`, `created`, `modified`, `user_id`) VALUES
(3, '180 rang Point-du-Jour Nord', 'L''Assomption', 'J5W 1G6', 'Quebec', 'Canada', 'Aucuns', '2018-09-08 00:00:00', '2018-09-10 17:49:35', 6),
(4, '1600 boulevard du souvenir', 'Laval', 'H7L 6A3', 'Quebec', 'Canada', '', '2018-09-24 16:01:03', '2018-09-24 16:01:03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `assignment_date` date NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `chamber_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `department_id`, `patient_id`, `assignment_date`, `reason`, `level_id`, `chamber_id`, `created`, `modified`, `user_id`) VALUES
(1, 1, 1, '2018-09-10', 'Medical emergency.', 1, 1, '2018-09-10 15:53:10', '2018-09-24 16:09:20', 2),
(2, 2, 2, '2018-09-24', 'Intense cough.', 1, 1, '2018-09-24 16:10:17', '2018-09-24 16:10:43', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Chambers`
--

CREATE TABLE IF NOT EXISTS `Chambers` (
  `id` int(11) NOT NULL,
  `number` int(5) NOT NULL,
  `level_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Chambers`
--

INSERT INTO `Chambers` (`id`, `number`, `level_id`, `department_id`, `created`, `modified`, `user_id`) VALUES
(1, 100, 1, 1, '2018-09-08 00:00:00', '2018-09-08 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `created`, `modified`, `user_id`) VALUES
(1, 'Psychology', '2018-09-08 00:00:00', '2018-09-24 15:50:31', 2),
(2, 'Rhumatology', '2018-09-24 15:51:03', '2018-09-24 15:53:15', 2),
(3, 'Cardiology', '2018-09-24 15:52:39', '2018-09-24 15:53:34', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--

CREATE TABLE IF NOT EXISTS `Doctors` (
  `id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `medical_center_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_CA', 'Departments', 1, 'department', 'Psychologie'),
(2, 'es_MX', 'Departments', 1, 'department', 'Psicología'),
(3, 'fr_CA', 'Departments', 2, 'department', 'Rhumatologie'),
(4, 'fr_CA', 'Departments', 3, 'department', 'Cardiologie'),
(5, 'es_MX', 'Departments', 2, 'department', 'Reumatología'),
(6, 'es_MX', 'Departments', 3, 'department', 'Cardiología'),
(7, 'fr_CA', 'Patients', 1, 'gender', 'Mâle'),
(8, 'es_MX', 'Patients', 1, 'gender', 'Masculino'),
(9, 'fr_CA', 'Patients', 2, 'gender', 'Mâle'),
(10, 'es_MX', 'Patients', 2, 'gender', 'Masculino'),
(11, 'fr_CA', 'Assignments', 1, 'reason', 'Urgence médicale.'),
(12, 'es_MX', 'Assignments', 1, 'reason', 'Emergencia médica.'),
(13, 'fr_CA', 'Assignments', 2, 'reason', 'Toux intense.'),
(14, 'es_MX', 'Assignments', 2, 'reason', 'Tos intensa.');

-- --------------------------------------------------------

--
-- Table structure for table `Levels`
--

CREATE TABLE IF NOT EXISTS `Levels` (
  `id` int(11) NOT NULL,
  `number` int(3) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Levels`
--

INSERT INTO `Levels` (`id`, `number`, `created`, `modified`, `user_id`) VALUES
(1, 1, '2018-09-08 00:00:00', '2018-09-08 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Medical_Centers`
--

CREATE TABLE IF NOT EXISTS `Medical_Centers` (
  `id` int(11) NOT NULL,
  `adress_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Medical_Centers`
--

INSERT INTO `Medical_Centers` (`id`, `adress_id`, `name`, `director`, `phone`, `details`, `created`, `modified`, `user_id`) VALUES
(1, 3, 'CTest', 'Jean Tremblay', '555 555-555', 'aaa', '2018-09-08 00:00:00', '2018-09-08 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Patients`
--

CREATE TABLE IF NOT EXISTS `Patients` (
  `id` int(11) NOT NULL,
  `adress_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Patients`
--

INSERT INTO `Patients` (`id`, `adress_id`, `first_name`, `last_name`, `gender`, `birth_date`, `email`, `created`, `modified`, `slug`, `user_id`) VALUES
(1, 3, 'Arthur', 'Tremble', 'Male', '2013-09-10', 'ASDF@hotmail.com', '2018-09-10 15:52:47', '2018-09-24 15:56:29', 'Arthur', 2),
(2, 4, 'Arthur', 'Comeau', 'Male', '1970-05-24', 'art@comeau.com', '2018-09-24 16:05:35', '2018-09-24 16:06:23', 'Arthur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'secretaire'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `email`, `password`, `username`, `created`, `modified`, `type`) VALUES
(2, 'admin@admin.com', '$2y$10$hwsu4AnZ7oJcx7H2JKoS/OYwfwr6NEhhh.O/Ieg5DtVF920Mchzyu', 'Admin', '2018-09-07 14:50:32', '2018-09-07 14:50:32', 'admin'),
(6, 'sandrinesarrazin@msn.com', '$2y$10$ydy2d59MsviRTJ.nS1PvqOYJ8gMdvt1QS71oVhQIep.H32asy6MM.', 'Sandrine', '2018-09-08 18:21:19', '2018-09-08 18:21:19', 'secretaire'),
(7, 'Visiteur1@gmail.com', '$2y$10$wxBVPCTQdbnEnnujF24zu.p87.f337gU..SsG6YSAL66yhdFCyyn2', 'Visiteur1', '2018-09-08 18:26:52', '2018-09-08 18:26:52', 'visiteur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Adresses`
--
ALTER TABLE `Adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `chamber_id` (`chamber_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `Chambers`
--
ALTER TABLE `Chambers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `medical_center_id` (`medical_center_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `Levels`
--
ALTER TABLE `Levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Medical_Centers`
--
ALTER TABLE `Medical_Centers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adress_id` (`adress_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Patients`
--
ALTER TABLE `Patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adress_id` (`adress_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Adresses`
--
ALTER TABLE `Adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Chambers`
--
ALTER TABLE `Chambers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Levels`
--
ALTER TABLE `Levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Medical_Centers`
--
ALTER TABLE `Medical_Centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Patients`
--
ALTER TABLE `Patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Adresses`
--
ALTER TABLE `Adresses`
  ADD CONSTRAINT `adresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignments_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `Patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignments_ibfk_4` FOREIGN KEY (`level_id`) REFERENCES `Levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignments_ibfk_5` FOREIGN KEY (`chamber_id`) REFERENCES `Chambers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Chambers`
--
ALTER TABLE `Chambers`
  ADD CONSTRAINT `chambers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chambers_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `Levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chambers_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `Adresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctors_ibfk_3` FOREIGN KEY (`medical_center_id`) REFERENCES `Medical_Centers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Levels`
--
ALTER TABLE `Levels`
  ADD CONSTRAINT `levels_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Medical_Centers`
--
ALTER TABLE `Medical_Centers`
  ADD CONSTRAINT `medical_centers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medical_centers_ibfk_2` FOREIGN KEY (`adress_id`) REFERENCES `Adresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Patients`
--
ALTER TABLE `Patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
