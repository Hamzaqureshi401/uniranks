-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 10:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniranksempty`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `position` varchar(191) DEFAULT NULL,
  `country_id` varchar(191) DEFAULT NULL,
  `city_id` varchar(191) DEFAULT NULL,
  `university_id` varchar(191) DEFAULT NULL,
  `is_associated` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accreditation_agencies`
--

CREATE TABLE `accreditation_agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `rectangle_logo_path` varchar(191) DEFAULT NULL,
  `square_logo_path` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accreditation_agency_types`
--

CREATE TABLE `accreditation_agency_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `administrative_regions`
--

CREATE TABLE `administrative_regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `local_name` varchar(191) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `sasa` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_fee_types`
--

CREATE TABLE `admission_fee_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_person_name` varchar(191) DEFAULT NULL,
  `dial_code` varchar(191) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `skype_phone_number` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(191) DEFAULT NULL,
  `wechat_number` varchar(191) DEFAULT NULL,
  `telegram_number` varchar(191) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `rectangle_logo_path` varchar(191) DEFAULT NULL,
  `square_logo_path` varchar(191) DEFAULT NULL,
  `document_path` varchar(191) DEFAULT NULL,
  `contact_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `how_heard_about_us` varchar(191) DEFAULT NULL,
  `year_start_recruiting` varchar(191) DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT 3,
  `approval_status` smallint(6) DEFAULT 1 COMMENT '1->approved',
  `registered_by_user` smallint(6) DEFAULT 0 COMMENT '1->yes',
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `credit` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `ur_credit` double(8,2) NOT NULL DEFAULT 0.00,
  `event_credit` double(8,2) NOT NULL DEFAULT 0.00,
  `admissions_credit` double(8,2) NOT NULL DEFAULT 0.00,
  `events_package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_package_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_contact_numbers`
--

CREATE TABLE `agent_contact_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `dial_code` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) NOT NULL,
  `ext` varchar(191) NOT NULL,
  `type` smallint(6) DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_domains`
--

CREATE TABLE `agent_domains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `domain_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `url` varchar(191) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_event_credit_transactions`
--

CREATE TABLE `agent_event_credit_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_name` text DEFAULT NULL,
  `credit_out` int(11) NOT NULL,
  `by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_front_banners`
--

CREATE TABLE `agent_front_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` text NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json date: {"en":"...","ar":"..."}',
  `status` smallint(6) NOT NULL DEFAULT 1 COMMENT '0->Disabled 1->Enabled',
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_proving_services`
--

CREATE TABLE `agent_proving_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `agent_service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_questions`
--

CREATE TABLE `agent_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_question_answers`
--

CREATE TABLE `agent_question_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_quick_views`
--

CREATE TABLE `agent_quick_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `free_of_charges` smallint(6) DEFAULT NULL,
  `requirements_support` smallint(6) DEFAULT NULL,
  `application_submission` smallint(6) DEFAULT NULL,
  `application_follow_up` smallint(6) DEFAULT NULL,
  `education_counselling` smallint(6) DEFAULT NULL,
  `free_online_assessment` smallint(6) DEFAULT NULL,
  `career_counselling` smallint(6) DEFAULT NULL,
  `language_coaching` smallint(6) DEFAULT NULL,
  `scholarship_support` smallint(6) DEFAULT NULL,
  `student_visa_processing` smallint(6) DEFAULT NULL,
  `pre_departure_support` smallint(6) DEFAULT NULL,
  `on_arrival_support` smallint(6) DEFAULT NULL,
  `accommodation_support` smallint(6) DEFAULT NULL,
  `course_change` smallint(6) DEFAULT NULL,
  `college_change` smallint(6) DEFAULT NULL,
  `hostel_change` smallint(6) DEFAULT NULL,
  `professional_year_program` smallint(6) DEFAULT NULL,
  `internship_support` smallint(6) DEFAULT NULL,
  `work_while_studying_support` smallint(6) DEFAULT NULL,
  `since_year` smallint(6) DEFAULT NULL,
  `no_offices` smallint(6) DEFAULT NULL COMMENT 'Operate from number of offices',
  `in_no_countries` smallint(6) DEFAULT NULL COMMENT 'In Number of countries',
  `no_employees` smallint(6) DEFAULT NULL COMMENT 'By Number of employees',
  `no_languages` smallint(6) DEFAULT NULL COMMENT 'Speak Number of languages',
  `no_students` smallint(6) DEFAULT NULL COMMENT 'Helped Number of students',
  `no_universities` smallint(6) DEFAULT NULL COMMENT 'more then number of universities',
  `across_no_countries` smallint(6) DEFAULT NULL COMMENT 'across In Number of countries',
  `no_courses` smallint(6) DEFAULT NULL COMMENT 'Gain entry into  Number of courses',
  `update_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_repositories_transactions`
--

CREATE TABLE `agent_repositories_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `avg_ur_cost` double(8,2) DEFAULT NULL,
  `quantity_purchased` double(8,2) NOT NULL,
  `ur_credit_out` double(8,2) DEFAULT 0.00,
  `ur_credit_in` double(8,2) DEFAULT 0.00,
  `by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_reviews`
--

CREATE TABLE `agent_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `review_point` double(8,2) NOT NULL DEFAULT 0.00,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_review_comments`
--

CREATE TABLE `agent_review_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_review_likes`
--

CREATE TABLE `agent_review_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_services`
--

CREATE TABLE `agent_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_social_media_links`
--

CREATE TABLE `agent_social_media_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `uniranks` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `whatsapp` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `dropbox` text DEFAULT NULL,
  `snapchat` text DEFAULT NULL,
  `behance` text DEFAULT NULL,
  `dribble` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `vimeo` text DEFAULT NULL,
  `skype` text DEFAULT NULL,
  `google` text DEFAULT NULL,
  `updated_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_student_leads`
--

CREATE TABLE `agent_student_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `add_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lead_source_id` bigint(20) UNSIGNED DEFAULT NULL,
  `archived` smallint(6) NOT NULL DEFAULT 0,
  `expo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `number_of_times_visited` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_universities`
--

CREATE TABLE `agent_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `processed_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `apply_date` datetime DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_requirements`
--

CREATE TABLE `application_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `required_upload` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_requirement_types`
--

CREATE TABLE `application_requirement_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `area_units`
--

CREATE TABLE `area_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `banner_url` text DEFAULT NULL,
  `thumbnail_url` text DEFAULT NULL,
  `url` text DEFAULT NULL COMMENT 'url from joomla site',
  `short_description` text DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `average_city_weather`
--

CREATE TABLE `average_city_weather` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `city_image` varchar(255) DEFAULT NULL,
  `min_value` varchar(255) DEFAULT NULL,
  `max_value` varchar(255) DEFAULT NULL,
  `icon_description` varchar(255) DEFAULT NULL,
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `icon_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `average_living_costs`
--

CREATE TABLE `average_living_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `city_image` varchar(255) DEFAULT NULL,
  `min_value` varchar(255) DEFAULT NULL,
  `max_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `account_number` varchar(191) NOT NULL,
  `account_ibn` varchar(191) DEFAULT NULL,
  `ach_wire_routing_number` varchar(191) DEFAULT NULL,
  `swift_code` varchar(191) DEFAULT NULL,
  `account_type` varchar(191) DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `bank_address` text DEFAULT NULL,
  `bank_code` varchar(191) DEFAULT NULL,
  `country_name` varchar(191) DEFAULT NULL,
  `city_name` varchar(191) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `institute_number` varchar(191) DEFAULT NULL,
  `transit_number` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_representatives`
--

CREATE TABLE `booking_representatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `shift_start` time DEFAULT NULL,
  `shift_end` time DEFAULT NULL,
  `week_days` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_students`
--

CREATE TABLE `booking_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `representative_id` bigint(20) UNSIGNED DEFAULT NULL,
  `session_start` datetime DEFAULT NULL,
  `session_end` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booths`
--

CREATE TABLE `booths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schooo_id` bigint(20) UNSIGNED NOT NULL,
  `layout_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `composite` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `ready` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booths_visits`
--

CREATE TABLE `booths_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fair_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booth_graphics`
--

CREATE TABLE `booth_graphics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `banner1` varchar(191) DEFAULT NULL,
  `banner2` varchar(191) DEFAULT NULL,
  `banner3` varchar(191) DEFAULT NULL,
  `banner4` varchar(191) DEFAULT NULL,
  `banner5` varchar(191) DEFAULT NULL,
  `banner6` varchar(191) DEFAULT NULL,
  `banner7` varchar(191) DEFAULT NULL,
  `banner8` varchar(191) DEFAULT NULL,
  `banner9` varchar(191) DEFAULT NULL,
  `tvscreen` varchar(191) DEFAULT NULL,
  `tvsplash` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booth_materials`
--

CREATE TABLE `booth_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `file_type` bigint(20) UNSIGNED DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booth_menus`
--

CREATE TABLE `booth_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_channels`
--

CREATE TABLE `chat_channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `representative_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sid` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_conversations`
--

CREATE TABLE `chat_conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user` bigint(20) UNSIGNED NOT NULL,
  `to_user` bigint(20) UNSIGNED NOT NULL,
  `status` smallint(6) DEFAULT 0 COMMENT 'unread, read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_conversation_messages`
--

