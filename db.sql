
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type` varchar(255) NOT NULL DEFAULT 'student',
  `roleid` int(11) DEFAULT NULL DEFAULT 3,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `mobile` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `about_me` text NULL DEFAULT NULL,
  `job_title` varchar(255) NULL DEFAULT NULL,
  `skills` text NULL DEFAULT NULL,
  `school_name` varchar(255) NULL DEFAULT NULL,
  `degree` varchar(255) NULL DEFAULT NULL,
  `employment_title` varchar(255) NULL DEFAULT NULL,
  `employment_company` varchar(255) NULL DEFAULT NULL,
  `account_name` varchar(255) NULL DEFAULT NULL,
  `account_number` varchar(255) NULL DEFAULT NULL,
  `bank_name` varchar(255) NULL DEFAULT NULL,
  `cv` varchar(255) NULL DEFAULT NULL,
  `certificate` varchar(255) NULL DEFAULT NULL,
  `instructor_status` enum('unapplied', 'pending', 'approved', 'declined') NOT NULL DEFAULT 'unapplied',
  `twitter_url` varchar(255) NULL DEFAULT NULL,
  `facebook_url` varchar(255) NULL DEFAULT NULL,
  `linkedin_url` varchar(255) NULL DEFAULT NULL,
  `youtube_url` varchar(255) NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `users` (`id`, `type`, `roleid`, `fullname`, `email`, `mobile`, `gender`, `photo`, `address`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 'Admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$E05vG7R7UqUTeCKFm594Yebn1NcoIKwJrv5NejHC0KupnTt6kAk7.', NULL, 1, '2023-02-08 12:09:17', '2023-02-08 12:09:17');


CREATE TABLE IF NOT EXISTS `courses` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `short_description` text NOT NULL,
    `description` text NOT NULL,
    `instructor` int(11) NOT NULL,
    `category` int(11) NOT NULL,
    `course_level` int(11) NOT NULL,
    `will_learn` text NOT NULL,
    `prerequisites` text NOT NULL,
    `is_free` tinyint(1) NOT NULL DEFAULT 1,
    `require_enroll` tinyint(1) NOT NULL DEFAULT 0,
    `require_login` tinyint(1) NOT NULL DEFAULT 0,
    `amount` decimal(25,2) NOT NULL DEFAULT 0.00,
    `discount` decimal(25,2) NOT NULL DEFAULT 0.00,
    `media_video` varchar(255) NOT NULL,
    `media_type` varchar(255) NOT NULL,
    `media_thumbnail` varchar(255) NULL DEFAULT NULL,
    `likes` int(11) NOT NULL DEFAULT 0,
    `enrolled` int(11) NOT NULL DEFAULT 0,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `curriculum` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `courseid` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `curriculum_lecture` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `courseid` int(11) NOT NULL,
    `curriculumid` int(11) NOT NULL,
    `title` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `media_video` varchar(255) NOT NULL,
    `media_type` varchar(255) NOT NULL,
    `media_thumbnail` varchar(255) NULL DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `attachments` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `field` int(11) NOT NULL,
    `type` varchar(255) NOT NULL,
    `file` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `categories` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `parentid` int(11) NULL DEFAULT NULL,
    `description` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
