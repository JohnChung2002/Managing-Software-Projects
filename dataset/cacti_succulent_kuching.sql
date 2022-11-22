-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2022 at 11:37 AM
-- Server version: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cacti_succulent_kuching`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(10) UNSIGNED NOT NULL,
  `banner_image` text NOT NULL,
  `banner_description` varchar(255) NOT NULL,
  `banner_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `booking_id` char(11) NOT NULL,
  `booking_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `appointment_date` date NOT NULL,
  `appointment_timeslot` time NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `number_of_attendees` tinyint(3) UNSIGNED NOT NULL,
  `booking_status` enum('Confirmed','Cancelled') NOT NULL,
  `edit_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `cancellation_remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`booking_id`, `booking_timestamp`, `appointment_date`, `appointment_timeslot`, `user_id`, `number_of_attendees`, `booking_status`, `edit_count`, `cancellation_remarks`) VALUES
('-osk3rEY4Tc', '2022-11-01 12:49:58', '2022-11-14', '13:00:00', 21, 1, 'Cancelled', 0, NULL),
('-x5RE52ELD4', '2022-11-16 03:21:10', '2022-11-16', '12:00:00', 40, 6, 'Confirmed', 0, NULL),
('-Y1elFc0ysY', '2022-11-01 12:49:58', '2022-11-02', '10:00:00', 9, 2, 'Confirmed', 0, NULL),
('0HrtfpUldlE', '2022-11-15 07:40:01', '2022-11-21', '09:00:00', 46, 5, 'Confirmed', 0, NULL),
('0LS1wPrSdzY', '2022-10-14 15:16:04', '2022-12-08', '16:00:00', 27, 4, 'Confirmed', 0, NULL),
('0qQB5iKls5g', '2022-10-14 15:16:04', '2022-11-07', '10:00:00', 23, 5, 'Cancelled', 0, NULL),
('0wKwaNVWU3E', '2022-10-15 03:31:42', '2022-11-02', '10:00:00', 22, 3, 'Cancelled', 0, NULL),
('1Cz2xq6cZ6I', '2022-10-15 03:31:42', '2022-10-31', '13:00:00', 14, 6, 'Cancelled', 0, NULL),
('21405hGtaI0', '2022-11-09 06:41:26', '2022-11-16', '10:00:00', 15, 2, 'Confirmed', 0, NULL),
('24DPK87cf9A', '2022-11-07 06:10:43', '2022-11-24', '16:00:00', 23, 3, 'Confirmed', 1, NULL),
('2ehFXEvLxPU', '2022-11-15 07:59:07', '2022-11-25', '09:00:00', 46, 2, 'Cancelled', 2, 'Personal reasons'),
('2F4FJx2ENYA', '2022-10-15 03:31:42', '2022-10-19', '12:00:00', 25, 5, 'Confirmed', 0, NULL),
('2sNN_Esx2As', '2022-11-01 12:50:18', '2022-11-01', '00:00:00', 15, 3, 'Cancelled', 0, 'Too early'),
('2t-Vq3Zus4E', '2022-11-01 12:49:58', '2022-10-21', '13:00:00', 27, 5, 'Confirmed', 0, NULL),
('351q0o5kNqM', '2022-11-15 07:52:14', '2022-11-23', '09:00:00', 46, 2, 'Confirmed', 0, NULL),
('3bij-oU-kn8', '2022-11-01 12:49:58', '2022-10-18', '11:00:00', 30, 2, 'Cancelled', 0, NULL),
('3GGFT469rXo', '2022-10-23 15:43:24', '2022-11-01', '00:00:00', 15, 4, 'Confirmed', 0, NULL),
('43XPJqzZA0M', '2022-10-14 15:16:04', '2022-11-18', '09:00:00', 28, 1, 'Confirmed', 0, NULL),
('4BPDO45fn4Q', '2022-10-15 03:31:42', '2022-10-28', '09:00:00', 27, 8, 'Cancelled', 0, NULL),
('5dDTr1LskFA', '2022-11-15 15:44:59', '2022-11-17', '16:00:00', 40, 10, 'Cancelled', 1, 'Illness'),
('5FIftn84VjI', '2022-10-15 03:31:42', '2022-11-18', '09:00:00', 24, 5, 'Confirmed', 0, NULL),
('5tbAya0hbBI', '2022-11-04 13:31:12', '2022-11-24', '09:00:00', 15, 2, 'Confirmed', 1, NULL),
('6UQpLCB4_2o', '2022-11-01 12:50:18', '2022-10-25', '10:00:00', 27, 5, 'Cancelled', 0, NULL),
('73ow2BbS7w0', '2022-10-14 15:16:04', '2022-11-18', '16:00:00', 29, 3, 'Confirmed', 0, NULL),
('7inJUzP8zKo', '2022-11-15 07:36:40', '2022-11-18', '14:00:00', 46, 2, 'Confirmed', 0, NULL),
('7mSttAhO_a8', '2022-11-01 12:50:18', '2022-11-01', '11:00:00', 25, 6, 'Confirmed', 0, NULL),
('7TvC5oiMmHE', '2022-10-14 15:16:04', '2022-11-01', '16:00:00', 27, 6, 'Confirmed', 0, NULL),
('7xzIrD6Nuwc', '2022-10-15 03:31:42', '2022-11-10', '14:00:00', 14, 2, 'Confirmed', 0, NULL),
('80Q00b1icZ4', '2022-10-15 03:31:42', '2022-11-17', '09:00:00', 22, 1, 'Cancelled', 0, NULL),
('8A31RgZ_mWs', '2022-11-01 12:50:18', '2022-10-17', '10:00:00', 14, 5, 'Cancelled', 0, NULL),
('8BvY5sz3Ij8', '2022-10-14 15:16:04', '2022-11-23', '13:00:00', 21, 5, 'Cancelled', 0, NULL),
('8OdsS4FvLp8', '2022-10-14 15:16:04', '2022-11-09', '09:00:00', 23, 5, 'Cancelled', 0, NULL),
('8WSTlnQCoEg', '2022-10-15 03:31:42', '2022-11-07', '13:00:00', 14, 3, 'Cancelled', 0, NULL),
('9fCty64D53A', '2022-10-13 06:22:53', '2022-10-19', '12:00:00', 10, 7, 'Cancelled', 0, NULL),
('9j9TMB1uSxg', '2022-10-23 15:35:36', '2022-11-29', '13:00:00', 15, 1, 'Cancelled', 0, 'Illness'),
('a96g9v24DH8', '2022-10-14 15:16:04', '2022-11-18', '14:00:00', 25, 6, 'Confirmed', 0, NULL),
('ad9_BjXT94Q', '2022-11-01 12:50:18', '2022-10-19', '10:00:00', 27, 7, 'Cancelled', 0, NULL),
('AQZKvWr2qGw', '2022-10-15 03:31:42', '2022-12-09', '15:00:00', 21, 1, 'Confirmed', 0, NULL),
('aRYM289Qflk', '2022-10-14 15:16:04', '2022-11-25', '15:00:00', 24, 7, 'Confirmed', 0, NULL),
('bed897y5Gaw', '2022-10-15 03:31:42', '2022-12-07', '09:00:00', 14, 4, 'Confirmed', 0, NULL),
('biGPa9FCkuY', '2022-10-15 03:31:42', '2022-12-12', '13:00:00', 23, 3, 'Confirmed', 0, NULL),
('bL2ft75Tuz8', '2022-10-14 15:16:04', '2022-12-13', '11:00:00', 14, 6, 'Cancelled', 0, NULL),
('bRhjc36m4uQ', '2022-11-15 09:20:34', '2022-11-17', '16:00:00', 48, 1, 'Cancelled', 2, 'idk'),
('brNModJLBgA', '2022-10-14 15:16:04', '2022-11-10', '16:00:00', 6, 7, 'Cancelled', 0, NULL),
('brU0QCAnuGw', '2022-11-11 08:25:08', '2022-11-18', '11:00:00', 37, 1, 'Cancelled', 1, 'balaaaa'),
('bxywXLLaveQ', '2022-11-07 06:13:41', '2022-11-23', '15:00:00', 15, 3, 'Confirmed', 0, NULL),
('CA1AReETyGg', '2022-10-15 03:31:42', '2022-12-02', '13:00:00', 9, 8, 'Confirmed', 0, NULL),
('cAZ_wl_Pr9w', '2022-11-16 03:23:09', '2022-11-22', '10:00:00', 40, 2, 'Confirmed', 1, NULL),
('cNXA_7r5mRg', '2022-11-01 12:50:18', '2022-10-20', '09:00:00', 26, 6, 'Cancelled', 0, NULL),
('CzVRFOoGiKo', '2022-10-14 15:16:04', '2022-12-12', '13:00:00', 21, 5, 'Cancelled', 0, NULL),
('C_UvQH1z8hw', '2022-11-01 12:50:18', '2022-11-02', '13:00:00', 10, 4, 'Cancelled', 0, NULL),
('D982dSHStqY', '2022-10-14 15:16:04', '2022-10-20', '11:00:00', 10, 4, 'Confirmed', 0, NULL),
('dBiwL8KglXE', '2022-11-16 03:23:53', '2022-11-24', '11:00:00', 40, 4, 'Cancelled', 1, 'Sick'),
('dmJkbYGU5D4', '2022-11-14 09:53:14', '2022-11-15', '10:00:00', 43, 20, 'Confirmed', 0, NULL),
('DncPQH-6Mug', '2022-11-01 12:49:58', '2022-12-01', '16:00:00', 14, 5, 'Confirmed', 0, NULL),
('DtCjnHl38jI', '2022-10-14 15:16:04', '2022-11-17', '10:00:00', 21, 7, 'Confirmed', 0, NULL),
('Dv06dnBmxds', '2022-10-14 15:16:04', '2022-10-21', '12:00:00', 22, 2, 'Confirmed', 0, NULL),
('DzXYCfXJGqw', '2022-10-23 15:45:10', '2022-10-27', '11:00:00', 34, 11, 'Cancelled', 0, 'Illness'),
('e3brWLRrTmY', '2022-10-15 03:31:42', '2022-11-21', '14:00:00', 29, 3, 'Cancelled', 0, NULL),
('e7nm1TpqiSI', '2022-10-15 03:31:42', '2022-11-01', '16:00:00', 28, 4, 'Confirmed', 0, NULL),
('EFhR5HEADkc', '2022-10-15 03:31:42', '2022-12-08', '09:00:00', 9, 3, 'Confirmed', 0, NULL),
('ehCCvwtoLOg', '2022-10-14 15:16:04', '2022-10-18', '09:00:00', 27, 4, 'Cancelled', 0, NULL),
('eiwPcFGhEsM', '2022-10-14 15:16:04', '2022-11-16', '15:00:00', 9, 7, 'Confirmed', 0, NULL),
('ePmuEA-BzYE', '2022-11-01 12:49:58', '2022-11-11', '13:00:00', 22, 3, 'Confirmed', 0, NULL),
('esAx8B-79Wk', '2022-11-01 12:49:58', '2022-12-05', '09:00:00', 10, 1, 'Cancelled', 0, NULL),
('EtsJ0yXqISw', '2022-10-14 15:16:04', '2022-11-21', '09:00:00', 22, 8, 'Cancelled', 0, NULL),
('f55Hg9_zYJY', '2022-11-01 12:50:18', '2022-12-12', '09:00:00', 27, 6, 'Confirmed', 0, NULL),
('fAWD-L0i4NY', '2022-11-03 15:11:48', '2022-11-25', '16:00:00', 15, 4, 'Confirmed', 0, NULL),
('foZ_OMGdhCc', '2022-11-01 12:50:18', '2022-11-02', '12:00:00', 29, 5, 'Confirmed', 0, NULL),
('FPMabCuArsQ', '2022-10-14 15:16:04', '2022-11-02', '10:00:00', 14, 7, 'Cancelled', 0, NULL),
('FurpW5D59xg', '2022-10-15 03:31:42', '2022-11-23', '14:00:00', 9, 4, 'Cancelled', 0, NULL),
('FuxU9g953lU', '2022-10-15 03:31:42', '2022-10-19', '12:00:00', 22, 6, 'Confirmed', 0, NULL),
('FWdu5GnSLUw', '2022-10-15 03:31:42', '2022-12-05', '09:00:00', 14, 1, 'Cancelled', 0, NULL),
('FZYvqdg-iRw', '2022-11-01 12:49:58', '2022-12-02', '10:00:00', 25, 5, 'Cancelled', 0, NULL),
('G0az1Dft--o', '2022-11-01 12:49:58', '2022-11-11', '14:00:00', 21, 5, 'Cancelled', 0, NULL),
('G819aBYl0Fs', '2022-10-14 15:16:04', '2022-11-30', '11:00:00', 10, 7, 'Confirmed', 0, NULL),
('G93zRVhIh1M', '2022-11-03 15:21:22', '2022-11-22', '14:00:00', 15, 4, 'Confirmed', 0, NULL),
('gm34eBSHbro', '2022-10-15 03:31:42', '2022-12-12', '13:00:00', 23, 4, 'Cancelled', 0, NULL),
('GPFCFAmcURc', '2022-10-14 15:16:04', '2022-10-21', '13:00:00', 6, 5, 'Cancelled', 0, NULL),
('GTCHYuHM7d8', '2022-10-14 15:16:04', '2022-12-05', '09:00:00', 25, 7, 'Confirmed', 0, NULL),
('GvgsBiqkriA', '2022-10-15 03:31:42', '2022-10-19', '09:00:00', 22, 4, 'Cancelled', 0, NULL),
('GwutTYq8Ijs', '2022-10-14 15:16:04', '2022-12-05', '11:00:00', 14, 4, 'Confirmed', 0, NULL),
('h1Nx5Dq9nZ0', '2022-11-09 06:47:17', '2022-11-25', '15:00:00', 15, 3, 'Confirmed', 0, NULL),
('h9GnlXuevL0', '2022-11-09 07:05:14', '2022-11-23', '15:00:00', 15, 13, 'Confirmed', 2, NULL),
('HeukZjkjCGE', '2022-10-13 12:51:53', '2022-10-17', '15:00:00', 29, 1, 'Confirmed', 0, NULL),
('HjzgQ9P5iDc', '2022-10-15 03:31:42', '2022-10-28', '15:00:00', 24, 4, 'Cancelled', 0, NULL),
('HtIpzOMUEvY', '2022-10-15 03:31:42', '2022-10-20', '09:00:00', 9, 2, 'Confirmed', 0, NULL),
('hylpYxpOlqg', '2022-10-13 06:22:53', '2022-11-09', '12:00:00', 6, 8, 'Cancelled', 0, NULL),
('i-OM_rOQrnk', '2022-11-01 12:50:18', '2022-11-04', '14:00:00', 10, 3, 'Cancelled', 0, NULL),
('iBrfCKXmWyg', '2022-10-15 03:31:42', '2022-11-10', '15:00:00', 14, 5, 'Cancelled', 0, NULL),
('Id7L8gQuDoU', '2022-10-15 03:31:42', '2022-11-22', '09:00:00', 26, 8, 'Confirmed', 0, NULL),
('IYIGXk5IbJE', '2022-10-15 03:31:42', '2022-11-14', '09:00:00', 6, 5, 'Cancelled', 0, NULL),
('j0J12iAzaho', '2022-10-15 03:31:42', '2022-11-09', '12:00:00', 23, 7, 'Cancelled', 0, NULL),
('J52sTien8iU', '2022-10-15 03:31:42', '2022-10-17', '11:00:00', 28, 2, 'Confirmed', 0, NULL),
('J70cniN9ydo', '2022-10-14 15:16:04', '2022-11-15', '11:00:00', 29, 8, 'Cancelled', 0, NULL),
('J8tEeF_3KRg', '2022-11-06 04:33:57', '2022-11-21', '10:00:00', 15, 3, 'Confirmed', 0, NULL),
('jBptLBCO1bY', '2022-11-06 04:35:06', '2022-11-21', '10:00:00', 15, 3, 'Confirmed', 0, NULL),
('jeDmpCFrGxw', '2022-10-14 15:16:04', '2022-11-09', '09:00:00', 22, 7, 'Cancelled', 0, NULL),
('Jf-I8p8ZBHo', '2022-11-01 12:49:58', '2022-11-08', '11:00:00', 22, 2, 'Cancelled', 0, NULL),
('jfBdtVV11xg', '2022-10-14 15:16:04', '2022-12-02', '09:00:00', 25, 7, 'Cancelled', 0, NULL),
('JHhe7pFZu1U', '2022-11-03 15:22:00', '2022-11-22', '09:00:00', 15, 3, 'Confirmed', 0, NULL),
('jtZNr7esz5I', '2022-10-15 03:31:42', '2022-11-08', '14:00:00', 26, 8, 'Cancelled', 0, NULL),
('jUFw08M4hYQ', '2022-11-14 10:07:21', '2022-11-22', '10:00:00', 43, 20, 'Cancelled', 2, 'I hate cacti succulent'),
('JWltI0jsD24', '2022-10-14 15:16:04', '2022-10-17', '11:00:00', 26, 1, 'Cancelled', 0, NULL),
('J_XhWlTnnGc', '2022-11-02 14:30:49', '2022-11-03', '14:00:00', 9, 3, 'Confirmed', 0, NULL),
('K-Z2iBZEOb8', '2022-11-01 12:49:58', '2022-12-07', '13:00:00', 27, 1, 'Cancelled', 0, NULL),
('k59Q4cjxytA', '2022-10-14 15:16:04', '2022-11-29', '16:00:00', 6, 5, 'Confirmed', 0, NULL),
('kcfIc6t2KbY', '2022-10-14 15:16:04', '2022-12-02', '14:00:00', 22, 4, 'Cancelled', 0, NULL),
('kctQfCjvMCI', '2022-11-14 10:09:20', '2022-11-14', '19:00:00', 43, 20, 'Confirmed', 0, NULL),
('KfpHr9O3SrA', '2022-11-06 04:35:48', '2022-11-23', '16:00:00', 15, 3, 'Confirmed', 0, NULL),
('KHSk6EuIqIM', '2022-10-14 15:16:04', '2022-12-06', '09:00:00', 14, 3, 'Cancelled', 0, NULL),
('kjoimJ6wWEA', '2022-11-12 03:00:40', '2022-11-17', '15:00:00', 38, 4, 'Cancelled', 1, 'qqq'),
('km751o4svgE', '2022-11-03 15:24:49', '2022-11-23', '14:00:00', 15, 4, 'Confirmed', 0, NULL),
('KPlPdOOzH4g', '2022-10-15 03:31:42', '2022-12-08', '14:00:00', 14, 6, 'Cancelled', 0, NULL),
('Ld7lMaJNfSU', '2022-10-15 03:31:42', '2022-12-12', '09:00:00', 9, 1, 'Cancelled', 0, NULL),
('ldJYHQ9Iy10', '2022-10-14 15:16:04', '2022-11-25', '14:00:00', 22, 6, 'Cancelled', 0, NULL),
('ljgaGSZu1nk', '2022-10-15 03:31:42', '2022-11-07', '13:00:00', 22, 6, 'Confirmed', 0, NULL),
('lZBsAokv9BU', '2022-10-15 03:31:42', '2022-11-30', '09:00:00', 6, 8, 'Confirmed', 0, NULL),
('mBq5gANDlu8', '2022-10-14 15:16:04', '2022-11-14', '14:00:00', 14, 6, 'Confirmed', 0, NULL),
('mih0s2vXrPQ', '2022-10-14 15:16:04', '2022-11-15', '13:00:00', 26, 5, 'Cancelled', 0, NULL),
('mNRn-QzHUKI', '2022-11-01 12:49:58', '2022-10-31', '11:00:00', 24, 8, 'Cancelled', 0, NULL),
('mPj18yElS5k', '2022-10-13 06:22:53', '2022-10-20', '09:00:00', 9, 7, 'Confirmed', 0, NULL),
('mWNx-7rq2OM', '2022-11-01 12:49:58', '2022-11-24', '14:00:00', 14, 5, 'Cancelled', 0, NULL),
('mxMu3SfHR7U', '2022-10-22 11:23:41', '2022-12-13', '14:00:00', 14, 7, 'Cancelled', 0, 'Illness'),
('mxtVWteme1g', '2022-10-15 03:31:42', '2022-11-08', '11:00:00', 6, 3, 'Cancelled', 0, NULL),
('N9O1ydd7GrY', '2022-10-15 03:31:42', '2022-11-30', '09:00:00', 9, 8, 'Cancelled', 0, NULL),
('nRITOvnTFlc', '2022-10-14 15:16:04', '2022-10-31', '13:00:00', 22, 3, 'Confirmed', 0, NULL),
('NsU9p_Tym_M', '2022-11-01 12:50:18', '2022-10-25', '11:00:00', 23, 4, 'Confirmed', 0, NULL),
('NzNkdIslWsk', '2022-10-14 15:16:04', '2022-10-20', '09:00:00', 23, 7, 'Cancelled', 0, NULL),
('NzyFoAaxKt4', '2022-10-15 03:31:42', '2022-12-12', '15:00:00', 22, 6, 'Confirmed', 0, NULL),
('o8g5Atff4wQ', '2022-10-15 03:31:42', '2022-10-28', '09:00:00', 30, 3, 'Cancelled', 0, NULL),
('oDkkNW6rzDw', '2022-11-06 09:33:21', '2022-11-25', '13:00:00', 15, 3, 'Cancelled', 2, 'fdcgdfh'),
('ODTUEOROkH8', '2022-10-14 15:16:04', '2022-11-10', '13:00:00', 30, 7, 'Confirmed', 0, NULL),
('oE9OFFpY3hE', '2022-10-14 15:16:04', '2022-11-02', '11:00:00', 24, 5, 'Confirmed', 0, NULL),
('OGyofcmA8MM', '2022-10-14 15:16:04', '2022-10-27', '16:00:00', 24, 4, 'Confirmed', 0, NULL),
('OjjR-kUiNiM', '2022-11-01 12:49:58', '2022-11-24', '16:00:00', 26, 8, 'Confirmed', 0, NULL),
('oLMCG0NIWH4', '2022-10-15 03:31:42', '2022-11-15', '09:00:00', 30, 2, 'Cancelled', 0, NULL),
('OoJdCnDrglk', '2022-10-14 15:16:04', '2022-11-14', '09:00:00', 23, 3, 'Cancelled', 0, NULL),
('oqOdcWlzE9w', '2022-10-14 15:16:04', '2022-11-02', '12:00:00', 24, 6, 'Cancelled', 0, NULL),
('oS5CI4FcY7M', '2022-10-14 15:16:04', '2022-11-04', '09:00:00', 14, 7, 'Confirmed', 0, NULL),
('ot886kgop7A', '2022-10-22 11:50:08', '2022-10-28', '09:00:00', 14, 8, 'Confirmed', 0, NULL),
('ouAtz7loCgE', '2022-10-14 15:16:04', '2022-11-16', '14:00:00', 25, 5, 'Cancelled', 0, NULL),
('OUAVpUZmITA', '2022-10-15 03:31:42', '2022-10-24', '15:00:00', 15, 3, 'Cancelled', 0, NULL),
('OwVYWGiLomQ', '2022-10-15 03:31:42', '2022-11-24', '11:00:00', 30, 2, 'Cancelled', 0, NULL),
('OZzeh3mRuhg', '2022-10-14 15:16:04', '2022-10-21', '13:00:00', 28, 3, 'Cancelled', 0, NULL),
('paJwrPwpkWg', '2022-10-14 15:16:04', '2022-12-07', '11:00:00', 28, 5, 'Confirmed', 0, NULL),
('PKqqWESmcXw', '2022-10-14 15:16:04', '2022-12-05', '11:00:00', 21, 2, 'Cancelled', 0, NULL),
('pmQPsAg68mI', '2022-10-15 03:31:42', '2022-12-07', '16:00:00', 6, 2, 'Cancelled', 0, NULL),
('pohzJq0Qm4o', '2022-10-15 03:31:42', '2022-11-08', '15:00:00', 24, 2, 'Cancelled', 0, NULL),
('POVS4WT2JeY', '2022-10-15 03:31:42', '2022-11-21', '11:00:00', 6, 5, 'Cancelled', 0, NULL),
('PsYVE0yjb9Q', '2022-10-15 03:31:42', '2022-11-17', '16:00:00', 30, 5, 'Cancelled', 0, NULL),
('pyFUQSxoM_Y', '2022-11-01 12:50:18', '2022-11-23', '09:00:00', 6, 6, 'Confirmed', 0, NULL),
('q-3N016WBj8', '2022-11-15 09:10:47', '2022-11-16', '09:00:00', 48, 3, 'Confirmed', 0, NULL),
('q-iaXZEgOw0', '2022-11-01 12:49:58', '2022-11-25', '16:00:00', 23, 1, 'Cancelled', 0, NULL),
('q1-TuWjhlh8', '2022-11-06 10:00:00', '2022-11-30', '10:00:00', 10, 13, 'Confirmed', 5, NULL),
('q6wO5yxmMmI', '2022-11-09 06:53:20', '2022-11-23', '13:00:00', 15, 3, 'Confirmed', 3, NULL),
('qa4lpuhC5vs', '2022-10-15 03:31:42', '2022-10-28', '16:00:00', 15, 4, 'Cancelled', 0, NULL),
('qBqX1v9ymKs', '2022-10-22 17:16:02', '2022-10-27', '14:00:00', 14, 3, 'Cancelled', 0, NULL),
('QIE9NbyAWrc', '2022-11-09 07:02:15', '2022-11-11', '15:00:00', 34, 4, 'Confirmed', 0, NULL),
('QIIo7n1PPVc', '2022-10-21 17:19:02', '2022-10-27', '14:00:00', 14, 3, 'Confirmed', 0, NULL),
('QiJPMtMA02U', '2022-10-15 03:31:42', '2022-12-05', '16:00:00', 22, 3, 'Cancelled', 0, NULL),
('QKzXTCkJlLQ', '2022-10-13 06:22:53', '2022-11-07', '17:00:00', 26, 2, 'Cancelled', 0, NULL),
('qlcUIbd8-oA', '2022-11-01 12:49:58', '2022-10-17', '10:00:00', 25, 3, 'Cancelled', 0, NULL),
('QQYbHCbjECo', '2022-10-14 15:16:04', '2022-12-09', '14:00:00', 6, 3, 'Confirmed', 0, NULL),
('qRX6gpIsdeY', '2022-10-22 03:08:05', '2022-10-22', '12:00:00', 14, 4, 'Confirmed', 0, NULL),
('qRX6gpISKUY', '2022-10-22 02:18:55', '2022-10-24', '16:00:00', 14, 14, 'Confirmed', 0, NULL),
('qul34ocnH74', '2022-10-15 03:31:42', '2022-10-25', '10:00:00', 23, 4, 'Cancelled', 0, NULL),
('qwyFE1dCw_g', '2022-11-01 12:50:18', '2022-11-28', '09:00:00', 29, 8, 'Confirmed', 0, NULL),
('RAW_GZdwl3I', '2022-11-01 12:50:18', '2022-10-21', '17:00:00', 15, 6, 'Cancelled', 0, NULL),
('rlag0_b8OJI', '2022-11-01 12:50:18', '2022-11-07', '09:00:00', 21, 4, 'Cancelled', 0, NULL),
('roxWTWJ9axE', '2022-10-15 03:31:42', '2022-11-14', '13:00:00', 25, 5, 'Confirmed', 0, NULL),
('RQn721qu1S4', '2022-10-14 15:16:04', '2022-11-18', '10:00:00', 21, 5, 'Cancelled', 0, NULL),
('Rv-5avFwe3c', '2022-11-01 12:49:58', '2022-11-03', '15:00:00', 28, 6, 'Confirmed', 0, NULL),
('s381Vd8A35Q', '2022-10-21 17:16:09', '2022-10-27', '14:00:00', 14, 3, 'Confirmed', 0, NULL),
('s66x9iIZ30k', '2022-10-14 15:16:04', '2022-12-06', '14:00:00', 30, 4, 'Confirmed', 0, NULL),
('se0LDhvnpro', '2022-10-14 15:16:04', '2022-11-29', '10:00:00', 24, 5, 'Confirmed', 0, NULL),
('SjrMoQFG0ak', '2022-11-06 09:46:13', '2022-11-23', '10:00:00', 10, 32, 'Cancelled', 1, 'Duplicate'),
('sLGNNmcMJME', '2022-10-14 15:16:04', '2022-10-25', '11:00:00', 22, 5, 'Confirmed', 0, NULL),
('SNXaTv-OtQ4', '2022-11-06 09:48:09', '2022-11-29', '11:00:00', 10, 2, 'Confirmed', 0, NULL),
('sOsF0P9WRjU', '2022-11-06 04:37:04', '2022-11-23', '16:00:00', 15, 3, 'Confirmed', 0, NULL),
('SqRNqC98ihI', '2022-11-07 06:16:12', '2022-11-24', '11:00:00', 15, 2, 'Confirmed', 0, NULL),
('SRaz2N2cK5w', '2022-10-14 15:16:04', '2022-10-25', '10:00:00', 26, 6, 'Confirmed', 0, NULL),
('sUXA7AmK5FM', '2022-10-15 03:31:42', '2022-11-14', '09:00:00', 9, 5, 'Cancelled', 0, NULL),
('SWdbNTWdFbc', '2022-10-15 03:31:42', '2022-11-16', '09:00:00', 28, 4, 'Confirmed', 0, NULL),
('sYt7E6NR9xc', '2022-10-15 03:31:42', '2022-12-09', '11:00:00', 24, 4, 'Confirmed', 0, NULL),
('SYTBy6fGOKM', '2022-11-09 06:48:51', '2022-11-24', '10:00:00', 15, 2, 'Confirmed', 2, NULL),
('t2p3o08hxj8', '2022-11-09 06:43:32', '2022-11-25', '16:00:00', 15, 13, 'Confirmed', 0, NULL),
('t7y22uPyea8', '2022-11-14 09:51:50', '2022-11-21', '09:00:00', 43, 20, 'Confirmed', 0, NULL),
('TdvP8BE9N-c', '2022-11-15 16:04:55', '2022-11-16', '11:00:00', 40, 21, 'Confirmed', 0, NULL),
('tIBLHhe4sJE', '2022-10-14 15:16:04', '2022-10-20', '10:00:00', 30, 7, 'Confirmed', 0, NULL),
('tQWNnZ6tuec', '2022-10-14 15:16:04', '2022-11-22', '15:00:00', 24, 7, 'Cancelled', 0, NULL),
('TvJg7EiV09c', '2022-11-09 06:42:52', '2022-11-24', '14:00:00', 15, 2, 'Confirmed', 0, NULL),
('tXMni_sQICQ', '2022-11-01 12:50:18', '2022-12-06', '10:00:00', 14, 5, 'Cancelled', 0, NULL),
('tzY59yplLz0', '2022-10-15 03:31:42', '2022-11-03', '09:00:00', 10, 6, 'Cancelled', 0, NULL),
('Ud7B-uH879k', '2022-11-01 12:49:58', '2022-10-24', '13:00:00', 14, 8, 'Confirmed', 0, NULL),
('uEOac1UoNcM', '2022-11-04 13:32:30', '2022-12-02', '15:00:00', 15, 3, 'Cancelled', 1, 'Too early'),
('UizHa20YuRI', '2022-10-21 05:01:24', '2022-10-25', '11:00:00', 25, 5, 'Cancelled', 0, NULL),
('umcwrtGog08', '2022-10-14 15:16:04', '2022-10-17', '11:00:00', 26, 1, 'Confirmed', 0, NULL),
('UR86y00sGDE', '2022-11-15 07:47:26', '2022-11-16', '10:00:00', 46, 1, 'Confirmed', 0, NULL),
('urDsJ6RPx-w', '2022-11-01 12:49:58', '2022-11-07', '09:00:00', 22, 7, 'Confirmed', 0, NULL),
('USv2ZZ23qb0', '2022-10-14 15:16:04', '2022-10-21', '11:00:00', 9, 4, 'Cancelled', 0, NULL),
('uSYNBQs5cq8', '2022-10-14 15:16:04', '2022-11-24', '15:00:00', 30, 4, 'Confirmed', 0, NULL),
('UWO6cchKhSg', '2022-10-14 15:16:04', '2022-11-23', '15:00:00', 29, 8, 'Cancelled', 0, NULL),
('uX73T419V44', '2022-11-09 07:27:01', '2022-11-10', '11:00:00', 15, 3, 'Confirmed', 5, NULL),
('u_ChP0Hii1Q', '2022-11-01 12:50:18', '2022-10-17', '11:00:00', 25, 8, 'Cancelled', 0, NULL),
('VbjZRSl9ZyE', '2022-10-14 15:16:04', '2022-11-29', '10:00:00', 25, 3, 'Confirmed', 0, NULL),
('VhlVz4NeABk', '2022-10-14 15:16:04', '2022-11-25', '11:00:00', 15, 4, 'Cancelled', 0, NULL),
('VMVWal0K0eQ', '2022-10-22 11:47:53', '2022-10-24', '09:00:00', 14, 1, 'Cancelled', 0, 'Meh'),
('VoukUBxmrqE', '2022-10-15 03:31:42', '2022-11-15', '16:00:00', 26, 6, 'Cancelled', 0, NULL),
('VqBqByXPRdo', '2022-10-14 15:16:04', '2022-12-05', '11:00:00', 30, 1, 'Cancelled', 0, NULL),
('vQTXRv6e_mo', '2022-11-01 12:50:18', '2022-10-17', '10:00:00', 28, 5, 'Cancelled', 0, NULL),
('w3vzSR4j6ns', '2022-10-23 10:57:42', '2022-10-27', '09:00:00', 29, 2, 'Cancelled', 0, 'Illness'),
('WcfhksuqXak', '2022-11-12 14:11:58', '2022-11-25', '13:00:00', 37, 6, 'Cancelled', 1, '22'),
('WEVlPEYSCUU', '2022-10-15 03:31:42', '2022-11-04', '13:00:00', 29, 2, 'Cancelled', 0, NULL),
('wv9XtJfUmdY', '2022-10-15 03:31:42', '2022-10-31', '10:00:00', 10, 4, 'Confirmed', 0, NULL),
('wzBInG_RKLY', '2022-10-22 02:11:29', '2022-10-27', '09:00:00', 14, 4, 'Confirmed', 0, NULL),
('X-CTLGRwOdc', '2022-11-01 12:49:58', '2022-11-07', '09:00:00', 24, 2, 'Cancelled', 0, NULL),
('x4l4xZcXzeM', '2022-10-15 03:31:42', '2022-11-10', '16:00:00', 30, 4, 'Cancelled', 0, NULL),
('X8ly36tsOps', '2022-10-14 15:16:04', '2022-10-27', '16:00:00', 30, 8, 'Confirmed', 0, NULL),
('XCmZ87X3yGg', '2022-10-15 03:31:42', '2022-11-28', '11:00:00', 29, 7, 'Confirmed', 0, NULL),
('xe-MvyJzIXQ', '2022-11-01 12:49:58', '2022-11-16', '14:00:00', 24, 1, 'Confirmed', 0, NULL),
('xeCM3kcjd_Y', '2022-11-01 12:50:18', '2022-12-02', '14:00:00', 9, 4, 'Confirmed', 0, NULL),
('xNX0uXnEAi4', '2022-10-15 03:31:42', '2022-10-31', '13:00:00', 24, 2, 'Cancelled', 0, NULL),
('xpuCFTVNUPc', '2022-10-15 03:31:42', '2022-10-25', '10:00:00', 26, 5, 'Confirmed', 0, NULL),
('xRbA_y8dWn8', '2022-11-01 12:50:18', '2022-10-28', '09:00:00', 30, 7, 'Confirmed', 0, NULL),
('xsYmFONnuks', '2022-10-23 10:58:25', '2022-10-27', '09:00:00', 34, 3, 'Cancelled', 0, 'Emergency'),
('XUUVPYo9gSg', '2022-10-14 15:16:04', '2022-11-24', '15:00:00', 22, 1, 'Confirmed', 0, NULL),
('xv7k8V5bmmM', '2022-11-15 07:49:53', '2022-11-24', '10:00:00', 40, 2, 'Confirmed', 0, NULL),
('XyGRVGWaPJ8', '2022-11-06 10:23:29', '2022-11-29', '11:00:00', 10, 3, 'Confirmed', 0, NULL),
('YAmIyNP5bTQ', '2022-10-23 10:42:36', '2022-10-27', '09:00:00', 15, 3, 'Confirmed', 0, NULL),
('yRoQmHoWe5c', '2022-10-13 06:22:53', '2022-10-18', '11:00:00', 25, 3, 'Cancelled', 0, NULL),
('Ytz4Qsil27Q', '2022-10-15 03:31:42', '2022-10-24', '10:00:00', 10, 5, 'Confirmed', 0, NULL),
('YVUS1wCSbj8', '2022-10-15 03:31:42', '2022-11-11', '15:00:00', 10, 4, 'Cancelled', 0, NULL),
('YytA9_9n2SM', '2022-11-01 12:50:18', '2022-10-20', '10:00:00', 29, 6, 'Confirmed', 0, NULL),
('z1XiSled9Io', '2022-10-15 03:31:42', '2022-12-07', '15:00:00', 28, 3, 'Confirmed', 0, NULL),
('z24si-PnXJw', '2022-10-22 17:10:42', '2022-10-27', '11:00:00', 19, 2, 'Confirmed', 0, NULL),
('zE4iFFRnGKg', '2022-10-14 15:16:04', '2022-10-17', '10:00:00', 25, 8, 'Cancelled', 0, NULL),
('ZEu-QvA2K_Q', '2022-11-07 14:16:14', '2022-11-24', '09:00:00', 15, 3, 'Confirmed', 5, NULL),
('Zk6lFtjNtDM', '2022-10-15 03:31:42', '2022-11-25', '13:00:00', 29, 5, 'Confirmed', 0, NULL),
('zn3DMnrReko', '2022-10-14 15:16:04', '2022-11-21', '09:00:00', 9, 2, 'Cancelled', 0, NULL),
('znjrhAVejyU', '2022-11-07 06:21:05', '2022-11-16', '16:00:00', 15, 3, 'Confirmed', 0, NULL),
('Zsa6NLGGHuc', '2022-10-14 15:16:04', '2022-11-11', '11:00:00', 28, 1, 'Cancelled', 0, NULL),
('ztCSuFLwGWg', '2022-10-15 03:31:42', '2022-10-31', '13:00:00', 28, 6, 'Cancelled', 0, NULL),
('zwZinpPp4-0', '2022-11-01 12:49:58', '2022-11-07', '13:00:00', 23, 1, 'Confirmed', 0, NULL),
('zxzBSdNfQW4', '2022-10-14 15:16:04', '2022-11-24', '11:00:00', 24, 7, 'Cancelled', 0, NULL),
('_zutZFvmauw', '2022-11-01 12:50:18', '2022-10-24', '09:00:00', 10, 8, 'Cancelled', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_info`
--

