-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2010 at 02:12 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pmv`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_health_params`
--

CREATE TABLE `tbl_health_params` (
  `id` int(11) NOT NULL auto_increment,
  `param` varchar(200) NOT NULL,
  `is_mandatory` tinyint(1) NOT NULL,
  `is_multi_answered` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_health_params`
--

INSERT INTO `tbl_health_params` (`id`, `param`, `is_mandatory`, `is_multi_answered`, `created_at`, `updated_at`) VALUES
(1, 'On Vasopressors ', 1, 0, '2010-09-13 16:47:46', '2010-09-13 16:48:51'),
(2, 'Receiving hemodialysis', 1, 0, '2010-09-13 16:48:45', '2010-09-13 16:48:49'),
(3, 'Trauma', 1, 0, '2010-09-13 16:49:22', '2010-09-13 16:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_health_params_options`
--

CREATE TABLE `tbl_health_params_options` (
  `id` int(11) NOT NULL auto_increment,
  `health_param_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_health_params_options`
--

INSERT INTO `tbl_health_params_options` (`id`, `health_param_id`, `name`, `points`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yes', 1, '2010-09-13 16:53:56', '2010-09-13 16:53:58'),
(2, 1, 'No', 0, '2010-09-13 16:54:21', '2010-09-13 16:54:23'),
(3, 2, 'Yes', 1, '2010-09-13 16:54:43', '2010-09-13 16:54:46'),
(4, 2, 'No', 0, '2010-09-13 16:54:56', '2010-09-13 16:55:00'),
(5, 3, 'Yes', 1, '2010-09-17 18:55:07', '2010-09-17 18:55:09'),
(6, 3, 'No', 0, '2010-09-17 18:55:05', '2010-09-17 18:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_health_params`
--

CREATE TABLE `tbl_patient_health_params` (
  `id` int(11) NOT NULL auto_increment,
  `session_id` int(11) NOT NULL,
  `health_param_id` int(11) NOT NULL,
  `selected_health_param_option_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tbl_patient_health_params`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_sessions`
--

CREATE TABLE `tbl_patient_sessions` (
  `session_id` int(11) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `medical_record_no` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `platelets` varchar(200) NOT NULL,
  `survey_completed` tinyint(1) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1378454531 ;

--
-- Dumping data for table `tbl_patient_sessions`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_survey_data`
--

CREATE TABLE `tbl_patient_survey_data` (
  `id` int(11) NOT NULL auto_increment,
  `session_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `selected_option_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `tbl_patient_survey_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_options`
--

CREATE TABLE `tbl_survey_options` (
  `id` int(11) NOT NULL auto_increment,
  `question_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `points` int(11) NOT NULL,
  `break_required` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tbl_survey_options`
--

INSERT INTO `tbl_survey_options` (`id`, `question_id`, `name`, `points`, `break_required`, `created_at`, `updated_at`) VALUES
(1, 1, 'Low', 2, 0, '2010-09-13 17:13:41', '2010-09-13 17:13:43'),
(2, 1, 'Unsure', 0, 0, '2010-09-13 17:13:36', '2010-09-13 17:13:39'),
(3, 1, 'High', 0, 0, '2010-09-13 17:14:23', '2010-09-13 17:14:26'),
(4, 2, 'Yes', 0, 0, '2010-09-13 17:14:56', '2010-09-13 17:14:58'),
(5, 2, 'No', 0, 0, '2010-09-13 17:15:13', '2010-09-13 17:15:15'),
(6, 3, 'Yes', 0, 0, '2010-09-13 17:15:36', '2010-09-13 17:15:37'),
(7, 3, 'No', 0, 0, '2010-09-13 17:15:54', '2010-09-13 17:15:56'),
(8, 4, 'Do not continue life support', 3, 1, '2010-09-13 17:16:33', '2010-09-13 17:16:35'),
(9, 4, 'Life support is desired but not prolonged', 2, 1, '2010-09-13 17:17:45', '2010-09-13 17:17:47'),
(10, 4, 'Life support is desired indefinitely', 1, 1, '2010-09-13 17:18:43', '2010-09-13 17:18:45'),
(11, 4, 'Don''t know', 0, 1, '2010-09-13 17:24:36', '2010-09-13 17:24:38'),
(12, 5, 'Do not continue life support', 3, 1, '2010-09-13 17:25:10', '2010-09-13 17:25:12'),
(13, 5, 'Life support is desired but not prolonged', 2, 1, '2010-09-13 17:25:47', '2010-09-13 17:25:49'),
(14, 5, 'Life support is desired indefinitely', 1, 1, '2010-09-13 17:26:24', '2010-09-13 17:26:26'),
(15, 5, 'Don''t know', 0, 1, '2010-09-13 17:26:43', '2010-09-13 17:26:46'),
(16, 6, 'Do not continue life support', 3, 1, '2010-09-13 17:27:12', '2010-09-13 17:27:14'),
(17, 6, 'Life support is desired but not prolonged', 2, 1, '2010-09-13 17:27:44', '2010-09-13 17:27:46'),
(18, 6, 'Life support is desired indefinitely', 1, 1, '2010-09-13 17:27:53', '2010-09-13 17:27:55'),
(19, 6, 'Don''t know', 0, 1, '2010-09-13 17:28:33', '2010-09-13 17:28:35'),
(20, 7, 'I want to make all the decisions myself', 0, 1, '2010-09-13 17:29:06', '2010-09-13 17:29:08'),
(21, 7, 'I want to make decisions with my family or friends', 0, 1, '2010-09-13 17:29:26', '2010-09-13 17:29:28'),
(22, 7, 'I prefer the doctor to make the decision', 0, 1, '2010-09-13 17:29:30', '2010-09-13 17:29:32'),
(23, 7, 'I don''t know', 0, 1, '2010-09-13 17:29:54', '2010-09-13 17:29:57'),
(24, 8, 'Frustrated', 0, 1, '2010-09-13 17:29:59', '2010-09-13 17:30:02'),
(25, 8, 'Sad', 0, 1, '2010-09-13 17:30:23', '2010-09-13 17:30:25'),
(26, 8, 'Anxious', 0, 1, '2010-09-13 17:30:27', '2010-09-13 17:30:29'),
(27, 8, 'Scared', 0, 1, '2010-09-13 17:31:18', '2010-09-13 17:31:20'),
(28, 8, 'Numb', 0, 1, '2010-09-13 17:31:22', '2010-09-13 17:31:25'),
(29, 8, 'Overwhelmed', 0, 1, '2010-09-13 17:31:48', '2010-09-13 17:31:50'),
(30, 8, 'Unsupported', 0, 1, '2010-09-13 17:31:54', '2010-09-13 17:31:56'),
(31, 8, 'Uncomfortable', 0, 1, '2010-09-13 17:32:04', '2010-09-13 17:32:06'),
(32, 8, 'I am OK with it', 0, 1, '2010-09-13 17:32:10', '2010-09-13 17:32:12'),
(33, 9, 'None', 0, 1, '2010-09-13 17:32:44', '2010-09-13 17:32:46'),
(34, 9, 'What is the prognosis?', 0, 1, '2010-09-13 17:32:39', '2010-09-13 17:32:41'),
(35, 9, 'What treatments are being given?', 0, 1, '2010-09-13 17:33:13', '2010-09-13 17:33:16'),
(36, 9, 'Can my presence change the outcome?', 0, 1, '2010-09-23 21:29:41', '2010-09-23 21:29:42'),
(37, 9, 'How can my choice fit with my religious beliefs?', 0, 1, '2010-09-23 21:30:40', '2010-09-23 21:30:42'),
(38, 9, 'My loved one has been through this before--does that change the prognosis?', 0, 1, '2010-09-23 21:32:14', '2010-09-23 21:32:17'),
(39, 9, 'My loved one was healthy before this--does that change the prognosis?', 0, 1, '2010-09-23 21:32:25', '2010-09-23 21:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_questions`
--

CREATE TABLE `tbl_survey_questions` (
  `id` int(11) NOT NULL auto_increment,
  `question` text NOT NULL,
  `is_mandatory` tinyint(1) NOT NULL,
  `is_multi_answered` tinyint(1) NOT NULL,
  `questions_group_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_survey_questions`
--

INSERT INTO `tbl_survey_questions` (`id`, `question`, `is_mandatory`, `is_multi_answered`, `questions_group_id`, `created_at`, `updated_at`) VALUES
(1, 'According to the doctor, what is your loved one''s chance of getting better and having a good quality of life?', 1, 0, 1, '2010-09-13 16:58:09', '2010-09-13 16:58:12'),
(2, 'Do you feel that you understand what your loved one''s life would be like based on the different treatment goal decisions?', 1, 0, 1, '2010-09-13 16:58:22', '2010-09-13 16:58:25'),
(3, 'Do you understand the pro''s and con''s of the different choices?', 1, 0, 1, '2010-09-13 16:58:43', '2010-09-13 16:58:45'),
(4, 'What are your loved one''s wishes for medical treatments when illness is severe or possibly incurable?', 1, 0, 2, '2010-09-13 16:58:47', '2010-09-13 16:58:50'),
(5, 'If your loved one could look at the choices right now, what do you think they would choose?', 1, 0, 2, '2010-09-13 16:59:46', '2010-09-13 16:59:48'),
(6, 'What do you feel is in your loved one''s best interest right now?', 1, 0, 2, '2010-09-13 16:59:51', '2010-09-13 16:59:53'),
(7, 'What type of role are you most comfortable with in this decision about goals of treatment?', 1, 1, 3, '2010-09-13 17:00:19', '2010-09-13 17:00:21'),
(8, 'How is this choice making you feel?', 1, 1, 4, '2010-09-13 17:00:29', '2010-09-13 17:00:31'),
(9, 'What questions do you need answered before you can decide?', 1, 1, 5, '2010-09-23 21:24:27', '2010-09-23 21:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_question_groups`
--

CREATE TABLE `tbl_survey_question_groups` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_survey_question_groups`
--

INSERT INTO `tbl_survey_question_groups` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Your loved one who is receiving mechanical ventilation:', '2010-09-13 16:56:46', '2010-09-13 16:56:49'),
(2, 'What you think your loved one wants?', '2010-09-16 12:49:14', '2010-09-16 12:49:16'),
(3, 'What type of role are you most comfortable with in this decision about goals of treatment?', '2010-09-16 12:49:18', '2010-09-16 12:49:20'),
(4, 'How is this choice making you feel?', '2010-09-16 12:49:46', '2010-09-16 12:49:48'),
(5, 'What questions do you need answered before you can decide?', '2010-09-23 21:22:47', '2010-09-23 21:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passwords`
--

CREATE TABLE IF NOT EXISTS `tbl_passwords` (
  `user_level` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_level`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_passwords`
--

INSERT INTO `tbl_passwords` (`user_level`, `password`) VALUES
('Admin', 'cfe3476f784d0f55b2005b41b7e6bf35acc05f51'),
('Doctor', '1bc36a43ce94d5b010ad154d35b1699bf543efb4');