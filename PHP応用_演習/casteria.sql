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
	`del_flg` int(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ(1: 削除、0: 有効)',
	`created_at` DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '送信日時'
);

--
-- Test
--

INSERT INTO contacts (name, kana, tel, email, body) VALUES
	('test1', 'テスト1', '09011111111', 'test1@test.com', 'test1'),
	('test2', 'テスト2', '09022222222', 'test2@test.com', 'test2'),
	('test3', 'テスト3', '09033333333', 'test3@test.com', 'test3');
