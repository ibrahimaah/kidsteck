-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 01:18 PM
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
-- Database: `kidsteck1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'حيوانات'),
(3, 'خيال علمي'),
(4, 'رسوم متحركة'),
(5, 'رياضة'),
(1, 'طبيعة');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kid_activity_logs`
--

CREATE TABLE `kid_activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kid_id` bigint(20) UNSIGNED NOT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  `duration` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kid_activity_logs`
--

INSERT INTO `kid_activity_logs` (`id`, `kid_id`, `login_at`, `logout_at`, `duration`, `created_at`, `updated_at`) VALUES
(1, 10, '2025-03-24 10:08:58', '2025-03-24 10:09:19', 21, '2025-03-24 10:08:58', '2025-03-24 10:09:19'),
(2, 10, '2025-03-24 10:09:49', '2025-03-24 10:10:39', 50, '2025-03-24 10:09:49', '2025-03-24 10:10:39'),
(3, 13, '2025-03-26 04:34:28', '2025-03-26 04:36:51', 143, '2025-03-26 04:34:28', '2025-03-26 04:36:51'),
(4, 13, '2025-04-08 03:38:58', '2025-04-08 03:40:21', 83, '2025-04-08 03:38:58', '2025-04-08 03:40:21'),
(5, 14, '2025-04-08 03:42:20', NULL, 0, '2025-04-08 03:42:20', '2025-04-08 03:42:20'),
(6, 14, '2025-04-08 10:14:39', '2025-04-08 10:17:45', 186, '2025-04-08 10:14:39', '2025-04-08 10:17:45'),
(7, 14, '2025-04-08 10:20:42', '2025-04-08 10:21:22', 40, '2025-04-08 10:20:42', '2025-04-08 10:21:22'),
(8, 14, '2025-04-08 10:21:37', NULL, 0, '2025-04-08 10:21:37', '2025-04-08 10:21:37'),
(9, 13, '2025-04-10 07:27:08', NULL, 0, '2025-04-10 07:27:08', '2025-04-10 07:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\StoryPart', 1, 'f823e2ad-29c6-41c7-9c0f-e0ce9ddcd90e', 'videos', '4. Course Files', '4.-Course-Files.mp4', 'video/mp4', 'public', 'public', 13855530, '[]', '[]', '[]', '[]', 1, '2025-03-12 08:03:37', '2025-03-12 08:03:37'),
(2, 'App\\Models\\StoryPart', 2, '878af45d-62fc-4606-bca6-21d74ff64a04', 'videos', '4. Course Files', '4.-Course-Files.mp4', 'video/mp4', 'public', 'public', 13855530, '[]', '[]', '[]', '[]', 1, '2025-03-12 08:04:23', '2025-03-12 08:04:23'),
(4, 'App\\Models\\StoryPart', 4, 'ac74adad-4927-42c9-8630-9dbcdfe40264', 'videos', '4. Course Files', '4.-Course-Files.mp4', 'video/mp4', 'public', 'public', 13855530, '[]', '[]', '[]', '[]', 1, '2025-03-12 08:14:01', '2025-03-12 08:14:01'),
(5, 'App\\Models\\Story', 3, '272f6591-51ac-4029-ae09-11450b6f4c08', 'story_cover_images', 'pexels-cottonbro-4709285', 'pexels-cottonbro-4709285.jpg', 'image/jpeg', 'public', 'public', 556968, '[]', '[]', '[]', '[]', 1, '2025-03-13 14:44:28', '2025-03-13 14:44:28'),
(6, 'App\\Models\\StoryPart', 5, '1cbf63d7-173d-4883-a801-67970b07b5ff', 'videos', '4. Course Files', '4.-Course-Files.mp4', 'video/mp4', 'public', 'public', 13855530, '[]', '[]', '[]', '[]', 1, '2025-03-13 14:50:53', '2025-03-13 14:50:53'),
(8, 'App\\Models\\Story', 5, 'ed89db01-388c-4dc4-aca2-2b37cc057286', 'story_cover_images', 'AQADV8cxG5oS2FJ-', 'AQADV8cxG5oS2FJ-.jpeg', 'image/jpeg', 'public', 'public', 284850, '[]', '[]', '[]', '[]', 1, '2025-03-19 06:46:55', '2025-03-19 06:46:55'),
(9, 'App\\Models\\StoryPart', 6, '850afa49-ff5f-4c36-858c-c10986945727', 'videos', '1. Why You Should Take This Course', '1.-Why-You-Should-Take-This-Course.mp4', 'video/mp4', 'public', 'public', 30796161, '[]', '[]', '[]', '[]', 1, '2025-03-19 06:52:24', '2025-03-19 06:52:24'),
(10, 'App\\Models\\StoryPart', 7, '5fcd3f57-9fe5-4cd7-8752-01c82ec008ed', 'videos', '2. Why JavaScript is Amazing', '2.-Why-JavaScript-is-Amazing.mp4', 'video/mp4', 'public', 'public', 17440310, '[]', '[]', '[]', '[]', 1, '2025-03-19 06:53:02', '2025-03-19 06:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2025_01_29_065821_create_roles_table', 1),
(5, '2025_01_29_065822_create_users_table', 1),
(6, '2025_01_29_070411_create_categories_table', 1),
(7, '2025_01_29_070412_create_stories_table', 1),
(8, '2025_01_29_070413_create_media_table', 1),
(9, '2025_01_29_070414_create_story_parts_table', 1),
(10, '2025_01_29_074602_create_quizzes_table', 1),
(11, '2025_01_29_074717_create_questions_table', 1),
(12, '2025_01_29_075000_create_user_quizzes_table', 1),
(13, '2025_01_29_075059_create_user_points_table', 1),
(14, '2025_03_02_064922_create_question_options_table', 1),
(15, '2025_03_09_121557_create_proposed_stories_table', 1),
(16, '2025_03_20_085008_create_story_part_user_table', 2),
(17, '2025_03_24_060058_create_user_points_table', 3),
(18, '2025_03_24_130147_create_kid_activity_logs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposed_stories`
--

