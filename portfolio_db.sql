-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2025 at 09:39 AM
-- Server version: 8.0.35
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--
CREATE DATABASE portfolio;
USE portfolio;

CREATE TABLE `experience` (
  `id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `institution` varchar(200) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `title`, `institution`, `start_date`, `end_date`, `description`) VALUES
(1, 'BS in Information Technology', 'Camarines Sur Polytechnic Colleges', '2022-08-01', NULL, 'Currently pursuing a Bachelor of Information Technology degree in Information Technology with focus on web development, database management, and software engineering principles. Maintaining a strong academic record while actively participating in coding competitions and tech community events.'),
(2, 'Web Developer Intern', 'Tech Start Company', '2024-06-01', '2024-08-31', 'Developed and maintained responsive web applications using PHP and MySQL. Collaborated with senior developers to implement new features and optimize database queries. Gained hands-on experience in full-stack development and agile methodology.'),
(3, 'Freelance Web Designer', 'Self-Employed', '2023-01-01', '2024-05-31', 'Created custom websites for local businesses and startups. Managed client relationships, gathered requirements, and delivered projects on time. Specialized in creating responsive, SEO-friendly websites using modern web technologies.');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `about_summary` text,
  `profile_picture_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `full_name`, `tagline`, `email`, `phone_number`, `about_summary`, `profile_picture_url`) VALUES
(2, 'Emman James Sanchez', 'Full-Stack Web Developer & Database Enthusiast', 'emmanjames112715@email.com', '+63 912 345 6789', 'Passionate web developer with expertise in building dynamic, responsive websites. I specialize in PHP, MySQL, and modern frontend technologies. Currently pursuing a degree in Information Technology with a focus on web development and database management. I love solving complex problems and creating user-friendly digital experiences.', 'assets/img/portfolio.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `proficiency` int DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `proficiency`, `category`) VALUES
(1, 'PHP', 85, 'Backend'),
(2, 'MySQL', 80, 'Database'),
(3, 'HTML5', 90, 'Frontend'),
(4, 'CSS3', 88, 'Frontend'),
(5, 'JavaScript', 75, 'Frontend'),
(6, 'Bootstrap', 82, 'Frontend'),
(7, 'Laravel', 78, 'Backend');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
