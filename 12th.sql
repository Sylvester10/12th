-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2023 at 01:15 PM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thcityre_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `roles` varchar(1000) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pass_reset_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `level`, `roles`, `password`, `pass_reset_code`, `photo`, `photo_thumb`, `last_login`) VALUES
(5, 'Admin', 'admin@12thcityrealestate.ng', '08184242507', 1, 'All Roles', 'Rest1234', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliates`
--

CREATE TABLE `affiliates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `cv` varchar(50) DEFAULT NULL,
  `cover_letter` varchar(500) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affiliates`
--

INSERT INTO `affiliates` (`id`, `name`, `email`, `phone`, `address`, `dob`, `qualification`, `experience`, `cv`, `cover_letter`, `date_added`) VALUES
(5, 'Josh Brolin', 'admin@12thcityrealestate.ng', '067574976499', 'No 2 Test address', '21-03-2023', 'HND', '2 Years', 'Employment_Anthony_Wheaton1.pdf', 'Dzfbdafbnlkvbfdjkandf;lk', '2023-03-03 03:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `snippet` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `featured_image_thumb` varchar(255) DEFAULT NULL,
  `published` varchar(10) NOT NULL DEFAULT 'true',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `body`, `snippet`, `featured_image`, `featured_image_thumb`, `published`, `date`) VALUES
(3, 'Blooms \'n Daisies Celebrates End Of The Year With Aplomb', 'blooms-n-daisies-celebrates-end-of-the-year-with-aplomb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse ci...', 'Screenshot_2019-11-14_at_10_28_00_PM.png', 'Screenshot_2019-11-14_at_10_28_00_PM_thumb.png', 'true', '2018-11-23 14:24:08'),
(4, 'News With Image In Body', 'news-with-image-in-body', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidat<img src=\"http://topclass.com/assets/uploads/gallery/14.jpg\" alt=\"\" width=\"500\">at non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br><img src=\"localhost/topclass/assets/uploads/gallery/14.jpg\" alt=\"\" width=\"482\" height=\"322\"><br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br><br><br></div>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse ci...', 'IMG_6599.jpg', 'IMG_6599_thumb.jpg', 'true', '2018-11-27 14:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `message`, `date_sent`) VALUES
(42, '.msbvjhsdvbjh', 'svbdflkzvbdfjkvb@gmail.com', 2147483647, 'K.dfjvbdfkjv.jsfkvbndlkhbzdfibnkdlm/blk;bdlzdkf.', '2023-02-14 08:44:37'),
(43, 'Zsfgfd', 'ehdhd@gmail.com', 12345, 'Serdtfygfmngsdzfx', '2023-02-14 09:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `caption` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `snippet` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `featured_image_thumb` varchar(255) DEFAULT NULL,
  `published` varchar(10) NOT NULL DEFAULT 'false',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `published` varchar(10) NOT NULL DEFAULT 'false',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `about` varchar(800) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `about`, `date_added`) VALUES
(3, 'Idu', '<p>We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients.<br></p>', '2023-01-25 17:20:12'),
(4, 'Kurudu', '<p><font color=\"#5c727d\" face=\"Nunito Sans, sans-serif\">We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients.<br></font></p>', '2023-01-25 17:39:43'),
(5, 'Lugbe', '<p>We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients.<br></p>', '2023-01-25 17:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `the_file` varchar(255) DEFAULT NULL,
  `published` varchar(10) NOT NULL DEFAULT 'true',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `the_file`, `published`, `date`) VALUES
(10, 'January 2019 Newsletter', 'M4W4ZD.pdf', 'true', '2019-01-24 11:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `name`, `email`, `date`) VALUES
(19, 'Thomas Jeff', 'onyekaesso10@gmail.com', '2019-01-28 18:04:38'),
(20, 'Peter Griffin', 'onyekaesso@yahoo.com', '2019-01-28 18:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` varchar(1900) DEFAULT NULL,
  `snippet` varchar(500) DEFAULT NULL,
  `brochure_file` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `featured_image_thumb` varchar(255) DEFAULT NULL,
  `published` varchar(11) NOT NULL DEFAULT 'true',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `location`, `description`, `snippet`, `brochure_file`, `featured_image`, `featured_image_thumb`, `published`, `date_created`) VALUES
(26, 'Project Idu', 'Idu', '<p>The Idu project<br></p>', 'The Idu project', 'Document.pdf', 'final_gate11.jpg', 'final_gate11_thumb.jpg', 'true', '2023-02-01 20:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(200) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `lga` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `amenities` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `floor_plans` varchar(255) DEFAULT NULL,
  `floor_plans_thumb` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `featured_image_thumb` varchar(255) DEFAULT NULL,
  `availability` varchar(11) NOT NULL DEFAULT 'true',
  `published` varchar(11) NOT NULL DEFAULT 'true',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `residential_address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `active` varchar(10) NOT NULL DEFAULT 'true',
  `facebook_handle` varchar(255) DEFAULT 'https://facebook.com/',
  `twitter_handle` varchar(255) DEFAULT 'https://twitter.com/',
  `instagram_handle` varchar(255) DEFAULT 'https://instagram.com/',
  `linkedin_handle` varchar(255) DEFAULT 'https://linkedin.com/',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `testimony` varchar(800) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `published` varchar(11) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `testimony`, `date`, `published`) VALUES
(22, 'Joshua', 'We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients.', '2023-01-25 17:52:42', 'true'),
(24, 'Dayo', 'We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients.', '2023-01-25 17:59:19', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliates`
--
ALTER TABLE `affiliates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `affiliates`
--
ALTER TABLE `affiliates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
