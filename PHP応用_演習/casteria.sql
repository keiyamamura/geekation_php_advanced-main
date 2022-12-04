--
-- Database: casteria
--

DROP DATABASE casteria;
CREATE DATABASE IF NOT EXISTS casteria DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE casteria;

--
-- Table structure for table `contacts`
--
CREATE TABLE `contacts` (
	`id` int AUTO_INCREMENT PRIMARY KEY COMMENT 'システムID',
	`name` varchar(50) NOT NULL COMMENT '氏名',
	`kana` varchar(50) NOT NULL COMMENT 'フリガナ',
	`tel` varchar(11) COMMENT '電話番号',
	`email` varchar(100) NOT NULL COMMENT 'メールアドレス',
	`body` text COMMENT 'お問い合わせ内容',
	`created_at` DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '送信日時'
);