CREATE TABLE `chat_conversation_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_conversation_id` bigint(20) UNSIGNED NOT NULL,
  `chat_conversation_message_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'to group files attached to a message',
  `message` text DEFAULT NULL,
  `file_path` varchar(191) DEFAULT NULL,
  `reply_to_message` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'for reply to a specific message',
  `status` smallint(6) NOT NULL DEFAULT 0 COMMENT 'unread, read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zone_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `local_name` varchar(255) DEFAULT NULL,
  `administrative_region` varchar(255) DEFAULT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(191) DEFAULT NULL,
  `color_code` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `committee_accounts`
--

CREATE TABLE `committee_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employed_at` varchar(191) DEFAULT NULL,
  `why_fit_for_voting` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `linkedin_id` varchar(191) DEFAULT NULL,
  `social_media_link` varchar(191) DEFAULT NULL,
  `position` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `headline` varchar(191) DEFAULT NULL,
  `job_description` text DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `profile_status` smallint(6) DEFAULT 1,
  `profile_completed_at` timestamp NULL DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `committee_ranking_factors`
--

CREATE TABLE `committee_ranking_factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `serial_number` int(10) UNSIGNED DEFAULT 0,
  `weight` double DEFAULT 0 COMMENT 'Percentage(%)',
  `high_is_low` int(11) DEFAULT 0 COMMENT '0=>No,1=>Yes',
  `main_factor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `committee_ranking_factor_votes`
--

CREATE TABLE `committee_ranking_factor_votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `factor_id` bigint(20) UNSIGNED NOT NULL,
  `keep_it` int(11) DEFAULT NULL COMMENT '1,true=>Yes,"0,false"=>No',
  `current_wight_is_oky` int(11) DEFAULT NULL COMMENT '1,true=>Yes,"0,false"=>No',
  `suggested_weight` double(8,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_account_visibilities`
--

CREATE TABLE `community_account_visibilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `connections` tinyint(4) DEFAULT 1 COMMENT 'allow_connections_to_see_list',
  `followings` tinyint(4) DEFAULT 1 COMMENT 'allow_members_to_see_followings',
  `interests` tinyint(4) DEFAULT 1 COMMENT 'show_interest_with_content',
  `visibility_to_apps` tinyint(4) DEFAULT 1 COMMENT 'information_visible_3rd_party_apps',
  `discover_by_email` tinyint(4) DEFAULT 1 COMMENT 'profile discovery through email',
  `discover_by_phone` tinyint(4) DEFAULT 1 COMMENT 'profile discovery through phone',
  `active_status` tinyint(4) DEFAULT 1 COMMENT 'who can see your active status',
  `profile_updates` tinyint(4) DEFAULT 1 COMMENT 'share profile updates with connections',
  `can_mention` tinyint(4) DEFAULT 1 COMMENT 'others can mention ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `moderator_id` int(11) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_methods`
--

CREATE TABLE `contact_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE `continents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `map` varchar(191) DEFAULT NULL,
  `translated_name` varchar(191) DEFAULT NULL COMMENT '{"en":"...","ar":..}',
  `description` text DEFAULT NULL COMMENT 'description in translated format.i.e {"en":"...","ar":..}',
  `thumbnail_path` text DEFAULT NULL,
  `banner_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user` bigint(20) UNSIGNED NOT NULL,
  `to_user` bigint(20) UNSIGNED NOT NULL,
  `status` smallint(6) DEFAULT 0 COMMENT 'unread, read',
  `inquiry` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversation_messages`
--

CREATE TABLE `conversation_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `conversation_message_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'to group files attached to a message',
  `message` text DEFAULT NULL,
  `file_path` varchar(191) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0 COMMENT 'unread, read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `councilor_bookings`
--

CREATE TABLE `councilor_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Agent/Councilor ID',
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Student ID',
  `booking_date` date NOT NULL,
  `booking_time` date NOT NULL,
  `subject` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `meeting_link` text DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `remarks` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counselor_events`
--

CREATE TABLE `counselor_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `counselor_event_type_id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fee` varchar(191) DEFAULT NULL,
  `start_datetime` timestamp NULL DEFAULT NULL,
  `end_datetime` timestamp NULL DEFAULT NULL,
  `source` varchar(191) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counselor_event_types`
--

CREATE TABLE `counselor_event_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `continent_id_1` int(11) DEFAULT NULL,
  `continent_id_2` int(11) DEFAULT NULL,
  `continent_id_3` int(11) DEFAULT NULL,
  `subcontinent_id_1` int(11) DEFAULT NULL,
  `subcontinent_id_2` int(11) DEFAULT NULL,
  `subcontinent_id_3` int(11) DEFAULT NULL,
  `country_code` varchar(191) DEFAULT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `short_name` varchar(191) DEFAULT NULL,
  `local_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `language` varchar(191) DEFAULT 'en',
  `description` text DEFAULT NULL COMMENT 'description in translated format.i.e {"en":"...","ar":..}',
  `thumbnail_path` text DEFAULT NULL,
  `banner_path` text DEFAULT NULL,
  `round_flag_path` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country_currencies`
--

CREATE TABLE `country_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `is_main` smallint(6) DEFAULT NULL COMMENT '1->yes,2->no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country_directorates`
--

CREATE TABLE `country_directorates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `short_name` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country_directorate_regions`
--

CREATE TABLE `country_directorate_regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_directorate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `short_name` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country_languages`
--

CREATE TABLE `country_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country_recognised_universities`
--

CREATE TABLE `country_recognised_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country_states`
--

CREATE TABLE `country_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `local_name` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country_state_zones`
--

CREATE TABLE `country_state_zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `short_name` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_durations`
--

CREATE TABLE `course_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `conversion_rate` double(8,2) DEFAULT NULL COMMENT 'usd to local currency',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json date: {"en":"...","ar":"..."}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `curriculums`
--

CREATE TABLE `curriculums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'translations in json',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_branches`
--

CREATE TABLE `curriculum_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `curriculum_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'translations in json',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `domain_types`
--

CREATE TABLE `domain_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_agencies`
--

CREATE TABLE `education_agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `agency_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agency_countries` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `campus` varchar(255) DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT NULL,
  `moderator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elite_packages`
--

CREATE TABLE `elite_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `full_image` text DEFAULT NULL,
  `duration` int(11) DEFAULT NULL COMMENT 'In Months',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elite_universities`
--

CREATE TABLE `elite_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `elite_package_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `start_from` datetime DEFAULT NULL,
  `valid_till` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `embassies`
--

CREATE TABLE `embassies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `embassy_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `campus` varchar(255) DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT NULL,
  `moderator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_types`
--

CREATE TABLE `employment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `short_description` varchar(191) DEFAULT NULL,
  `banner` varchar(191) DEFAULT NULL,
  `start_at` timestamp NULL DEFAULT NULL,
  `end_at` timestamp NULL DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_credit_transactions`
--

CREATE TABLE `event_credit_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_name` text DEFAULT NULL,
  `credit_out` int(11) NOT NULL DEFAULT 0,
  `credit_in` int(11) NOT NULL DEFAULT 0,
  `by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_packages`
--

CREATE TABLE `event_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `university_fair_schools_campus` int(11) DEFAULT 0,
  `international_virtual_events` int(11) DEFAULT 0,
  `career_talks_school_campus` int(11) DEFAULT 0,
  `work_shops_university_campus` int(11) DEFAULT 0,
  `open_days_university_campus` int(11) DEFAULT 0,
  `student_for_a_day_university_campus` int(11) DEFAULT 0,
  `compilation_university_campus` int(11) DEFAULT 0,
  `repositories_credit` int(11) DEFAULT 0,
  `schools_tours` int(11) DEFAULT 0,
  `countries` int(11) DEFAULT 0,
  `cost_per_event` double(8,2) NOT NULL DEFAULT 0.00,
  `discount_percentage` double(8,2) DEFAULT 0.00,
  `full_price` double(8,2) NOT NULL DEFAULT 0.00,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `short_description` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exhibitors`
--

CREATE TABLE `exhibitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_person_name` varchar(191) DEFAULT NULL,
  `dial_code` varchar(191) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `skype_phone_number` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(191) DEFAULT NULL,
  `wechat_number` varchar(191) DEFAULT NULL,
  `telegram_number` varchar(191) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `rectangle_logo_path` varchar(191) DEFAULT NULL,
  `square_logo_path` varchar(191) DEFAULT NULL,
  `document_path` varchar(191) DEFAULT NULL,
  `contact_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `how_heard_about_us` varchar(191) DEFAULT NULL,
  `first_coming_event_date` date DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT 3,
  `approval_status` smallint(6) DEFAULT 1 COMMENT '1->approved',
  `registered_by_user` smallint(6) DEFAULT 0 COMMENT '1->yes',
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `credit` double(8,2) DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `ur_credit` double(8,2) NOT NULL DEFAULT 0.00,
  `event_credit` double(8,2) NOT NULL DEFAULT 0.00,
  `admissions_credit` double(8,2) NOT NULL DEFAULT 0.00,
  `events_package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exhibitor_selected_types`
--

CREATE TABLE `exhibitor_selected_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exhibitor_id` bigint(20) UNSIGNED NOT NULL,
  `exhibitor_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exhibitor_social_media_links`
--

CREATE TABLE `exhibitor_social_media_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exhibitor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `uniranks` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `whatsapp` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `dropbox` text DEFAULT NULL,
  `snapchat` text DEFAULT NULL,
  `behance` text DEFAULT NULL,
  `dribble` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `vimeo` text DEFAULT NULL,
  `skype` text DEFAULT NULL,
  `google` text DEFAULT NULL,
  `updated_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exhibitor_types`
--

CREATE TABLE `exhibitor_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expos`
--

CREATE TABLE `expos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expo_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exhibitor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` varchar(191) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `max_number_of_registrations` varchar(191) DEFAULT NULL,
  `active_status` int(11) DEFAULT NULL,
  `approval_status` int(11) DEFAULT NULL,
  `maps_link` text DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expo_leads`
--

CREATE TABLE `expo_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exhibitor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `number_of_times_visited` int(11) DEFAULT 1,
  `registered_at_expo` int(11) DEFAULT 0,
  `add_by_qr` int(11) DEFAULT 0,
  `added_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expo_registrations`
--

CREATE TABLE `expo_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `expo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exhibitor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attendance_status` smallint(6) DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `processed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `accepted_exhibitor` smallint(6) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expo_types`
--

CREATE TABLE `expo_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_admin_registrations`
--

CREATE TABLE `failed_admin_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fairs`
--

CREATE TABLE `fairs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` bigint(20) UNSIGNED NOT NULL,
  `event_type_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'what of event it is, normal or career talk',
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `g12` varchar(191) DEFAULT NULL,
  `g11` varchar(191) DEFAULT NULL,
  `max` varchar(191) DEFAULT NULL,
  `fair_name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active_status` int(11) DEFAULT NULL,
  `approval_status` int(11) DEFAULT NULL,
  `maps_link` varchar(255) DEFAULT NULL,
  `f_g_12_fee` varchar(191) DEFAULT NULL,
  `school_curriculums` longtext DEFAULT NULL,
  `gender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number_of_halls` int(11) DEFAULT NULL COMMENT 'used for career talk events'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fairs_credits`
--

CREATE TABLE `fairs_credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `credits` int(11) DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fair_edit_histories`
--

CREATE TABLE `fair_edit_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fair_id` bigint(20) UNSIGNED NOT NULL,
  `edit_request_id` bigint(20) UNSIGNED DEFAULT NULL,
  `operation_type` smallint(6) DEFAULT NULL COMMENT '1:add,2:edit,3:delete',
  `details` text DEFAULT NULL COMMENT 'Data Must Be in Json Format',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_type` text DEFAULT 'school_fair'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fair_edit_requests`
--

CREATE TABLE `fair_edit_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fair_id` bigint(20) UNSIGNED NOT NULL,
  `details` text DEFAULT NULL COMMENT 'Data Must Be in Json Format',
  `requested_by` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'edited by',
  `status` smallint(6) NOT NULL DEFAULT 0 COMMENT '0:pending, 1:approved, 2:rejected',
  `remarks` text DEFAULT NULL COMMENT 'reasons',
  `processed_by` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'who approved/reject it',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_type` text DEFAULT 'school_fair'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fair_invited_contacts`
--

CREATE TABLE `fair_invited_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_type` text DEFAULT 'school_fair',
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `status` smallint(6) DEFAULT 0 COMMENT '0-> pending, 1-> accepted , 2->rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fair_ratings`
--

CREATE TABLE `fair_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `pros` text DEFAULT NULL,
  `cons` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fair_rating_answers`
--

CREATE TABLE `fair_rating_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fair_rating_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fair_rating_questions`
--

CREATE TABLE `fair_rating_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `total_points` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fair_reserve_session_requests`
--

CREATE TABLE `fair_reserve_session_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fair_session_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0 COMMENT '0->pending, 1-> accepted by school, 2-> rejected',
  `requested_by` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'who requested it',
  `processed_by` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'who processed it',
  `processed_at` timestamp NULL DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fair_sessions`
--

CREATE TABLE `fair_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fair_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `major_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_at` timestamp NULL DEFAULT NULL,
  `end_at` timestamp NULL DEFAULT NULL,
  `duration` int(11) DEFAULT NULL COMMENT 'duration in mints',
  `hall_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fair_student_attendances`
--

CREATE TABLE `fair_student_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fair_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fair_tasks`
--

CREATE TABLE `fair_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reminders_sent` tinyint(4) DEFAULT NULL,
  `fair_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fair_types`
--

CREATE TABLE `fair_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `available` tinyint(4) DEFAULT NULL,
  `fair_type_name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_countries_charges`
--

CREATE TABLE `featured_countries_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` double(8,2) NOT NULL DEFAULT 0.00,
  `addon_price` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_packages`
--

CREATE TABLE `featured_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `details` text DEFAULT NULL,
  `privacy_text` text DEFAULT NULL,
  `terms_and_conditions` text DEFAULT NULL,
  `duration_id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_packages_discounts`
--

CREATE TABLE `featured_packages_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percent_amount` double(8,2) NOT NULL COMMENT 'Amount in Percentage',
  `start_datetime` timestamp NULL DEFAULT NULL,
  `end_datetime` timestamp NULL DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null means All Packages',
  `university_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null means All Universities',
  `country_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null means All Countries',
  `city_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null means All cities',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_package_durations`
--

CREATE TABLE `featured_package_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `duration_in_months` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_payment_methods`
--

CREATE TABLE `featured_payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `details` text DEFAULT NULL,
  `prof_type` varchar(191) NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_payment_method_for_countries`
--

CREATE TABLE `featured_payment_method_for_countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null means All Countries',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_purchase`
--

CREATE TABLE `featured_purchase` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_req_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null means All Packages',
  `university_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null means All Universities',
  `unit_price` double(8,2) NOT NULL,
  `discount_id` bigint(20) UNSIGNED NOT NULL,
  `discount_amount` double(8,2) NOT NULL,
  `add_amount_total` double(8,2) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_datetime` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_purchase_payment_profs`
--

CREATE TABLE `featured_purchase_payment_profs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `featured_purchase_id` bigint(20) UNSIGNED NOT NULL,
  `prof` varchar(191) NOT NULL COMMENT 'if image this will be filed with image link, if others then with TID',
  `prof_type` varchar(191) NOT NULL COMMENT 'image,text,others',
  `payment_method` bigint(20) UNSIGNED NOT NULL,
  `remarks` text DEFAULT NULL COMMENT 'Reason for Rejection',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_universities`
--

CREATE TABLE `featured_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_universities_requests`
--

CREATE TABLE `featured_universities_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null means All Packages',
  `university_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null means All Universities',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_university_target_countries`
--

CREATE TABLE `featured_university_target_countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `featured_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null means All Countries',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_university_target_country_cities`
--

CREATE TABLE `featured_university_target_country_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `target_country` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null means All cities',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_ranges`
--

CREATE TABLE `fee_ranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `range` varchar(191) NOT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `to` varchar(191) DEFAULT NULL,
  `from` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firewall_ips`
--

CREATE TABLE `firewall_ips` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(191) NOT NULL,
  `log_id` int(11) DEFAULT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firewall_logs`
--

CREATE TABLE `firewall_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(191) NOT NULL,
  `level` varchar(191) NOT NULL DEFAULT 'medium',
  `middleware` varchar(191) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `referrer` varchar(191) DEFAULT NULL,
  `request` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `translated_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_scales`
--

CREATE TABLE `grade_scales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `scale` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_types`
--

CREATE TABLE `grade_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hall_banners`
--

CREATE TABLE `hall_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vfair_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json data'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute_type_id` bigint(20) UNSIGNED NOT NULL,
  `no_campuses` int(11) NOT NULL DEFAULT 1 COMMENT 'Number of Campuses',
  `main_campus_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `institute_name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL COMMENT 'abbreviation',
  `description` text DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'default.png',
  `monogram` varchar(255) DEFAULT NULL,
  `logo_description` varchar(255) NOT NULL DEFAULT 'LOGO DEFAULT',
  `main_banner` varchar(255) DEFAULT NULL,
  `banner_description` varchar(255) DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institute_types`
--

CREATE TABLE `institute_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intake_months`
--

CREATE TABLE `intake_months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `international_tour_visits`
--

CREATE TABLE `international_tour_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `short_description` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_datetime` timestamp NULL DEFAULT NULL,
  `end_datetime` timestamp NULL DEFAULT NULL,
  `charges_in_usd` double(8,2) DEFAULT NULL,
  `charges_in_points` double(8,2) DEFAULT NULL,
  `number_of_universities` int(11) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `international_tour_visit_invitations`
--

CREATE TABLE `international_tour_visit_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `accepted_by_school` smallint(6) NOT NULL DEFAULT 0,
  `processed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `requested_by` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'accepted which school user',
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `international_tour_visit_plans`
--

CREATE TABLE `international_tour_visit_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(191) DEFAULT NULL,
  `fly_from` bigint(20) UNSIGNED DEFAULT NULL,
  `fly_to` bigint(20) UNSIGNED DEFAULT NULL,
  `fly_at_datetime` timestamp NULL DEFAULT NULL,
  `land_at_datetime` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `international_tour_visit_registrations`
--

CREATE TABLE `international_tour_visit_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `requested_by` bigint(20) UNSIGNED NOT NULL,
  `processed_by` bigint(20) UNSIGNED NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `international_tour_visit_universities`
--

CREATE TABLE `international_tour_visit_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `university_attendance_status` int(11) DEFAULT NULL COMMENT '0-> did not arraived1-> arrived2->latenull->pending',
  `fair_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `processed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `accepted_by_school` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_details` text DEFAULT NULL,
  `qty` varchar(191) DEFAULT NULL,
  `invoice_number` varchar(191) DEFAULT NULL,
  `ref_id` varchar(191) DEFAULT NULL,
  `full_amount` varchar(191) NOT NULL DEFAULT '0',
  `discount` varchar(191) NOT NULL DEFAULT '0',
  `payable_amount` varchar(191) NOT NULL DEFAULT '0',
  `currency_id` bigint(20) UNSIGNED DEFAULT 1,
  `payment_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_status` smallint(6) NOT NULL DEFAULT 0 COMMENT '0->unpaid',
  `due_date` timestamp NULL DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `payment_proof_document_path` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `processed_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount_percentage` varchar(191) DEFAULT '0',
  `tax` varchar(191) DEFAULT '0',
  `tax_percentage` varchar(191) DEFAULT '0',
  `processing_fee` varchar(191) DEFAULT '0',
  `processing_fee_percentage` varchar(191) DEFAULT '0',
  `ur_credit` varchar(191) DEFAULT '0',
  `events_credit` varchar(191) DEFAULT '0',
  `admissions_credit` varchar(191) DEFAULT '0',
  `bank_account_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payment_receipts`
--

CREATE TABLE `invoice_payment_receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receipt_number` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `amount` varchar(191) DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `parent_title` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `native_name` varchar(191) DEFAULT NULL,
  `flag` varchar(191) DEFAULT NULL,
  `available` smallint(6) DEFAULT 0 COMMENT '0: not available, : available ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language_requirements`
--

CREATE TABLE `language_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE `layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `layout` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_sources`
--

CREATE TABLE `lead_sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learning_types`
--

CREATE TABLE `learning_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `short_description` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json data'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mediaable_type` varchar(191) NOT NULL,
  `mediaable_id` bigint(20) UNSIGNED NOT NULL,
  `media_type` smallint(6) NOT NULL COMMENT '1=>Image, 2=>Video, 3=>panorama',
  `title` varchar(191) DEFAULT NULL,
  `url` text NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_albums`
--

CREATE TABLE `media_albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL COMMENT 'json date: {"en":"...","ar":"..."}',
  `description` text NOT NULL COMMENT 'json date: {"en":"...","ar":"..."}',
  `content_type` smallint(6) DEFAULT NULL COMMENT '1=>Image, 2=>Video, 3=>panorama',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1 COMMENT '0->Disabled 1->Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_update_requests`
--

CREATE TABLE `media_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mediaable_type` varchar(191) NOT NULL,
  `mediaable_id` bigint(20) UNSIGNED NOT NULL,
  `media_type` smallint(6) NOT NULL COMMENT '1=>Image, 2=>Video, 3=>panorama',
  `title` varchar(191) DEFAULT NULL,
  `url` text NOT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `channel` varchar(191) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `file` varchar(191) DEFAULT NULL,
  `file_type` varchar(191) DEFAULT NULL,
  `file_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ministries`
--

CREATE TABLE `ministries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `logo_path` varchar(191) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json date: {"en":"...","ar":"..."}',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `link` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notification_type_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_types`
--

CREATE TABLE `notification_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `short_description` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `template` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `original_cleaned_universities`
--

CREATE TABLE `original_cleaned_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `org_uni_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `website` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `original_universities`
--

CREATE TABLE `original_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `validity` int(11) NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT 0,
  `no_times_generated` int(11) NOT NULL DEFAULT 0,
  `no_times_attempted` int(11) NOT NULL DEFAULT 0,
  `generated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_levels`
--

CREATE TABLE `point_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `rate_per_point` double(8,2) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `min_cash_out_amount` varchar(191) DEFAULT NULL,
  `max_cash_out_amount` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_level_countries`
--

CREATE TABLE `point_level_countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `point_level_id` bigint(20) UNSIGNED NOT NULL,
  `rate_per_point` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_sources`
--

CREATE TABLE `point_sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json data: {"en":"...","ar":"..."}',
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_transactions`
--

CREATE TABLE `point_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recipient_type` varchar(191) NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `point_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `withdrawal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `points_in` double(8,2) DEFAULT 0.00,
  `points_out` double(8,2) DEFAULT 0.00,
  `by_user` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `earned_for_type` varchar(191) NOT NULL,
  `earned_for_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_types`
--

CREATE TABLE `point_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `source_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Point Source Id',
  `title` varchar(191) NOT NULL,
  `points` double(8,2) DEFAULT 0.00,
  `translated_name` text DEFAULT NULL COMMENT 'json data: {"en":"...","ar":"..."}',
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_withdrawal_requests`
--

CREATE TABLE `point_withdrawal_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `withdrawal_type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'withdrawal type id',
  `by_user` bigint(20) UNSIGNED NOT NULL COMMENT 'who requested to withdraw',
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `bank_account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `points` double(8,2) NOT NULL DEFAULT 0.00,
  `amount_paid` double(8,2) DEFAULT NULL COMMENT 'amount paid if its cash out',
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'in what currency we paid',
  `status` smallint(6) NOT NULL DEFAULT 0,
  `processed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_withdrawal_types`
--

CREATE TABLE `point_withdrawal_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `bank_account_required` smallint(6) NOT NULL DEFAULT 0 COMMENT 'Bank account needed to use this withdraw method',
  `cash_out` smallint(6) NOT NULL DEFAULT 0 COMMENT 'if this type is cash out',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `program_category_id` bigint(20) UNSIGNED NOT NULL,
  `program_name` varchar(255) DEFAULT NULL,
  `program_icon` varchar(255) NOT NULL,
  `program_image` varchar(255) DEFAULT NULL,
  `program_code` int(11) DEFAULT NULL,
  `h1` varchar(255) DEFAULT NULL,
  `h2` varchar(255) DEFAULT NULL,
  `h3` varchar(255) DEFAULT NULL,
  `h4` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_page_description` varchar(255) DEFAULT NULL,
  `image_alt_text` varchar(255) DEFAULT NULL,
  `image_title` varchar(255) DEFAULT NULL,
  `icon_alt_text` varchar(255) DEFAULT NULL,
  `icon_title` varchar(255) DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repository_transactions`
--

CREATE TABLE `repository_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `avg_ur_cost` double(8,2) DEFAULT NULL,
  `quantity_purchased` double(8,2) NOT NULL,
  `ur_credit_out` double(8,2) DEFAULT 0.00,
  `ur_credit_in` double(8,2) DEFAULT 0.00,
  `by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_fields`
--

CREATE TABLE `research_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `research_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_listing_platforms`
--

CREATE TABLE `research_listing_platforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `logo_path` varchar(191) DEFAULT NULL,
  `research_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_subjects`
--

CREATE TABLE `research_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `main_subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_types`
--

CREATE TABLE `research_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `translated_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scholarships_providers`
--

CREATE TABLE `scholarships_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT NULL,
  `moderator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_types`
--

CREATE TABLE `scholarship_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `school_type_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT '1:Public, 2:Private',
  `point_level_id` bigint(20) UNSIGNED DEFAULT 1,
  `school_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dial_code` varchar(191) DEFAULT NULL COMMENT 'i.e 971,960',
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `directorate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zone_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `website` text DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `about_us` varchar(255) DEFAULT NULL,
  `number_students` int(11) DEFAULT NULL,
  `number_grade11` int(11) DEFAULT NULL,
  `number_grade12` int(11) DEFAULT NULL,
  `number_teachers` int(11) DEFAULT NULL,
  `curriculum_id` text DEFAULT NULL,
  `fees_grade11` varchar(255) DEFAULT NULL,
  `fees_grade12` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `moderator_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade_13` varchar(191) DEFAULT NULL,
  `grade_13_fee` varchar(191) DEFAULT NULL,
  `facebook_url` text DEFAULT NULL,
  `linkedin_url` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `gender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json data',
  `sm_link` varchar(191) DEFAULT NULL,
  `sm_credit` double(8,2) DEFAULT NULL,
  `national_id` varchar(191) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_sponsored_events`
--

CREATE TABLE `school_sponsored_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `sponsored_event_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` double(8,2) DEFAULT 0.00,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_datetime` timestamp NULL DEFAULT NULL,
  `deadline` timestamp NULL DEFAULT NULL,
  `target_country_id` bigint(20) DEFAULT NULL,
  `target_city_id` bigint(20) DEFAULT NULL,
  `allow_multiple_sponsors` smallint(6) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `processed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `approval_status` smallint(6) NOT NULL DEFAULT 0,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_sponsored_event_offers`
--

CREATE TABLE `school_sponsored_event_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sponsored_event_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `offered_by` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'university user who sent request',
  `processed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_sponsored_event_types`
--

CREATE TABLE `school_sponsored_event_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `short_description` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_types`
--

CREATE TABLE `school_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json date: {"en":"...","ar":"..."}',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills_endorsements`
--

CREATE TABLE `skills_endorsements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `skill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `endorsed_by` varchar(191) DEFAULT NULL,
  `list_of_skills` varchar(191) DEFAULT NULL,
  `certifications` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_media` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sports_names`
--

CREATE TABLE `sports_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sports_types`
--

CREATE TABLE `sports_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fair_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booth_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booth_visits` bigint(20) UNSIGNED DEFAULT NULL,
  `audio_calls` bigint(20) UNSIGNED DEFAULT NULL,
  `video_calls` bigint(20) UNSIGNED DEFAULT NULL,
  `chats` bigint(20) UNSIGNED DEFAULT NULL,
  `record_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_tests`
--

CREATE TABLE `student_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `score_from` varchar(191) DEFAULT '0',
  `score_to` varchar(191) DEFAULT '0',
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_test_types`
--

CREATE TABLE `student_test_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `study_fundings`
--

CREATE TABLE `study_fundings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `funding_source` varchar(255) DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json data'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `study_levels`
--

CREATE TABLE `study_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `study_modes`
--

CREATE TABLE `study_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `study_statuses`
--

CREATE TABLE `study_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcontinents`
--

CREATE TABLE `subcontinents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `continent_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suggested_contacts`
--

CREATE TABLE `suggested_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `website` varchar(191) DEFAULT NULL,
  `contact_name` varchar(191) DEFAULT NULL,
  `contact_email` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `role` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `score_from` varchar(191) DEFAULT '0',
  `score_to` varchar(191) DEFAULT '0',
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_required_score_types`
--

CREATE TABLE `test_required_score_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `test_score_type_id` bigint(20) UNSIGNED NOT NULL,
  `score_from` varchar(191) DEFAULT '0',
  `score_to` varchar(191) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_score_types`
--

CREATE TABLE `test_score_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_types`
--

CREATE TABLE `test_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traning_centers`
--

CREATE TABLE `traning_centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT NULL,
  `moderator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute_id` bigint(20) UNSIGNED NOT NULL,
  `main_campus_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `short_name` varchar(191) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_person_name` varchar(191) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT 3 COMMENT '3->Under Review',
  `admission_contact` varchar(191) DEFAULT NULL,
  `admission_email` varchar(191) DEFAULT NULL,
  `admission_requirements` text DEFAULT NULL,
  `moderator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `acceptance_rate` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `monogram` varchar(255) DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `national_id` varchar(191) DEFAULT NULL,
  `show_world_ranking` smallint(6) NOT NULL DEFAULT 0,
  `show_region_1_ranking` smallint(6) NOT NULL DEFAULT 0,
  `show_region_2_ranking` smallint(6) NOT NULL DEFAULT 0,
  `show_region_3_ranking` smallint(6) NOT NULL DEFAULT 0,
  `show_local_ranking` smallint(6) NOT NULL DEFAULT 0,
  `show_list_ranking` smallint(6) NOT NULL DEFAULT 0,
  `ministry_accredited` smallint(6) NOT NULL DEFAULT 0,
  `bad_practices` smallint(6) NOT NULL DEFAULT 0 COMMENT '0->no, 1-> yes',
  `approval_status` smallint(6) DEFAULT 1 COMMENT '1->approved',
  `registered_by_user` smallint(6) DEFAULT 0 COMMENT '1->yes',
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ur_credit` double(8,2) NOT NULL DEFAULT 0.00,
  `event_credit` double(8,2) NOT NULL DEFAULT 0.00,
  `admissions_credit` double(8,2) NOT NULL DEFAULT 0.00,
  `event_package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `show_public_profile` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_accreditation_agencies`
--

CREATE TABLE `university_accreditation_agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `accreditation_agencies_id` bigint(20) UNSIGNED NOT NULL,
  `join_date` date DEFAULT NULL,
  `accredited_date` date DEFAULT NULL,
  `agency_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `listing_url` text DEFAULT NULL,
  `document_path` varchar(191) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `approval_status` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_accreditation_agency_programs`
--

CREATE TABLE `university_accreditation_agency_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_acc_agency_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_accreditation_agency_update_requests`
--

CREATE TABLE `university_accreditation_agency_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `accreditation_agencies_id` bigint(20) UNSIGNED DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `accredited_date` date DEFAULT NULL,
  `agency_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `listing_url` text DEFAULT NULL,
  `programs` text DEFAULT NULL,
  `document_path` varchar(191) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approval_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_admin_audits`
--

CREATE TABLE `university_admin_audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_by_user` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_user` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_admission_programs`
--

CREATE TABLE `university_admission_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `admission_requirements` text DEFAULT NULL,
  `duration_years` int(11) DEFAULT 0,
  `duration_months` int(11) DEFAULT 0,
  `duration_days` int(11) DEFAULT 0,
  `fee_term_id` bigint(20) UNSIGNED NOT NULL COMMENT 'university_program_fee_term_id',
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `fee` double NOT NULL DEFAULT 0,
  `is_online` int(11) NOT NULL DEFAULT 0,
  `is_distance_learning` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `international_fee` float DEFAULT 0,
  `application_local_fee` float DEFAULT 0,
  `admission_local_fee` float DEFAULT 0,
  `application_international_fee` float DEFAULT 0,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_admission_program_application_requirements`
--

CREATE TABLE `university_admission_program_application_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL COMMENT 'University Admission Program Id',
  `application_requirement_id` bigint(20) UNSIGNED NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_admission_program_gpa_requirements`
--

CREATE TABLE `university_admission_program_gpa_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL COMMENT 'University Admission Program Id',
  `grade_scale_id` bigint(20) UNSIGNED NOT NULL,
  `required_grades` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_admission_program_test_requirements`
--

CREATE TABLE `university_admission_program_test_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL COMMENT 'University Admission Program Id',
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `required_grades` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_admission_program_test_score_requirements`
--

CREATE TABLE `university_admission_program_test_score_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_requirement_id` bigint(20) UNSIGNED NOT NULL COMMENT 'university_admission_program_test_requirement_id',
  `test_score_type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'test_sub_score_id',
  `required_score` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_admission_program_update_requests`
--

CREATE TABLE `university_admission_program_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `admission_requirements` text DEFAULT NULL,
  `duration_years` int(11) DEFAULT 0,
  `duration_months` int(11) DEFAULT 0,
  `duration_days` int(11) DEFAULT 0,
  `fee_term_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fee` double DEFAULT 0,
  `is_online` int(11) DEFAULT 0,
  `is_distance_learning` int(11) DEFAULT 0,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_admission_requirements`
--

CREATE TABLE `university_admission_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `university_admission_program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `requirements` text DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_admission_requirement_update_requests`
--

CREATE TABLE `university_admission_requirement_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_admission_program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_admission_sessions`
--

CREATE TABLE `university_admission_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_current` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_admission_session_update_requests`
--

CREATE TABLE `university_admission_session_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_current` int(11) DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_application_requirements`
--

CREATE TABLE `university_application_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL COMMENT 'University Id',
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `application_requirement_id` bigint(20) UNSIGNED NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_categories`
--

CREATE TABLE `university_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_club_types`
--

CREATE TABLE `university_club_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_compare_histories`
--

CREATE TABLE `university_compare_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compare_slugs` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_conferences`
--

CREATE TABLE `university_conferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `university_conference_type_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `url` text DEFAULT NULL,
  `rectangle_logo_path` varchar(191) DEFAULT NULL,
  `square_logo_path` varchar(191) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_conference_subjects`
--

CREATE TABLE `university_conference_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_conference_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_conference_types`
--

CREATE TABLE `university_conference_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_contact_numbers`
--

CREATE TABLE `university_contact_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `dial_code` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) NOT NULL,
  `ext` varchar(191) NOT NULL,
  `type` smallint(6) DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_degree_types`
--

CREATE TABLE `university_degree_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_domains`
--

CREATE TABLE `university_domains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `domain_type_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_domain_update_requests`
--

