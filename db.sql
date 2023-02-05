
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `roleid` int(11) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `mobile` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `voter_identification_number` varchar(255) NOT NULL UNIQUE,
  `polling_unit_number` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `otp` int(4) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `lga` varchar(255) DEFAULT NULL,
  `ward` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
    `video_runtime` time NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `attachments` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `fileid` int(11) NOT NULL,
    `type` varchar(255) NOT NULL,
    `file` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
