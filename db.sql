
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
  `sample_video` varchar(255) NULL DEFAULT NULL,
  `instructor_status` enum('unapplied', 'pending', 'approved', 'declined') NOT NULL DEFAULT 'unapplied',
  `twitter_url` varchar(255) NULL DEFAULT NULL,
  `facebook_url` varchar(255) NULL DEFAULT NULL,
  `linkedin_url` varchar(255) NULL DEFAULT NULL,
  `youtube_url` varchar(255) NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `link` varchar(255) NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `users` (`id`, `type`, `roleid`, `fullname`, `email`, `mobile`, `gender`, `photo`, `address`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 'Admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$E05vG7R7UqUTeCKFm594Yebn1NcoIKwJrv5NejHC0KupnTt6kAk7.', NULL, 1, '2023-02-08 12:09:17', '2023-02-08 12:09:17');


CREATE TABLE IF NOT EXISTS `courses` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `short_description` text NOT NULL,
    `description` text NOT NULL,
    `instructor` int(11) NOT NULL,
    `category` int(11) NOT NULL,
    `subcategory` int(11) NOT NULL DEFAULT 0,
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
    `ratings` int(11) NOT NULL DEFAULT 0,
    `link` varchar(255) NULL DEFAULT NULL,
    `status` varchar(255) NOT NULL DEFAULT 'pending',
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
    `media_video` varchar(255) NULL DEFAULT NULL,
    `media_type` varchar(255) NOT NULL,
    `is_free` tinyint(1) NOT NULL DEFAULT 0,
    `downloadable` tinyint(1) NOT NULL DEFAULT 0,
    `lecture_type` varchar(255) NOT NULL DEFAULT 'video',
    `document` varchar(255) NULL DEFAULT NULL,
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
    `description` varchar(255) NULL DEFAULT NULL,
    `icon` varchar(255) NULL DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `ratings` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `userid` int(11) NOT NULL,
    `courseid` int(11) NOT NULL,
    `vote` int(1) NOT NULL DEFAULT 1,
    `comment` text NOT NULL DEFAULT '',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `transactions` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `userid` int(11) NOT NULL,
    `courseid`  int(11) NULL  DEFAULT NULL,
    `quizid` int(11) NULL  DEFAULT NULL,
    `reference` varchar(255) NOT NULL,
    `amount` decimal(25,2) NOT NULL DEFAULT 0.00,
    `discount` decimal(25,2) NOT NULL DEFAULT 0.00,
    `total` decimal(25,2) NOT NULL DEFAULT 0.00,
    `status` varchar(255) NOT NULL DEFAULT 'pending',
    `type` varchar(255) NOT NULL,
    `referral` tinyint(1) NOT NULL DEFAULT 0,
    `payment_method` varchar(255) NOT NULL ,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `enrolled` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `userid` int(11) NOT NULL,
    `courseid`  int(11) NOT NULL,
    `is_free` tinyint(1) NOT NULL DEFAULT 0,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `quiz_enrolled` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `userid` int(11) NOT NULL,
    `questionid`  int(11) NOT NULL,
    `is_free` tinyint(1) NOT NULL DEFAULT 0,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `likes` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `userid` int(11) NOT NULL,
    `courseid`  int(11)  NULL DEFAULT NULL,
    `questionid`  int(11)  NULL DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `notifications` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `userid` int(11) NOT NULL,
    `courseid`  int(11)  NULL DEFAULT NULL,
    `message` text  NULL DEFAULT NULL,
    `seen` tinyint(1) NOT NULL DEFAULT 0,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




CREATE TABLE IF NOT EXISTS `contacts` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `phone` varchar(255) NOT NULL,
    `subject` varchar(255) NOT NULL,
    `message` text  NULL DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- Quiz
CREATE TABLE IF NOT EXISTS `questions` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `userid` int(11) NOT NULL,
    `topicid` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `time` int(11) NOT NULL,
    `price` decimal(25,2) NULL DEFAULT NULL,
    `isfree` tinyint(1) NOT NULL DEFAULT 0,
    `image` varchar(255) NOT NULL,
    `likes` int(11) NOT NULL DEFAULT 0,
    `ratings` int(11) NOT NULL DEFAULT 0,
    `description` text NULL DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `quiz` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `topic` int(11) NOT NULL,
    `qid` int(11) NOT NULL,
    `question` text NOT NULL,
    `a` text NOT NULL,
    `b` text NOT NULL,
    `c` text NOT NULL,
    `d` text NOT NULL,
    `e` text NULL DEFAULT NULL,
    `answer_option` varchar(255) NOT NULL,
    `explanation` text NOT NULL DEFAULT '',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `topics` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `image` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `answers` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `qid` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `topic` int(11) NOT NULL,
    `question` int(11) NOT NULL,
    `select` varchar(50) NULL DEFAULT NULL,
    `mark` tinyint(1) NOT NULL DEFAULT 0,
    `answer` varchar(50) NULL DEFAULT NULL,
    `ref` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wallet` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `userid` int(11) NOT NULL,
    `balance` decimal(25,2) NOT NULL DEFAULT 0.00,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- create wallet for admin
INSERT INTO `wallet` (`userid`, `balance`) VALUES (1, 0.00);


CREATE TABLE IF NOT EXISTS `earnings` (
    `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `userid` int(11) NOT NULL,
    `courseid` int(11) NULL DEFAULT NULL,
    `questionid` int(11) NULL DEFAULT NULL,
    `type` varchar(255) NOT NULL,
    `amount` decimal(25,2) NOT NULL DEFAULT 0.00,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