CREATE TABLE `university_domain_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_events`
--

CREATE TABLE `university_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_event_type_id` bigint(20) UNSIGNED NOT NULL,
  `fair_type_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT '1->Physicals, 2->Virtual, 3->Hybrid',
  `title` varchar(191) NOT NULL,
  `short_description` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_datetime` timestamp NULL DEFAULT NULL,
  `end_datetime` timestamp NULL DEFAULT NULL,
  `max_students` int(11) DEFAULT NULL,
  `location` varchar(191) DEFAULT NULL,
  `map_link` varchar(191) DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approval_status` smallint(6) NOT NULL DEFAULT 0 COMMENT 'Approved By UNIRANKS TEAM',
  `status` smallint(6) NOT NULL DEFAULT 0,
  `process_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fee_range_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_event_curriculums`
--

CREATE TABLE `university_event_curriculums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `curriculum_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_event_invitations`
--

CREATE TABLE `university_event_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_event_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `accepted_by_school` smallint(6) NOT NULL DEFAULT 0,
  `processed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `requested_by` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'accepted which school user',
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_attendance_status` smallint(6) DEFAULT NULL COMMENT 'null,0->pending,1->arrived,2->late,3->didnt',
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_event_majors`
--

CREATE TABLE `university_event_majors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `major_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_event_student_attendances`
--

CREATE TABLE `university_event_student_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_event_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_event_types`
--

CREATE TABLE `university_event_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `short_description` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_athletics`
--

CREATE TABLE `university_facility_athletics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `sports_type_id` bigint(20) UNSIGNED NOT NULL,
  `sports_name_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT '0',
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `status` smallint(6) DEFAULT 0,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_athletic_update_requests`
--

CREATE TABLE `university_facility_athletic_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sports_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sports_name_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT '0',
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_housings`
--

CREATE TABLE `university_facility_housings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `charges` double DEFAULT 0,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `term_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_link` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `number_of_rooms` int(11) DEFAULT 1,
  `student_capacity` int(11) DEFAULT NULL COMMENT 'Number of students',
  `charges_type` double NOT NULL DEFAULT 0 COMMENT '0->Advance, 1->instalments',
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `status` smallint(6) DEFAULT 0,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_housing_services`
--

CREATE TABLE `university_facility_housing_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `housing_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_housing_update_requests`
--

CREATE TABLE `university_facility_housing_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `charges` double DEFAULT 0,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `term_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_link` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `number_of_rooms` int(11) DEFAULT NULL,
  `student_capacity` int(11) DEFAULT NULL COMMENT 'Number of students',
  `charges_type` double NOT NULL DEFAULT 0 COMMENT '0->Advance, 1->instalments',
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `services` text DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_labs`
--

CREATE TABLE `university_facility_labs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `university_lab_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `no_labs` int(11) DEFAULT NULL COMMENT 'Number Of labs',
  `translated_name` text DEFAULT NULL COMMENT 'json date: {"en":"...","ar":"..."}',
  `student_capacity` int(11) DEFAULT NULL COMMENT 'Number of students',
  `size` varchar(191) DEFAULT NULL COMMENT 'Lab size in M',
  `created_date` date DEFAULT NULL COMMENT 'created or renewed_date',
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `status` smallint(6) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_lab_update_requests`
--

CREATE TABLE `university_facility_lab_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `university_lab_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `no_labs` int(11) DEFAULT NULL COMMENT 'Number Of labs',
  `translated_name` text DEFAULT NULL COMMENT 'json date: {"en":"...","ar":"..."}',
  `student_capacity` int(11) DEFAULT NULL COMMENT 'Number of students',
  `size` varchar(191) DEFAULT NULL COMMENT 'Lab size in M',
  `created_date` date DEFAULT NULL COMMENT 'created or renewed_date',
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_main_buildings`
--

CREATE TABLE `university_facility_main_buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `no_building` int(11) DEFAULT NULL,
  `no_collage_buildings` int(11) DEFAULT NULL,
  `no_campuses` int(11) DEFAULT NULL,
  `no_schools` int(11) DEFAULT NULL,
  `no_libraries` int(11) DEFAULT NULL,
  `total_land_area` double DEFAULT NULL,
  `area_unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_labs` int(11) DEFAULT NULL,
  `no_classrooms` int(11) DEFAULT NULL,
  `no_auditoriums` int(11) DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_main_building_update_requests`
--

CREATE TABLE `university_facility_main_building_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `no_building` int(11) DEFAULT NULL,
  `no_collage_buildings` int(11) DEFAULT NULL,
  `no_campuses` int(11) DEFAULT NULL,
  `no_schools` int(11) DEFAULT NULL,
  `no_libraries` int(11) DEFAULT NULL,
  `total_land_area` double DEFAULT NULL,
  `area_unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_labs` int(11) DEFAULT NULL,
  `no_classrooms` int(11) DEFAULT NULL,
  `no_auditoriums` int(11) DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_student_life_update_requests`
--

CREATE TABLE `university_facility_student_life_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `club_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `club_name` varchar(191) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT '0',
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_student_lives`
--

CREATE TABLE `university_facility_student_lives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `club_type_id` bigint(20) UNSIGNED NOT NULL,
  `club_name` varchar(191) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT '0',
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `status` smallint(6) DEFAULT 0,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_student_supports`
--

CREATE TABLE `university_facility_student_supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `office_type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'university_support_office_types_id',
  `title` varchar(191) NOT NULL,
  `contact_name` varchar(191) NOT NULL,
  `contact_email` varchar(191) DEFAULT NULL,
  `translated_contact_name` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `status` smallint(6) DEFAULT 0,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_student_support_update_requests`
--

CREATE TABLE `university_facility_student_support_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `office_type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'university_support_office_types_id',
  `title` varchar(191) NOT NULL,
  `contact_name` varchar(191) NOT NULL,
  `contact_email` varchar(191) DEFAULT NULL,
  `translated_contact_name` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_transportations`
--

CREATE TABLE `university_facility_transportations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `transport_type_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_type_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `gender_based` smallint(6) DEFAULT 0,
  `wifi_available` smallint(6) DEFAULT 0,
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `status` smallint(6) DEFAULT 0,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_facility_transport_update_requests`
--

CREATE TABLE `university_facility_transport_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transport_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `gender_based` smallint(6) DEFAULT 0,
  `wifi_available` smallint(6) DEFAULT 0,
  `video_url` varchar(191) DEFAULT NULL,
  `panorama_url` varchar(191) DEFAULT NULL,
  `stops` text DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_faculty_types`
--

CREATE TABLE `university_faculty_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_fee_structures`
--

CREATE TABLE `university_fee_structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_credit_hr` varchar(191) DEFAULT NULL,
  `offer_installments` varchar(191) DEFAULT '0',
  `cost_per_credit_hr` varchar(191) DEFAULT NULL,
  `application_fee` varchar(191) DEFAULT NULL,
  `admission_fee` varchar(191) DEFAULT NULL,
  `other_fee_amount` varchar(191) DEFAULT NULL,
  `other_fee_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notes` text DEFAULT NULL COMMENT 'Json Data',
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_front_banners`
--

CREATE TABLE `university_front_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` text NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json date: {"en":"...","ar":"..."}',
  `status` smallint(6) NOT NULL DEFAULT 1 COMMENT '0->Disabled 1->Enabled',
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_front_banner_update_requests`
--

CREATE TABLE `university_front_banner_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` text NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json date: {"en":"...","ar":"..."}',
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_front_videos`
--

CREATE TABLE `university_front_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `url` text NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json date: {"en":"...","ar":"..."}',
  `status` smallint(6) NOT NULL DEFAULT 1 COMMENT '0->Disabled 1->Enabled',
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_front_video_update_requests`
--

CREATE TABLE `university_front_video_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `url` text NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL COMMENT 'json date: {"en":"...","ar":"..."}',
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_gpa_requirements`
--

CREATE TABLE `university_gpa_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL COMMENT 'University Id',
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `grade_scale_id` bigint(20) UNSIGNED NOT NULL,
  `required_grades` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_housing_categories`
--

CREATE TABLE `university_housing_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_housing_location_types`
--

CREATE TABLE `university_housing_location_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_housing_services`
--

CREATE TABLE `university_housing_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_housing_terms`
--

CREATE TABLE `university_housing_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_lab_categories`
--

CREATE TABLE `university_lab_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_lab_names`
--

CREATE TABLE `university_lab_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_languages`
--

CREATE TABLE `university_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_language_update_requests`
--

CREATE TABLE `university_language_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_leads`
--

CREATE TABLE `university_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `add_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `lead_source_id` bigint(20) UNSIGNED DEFAULT NULL,
  `archived` smallint(6) NOT NULL DEFAULT 0,
  `expo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `number_of_times_visited` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_preferred_majors`
--

CREATE TABLE `university_preferred_majors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `major_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_presentation_requests`
--

CREATE TABLE `university_presentation_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_presentation_request_cities`
--

CREATE TABLE `university_presentation_request_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_presentation_request_slots`
--

CREATE TABLE `university_presentation_request_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `start_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `duration` varchar(191) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `reserved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_presentation_request_types`
--

CREATE TABLE `university_presentation_request_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `sort_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_program_categories`
--

CREATE TABLE `university_program_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_program_fee_terms`
--

CREATE TABLE `university_program_fee_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_quick_views`
--