CREATE TABLE `content_info` (
  `content_id` int(10) UNSIGNED NOT NULL,
  `content_type` enum('Announcement','Promotion') NOT NULL,
  `content_creation_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content_title` varchar(255) NOT NULL,
  `content_image` text NOT NULL,
  `content_resource` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_info`
--

INSERT INTO `content_info` (`content_id`, `content_type`, `content_creation_timestamp`, `content_title`, `content_image`, `content_resource`) VALUES
(1, 'Announcement', '2022-11-03 06:19:29', 'Closure of Store due to Fumigation and Santisation Exercise on 21st October 2022', 'https://images.squarespace-cdn.com/content/v1/5be9774ba2772c09d1c1352c/1623879000753-TZWEI347ONKO5OCC255C/savingPNG-7.jpg', '<p>Dear valued patrons,</p><br/><br/><p>Our store will be closed on 21st October 2022 for a fumigation and santisation exercise to ensure the safety of all visitors and employees. We will be back on 24th October 2022.</p><br/><br/><p>Thank you for your understanding.</p><br/><br/><p>Regards,</p><p>Cacti Succulent Kuching</p>'),
(2, 'Promotion', '2022-11-03 06:20:01', '40% off Cacti Seedling from 17th Oct 2022 to 31st Oct 2022', 'https://t4.ftcdn.net/jpg/01/99/21/09/360_F_199210928_QK1pPpTMIog6ePGVmgE5gKD8plXBwoGD.jpg', '<p>Dear valued patrons,</p><br/><br/><p>In conjunction with Halloween, we will be having a promotion whereby all Cacti Seedlings will be eligible for a 40% discount</p><br/><br/><p>With Love,</p><p>Cacti Succulent Kuching</p>'),
(3, 'Promotion', '2022-11-03 06:20:26', 'Buy 1 Free 1 for Pots and Vases on 11th November 2022', 'https://thumbs.dreamstime.com/b/vector-illustration-buy-get-free-sale-tag-banner-design-speech-bubble-template-vector-illustration-cool-buy-get-free-sale-tag-136700875.jpg', '<p>Dear valued patrons,</p><br/><br/><p>In conjunction with the 11.11 sales, we will be having a buy 1 free 1 sale on all pots and vases.</p><br/><br/><p>With Care,</p><p>Cacti Succulent Kuching</p>'),
(4, 'Announcement', '2022-11-03 06:20:51', 'Pop Up Store at Vivacity Mall on 8th November 2022', 'https://www.marketsource.com/wp-content/uploads/2021/07/R-0804-B.png', '<p>Dear valued patrons,</p><br/><br/><p>During the Yee Peng festival, we will be setting up a pop up store on the 8th November 2022 in Vivacity Mall. Be sure to drop by and visit us for some freebies!</p><br/><br/><p>With Care,</p><p>Cacti Succulent Kuching</p>'),
(20, 'Announcement', '2022-11-15 09:22:24', 'PW', 'https://i.imgur.com/55Uu2ri.jpg', 'lvjabnvjklasenbljeab');

-- --------------------------------------------------------

--
-- Table structure for table `custom_store_availability`
--

CREATE TABLE `custom_store_availability` (
  `operating_date` date NOT NULL,
  `operating_hours` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`operating_hours`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_store_availability`
--

INSERT INTO `custom_store_availability` (`operating_date`, `operating_hours`) VALUES
('2022-10-12', '[\"09:00:00-14:00:00\"]'),
('2022-10-13', '[\"09:00:00-11:00:00\", \"14:00:00-17:00:00\"]'),
('2022-10-17', '[\"09:00:00-12:00:00\"]'),
('2022-10-18', '[\"09:00:00-11:00:00\", \"14:00:00-17:00:00\"]'),
('2022-10-19', '[\"09:00:00-14:00:00\"]'),
('2022-10-20', '[\"09:00:00-12:00:00\"]'),
('2022-10-21', '[\"09:00:00-14:00:00\"]'),
('2022-10-25', '[\"09:00:00-12:00:00\"]'),
('2022-10-26', NULL),
('2022-10-28', '[\"09:00:00-11:00:00\", \"14:00:00-17:00:00\"]'),
('2022-11-01', '[\"00:00:00-01:00:00\"]'),
('2022-11-02', '[\"09:00:00-14:00:00\"]'),
('2022-11-03', '[\"09:00:00-11:00:00\", \"14:00:00-17:00:00\"]'),
('2022-11-07', '[\"09:00:00-14:00:00\"]'),
('2022-11-09', '[\"09:00:00-14:00:00\"]');

-- --------------------------------------------------------

--
-- Table structure for table `default_store_availability`
--

CREATE TABLE `default_store_availability` (
  `day_of_week` enum('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
  `operating_hours` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`operating_hours`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `default_store_availability`
--

INSERT INTO `default_store_availability` (`day_of_week`, `operating_hours`) VALUES
('Sunday', NULL),
('Monday', '[\"09:00:00-12:00:00\", \"13:00:00-17:00:00\"]'),
('Tuesday', '[\"09:00:00-12:00:00\", \"13:00:00-17:00:00\"]'),
('Wednesday', '[\"09:00:00-12:00:00\", \"13:00:00-17:00:00\"]'),
('Thursday', '[\"09:00:00-12:00:00\", \"13:00:00-17:00:00\"]'),
('Friday', '[\"09:00:00-12:00:00\", \"13:00:00-17:00:00\"]'),
('Saturday', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `encyclopedia_items`
--

CREATE TABLE `encyclopedia_items` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `item_category` varchar(255) NOT NULL,
  `item_subcategory` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_image` text NOT NULL,
  `availability_in_store` enum('Not Available','Out of Stock','Available') NOT NULL,
  `price_in_store` decimal(5,2) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `encyclopedia_items`
--

INSERT INTO `encyclopedia_items` (`item_id`, `item_category`, `item_subcategory`, `item_name`, `item_image`, `availability_in_store`, `price_in_store`, `description`) VALUES
(1, 'Compost & Soil', NULL, 'Agrosoil', 'https://imgur.com/9CFoIjt.jpeg', 'Available', '48.29', 'This is Agrosoil'),
(2, 'Fertiliser', NULL, 'Ferti 53', 'https://imgur.com/ERDzwuA.jpeg', 'Not Available', NULL, 'This is Ferti 53'),
(3, 'Pesticides', NULL, 'Mr Ganick Natural Pesticide', 'https://imgur.com/KeFG45l.jpeg', 'Available', '54.59', 'This is Mr Ganick Natural Pesticide'),
(4, 'Pots & Vases', 'Ceramic', 'Chinese Ceramic Pot', 'https://imgur.com/G1XwrRg.jpeg', 'Available', '92.44', 'This is Chinese Ceramic Pot'),
(5, 'Pots & Vases', 'Fiber', 'Wood Fiber Pot', 'https://imgur.com/QUigfUZ.jpeg', 'Not Available', NULL, 'This is Wood Fiber Pot'),
(6, 'Pots & Vases', 'Glass', 'Terrarium Glass Pot', 'https://imgur.com/Q7af8ze.jpeg', 'Not Available', NULL, 'This is Terrarium Glass Pot'),
(7, 'Pots & Vases', 'Plastic', 'Garden Plastic Pot', 'https://imgur.com/UEPfSrB.jpeg', 'Not Available', NULL, 'This is Garden Plastic Pot'),
(8, 'Tools & Accessories', NULL, 'Pressure Pump Sprayer', 'https://imgur.com/zWIg3DM.jpeg', 'Available', '116.03', 'This is Pressure Pump Sprayer'),
(9, 'Seeds', 'Flower and Fruits', 'Sunflower Seeds', 'https://imgur.com/CVAox58.jpeg', 'Available', '64.22', 'This is Sunflower Seeds'),
(10, 'Seeds', 'Vegetables and Herbs', 'Coriander Seeds', 'https://imgur.com/5xZfEPo.jpeg', 'Not Available', NULL, 'This is Coriander Seeds'),
(11, 'Plants', 'Orchids', 'Orchid Cattleya', 'https://imgur.com/PdjmLR1.jpeg', 'Available', '76.17', 'This is Orchid Cattleya'),
(12, 'Plants', 'Succulents', 'Ornatum Star Cactus', 'https://imgur.com/yOaByUU.jpeg', 'Not Available', NULL, 'This is Ornatum Star Cactus'),
(13, 'Plants', 'Herbs', 'Aloe Vera', 'https://imgur.com/P4rzRGE.jpeg', 'Available', '106.13', 'This is Aloe Vera'),
(14, 'Plants', 'Fruits', 'Avocado', 'https://imgur.com/X02VbaA.jpeg', 'Available', '101.93', 'This is Avocado'),
(15, 'Plants', 'Seedlings', 'Foxtail Lily', 'https://imgur.com/ph9E7lx.jpeg', 'Available', '68.79', 'This is Foxtail Lily');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `enquiry_id` int(10) UNSIGNED NOT NULL,
  `enquiry_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `contact_name` varchar(255) NOT NULL,
  `contact_info` varchar(254) NOT NULL,
  `enquiry_subject` varchar(255) NOT NULL,
  `enquiry_content` text NOT NULL,
  `enquiry_status` enum('Answered','Unanswered') NOT NULL,
  `enquiry_reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`enquiry_id`, `enquiry_timestamp`, `contact_name`, `contact_info`, `enquiry_subject`, `enquiry_content`, `enquiry_status`, `enquiry_reply`) VALUES
(1, '2022-11-15 01:37:37', 'User One', 'user1@testemail.cf', 'Opening Hours Enquiry', 'Are you guys open on 2nd November 2022?', 'Answered', 'Yes, we are open on 2nd November!'),
(2, '2022-11-03 02:35:58', 'User Two', 'user2@testemail.cf', 'Plant enquiry', 'Do you guys have orchids in store?', 'Answered', 'Yes we do have a few in stock now'),
(8, '2022-11-15 15:27:40', 'Testing', 'testfour@testemail.cf', 'Test', 'eagreh', 'Answered', 'Meh'),
(9, '2022-11-15 15:28:34', 'Testing Enquiry', 'testlive3@testemail.cf', 'Yeet', 'erhsrhjsjtj', 'Unanswered', NULL),
(15, '2022-11-15 15:41:40', 'xiang', '101234156@students.swinburne.edu.my', 'incog 2nd try ', 'please work', 'Unanswered', NULL),
(16, '2022-11-15 15:42:33', 'xiang', '101234156@students.swinburne.edu.my', 'incog 2nd try ', 'please work', 'Unanswered', NULL),
(17, '2022-11-15 15:56:32', 'xiang', '101234156@students.swinburne.edu.my', 'thirdtest', 'newenquiry q', 'Unanswered', NULL),
(18, '2022-11-15 15:57:10', 'Chow', '101234156@students.swinburne.edu.my', 'new', 'incog', 'Unanswered', NULL),
(19, '2022-11-15 16:04:13', 'Zi Xiang Chow', '101234156@students.swinburne.edu.my', 'newest', 'please work', 'Answered', 'test with spacing!!'),
(20, '2022-11-15 16:04:37', 'chow', '101234156@students.swinburne.edu.my', '123', '456 789', 'Answered', 'replied!.'),
(21, '2022-11-16 02:32:08', 'Chow', 'testuser1@tsapg.ga', 'Presentation', 'testing', 'Answered', 'COrrect!!'),
(22, '2022-11-16 02:35:05', 'Testing', 'testuser1@tsapg.ga', 'Testing', 'dfjbsoaihpbih', 'Answered', 'Tewign reply'),
(23, '2022-11-16 02:36:25', 'xiang', '101234156@students.swinburne.edu.my', 'zi', 'Chjoq', 'Answered', 'COrrect!!');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_info`
--

CREATE TABLE `homepage_info` (
  `version_id` int(10) UNSIGNED NOT NULL,
  `version_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `page_resource` text DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homepage_info`
--

INSERT INTO `homepage_info` (`version_id`, `version_timestamp`, `page_resource`, `remarks`) VALUES
(1, '2022-10-13 06:22:54', '<h1>This is version 1</h1><p>You are now viewing version 1</p>', 'Modified to Version 1'),
(2, '2022-10-13 06:22:54', '<h1>This is version 2</h1><p>You are now viewing version 2</p>', 'Modified to Version 2'),
(3, '2022-10-13 06:22:54', '<h1>This is version 3</h1><p>You are now viewing version 3</p>', 'Modified to Version 3'),
(4, '2022-10-13 06:22:54', '<h1>This is version 4</h1><p>You are now viewing version 4</p>', 'Modified to Version 4'),
(5, '2022-11-16 02:26:06', '<p>Cacti-Succulent Kuching is a local homegrown business specialized in selling various type and size of succulent plants. Apart from selling succulent plants, we also sell different type of gardening tools, soils and fertilizers at an affordable cost. Cacti-Succulent Kuching is setup in 2020 in which business is running both at home as well as weekend market. Our primary mission is to establish a long-lasting relationship of trust and commitment with each visitor through providing the highest level of customer service.</p>', 'Modified to Version 5'),
(6, '2022-11-16 02:38:38', '<p><img src=\"https://play-lh.googleusercontent.com/8ddL1kuoNUB5vUvgDVjYY3_6HwQcrg1K2fd_R8soD-e2QYj8fT9cfhfh3G0hnSruLKec\" alt=\"\" width=\"343\" height=\"343\" /></p>\r\n<p>Cacti-Succulent Kuching is a local homegrown business specialized in selling various type and size of succulent plants. Apart from selling succulent plants, we also sell different type of gardening tools, soils and fertilizers at an affordable cost. Cacti-Succulent Kuching is setup in 2020 in which business is running both at home as well as weekend market. Our primary mission is to establish a long-lasting relationship of trust and commitment with each visitor through providing the highest level of customer service.</p>', 'New Change');

-- --------------------------------------------------------

--
-- Table structure for table `notification_history`
--

CREATE TABLE `notification_history` (
  `notification_id` int(10) UNSIGNED NOT NULL,
  `notification_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL,
  `notification_type` enum('Booking Confirmation','Booking Update','Booking Cancellation','Booking Reminder','Promotion','Announcement') NOT NULL,
  `notification_title` varchar(255) NOT NULL,
  `notification_link` text NOT NULL,
  `notification_status` enum('Unread','Read') NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_history`
--

INSERT INTO `notification_history` (`notification_id`, `notification_timestamp`, `user_id`, `notification_type`, `notification_title`, `notification_link`, `notification_status`) VALUES
(1, '2022-11-06 04:34:01', 15, 'Booking Confirmation', '[J8tEeF_3KRg] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=J8tEeF_3KRg', 'Unread'),
(2, '2022-11-06 04:34:01', 1, 'Booking Confirmation', '[J8tEeF_3KRg] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=J8tEeF_3KRg', 'Unread'),
(3, '2022-11-06 04:34:01', 2, 'Booking Confirmation', '[J8tEeF_3KRg] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=J8tEeF_3KRg', 'Unread'),
(4, '2022-11-06 04:34:01', 3, 'Booking Confirmation', '[J8tEeF_3KRg] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=J8tEeF_3KRg', 'Unread'),
(5, '2022-11-06 04:35:10', 15, 'Booking Confirmation', '[jBptLBCO1bY] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jBptLBCO1bY', 'Unread'),
(6, '2022-11-06 04:35:10', 1, 'Booking Confirmation', '[jBptLBCO1bY] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jBptLBCO1bY', 'Unread'),
(7, '2022-11-06 04:35:10', 2, 'Booking Confirmation', '[jBptLBCO1bY] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jBptLBCO1bY', 'Unread'),
(8, '2022-11-06 04:35:10', 3, 'Booking Confirmation', '[jBptLBCO1bY] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jBptLBCO1bY', 'Unread'),
(9, '2022-11-06 04:35:52', 15, 'Booking Confirmation', '[KfpHr9O3SrA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=KfpHr9O3SrA', 'Unread'),
(10, '2022-11-06 04:35:52', 1, 'Booking Confirmation', '[KfpHr9O3SrA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=KfpHr9O3SrA', 'Unread'),
(11, '2022-11-06 04:35:52', 2, 'Booking Confirmation', '[KfpHr9O3SrA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=KfpHr9O3SrA', 'Unread'),
(12, '2022-11-06 04:35:52', 3, 'Booking Confirmation', '[KfpHr9O3SrA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=KfpHr9O3SrA', 'Unread'),
(13, '2022-11-06 04:37:08', 15, 'Booking Confirmation', '[sOsF0P9WRjU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=sOsF0P9WRjU', 'Unread'),
(14, '2022-11-06 04:37:08', 1, 'Booking Confirmation', '[sOsF0P9WRjU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=sOsF0P9WRjU', 'Unread'),
(15, '2022-11-06 04:37:08', 2, 'Booking Confirmation', '[sOsF0P9WRjU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=sOsF0P9WRjU', 'Unread'),
(16, '2022-11-06 04:37:08', 3, 'Booking Confirmation', '[sOsF0P9WRjU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=sOsF0P9WRjU', 'Unread'),
(17, '2022-11-06 06:48:16', 15, 'Booking Update', '[oDkkNW6rzDw] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=oDkkNW6rzDw', 'Unread'),
(18, '2022-11-06 06:48:16', 1, 'Booking Update', '[oDkkNW6rzDw] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=oDkkNW6rzDw', 'Unread'),
(19, '2022-11-06 06:48:16', 2, 'Booking Update', '[oDkkNW6rzDw] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=oDkkNW6rzDw', 'Unread'),
(20, '2022-11-06 06:48:16', 3, 'Booking Update', '[oDkkNW6rzDw] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=oDkkNW6rzDw', 'Unread'),
(21, '2022-11-06 09:05:20', 15, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(22, '2022-11-06 09:05:20', 1, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(23, '2022-11-06 09:05:20', 2, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(24, '2022-11-06 09:05:20', 3, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(25, '2022-11-06 09:33:25', 15, 'Booking Cancellation', '[oDkkNW6rzDw] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=oDkkNW6rzDw', 'Unread'),
(26, '2022-11-06 09:33:25', 1, 'Booking Cancellation', '[oDkkNW6rzDw] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=oDkkNW6rzDw', 'Unread'),
(27, '2022-11-06 09:33:25', 2, 'Booking Cancellation', '[oDkkNW6rzDw] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=oDkkNW6rzDw', 'Unread'),
(28, '2022-11-06 09:33:25', 3, 'Booking Cancellation', '[oDkkNW6rzDw] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=oDkkNW6rzDw', 'Unread'),
(29, '2022-11-06 09:35:34', 15, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(30, '2022-11-06 09:35:34', 1, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(31, '2022-11-06 09:35:34', 2, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(32, '2022-11-06 09:35:35', 3, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(33, '2022-11-06 09:43:57', 10, 'Booking Confirmation', '[SjrMoQFG0ak] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SjrMoQFG0ak', 'Unread'),
(34, '2022-11-06 09:43:58', 1, 'Booking Confirmation', '[SjrMoQFG0ak] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SjrMoQFG0ak', 'Unread'),
(35, '2022-11-06 09:43:58', 2, 'Booking Confirmation', '[SjrMoQFG0ak] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SjrMoQFG0ak', 'Unread'),
(36, '2022-11-06 09:43:58', 3, 'Booking Confirmation', '[SjrMoQFG0ak] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SjrMoQFG0ak', 'Unread'),
(37, '2022-11-06 09:45:34', 10, 'Booking Confirmation', '[q1-TuWjhlh8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(38, '2022-11-06 09:45:34', 1, 'Booking Confirmation', '[q1-TuWjhlh8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(39, '2022-11-06 09:45:34', 2, 'Booking Confirmation', '[q1-TuWjhlh8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(40, '2022-11-06 09:45:34', 3, 'Booking Confirmation', '[q1-TuWjhlh8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(41, '2022-11-06 09:46:17', 10, 'Booking Cancellation', '[SjrMoQFG0ak] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SjrMoQFG0ak', 'Unread'),
(42, '2022-11-06 09:46:17', 1, 'Booking Cancellation', '[SjrMoQFG0ak] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SjrMoQFG0ak', 'Unread'),
(43, '2022-11-06 09:46:17', 2, 'Booking Cancellation', '[SjrMoQFG0ak] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SjrMoQFG0ak', 'Unread'),
(44, '2022-11-06 09:46:17', 3, 'Booking Cancellation', '[SjrMoQFG0ak] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SjrMoQFG0ak', 'Unread'),
(45, '2022-11-06 09:47:15', 10, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(46, '2022-11-06 09:47:15', 1, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(47, '2022-11-06 09:47:15', 2, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(48, '2022-11-06 09:47:15', 3, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(49, '2022-11-06 09:47:45', 10, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(50, '2022-11-06 09:47:45', 1, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(51, '2022-11-06 09:47:45', 2, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(52, '2022-11-06 09:47:45', 3, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(53, '2022-11-06 09:48:13', 10, 'Booking Confirmation', '[SNXaTv-OtQ4] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SNXaTv-OtQ4', 'Unread'),
(54, '2022-11-06 09:48:13', 1, 'Booking Confirmation', '[SNXaTv-OtQ4] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SNXaTv-OtQ4', 'Unread'),
(55, '2022-11-06 09:48:13', 2, 'Booking Confirmation', '[SNXaTv-OtQ4] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SNXaTv-OtQ4', 'Unread'),
(56, '2022-11-06 09:48:13', 3, 'Booking Confirmation', '[SNXaTv-OtQ4] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SNXaTv-OtQ4', 'Unread'),
(57, '2022-11-06 09:49:20', 10, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(58, '2022-11-06 09:49:20', 1, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(59, '2022-11-06 09:49:20', 2, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(60, '2022-11-06 09:49:20', 3, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(61, '2022-11-06 09:51:12', 10, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(62, '2022-11-06 09:51:12', 1, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(63, '2022-11-06 09:51:12', 2, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(64, '2022-11-06 09:51:12', 3, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(65, '2022-11-06 10:00:04', 10, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(66, '2022-11-06 10:00:04', 1, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(67, '2022-11-06 10:00:04', 2, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(68, '2022-11-06 10:00:04', 3, 'Booking Update', '[q1-TuWjhlh8] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q1-TuWjhlh8', 'Unread'),
(69, '2022-11-06 10:23:33', 10, 'Booking Confirmation', '[XyGRVGWaPJ8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=XyGRVGWaPJ8', 'Unread'),
(70, '2022-11-06 10:23:33', 1, 'Booking Confirmation', '[XyGRVGWaPJ8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=XyGRVGWaPJ8', 'Unread'),
(71, '2022-11-06 10:23:33', 2, 'Booking Confirmation', '[XyGRVGWaPJ8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=XyGRVGWaPJ8', 'Unread'),
(72, '2022-11-06 10:23:33', 3, 'Booking Confirmation', '[XyGRVGWaPJ8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=XyGRVGWaPJ8', 'Unread'),
(73, '2022-11-07 06:10:47', 23, 'Booking Update', '[24DPK87cf9A] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=24DPK87cf9A', 'Unread'),
(74, '2022-11-07 06:10:47', 1, 'Booking Update', '[24DPK87cf9A] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=24DPK87cf9A', 'Unread'),
(75, '2022-11-07 06:10:47', 2, 'Booking Update', '[24DPK87cf9A] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=24DPK87cf9A', 'Unread'),
(76, '2022-11-07 06:10:47', 3, 'Booking Update', '[24DPK87cf9A] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=24DPK87cf9A', 'Unread'),
(77, '2022-11-07 06:12:46', 15, 'Booking Confirmation', '[SYTBy6fGOKM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(78, '2022-11-07 06:12:46', 1, 'Booking Confirmation', '[SYTBy6fGOKM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(79, '2022-11-07 06:12:46', 2, 'Booking Confirmation', '[SYTBy6fGOKM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(80, '2022-11-07 06:12:46', 3, 'Booking Confirmation', '[SYTBy6fGOKM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(81, '2022-11-07 06:13:45', 15, 'Booking Confirmation', '[bxywXLLaveQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bxywXLLaveQ', 'Unread'),
(82, '2022-11-07 06:13:45', 1, 'Booking Confirmation', '[bxywXLLaveQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bxywXLLaveQ', 'Unread'),
(83, '2022-11-07 06:13:45', 2, 'Booking Confirmation', '[bxywXLLaveQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bxywXLLaveQ', 'Unread'),
(84, '2022-11-07 06:13:45', 3, 'Booking Confirmation', '[bxywXLLaveQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bxywXLLaveQ', 'Unread'),
(85, '2022-11-07 06:16:16', 15, 'Booking Confirmation', '[SqRNqC98ihI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SqRNqC98ihI', 'Unread'),
(86, '2022-11-07 06:16:16', 1, 'Booking Confirmation', '[SqRNqC98ihI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SqRNqC98ihI', 'Unread'),
(87, '2022-11-07 06:16:17', 2, 'Booking Confirmation', '[SqRNqC98ihI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SqRNqC98ihI', 'Unread'),
(88, '2022-11-07 06:16:17', 3, 'Booking Confirmation', '[SqRNqC98ihI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=SqRNqC98ihI', 'Unread'),
(89, '2022-11-07 06:21:09', 15, 'Booking Confirmation', '[znjrhAVejyU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=znjrhAVejyU', 'Unread'),
(90, '2022-11-07 06:21:09', 1, 'Booking Confirmation', '[znjrhAVejyU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=znjrhAVejyU', 'Unread'),
(91, '2022-11-07 06:21:09', 2, 'Booking Confirmation', '[znjrhAVejyU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=znjrhAVejyU', 'Unread'),
(92, '2022-11-07 06:21:09', 3, 'Booking Confirmation', '[znjrhAVejyU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=znjrhAVejyU', 'Unread'),
(93, '2022-11-07 06:21:34', 15, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(94, '2022-11-07 06:21:34', 1, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(95, '2022-11-07 06:21:34', 2, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(96, '2022-11-07 06:21:34', 3, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(97, '2022-11-07 06:29:20', 15, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(98, '2022-11-07 06:29:20', 1, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(99, '2022-11-07 06:29:20', 2, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(100, '2022-11-07 06:29:20', 3, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(101, '2022-11-07 14:16:18', 15, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(102, '2022-11-07 14:16:18', 1, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(103, '2022-11-07 14:16:18', 2, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(104, '2022-11-07 14:16:18', 3, 'Booking Update', '[ZEu-QvA2K_Q] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=ZEu-QvA2K_Q', 'Unread'),
(105, '2022-11-07 14:17:28', 15, 'Booking Update', '[SYTBy6fGOKM] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(106, '2022-11-07 14:17:28', 1, 'Booking Update', '[SYTBy6fGOKM] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(107, '2022-11-07 14:17:28', 2, 'Booking Update', '[SYTBy6fGOKM] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(108, '2022-11-07 14:17:28', 3, 'Booking Update', '[SYTBy6fGOKM] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(109, '2022-11-09 06:39:15', 15, 'Booking Confirmation', '[q6wO5yxmMmI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(110, '2022-11-09 06:39:15', 1, 'Booking Confirmation', '[q6wO5yxmMmI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(111, '2022-11-09 06:39:15', 2, 'Booking Confirmation', '[q6wO5yxmMmI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(112, '2022-11-09 06:39:15', 3, 'Booking Confirmation', '[q6wO5yxmMmI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(113, '2022-11-09 06:41:30', 15, 'Booking Confirmation', '[21405hGtaI0] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=21405hGtaI0', 'Unread'),
(114, '2022-11-09 06:41:30', 1, 'Booking Confirmation', '[21405hGtaI0] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=21405hGtaI0', 'Unread'),
(115, '2022-11-09 06:41:30', 2, 'Booking Confirmation', '[21405hGtaI0] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=21405hGtaI0', 'Unread'),
(116, '2022-11-09 06:41:30', 3, 'Booking Confirmation', '[21405hGtaI0] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=21405hGtaI0', 'Unread'),
(117, '2022-11-09 06:42:57', 15, 'Booking Confirmation', '[TvJg7EiV09c] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=TvJg7EiV09c', 'Unread'),
(118, '2022-11-09 06:42:57', 1, 'Booking Confirmation', '[TvJg7EiV09c] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=TvJg7EiV09c', 'Unread'),
(119, '2022-11-09 06:42:57', 2, 'Booking Confirmation', '[TvJg7EiV09c] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=TvJg7EiV09c', 'Unread'),
(120, '2022-11-09 06:42:57', 3, 'Booking Confirmation', '[TvJg7EiV09c] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=TvJg7EiV09c', 'Unread'),
(121, '2022-11-09 06:43:36', 15, 'Booking Confirmation', '[t2p3o08hxj8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=t2p3o08hxj8', 'Unread'),
(122, '2022-11-09 06:43:36', 1, 'Booking Confirmation', '[t2p3o08hxj8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=t2p3o08hxj8', 'Unread'),
(123, '2022-11-09 06:43:36', 2, 'Booking Confirmation', '[t2p3o08hxj8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=t2p3o08hxj8', 'Unread'),
(124, '2022-11-09 06:43:36', 3, 'Booking Confirmation', '[t2p3o08hxj8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=t2p3o08hxj8', 'Unread'),
(125, '2022-11-09 06:47:21', 15, 'Booking Confirmation', '[h1Nx5Dq9nZ0] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=h1Nx5Dq9nZ0', 'Unread'),
(126, '2022-11-09 06:47:21', 1, 'Booking Confirmation', '[h1Nx5Dq9nZ0] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=h1Nx5Dq9nZ0', 'Unread'),
(127, '2022-11-09 06:47:21', 2, 'Booking Confirmation', '[h1Nx5Dq9nZ0] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=h1Nx5Dq9nZ0', 'Unread'),
(128, '2022-11-09 06:47:21', 3, 'Booking Confirmation', '[h1Nx5Dq9nZ0] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=h1Nx5Dq9nZ0', 'Unread'),
(129, '2022-11-09 06:48:55', 15, 'Booking Update', '[SYTBy6fGOKM] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(130, '2022-11-09 06:48:55', 1, 'Booking Update', '[SYTBy6fGOKM] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(131, '2022-11-09 06:48:55', 2, 'Booking Update', '[SYTBy6fGOKM] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(132, '2022-11-09 06:48:55', 3, 'Booking Update', '[SYTBy6fGOKM] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=SYTBy6fGOKM', 'Unread'),
(133, '2022-11-09 06:51:03', 15, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(134, '2022-11-09 06:51:03', 1, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(135, '2022-11-09 06:51:03', 2, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(136, '2022-11-09 06:51:03', 3, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(137, '2022-11-09 06:52:13', 15, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(138, '2022-11-09 06:52:13', 1, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(139, '2022-11-09 06:52:13', 2, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(140, '2022-11-09 06:52:13', 3, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(141, '2022-11-09 06:53:24', 15, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(142, '2022-11-09 06:53:24', 1, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(143, '2022-11-09 06:53:24', 2, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(144, '2022-11-09 06:53:24', 3, 'Booking Update', '[q6wO5yxmMmI] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=q6wO5yxmMmI', 'Unread'),
(145, '2022-11-09 07:02:19', 34, 'Booking Confirmation', '[QIE9NbyAWrc] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=QIE9NbyAWrc', 'Unread'),
(146, '2022-11-09 07:02:19', 1, 'Booking Confirmation', '[QIE9NbyAWrc] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=QIE9NbyAWrc', 'Unread'),
(147, '2022-11-09 07:02:19', 2, 'Booking Confirmation', '[QIE9NbyAWrc] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=QIE9NbyAWrc', 'Unread'),
(148, '2022-11-09 07:02:19', 3, 'Booking Confirmation', '[QIE9NbyAWrc] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=QIE9NbyAWrc', 'Unread'),
(149, '2022-11-09 07:03:31', 15, 'Booking Update', '[h9GnlXuevL0] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=h9GnlXuevL0', 'Unread'),
(150, '2022-11-09 07:03:31', 1, 'Booking Update', '[h9GnlXuevL0] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=h9GnlXuevL0', 'Unread'),
(151, '2022-11-09 07:03:31', 2, 'Booking Update', '[h9GnlXuevL0] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=h9GnlXuevL0', 'Unread'),
(152, '2022-11-09 07:03:31', 3, 'Booking Update', '[h9GnlXuevL0] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=h9GnlXuevL0', 'Unread'),
(153, '2022-11-09 07:05:18', 15, 'Booking Update', '[h9GnlXuevL0] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=h9GnlXuevL0', 'Unread'),
(154, '2022-11-09 07:05:18', 1, 'Booking Update', '[h9GnlXuevL0] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=h9GnlXuevL0', 'Unread'),
(155, '2022-11-09 07:05:18', 2, 'Booking Update', '[h9GnlXuevL0] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=h9GnlXuevL0', 'Unread'),
(156, '2022-11-09 07:05:18', 3, 'Booking Update', '[h9GnlXuevL0] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=h9GnlXuevL0', 'Unread'),
(157, '2022-11-09 07:18:49', 15, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(158, '2022-11-09 07:18:49', 1, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(159, '2022-11-09 07:18:49', 2, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(160, '2022-11-09 07:18:49', 3, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(161, '2022-11-09 07:20:28', 15, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(162, '2022-11-09 07:20:28', 1, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(163, '2022-11-09 07:20:28', 2, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(164, '2022-11-09 07:20:28', 3, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(165, '2022-11-09 07:21:33', 15, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(166, '2022-11-09 07:21:34', 1, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(167, '2022-11-09 07:21:34', 2, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(168, '2022-11-09 07:21:34', 3, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(169, '2022-11-09 07:22:00', 15, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(170, '2022-11-09 07:22:00', 1, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(171, '2022-11-09 07:22:00', 2, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(172, '2022-11-09 07:22:00', 3, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(173, '2022-11-09 07:27:05', 15, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(174, '2022-11-09 07:27:05', 1, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(175, '2022-11-09 07:27:05', 2, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(176, '2022-11-09 07:27:05', 3, 'Booking Update', '[uX73T419V44] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=uX73T419V44', 'Unread'),
(217, '2022-11-11 08:25:05', 37, 'Booking Confirmation', '[brU0QCAnuGw] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=brU0QCAnuGw', 'Unread'),
(218, '2022-11-11 08:25:05', 1, 'Booking Confirmation', '[brU0QCAnuGw] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=brU0QCAnuGw', 'Unread'),
(219, '2022-11-11 08:25:05', 2, 'Booking Confirmation', '[brU0QCAnuGw] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=brU0QCAnuGw', 'Unread'),
(220, '2022-11-11 08:25:05', 3, 'Booking Confirmation', '[brU0QCAnuGw] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=brU0QCAnuGw', 'Unread'),
(221, '2022-11-11 08:25:13', 37, 'Booking Cancellation', '[brU0QCAnuGw] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=brU0QCAnuGw', 'Unread'),
(222, '2022-11-11 08:25:13', 1, 'Booking Cancellation', '[brU0QCAnuGw] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=brU0QCAnuGw', 'Unread'),
(223, '2022-11-11 08:25:13', 2, 'Booking Cancellation', '[brU0QCAnuGw] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=brU0QCAnuGw', 'Unread'),
(224, '2022-11-11 08:25:13', 3, 'Booking Cancellation', '[brU0QCAnuGw] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=brU0QCAnuGw', 'Unread'),
(225, '2022-11-12 02:59:48', 38, 'Booking Confirmation', '[kjoimJ6wWEA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kjoimJ6wWEA', 'Unread'),
(226, '2022-11-12 02:59:48', 1, 'Booking Confirmation', '[kjoimJ6wWEA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kjoimJ6wWEA', 'Unread'),
(227, '2022-11-12 02:59:48', 2, 'Booking Confirmation', '[kjoimJ6wWEA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kjoimJ6wWEA', 'Unread'),
(228, '2022-11-12 02:59:48', 3, 'Booking Confirmation', '[kjoimJ6wWEA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kjoimJ6wWEA', 'Unread'),
(229, '2022-11-12 03:00:45', 38, 'Booking Cancellation', '[kjoimJ6wWEA] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kjoimJ6wWEA', 'Unread'),
(230, '2022-11-12 03:00:45', 1, 'Booking Cancellation', '[kjoimJ6wWEA] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kjoimJ6wWEA', 'Unread'),
(231, '2022-11-12 03:00:45', 2, 'Booking Cancellation', '[kjoimJ6wWEA] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kjoimJ6wWEA', 'Unread'),
(232, '2022-11-12 03:00:45', 3, 'Booking Cancellation', '[kjoimJ6wWEA] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kjoimJ6wWEA', 'Unread'),
(233, '2022-11-12 14:11:53', 37, 'Booking Confirmation', '[WcfhksuqXak] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=WcfhksuqXak', 'Unread'),
(234, '2022-11-12 14:11:53', 1, 'Booking Confirmation', '[WcfhksuqXak] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=WcfhksuqXak', 'Unread'),
(235, '2022-11-12 14:11:53', 2, 'Booking Confirmation', '[WcfhksuqXak] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=WcfhksuqXak', 'Unread'),
(236, '2022-11-12 14:11:53', 3, 'Booking Confirmation', '[WcfhksuqXak] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=WcfhksuqXak', 'Unread'),
(237, '2022-11-12 14:12:02', 37, 'Booking Cancellation', '[WcfhksuqXak] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=WcfhksuqXak', 'Unread'),
(238, '2022-11-12 14:12:02', 1, 'Booking Cancellation', '[WcfhksuqXak] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=WcfhksuqXak', 'Unread'),
(239, '2022-11-12 14:12:02', 2, 'Booking Cancellation', '[WcfhksuqXak] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=WcfhksuqXak', 'Unread'),
(240, '2022-11-12 14:12:02', 3, 'Booking Cancellation', '[WcfhksuqXak] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=WcfhksuqXak', 'Unread'),
(241, '2022-11-14 08:24:38', 40, 'Booking Confirmation', '[5dDTr1LskFA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(242, '2022-11-14 08:24:38', 39, 'Booking Confirmation', '[5dDTr1LskFA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(243, '2022-11-14 08:24:38', 1, 'Booking Confirmation', '[5dDTr1LskFA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(244, '2022-11-14 08:24:38', 2, 'Booking Confirmation', '[5dDTr1LskFA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(245, '2022-11-14 08:24:38', 3, 'Booking Confirmation', '[5dDTr1LskFA] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(246, '2022-11-14 09:51:57', 43, 'Booking Confirmation', '[t7y22uPyea8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=t7y22uPyea8', 'Unread'),
(247, '2022-11-14 09:51:57', 42, 'Booking Confirmation', '[t7y22uPyea8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=t7y22uPyea8', 'Unread'),
(248, '2022-11-14 09:51:57', 39, 'Booking Confirmation', '[t7y22uPyea8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=t7y22uPyea8', 'Unread'),
(249, '2022-11-14 09:51:57', 1, 'Booking Confirmation', '[t7y22uPyea8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=t7y22uPyea8', 'Unread'),
(250, '2022-11-14 09:51:57', 2, 'Booking Confirmation', '[t7y22uPyea8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=t7y22uPyea8', 'Unread'),
(251, '2022-11-14 09:51:57', 3, 'Booking Confirmation', '[t7y22uPyea8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=t7y22uPyea8', 'Unread'),
(258, '2022-11-14 09:54:52', 43, 'Booking Confirmation', '[kctQfCjvMCI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kctQfCjvMCI', 'Unread'),
(259, '2022-11-14 09:54:52', 42, 'Booking Confirmation', '[kctQfCjvMCI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kctQfCjvMCI', 'Unread'),
(260, '2022-11-14 09:54:52', 39, 'Booking Confirmation', '[kctQfCjvMCI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kctQfCjvMCI', 'Unread'),
(261, '2022-11-14 09:54:52', 1, 'Booking Confirmation', '[kctQfCjvMCI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kctQfCjvMCI', 'Unread'),
(262, '2022-11-14 09:54:52', 2, 'Booking Confirmation', '[kctQfCjvMCI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kctQfCjvMCI', 'Unread'),
(263, '2022-11-14 09:54:52', 3, 'Booking Confirmation', '[kctQfCjvMCI] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=kctQfCjvMCI', 'Unread'),
(264, '2022-11-14 10:01:06', 43, 'Booking Confirmation', '[jUFw08M4hYQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(265, '2022-11-14 10:01:06', 42, 'Booking Confirmation', '[jUFw08M4hYQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(266, '2022-11-14 10:01:06', 39, 'Booking Confirmation', '[jUFw08M4hYQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(267, '2022-11-14 10:01:06', 1, 'Booking Confirmation', '[jUFw08M4hYQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(268, '2022-11-14 10:01:06', 2, 'Booking Confirmation', '[jUFw08M4hYQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(269, '2022-11-14 10:01:06', 3, 'Booking Confirmation', '[jUFw08M4hYQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(270, '2022-11-14 10:06:05', 43, 'Booking Update', '[jUFw08M4hYQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(271, '2022-11-14 10:06:05', 42, 'Booking Update', '[jUFw08M4hYQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(272, '2022-11-14 10:06:05', 39, 'Booking Update', '[jUFw08M4hYQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(273, '2022-11-14 10:06:05', 1, 'Booking Update', '[jUFw08M4hYQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(274, '2022-11-14 10:06:05', 2, 'Booking Update', '[jUFw08M4hYQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(275, '2022-11-14 10:06:05', 3, 'Booking Update', '[jUFw08M4hYQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(276, '2022-11-14 10:07:27', 43, 'Booking Cancellation', '[jUFw08M4hYQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(277, '2022-11-14 10:07:27', 42, 'Booking Cancellation', '[jUFw08M4hYQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(278, '2022-11-14 10:07:27', 39, 'Booking Cancellation', '[jUFw08M4hYQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(279, '2022-11-14 10:07:27', 1, 'Booking Cancellation', '[jUFw08M4hYQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(280, '2022-11-14 10:07:27', 2, 'Booking Cancellation', '[jUFw08M4hYQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(281, '2022-11-14 10:07:27', 3, 'Booking Cancellation', '[jUFw08M4hYQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=jUFw08M4hYQ', 'Unread'),
(368, '2022-11-15 07:36:47', 46, 'Booking Confirmation', '[7inJUzP8zKo] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=7inJUzP8zKo', 'Unread'),
(369, '2022-11-15 07:36:47', 42, 'Booking Confirmation', '[7inJUzP8zKo] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=7inJUzP8zKo', 'Unread'),
(370, '2022-11-15 07:36:47', 39, 'Booking Confirmation', '[7inJUzP8zKo] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=7inJUzP8zKo', 'Unread'),
(371, '2022-11-15 07:36:47', 45, 'Booking Confirmation', '[7inJUzP8zKo] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=7inJUzP8zKo', 'Unread'),
(372, '2022-11-15 07:36:47', 1, 'Booking Confirmation', '[7inJUzP8zKo] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=7inJUzP8zKo', 'Unread'),
(373, '2022-11-15 07:36:47', 2, 'Booking Confirmation', '[7inJUzP8zKo] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=7inJUzP8zKo', 'Unread'),
(374, '2022-11-15 07:36:47', 3, 'Booking Confirmation', '[7inJUzP8zKo] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=7inJUzP8zKo', 'Unread'),
(375, '2022-11-15 07:40:14', 46, 'Booking Confirmation', '[0HrtfpUldlE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=0HrtfpUldlE', 'Unread'),
(376, '2022-11-15 07:40:14', 42, 'Booking Confirmation', '[0HrtfpUldlE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=0HrtfpUldlE', 'Unread'),
(377, '2022-11-15 07:40:14', 39, 'Booking Confirmation', '[0HrtfpUldlE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=0HrtfpUldlE', 'Unread'),
(378, '2022-11-15 07:40:14', 45, 'Booking Confirmation', '[0HrtfpUldlE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=0HrtfpUldlE', 'Unread'),
(379, '2022-11-15 07:40:14', 1, 'Booking Confirmation', '[0HrtfpUldlE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=0HrtfpUldlE', 'Unread'),
(380, '2022-11-15 07:40:14', 2, 'Booking Confirmation', '[0HrtfpUldlE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=0HrtfpUldlE', 'Unread'),
(381, '2022-11-15 07:40:14', 3, 'Booking Confirmation', '[0HrtfpUldlE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=0HrtfpUldlE', 'Unread'),
(382, '2022-11-15 07:47:34', 46, 'Booking Confirmation', '[UR86y00sGDE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=UR86y00sGDE', 'Unread'),
(383, '2022-11-15 07:47:34', 42, 'Booking Confirmation', '[UR86y00sGDE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=UR86y00sGDE', 'Unread'),
(384, '2022-11-15 07:47:34', 39, 'Booking Confirmation', '[UR86y00sGDE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=UR86y00sGDE', 'Unread'),
(385, '2022-11-15 07:47:34', 45, 'Booking Confirmation', '[UR86y00sGDE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=UR86y00sGDE', 'Unread'),
(386, '2022-11-15 07:47:34', 1, 'Booking Confirmation', '[UR86y00sGDE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=UR86y00sGDE', 'Unread'),
(387, '2022-11-15 07:47:34', 2, 'Booking Confirmation', '[UR86y00sGDE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=UR86y00sGDE', 'Unread'),
(388, '2022-11-15 07:47:34', 3, 'Booking Confirmation', '[UR86y00sGDE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=UR86y00sGDE', 'Unread'),
(389, '2022-11-15 07:50:01', 40, 'Booking Confirmation', '[xv7k8V5bmmM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=xv7k8V5bmmM', 'Unread'),
(390, '2022-11-15 07:50:01', 42, 'Booking Confirmation', '[xv7k8V5bmmM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=xv7k8V5bmmM', 'Unread'),
(391, '2022-11-15 07:50:01', 39, 'Booking Confirmation', '[xv7k8V5bmmM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=xv7k8V5bmmM', 'Unread'),
(392, '2022-11-15 07:50:01', 45, 'Booking Confirmation', '[xv7k8V5bmmM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=xv7k8V5bmmM', 'Unread'),
(393, '2022-11-15 07:50:01', 1, 'Booking Confirmation', '[xv7k8V5bmmM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=xv7k8V5bmmM', 'Unread'),
(394, '2022-11-15 07:50:01', 2, 'Booking Confirmation', '[xv7k8V5bmmM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=xv7k8V5bmmM', 'Unread'),
(395, '2022-11-15 07:50:01', 3, 'Booking Confirmation', '[xv7k8V5bmmM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=xv7k8V5bmmM', 'Unread'),
(396, '2022-11-15 07:52:22', 46, 'Booking Confirmation', '[351q0o5kNqM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=351q0o5kNqM', 'Unread'),
(397, '2022-11-15 07:52:22', 42, 'Booking Confirmation', '[351q0o5kNqM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=351q0o5kNqM', 'Unread'),
(398, '2022-11-15 07:52:22', 39, 'Booking Confirmation', '[351q0o5kNqM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=351q0o5kNqM', 'Unread'),
(399, '2022-11-15 07:52:22', 45, 'Booking Confirmation', '[351q0o5kNqM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=351q0o5kNqM', 'Unread'),
(400, '2022-11-15 07:52:22', 1, 'Booking Confirmation', '[351q0o5kNqM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=351q0o5kNqM', 'Unread'),
(401, '2022-11-15 07:52:22', 2, 'Booking Confirmation', '[351q0o5kNqM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=351q0o5kNqM', 'Unread'),
(402, '2022-11-15 07:52:22', 3, 'Booking Confirmation', '[351q0o5kNqM] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=351q0o5kNqM', 'Unread'),
(403, '2022-11-15 07:53:18', 46, 'Booking Confirmation', '[2ehFXEvLxPU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(404, '2022-11-15 07:53:18', 42, 'Booking Confirmation', '[2ehFXEvLxPU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(405, '2022-11-15 07:53:18', 39, 'Booking Confirmation', '[2ehFXEvLxPU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(406, '2022-11-15 07:53:18', 45, 'Booking Confirmation', '[2ehFXEvLxPU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(407, '2022-11-15 07:53:18', 1, 'Booking Confirmation', '[2ehFXEvLxPU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(408, '2022-11-15 07:53:18', 2, 'Booking Confirmation', '[2ehFXEvLxPU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(409, '2022-11-15 07:53:18', 3, 'Booking Confirmation', '[2ehFXEvLxPU] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(410, '2022-11-15 07:56:32', 46, 'Booking Update', '[2ehFXEvLxPU] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(411, '2022-11-15 07:56:32', 42, 'Booking Update', '[2ehFXEvLxPU] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(412, '2022-11-15 07:56:32', 39, 'Booking Update', '[2ehFXEvLxPU] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(413, '2022-11-15 07:56:32', 45, 'Booking Update', '[2ehFXEvLxPU] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(414, '2022-11-15 07:56:32', 1, 'Booking Update', '[2ehFXEvLxPU] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(415, '2022-11-15 07:56:32', 2, 'Booking Update', '[2ehFXEvLxPU] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(416, '2022-11-15 07:56:32', 3, 'Booking Update', '[2ehFXEvLxPU] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(417, '2022-11-15 07:59:15', 46, 'Booking Cancellation', '[2ehFXEvLxPU] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(418, '2022-11-15 07:59:15', 42, 'Booking Cancellation', '[2ehFXEvLxPU] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(419, '2022-11-15 07:59:15', 39, 'Booking Cancellation', '[2ehFXEvLxPU] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(420, '2022-11-15 07:59:15', 45, 'Booking Cancellation', '[2ehFXEvLxPU] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(421, '2022-11-15 07:59:15', 1, 'Booking Cancellation', '[2ehFXEvLxPU] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(422, '2022-11-15 07:59:15', 2, 'Booking Cancellation', '[2ehFXEvLxPU] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(423, '2022-11-15 07:59:15', 3, 'Booking Cancellation', '[2ehFXEvLxPU] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=2ehFXEvLxPU', 'Unread'),
(512, '2022-11-15 09:10:54', 48, 'Booking Confirmation', '[q-3N016WBj8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q-3N016WBj8', 'Unread'),
(513, '2022-11-15 09:10:54', 42, 'Booking Confirmation', '[q-3N016WBj8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q-3N016WBj8', 'Unread');
INSERT INTO `notification_history` (`notification_id`, `notification_timestamp`, `user_id`, `notification_type`, `notification_title`, `notification_link`, `notification_status`) VALUES
(514, '2022-11-15 09:10:54', 39, 'Booking Confirmation', '[q-3N016WBj8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q-3N016WBj8', 'Unread'),
(515, '2022-11-15 09:10:54', 45, 'Booking Confirmation', '[q-3N016WBj8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q-3N016WBj8', 'Unread'),
(516, '2022-11-15 09:10:54', 1, 'Booking Confirmation', '[q-3N016WBj8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q-3N016WBj8', 'Unread'),
(517, '2022-11-15 09:10:54', 2, 'Booking Confirmation', '[q-3N016WBj8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q-3N016WBj8', 'Unread'),
(518, '2022-11-15 09:10:54', 3, 'Booking Confirmation', '[q-3N016WBj8] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=q-3N016WBj8', 'Unread'),
(519, '2022-11-15 09:13:01', 48, 'Booking Confirmation', '[bRhjc36m4uQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(520, '2022-11-15 09:13:01', 42, 'Booking Confirmation', '[bRhjc36m4uQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(521, '2022-11-15 09:13:01', 39, 'Booking Confirmation', '[bRhjc36m4uQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(522, '2022-11-15 09:13:01', 45, 'Booking Confirmation', '[bRhjc36m4uQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(523, '2022-11-15 09:13:01', 1, 'Booking Confirmation', '[bRhjc36m4uQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(524, '2022-11-15 09:13:01', 2, 'Booking Confirmation', '[bRhjc36m4uQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(525, '2022-11-15 09:13:01', 3, 'Booking Confirmation', '[bRhjc36m4uQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(526, '2022-11-15 09:13:01', 47, 'Booking Confirmation', '[bRhjc36m4uQ] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(527, '2022-11-15 09:19:21', 48, 'Booking Update', '[bRhjc36m4uQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(528, '2022-11-15 09:19:21', 42, 'Booking Update', '[bRhjc36m4uQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(529, '2022-11-15 09:19:21', 39, 'Booking Update', '[bRhjc36m4uQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(530, '2022-11-15 09:19:21', 45, 'Booking Update', '[bRhjc36m4uQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(531, '2022-11-15 09:19:21', 1, 'Booking Update', '[bRhjc36m4uQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(532, '2022-11-15 09:19:21', 2, 'Booking Update', '[bRhjc36m4uQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(533, '2022-11-15 09:19:21', 3, 'Booking Update', '[bRhjc36m4uQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(534, '2022-11-15 09:19:21', 47, 'Booking Update', '[bRhjc36m4uQ] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(535, '2022-11-15 09:20:43', 48, 'Booking Cancellation', '[bRhjc36m4uQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(536, '2022-11-15 09:20:43', 42, 'Booking Cancellation', '[bRhjc36m4uQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(537, '2022-11-15 09:20:43', 39, 'Booking Cancellation', '[bRhjc36m4uQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(538, '2022-11-15 09:20:43', 45, 'Booking Cancellation', '[bRhjc36m4uQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(539, '2022-11-15 09:20:43', 1, 'Booking Cancellation', '[bRhjc36m4uQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(540, '2022-11-15 09:20:43', 2, 'Booking Cancellation', '[bRhjc36m4uQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(541, '2022-11-15 09:20:43', 3, 'Booking Cancellation', '[bRhjc36m4uQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(542, '2022-11-15 09:20:43', 47, 'Booking Cancellation', '[bRhjc36m4uQ] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=bRhjc36m4uQ', 'Unread'),
(543, '2022-11-15 09:22:24', 1, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(544, '2022-11-15 09:22:24', 2, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(545, '2022-11-15 09:22:24', 3, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(546, '2022-11-15 09:22:24', 4, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(547, '2022-11-15 09:22:24', 5, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(548, '2022-11-15 09:22:24', 6, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(549, '2022-11-15 09:22:24', 7, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(550, '2022-11-15 09:22:24', 8, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(551, '2022-11-15 09:22:24', 9, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(552, '2022-11-15 09:22:25', 10, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(553, '2022-11-15 09:22:25', 11, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(554, '2022-11-15 09:22:25', 12, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(555, '2022-11-15 09:22:25', 13, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(556, '2022-11-15 09:22:25', 14, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(557, '2022-11-15 09:22:25', 15, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(558, '2022-11-15 09:22:25', 16, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(559, '2022-11-15 09:22:25', 17, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(560, '2022-11-15 09:22:25', 18, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(561, '2022-11-15 09:22:25', 19, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(562, '2022-11-15 09:22:25', 20, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(563, '2022-11-15 09:22:25', 21, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(564, '2022-11-15 09:22:25', 22, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(565, '2022-11-15 09:22:25', 23, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(566, '2022-11-15 09:22:25', 24, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(567, '2022-11-15 09:22:25', 25, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(568, '2022-11-15 09:22:25', 26, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(569, '2022-11-15 09:22:25', 27, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(570, '2022-11-15 09:22:25', 28, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(571, '2022-11-15 09:22:25', 29, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(572, '2022-11-15 09:22:25', 30, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(573, '2022-11-15 09:22:25', 31, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(574, '2022-11-15 09:22:25', 32, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(575, '2022-11-15 09:22:25', 33, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(576, '2022-11-15 09:22:25', 34, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(577, '2022-11-15 09:22:25', 35, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(578, '2022-11-15 09:22:25', 36, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(579, '2022-11-15 09:22:25', 37, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(580, '2022-11-15 09:22:25', 38, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(581, '2022-11-15 09:22:25', 39, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(582, '2022-11-15 09:22:25', 40, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(583, '2022-11-15 09:22:25', 41, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(584, '2022-11-15 09:22:25', 42, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(585, '2022-11-15 09:22:25', 43, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(587, '2022-11-15 09:22:25', 45, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(588, '2022-11-15 09:22:25', 46, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(589, '2022-11-15 09:22:25', 47, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(590, '2022-11-15 09:22:25', 48, 'Announcement', 'PW', 'https://cactisucculentkuching.cf/announcement.php?id=20', 'Unread'),
(591, '2022-11-15 15:43:50', 40, 'Booking Confirmation', '[dBiwL8KglXE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(592, '2022-11-15 15:43:50', 39, 'Booking Confirmation', '[dBiwL8KglXE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(593, '2022-11-15 15:43:50', 45, 'Booking Confirmation', '[dBiwL8KglXE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(594, '2022-11-15 15:43:50', 1, 'Booking Confirmation', '[dBiwL8KglXE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(595, '2022-11-15 15:43:50', 2, 'Booking Confirmation', '[dBiwL8KglXE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(596, '2022-11-15 15:43:50', 3, 'Booking Confirmation', '[dBiwL8KglXE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(597, '2022-11-15 15:43:50', 47, 'Booking Confirmation', '[dBiwL8KglXE] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(598, '2022-11-15 15:45:08', 40, 'Booking Cancellation', '[5dDTr1LskFA] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(599, '2022-11-15 15:45:08', 39, 'Booking Cancellation', '[5dDTr1LskFA] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(600, '2022-11-15 15:45:08', 45, 'Booking Cancellation', '[5dDTr1LskFA] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(601, '2022-11-15 15:45:08', 1, 'Booking Cancellation', '[5dDTr1LskFA] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(602, '2022-11-15 15:45:09', 2, 'Booking Cancellation', '[5dDTr1LskFA] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(603, '2022-11-15 15:45:09', 3, 'Booking Cancellation', '[5dDTr1LskFA] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(604, '2022-11-15 15:45:09', 47, 'Booking Cancellation', '[5dDTr1LskFA] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=5dDTr1LskFA', 'Unread'),
(605, '2022-11-15 16:05:04', 40, 'Booking Confirmation', '[TdvP8BE9N-c] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=TdvP8BE9N-c', 'Unread'),
(606, '2022-11-15 16:05:04', 39, 'Booking Confirmation', '[TdvP8BE9N-c] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=TdvP8BE9N-c', 'Unread'),
(607, '2022-11-15 16:05:04', 45, 'Booking Confirmation', '[TdvP8BE9N-c] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=TdvP8BE9N-c', 'Unread'),
(608, '2022-11-15 16:05:04', 1, 'Booking Confirmation', '[TdvP8BE9N-c] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=TdvP8BE9N-c', 'Unread'),
(609, '2022-11-15 16:05:04', 2, 'Booking Confirmation', '[TdvP8BE9N-c] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=TdvP8BE9N-c', 'Unread'),
(610, '2022-11-15 16:05:04', 3, 'Booking Confirmation', '[TdvP8BE9N-c] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=TdvP8BE9N-c', 'Unread'),
(611, '2022-11-15 16:05:04', 47, 'Booking Confirmation', '[TdvP8BE9N-c] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=TdvP8BE9N-c', 'Unread'),
(612, '2022-11-16 02:21:09', 1, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(613, '2022-11-16 02:21:09', 2, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(614, '2022-11-16 02:21:09', 3, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(615, '2022-11-16 02:21:09', 4, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(616, '2022-11-16 02:21:09', 5, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(617, '2022-11-16 02:21:09', 6, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(618, '2022-11-16 02:21:09', 7, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(619, '2022-11-16 02:21:09', 8, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(620, '2022-11-16 02:21:09', 9, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(621, '2022-11-16 02:21:09', 10, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(622, '2022-11-16 02:21:09', 11, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(623, '2022-11-16 02:21:09', 12, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(624, '2022-11-16 02:21:09', 13, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(625, '2022-11-16 02:21:09', 14, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(626, '2022-11-16 02:21:09', 15, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(627, '2022-11-16 02:21:09', 16, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(628, '2022-11-16 02:21:09', 17, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(629, '2022-11-16 02:21:09', 18, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(630, '2022-11-16 02:21:09', 19, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(631, '2022-11-16 02:21:09', 20, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(632, '2022-11-16 02:21:09', 21, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(633, '2022-11-16 02:21:09', 22, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(634, '2022-11-16 02:21:09', 23, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(635, '2022-11-16 02:21:09', 24, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(636, '2022-11-16 02:21:10', 25, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(637, '2022-11-16 02:21:10', 26, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(638, '2022-11-16 02:21:10', 27, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(639, '2022-11-16 02:21:10', 28, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(640, '2022-11-16 02:21:10', 29, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(641, '2022-11-16 02:21:10', 30, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(642, '2022-11-16 02:21:10', 31, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(643, '2022-11-16 02:21:10', 32, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(644, '2022-11-16 02:21:10', 33, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(645, '2022-11-16 02:21:10', 34, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(646, '2022-11-16 02:21:10', 35, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(647, '2022-11-16 02:21:10', 36, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(648, '2022-11-16 02:21:10', 37, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(649, '2022-11-16 02:21:10', 38, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(650, '2022-11-16 02:21:10', 39, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(651, '2022-11-16 02:21:10', 40, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(652, '2022-11-16 02:21:10', 41, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(653, '2022-11-16 02:21:10', 42, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(654, '2022-11-16 02:21:10', 43, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(656, '2022-11-16 02:21:10', 45, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(657, '2022-11-16 02:21:10', 46, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(658, '2022-11-16 02:21:10', 47, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(659, '2022-11-16 02:21:10', 48, 'Promotion', 'Example', 'https://cactisucculentkuching.cf/announcement.php?id=21', 'Unread'),
(660, '2022-11-16 03:18:13', 40, 'Booking Confirmation', '[cAZ_wl_Pr9w] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(661, '2022-11-16 03:18:13', 39, 'Booking Confirmation', '[cAZ_wl_Pr9w] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(662, '2022-11-16 03:18:13', 45, 'Booking Confirmation', '[cAZ_wl_Pr9w] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(663, '2022-11-16 03:18:13', 1, 'Booking Confirmation', '[cAZ_wl_Pr9w] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(664, '2022-11-16 03:18:13', 2, 'Booking Confirmation', '[cAZ_wl_Pr9w] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(665, '2022-11-16 03:18:13', 3, 'Booking Confirmation', '[cAZ_wl_Pr9w] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(666, '2022-11-16 03:18:13', 49, 'Booking Confirmation', '[cAZ_wl_Pr9w] Booking Confirmation', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(667, '2022-11-16 03:23:17', 40, 'Booking Update', '[cAZ_wl_Pr9w] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(668, '2022-11-16 03:23:17', 39, 'Booking Update', '[cAZ_wl_Pr9w] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(669, '2022-11-16 03:23:17', 45, 'Booking Update', '[cAZ_wl_Pr9w] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(670, '2022-11-16 03:23:17', 1, 'Booking Update', '[cAZ_wl_Pr9w] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(671, '2022-11-16 03:23:17', 2, 'Booking Update', '[cAZ_wl_Pr9w] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(672, '2022-11-16 03:23:17', 3, 'Booking Update', '[cAZ_wl_Pr9w] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(673, '2022-11-16 03:23:17', 49, 'Booking Update', '[cAZ_wl_Pr9w] Booking Update', 'https://cactisucculentkuching.cf/booking.php?booking_id=cAZ_wl_Pr9w', 'Unread'),
(674, '2022-11-16 03:24:00', 40, 'Booking Cancellation', '[dBiwL8KglXE] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(675, '2022-11-16 03:24:00', 39, 'Booking Cancellation', '[dBiwL8KglXE] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(676, '2022-11-16 03:24:00', 45, 'Booking Cancellation', '[dBiwL8KglXE] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(677, '2022-11-16 03:24:00', 1, 'Booking Cancellation', '[dBiwL8KglXE] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(678, '2022-11-16 03:24:00', 2, 'Booking Cancellation', '[dBiwL8KglXE] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(679, '2022-11-16 03:24:00', 3, 'Booking Cancellation', '[dBiwL8KglXE] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread'),
(680, '2022-11-16 03:24:00', 49, 'Booking Cancellation', '[dBiwL8KglXE] Booking Cancellation', 'https://cactisucculentkuching.cf/booking.php?booking_id=dBiwL8KglXE', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `email_address` varchar(254) NOT NULL,
  `password` char(60) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `profile_image` text DEFAULT NULL,
  `user_role` enum('Super Admin','Admin','User') NOT NULL,
  `account_created_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `account_status` enum('Unactivated','Activated','Pending Reset','Pending Delete','Deleted') NOT NULL,
  `account_token` char(22) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL,
  `notification_token` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`email_address`, `password`, `user_id`, `profile_image`, `user_role`, `account_created_timestamp`, `account_status`, `account_token`, `token_expiry`, `notification_token`) VALUES
('101231241@student.swin.edu.au', '$2y$10$hWM4D1nojBvPtmIB6GIME.XbmUFROkJ1G/1TtMzIAiX78V5hvd2IW', 42, NULL, 'User', '2022-11-15 10:04:15', 'Deleted', NULL, NULL, '[]'),
('101231241@students.swinburne.edu.my', '$2y$10$tU9tTVQPX3EIjU1vHw/12efDB7qnO/TOa.ahMOSg25zHQtd1D3Ela', 43, NULL, 'User', '2022-11-15 10:04:19', 'Deleted', NULL, NULL, '[]'),
('101234156@students.swinburne.edu.my', '$2y$10$qTifurPLm3STLbqucWV4ve.hRLyxsi/D2aCZc6C2XvdO04ngDFqly', 37, NULL, 'User', '2022-11-14 09:55:07', 'Activated', NULL, NULL, '[]'),
('101234169@students.swinburne.edu.my', '$2y$10$srF4UNUN.ESXG/q/UA2Ku.5QhXJROA6X5IUCmln4au9l3xSo7j6tK', 47, 'https://i.imgur.com/qUbWlcsb.jpg', 'User', '2022-11-16 02:49:58', 'Activated', NULL, NULL, '[\"fiNA06FVtWJ8JEMbKwWvdH:APA91bG3hJdogGNt-oN3ZPzc-ue-s6mNMNff0O7c6KGjkHCs7xDYSc9m2GO1HvgyzxlRQAY7IWY2CMEoqVpVR5mDpRdWtHr6j7pxP73Eyzf1tAKG74GzjYX2AUf1jfk3P9Ut_KDklwzt\"]'),
('admin@testemail.cf', '$2y$10$4mJo6Wodv6h6lB5wTGuJ4.M5kP8kCP1qGZUf.AJDryJNeNEBeuKhK', 39, NULL, 'Admin', '2022-11-16 03:19:05', 'Activated', NULL, NULL, '[\"c5yS3ZeT30kuY1P3M0702Q:APA91bGsTyuLRbIzFC-fVywk0enkQeQQEkBpLJJTFfd6RpHn92vaYAkZVmjGWkBIKAEKZtmCVwSytqsC3wnnf0QlQ9TCFM5Fi5S-3UNhFPKCxA1GPmmA-0WN_0Si3Wg8CV8Lwgy76iEz\", \"eaU5F5zLA8gUay2OmOnIHu:APA91bFAohKgUJq-EK9UJ_PYTPDLvEoFida05V-fJuV0MxfE6h7fuAqui9a9Rw50ZusXPzjy_0_Qfuccwmc4mK3lbBfLQm9ivyJiIev_jCjq74Nf4mI7lYiorp-DRgUkXLaFqEOQW1kI\"]'),
('chanjiaxin351@gmail.com', '$2y$10$svFxp2w4Ntf20Wf2Cmu8z.OfLrA4KfIuFjt.kNtLsHNfWHTYr08uS', 38, NULL, 'User', '2022-11-14 09:55:13', 'Activated', NULL, NULL, '[]'),
('clementhosk@gmail.com', '$2y$10$GmLfwnYci/Wr0ENgIfUGzuCZtOmsOGyGlNuO1D8Vp4kxjviAuymPO', 48, NULL, 'User', '2022-11-15 10:04:33', 'Deleted', NULL, NULL, '[]'),
('Clifford.Bautista@testemail.cf', '$2b$12$RFRDdwi3kdWJXPLqlWndJ.f4x3ZTSeKsPJnouyVvoM9QVn5B30QPC', 11, NULL, 'User', '2022-11-06 10:16:52', 'Deleted', NULL, NULL, '[]'),
('David.Woody@testemail.cf', '$2b$12$qsD1XxGMPHcdse9Pzpbf..uU54R1alTGPlG60hYlxDfB45BG90xUy', 12, NULL, 'User', '2022-11-06 10:18:26', 'Deleted', NULL, NULL, '[]'),
('Deanna.Flickinger@testemail.cf', '$2b$12$jKQ8AjJhT.Uv7oqA2UMEHO6UT9hhEYjiOWyLBSl2FX/td8AnGIFwO', 7, NULL, 'User', '2022-11-06 10:18:26', 'Unactivated', '8GS57YyftO0IbxTRLbbJCA', '2022-10-12 22:01:10', '[]'),
('Debbie.Pierce@testemail.cf', '$2b$12$YYoZLCOXgVePMzhUKEhRuO1uRcjZejerqHWlu4LqQdh13FItWVONC', 10, NULL, 'User', '2022-11-09 06:27:58', 'Activated', NULL, NULL, '[]'),
('edwinkhoo02@gmail.com', '$2y$10$woFpX1/Tq699xd2nqo99yOp.qLrhlDVBcw5TA2jU8VHas26xJ1Hh.', 45, NULL, 'Admin', '2022-11-15 10:04:37', 'Deleted', NULL, NULL, '[]'),
('Harmony.Walker@testemail.cf', '$2b$12$kSujs7C0uaEF8nHaXa4C5e8rV35Tv1VV6dPMT7ieZ4ZS6YI1G2Hqy', 16, NULL, 'User', '2022-11-06 10:18:26', 'Unactivated', 'lsUBF//9VcA9FNCgQ/5mVs', '2022-10-12 22:01:12', '[]'),
('Helen.Fleming@testemail.cf', '$2b$12$eq/z3SbcHgJORsNYwGgKHOJGAvZe3oRbpIWK.sguQJwX3ge/OYqsu', 1, NULL, 'Admin', '2022-11-06 10:18:26', 'Activated', NULL, NULL, '[]'),
('Helen.Low@testemail.cf', '$2b$12$V1grZlwIZ08vzlJr9NsveeaTgtXHVuL2TY5b7bYecd5.PvUOEjwGi', 2, NULL, 'Admin', '2022-11-17 03:00:08', 'Deleted', NULL, NULL, '[\"fAvhaKlvUWGvuTTef_mdLE:APA91bEmo1mJ-FL0R44uLsrrWRkHCBEqVrViouiwKnAh7xVUdo0dfRh5hMv6bBUreLLlnqQ7pntviOTGOBNn06piy6B3i1KlOi64BH2ZAhFhM1Qn48VUCAOqSXTBK29QrqdwyIjYMD3O\"]'),
('iracallacari@gmail.com', '$2y$10$ocJJ.rGWXv3KVYMxaqpp6e3ThnMrfw.CWwAa2s0UXJ/jIoqMSqnm2', 46, NULL, 'User', '2022-11-15 10:04:41', 'Deleted', NULL, NULL, '[]'),
('Jack.Hull@testemail.cf', '$2b$12$KneOGDK4vQxfywJ2leQXs.GExizqFFDsH4uNzXFTkJC7ewheG9GaC', 8, NULL, 'User', '2022-11-06 10:18:26', 'Unactivated', 'DCRVuCFOCkECakP1OFYvHo', '2022-10-12 22:01:10', '[]'),
('Jill.Poirier@testemail.cf', '$2b$12$b/7VlvBjnMzvVVv3I6r01eVm0B8ioZ250VGcxo3G0Ifi/Qy1pkHUW', 14, NULL, 'User', '2022-11-06 10:18:26', 'Activated', NULL, NULL, '[]'),
('Marilyn.Goodale@testemail.cf', '$2b$12$xASN1JJXD2GB0dfkKoavC.U8i8w5Dy1YHGkbPY.TAbrVJu1bbsIT.', 19, NULL, 'User', '2022-11-06 10:18:26', 'Pending Reset', 'XRdzWGmeH3Qf+idaUWF8Q0', '2022-10-12 22:01:12', '[]'),
('Mary.Nichols@testemail.cf', '$2b$12$eBMwCMG1oj/81zd5/iW97.nPYKARxdTZiWrOe/qxs7w1G9qVV3.1u', 18, NULL, 'User', '2022-11-06 10:18:26', 'Unactivated', 'neh0D/GusBwcQHsMuUPSgo', '2022-10-12 22:01:12', '[]'),
('Monika.Hutson@testemail.cf', '$2b$12$pjDTg3T5hDcJe2zjS1c7J.dU7uPJKuVZhf5/X721tl3Lt191Sv4ty', 17, NULL, 'User', '2022-11-06 10:18:26', 'Deleted', NULL, NULL, '[]'),
('Morris.Hannah@testemail.cf', '$2b$12$1jjvZ6MQGvSWu3EVKdKUy.Bn5HAfLcipnXYxCO/lNRxW15jfBXAfK', 5, NULL, 'User', '2022-11-06 10:18:26', 'Pending Reset', 'LmTZxkP1GYQSVAV7sa13hU', '2022-10-12 22:01:09', '[]'),
('Nola.Lee@testemail.cf', '$2b$12$9P381HSk/S571b3UjUA1ZOYOlscU0MULME2G45ydWKMD9ukiP2jn.', 15, NULL, 'User', '2022-11-09 06:29:50', 'Activated', NULL, NULL, '[\"c3Q5UdifIz4K-Fl97kRkmq:APA91bH0tSDg1pIz-uRY4HiGMSZ9W_whu6aLEczDjGjqQfW4vVO4MuustAsFRPoiP-XQKoMGWw82_ElWEHNWaoQa2FbQj6WCPbIYwLwrIUyeU8uJCsjmsaAKpmYoHWv1AvjjzpCOwSup\"]'),
('Rebecca.Todd@testemail.cf', '$2b$12$kMlwI536WNJvLHtoHdNwcuVx/fdwYVlUCSv7B/8MZThSalOOm4FhK', 3, NULL, 'Admin', '2022-11-09 07:00:35', 'Activated', NULL, NULL, '[\"dX9yIpjmwtyM8rLbEAsk2U:APA91bHUfNShtaUAiSiI1y62pvUsHVApRjPkNH2DiwK00LEtYxlkcKFV5YMB24XdDp0ohn8YUpPpAKQqojEjMYo09AY-wEfZisqI7P1UcEiZWrXiJ58akZw6qTmXuulpWnMchKs4vFo2\"]'),
('Rita.Kenyon@testemail.cf', '$2b$12$j3/67RvZpuw7Rcu0PV.ln.pvHysWZyvugw8eWmQuGjqHfe4wWzkH6', 9, NULL, 'User', '2022-11-06 10:18:26', 'Activated', NULL, NULL, '[]'),
('Robert.Abud@testemail.cf', '$2b$12$7XOurhbB/ufZrbBS.cP1QexHJkeLInsESmnsfgvKikMUGpgO2jWT.', 13, NULL, 'User', '2022-11-06 10:18:26', 'Deleted', NULL, NULL, '[]'),
('Sarah.Zwilling@testemail.cf', '$2b$12$t61rb1nnA8uCjpzzWbVmp.ipyVq6cqU/m7DAzUG9GzUt79.HIj7Mi', 4, NULL, 'User', '2022-11-06 10:18:26', 'Unactivated', 'OsICpCuWacIEjJPrBjBg/g', '2022-10-12 22:01:09', '[]'),
('superadmin@testemail.cf', '$2y$10$kYYsP1Q02UDPQwpbpmDmiePUttpu07K/vVNsaWxqXqSGm4wjof0t2', 41, NULL, 'Super Admin', '2022-11-15 02:31:56', 'Activated', NULL, NULL, '[]'),
('test2signup@testemail.cf', '$2y$10$EqfU6Mm8eZvah.SJORGOFOwaBWLMmjGQh71FY3tO/1nQavNDAujfa', 32, NULL, 'User', '2022-11-06 10:18:26', 'Activated', '', NULL, '[]'),
('test3signup@testemail.cf', '$2y$10$T2jHgDFlVghNTY9lSQ5VYep70thuK.3beK0k134Z2oaEKYI0hVYwW', 33, NULL, 'User', '2022-11-06 10:18:26', 'Unactivated', '52f80c08c5dd4998f99f15', '2022-10-20 07:48:29', '[]'),
('testadmin123@testemail.cf', '$2a$10$tN2MjXMuVmpOiuEeU9b4Ju3iUsYcNJty9DGSD5Q/X0d7/yQ8RBb4m', 49, NULL, 'Admin', '2022-11-16 02:55:57', 'Activated', NULL, NULL, '[]'),
('testfive@testemail.cf', '$2y$10$/STPqcFDXDCchmdCCFFMaeUVO5Ygj86Acvf3IyzTJR4mngzcnvQRm', 35, NULL, 'User', '2022-11-06 10:18:26', 'Unactivated', '434a982ea68b680cb1dab2', '2022-10-20 15:08:15', '[]'),
('testfour@testemail.cf', '$2y$10$JZLramxIJDvLsCFasoSWCuGezE9wTIks6pz5SVsZ61BXewVtkYtx2', 34, NULL, 'User', '2022-11-06 10:18:26', 'Activated', NULL, NULL, '[]'),
('testlast@testemail.cf', '$2a$10$o1IfaTzj48d9/81PzFlGAecn8D6Lop5wafiDgjHFvN8nxf6ymbz3q', 36, NULL, 'User', '2022-11-14 05:23:41', 'Activated', '', NULL, '[]'),
('testsignup@testemail.cf', '$2y$10$MQLsKn1ljSEtg51O4Di6wOKfWx2Mof.HOYWB6gNO7q.vpsVuM/1Ai', 31, NULL, 'User', '2022-11-18 05:46:01', 'Unactivated', '2b0c9e2ee2fd3cfc9e2d99', '2022-10-20 07:18:04', '[]'),
('user@testemail.cf', '$2y$10$Ezot7OG1Bs4IGk7EkV8mFeA9CG5y9k5F.ON3X8joZKY2J1h8lJXJi', 40, NULL, 'User', '2022-11-16 03:17:31', 'Activated', NULL, NULL, '[\"e3nEdgf3JFfXNdqbiEMivO:APA91bGjSVnjrdSrOKIUO4DCnqEy5MW4w5v1DR9cWJlMMxgiFxWV-MW9uvPD61GYb75nCtdENmE1qaDokTl4B7K3achjMnLbIOzaBi0um637DvZW018uIZYxmo8Lbc4xoGcRa3cPGdF-\"]'),
('William.Arruda@testemail.cf', '$2b$12$ardBsB0kb0T4xY/ZRocsGOt35JelGoFY8KWbQSsjkVVTbbNvu6qv2', 20, NULL, 'User', '2022-11-06 10:18:26', 'Unactivated', 'n63RAjowJxMrpB8cA85Yp0', '2022-10-12 22:01:12', '[]'),
('William.Deacy@testemail.cf', '$2b$12$2h8fjVmOJvWBse/rd4U8/O0fMx09arSofMDGwUy17vjNxO0QD5s6q', 6, NULL, 'User', '2022-11-14 10:49:20', 'Activated', NULL, NULL, '[\"fbn6FGo3SlwxDlgMQKCZLp:APA91bH98pIEer9ppeq6txi3A643KJXoYSFARtS8_z84xomqoYAcjgnczHDmlVZ_Bw3rFwNSCbisDg6Ha_sT19q7nZ5ol6ZYWij-ZatUOHqJ-8K57RGjjPdJngRsfpNd-QBkYqDhpZmR\", \"ePHP0UFoboNWVqoUZA7hmP:APA91bG6KACtKl1_aH67UPXDQqhcbT0Q_yQIvj954_581rq4GaVomwGT-Kx-vjV4IB10_tEMyx5k22AUqC-MXp7L5jG3445tot-wq9ybxPnEMe2ZLOzfwcNpTYppfeCkT3F5pdMhPLjX\"]');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `email_address` varchar(254) DEFAULT NULL,
  `phone_number` char(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `preference` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`preference`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `email_address`, `phone_number`, `name`, `gender`, `preference`) VALUES
(1, 'Helen.Fleming@testemail.cf', '0109051738', 'Helen Fleming', 'Male', '[\"Seedlings\"]'),
(2, 'Helen.Low@testemail.cf', '0188729563', 'Helen Low', 'Female', '[\"Herbs\", \"Gardening\"]'),
(3, 'Rebecca.Todd@testemail.cf', '0151056923', 'Rebecca Todd', 'Male', '[\"Fruits\", \"Succulent\", \"Herbs\", \"Bonsai\", \"Seedlings\"]'),
(4, 'Sarah.Zwilling@testemail.cf', '0166751249', 'Sarah Zwilling', 'Female', '[\"Bonsai\", \"Succulent\", \"Herbs\", \"Fruits\", \"Gardening\", \"Seedlings\"]'),
(5, 'Morris.Hannah@testemail.cf', '0123029768', 'Morris Hannah', 'Female', NULL),
(6, 'William.Deacy@testemail.cf', '0184308597', 'William Deacy', 'Male', '[\"Fruits\", \"Herbs\", \"Bonsai\", \"Succulent\", \"Seedlings\"]'),
(7, 'Deanna.Flickinger@testemail.cf', '0165318906', 'Deanna Flickinger', 'Male', '[\"Succulent\", \"Seedlings\", \"Herbs\", \"Bonsai\", \"Fruits\"]'),
(8, 'Jack.Hull@testemail.cf', '0121596023', 'Jack Hull', 'Female', '[\"Herbs\", \"Fruits\", \"Gardening\", \"Succulent\", \"Seedlings\", \"Bonsai\"]'),
(9, 'Rita.Kenyon@testemail.cf', '01143065182', 'Rita Kenyon', 'Male', '[\"Succulent\", \"Seedlings\"]'),
(10, 'Debbie.Pierce@testemail.cf', '01106548972', 'Debbie Pierce', 'Male', '[\"Herbs\", \"Fruits\", \"Succulent\"]'),
(11, 'Clifford.Bautista@testemail.cf', '01169501432', 'Clifford Bautista', 'Male', '[\"Herbs\"]'),
(12, 'David.Woody@testemail.cf', '0165704189', 'David Woody', 'Female', '[\"Succulent\"]'),
(13, 'Robert.Abud@testemail.cf', '0188412753', 'Robert Abud', 'Male', '[\"Herbs\", \"Gardening\", \"Bonsai\"]'),
(14, 'Jill.Poirier@testemail.cf', '0125814062', 'Jill Poirier', 'Male', NULL),
(15, 'Nola.Lee@testemail.cf', '01123508691', 'Nola Lee', 'Female', '[\"Seedlings\"]'),
(16, 'Harmony.Walker@testemail.cf', '0146542378', 'Harmony Walker', 'Female', NULL),
(17, 'Monika.Hutson@testemail.cf', '0142971640', 'Monika Hutson', 'Female', '[\"Bonsai\", \"Seedlings\", \"Herbs\", \"Succulent\", \"Fruits\", \"Gardening\"]'),
(18, 'Mary.Nichols@testemail.cf', '0147429603', 'Mary Nichols', 'Female', '[\"Succulent\", \"Seedlings\", \"Bonsai\", \"Gardening\", \"Fruits\", \"Herbs\"]'),
(19, 'Marilyn.Goodale@testemail.cf', '0127125089', 'Marilyn Goodale', 'Male', '[\"Herbs\", \"Succulent\", \"Gardening\"]'),
(20, 'William.Arruda@testemail.cf', '0193172046', 'William Arruda', 'Female', '[\"Herbs\", \"Succulent\", \"Gardening\", \"Bonsai\", \"Fruits\", \"Seedlings\"]'),
(21, 'Henry.Scales@testemail.cf', '01165893174', 'Henry Scales', 'Male', '[\"Herbs\", \"Fruits\", \"Succulent\"]'),
(22, 'Steven.Haupt@testemail.cf', '0165720813', 'Steven Haupt', 'Male', '[\"Succulent\", \"Fruits\", \"Herbs\", \"Bonsai\"]'),
(23, 'Rodney.Taylor@testemail.cf', '0198792014', 'Rodney Taylor', 'Male', '[\"Succulent\", \"Bonsai\", \"Herbs\", \"Seedlings\"]'),
(24, 'Eli.Labbe@testemail.cf', '0194379502', 'Eli Labbe', 'Male', '[\"Gardening\", \"Seedlings\", \"Succulent\", \"Bonsai\"]'),
(25, 'Terry.Chambers@testemail.cf', '01134605291', 'Terry Chambers', 'Female', '[\"Fruits\"]'),
(26, 'Leslie.Fuller@testemail.cf', '0155386749', 'Leslie Fuller', 'Male', NULL),
(27, 'Daniel.Humphreys@testemail.cf', '0150439562', 'Daniel Humphreys', 'Male', '[\"Seedlings\", \"Succulent\"]'),
(28, 'Glenna.Farmer@testemail.cf', '0185123460', 'Glenna Farmer', 'Male', '[\"Fruits\", \"Succulent\"]'),
(29, 'Daniel.Claunch@testemail.cf', '0165802193', 'Daniel Claunch', 'Female', '[\"Herbs\", \"Fruits\"]'),
(30, 'Victoria.Yeaton@testemail.cf', '0187529138', 'Victoria Yeaton', 'Male', '[\"Gardening\"]'),
(31, 'testsignup@testmail.cf', '0123456789', 'Test', 'Male', NULL),
(32, 'test2signup@testemail.cf', '0123456789', 'Test Sign Up', 'Male', NULL),
(33, 'test3signup@testemail.cf', '0123456789', 'Test Sign Up', 'Male', NULL),
(34, 'testfour@testemail.cf', '0123456789', 'Test Four', 'Female', NULL),
(35, 'testfive@testemail.cf', '0123456789', 'Test Five', 'Male', NULL),
(36, 'testlast@testemail.cf', '0123456789', 'Test Las', 'Male', NULL),
(37, '101234156@students.swinburne.edu.my', '0123456789', 'Xiang', 'Male', NULL),
(38, 'chanjiaxin351@gmail.com', '0126800166', 'shittyxiang', 'Female', NULL),
(39, 'admin@testemail.cf', '0123456789', 'admin', 'Male', '[\"Cactus\", \"Plants\"]'),
(40, 'user@testemail.cf', '0123456789', 'user', 'Male', '[\"Plant\"]'),
(41, 'superadmin@testemail.cf', '0123456789', 'super admin', 'Male', NULL),
(42, '101231241@student.swin.edu.au', '1224124141', 'olly', 'Male', NULL),
(43, '101231241@students.swinburne.edu.my', '1244235223', 'olleh', 'Male', NULL),
(45, 'edwinkhoo02@gmail.com', '0134452275', 'Edwin Khoo', 'Male', NULL),
(46, 'iracallacari@gmail.com', '0102348293', 'Lacari Basado', 'Female', NULL),
(47, '101234169@students.swinburne.edu.my', '0123456789', 'TestUser', 'Male', '[\"Plant\", \"Cactus\"]'),
(48, 'clementhosk@gmail.com', '0123456789', 'Clement Ho', 'Male', NULL),
(49, 'testadmin123@testemail.cf', '1231231231', 'Test Admin', 'Male', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `content_info`
--
ALTER TABLE `content_info`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `custom_store_availability`
--
ALTER TABLE `custom_store_availability`
  ADD PRIMARY KEY (`operating_date`);

--
-- Indexes for table `default_store_availability`
--
ALTER TABLE `default_store_availability`
  ADD PRIMARY KEY (`day_of_week`);

--
-- Indexes for table `encyclopedia_items`
--
ALTER TABLE `encyclopedia_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `homepage_info`
--
ALTER TABLE `homepage_info`
  ADD PRIMARY KEY (`version_id`);

--
-- Indexes for table `notification_history`
--
ALTER TABLE `notification_history`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`email_address`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_info`
--
ALTER TABLE `content_info`
  MODIFY `content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `encyclopedia_items`
--
ALTER TABLE `encyclopedia_items`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `enquiry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `homepage_info`
--
ALTER TABLE `homepage_info`
  MODIFY `version_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification_history`
--
ALTER TABLE `notification_history`
  MODIFY `notification_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=681;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD CONSTRAINT `booking_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `notification_history`
--
ALTER TABLE `notification_history`
  ADD CONSTRAINT `notification_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD CONSTRAINT `user_credentials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
