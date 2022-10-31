-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 03:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `cancellation_remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`booking_id`, `booking_timestamp`, `appointment_date`, `appointment_timeslot`, `user_id`, `number_of_attendees`, `booking_status`, `cancellation_remarks`) VALUES
('+osk3rEY4Tc', '2022-10-15 03:31:42', '2022-11-14', '13:00:00', 21, 1, 'Cancelled', NULL),
('+x5RE52ELD4', '2022-10-15 03:31:42', '2022-12-01', '16:00:00', 6, 6, 'Cancelled', NULL),
('+Y1elFc0ysY', '2022-10-23 02:02:07', '2022-11-02', '10:00:00', 9, 2, 'Confirmed', NULL),
('/zutZFvmauw', '2022-10-15 03:31:42', '2022-10-24', '09:00:00', 10, 8, 'Cancelled', NULL),
('0LS1wPrSdzY', '2022-10-14 15:16:04', '2022-12-08', '16:00:00', 27, 4, 'Confirmed', NULL),
('0qQB5iKls5g', '2022-10-14 15:16:04', '2022-11-07', '10:00:00', 23, 5, 'Cancelled', NULL),
('0wKwaNVWU3E', '2022-10-15 03:31:42', '2022-11-02', '10:00:00', 22, 3, 'Cancelled', NULL),
('1Cz2xq6cZ6I', '2022-10-15 03:31:42', '2022-10-31', '13:00:00', 14, 6, 'Cancelled', NULL),
('24DPK87cf9A', '2022-10-14 15:16:04', '2022-11-09', '11:00:00', 23, 2, 'Confirmed', NULL),
('2F4FJx2ENYA', '2022-10-15 03:31:42', '2022-10-19', '12:00:00', 25, 5, 'Confirmed', NULL),
('2sNN/Esx2As', '2022-10-23 15:43:08', '2022-11-01', '00:00:00', 15, 3, 'Cancelled', 'Too early'),
('2t+Vq3Zus4E', '2022-10-14 15:16:04', '2022-10-21', '13:00:00', 27, 5, 'Confirmed', NULL),
('3bij+oU+kn8', '2022-10-14 15:16:04', '2022-10-18', '11:00:00', 30, 2, 'Cancelled', NULL),
('3GGFT469rXo', '2022-10-23 15:43:24', '2022-11-01', '00:00:00', 15, 4, 'Confirmed', NULL),
('43XPJqzZA0M', '2022-10-14 15:16:04', '2022-11-18', '09:00:00', 28, 1, 'Confirmed', NULL),
('4BPDO45fn4Q', '2022-10-15 03:31:42', '2022-10-28', '09:00:00', 27, 8, 'Cancelled', NULL),
('5FIftn84VjI', '2022-10-15 03:31:42', '2022-11-18', '09:00:00', 24, 5, 'Confirmed', NULL),
('5tbAya0hbBI', '2022-10-15 03:31:42', '2022-12-08', '14:00:00', 15, 8, 'Confirmed', NULL),
('6UQpLCB4/2o', '2022-10-14 15:16:04', '2022-10-25', '10:00:00', 27, 5, 'Cancelled', NULL),
('73ow2BbS7w0', '2022-10-14 15:16:04', '2022-11-18', '16:00:00', 29, 3, 'Confirmed', NULL),
('7mSttAhO/a8', '2022-10-14 15:16:04', '2022-11-01', '11:00:00', 25, 6, 'Confirmed', NULL),
('7TvC5oiMmHE', '2022-10-14 15:16:04', '2022-11-01', '16:00:00', 27, 6, 'Confirmed', NULL),
('7xzIrD6Nuwc', '2022-10-15 03:31:42', '2022-11-10', '14:00:00', 14, 2, 'Confirmed', NULL),
('80Q00b1icZ4', '2022-10-15 03:31:42', '2022-11-17', '09:00:00', 22, 1, 'Cancelled', NULL),
('8A31RgZ/mWs', '2022-10-13 06:22:53', '2022-10-17', '10:00:00', 14, 5, 'Cancelled', NULL),
('8BvY5sz3Ij8', '2022-10-14 15:16:04', '2022-11-23', '13:00:00', 21, 5, 'Cancelled', NULL),
('8OdsS4FvLp8', '2022-10-14 15:16:04', '2022-11-09', '09:00:00', 23, 5, 'Cancelled', NULL),
('8WSTlnQCoEg', '2022-10-15 03:31:42', '2022-11-07', '13:00:00', 14, 3, 'Cancelled', NULL),
('9fCty64D53A', '2022-10-13 06:22:53', '2022-10-19', '12:00:00', 10, 7, 'Cancelled', NULL),
('9j9TMB1uSxg', '2022-10-23 15:35:36', '2022-11-29', '13:00:00', 15, 1, 'Cancelled', 'Illness'),
('a96g9v24DH8', '2022-10-14 15:16:04', '2022-11-18', '14:00:00', 25, 6, 'Confirmed', NULL),
('ad9/BjXT94Q', '2022-10-14 15:16:04', '2022-10-19', '10:00:00', 27, 7, 'Cancelled', NULL),
('AQZKvWr2qGw', '2022-10-15 03:31:42', '2022-12-09', '15:00:00', 21, 1, 'Confirmed', NULL),
('aRYM289Qflk', '2022-10-14 15:16:04', '2022-11-25', '15:00:00', 24, 7, 'Confirmed', NULL),
('bed897y5Gaw', '2022-10-15 03:31:42', '2022-12-07', '09:00:00', 14, 4, 'Confirmed', NULL),
('biGPa9FCkuY', '2022-10-15 03:31:42', '2022-12-12', '13:00:00', 23, 3, 'Confirmed', NULL),
('bL2ft75Tuz8', '2022-10-14 15:16:04', '2022-12-13', '11:00:00', 14, 6, 'Cancelled', NULL),
('brNModJLBgA', '2022-10-14 15:16:04', '2022-11-10', '16:00:00', 6, 7, 'Cancelled', NULL),
('C/UvQH1z8hw', '2022-10-14 15:16:04', '2022-11-02', '13:00:00', 10, 4, 'Cancelled', NULL),
('CA1AReETyGg', '2022-10-15 03:31:42', '2022-12-02', '13:00:00', 9, 8, 'Confirmed', NULL),
('cNXA/7r5mRg', '2022-10-14 15:16:04', '2022-10-20', '09:00:00', 26, 6, 'Cancelled', NULL),
('CzVRFOoGiKo', '2022-10-14 15:16:04', '2022-12-12', '13:00:00', 21, 5, 'Cancelled', NULL),
('D982dSHStqY', '2022-10-14 15:16:04', '2022-10-20', '11:00:00', 10, 4, 'Confirmed', NULL),
('DncPQH+6Mug', '2022-10-14 15:16:04', '2022-12-01', '16:00:00', 14, 5, 'Confirmed', NULL),
('DtCjnHl38jI', '2022-10-14 15:16:04', '2022-11-17', '10:00:00', 21, 7, 'Confirmed', NULL),
('Dv06dnBmxds', '2022-10-14 15:16:04', '2022-10-21', '12:00:00', 22, 2, 'Confirmed', NULL),
('DzXYCfXJGqw', '2022-10-23 15:45:10', '2022-10-27', '11:00:00', 34, 11, 'Cancelled', 'Illness'),
('e3brWLRrTmY', '2022-10-15 03:31:42', '2022-11-21', '14:00:00', 29, 3, 'Cancelled', NULL),
('e7nm1TpqiSI', '2022-10-15 03:31:42', '2022-11-01', '16:00:00', 28, 4, 'Confirmed', NULL),
('EFhR5HEADkc', '2022-10-15 03:31:42', '2022-12-08', '09:00:00', 9, 3, 'Confirmed', NULL),
('ehCCvwtoLOg', '2022-10-14 15:16:04', '2022-10-18', '09:00:00', 27, 4, 'Cancelled', NULL),
('eiwPcFGhEsM', '2022-10-14 15:16:04', '2022-11-16', '15:00:00', 9, 7, 'Confirmed', NULL),
('ePmuEA+BzYE', '2022-10-15 03:31:42', '2022-11-11', '13:00:00', 22, 3, 'Confirmed', NULL),
('esAx8B+79Wk', '2022-10-14 15:16:04', '2022-12-05', '09:00:00', 10, 1, 'Cancelled', NULL),
('EtsJ0yXqISw', '2022-10-14 15:16:04', '2022-11-21', '09:00:00', 22, 8, 'Cancelled', NULL),
('f55Hg9/zYJY', '2022-10-15 03:31:42', '2022-12-12', '09:00:00', 27, 6, 'Confirmed', NULL),
('foZ/OMGdhCc', '2022-10-14 15:16:04', '2022-11-02', '12:00:00', 29, 5, 'Confirmed', NULL),
('FPMabCuArsQ', '2022-10-14 15:16:04', '2022-11-02', '10:00:00', 14, 7, 'Cancelled', NULL),
('FurpW5D59xg', '2022-10-15 03:31:42', '2022-11-23', '14:00:00', 9, 4, 'Cancelled', NULL),
('FuxU9g953lU', '2022-10-15 03:31:42', '2022-10-19', '12:00:00', 22, 6, 'Confirmed', NULL),
('FWdu5GnSLUw', '2022-10-15 03:31:42', '2022-12-05', '09:00:00', 14, 1, 'Cancelled', NULL),
('FZYvqdg+iRw', '2022-10-14 15:16:04', '2022-12-02', '10:00:00', 25, 5, 'Cancelled', NULL),
('G0az1Dft++o', '2022-10-15 03:31:42', '2022-11-11', '14:00:00', 21, 5, 'Cancelled', NULL),
('G819aBYl0Fs', '2022-10-14 15:16:04', '2022-11-30', '11:00:00', 10, 7, 'Confirmed', NULL),
('gm34eBSHbro', '2022-10-15 03:31:42', '2022-12-12', '13:00:00', 23, 4, 'Cancelled', NULL),
('GPFCFAmcURc', '2022-10-14 15:16:04', '2022-10-21', '13:00:00', 6, 5, 'Cancelled', NULL),
('GTCHYuHM7d8', '2022-10-14 15:16:04', '2022-12-05', '09:00:00', 25, 7, 'Confirmed', NULL),
('GvgsBiqkriA', '2022-10-15 03:31:42', '2022-10-19', '09:00:00', 22, 4, 'Cancelled', NULL),
('GwutTYq8Ijs', '2022-10-14 15:16:04', '2022-12-05', '11:00:00', 14, 4, 'Confirmed', NULL),
('HeukZjkjCGE', '2022-10-13 12:51:53', '2022-10-17', '15:00:00', 29, 1, 'Confirmed', NULL),
('HjzgQ9P5iDc', '2022-10-15 03:31:42', '2022-10-28', '15:00:00', 24, 4, 'Cancelled', NULL),
('HtIpzOMUEvY', '2022-10-15 03:31:42', '2022-10-20', '09:00:00', 9, 2, 'Confirmed', NULL),
('hylpYxpOlqg', '2022-10-13 06:22:53', '2022-11-09', '12:00:00', 6, 8, 'Cancelled', NULL),
('i+OM/rOQrnk', '2022-10-15 03:31:42', '2022-11-04', '14:00:00', 10, 3, 'Cancelled', NULL),
('iBrfCKXmWyg', '2022-10-15 03:31:42', '2022-11-10', '15:00:00', 14, 5, 'Cancelled', NULL),
('Id7L8gQuDoU', '2022-10-15 03:31:42', '2022-11-22', '09:00:00', 26, 8, 'Confirmed', NULL),
('IYIGXk5IbJE', '2022-10-15 03:31:42', '2022-11-14', '09:00:00', 6, 5, 'Cancelled', NULL),
('J/XhWlTnnGc', '2022-10-14 15:16:04', '2022-11-03', '14:00:00', 9, 3, 'Cancelled', NULL),
('j0J12iAzaho', '2022-10-15 03:31:42', '2022-11-09', '12:00:00', 23, 7, 'Cancelled', NULL),
('J52sTien8iU', '2022-10-15 03:31:42', '2022-10-17', '11:00:00', 28, 2, 'Confirmed', NULL),
('J70cniN9ydo', '2022-10-14 15:16:04', '2022-11-15', '11:00:00', 29, 8, 'Cancelled', NULL),
('jeDmpCFrGxw', '2022-10-14 15:16:04', '2022-11-09', '09:00:00', 22, 7, 'Cancelled', NULL),
('Jf+I8p8ZBHo', '2022-10-14 15:16:04', '2022-11-08', '11:00:00', 22, 2, 'Cancelled', NULL),
('jfBdtVV11xg', '2022-10-14 15:16:04', '2022-12-02', '09:00:00', 25, 7, 'Cancelled', NULL),
('jtZNr7esz5I', '2022-10-15 03:31:42', '2022-11-08', '14:00:00', 26, 8, 'Cancelled', NULL),
('JWltI0jsD24', '2022-10-14 15:16:04', '2022-10-17', '11:00:00', 26, 1, 'Cancelled', NULL),
('K+Z2iBZEOb8', '2022-10-15 03:31:42', '2022-12-07', '13:00:00', 27, 1, 'Cancelled', NULL),
('k59Q4cjxytA', '2022-10-14 15:16:04', '2022-11-29', '16:00:00', 6, 5, 'Confirmed', NULL),
('kcfIc6t2KbY', '2022-10-14 15:16:04', '2022-12-02', '14:00:00', 22, 4, 'Cancelled', NULL),
('KHSk6EuIqIM', '2022-10-14 15:16:04', '2022-12-06', '09:00:00', 14, 3, 'Cancelled', NULL),
('KPlPdOOzH4g', '2022-10-15 03:31:42', '2022-12-08', '14:00:00', 14, 6, 'Cancelled', NULL),
('Ld7lMaJNfSU', '2022-10-15 03:31:42', '2022-12-12', '09:00:00', 9, 1, 'Cancelled', NULL),
('ldJYHQ9Iy10', '2022-10-14 15:16:04', '2022-11-25', '14:00:00', 22, 6, 'Cancelled', NULL),
('ljgaGSZu1nk', '2022-10-15 03:31:42', '2022-11-07', '13:00:00', 22, 6, 'Confirmed', NULL),
('lZBsAokv9BU', '2022-10-15 03:31:42', '2022-11-30', '09:00:00', 6, 8, 'Confirmed', NULL),
('mBq5gANDlu8', '2022-10-14 15:16:04', '2022-11-14', '14:00:00', 14, 6, 'Confirmed', NULL),
('mih0s2vXrPQ', '2022-10-14 15:16:04', '2022-11-15', '13:00:00', 26, 5, 'Cancelled', NULL),
('mNRn+QzHUKI', '2022-10-15 03:31:42', '2022-10-31', '11:00:00', 24, 8, 'Cancelled', NULL),
('mPj18yElS5k', '2022-10-13 06:22:53', '2022-10-20', '09:00:00', 9, 7, 'Confirmed', NULL),
('mWNx+7rq2OM', '2022-10-15 03:31:42', '2022-11-24', '14:00:00', 14, 5, 'Cancelled', NULL),
('mxMu3SfHR7U', '2022-10-22 11:23:41', '2022-12-13', '14:00:00', 14, 7, 'Cancelled', 'Illness'),
('mxtVWteme1g', '2022-10-15 03:31:42', '2022-11-08', '11:00:00', 6, 3, 'Cancelled', NULL),
('N9O1ydd7GrY', '2022-10-15 03:31:42', '2022-11-30', '09:00:00', 9, 8, 'Cancelled', NULL),
('nRITOvnTFlc', '2022-10-14 15:16:04', '2022-10-31', '13:00:00', 22, 3, 'Confirmed', NULL),
('NsU9p/Tym/M', '2022-10-14 15:16:04', '2022-10-25', '11:00:00', 23, 4, 'Confirmed', NULL),
('NzNkdIslWsk', '2022-10-14 15:16:04', '2022-10-20', '09:00:00', 23, 7, 'Cancelled', NULL),
('NzyFoAaxKt4', '2022-10-15 03:31:42', '2022-12-12', '15:00:00', 22, 6, 'Confirmed', NULL),
('o8g5Atff4wQ', '2022-10-15 03:31:42', '2022-10-28', '09:00:00', 30, 3, 'Cancelled', NULL),
('ODTUEOROkH8', '2022-10-14 15:16:04', '2022-11-10', '13:00:00', 30, 7, 'Confirmed', NULL),
('oE9OFFpY3hE', '2022-10-14 15:16:04', '2022-11-02', '11:00:00', 24, 5, 'Confirmed', NULL),
('OGyofcmA8MM', '2022-10-14 15:16:04', '2022-10-27', '16:00:00', 24, 4, 'Confirmed', NULL),
('OjjR+kUiNiM', '2022-10-14 15:16:04', '2022-11-24', '16:00:00', 26, 8, 'Confirmed', NULL),
('oLMCG0NIWH4', '2022-10-15 03:31:42', '2022-11-15', '09:00:00', 30, 2, 'Cancelled', NULL),
('OoJdCnDrglk', '2022-10-14 15:16:04', '2022-11-14', '09:00:00', 23, 3, 'Cancelled', NULL),
('oqOdcWlzE9w', '2022-10-14 15:16:04', '2022-11-02', '12:00:00', 24, 6, 'Cancelled', NULL),
('oS5CI4FcY7M', '2022-10-14 15:16:04', '2022-11-04', '09:00:00', 14, 7, 'Confirmed', NULL),
('ot886kgop7A', '2022-10-22 11:50:08', '2022-10-28', '09:00:00', 14, 8, 'Confirmed', NULL),
('ouAtz7loCgE', '2022-10-14 15:16:04', '2022-11-16', '14:00:00', 25, 5, 'Cancelled', NULL),
('OUAVpUZmITA', '2022-10-15 03:31:42', '2022-10-24', '15:00:00', 15, 3, 'Cancelled', NULL),
('OwVYWGiLomQ', '2022-10-15 03:31:42', '2022-11-24', '11:00:00', 30, 2, 'Cancelled', NULL),
('OZzeh3mRuhg', '2022-10-14 15:16:04', '2022-10-21', '13:00:00', 28, 3, 'Cancelled', NULL),
('paJwrPwpkWg', '2022-10-14 15:16:04', '2022-12-07', '11:00:00', 28, 5, 'Confirmed', NULL),
('PKqqWESmcXw', '2022-10-14 15:16:04', '2022-12-05', '11:00:00', 21, 2, 'Cancelled', NULL),
('pmQPsAg68mI', '2022-10-15 03:31:42', '2022-12-07', '16:00:00', 6, 2, 'Cancelled', NULL),
('pohzJq0Qm4o', '2022-10-15 03:31:42', '2022-11-08', '15:00:00', 24, 2, 'Cancelled', NULL),
('POVS4WT2JeY', '2022-10-15 03:31:42', '2022-11-21', '11:00:00', 6, 5, 'Cancelled', NULL),
('PsYVE0yjb9Q', '2022-10-15 03:31:42', '2022-11-17', '16:00:00', 30, 5, 'Cancelled', NULL),
('pyFUQSxoM/Y', '2022-10-15 03:31:42', '2022-11-23', '09:00:00', 6, 6, 'Confirmed', NULL),
('q+iaXZEgOw0', '2022-10-15 03:31:42', '2022-11-25', '16:00:00', 23, 1, 'Cancelled', NULL),
('qa4lpuhC5vs', '2022-10-15 03:31:42', '2022-10-28', '16:00:00', 15, 4, 'Cancelled', NULL),
('qBqX1v9ymKs', '2022-10-22 17:16:02', '2022-10-27', '14:00:00', 14, 3, 'Cancelled', NULL),
('QIIo7n1PPVc', '2022-10-21 17:19:02', '2022-10-27', '14:00:00', 14, 3, 'Confirmed', NULL),
('QiJPMtMA02U', '2022-10-15 03:31:42', '2022-12-05', '16:00:00', 22, 3, 'Cancelled', NULL),
('QKzXTCkJlLQ', '2022-10-13 06:22:53', '2022-11-07', '17:00:00', 26, 2, 'Cancelled', NULL),
('qlcUIbd8+oA', '2022-10-15 03:31:42', '2022-10-17', '10:00:00', 25, 3, 'Cancelled', NULL),
('QQYbHCbjECo', '2022-10-14 15:16:04', '2022-12-09', '14:00:00', 6, 3, 'Confirmed', NULL),
('qRX6gpIsdeY', '2022-10-22 03:08:05', '2022-10-22', '12:00:00', 14, 4, 'Confirmed', NULL),
('qRX6gpISKUY', '2022-10-22 02:18:55', '2022-10-24', '16:00:00', 14, 14, 'Confirmed', NULL),
('qul34ocnH74', '2022-10-15 03:31:42', '2022-10-25', '10:00:00', 23, 4, 'Cancelled', NULL),
('qwyFE1dCw/g', '2022-10-15 03:31:42', '2022-11-28', '09:00:00', 29, 8, 'Confirmed', NULL),
('RAW/GZdwl3I', '2022-10-13 06:22:53', '2022-10-21', '17:00:00', 15, 6, 'Cancelled', NULL),
('rlag0/b8OJI', '2022-10-14 15:16:04', '2022-11-07', '09:00:00', 21, 4, 'Cancelled', NULL),
('roxWTWJ9axE', '2022-10-15 03:31:42', '2022-11-14', '13:00:00', 25, 5, 'Confirmed', NULL),
('RQn721qu1S4', '2022-10-14 15:16:04', '2022-11-18', '10:00:00', 21, 5, 'Cancelled', NULL),
('Rv+5avFwe3c', '2022-10-14 15:16:04', '2022-11-03', '15:00:00', 28, 6, 'Confirmed', NULL),
('s381Vd8A35Q', '2022-10-21 17:16:09', '2022-10-27', '14:00:00', 14, 3, 'Confirmed', NULL),
('s66x9iIZ30k', '2022-10-14 15:16:04', '2022-12-06', '14:00:00', 30, 4, 'Confirmed', NULL),
('se0LDhvnpro', '2022-10-14 15:16:04', '2022-11-29', '10:00:00', 24, 5, 'Confirmed', NULL),
('sLGNNmcMJME', '2022-10-14 15:16:04', '2022-10-25', '11:00:00', 22, 5, 'Confirmed', NULL),
('SRaz2N2cK5w', '2022-10-14 15:16:04', '2022-10-25', '10:00:00', 26, 6, 'Confirmed', NULL),
('sUXA7AmK5FM', '2022-10-15 03:31:42', '2022-11-14', '09:00:00', 9, 5, 'Cancelled', NULL),
('SWdbNTWdFbc', '2022-10-15 03:31:42', '2022-11-16', '09:00:00', 28, 4, 'Confirmed', NULL),
('sYt7E6NR9xc', '2022-10-15 03:31:42', '2022-12-09', '11:00:00', 24, 4, 'Confirmed', NULL),
('tIBLHhe4sJE', '2022-10-14 15:16:04', '2022-10-20', '10:00:00', 30, 7, 'Confirmed', NULL),
('tQWNnZ6tuec', '2022-10-14 15:16:04', '2022-11-22', '15:00:00', 24, 7, 'Cancelled', NULL),
('tXMni/sQICQ', '2022-10-14 15:16:04', '2022-12-06', '10:00:00', 14, 5, 'Cancelled', NULL),
('tzY59yplLz0', '2022-10-15 03:31:42', '2022-11-03', '09:00:00', 10, 6, 'Cancelled', NULL),
('u/ChP0Hii1Q', '2022-10-14 15:16:04', '2022-10-17', '11:00:00', 25, 8, 'Cancelled', NULL),
('Ud7B+uH879k', '2022-10-15 03:31:42', '2022-10-24', '13:00:00', 14, 8, 'Confirmed', NULL),
('UizHa20YuRI', '2022-10-21 05:01:24', '2022-10-25', '11:00:00', 25, 5, 'Cancelled', NULL),
('umcwrtGog08', '2022-10-14 15:16:04', '2022-10-17', '11:00:00', 26, 1, 'Confirmed', NULL),
('urDsJ6RPx+w', '2022-10-15 03:31:42', '2022-11-07', '09:00:00', 22, 7, 'Confirmed', NULL),
('USv2ZZ23qb0', '2022-10-14 15:16:04', '2022-10-21', '11:00:00', 9, 4, 'Cancelled', NULL),
('uSYNBQs5cq8', '2022-10-14 15:16:04', '2022-11-24', '15:00:00', 30, 4, 'Confirmed', NULL),
('UWO6cchKhSg', '2022-10-14 15:16:04', '2022-11-23', '15:00:00', 29, 8, 'Cancelled', NULL),
('VbjZRSl9ZyE', '2022-10-14 15:16:04', '2022-11-29', '10:00:00', 25, 3, 'Confirmed', NULL),
('VhlVz4NeABk', '2022-10-14 15:16:04', '2022-11-25', '11:00:00', 15, 4, 'Cancelled', NULL),
('VMVWal0K0eQ', '2022-10-22 11:47:53', '2022-10-24', '09:00:00', 14, 1, 'Cancelled', 'Meh'),
('VoukUBxmrqE', '2022-10-15 03:31:42', '2022-11-15', '16:00:00', 26, 6, 'Cancelled', NULL),
('VqBqByXPRdo', '2022-10-14 15:16:04', '2022-12-05', '11:00:00', 30, 1, 'Cancelled', NULL),
('vQTXRv6e/mo', '2022-10-15 03:31:42', '2022-10-17', '10:00:00', 28, 5, 'Cancelled', NULL),
('w3vzSR4j6ns', '2022-10-23 10:57:42', '2022-10-27', '09:00:00', 29, 2, 'Cancelled', 'Illness'),
('WEVlPEYSCUU', '2022-10-15 03:31:42', '2022-11-04', '13:00:00', 29, 2, 'Cancelled', NULL),
('wv9XtJfUmdY', '2022-10-15 03:31:42', '2022-10-31', '10:00:00', 10, 4, 'Confirmed', NULL),
('wzBInG_RKLY', '2022-10-22 02:11:29', '2022-10-27', '09:00:00', 14, 4, 'Confirmed', NULL),
('X+CTLGRwOdc', '2022-10-14 15:16:04', '2022-11-07', '09:00:00', 24, 2, 'Cancelled', NULL),
('x4l4xZcXzeM', '2022-10-15 03:31:42', '2022-11-10', '16:00:00', 30, 4, 'Cancelled', NULL),
('X8ly36tsOps', '2022-10-14 15:16:04', '2022-10-27', '16:00:00', 30, 8, 'Confirmed', NULL),
('XCmZ87X3yGg', '2022-10-15 03:31:42', '2022-11-28', '11:00:00', 29, 7, 'Confirmed', NULL),
('xe+MvyJzIXQ', '2022-10-14 15:16:04', '2022-11-16', '14:00:00', 24, 1, 'Confirmed', NULL),
('xeCM3kcjd/Y', '2022-10-14 15:16:04', '2022-12-02', '14:00:00', 9, 4, 'Confirmed', NULL),
('xNX0uXnEAi4', '2022-10-15 03:31:42', '2022-10-31', '13:00:00', 24, 2, 'Cancelled', NULL),
('xpuCFTVNUPc', '2022-10-15 03:31:42', '2022-10-25', '10:00:00', 26, 5, 'Confirmed', NULL),
('xRbA/y8dWn8', '2022-10-14 15:16:04', '2022-10-28', '09:00:00', 30, 7, 'Confirmed', NULL),
('xsYmFONnuks', '2022-10-23 10:58:25', '2022-10-27', '09:00:00', 34, 3, 'Cancelled', 'Emergency'),
('XUUVPYo9gSg', '2022-10-14 15:16:04', '2022-11-24', '15:00:00', 22, 1, 'Confirmed', NULL),
('YAmIyNP5bTQ', '2022-10-23 10:42:36', '2022-10-27', '09:00:00', 15, 3, 'Confirmed', NULL),
('yRoQmHoWe5c', '2022-10-13 06:22:53', '2022-10-18', '11:00:00', 25, 3, 'Cancelled', NULL),
('Ytz4Qsil27Q', '2022-10-15 03:31:42', '2022-10-24', '10:00:00', 10, 5, 'Confirmed', NULL),
('YVUS1wCSbj8', '2022-10-15 03:31:42', '2022-11-11', '15:00:00', 10, 4, 'Cancelled', NULL),
('YytA9/9n2SM', '2022-10-15 03:31:42', '2022-10-20', '10:00:00', 29, 6, 'Confirmed', NULL),
('z1XiSled9Io', '2022-10-15 03:31:42', '2022-12-07', '15:00:00', 28, 3, 'Confirmed', NULL),
('z24si-PnXJw', '2022-10-22 17:10:42', '2022-10-27', '11:00:00', 19, 2, 'Confirmed', NULL),
('zE4iFFRnGKg', '2022-10-14 15:16:04', '2022-10-17', '10:00:00', 25, 8, 'Cancelled', NULL),
('Zk6lFtjNtDM', '2022-10-15 03:31:42', '2022-11-25', '13:00:00', 29, 5, 'Confirmed', NULL),
('zn3DMnrReko', '2022-10-14 15:16:04', '2022-11-21', '09:00:00', 9, 2, 'Cancelled', NULL),
('Zsa6NLGGHuc', '2022-10-14 15:16:04', '2022-11-11', '11:00:00', 28, 1, 'Cancelled', NULL),
('ztCSuFLwGWg', '2022-10-15 03:31:42', '2022-10-31', '13:00:00', 28, 6, 'Cancelled', NULL),
('zwZinpPp4+0', '2022-10-14 15:16:04', '2022-11-07', '13:00:00', 23, 1, 'Confirmed', NULL),
('zxzBSdNfQW4', '2022-10-14 15:16:04', '2022-11-24', '11:00:00', 24, 7, 'Cancelled', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_info`
--

