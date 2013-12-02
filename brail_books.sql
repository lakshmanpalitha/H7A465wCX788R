-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2013 at 07:44 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brail_books`
--
CREATE DATABASE IF NOT EXISTS `brail_books` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `brail_books`;

-- --------------------------------------------------------

--
-- Table structure for table `book_by_users`
--

CREATE TABLE IF NOT EXISTS `book_by_users` (
  `primary_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`primary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `book_read_shedule`
--

CREATE TABLE IF NOT EXISTS `book_read_shedule` (
  `user_id` int(11) NOT NULL,
  `shedule_starting` datetime NOT NULL,
  `shedule_ending` datetime NOT NULL,
  `active_shedule` int(1) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_shedule_settings`
--

CREATE TABLE IF NOT EXISTS `book_shedule_settings` (
  `book_for_round` int(11) NOT NULL,
  `days_for_round` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_store`
--

CREATE TABLE IF NOT EXISTS `book_store` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(250) NOT NULL,
  `book_name_or_publication` varchar(250) NOT NULL,
  `author_or_translater` varchar(250) NOT NULL,
  `original_publisher` varchar(250) NOT NULL,
  `digital_talking_book_publisher` varchar(250) NOT NULL,
  `book_description` varchar(1500) NOT NULL,
  `cover_image_path` varchar(250) NOT NULL,
  `zip_upload_path` varchar(250) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `upload_date` datetime NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `book_store`
--

INSERT INTO `book_store` (`book_id`, `isbn`, `book_name_or_publication`, `author_or_translater`, `original_publisher`, `digital_talking_book_publisher`, `book_description`, `cover_image_path`, `zip_upload_path`, `status`, `upload_date`) VALUES
(11, 'BC345-GH234_345', 'Do Androids Dream of Electric Sheep?', 'Philip K. Dick', 'Philip K. Dick', 'Philip K. Dick', 'A panda walks into a cafÃ©. He orders a sandwich, eats it, then draws a gun and fires two shots in the air.\r\n"Why?" asks the confused waiter, as the panda makes towards the exit. The panda produces a badly punctuated wildlife manual and tosses it over his shoulder.\r\n"I''m a panda," he says at the door. "Look it up."', '18823_cover_2ndedition.jpg', 'StudentHandBook_2013_0.zip', 1, '2013-11-24 19:42:56'),
(13, 'DF345-S34567-F234g', 'Midnight in the Garden of Good and Evil', 'John Berendt', 'Philip K. Dick', 'Philip K. Dick', 'Shots rang out in Savannah''s grandest mansion in the misty,early morning hours of May 2, 1981.Was it murder or self-defense?For nearly a decade, the shooting and its aftermath reverberated throughout this hauntingly beautiful city of moss-hung oaks and shaded squares.John Berendt''s sharply observed, suspenseful, and witty narrative reads like a thoroughly engrossing novel', '51907_index.jpg', 'StudentHandBook_2013_0.zip', 1, '2013-11-24 19:47:42'),
(14, 'BC345-GH234_345', 'When You Are Engulfed in Flames ', 'David Sedaris', 'Philip K. Dick', 'David Sedaris', '\r\nWhen You Are Engulfed in Flames\r\nRate this book\r\n1 of 5 stars2 of 5 stars3 of 5 stars4 of 5 stars5 of 5 stars\r\nWhen You Are Engulfed in Flames\r\nby David Sedaris\r\n3.99 of 5 stars 3.99  Â·  rating details  Â·  102,434 ratings  Â·  7,720 reviews\r\n"David Sedaris''s ability to transform the mortification of everyday life into wildly entertaining art," (The Christian Science Monitor) is elevated to wilder and more entertaining heights than ever in this remarkable new book.\r\nTrying to make coffee when the water is shut off, David considers using the water in a vase of flowers and his chain of associations takes him ', '81513_indedddddx.jpg', 'StudentHandBook_2013_0.zip', 1, '2013-11-24 19:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `nic_number` varchar(10) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `telephone_number` int(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `subscription` int(5) NOT NULL,
  `last_subscription_date` datetime NOT NULL,
  `last_login_date` datetime NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'I',
  `confirm` varchar(1) NOT NULL DEFAULT 'N',
  `register_date` datetime NOT NULL,
  `level` varchar(1) NOT NULL DEFAULT 'U',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `nic_number`, `email_address`, `telephone_number`, `password`, `address`, `subscription`, `last_subscription_date`, `last_login_date`, `status`, `confirm`, `register_date`, `level`) VALUES
(1, 'lakmal', 'wimaladasa', '881240238', 'lakmal@ddd.com', 13232323, '5B45IfU0x1iNai9NHncsqz6O1jvvqCni94LfbPumIXA', 'werewrwer', 6, '2013-11-24 17:15:23', '2013-11-28 18:05:31', 'A', 'Y', '0000-00-00 00:00:00', 'U'),
(2, 'sdsd', 'sdsds', '8812345678', 'sdsd@sdfdfdf.com', 2323232, '5B45IfU0x1iNai9NHncsqz6O1jvvqCni94LfbPumIXA', 'fdfdfdfdfd', 12, '2013-11-24 17:15:31', '2013-11-28 18:05:31', 'A', 'Y', '0000-00-00 00:00:00', 'U'),
(3, 'dadasd', 'asdasdsa', '323423424', 'sdfsdfd@ssdfdf.com', 2147483647, '5B45IfU0x1iNai9NHncsqz6O1jvvqCni94LfbPumIXA', 'sdsadsadas', 12, '2013-11-24 17:15:38', '2013-11-28 18:05:31', 'A', 'Y', '0000-00-00 00:00:00', 'U'),
(4, 'gdgdfgdf', 'dfgfdgfd', '434322', 'ffgfgdfg@dfdfdf.com', 2147483647, 'f1TAK9d3ty37HaVZRCA93B9tT6iNbtE6UtEsR2ln7ow', 'dddasdaas', 6, '2013-11-24 17:16:58', '2013-11-28 18:05:31', 'I', 'Y', '0000-00-00 00:00:00', 'U'),
(5, 'dggfdg', 'gdfgdfg', '343242342', 'ffgfgdfg@dfdfdf.com', 23432434, 'AKBsHY9_qy7HTA-OAR74Ubl8dV8oiwtZZv1mkvQnMfA', 'dfdfdsfsdfdsfds', 3, '2013-11-24 17:13:12', '2013-11-28 18:05:31', 'A', 'Y', '0000-00-00 00:00:00', 'U'),
(6, 'sadsadsa', 'xxzxzxZ', 'zXzXZxZ', 'xzxzx@sdsdsdsd.com', 23312321, '5B45IfU0x1iNai9NHncsqz6O1jvvqCni94LfbPumIXA', 'dfdfsddsfsdf', 12, '2013-11-24 17:26:38', '2013-11-28 18:05:31', 'I', 'Y', '0000-00-00 00:00:00', 'U'),
(7, 'dsada', 'adasd', '3432423433', 'ca@dsdsdsds.com', 2312312, 'ezoYcAlb11UMA1t1Ctx2KUZ9x8fMwDUO7THLbcpdjp0', 'ddfsfsdfsdfds', 12, '2013-11-24 17:39:27', '2013-11-28 18:05:31', 'I', 'Y', '0000-00-00 00:00:00', 'U'),
(8, 'lakmal', 'wimaladasa', '881240238', 'lakmal@123.com', 123456789, '2C-lJqFDlciFhui6rThv6VX3kXPpa5m4ioAVOXnhYuc', 'dfsdfsfsdf', 3, '2013-11-27 18:25:32', '2013-12-02 19:40:12', 'A', 'Y', '2013-11-24 18:19:54', 'U'),
(9, 'admin', 'admin', '881240238V', 'admin@123.com', 121212121, 'Yfq4wJwtJN2klvvoQz6eL9QEebaR-m6yQHe7ZdsJNkg', 'dwed', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I', 'N', '2013-12-02 18:55:55', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