CREATE TABLE `university_quick_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `uni_category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'university_category_id',
  `no_alumni` double DEFAULT NULL,
  `no_students` double DEFAULT NULL,
  `no_schools` double DEFAULT NULL,
  `no_degrees` double DEFAULT NULL,
  `no_academics` double DEFAULT NULL,
  `founded_year` varchar(191) DEFAULT NULL,
  `distance_learning` tinyint(4) DEFAULT NULL,
  `uni_type_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'university_type_id',
  `acronym` varchar(191) DEFAULT '',
  `academic_year` varchar(191) DEFAULT NULL,
  `avg_fee` double(6,2) DEFAULT NULL,
  `online_courses` int(11) DEFAULT NULL,
  `transfer_students` double DEFAULT NULL,
  `avg_total_fee` double DEFAULT 0,
  `avg_annual_cost` double DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body_type` varchar(191) DEFAULT NULL,
  `no_majors` int(11) DEFAULT NULL,
  `no_programs` int(11) DEFAULT NULL,
  `short_courses` int(11) DEFAULT NULL,
  `acceptance_rate` int(11) DEFAULT NULL,
  `diploma` int(11) DEFAULT NULL,
  `associate` int(11) DEFAULT NULL,
  `bachelors` int(11) DEFAULT NULL,
  `masters` int(11) DEFAULT NULL,
  `doctoral` int(11) DEFAULT NULL,
  `open_university` int(11) DEFAULT NULL,
  `distance_university` int(11) DEFAULT NULL,
  `regular_university` int(11) DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_quick_view_update_requests`
--

CREATE TABLE `university_quick_view_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `uni_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_alumni` double DEFAULT NULL,
  `no_students` double DEFAULT NULL,
  `no_schools` double DEFAULT NULL,
  `no_degrees` double DEFAULT NULL,
  `no_academics` double DEFAULT NULL,
  `founded_year` varchar(191) DEFAULT NULL,
  `distance_learning` tinyint(4) DEFAULT NULL,
  `uni_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `acronym` varchar(191) DEFAULT NULL,
  `academic_year` varchar(191) DEFAULT NULL,
  `avg_fee` double(6,2) DEFAULT NULL,
  `online_courses` int(11) DEFAULT NULL,
  `transfer_students` double DEFAULT NULL,
  `avg_total_fee` double DEFAULT NULL,
  `avg_annual_cost` double DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_research`
--

CREATE TABLE `university_research` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `research_type_id` bigint(20) UNSIGNED NOT NULL,
  `research_field_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `introduction` text DEFAULT NULL,
  `scope` text DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `online_ssn` varchar(191) DEFAULT NULL,
  `print_ssn` varchar(191) DEFAULT NULL,
  `electronic_submission_url` varchar(191) DEFAULT NULL,
  `publish_year` varchar(191) DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `is_open_for_reader` smallint(6) NOT NULL DEFAULT 0 COMMENT '0->No, 1->yes',
  `is_open_for_author` smallint(6) NOT NULL DEFAULT 0 COMMENT '0->No, 1->yes',
  `reader_fee` varchar(191) DEFAULT NULL,
  `author_fee` varchar(191) DEFAULT NULL,
  `papers_start_date` date DEFAULT NULL,
  `papers_end_date` date DEFAULT NULL,
  `rectangle_logo_path` varchar(191) DEFAULT NULL,
  `square_logo_path` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_research_editors`
--

CREATE TABLE `university_research_editors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_research_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `orcid` varchar(191) DEFAULT NULL,
  `profile_url` varchar(191) DEFAULT NULL,
  `photo_path` varchar(191) DEFAULT NULL,
  `is_associate` smallint(6) NOT NULL DEFAULT 0 COMMENT '0->no, 1->yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_research_listing_platforms`
--

CREATE TABLE `university_research_listing_platforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_research_id` bigint(20) UNSIGNED NOT NULL,
  `listing_platform_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_research_subjects`
--

CREATE TABLE `university_research_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_research_id` bigint(20) UNSIGNED NOT NULL,
  `research_subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_research_volumes`
--

CREATE TABLE `university_research_volumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_research_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_reviews`
--

CREATE TABLE `university_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_scholarships`
--

CREATE TABLE `university_scholarships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `scholarship_type_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `coverage` double(8,2) DEFAULT NULL,
  `international_acceptance` double(8,2) DEFAULT NULL,
  `local_acceptance` double(8,2) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_semesters`
--

CREATE TABLE `university_semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `university_semester_title_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `translated_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_semester_titles`
--

CREATE TABLE `university_semester_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_semester_update_requests`
--

CREATE TABLE `university_semester_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_semester_title_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `translated_name` text DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_social_media`
--

CREATE TABLE `university_social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `facebook` text DEFAULT NULL,
  `uniranks` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `whatsapp` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `dropbox` text DEFAULT NULL,
  `snapchat` text DEFAULT NULL,
  `behance` text DEFAULT NULL,
  `dribble` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `vimeo` text DEFAULT NULL,
  `skype` text DEFAULT NULL,
  `google` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_social_media_update_requests`
--

CREATE TABLE `university_social_media_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `whatsapp` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `dropbox` text DEFAULT NULL,
  `snapchat` text DEFAULT NULL,
  `behance` text DEFAULT NULL,
  `dribble` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `vimeo` text DEFAULT NULL,
  `skype` text DEFAULT NULL,
  `google` text DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uniranks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_statuses`
--

CREATE TABLE `university_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `short_description` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(191) DEFAULT NULL COMMENT 'text color i.e #00aeef',
  `show_rank` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_support_office_types`
--

CREATE TABLE `university_support_office_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_testing_requirements`
--

CREATE TABLE `university_testing_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL COMMENT 'University Id',
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `required_grades` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_test_score_requirements`
--

CREATE TABLE `university_test_score_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_requirement_id` bigint(20) UNSIGNED NOT NULL,
  `test_score_type_id` bigint(20) UNSIGNED NOT NULL,
  `required_score` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_transport_stops`
--

CREATE TABLE `university_transport_stops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_transport_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `translated_name` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_transport_stop_times`
--

CREATE TABLE `university_transport_stop_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stop_id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_transport_types`
--

CREATE TABLE `university_transport_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_types`
--

CREATE TABLE `university_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_update_requests`
--

CREATE TABLE `university_update_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `admission_contact` varchar(191) DEFAULT NULL,
  `admission_email` varchar(191) DEFAULT NULL,
  `moderator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `acceptance_rate` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `monogram` varchar(255) DEFAULT NULL,
  `related_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `what_changed` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `type` bigint(20) UNSIGNED NOT NULL COMMENT 'add,update,delete',
  `requested_by_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `campus_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exhibitor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ministry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `main_user_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'sub accounts',
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_id` varchar(50) DEFAULT NULL,
  `linkedin_id` varchar(50) DEFAULT NULL,
  `twitter_id` varchar(50) DEFAULT NULL,
  `google_id` varchar(50) DEFAULT NULL,
  `reason_to_delete` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `orcid_id` varchar(50) DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `register_by_app` smallint(6) NOT NULL DEFAULT 0,
  `lead_source_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_bags`
--

CREATE TABLE `users_bags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_hobbies`
--

CREATE TABLE `users_hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hobby_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `last_activity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `comparison_id` int(11) DEFAULT NULL,
  `download_id` int(11) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `university_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_applications`
--

CREATE TABLE `user_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'student_id',
  `counselor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL COMMENT 'University Admission Program ID',
  `session_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'University Admission Session/In take id',
  `status` smallint(6) NOT NULL DEFAULT 0,
  `internal_notes` text DEFAULT NULL,
  `ref_number` text DEFAULT NULL,
  `fees` double(8,2) DEFAULT NULL,
  `submitted_date` date DEFAULT NULL,
  `remarks` text NOT NULL,
  `initialised_at` date DEFAULT NULL,
  `documents_submitted_at` date DEFAULT NULL,
  `applied_at` date DEFAULT NULL,
  `offered_at` date DEFAULT NULL,
  `deposited_at` date DEFAULT NULL,
  `got_visa_at` date DEFAULT NULL,
  `enrolled_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_application_offers`
--

CREATE TABLE `user_application_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` smallint(6) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_application_transactions`
--

CREATE TABLE `user_application_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `assigned_to_id` bigint(20) UNSIGNED DEFAULT NULL,
  `recipient_name` varchar(191) DEFAULT NULL,
  `recipient_phone_number` varchar(191) DEFAULT NULL,
  `recipient_email` varchar(191) DEFAULT NULL,
  `document_path` varchar(191) DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `counselor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_bios`
--

CREATE TABLE `user_bios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `grade_scale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `grades` varchar(191) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile_country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `bio_brief` text DEFAULT NULL,
  `profile_photo` varchar(191) DEFAULT NULL,
  `study_fundings` longtext DEFAULT NULL COMMENT '(DC2Type:json)',
  `learning_types` text DEFAULT NULL,
  `preferred_programs` longtext DEFAULT NULL COMMENT '(DC2Type:json)',
  `preferred_destination` int(11) DEFAULT NULL,
  `privacy_consent` varchar(255) NOT NULL DEFAULT 'on',
  `parent_flag` varchar(255) NOT NULL DEFAULT 'off',
  `planned_year` varchar(20) DEFAULT NULL,
  `headline` varchar(191) DEFAULT NULL,
  `position` varchar(191) DEFAULT NULL,
  `work_experience` varchar(20) DEFAULT NULL,
  `facebook_id` varchar(191) DEFAULT NULL,
  `linkedin_id` varchar(191) DEFAULT NULL,
  `age` varchar(191) DEFAULT NULL,
  `curriculum_id` bigint(20) UNSIGNED DEFAULT NULL,
  `curriculum_branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fee_range_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_completion_status` varchar(191) DEFAULT NULL,
  `study_level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `still_studying` smallint(6) DEFAULT NULL,
  `national_id` varchar(191) DEFAULT NULL,
  `phone_number_verified_at` timestamp NULL DEFAULT NULL,
  `study_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `intake_year` varchar(191) DEFAULT NULL,
  `intake_month_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_duration_id` bigint(20) UNSIGNED DEFAULT NULL,
  `study_mode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_requirement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fee_range_from` double(8,2) DEFAULT NULL,
  `fee_range_to` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_compare_histories`
--

CREATE TABLE `user_compare_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `universities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `document_path` varchar(191) NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_document_types`
--

CREATE TABLE `user_document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `translated_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_educations`
--

CREATE TABLE `user_educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `institute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `institute_type` varchar(191) DEFAULT NULL,
  `institute_name` varchar(191) DEFAULT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_year` date DEFAULT NULL,
  `end_year` date DEFAULT NULL,
  `grade_scale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `grade` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `document_path` varchar(191) DEFAULT NULL,
  `link` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_emails`
--

CREATE TABLE `user_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  `is_primary` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_experiences`
--

CREATE TABLE `user_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `organization_name` varchar(191) DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` varchar(191) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `document_path` varchar(191) DEFAULT NULL,
  `is_working_here` smallint(6) DEFAULT 0 COMMENT '1/0 = Yes/No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_factors`
--

CREATE TABLE `user_factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `factor_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_favorite_universities`
--

CREATE TABLE `user_favorite_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `universities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_guardians`
--

CREATE TABLE `user_guardians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `mobile_country_code` varchar(191) DEFAULT NULL,
  `mobile_number` varchar(191) DEFAULT NULL,
  `relation` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_hobbies`
--

CREATE TABLE `user_hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_inquiries`
--

CREATE TABLE `user_inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `replied_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE `user_interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `degree_id` int(11) DEFAULT NULL,
  `program_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'Data Type JSON',
  `country_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'Data Type JSON'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_licenses`
--

CREATE TABLE `user_licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `credential_id` varchar(255) DEFAULT NULL,
  `credential_link` varchar(255) DEFAULT NULL,
  `institute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `institute_name` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_majors`
--

CREATE TABLE `user_majors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_one_on_one_meetings`
--

CREATE TABLE `user_one_on_one_meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `host_id` bigint(20) UNSIGNED NOT NULL COMMENT 'who created one on one meeting',
  `title` varchar(191) NOT NULL,
  `short_description` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `from_datetime` timestamp NULL DEFAULT NULL,
  `to_datetime` timestamp NULL DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_one_on_one_meeting_slots`
--

CREATE TABLE `user_one_on_one_meeting_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_one_on_one_meeting_id` bigint(20) UNSIGNED NOT NULL,
  `slot_date` date NOT NULL,
  `slot_time` time NOT NULL,
  `slot_datetime` timestamp NULL DEFAULT NULL,
  `booked_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_one_on_one_meeting_slot_booking_requests`
--

CREATE TABLE `user_one_on_one_meeting_slot_booking_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slot_id` bigint(20) UNSIGNED NOT NULL,
  `requested_by` bigint(20) UNSIGNED NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_possible_universities`
--

CREATE TABLE `user_possible_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE `user_preferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_previous_schools`
--

CREATE TABLE `user_previous_schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL COMMENT 'programs',
  `grade_type_id` bigint(20) UNSIGNED NOT NULL,
  `score` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_recommendation_letters`
--

CREATE TABLE `user_recommendation_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_name` varchar(191) NOT NULL,
  `from_position` varchar(191) NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receiver_email` varchar(191) DEFAULT NULL,
  `file_path` varchar(191) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_remote_counseling_sessions`
--

CREATE TABLE `user_remote_counseling_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `host_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slot_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'user_remote_session_availability_slots_id',
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `time_zone` varchar(191) DEFAULT NULL,
  `zoom_meeting_url` varchar(191) DEFAULT NULL,
  `zoom_meeting_id` varchar(191) DEFAULT NULL,
  `zoom_meeting_password` varchar(191) DEFAULT NULL,
  `zoom_meeting_details` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` smallint(6) DEFAULT 0,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_remote_session_availability_slots`
--

CREATE TABLE `user_remote_session_availability_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `settings_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'user_remote_session_settings_id',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `day` varchar(191) NOT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `time_zone` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_remote_session_settings`
--

CREATE TABLE `user_remote_session_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date_range_type` smallint(6) DEFAULT 1 COMMENT '1->days in future,2->in selected rage,3->infinite',
  `number_of_days` int(11) DEFAULT NULL,
  `include_weekends` varchar(191) DEFAULT NULL COMMENT '1->include weekends(calander days), 0->Not included(weekdays only)',
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `time_before_duration` bigint(20) UNSIGNED DEFAULT NULL,
  `time_after_duration` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_schools`
--

CREATE TABLE `user_schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `approval_status` smallint(6) NOT NULL DEFAULT 1 COMMENT '0->pending, 1->approved, 2->rejected',
  `approved_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_school_preferences`
--

CREATE TABLE `user_school_preferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `preferences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions_histories`
--

CREATE TABLE `user_sessions_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `session_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ended_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_skill_endorsements`
--

CREATE TABLE `user_skill_endorsements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_skill_id` bigint(20) UNSIGNED NOT NULL,
  `endorsed_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_socials`
--

CREATE TABLE `user_socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sm_id` int(11) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_social_identities`
--

CREATE TABLE `user_social_identities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `provider_name` varchar(191) DEFAULT NULL,
  `provider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_study_choices`
--

CREATE TABLE `user_study_choices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `degree_type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'university_degree_types_id',
  `learning_types` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `preferred_destinations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_study_destinations`
--

CREATE TABLE `user_study_destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_study_fundings`
--

CREATE TABLE `user_study_fundings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `study_funding_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `services` enum('true','false') DEFAULT 'false',
  `opportunities` enum('true','false') DEFAULT 'false',
  `institutions` enum('true','false') DEFAULT 'false',
  `newsletter` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tests`
--

CREATE TABLE `user_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `test_id` bigint(20) UNSIGNED DEFAULT NULL,
  `test_name` varchar(191) DEFAULT NULL,
  `score` varchar(191) DEFAULT NULL,
  `issued_on_date` date DEFAULT NULL,
  `document_path` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_test_score_types`
--

CREATE TABLE `user_test_score_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_test_id` bigint(20) UNSIGNED NOT NULL,
  `test_score_type_id` bigint(20) UNSIGNED NOT NULL,
  `score` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webinar_credentials`
--

CREATE TABLE `webinar_credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `key` varchar(191) DEFAULT NULL,
  `secret` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `account_id` varchar(191) DEFAULT NULL,
  `verification_token` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `speaker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `campus_id` bigint(20) UNSIGNED DEFAULT NULL,
  `workshop_name` varchar(191) DEFAULT NULL,
  `workshop_desc` varchar(191) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `workshop_link` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `world_cities`
--

CREATE TABLE `world_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academics_email_unique` (`email`);

--
-- Indexes for table `accreditation_agencies`
--
ALTER TABLE `accreditation_agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accreditation_agency_types`
--
ALTER TABLE `accreditation_agency_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrative_regions`
--
ALTER TABLE `administrative_regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrative_regions_country_id_index` (`country_id`);

--
-- Indexes for table `admission_fee_types`
--
ALTER TABLE `admission_fee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agents_slug_unique` (`slug`),
  ADD KEY `agents_country_id_index` (`country_id`),
  ADD KEY `agents_city_id_index` (`city_id`),
  ADD KEY `agents_status_index` (`status`),
  ADD KEY `events_package_id` (`events_package_id`);
ALTER TABLE `agents` ADD FULLTEXT KEY `agents_name_fulltext` (`name`);
ALTER TABLE `agents` ADD FULLTEXT KEY `agents_website_fulltext` (`website`);

--
-- Indexes for table `agent_contact_numbers`
--
ALTER TABLE `agent_contact_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_contact_numbers_agent_id_index` (`agent_id`),
  ADD KEY `agent_contact_numbers_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `agent_domains`
--
ALTER TABLE `agent_domains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_domains_domain_type_id_index` (`domain_type_id`),
  ADD KEY `agent_domains_university_id_index` (`agent_id`),
  ADD KEY `agent_domains_url_index` (`url`),
  ADD KEY `agent_domains_created_by_index` (`created_by`);

--
-- Indexes for table `agent_event_credit_transactions`
--
ALTER TABLE `agent_event_credit_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `by_user_id` (`by_user_id`);

--
-- Indexes for table `agent_front_banners`
--
ALTER TABLE `agent_front_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_front_banners_agent_id_index` (`agent_id`),
  ADD KEY `agent_front_banners_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `agent_proving_services`
--
ALTER TABLE `agent_proving_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_questions`
--
ALTER TABLE `agent_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `by_user_id` (`by_user_id`);

--
-- Indexes for table `agent_question_answers`
--
ALTER TABLE `agent_question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `by_user_id` (`by_user_id`);

--
-- Indexes for table `agent_quick_views`
--
ALTER TABLE `agent_quick_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_quick_views_agent_id_index` (`agent_id`);

--
-- Indexes for table `agent_repositories_transactions`
--
ALTER TABLE `agent_repositories_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `by_user_id` (`by_user_id`);