CREATE TABLE `content_info` (
  `content_id` int(10) UNSIGNED NOT NULL,
  `content_type` enum('Announcement','Promotion') NOT NULL,
  `content_creation_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content_title` varchar(255) NOT NULL,
  `content_resource` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_info`
--

INSERT INTO `content_info` (`content_id`, `content_type`, `content_creation_timestamp`, `content_title`, `content_resource`) VALUES
(1, 'Announcement', '2022-10-13 06:22:54', 'Closure of Store due to Fumigation and Santisation Exercise on 21st October 2022', '<p>Dear valued patrons,</p><br/><br/><p>Our store will be closed on 21st October 2022 for a fumigation and santisation exercise to ensure the safety of all visitors and employees. We will be back on 24th October 2022.</p><br/><br/><p>Thank you for your understanding.</p><br/><br/><p>Regards,</p><p>Cacti Succulent Kuching</p>'),
(2, 'Promotion', '2022-10-13 06:22:54', '40% off Cacti Seedling from 17th Oct 2022 to 31st Oct 2022', '<p>Dear valued patrons,</p><br/><br/><p>In conjunction with Halloween, we will be having a promotion whereby all Cacti Seedlings will be eligible for a 40% discount</p><br/><br/><p>With Love,</p><p>Cacti Succulent Kuching</p>'),
(3, 'Promotion', '2022-10-13 06:22:54', 'Buy 1 Free 1 for Pots and Vases on 11th November 2022', '<p>Dear valued patrons,</p><br/><br/><p>In conjunction with the 11.11 sales, we will be having a buy 1 free 1 sale on all pots and vases.</p><br/><br/><p>With Care,</p><p>Cacti Succulent Kuching</p>'),
(4, 'Announcement', '2022-10-13 06:22:54', 'Pop Up Store at Vivacity Mall on 8th November 2022', '<p>Dear valued patrons,</p><br/><br/><p>During the Yee Peng festival, we will be setting up a pop up store on the 8th November 2022 in Vivacity Mall. Be sure to drop by and visit us for some freebies!</p><br/><br/><p>With Care,</p><p>Cacti Succulent Kuching</p>');

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
(1, 'Compost & Soil', NULL, 'Agrosoil', 'https://gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-2146/ZAPXaUTi1619778545-808x1080.jpeg', 'Available', '48.29', 'This is Agrosoil'),
(2, 'Fertiliser', NULL, 'Ferti 53', 'https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-669/LExBlpgU1586244672-416x584.png', 'Not Available', NULL, 'This is Ferti 53'),
(3, 'Pesticides', NULL, 'Mr Ganick Natural Pesticide', 'https://gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-310/GM_mr_ganick_scale_terminator_1-01_1662356874-1772x1772.jpg', 'Available', '54.59', 'This is Mr Ganick Natural Pesticide'),
(4, 'Pots & Vases', 'Ceramic', 'Chinese Ceramic Pot', 'https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-858/or-plant-home-deco-a-9804-96224722-29085c5ea4ee10f0f8bcb668f8df2c26-1920x1920.jpg', 'Available', '92.44', 'This is Chinese Ceramic Pot'),
(5, 'Pots & Vases', 'Fiber', 'Wood Fiber Pot', 'https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-391/garden-wood-style-pot-1002651-4141-98884867-29175d6e46e35f225ae3d3f861827268-1920x1920.jpg', 'Not Available', NULL, 'This is Wood Fiber Pot'),
(6, 'Pots & Vases', 'Glass', 'Terrarium Glass Pot', 'https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-334/icueXlZy1596250341-795x669.JPG', 'Not Available', NULL, 'This is Terrarium Glass Pot'),
(7, 'Pots & Vases', 'Plastic', 'Garden Plastic Pot', 'https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-515/co-9555412901410-9354-31183684-928803f6b7cc81e102aee8a2092322a0-1920x1920.jpg', 'Not Available', NULL, 'This is Garden Plastic Pot'),
(8, 'Tools & Accessories', NULL, 'Pressure Pump Sprayer', 'https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-2052/druSuAs71621738114-960x1241.jpg', 'Available', '116.03', 'This is Pressure Pump Sprayer'),
(9, 'Seeds', 'Flower and Fruits', 'Sunflower Seeds', 'https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-3276/njGk4Aad1635401385-1772x1772.jpg', 'Available', '64.22', 'This is Sunflower Seeds'),
(10, 'Seeds', 'Vegetables and Herbs', 'Coriander Seeds', 'https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-1018/eL1RZXvH1601001526-851x851.jpg', 'Not Available', NULL, 'This is Coriander Seeds'),
(11, 'Plants', 'Orchids', 'Orchid Cattleya', 'https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-3473/gsD28dSL1625979265-1689x2251.jpg', 'Available', '76.17', 'This is Orchid Cattleya'),
(12, 'Plants', 'Succulents', 'Ornatum Star Cactus', 'https://gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-2717/gN7fiQZ01599554008-810x1080.jpg', 'Not Available', NULL, 'This is Ornatum Star Cactus'),
(13, 'Plants', 'Herbs', 'Aloe Vera', 'https://www.gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-1267/cKV5UqyK1572428837-520x525.jpg', 'Available', '106.13', 'This is Aloe Vera'),
(14, 'Plants', 'Fruits', 'Avocado', 'https://gardenmart4u.com/image/gardenmart4u/image/cache/data/all_product_images/product-1405/koSobKdW1574127623-400x318.jpg', 'Available', '101.93', 'This is Avocado'),
(15, 'Plants', 'Seedlings', 'Foxtail Lily', 'https://garden-tags-live.s3-accelerate.amazonaws.com/69036_treefrog44_1615989575222_1080.jpeg', 'Available', '68.79', 'This is Foxtail Lily');

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
(5, '2022-10-13 06:22:54', '<h1>This is version 5</h1><p>You are now viewing version 5</p>', 'Modified to Version 5');

-- --------------------------------------------------------

--
-- Table structure for table `notification_history`
--

CREATE TABLE `notification_history` (
  `notification_id` int(10) UNSIGNED NOT NULL,
  `notification_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notification_type` enum('Booking Confirmation','Booking Update','Booking Cancellation','Booking Reminder','Account Activation','Account Deactivation','Account Reset','Account Delete') NOT NULL,
  `notification_content` text NOT NULL,
  `notification_sent_email` varchar(254) DEFAULT NULL,
  `notification_sent_phone` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`notification_sent_phone`)),
  `notification_status` enum('Unread','Read') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `email_address` varchar(254) NOT NULL,
  `password` char(60) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_role` enum('Super Admin','Admin','User') NOT NULL,
  `account_created_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `account_status` enum('Unactivated','Activated','Pending Reset','Pending Delete','Deleted') NOT NULL,
  `account_token` char(22) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL,
  `notification_token` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`notification_token`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`email_address`, `password`, `user_id`, `user_role`, `account_created_timestamp`, `account_status`, `account_token`, `token_expiry`, `notification_token`) VALUES
('Clifford.Bautista@testemail.cf', '$2b$12$RFRDdwi3kdWJXPLqlWndJ.f4x3ZTSeKsPJnouyVvoM9QVn5B30QPC', 11, 'User', '2022-10-13 06:22:53', 'Deleted', NULL, NULL, NULL),
('David.Woody@testemail.cf', '$2b$12$qsD1XxGMPHcdse9Pzpbf..uU54R1alTGPlG60hYlxDfB45BG90xUy', 12, 'User', '2022-10-13 06:22:53', 'Deleted', NULL, NULL, NULL),
('Deanna.Flickinger@testemail.cf', '$2b$12$jKQ8AjJhT.Uv7oqA2UMEHO6UT9hhEYjiOWyLBSl2FX/td8AnGIFwO', 7, 'User', '2022-10-13 06:22:53', 'Unactivated', '8GS57YyftO0IbxTRLbbJCA', '2022-10-12 22:01:10', NULL),
('Debbie.Pierce@testemail.cf', '$2b$12$YYoZLCOXgVePMzhUKEhRuO1uRcjZejerqHWlu4LqQdh13FItWVONC', 10, 'User', '2022-10-13 06:22:53', 'Activated', NULL, NULL, NULL),
('Harmony.Walker@testemail.cf', '$2b$12$kSujs7C0uaEF8nHaXa4C5e8rV35Tv1VV6dPMT7ieZ4ZS6YI1G2Hqy', 16, 'User', '2022-10-13 06:22:53', 'Unactivated', 'lsUBF//9VcA9FNCgQ/5mVs', '2022-10-12 22:01:12', NULL),
('Helen.Fleming@testemail.cf', '$2b$12$eq/z3SbcHgJORsNYwGgKHOJGAvZe3oRbpIWK.sguQJwX3ge/OYqsu', 1, 'Admin', '2022-10-13 06:22:53', 'Activated', NULL, NULL, NULL),
('Helen.Low@testemail.cf', '$2b$12$V1grZlwIZ08vzlJr9NsveeaTgtXHVuL2TY5b7bYecd5.PvUOEjwGi', 2, 'Admin', '2022-10-13 06:22:53', 'Activated', NULL, NULL, NULL),
('Jack.Hull@testemail.cf', '$2b$12$KneOGDK4vQxfywJ2leQXs.GExizqFFDsH4uNzXFTkJC7ewheG9GaC', 8, 'User', '2022-10-13 06:22:53', 'Unactivated', 'DCRVuCFOCkECakP1OFYvHo', '2022-10-12 22:01:10', NULL),
('Jill.Poirier@testemail.cf', '$2b$12$b/7VlvBjnMzvVVv3I6r01eVm0B8ioZ250VGcxo3G0Ifi/Qy1pkHUW', 14, 'User', '2022-10-13 06:22:53', 'Activated', NULL, NULL, NULL),
('Marilyn.Goodale@testemail.cf', '$2b$12$xASN1JJXD2GB0dfkKoavC.U8i8w5Dy1YHGkbPY.TAbrVJu1bbsIT.', 19, 'User', '2022-10-13 06:22:53', 'Pending Reset', 'XRdzWGmeH3Qf+idaUWF8Q0', '2022-10-12 22:01:12', NULL),
('Mary.Nichols@testemail.cf', '$2b$12$eBMwCMG1oj/81zd5/iW97.nPYKARxdTZiWrOe/qxs7w1G9qVV3.1u', 18, 'User', '2022-10-13 06:22:53', 'Unactivated', 'neh0D/GusBwcQHsMuUPSgo', '2022-10-12 22:01:12', NULL),
('Monika.Hutson@testemail.cf', '$2b$12$pjDTg3T5hDcJe2zjS1c7J.dU7uPJKuVZhf5/X721tl3Lt191Sv4ty', 17, 'User', '2022-10-13 06:22:53', 'Deleted', NULL, NULL, NULL),
('Morris.Hannah@testemail.cf', '$2b$12$1jjvZ6MQGvSWu3EVKdKUy.Bn5HAfLcipnXYxCO/lNRxW15jfBXAfK', 5, 'User', '2022-10-13 06:22:53', 'Pending Reset', 'LmTZxkP1GYQSVAV7sa13hU', '2022-10-12 22:01:09', NULL),
('Nola.Lee@testemail.cf', '$2b$12$9P381HSk/S571b3UjUA1ZOYOlscU0MULME2G45ydWKMD9ukiP2jn.', 15, 'User', '2022-10-13 06:22:53', 'Activated', NULL, NULL, NULL),
('Rebecca.Todd@testemail.cf', '$2b$12$kMlwI536WNJvLHtoHdNwcuVx/fdwYVlUCSv7B/8MZThSalOOm4FhK', 3, 'Admin', '2022-10-13 06:22:53', 'Activated', NULL, NULL, NULL),
('Rita.Kenyon@testemail.cf', '$2b$12$j3/67RvZpuw7Rcu0PV.ln.pvHysWZyvugw8eWmQuGjqHfe4wWzkH6', 9, 'User', '2022-10-13 06:22:53', 'Activated', NULL, NULL, NULL),
('Robert.Abud@testemail.cf', '$2b$12$7XOurhbB/ufZrbBS.cP1QexHJkeLInsESmnsfgvKikMUGpgO2jWT.', 13, 'User', '2022-10-13 06:22:53', 'Deleted', NULL, NULL, NULL),
('Sarah.Zwilling@testemail.cf', '$2b$12$t61rb1nnA8uCjpzzWbVmp.ipyVq6cqU/m7DAzUG9GzUt79.HIj7Mi', 4, 'User', '2022-10-13 06:22:53', 'Unactivated', 'OsICpCuWacIEjJPrBjBg/g', '2022-10-12 22:01:09', NULL),
('test2signup@testemail.cf', '$2y$10$EqfU6Mm8eZvah.SJORGOFOwaBWLMmjGQh71FY3tO/1nQavNDAujfa', 32, 'User', '2022-10-20 10:13:05', 'Activated', '', '0000-00-00 00:00:00', NULL),
('test3signup@testemail.cf', '$2y$10$T2jHgDFlVghNTY9lSQ5VYep70thuK.3beK0k134Z2oaEKYI0hVYwW', 33, 'User', '2022-10-20 05:43:29', 'Unactivated', '52f80c08c5dd4998f99f15', '2022-10-20 07:48:29', NULL),
('testfive@testemail.cf', '$2y$10$/STPqcFDXDCchmdCCFFMaeUVO5Ygj86Acvf3IyzTJR4mngzcnvQRm', 35, 'User', '2022-10-20 13:03:15', 'Unactivated', '434a982ea68b680cb1dab2', '2022-10-20 15:08:15', NULL),
('testfour@testemail.cf', '$2y$10$JZLramxIJDvLsCFasoSWCuGezE9wTIks6pz5SVsZ61BXewVtkYtx2', 34, 'User', '2022-10-23 16:05:18', 'Activated', NULL, NULL, NULL),
('testlast@testemail.cf', '$2y$10$VeoGc0KaloHT86IwYPOBBez9aVwEPx4/uauDm9YbLid4cSwV1IVuu', 36, 'User', '2022-10-20 15:19:54', 'Activated', '', '0000-00-00 00:00:00', NULL),
('testsignup@testmail.cf', '$2y$10$MQLsKn1ljSEtg51O4Di6wOKfWx2Mof.HOYWB6gNO7q.vpsVuM/1Ai', 31, 'User', '2022-10-20 05:13:04', 'Unactivated', '2b0c9e2ee2fd3cfc9e2d99', '2022-10-20 07:18:04', NULL),
('William.Arruda@testemail.cf', '$2b$12$ardBsB0kb0T4xY/ZRocsGOt35JelGoFY8KWbQSsjkVVTbbNvu6qv2', 20, 'User', '2022-10-13 06:22:53', 'Unactivated', 'n63RAjowJxMrpB8cA85Yp0', '2022-10-12 22:01:12', NULL),
('William.Deacy@testemail.cf', '$2b$12$2h8fjVmOJvWBse/rd4U8/O0fMx09arSofMDGwUy17vjNxO0QD5s6q', 6, 'User', '2022-10-13 06:22:53', 'Activated', NULL, NULL, NULL);

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
(36, 'testlast@testemail.cf', '0123456789', 'Test Last', 'Male', NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `homepage_info`
--
ALTER TABLE `homepage_info`
  ADD PRIMARY KEY (`version_id`);

--
-- Indexes for table `notification_history`
--
ALTER TABLE `notification_history`
  ADD PRIMARY KEY (`notification_id`);

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
-- AUTO_INCREMENT for table `content_info`
--
ALTER TABLE `content_info`
  MODIFY `content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `encyclopedia_items`
--
ALTER TABLE `encyclopedia_items`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `homepage_info`
--
ALTER TABLE `homepage_info`
  MODIFY `version_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification_history`
--
ALTER TABLE `notification_history`
  MODIFY `notification_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD CONSTRAINT `booking_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD CONSTRAINT `user_credentials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