CREATE TABLE `proposed_stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `target_age` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','accepted','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposed_stories`
--

INSERT INTO `proposed_stories` (`id`, `title`, `description`, `target_age`, `parent_id`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(7, 'زين والمهمة البرمجية!', 'كان زين طفلًا فضوليًا يحب الألعاب الإلكترونية، لكنه لم يكن يعلم كيف تعمل. في يومٍ من الأيام، تلقى رسالة غامضة من الروبوت \"كودو\"، الذي طلب مساعدته في إصلاح عالم البرمجة!\r\n\r\nباستخدام أوامر بسيطة مثل \"إذا\"، \"كرر\"، و\"تحرك\"، بدأ زين في حل التحديات، وإصلاح الأخطاء، وإكمال المهمات واحدة تلو الأخرى. لكنه يواجه مشكلة كبيرة عندما يضيع \"كودو\" وسط الأكواد العشوائية! هل سيتمكن زين من إنقاذ صديقه باستخدام التفكير المنطقي؟\r\n\r\n✨ قصة شيقة تُعرّف الأطفال بأساسيات البرمجة مثل التكرار، الشروط، والتفكير المنطقي بطريقة ممتعة ومشوقة! 🚀💡', '[6-8]', 9, 3, 'accepted', '2025-03-19 06:34:39', '2025-03-19 06:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `story_part_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `story_part_id`, `question`, `created_at`, `updated_at`) VALUES
(1, 5, 'ما هو الاستخدام الرئيسي للغة جافاسكريبت؟', '2025-03-16 09:22:22', '2025-03-16 09:22:22'),
(2, 5, 'أين يتم تنفيذ كود جافاسكريبت في المتصفح؟', '2025-03-16 09:23:06', '2025-03-16 09:23:06'),
(3, 5, 'أي من التالي ليس نوع بيانات في جافاسكريبت؟', '2025-03-16 09:23:53', '2025-03-16 09:23:53'),
(5, 6, 'أين عثر كودي على الكتاب السحري؟', '2025-03-20 07:41:06', '2025-03-20 07:41:06'),
(6, 6, 'ماذا يحدث عندما يلمس كودي الكتاب السحري؟', '2025-03-20 07:41:49', '2025-03-20 07:41:49'),
(7, 6, 'من يظهر أمام كودي بعد لمس الكتاب؟', '2025-03-20 07:42:23', '2025-03-20 07:42:23'),
(8, 6, 'ماذا يجب على كودي تعلمه قبل بدء مغامرته؟', '2025-03-20 07:43:02', '2025-03-20 07:43:02'),
(9, 7, 'aaaaaa', '2025-03-23 05:11:42', '2025-03-23 05:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `question_id`, `option_text`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'تصميم الواجهات الرسومية', 0, '2025-03-16 09:22:22', '2025-03-16 09:22:22'),
(2, 1, 'التفاعل مع المستخدم وتحديث محتوى الصفحة ديناميكيًا', 1, '2025-03-16 09:22:23', '2025-03-16 09:22:23'),
(3, 1, 'إدارة قواعد البيانات', 0, '2025-03-16 09:22:23', '2025-03-16 09:22:23'),
(4, 1, 'تنسيق النصوص داخل المستندات', 0, '2025-03-16 09:22:23', '2025-03-16 09:22:23'),
(5, 2, 'في خادم الويب', 0, '2025-03-16 09:23:06', '2025-03-16 09:23:06'),
(6, 2, 'في قاعدة البيانات', 0, '2025-03-16 09:23:06', '2025-03-16 09:23:06'),
(7, 2, 'في بيئة العميل (المتصفح)', 1, '2025-03-16 09:23:06', '2025-03-16 09:23:06'),
(8, 2, 'في نظام التشغيل مباشرة', 0, '2025-03-16 09:23:06', '2025-03-16 09:23:06'),
(9, 3, 'Number', 0, '2025-03-16 09:23:53', '2025-03-16 09:23:53'),
(10, 3, 'Boolean', 0, '2025-03-16 09:23:53', '2025-03-16 09:23:53'),
(11, 3, 'Float', 1, '2025-03-16 09:23:53', '2025-03-16 09:23:53'),
(12, 3, 'String', 0, '2025-03-16 09:23:53', '2025-03-16 09:23:53'),
(17, 5, 'في مكتبة جده القديمة', 1, '2025-03-20 07:41:06', '2025-03-20 07:41:06'),
(18, 5, 'في مكتبة المدرسة', 0, '2025-03-20 07:41:06', '2025-03-20 07:41:06'),
(19, 5, 'في حديقة قريته', 0, '2025-03-20 07:41:06', '2025-03-20 07:41:06'),
(20, 5, 'في مكتبة المدينة الحديثة', 0, '2025-03-20 07:41:06', '2025-03-20 07:41:06'),
(21, 6, 'الكتاب ينفجر', 0, '2025-03-20 07:41:49', '2025-03-20 07:41:49'),
(22, 6, 'الكتاب يضيء ويعرض أكواد برمجية', 1, '2025-03-20 07:41:49', '2025-03-20 07:41:49'),
(23, 6, 'الكتاب يتحول إلى خريطة', 0, '2025-03-20 07:41:49', '2025-03-20 07:41:49'),
(24, 6, 'الكتاب يختفي تمامًا', 0, '2025-03-20 07:41:49', '2025-03-20 07:41:49'),
(25, 7, 'الروبوت توتو', 1, '2025-03-20 07:42:23', '2025-03-20 07:42:23'),
(26, 7, 'شخص مجهول', 0, '2025-03-20 07:42:23', '2025-03-20 07:42:23'),
(27, 7, 'مخلوق غريب', 0, '2025-03-20 07:42:23', '2025-03-20 07:42:23'),
(28, 7, 'عالم خفي', 0, '2025-03-20 07:42:23', '2025-03-20 07:42:23'),
(29, 8, 'تعلم السفر عبر الزمن', 0, '2025-03-20 07:43:02', '2025-03-20 07:43:02'),
(30, 8, 'تعلم القراءة بسرعة', 0, '2025-03-20 07:43:02', '2025-03-20 07:43:02'),
(31, 8, 'تعلم أساسيات البرمجة', 1, '2025-03-20 07:43:02', '2025-03-20 07:43:02'),
(32, 8, 'تعلم الرياضيات', 0, '2025-03-20 07:43:02', '2025-03-20 07:43:02'),
(33, 9, 'a', 1, '2025-03-23 05:11:42', '2025-03-23 05:11:42'),
(34, 9, 'b', 0, '2025-03-23 05:11:42', '2025-03-23 05:11:42'),
(35, 9, 'c', 0, '2025-03-23 05:11:42', '2025-03-23 05:11:42'),
(36, 9, 'd', 0, '2025-03-23 05:11:42', '2025-03-23 05:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(4, 'child'),
(3, 'parent'),
(2, 'volunteer');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `target_age` varchar(255) NOT NULL,
  `added_by` enum('admin','volunteer') NOT NULL DEFAULT 'admin',
  `volunteer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `description`, `target_age`, `added_by`, `volunteer_id`, `category_id`, `is_active`) VALUES
(3, 'مدخل إلى لغة جافاسكريبت', 'مدخل إلى لغة جافاسكريبت هو دورة تدريبية تهدف إلى تقديم أساسيات اللغة للمبتدئين. ستتعلم في هذه الدورة كيفية استخدام جافاسكريبت لإضافة التفاعلية إلى صفحات الويب، والتعامل مع المتغيرات، وأنواع البيانات، والعمليات المنطقية، والوظائف، والكائنات، والتعامل مع الأحداث. كما ستتعرف على كيفية استخدام DOM للتفاعل مع عناصر HTML، بالإضافة إلى مقدمة حول ES6 والمفاهيم الحديثة في جافاسكريبت.', '[8-10]', 'volunteer', 3, 3, 1),
(5, 'مغامرات كودي والروبوت توتو 🚀💡', 'في عالم مليء بالمغامرات والتحديات، يكتشف الطفل كودي كتابًا سحريًا يعلمه أساسيات البرمجة! بمساعدة صديقه الروبوت توتو، يخوض كودي تحديات ممتعة لحل الألغاز وكتابة الأكواد لتشغيل الآلات السحرية. هل سيتمكن كودي من إنقاذ قريته باستخدام البرمجة؟ انضم إليه في رحلة شيقة لتعلّم البرمجة بأسلوب ممتع وسهل للأطفال! 🎮👦🤖', '[6-8]', 'volunteer', 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `story_parts`
--

CREATE TABLE `story_parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `story_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `story_parts`
--

INSERT INTO `story_parts` (`id`, `story_id`, `title`, `description`, `order`, `created_at`, `updated_at`) VALUES
(5, 5, 'مقدمة', 'يقدم هذا الجزء نظرة عامة على لغة جافاسكريبت، تاريخها، أهميتها في تطوير الويب، وكيفية عملها داخل المتصفح. ستتعرف على أساسيات تشغيل جافاسكريبت في صفحات الويب وأدوات المطور التي تساعدك على التجربة والتصحيح.', 3, '2025-03-13 14:50:53', '2025-03-16 09:20:21'),
(6, 5, 'الكتاب السحري 📖✨', 'أثناء استكشافه مكتبة جده القديمة، يعثر كودي على كتاب غامض يحمل رموزًا غريبة. عندما يلمسه، يضيء الكتاب ويبدأ في عرض أكواد برمجية تتحرك في الهواء! فجأة، يظهر الروبوت توتو، معلنًا أن كودي قد تم اختياره ليكون مبرمج المغامرات. لكن قبل أن يبدأ، عليه أن يتعلم أساسيات البرمجة لفك شفرة الكتاب وفتح البوابة الأولى نحو عالم الألغاز الرقمية!', 1, '2025-03-19 06:52:24', '2025-03-19 06:52:24'),
(7, 5, 'المتاهة الرقمية 🏰🔢', 'يجد كودي وتوتو نفسيهما داخل متاهة افتراضية مليئة بالعقبات المغلقة بالأكواد السرية. كل باب يحتاج إلى حل برمجي لفتحه، وعليه استخدام الجمل الشرطية والحلقات البرمجية ليشق طريقه للخروج. لكن المفاجأة أن هناك خطأ في إحدى الأكواد قد يؤدي إلى حبسهم داخل المتاهة للأبد! هل سيتمكن كودي من تصحيح الكود وإنقاذ نفسه وتوتو؟ 🚀🔍', 2, '2025-03-19 06:53:02', '2025-03-19 06:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `story_part_user`
--

CREATE TABLE `story_part_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `story_part_id` bigint(20) UNSIGNED NOT NULL,
  `is_quiz_success` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `story_part_user`
--

INSERT INTO `story_part_user` (`id`, `user_id`, `story_part_id`, `is_quiz_success`, `created_at`, `updated_at`) VALUES
(1, 13, 6, 0, '2025-04-10 07:47:00', '2025-04-10 07:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) DEFAULT NULL,
  `preferred_language` enum('java','python','javascript','php') DEFAULT NULL,
  `interests` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`interests`)),
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `age`, `preferred_language`, `interests`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', NULL, '$2y$12$jTWyi5GwrtLHCeNmMT7SYOETMedAqBtLCfKeTDdSJSaPtf9IArKrG', NULL, 1, NULL, NULL, NULL, NULL, '2025-03-12 06:45:16', '2025-03-12 06:45:16'),
(3, 'volunteer', 'volunteer', 'volunteer@gmail.com', NULL, '$2y$12$tiEcFoXzPH52K2b.mnrG2ewgYPYP4DlLGJFY8QTJ1y8aYpMHHCFQK', NULL, 2, NULL, NULL, NULL, NULL, '2025-03-12 07:01:55', '2025-03-12 07:01:55'),
(9, 'أحمد محمد', 'أحمد محمد', 'parent@gmail.com', NULL, '$2y$12$DPu7W6GWDOBN0Uo16f4bsOy7.jWNHz/KRwjNn2Ho5HKsFrQhiAXHa', NULL, 3, NULL, NULL, NULL, NULL, '2025-03-19 06:13:42', '2025-03-19 06:13:42'),
(10, 'محمد', 'محمد', 'child@gmail.com', NULL, '$2y$12$DUozJbHXN97vs.gPi8jFt.dvdl6YN/wUiALfU9ZPiY1pOqDdcYBlq', NULL, 4, 7, 'javascript', '[\"music\",\"reading\"]', 9, '2025-03-19 06:14:21', '2025-03-19 06:17:22'),
(12, 'ابراهيم', 'ابراهيم', 'ibrahim@gmail.com', NULL, '$2y$12$qFrjwXigXCLrQTk4PZjlHesXSQeS8TVdSeKWZ6rBQLFrdWiP8j9RO', NULL, 3, NULL, NULL, NULL, NULL, '2025-03-26 04:31:56', '2025-03-26 04:31:56'),
(13, 'هايدي', 'هايدي', 'heidi@gmail.com', NULL, '$2y$12$Ogz2qgc2Np9lb6sNxAz9EO28160gHoJ7XajmPhuaBeqR4wd9qb/3u', NULL, 4, 10, 'python', '[\"sports\",\"music\"]', 12, '2025-03-26 04:33:08', '2025-03-26 04:33:08'),
(14, 'ماجد', 'ماجد', 'majed@gmail.com', NULL, '$2y$12$KU6swxNZ3NFh/IOpj05VgOF2LwzaQexQH.h.jr5K2fyu47/cZuSTu', NULL, 4, 4, 'php', '[\"music\"]', 12, '2025-04-08 03:41:39', '2025-04-08 03:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_points`
--

CREATE TABLE `user_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_points`
--

INSERT INTO `user_points` (`id`, `user_id`, `points`, `reason`, `created_at`, `updated_at`) VALUES
(1, 13, 5, 'quiz', '2025-04-10 07:47:24', '2025-04-10 07:48:23'),
(2, 13, 3, 'quiz', '2025-04-10 07:49:00', '2025-04-10 07:49:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kid_activity_logs`
--
ALTER TABLE `kid_activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kid_activity_logs_kid_id_foreign` (`kid_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `proposed_stories`
--
ALTER TABLE `proposed_stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposed_stories_parent_id_foreign` (`parent_id`),
  ADD KEY `proposed_stories_category_id_foreign` (`category_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_story_part_id_foreign` (`story_part_id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `question_options_question_id_option_text_unique` (`question_id`,`option_text`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stories_parent_id_foreign` (`volunteer_id`),
  ADD KEY `stories_category_id_foreign` (`category_id`);

--
-- Indexes for table `story_parts`
--
ALTER TABLE `story_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `story_parts_story_id_foreign` (`story_id`);

--
-- Indexes for table `story_part_user`
--
ALTER TABLE `story_part_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `story_part_user_user_id_story_part_id_unique` (`user_id`,`story_part_id`),
  ADD KEY `story_part_user_story_part_id_foreign` (`story_part_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `user_points`
--
ALTER TABLE `user_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_points_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kid_activity_logs`
--
ALTER TABLE `kid_activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposed_stories`
--
ALTER TABLE `proposed_stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `story_parts`
--
ALTER TABLE `story_parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `story_part_user`
--
ALTER TABLE `story_part_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_points`
--
ALTER TABLE `user_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kid_activity_logs`
--
ALTER TABLE `kid_activity_logs`
  ADD CONSTRAINT `kid_activity_logs_kid_id_foreign` FOREIGN KEY (`kid_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proposed_stories`
--
ALTER TABLE `proposed_stories`
  ADD CONSTRAINT `proposed_stories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `proposed_stories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_story_part_id_foreign` FOREIGN KEY (`story_part_id`) REFERENCES `story_parts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `question_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `stories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `stories_parent_id_foreign` FOREIGN KEY (`volunteer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `story_parts`
--
ALTER TABLE `story_parts`
  ADD CONSTRAINT `story_parts_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `story_part_user`
--
ALTER TABLE `story_part_user`
  ADD CONSTRAINT `story_part_user_story_part_id_foreign` FOREIGN KEY (`story_part_id`) REFERENCES `story_parts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `story_part_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_points`
--
ALTER TABLE `user_points`
  ADD CONSTRAINT `user_points_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