--
-- Indexes for table `agent_reviews`
--
ALTER TABLE `agent_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `agent_reviews_country_id_index` (`country_id`);

--
-- Indexes for table `agent_review_comments`
--
ALTER TABLE `agent_review_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_id` (`review_id`),
  ADD KEY `by_user_id` (`by_user_id`);

--
-- Indexes for table `agent_review_likes`
--
ALTER TABLE `agent_review_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_id` (`review_id`),
  ADD KEY `liked_by_id` (`by_user_id`);

--
-- Indexes for table `agent_services`
--
ALTER TABLE `agent_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_social_media_links`
--
ALTER TABLE `agent_social_media_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_social_media_links_updated_by_id_index` (`updated_by_id`);

--
-- Indexes for table `agent_student_leads`
--
ALTER TABLE `agent_student_leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_student_leads_agent_id_index` (`agent_id`),
  ADD KEY `agent_student_leads_student_id_index` (`student_id`),
  ADD KEY `agent_student_leads_event_id_index` (`event_id`),
  ADD KEY `agent_student_leads_add_by_index` (`add_by`),
  ADD KEY `agent_student_leads_lead_source_id_index` (`lead_source_id`),
  ADD KEY `expo_id` (`expo_id`);

--
-- Indexes for table `agent_universities`
--
ALTER TABLE `agent_universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_universities_agent_id_index` (`agent_id`),
  ADD KEY `agent_universities_university_id_index` (`university_id`),
  ADD KEY `agent_universities_processed_by_id_index` (`processed_by_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_requirements`
--
ALTER TABLE `application_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_requirements_type_id_index` (`type_id`);

--
-- Indexes for table `application_requirement_types`
--
ALTER TABLE `application_requirement_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_units`
--
ALTER TABLE `area_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_country_id_index` (`country_id`);

--
-- Indexes for table `average_city_weather`
--
ALTER TABLE `average_city_weather`
  ADD PRIMARY KEY (`id`),
  ADD KEY `average_city_weather_city_id_foreign` (`city_id`);

--
-- Indexes for table `average_living_costs`
--
ALTER TABLE `average_living_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `average_living_costs_city_id_foreign` (`city_id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_representatives`
--
ALTER TABLE `booking_representatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_representatives_user_id_index` (`user_id`),
  ADD KEY `booking_representatives_university_id_index` (`university_id`);

--
-- Indexes for table `booking_students`
--
ALTER TABLE `booking_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booths`
--
ALTER TABLE `booths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booths_schooo_id_index` (`schooo_id`),
  ADD KEY `booths_slug_index` (`slug`);

--
-- Indexes for table `booths_visits`
--
ALTER TABLE `booths_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booths_visits_fair_id_index` (`fair_id`),
  ADD KEY `booths_visits_user_id_index` (`user_id`),
  ADD KEY `booths_visits_school_id_index` (`school_id`);

--
-- Indexes for table `booth_graphics`
--
ALTER TABLE `booth_graphics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booth_graphics_school_id_index` (`school_id`);

--
-- Indexes for table `booth_materials`
--
ALTER TABLE `booth_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booth_materials_school_id_index` (`school_id`),
  ADD KEY `booth_materials_title_index` (`title`),
  ADD KEY `booth_materials_file_type_index` (`file_type`);

--
-- Indexes for table `booth_menus`
--
ALTER TABLE `booth_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booth_menus_school_id_index` (`school_id`),
  ADD KEY `booth_menus_title_index` (`title`);

--
-- Indexes for table `chat_channels`
--
ALTER TABLE `chat_channels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_channels_sid_index` (`sid`);

--
-- Indexes for table `chat_conversations`
--
ALTER TABLE `chat_conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_conversations_from_user_index` (`from_user`),
  ADD KEY `chat_conversations_to_user_index` (`to_user`);

--
-- Indexes for table `chat_conversation_messages`
--
ALTER TABLE `chat_conversation_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_conversation_messages_chat_conversation_id_index` (`chat_conversation_id`),
  ADD KEY `chat_conversation_messages_chat_conversation_message_id_index` (`chat_conversation_message_id`),
  ADD KEY `chat_conversation_messages_reply_to_message_index` (`reply_to_message`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`),
  ADD KEY `cities_state_id_index` (`state_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_accounts`
--
ALTER TABLE `committee_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_accounts_user_id_foreign` (`user_id`),
  ADD KEY `committee_accounts_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `committee_ranking_factors`
--
ALTER TABLE `committee_ranking_factors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_ranking_factors_main_factor_id_foreign` (`main_factor_id`),
  ADD KEY `committee_ranking_factors_updated_by_foreign` (`updated_by`);
ALTER TABLE `committee_ranking_factors` ADD FULLTEXT KEY `committee_ranking_factors_title_fulltext` (`title`);

--
-- Indexes for table `committee_ranking_factor_votes`
--
ALTER TABLE `committee_ranking_factor_votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_ranking_factor_votes_user_id_foreign` (`user_id`),
  ADD KEY `committee_ranking_factor_votes_factor_id_foreign` (`factor_id`);

--
-- Indexes for table `community_account_visibilities`
--
ALTER TABLE `community_account_visibilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_methods`
--
ALTER TABLE `contact_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversations_from_user_index` (`from_user`),
  ADD KEY `conversations_to_user_index` (`to_user`);

--
-- Indexes for table `conversation_messages`
--
ALTER TABLE `conversation_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation_messages_conversation_id_index` (`conversation_id`),
  ADD KEY `conversation_messages_conversation_message_id_index` (`conversation_message_id`);

--
-- Indexes for table `councilor_bookings`
--
ALTER TABLE `councilor_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `councilor_bookings_agent_id_index` (`agent_id`),
  ADD KEY `councilor_bookings_user_id_index` (`user_id`);

--
-- Indexes for table `counselor_events`
--
ALTER TABLE `counselor_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counselor_events_counselor_event_type_id_index` (`counselor_event_type_id`),
  ADD KEY `counselor_events_created_by_index` (`created_by`);

--
-- Indexes for table `counselor_event_types`
--
ALTER TABLE `counselor_event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_currencies`
--
ALTER TABLE `country_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_directorates`
--
ALTER TABLE `country_directorates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_directorates_country_id_index` (`country_id`);

--
-- Indexes for table `country_directorate_regions`
--
ALTER TABLE `country_directorate_regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_directorate_regions_country_id_index` (`country_id`),
  ADD KEY `country_directorate_id` (`country_directorate_id`);

--
-- Indexes for table `country_languages`
--
ALTER TABLE `country_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_languages_country_id_foreign` (`country_id`),
  ADD KEY `country_languages_language_id_foreign` (`language_id`);

--
-- Indexes for table `country_recognised_universities`
--
ALTER TABLE `country_recognised_universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_recognised_universities_country_id_index` (`country_id`),
  ADD KEY `country_recognised_universities_university_id_index` (`university_id`);

--
-- Indexes for table `country_states`
--
ALTER TABLE `country_states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_states_country_id_index` (`country_id`),
  ADD KEY `country_region_id` (`country_region_id`);

--
-- Indexes for table `country_state_zones`
--
ALTER TABLE `country_state_zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_state_id` (`country_state_id`);

--
-- Indexes for table `course_durations`
--
ALTER TABLE `course_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curriculums`
--
ALTER TABLE `curriculums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curriculum_branches`
--
ALTER TABLE `curriculum_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curriculum_branches_curriculum_id_index` (`curriculum_id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain_types`
--
ALTER TABLE `domain_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_agencies`
--
ALTER TABLE `education_agencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_agencies_school_id_index` (`school_id`),
  ADD KEY `education_agencies_country_id_index` (`country_id`),
  ADD KEY `education_agencies_city_id_index` (`city_id`),
  ADD KEY `education_agencies_moderator_id_index` (`moderator_id`);
ALTER TABLE `education_agencies` ADD FULLTEXT KEY `education_agencies_agency_name_fulltext` (`agency_name`);
ALTER TABLE `education_agencies` ADD FULLTEXT KEY `education_agencies_website_fulltext` (`website`);

--
-- Indexes for table `elite_packages`
--
ALTER TABLE `elite_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elite_universities`
--
ALTER TABLE `elite_universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elite_universities_university_id_foreign` (`university_id`),
  ADD KEY `elite_universities_elite_package_id_foreign` (`elite_package_id`);

--
-- Indexes for table `embassies`
--
ALTER TABLE `embassies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `embassies_school_id_index` (`school_id`),
  ADD KEY `embassies_country_id_index` (`country_id`),
  ADD KEY `embassies_city_id_index` (`city_id`),
  ADD KEY `embassies_moderator_id_index` (`moderator_id`);
ALTER TABLE `embassies` ADD FULLTEXT KEY `embassies_embassy_name_fulltext` (`embassy_name`);
ALTER TABLE `embassies` ADD FULLTEXT KEY `embassies_website_fulltext` (`website`);

--
-- Indexes for table `employment_types`
--
ALTER TABLE `employment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_university_id_index` (`university_id`);

--
-- Indexes for table `event_credit_transactions`
--
ALTER TABLE `event_credit_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `by_user_id` (`by_user_id`);

--
-- Indexes for table `event_packages`
--
ALTER TABLE `event_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_packages_updated_by_user_id_index` (`updated_by_user_id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibitors`
--
ALTER TABLE `exhibitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exhibitors_slug_unique` (`slug`),
  ADD KEY `exhibitors_country_id_index` (`country_id`),
  ADD KEY `exhibitors_city_id_index` (`city_id`),
  ADD KEY `exhibitors_status_index` (`status`),
  ADD KEY `events_package_id` (`events_package_id`);
ALTER TABLE `exhibitors` ADD FULLTEXT KEY `exhibitors_name_fulltext` (`name`);
ALTER TABLE `exhibitors` ADD FULLTEXT KEY `exhibitors_website_fulltext` (`website`);

--
-- Indexes for table `exhibitor_selected_types`
--
ALTER TABLE `exhibitor_selected_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exhibitor_id` (`exhibitor_id`),
  ADD KEY `exhibitor_type_id` (`exhibitor_type_id`);

--
-- Indexes for table `exhibitor_social_media_links`
--
ALTER TABLE `exhibitor_social_media_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exhibitor_id` (`exhibitor_id`),
  ADD KEY `exhibitor_social_media_links_updated_by_id_index` (`updated_by_id`);

--
-- Indexes for table `exhibitor_types`
--
ALTER TABLE `exhibitor_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expos`
--
ALTER TABLE `expos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expo_type_id` (`expo_type_id`),
  ADD KEY `exhibitor_id` (`exhibitor_id`),
  ADD KEY `expos_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `expo_leads`
--
ALTER TABLE `expo_leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exhibitor_id` (`exhibitor_id`),
  ADD KEY `expo_id` (`expo_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `added_by_user_id` (`added_by_user_id`);

--
-- Indexes for table `expo_registrations`
--
ALTER TABLE `expo_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expo_registrations_exhibitor_id_index` (`exhibitor_id`),
  ADD KEY `expo_registrations_university_id_index` (`university_id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `expo_registrations_processed_by_index` (`processed_by`),
  ADD KEY `expo_registrations_user_id_index` (`user_id`);

--
-- Indexes for table `expo_types`
--
ALTER TABLE `expo_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_admin_registrations`
--
ALTER TABLE `failed_admin_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fairs`
--
ALTER TABLE `fairs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fairs_type_index` (`type`),
  ADD KEY `fairs_school_id_index` (`school_id`),
  ADD KEY `fairs_active_status_index` (`active_status`),
  ADD KEY `fairs_approval_status_index` (`approval_status`),
  ADD KEY `fairs_user_id_index` (`user_id`),
  ADD KEY `fairs_event_type_id_index` (`event_type_id`);

--
-- Indexes for table `fairs_credits`
--
ALTER TABLE `fairs_credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fairs_credits_university_id_index` (`university_id`);

--
-- Indexes for table `fair_edit_histories`
--
ALTER TABLE `fair_edit_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fair_edit_histories_fair_id_index` (`fair_id`),
  ADD KEY `fair_edit_histories_edit_request_id_index` (`edit_request_id`);

--
-- Indexes for table `fair_edit_requests`
--
ALTER TABLE `fair_edit_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fair_edit_requests_fair_id_index` (`fair_id`);

--
-- Indexes for table `fair_invited_contacts`
--
ALTER TABLE `fair_invited_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fair_invited_contacts_user_id_index` (`user_id`),
  ADD KEY `fair_invited_contacts_event_id_index` (`event_id`);

--
-- Indexes for table `fair_ratings`
--
ALTER TABLE `fair_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fair_ratings_user_id_index` (`user_id`);

--
-- Indexes for table `fair_rating_answers`
--
ALTER TABLE `fair_rating_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fair_rating_answers_fair_rating_id_index` (`fair_rating_id`),
  ADD KEY `fair_rating_answers_question_id_index` (`question_id`);

--
-- Indexes for table `fair_rating_questions`
--
ALTER TABLE `fair_rating_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fair_reserve_session_requests`
--
ALTER TABLE `fair_reserve_session_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fair_reserve_session_requests_fair_session_id_index` (`fair_session_id`),
  ADD KEY `fair_reserve_session_requests_university_id_index` (`university_id`),
  ADD KEY `fair_reserve_session_requests_requested_by_index` (`requested_by`),
  ADD KEY `fair_reserve_session_requests_processed_by_index` (`processed_by`),
  ADD KEY `fair_reserve_session_requests_agent_id_index` (`agent_id`);

--
-- Indexes for table `fair_sessions`
--
ALTER TABLE `fair_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fair_sessions_fair_id_index` (`fair_id`),
  ADD KEY `fair_sessions_university_id_index` (`university_id`),
  ADD KEY `fair_sessions_major_id_index` (`major_id`),
  ADD KEY `fair_sessions_user_id_index` (`user_id`),
  ADD KEY `fair_sessions_agent_id_index` (`agent_id`);

--
-- Indexes for table `fair_student_attendances`
--
ALTER TABLE `fair_student_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fair_student_attendances_fair_id_index` (`fair_id`),
  ADD KEY `fair_student_attendances_student_id_index` (`student_id`);

--
-- Indexes for table `fair_tasks`
--
ALTER TABLE `fair_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fair_tasks_fair_id_index` (`fair_id`);

--
-- Indexes for table `fair_types`
--
ALTER TABLE `fair_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fair_types_slug_index` (`slug`);

--
-- Indexes for table `featured_countries_charges`
--
ALTER TABLE `featured_countries_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_countries_charges_country_id_foreign` (`country_id`);

--
-- Indexes for table `featured_packages`
--
ALTER TABLE `featured_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_packages_duration_id_foreign` (`duration_id`);

--
-- Indexes for table `featured_packages_discounts`
--
ALTER TABLE `featured_packages_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_packages_discounts_package_id_foreign` (`package_id`),
  ADD KEY `featured_packages_discounts_university_id_foreign` (`university_id`),
  ADD KEY `featured_packages_discounts_country_id_foreign` (`country_id`),
  ADD KEY `featured_packages_discounts_city_id_foreign` (`city_id`);

--
-- Indexes for table `featured_package_durations`
--
ALTER TABLE `featured_package_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_payment_methods`
--
ALTER TABLE `featured_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_payment_method_for_countries`
--
ALTER TABLE `featured_payment_method_for_countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_payment_method_for_countries_method_id_foreign` (`method_id`),
  ADD KEY `featured_payment_method_for_countries_country_id_foreign` (`country_id`);

--
-- Indexes for table `featured_purchase`
--
ALTER TABLE `featured_purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_purchase_purchase_req_id_foreign` (`purchase_req_id`),
  ADD KEY `featured_purchase_package_id_foreign` (`package_id`),
  ADD KEY `featured_purchase_university_id_foreign` (`university_id`);

--
-- Indexes for table `featured_purchase_payment_profs`
--
ALTER TABLE `featured_purchase_payment_profs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_purchase_payment_profs_featured_purchase_id_foreign` (`featured_purchase_id`),
  ADD KEY `featured_purchase_payment_profs_payment_method_foreign` (`payment_method`);

--
-- Indexes for table `featured_universities`
--
ALTER TABLE `featured_universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_universities_university_id_foreign` (`university_id`),
  ADD KEY `featured_universities_package_id_foreign` (`package_id`),
  ADD KEY `featured_universities_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `featured_universities_requests`
--
ALTER TABLE `featured_universities_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_universities_requests_package_id_foreign` (`package_id`),
  ADD KEY `featured_universities_requests_university_id_foreign` (`university_id`);

--
-- Indexes for table `featured_university_target_countries`
--
ALTER TABLE `featured_university_target_countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_university_target_countries_featured_id_foreign` (`featured_id`),
  ADD KEY `featured_university_target_countries_country_id_foreign` (`country_id`);

--
-- Indexes for table `featured_university_target_country_cities`
--
ALTER TABLE `featured_university_target_country_cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_university_target_country_cities_target_country_foreign` (`target_country`),
  ADD KEY `featured_university_target_country_cities_city_id_foreign` (`city_id`);

--
-- Indexes for table `fee_ranges`
--
ALTER TABLE `fee_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firewall_ips`
--
ALTER TABLE `firewall_ips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firewall_ips_ip_index` (`ip`);

--
-- Indexes for table `firewall_logs`
--
ALTER TABLE `firewall_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firewall_logs_ip_index` (`ip`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_scales`
--
ALTER TABLE `grade_scales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_types`
--
ALTER TABLE `grade_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall_banners`
--
ALTER TABLE `hall_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `institutes_slug_unique` (`slug`),
  ADD KEY `institutes_institute_type_id_foreign` (`institute_type_id`),
  ADD KEY `institutes_country_id_foreign` (`country_id`),
  ADD KEY `institutes_city_id_foreign` (`city_id`);
ALTER TABLE `institutes` ADD FULLTEXT KEY `institutes_institute_name_fulltext` (`institute_name`);
ALTER TABLE `institutes` ADD FULLTEXT KEY `institutes_short_name_fulltext` (`short_name`);

--
-- Indexes for table `institute_types`
--
ALTER TABLE `institute_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intake_months`
--
ALTER TABLE `intake_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `international_tour_visits`
--
ALTER TABLE `international_tour_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `international_tour_visits_created_by_index` (`created_by`);

--
-- Indexes for table `international_tour_visit_invitations`
--
ALTER TABLE `international_tour_visit_invitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visit_id` (`tour_id`),
  ADD KEY `international_tour_visit_invitations_school_id_index` (`school_id`),
  ADD KEY `international_tour_visit_invitations_processed_by_index` (`processed_by`),
  ADD KEY `international_tour_visit_invitations_requested_by_index` (`requested_by`);

--
-- Indexes for table `international_tour_visit_plans`
--
ALTER TABLE `international_tour_visit_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `international_tour_visit_registrations`
--
ALTER TABLE `international_tour_visit_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `international_tour_visit_registrations_tour_id_index` (`tour_id`),
  ADD KEY `international_tour_visit_registrations_school_id_index` (`school_id`),
  ADD KEY `international_tour_visit_registrations_requested_by_index` (`requested_by`),
  ADD KEY `international_tour_visit_registrations_processed_by_index` (`processed_by`);

--
-- Indexes for table `international_tour_visit_universities`
--
ALTER TABLE `international_tour_visit_universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `international_tour_visit_universities_tour_id_index` (`tour_id`),
  ADD KEY `international_tour_visit_universities_university_id_index` (`university_id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invitations_school_id_index` (`school_id`),
  ADD KEY `invitations_university_id_index` (`university_id`),
  ADD KEY `invitations_processed_by_index` (`processed_by`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `payment_method_id` (`payment_method_id`),
  ADD KEY `invoices_created_by_id_index` (`created_by_id`),
  ADD KEY `invoices_processed_by_id_index` (`processed_by_id`),
  ADD KEY `invoices_bank_account_id_index` (`bank_account_id`),
  ADD KEY `invoices_package_id_index` (`package_id`);

--
-- Indexes for table `invoice_payment_receipts`
--
ALTER TABLE `invoice_payment_receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `invoice_payment_receipts_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_requirements`
--
ALTER TABLE `language_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_sources`
--
ALTER TABLE `lead_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning_types`
--
ALTER TABLE `learning_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_mediaable_type_mediaable_id_index` (`mediaable_type`,`mediaable_id`),
  ADD KEY `media_language_id_index` (`language_id`);

--
-- Indexes for table `media_albums`
--
ALTER TABLE `media_albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_type` (`content_type`);

--
-- Indexes for table `media_update_requests`
--
ALTER TABLE `media_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_update_requests_mediaable_type_mediaable_id_index` (`mediaable_type`,`mediaable_id`),
  ADD KEY `requested_by_id` (`requested_by_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ministries`
--
ALTER TABLE `ministries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ministries_country_id_index` (`country_id`),
  ADD KEY `ministries_city_id_index` (`city_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_index` (`user_id`),
  ADD KEY `notifications_notification_type_id_index` (`notification_type_id`);

--
-- Indexes for table `notification_types`
--
ALTER TABLE `notification_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `original_cleaned_universities`
--
ALTER TABLE `original_cleaned_universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `original_universities`
--
ALTER TABLE `original_universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `name` (`name`),
  ADD KEY `website` (`website`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `point_levels`
--
ALTER TABLE `point_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_level_countries`
--
ALTER TABLE `point_level_countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `level_id` (`point_level_id`);

--
-- Indexes for table `point_sources`
--
ALTER TABLE `point_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_transactions`
--
ALTER TABLE `point_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `point_transactions_recipient_type_recipient_id_index` (`recipient_type`,`recipient_id`),
  ADD KEY `point_transactions_point_type_id_index` (`point_type_id`),
  ADD KEY `point_transactions_withdrawal_id_index` (`withdrawal_id`),
  ADD KEY `point_transactions_by_user_index` (`by_user`),
  ADD KEY `point_transactions_earned_for_type_earned_for_id_index` (`earned_for_type`,`earned_for_id`);

--
-- Indexes for table `point_types`
--
ALTER TABLE `point_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `point_types_source_id_index` (`source_id`);

--
-- Indexes for table `point_withdrawal_requests`
--
ALTER TABLE `point_withdrawal_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `point_withdrawal_requests_withdrawal_type_id_index` (`withdrawal_type_id`),
  ADD KEY `point_withdrawal_requests_by_user_index` (`by_user`),
  ADD KEY `point_withdrawal_requests_school_id_index` (`school_id`),
  ADD KEY `point_withdrawal_requests_bank_account_id_index` (`bank_account_id`),
  ADD KEY `point_withdrawal_requests_processed_by_index` (`processed_by`);

--
-- Indexes for table `point_withdrawal_types`
--
ALTER TABLE `point_withdrawal_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs_program_category_id_foreign` (`program_category_id`);

--
-- Indexes for table `repository_transactions`
--
ALTER TABLE `repository_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `by_user_id` (`by_user_id`);

--
-- Indexes for table `research_fields`
--
ALTER TABLE `research_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_fields_research_type_id_index` (`research_type_id`);

--
-- Indexes for table `research_listing_platforms`
--
ALTER TABLE `research_listing_platforms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_listing_platforms_research_type_id_index` (`research_type_id`);

--
-- Indexes for table `research_subjects`
--
ALTER TABLE `research_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_types`
--
ALTER TABLE `research_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarships_providers`
--
ALTER TABLE `scholarships_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scholarships_providers_school_id_index` (`school_id`),
  ADD KEY `scholarships_providers_country_id_index` (`country_id`),
  ADD KEY `scholarships_providers_city_id_index` (`city_id`),
  ADD KEY `scholarships_providers_moderator_id_index` (`moderator_id`);
ALTER TABLE `scholarships_providers` ADD FULLTEXT KEY `scholarships_providers_name_fulltext` (`name`);
ALTER TABLE `scholarships_providers` ADD FULLTEXT KEY `scholarships_providers_website_fulltext` (`website`);

--
-- Indexes for table `scholarship_types`
--
ALTER TABLE `scholarship_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schools_institute_id_index` (`institute_id`),
  ADD KEY `schools_state_id_index` (`state_id`),
  ADD KEY `school_type` (`school_type_id`),
  ADD KEY `schools_created_by_index` (`created_by`),
  ADD KEY `schools_point_level_id_index` (`point_level_id`),
  ADD KEY `schools_directorate_id_index` (`directorate_id`),
  ADD KEY `schools_region_id_index` (`region_id`),
  ADD KEY `schools_zone_id_index` (`zone_id`);

--
-- Indexes for table `school_sponsored_events`
--
ALTER TABLE `school_sponsored_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_sponsored_events_name_index` (`name`),
  ADD KEY `school_sponsored_events_sponsored_event_type_id_index` (`sponsored_event_type_id`),
  ADD KEY `school_sponsored_events_school_id_index` (`school_id`),
  ADD KEY `school_sponsored_events_created_by_index` (`created_by`),
  ADD KEY `school_sponsored_events_processed_by_index` (`processed_by`),
  ADD KEY `target_location_id` (`target_country_id`),
  ADD KEY `target_city_id` (`target_city_id`),
  ADD KEY `school_sponsored_events_currency_id_index` (`currency_id`);

--
-- Indexes for table `school_sponsored_event_offers`
--
ALTER TABLE `school_sponsored_event_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_sponsored_event_offers_sponsored_event_id_index` (`sponsored_event_id`),
  ADD KEY `school_sponsored_event_offers_university_id_index` (`university_id`),
  ADD KEY `school_sponsored_event_offers_offered_by_index` (`offered_by`),
  ADD KEY `school_sponsored_event_offers_processed_by_index` (`processed_by`),
  ADD KEY `school_sponsored_event_offers_agent_id_index` (`agent_id`);

--
-- Indexes for table `school_sponsored_event_types`
--
ALTER TABLE `school_sponsored_event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_types`
--
ALTER TABLE `school_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills_endorsements`
--
ALTER TABLE `skills_endorsements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_endorsements_user_id_index` (`user_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports_names`
--
ALTER TABLE `sports_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports_types`
--
ALTER TABLE `sports_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_tests`
--
ALTER TABLE `student_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `student_test_types`
--
ALTER TABLE `student_test_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_fundings`
--
ALTER TABLE `study_fundings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_levels`
--
ALTER TABLE `study_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_modes`
--
ALTER TABLE `study_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_statuses`
--
ALTER TABLE `study_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcontinents`
--
ALTER TABLE `subcontinents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggested_contacts`
--
ALTER TABLE `suggested_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suggested_contacts_user_id_index` (`user_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_email_unique` (`email`),
  ADD KEY `team_invitations_team_id_foreign` (`team_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `test_required_score_types`
--
ALTER TABLE `test_required_score_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `test_score_type_id` (`test_score_type_id`);

--
-- Indexes for table `test_score_types`
--
ALTER TABLE `test_score_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `test_types`
--
ALTER TABLE `test_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traning_centers`
--
ALTER TABLE `traning_centers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `traning_centers_school_id_index` (`school_id`),
  ADD KEY `traning_centers_country_id_index` (`country_id`),
  ADD KEY `traning_centers_city_id_index` (`city_id`),
  ADD KEY `traning_centers_moderator_id_index` (`moderator_id`);
ALTER TABLE `traning_centers` ADD FULLTEXT KEY `traning_centers_name_fulltext` (`name`);
ALTER TABLE `traning_centers` ADD FULLTEXT KEY `traning_centers_website_fulltext` (`website`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `universities_slug_unique` (`slug`),
  ADD KEY `universities_institute_id_foreign` (`institute_id`),
  ADD KEY `universities_moderator_id_foreign` (`moderator_id`),
  ADD KEY `universities_status_foreign` (`status`) USING BTREE,
  ADD KEY `universities_show_world_ranking_index` (`show_world_ranking`),
  ADD KEY `universities_show_region_1_ranking_index` (`show_region_1_ranking`),
  ADD KEY `universities_show_region_2_ranking_index` (`show_region_2_ranking`),
  ADD KEY `universities_show_region_3_ranking_index` (`show_region_3_ranking`),
  ADD KEY `universities_show_local_ranking_index` (`show_local_ranking`),
  ADD KEY `universities_show_list_ranking_index` (`show_list_ranking`),
  ADD KEY `universities_ministry_accredited_index` (`ministry_accredited`),
  ADD KEY `universities_bad_practices_index` (`bad_practices`),
  ADD KEY `event_package_id` (`event_package_id`),
  ADD KEY `universities_main_campus_id_index` (`main_campus_id`);
ALTER TABLE `universities` ADD FULLTEXT KEY `universities_university_name_fulltext` (`university_name`);

--
-- Indexes for table `university_accreditation_agencies`
--
ALTER TABLE `university_accreditation_agencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `accreditation_agencies_id` (`accreditation_agencies_id`),
  ADD KEY `university_accreditation_agencies_agency_type_id_index` (`agency_type_id`),
  ADD KEY `university_accreditation_agencies_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `university_accreditation_agency_programs`
--
ALTER TABLE `university_accreditation_agency_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agency_id` (`uni_acc_agency_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `university_accreditation_agency_update_requests`
--
ALTER TABLE `university_accreditation_agency_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `accreditation_agencies_id` (`accreditation_agencies_id`),
  ADD KEY `requested_by_id` (`requested_by_id`);

--
-- Indexes for table `university_admin_audits`
--
ALTER TABLE `university_admin_audits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_admission_programs`
--
ALTER TABLE `university_admission_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_admission_programs_university_id_index` (`university_id`),
  ADD KEY `university_admission_programs_degree_id_index` (`degree_id`),
  ADD KEY `university_admission_programs_faculty_id_index` (`faculty_id`),
  ADD KEY `university_admission_programs_program_id_index` (`program_id`),
  ADD KEY `university_admission_programs_fee_term_id_index` (`fee_term_id`),
  ADD KEY `university_admission_programs_currency_id_index` (`currency_id`),
  ADD KEY `university_admission_programs_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `university_admission_program_application_requirements`
--
ALTER TABLE `university_admission_program_application_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `application_requirement_id` (`application_requirement_id`);

--
-- Indexes for table `university_admission_program_gpa_requirements`
--
ALTER TABLE `university_admission_program_gpa_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `grade_scale_id` (`grade_scale_id`);

--
-- Indexes for table `university_admission_program_test_requirements`
--
ALTER TABLE `university_admission_program_test_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `university_admission_program_test_score_requirements`
--
ALTER TABLE `university_admission_program_test_score_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_requirement_id` (`test_requirement_id`),
  ADD KEY `test_score_type_id` (`test_score_type_id`);

--
-- Indexes for table `university_admission_program_update_requests`
--
ALTER TABLE `university_admission_program_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_admission_program_update_requests_university_id_index` (`university_id`),
  ADD KEY `university_admission_program_update_requests_degree_id_index` (`degree_id`),
  ADD KEY `university_admission_program_update_requests_faculty_id_index` (`faculty_id`),
  ADD KEY `university_admission_program_update_requests_program_id_index` (`program_id`),
  ADD KEY `requested_by_id` (`requested_by_id`);

--
-- Indexes for table `university_admission_requirements`
--
ALTER TABLE `university_admission_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_admission_requirements_university_id_foreign` (`university_id`);

--
-- Indexes for table `university_admission_requirement_update_requests`
--
ALTER TABLE `university_admission_requirement_update_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_admission_sessions`
--
ALTER TABLE `university_admission_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_admission_session_update_requests`
--
ALTER TABLE `university_admission_session_update_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_application_requirements`
--
ALTER TABLE `university_application_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `application_requirement_id` (`application_requirement_id`),
  ADD KEY `university_application_requirements_degree_id_index` (`degree_id`);

--
-- Indexes for table `university_categories`
--
ALTER TABLE `university_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_club_types`
--
ALTER TABLE `university_club_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_compare_histories`
--
ALTER TABLE `university_compare_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_conferences`
--
ALTER TABLE `university_conferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_conferences_university_id_index` (`university_id`),
  ADD KEY `type_id` (`university_conference_type_id`);

--
-- Indexes for table `university_conference_subjects`
--
ALTER TABLE `university_conference_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conference_id` (`university_conference_id`);

--
-- Indexes for table `university_conference_types`
--
ALTER TABLE `university_conference_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_contact_numbers`
--
ALTER TABLE `university_contact_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_contact_numbers_university_id_index` (`university_id`),
  ADD KEY `university_contact_numbers_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `university_degree_types`
--
ALTER TABLE `university_degree_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_domains`
--
ALTER TABLE `university_domains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `url` (`url`),
  ADD KEY `university_domains_created_by_index` (`created_by`),
  ADD KEY `university_domains_domain_type_id_index` (`domain_type_id`);

--
-- Indexes for table `university_domain_update_requests`
--
ALTER TABLE `university_domain_update_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_events`
--
ALTER TABLE `university_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_events_university_id_index` (`university_id`),
  ADD KEY `university_events_created_by_index` (`created_by`),
  ADD KEY `university_events_fair_type_id_index` (`fair_type_id`),
  ADD KEY `university_events_fee_range_id_index` (`fee_range_id`),
  ADD KEY `university_events_city_id_index` (`city_id`),
  ADD KEY `university_events_country_id_index` (`country_id`);

--
-- Indexes for table `university_event_curriculums`
--
ALTER TABLE `university_event_curriculums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_event_curriculums_university_event_id_index` (`university_event_id`),
  ADD KEY `university_event_curriculums_curriculum_id_index` (`curriculum_id`);

--
-- Indexes for table `university_event_invitations`
--
ALTER TABLE `university_event_invitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_event_invitations_university_event_id_index` (`university_event_id`),
  ADD KEY `university_event_invitations_school_id_index` (`school_id`),
  ADD KEY `university_event_invitations_processed_by_index` (`processed_by`),
  ADD KEY `university_event_invitations_requested_by_index` (`requested_by`),
  ADD KEY `university_event_invitations_agent_id_index` (`agent_id`);

--
-- Indexes for table `university_event_majors`
--
ALTER TABLE `university_event_majors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_event_majors_university_event_id_index` (`university_event_id`),
  ADD KEY `university_event_majors_major_id_index` (`major_id`);

--
-- Indexes for table `university_event_student_attendances`
--
ALTER TABLE `university_event_student_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`university_event_id`),
  ADD KEY `university_event_student_attendances_student_id_index` (`student_id`);

--
-- Indexes for table `university_event_types`
--
ALTER TABLE `university_event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_facility_athletics`
--
ALTER TABLE `university_facility_athletics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_facility_athletics_university_id_index` (`university_id`),
  ADD KEY `university_facility_athletics_sports_type_id_index` (`sports_type_id`),
  ADD KEY `university_facility_athletics_sports_name_id_index` (`sports_name_id`),
  ADD KEY `university_facility_athletics_category_id_index` (`category_id`);

--
-- Indexes for table `university_facility_athletic_update_requests`
--
ALTER TABLE `university_facility_athletic_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `sports_type_id` (`sports_type_id`),
  ADD KEY `sports_name_id` (`sports_name_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `requested_by_id` (`requested_by_id`);

--
-- Indexes for table `university_facility_housings`
--
ALTER TABLE `university_facility_housings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_facility_housings_university_id_index` (`university_id`),
  ADD KEY `university_facility_housings_category_id_index` (`category_id`),
  ADD KEY `university_facility_housings_currency_id_index` (`currency_id`),
  ADD KEY `university_facility_housings_term_id_index` (`term_id`),
  ADD KEY `university_facility_housings_location_type_id_index` (`location_type_id`);

--
-- Indexes for table `university_facility_housing_services`
--
ALTER TABLE `university_facility_housing_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_facility_housing_services_housing_id_index` (`housing_id`),
  ADD KEY `university_facility_housing_services_service_id_index` (`service_id`);

--
-- Indexes for table `university_facility_housing_update_requests`
--
ALTER TABLE `university_facility_housing_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `university_facility_housing_update_requests_currency_id_index` (`currency_id`),
  ADD KEY `university_facility_housing_update_requests_term_id_index` (`term_id`),
  ADD KEY `location_type_id` (`location_type_id`),
  ADD KEY `university_facility_housing_update_requests_type_index` (`type`),
  ADD KEY `requested_by_id` (`requested_by_id`),
  ADD KEY `approved_by_id` (`approved_by_id`);

--
-- Indexes for table `university_facility_labs`
--
ALTER TABLE `university_facility_labs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_facility_labs_university_id_index` (`university_id`),
  ADD KEY `university_facility_labs_university_lab_category_id_index` (`university_lab_category_id`);

--
-- Indexes for table `university_facility_lab_update_requests`
--
ALTER TABLE `university_facility_lab_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_facility_lab_update_requests_university_id_index` (`university_id`),
  ADD KEY `category_id` (`university_lab_category_id`),
  ADD KEY `university_facility_lab_update_requests_type_index` (`type`),
  ADD KEY `requested_by_id` (`requested_by_id`),
  ADD KEY `approved_by_id` (`approved_by_id`);

--
-- Indexes for table `university_facility_main_buildings`
--
ALTER TABLE `university_facility_main_buildings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_facility_main_buildings_university_id_index` (`university_id`),
  ADD KEY `university_facility_main_buildings_area_unit_id_index` (`area_unit_id`),
  ADD KEY `university_facility_main_buildings_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `university_facility_main_building_update_requests`
--
ALTER TABLE `university_facility_main_building_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uni_id` (`university_id`),
  ADD KEY `university_facility_main_building_update_requests_type_index` (`type`),
  ADD KEY `requested_by_id` (`requested_by_id`),
  ADD KEY `approved_by_id` (`approved_by_id`);

--
-- Indexes for table `university_facility_student_life_update_requests`
--
ALTER TABLE `university_facility_student_life_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `club_type_id` (`club_type_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `requested_by_id` (`requested_by_id`);

--
-- Indexes for table `university_facility_student_lives`
--
ALTER TABLE `university_facility_student_lives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_facility_student_lives_university_id_index` (`university_id`),
  ADD KEY `university_facility_student_lives_club_type_id_index` (`club_type_id`),
  ADD KEY `university_facility_student_lives_category_id_index` (`category_id`);

--
-- Indexes for table `university_facility_student_supports`
--
ALTER TABLE `university_facility_student_supports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_facility_student_supports_university_id_index` (`university_id`),
  ADD KEY `university_facility_student_supports_office_type_id_index` (`office_type_id`);

--
-- Indexes for table `university_facility_student_support_update_requests`
--
ALTER TABLE `university_facility_student_support_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `office_type_id` (`office_type_id`),
  ADD KEY `requested_by_id` (`requested_by_id`);

--
-- Indexes for table `university_facility_transportations`
--
ALTER TABLE `university_facility_transportations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_facility_transportations_university_id_index` (`university_id`),
  ADD KEY `university_facility_transportations_transport_type_id_index` (`transport_type_id`),
  ADD KEY `university_facility_transportations_vehicle_type_id_index` (`vehicle_type_id`);

--
-- Indexes for table `university_facility_transport_update_requests`
--
ALTER TABLE `university_facility_transport_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `transport_type_id` (`transport_type_id`),
  ADD KEY `vehicle_type_id` (`vehicle_type_id`),
  ADD KEY `requested_by_id` (`requested_by_id`);

--
-- Indexes for table `university_faculty_types`
--
ALTER TABLE `university_faculty_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_fee_structures`
--
ALTER TABLE `university_fee_structures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_fee_structures_university_id_index` (`university_id`),
  ADD KEY `university_fee_structures_degree_id_index` (`degree_id`),
  ADD KEY `university_fee_structures_faculty_id_index` (`faculty_id`),
  ADD KEY `university_fee_structures_program_id_index` (`program_id`),
  ADD KEY `university_fee_structures_other_fee_type_id_index` (`other_fee_type_id`),
  ADD KEY `university_fee_structures_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `university_front_banners`
--
ALTER TABLE `university_front_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_front_banners_university_id_index` (`university_id`),
  ADD KEY `university_front_banners_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `university_front_banner_update_requests`
--
ALTER TABLE `university_front_banner_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_front_banner_update_requests_university_id_index` (`university_id`),
  ADD KEY `requested_by_id` (`requested_by_id`);

--
-- Indexes for table `university_front_videos`
--
ALTER TABLE `university_front_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_front_videos_university_id_index` (`university_id`),
  ADD KEY `university_front_videos_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `university_front_video_update_requests`
--
ALTER TABLE `university_front_video_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_front_video_update_requests_university_id_index` (`university_id`),
  ADD KEY `university_front_video_update_requests_created_by_id_index` (`created_by_id`),
  ADD KEY `requested_by_id` (`requested_by_id`);

--
-- Indexes for table `university_gpa_requirements`
--
ALTER TABLE `university_gpa_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `grade_scale_id` (`grade_scale_id`),
  ADD KEY `university_gpa_requirements_degree_id_index` (`degree_id`);

--
-- Indexes for table `university_housing_categories`
--
ALTER TABLE `university_housing_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_housing_location_types`
--
ALTER TABLE `university_housing_location_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_housing_services`
--
ALTER TABLE `university_housing_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_housing_terms`
--
ALTER TABLE `university_housing_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_lab_categories`
--
ALTER TABLE `university_lab_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_lab_names`
--
ALTER TABLE `university_lab_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_languages`
--
ALTER TABLE `university_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_languages_university_id_foreign` (`university_id`),
  ADD KEY `university_languages_language_id_foreign` (`language_id`);

--
-- Indexes for table `university_language_update_requests`
--
ALTER TABLE `university_language_update_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_leads`
--
ALTER TABLE `university_leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_leads_university_id_index` (`university_id`),
  ADD KEY `university_leads_student_id_index` (`student_id`),
  ADD KEY `university_leads_event_id_index` (`event_id`),
  ADD KEY `university_leads_add_by_index` (`add_by`),
  ADD KEY `university_leads_lead_source_id_index` (`lead_source_id`),
  ADD KEY `expo_id` (`expo_id`);

--
-- Indexes for table `university_preferred_majors`
--
ALTER TABLE `university_preferred_majors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_preferred_majors_university_id_index` (`university_id`),
  ADD KEY `university_preferred_majors_major_id_index` (`major_id`);

--
-- Indexes for table `university_presentation_requests`
--
ALTER TABLE `university_presentation_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_presentation_requests_university_id_index` (`university_id`),
  ADD KEY `university_presentation_requests_school_id_index` (`school_id`),
  ADD KEY `university_presentation_requests_country_id_index` (`country_id`),
  ADD KEY `university_presentation_requests_created_by_index` (`created_by`),
  ADD KEY `university_presentation_requests_type_id_index` (`type_id`);

--
-- Indexes for table `university_presentation_request_cities`
--
ALTER TABLE `university_presentation_request_cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_presentation_request_cities_request_id_index` (`request_id`),
  ADD KEY `university_presentation_request_cities_city_id_index` (`city_id`);

--
-- Indexes for table `university_presentation_request_slots`
--
ALTER TABLE `university_presentation_request_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_presentation_request_slots_request_id_index` (`request_id`);

--
-- Indexes for table `university_presentation_request_types`
--
ALTER TABLE `university_presentation_request_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_program_categories`
--
ALTER TABLE `university_program_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_program_fee_terms`
--
ALTER TABLE `university_program_fee_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_quick_views`
--
ALTER TABLE `university_quick_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_quick_views_university_id_foreign` (`university_id`),
  ADD KEY `university_quick_views_uni_category_id_foreign` (`uni_category_id`),
  ADD KEY `university_quick_views_uni_type_id_foreign` (`uni_type_id`);

--
-- Indexes for table `university_quick_view_update_requests`
--
ALTER TABLE `university_quick_view_update_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_research`
--
ALTER TABLE `university_research`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_research_university_id_index` (`university_id`),
  ADD KEY `university_research_research_type_id_index` (`research_type_id`),
  ADD KEY `university_research_research_field_id_index` (`research_field_id`),
  ADD KEY `university_research_language_id_index` (`language_id`),
  ADD KEY `university_research_is_open_for_reader_index` (`is_open_for_reader`),
  ADD KEY `university_research_is_open_for_author_index` (`is_open_for_author`);

--
-- Indexes for table `university_research_editors`
--
ALTER TABLE `university_research_editors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_research_editors_university_research_id_index` (`university_research_id`);

--
-- Indexes for table `university_research_listing_platforms`
--
ALTER TABLE `university_research_listing_platforms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_id` (`university_research_id`),
  ADD KEY `platform_id` (`listing_platform_id`);

--
-- Indexes for table `university_research_subjects`
--
ALTER TABLE `university_research_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_research_subjects_university_research_id_index` (`university_research_id`),
  ADD KEY `university_research_subjects_research_subject_id_index` (`research_subject_id`);

--
-- Indexes for table `university_research_volumes`
--
ALTER TABLE `university_research_volumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_research_volumes_university_research_id_index` (`university_research_id`);

--
-- Indexes for table `university_reviews`
--
ALTER TABLE `university_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_reviews_university_id_foreign` (`university_id`),
  ADD KEY `university_reviews_user_id_foreign` (`user_id`),
  ADD KEY `university_reviews_language_id_foreign` (`language_id`);

--
-- Indexes for table `university_scholarships`
--
ALTER TABLE `university_scholarships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_scholarships_university_id_index` (`university_id`),
  ADD KEY `university_scholarships_scholarship_type_id_index` (`scholarship_type_id`),
  ADD KEY `university_scholarships_created_by_id_index` (`created_by_id`);

--
-- Indexes for table `university_semesters`
--
ALTER TABLE `university_semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_semester_titles`
--
ALTER TABLE `university_semester_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_semester_update_requests`
--
ALTER TABLE `university_semester_update_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requested_by_id` (`requested_by_id`);

--
-- Indexes for table `university_social_media`
--
ALTER TABLE `university_social_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_social_media_university_id_foreign` (`university_id`),
  ADD KEY `university_social_media_updated_by_index` (`updated_by`);

--
-- Indexes for table `university_social_media_update_requests`
--
ALTER TABLE `university_social_media_update_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_statuses`
--
ALTER TABLE `university_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_support_office_types`
--
ALTER TABLE `university_support_office_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_testing_requirements`
--
ALTER TABLE `university_testing_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `university_testing_requirements_degree_id_index` (`degree_id`);

--
-- Indexes for table `university_test_score_requirements`
--
ALTER TABLE `university_test_score_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_test_score_requirements_test_requirement_id_index` (`test_requirement_id`),
  ADD KEY `university_test_score_requirements_test_score_type_id_index` (`test_score_type_id`);

--
-- Indexes for table `university_transport_stops`
--
ALTER TABLE `university_transport_stops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_transport_stops_university_transport_id_index` (`university_transport_id`);

--
-- Indexes for table `university_transport_stop_times`
--
ALTER TABLE `university_transport_stop_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_transport_types`
--
ALTER TABLE `university_transport_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_types`
--
ALTER TABLE `university_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_update_requests`
--
ALTER TABLE `university_update_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_approved_by_foreign` (`approved_by`),
  ADD KEY `users_main_user_id_index` (`main_user_id`),
  ADD KEY `ministry_id` (`ministry_id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `users_lead_source_id_index` (`lead_source_id`),
  ADD KEY `users_exhibitor_id_index` (`exhibitor_id`);

--
-- Indexes for table `users_bags`
--
ALTER TABLE `users_bags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_hobbies`
--
ALTER TABLE `users_hobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_hobbies_user_id_index` (`user_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_applications`
--
ALTER TABLE `user_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_applications_user_id_index` (`user_id`),
  ADD KEY `user_applications_counselor_id_index` (`counselor_id`),
  ADD KEY `user_applications_program_id_index` (`program_id`),
  ADD KEY `user_applications_session_id_index` (`session_id`);

--
-- Indexes for table `user_application_offers`
--
ALTER TABLE `user_application_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `user_application_transactions`
--
ALTER TABLE `user_application_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`),
  ADD KEY `counselor_id` (`counselor_id`);

--
-- Indexes for table `user_bios`
--
ALTER TABLE `user_bios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_bios_user_id_foreign` (`user_id`),
  ADD KEY `user_bios_grade_scale_id_index` (`grade_scale_id`),
  ADD KEY `user_bios_grades_index` (`grades`),
  ADD KEY `user_bios_study_level_id_index` (`study_level_id`),
  ADD KEY `user_bios_curriculum_id_index` (`curriculum_id`),
  ADD KEY `user_bios_fee_range_id_index` (`fee_range_id`),
  ADD KEY `focus_id` (`curriculum_branch_id`),
  ADD KEY `user_bios_study_status_id_index` (`study_status_id`),
  ADD KEY `user_bios_intake_month_id_index` (`intake_month_id`),
  ADD KEY `user_bios_course_duration_id_index` (`course_duration_id`),
  ADD KEY `user_bios_study_mode_id_index` (`study_mode_id`),
  ADD KEY `user_bios_language_requirement_id_index` (`language_requirement_id`);

--
-- Indexes for table `user_compare_histories`
--
ALTER TABLE `user_compare_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_compare_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_documents_user_id_index` (`user_id`),
  ADD KEY `user_documents_type_id_index` (`type_id`);

--
-- Indexes for table `user_document_types`
--
ALTER TABLE `user_document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_educations`
--
ALTER TABLE `user_educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_educations_institute_id_index` (`institute_id`),
  ADD KEY `user_educations_grade_scale_id_index` (`grade_scale_id`);

--
-- Indexes for table `user_emails`
--
ALTER TABLE `user_emails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_emails_email_unique` (`email`),
  ADD KEY `user_emails_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_experiences`
--
ALTER TABLE `user_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_factors`
--
ALTER TABLE `user_factors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_factors_user_id_foreign` (`user_id`),
  ADD KEY `user_factors_factor_id_foreign` (`factor_id`);

--
-- Indexes for table `user_favorite_universities`
--
ALTER TABLE `user_favorite_universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_favorite_universities_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_guardians`
--
ALTER TABLE `user_guardians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_guardians_user_id_index` (`user_id`);

--
-- Indexes for table `user_hobbies`
--
ALTER TABLE `user_hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_inquiries`
--
ALTER TABLE `user_inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_inquiries_university_id_index` (`university_id`),
  ADD KEY `user_inquiries_user_id_index` (`user_id`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_licenses`
--
ALTER TABLE `user_licenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_licenses_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_majors`
--
ALTER TABLE `user_majors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_majors_faculty_id_index` (`faculty_id`);

--
-- Indexes for table `user_one_on_one_meetings`
--
ALTER TABLE `user_one_on_one_meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_one_on_one_meetings_host_id_index` (`host_id`);

--
-- Indexes for table `user_one_on_one_meeting_slots`
--
ALTER TABLE `user_one_on_one_meeting_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_one_on_one_meeting_slots_user_one_on_one_meeting_id_index` (`user_one_on_one_meeting_id`),
  ADD KEY `user_one_on_one_meeting_slots_booked_by_index` (`booked_by`);

--
-- Indexes for table `user_one_on_one_meeting_slot_booking_requests`
--
ALTER TABLE `user_one_on_one_meeting_slot_booking_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slot_id` (`slot_id`),
  ADD KEY `user_one_on_one_meeting_slot_booking_requests_requested_by_index` (`requested_by`);

--
-- Indexes for table `user_possible_universities`
--
ALTER TABLE `user_possible_universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_possible_universities_user_id_index` (`user_id`);

--
-- Indexes for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_preferences_user_id_index` (`user_id`);

--
-- Indexes for table `user_previous_schools`
--
ALTER TABLE `user_previous_schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_previous_schools_user_id_foreign` (`user_id`),
  ADD KEY `user_previous_schools_program_id_foreign` (`program_id`),
  ADD KEY `user_previous_schools_grade_type_id_foreign` (`grade_type_id`);

--
-- Indexes for table `user_recommendation_letters`
--
ALTER TABLE `user_recommendation_letters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_recommendation_letters_student_id_index` (`student_id`),
  ADD KEY `user_recommendation_letters_university_id_index` (`university_id`),
  ADD KEY `user_recommendation_letters_receiver_email_index` (`receiver_email`);

--
-- Indexes for table `user_remote_counseling_sessions`
--
ALTER TABLE `user_remote_counseling_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_remote_counseling_sessions_host_id_index` (`host_id`),
  ADD KEY `user_remote_counseling_sessions_student_id_index` (`student_id`),
  ADD KEY `user_remote_counseling_sessions_slot_id_index` (`slot_id`);

--
-- Indexes for table `user_remote_session_availability_slots`
--
ALTER TABLE `user_remote_session_availability_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_remote_session_availability_slots_settings_id_index` (`settings_id`),
  ADD KEY `user_remote_session_availability_slots_user_id_index` (`user_id`);

--
-- Indexes for table `user_remote_session_settings`
--
ALTER TABLE `user_remote_session_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_remote_session_settings_user_id_index` (`user_id`),
  ADD KEY `user_remote_session_settings_duration_index` (`duration`),
  ADD KEY `user_remote_session_settings_time_before_duration_index` (`time_before_duration`),
  ADD KEY `user_remote_session_settings_time_after_duration_index` (`time_after_duration`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_schools`
--
ALTER TABLE `user_schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_schools_user_id_index` (`user_id`),
  ADD KEY `user_schools_school_id_index` (`school_id`);

--
-- Indexes for table `user_school_preferences`
--
ALTER TABLE `user_school_preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_school_preferences_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_sessions_histories`
--
ALTER TABLE `user_sessions_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_sessions_histories_user_id_index` (`user_id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_skills_user_id_foreign` (`user_id`),
  ADD KEY `user_skills_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `user_skill_endorsements`
--
ALTER TABLE `user_skill_endorsements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_skill_endorsements_user_skill_id_foreign` (`user_skill_id`);

--
-- Indexes for table `user_socials`
--
ALTER TABLE `user_socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_social_identities`
--
ALTER TABLE `user_social_identities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_social_identities_user_id_index` (`user_id`);

--
-- Indexes for table `user_study_choices`
--
ALTER TABLE `user_study_choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_study_choices_user_id_foreign` (`user_id`),
  ADD KEY `user_study_choices_degree_type_id_foreign` (`degree_type_id`);

--
-- Indexes for table `user_study_destinations`
--
ALTER TABLE `user_study_destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_study_destinations_user_id_index` (`user_id`),
  ADD KEY `user_study_destinations_country_id_index` (`country_id`),
  ADD KEY `user_study_destinations_city_id_index` (`city_id`);

--
-- Indexes for table `user_study_fundings`
--
ALTER TABLE `user_study_fundings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_study_fundings_user_id_index` (`user_id`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_subscriptions_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_tests`
--
ALTER TABLE `user_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `user_test_score_types`
--
ALTER TABLE `user_test_score_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_test_id` (`user_test_id`),
  ADD KEY `test_score_type_id` (`test_score_type_id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webinar_credentials`
--
ALTER TABLE `webinar_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `world_cities`
--
ALTER TABLE `world_cities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accreditation_agencies`
--
ALTER TABLE `accreditation_agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accreditation_agency_types`
--
ALTER TABLE `accreditation_agency_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `administrative_regions`
--
ALTER TABLE `administrative_regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_fee_types`
--
ALTER TABLE `admission_fee_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_contact_numbers`
--
ALTER TABLE `agent_contact_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_domains`
--
ALTER TABLE `agent_domains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_event_credit_transactions`
--
ALTER TABLE `agent_event_credit_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_front_banners`
--
ALTER TABLE `agent_front_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_proving_services`
--
ALTER TABLE `agent_proving_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_questions`
--
ALTER TABLE `agent_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_question_answers`
--
ALTER TABLE `agent_question_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_quick_views`
--
ALTER TABLE `agent_quick_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_repositories_transactions`
--
ALTER TABLE `agent_repositories_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_reviews`
--
ALTER TABLE `agent_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_review_comments`
--
ALTER TABLE `agent_review_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_review_likes`
--
ALTER TABLE `agent_review_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_services`
--
ALTER TABLE `agent_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_social_media_links`
--
ALTER TABLE `agent_social_media_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_student_leads`
--
ALTER TABLE `agent_student_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_universities`
--
ALTER TABLE `agent_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_requirements`
--
ALTER TABLE `application_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_requirement_types`
--
ALTER TABLE `application_requirement_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `area_units`
--
ALTER TABLE `area_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `average_city_weather`
--
ALTER TABLE `average_city_weather`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `average_living_costs`
--
ALTER TABLE `average_living_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_representatives`
--
ALTER TABLE `booking_representatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_students`
--
ALTER TABLE `booking_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booths`
--
ALTER TABLE `booths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booths_visits`
--
ALTER TABLE `booths_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booth_graphics`
--
ALTER TABLE `booth_graphics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booth_materials`
--
ALTER TABLE `booth_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booth_menus`
--
ALTER TABLE `booth_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_channels`
--
ALTER TABLE `chat_channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_conversations`
--
ALTER TABLE `chat_conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_conversation_messages`
--
ALTER TABLE `chat_conversation_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committee_accounts`
--
ALTER TABLE `committee_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committee_ranking_factors`
--
ALTER TABLE `committee_ranking_factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committee_ranking_factor_votes`
--
ALTER TABLE `committee_ranking_factor_votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_account_visibilities`
--
ALTER TABLE `community_account_visibilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_methods`
--
ALTER TABLE `contact_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `continents`
--
ALTER TABLE `continents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversation_messages`
--
ALTER TABLE `conversation_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `councilor_bookings`
--
ALTER TABLE `councilor_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counselor_events`
--
ALTER TABLE `counselor_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counselor_event_types`
--
ALTER TABLE `counselor_event_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country_currencies`
--
ALTER TABLE `country_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country_directorates`
--
ALTER TABLE `country_directorates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country_directorate_regions`
--
ALTER TABLE `country_directorate_regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country_languages`
--
ALTER TABLE `country_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country_recognised_universities`
--
ALTER TABLE `country_recognised_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country_states`
--
ALTER TABLE `country_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country_state_zones`
--
ALTER TABLE `country_state_zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_durations`
--
ALTER TABLE `course_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `curriculums`
--
ALTER TABLE `curriculums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `curriculum_branches`
--
ALTER TABLE `curriculum_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domain_types`
--
ALTER TABLE `domain_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education_agencies`
--
ALTER TABLE `education_agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elite_packages`
--
ALTER TABLE `elite_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elite_universities`
--
ALTER TABLE `elite_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `embassies`
--
ALTER TABLE `embassies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment_types`
--
ALTER TABLE `employment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_credit_transactions`
--
ALTER TABLE `event_credit_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_packages`
--
ALTER TABLE `event_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exhibitors`
--
ALTER TABLE `exhibitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exhibitor_selected_types`
--
ALTER TABLE `exhibitor_selected_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exhibitor_social_media_links`
--
ALTER TABLE `exhibitor_social_media_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exhibitor_types`
--
ALTER TABLE `exhibitor_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expos`
--
ALTER TABLE `expos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expo_leads`
--
ALTER TABLE `expo_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expo_registrations`
--
ALTER TABLE `expo_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expo_types`
--
ALTER TABLE `expo_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_admin_registrations`
--
ALTER TABLE `failed_admin_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fairs`
--
ALTER TABLE `fairs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fairs_credits`
--
ALTER TABLE `fairs_credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fair_edit_histories`
--
ALTER TABLE `fair_edit_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fair_edit_requests`
--
ALTER TABLE `fair_edit_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fair_invited_contacts`
--
ALTER TABLE `fair_invited_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fair_ratings`
--
ALTER TABLE `fair_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fair_rating_answers`
--
ALTER TABLE `fair_rating_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fair_rating_questions`
--
ALTER TABLE `fair_rating_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fair_reserve_session_requests`
--
ALTER TABLE `fair_reserve_session_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fair_sessions`
--
ALTER TABLE `fair_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fair_student_attendances`
--
ALTER TABLE `fair_student_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fair_tasks`
--
ALTER TABLE `fair_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fair_types`
--
ALTER TABLE `fair_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_countries_charges`
--
ALTER TABLE `featured_countries_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_packages`
--
ALTER TABLE `featured_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_packages_discounts`
--
ALTER TABLE `featured_packages_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_package_durations`
--
ALTER TABLE `featured_package_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_payment_methods`
--
ALTER TABLE `featured_payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_payment_method_for_countries`
--
ALTER TABLE `featured_payment_method_for_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_purchase`
--
ALTER TABLE `featured_purchase`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_purchase_payment_profs`
--
ALTER TABLE `featured_purchase_payment_profs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_universities`
--
ALTER TABLE `featured_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_universities_requests`
--
ALTER TABLE `featured_universities_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_university_target_countries`
--
ALTER TABLE `featured_university_target_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_university_target_country_cities`
--
ALTER TABLE `featured_university_target_country_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_ranges`
--
ALTER TABLE `fee_ranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `firewall_ips`
--
ALTER TABLE `firewall_ips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `firewall_logs`
--
ALTER TABLE `firewall_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_scales`
--
ALTER TABLE `grade_scales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_types`
--
ALTER TABLE `grade_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hall_banners`
--
ALTER TABLE `hall_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institute_types`
--
ALTER TABLE `institute_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intake_months`
--
ALTER TABLE `intake_months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `international_tour_visits`
--
ALTER TABLE `international_tour_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `international_tour_visit_invitations`
--
ALTER TABLE `international_tour_visit_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `international_tour_visit_plans`
--
ALTER TABLE `international_tour_visit_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `international_tour_visit_registrations`
--
ALTER TABLE `international_tour_visit_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `international_tour_visit_universities`
--
ALTER TABLE `international_tour_visit_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_payment_receipts`
--
ALTER TABLE `invoice_payment_receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_requirements`
--
ALTER TABLE `language_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead_sources`
--
ALTER TABLE `lead_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learning_types`
--
ALTER TABLE `learning_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_albums`
--
ALTER TABLE `media_albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_update_requests`
--
ALTER TABLE `media_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ministries`
--
ALTER TABLE `ministries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_types`
--
ALTER TABLE `notification_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `original_cleaned_universities`
--
ALTER TABLE `original_cleaned_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `original_universities`
--
ALTER TABLE `original_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_levels`
--
ALTER TABLE `point_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_level_countries`
--
ALTER TABLE `point_level_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_sources`
--
ALTER TABLE `point_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_transactions`
--
ALTER TABLE `point_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_types`
--
ALTER TABLE `point_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_withdrawal_requests`
--
ALTER TABLE `point_withdrawal_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_withdrawal_types`
--
ALTER TABLE `point_withdrawal_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repository_transactions`
--
ALTER TABLE `repository_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_fields`
--
ALTER TABLE `research_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_listing_platforms`
--
ALTER TABLE `research_listing_platforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_subjects`
--
ALTER TABLE `research_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_types`
--
ALTER TABLE `research_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholarships_providers`
--
ALTER TABLE `scholarships_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholarship_types`
--
ALTER TABLE `scholarship_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_sponsored_events`
--
ALTER TABLE `school_sponsored_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_sponsored_event_offers`
--
ALTER TABLE `school_sponsored_event_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_sponsored_event_types`
--
ALTER TABLE `school_sponsored_event_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_types`
--
ALTER TABLE `school_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills_endorsements`
--
ALTER TABLE `skills_endorsements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sports_names`
--
ALTER TABLE `sports_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sports_types`
--
ALTER TABLE `sports_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_tests`
--
ALTER TABLE `student_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_test_types`
--
ALTER TABLE `student_test_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_fundings`
--
ALTER TABLE `study_fundings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_levels`
--
ALTER TABLE `study_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_modes`
--
ALTER TABLE `study_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_statuses`
--
ALTER TABLE `study_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcontinents`
--
ALTER TABLE `subcontinents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suggested_contacts`
--
ALTER TABLE `suggested_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_required_score_types`
--
ALTER TABLE `test_required_score_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_score_types`
--
ALTER TABLE `test_score_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_types`
--
ALTER TABLE `test_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `traning_centers`
--
ALTER TABLE `traning_centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_accreditation_agencies`
--
ALTER TABLE `university_accreditation_agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_accreditation_agency_programs`
--
ALTER TABLE `university_accreditation_agency_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_accreditation_agency_update_requests`
--
ALTER TABLE `university_accreditation_agency_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_admin_audits`
--
ALTER TABLE `university_admin_audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_admission_programs`
--
ALTER TABLE `university_admission_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_admission_program_application_requirements`
--
ALTER TABLE `university_admission_program_application_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_admission_program_gpa_requirements`
--
ALTER TABLE `university_admission_program_gpa_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_admission_program_test_requirements`
--
ALTER TABLE `university_admission_program_test_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_admission_program_test_score_requirements`
--
ALTER TABLE `university_admission_program_test_score_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_admission_program_update_requests`
--
ALTER TABLE `university_admission_program_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_admission_requirements`
--
ALTER TABLE `university_admission_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_admission_requirement_update_requests`
--
ALTER TABLE `university_admission_requirement_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_admission_sessions`
--
ALTER TABLE `university_admission_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_admission_session_update_requests`
--
ALTER TABLE `university_admission_session_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_application_requirements`
--
ALTER TABLE `university_application_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_categories`
--
ALTER TABLE `university_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_club_types`
--
ALTER TABLE `university_club_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_compare_histories`
--
ALTER TABLE `university_compare_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_conferences`
--
ALTER TABLE `university_conferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_conference_subjects`
--
ALTER TABLE `university_conference_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_conference_types`
--
ALTER TABLE `university_conference_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_contact_numbers`
--
ALTER TABLE `university_contact_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_degree_types`
--
ALTER TABLE `university_degree_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_domains`
--
ALTER TABLE `university_domains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_domain_update_requests`
--
ALTER TABLE `university_domain_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_events`
--
ALTER TABLE `university_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_event_curriculums`
--
ALTER TABLE `university_event_curriculums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_event_invitations`
--
ALTER TABLE `university_event_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_event_majors`
--
ALTER TABLE `university_event_majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_event_student_attendances`
--
ALTER TABLE `university_event_student_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_event_types`
--
ALTER TABLE `university_event_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_athletics`
--
ALTER TABLE `university_facility_athletics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_athletic_update_requests`
--
ALTER TABLE `university_facility_athletic_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_housings`
--
ALTER TABLE `university_facility_housings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_housing_services`
--
ALTER TABLE `university_facility_housing_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_housing_update_requests`
--
ALTER TABLE `university_facility_housing_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_labs`
--
ALTER TABLE `university_facility_labs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_lab_update_requests`
--
ALTER TABLE `university_facility_lab_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_main_buildings`
--
ALTER TABLE `university_facility_main_buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_main_building_update_requests`
--
ALTER TABLE `university_facility_main_building_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_student_life_update_requests`
--
ALTER TABLE `university_facility_student_life_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_student_lives`
--
ALTER TABLE `university_facility_student_lives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_student_supports`
--
ALTER TABLE `university_facility_student_supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_student_support_update_requests`
--
ALTER TABLE `university_facility_student_support_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_transportations`
--
ALTER TABLE `university_facility_transportations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_facility_transport_update_requests`
--
ALTER TABLE `university_facility_transport_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_faculty_types`
--
ALTER TABLE `university_faculty_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_fee_structures`
--
ALTER TABLE `university_fee_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_front_banners`
--
ALTER TABLE `university_front_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_front_banner_update_requests`
--
ALTER TABLE `university_front_banner_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_front_videos`
--
ALTER TABLE `university_front_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_front_video_update_requests`
--
ALTER TABLE `university_front_video_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_gpa_requirements`
--
ALTER TABLE `university_gpa_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_housing_categories`
--
ALTER TABLE `university_housing_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_housing_location_types`
--
ALTER TABLE `university_housing_location_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_housing_services`
--
ALTER TABLE `university_housing_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_housing_terms`
--
ALTER TABLE `university_housing_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_lab_categories`
--
ALTER TABLE `university_lab_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_lab_names`
--
ALTER TABLE `university_lab_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_languages`
--
ALTER TABLE `university_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_language_update_requests`
--
ALTER TABLE `university_language_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_leads`
--
ALTER TABLE `university_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_preferred_majors`
--
ALTER TABLE `university_preferred_majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_presentation_requests`
--
ALTER TABLE `university_presentation_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_presentation_request_cities`
--
ALTER TABLE `university_presentation_request_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_presentation_request_slots`
--
ALTER TABLE `university_presentation_request_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_presentation_request_types`
--
ALTER TABLE `university_presentation_request_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_program_categories`
--
ALTER TABLE `university_program_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_program_fee_terms`
--
ALTER TABLE `university_program_fee_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_quick_views`
--
ALTER TABLE `university_quick_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_quick_view_update_requests`
--
ALTER TABLE `university_quick_view_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_research`
--
ALTER TABLE `university_research`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_research_editors`
--
ALTER TABLE `university_research_editors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_research_listing_platforms`
--
ALTER TABLE `university_research_listing_platforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_research_subjects`
--
ALTER TABLE `university_research_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_research_volumes`
--
ALTER TABLE `university_research_volumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_reviews`
--
ALTER TABLE `university_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_scholarships`
--
ALTER TABLE `university_scholarships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_semesters`
--
ALTER TABLE `university_semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_semester_titles`
--
ALTER TABLE `university_semester_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_semester_update_requests`
--
ALTER TABLE `university_semester_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_social_media`
--
ALTER TABLE `university_social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_social_media_update_requests`
--
ALTER TABLE `university_social_media_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_statuses`
--
ALTER TABLE `university_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_support_office_types`
--
ALTER TABLE `university_support_office_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_testing_requirements`
--
ALTER TABLE `university_testing_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_test_score_requirements`
--
ALTER TABLE `university_test_score_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_transport_stops`
--
ALTER TABLE `university_transport_stops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_transport_stop_times`
--
ALTER TABLE `university_transport_stop_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_transport_types`
--
ALTER TABLE `university_transport_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_types`
--
ALTER TABLE `university_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_update_requests`
--
ALTER TABLE `university_update_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_bags`
--
ALTER TABLE `users_bags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_hobbies`
--
ALTER TABLE `users_hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_applications`
--
ALTER TABLE `user_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_application_offers`
--
ALTER TABLE `user_application_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_application_transactions`
--
ALTER TABLE `user_application_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_bios`
--
ALTER TABLE `user_bios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_compare_histories`
--
ALTER TABLE `user_compare_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_document_types`
--
ALTER TABLE `user_document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_educations`
--
ALTER TABLE `user_educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_emails`
--
ALTER TABLE `user_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_experiences`
--
ALTER TABLE `user_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_factors`
--
ALTER TABLE `user_factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_favorite_universities`
--
ALTER TABLE `user_favorite_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_guardians`
--
ALTER TABLE `user_guardians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_hobbies`
--
ALTER TABLE `user_hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_inquiries`
--
ALTER TABLE `user_inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_licenses`
--
ALTER TABLE `user_licenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_majors`
--
ALTER TABLE `user_majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_one_on_one_meetings`
--
ALTER TABLE `user_one_on_one_meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_one_on_one_meeting_slots`
--
ALTER TABLE `user_one_on_one_meeting_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_one_on_one_meeting_slot_booking_requests`
--
ALTER TABLE `user_one_on_one_meeting_slot_booking_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_possible_universities`
--
ALTER TABLE `user_possible_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_preferences`
--
ALTER TABLE `user_preferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_previous_schools`
--
ALTER TABLE `user_previous_schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_recommendation_letters`
--
ALTER TABLE `user_recommendation_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_remote_counseling_sessions`
--
ALTER TABLE `user_remote_counseling_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_remote_session_availability_slots`
--
ALTER TABLE `user_remote_session_availability_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_remote_session_settings`
--
ALTER TABLE `user_remote_session_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_schools`
--
ALTER TABLE `user_schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_school_preferences`
--
ALTER TABLE `user_school_preferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_sessions_histories`
--
ALTER TABLE `user_sessions_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_skill_endorsements`
--
ALTER TABLE `user_skill_endorsements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_socials`
--
ALTER TABLE `user_socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_social_identities`
--
ALTER TABLE `user_social_identities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_study_choices`
--
ALTER TABLE `user_study_choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_study_destinations`
--
ALTER TABLE `user_study_destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_study_fundings`
--
ALTER TABLE `user_study_fundings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tests`
--
ALTER TABLE `user_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_test_score_types`
--
ALTER TABLE `user_test_score_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webinar_credentials`
--
ALTER TABLE `webinar_credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `world_cities`
--
ALTER TABLE `world_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
