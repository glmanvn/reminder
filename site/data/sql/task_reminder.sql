/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : task_reminder

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2012-12-14 16:12:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `migration_version`
-- ----------------------------
DROP TABLE IF EXISTS `migration_version`;
CREATE TABLE `migration_version` (
  `version` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of migration_version
-- ----------------------------
INSERT INTO `migration_version` VALUES ('2');

-- ----------------------------
-- Table structure for `sf_guard_forgot_password`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_forgot_password`;
CREATE TABLE `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sf_guard_forgot_password
-- ----------------------------

-- ----------------------------
-- Table structure for `sf_guard_group`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_group`;
CREATE TABLE `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sf_guard_group
-- ----------------------------

-- ----------------------------
-- Table structure for `sf_guard_group_permission`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_group_permission`;
CREATE TABLE `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sf_guard_group_permission
-- ----------------------------

-- ----------------------------
-- Table structure for `sf_guard_permission`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_permission`;
CREATE TABLE `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sf_guard_permission
-- ----------------------------

-- ----------------------------
-- Table structure for `sf_guard_remember_key`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_remember_key`;
CREATE TABLE `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sf_guard_remember_key
-- ----------------------------
INSERT INTO `sf_guard_remember_key` VALUES ('1', '2', '8r4fm2ntig00ok0o8ks0ksooc84wsos', '127.0.0.1', '2012-12-12 18:06:53', '2012-12-12 18:06:53');

-- ----------------------------
-- Table structure for `sf_guard_user`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user`;
CREATE TABLE `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sf_guard_user
-- ----------------------------
INSERT INTO `sf_guard_user` VALUES ('1', 'Le', 'An', 'anld@isoftco.com', 'admin', 'sha1', 'b49eb0ac50ef67d22bc706303076180e', '1acd9d76612f2d7fca927f882a351e286b69acce', '1', '1', '2012-12-14 09:53:58', '2012-12-11 10:00:20', '2012-12-14 09:53:58');
INSERT INTO `sf_guard_user` VALUES ('2', 'Le ', 'Duc An', 'anldisoftco@isoftco.com', 'anld', 'sha1', 'bdb46177d34b95bbd51c80a3afb37e2f', '097d90abbeb8157a41e93f6f70bd2802e4382c3f', '1', '0', '2012-12-13 16:37:32', '2012-12-12 18:06:38', '2012-12-13 16:37:32');

-- ----------------------------
-- Table structure for `sf_guard_user_group`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user_group`;
CREATE TABLE `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`),
  CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sf_guard_user_group
-- ----------------------------

-- ----------------------------
-- Table structure for `sf_guard_user_permission`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user_permission`;
CREATE TABLE `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sf_guard_user_permission
-- ----------------------------

-- ----------------------------
-- Table structure for `task`
-- ----------------------------
DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `task_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `task_description` text COLLATE utf8_unicode_ci,
  `assigned_to` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reminded_count` bigint(20) NOT NULL DEFAULT '0',
  `remind_1st_at` datetime DEFAULT NULL,
  `remind_2rd_at` datetime DEFAULT NULL,
  `remind_3th_at` datetime DEFAULT NULL,
  `reminder_email1` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reminder_email2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `completed_by` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `priority` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of task
-- ----------------------------
INSERT INTO `task` VALUES ('1', '1', 'Kiểm tra phòng 201', 'KH YEU CAU', 'Nguyen Van An', '0', '2012-12-11 16:12:00', '2012-12-13 14:21:41', '2012-12-13 14:32:41', 'anld@isoftco.com', 'anld.agrib@gmail.com', 'Le Duc An', null, '2012-12-14 07:19:00', '2012-12-13 14:21:14', '0', '1');
INSERT INTO `task` VALUES ('2', '2', 'Kiểm tra phòng 202', 'KH LAI YEU CAU', 'Nguyen Van An', '0', '2012-12-11 16:12:00', '2012-12-13 14:32:41', '2012-12-13 14:47:00', 'anld@isoftco.com', 'anld.agrib@gmail.com', null, null, '2012-12-14 07:19:00', '2012-12-13 14:32:40', '0', '3');
INSERT INTO `task` VALUES ('3', '1', 'Nội dung tiếng Việt', 'AAAAAAAAAAAAAAAA', 'BBB', '0', '2012-12-13 14:32:41', '2012-12-13 14:47:00', '2012-12-14 15:38:00', 'anld@isoftco.com', 'anld.agrib@gmail.com', 'Lê Đức An', '2012-12-14 15:32:52', '2012-12-14 07:19:00', '2012-12-14 15:32:52', '0', '5');
INSERT INTO `task` VALUES ('4', '1', 'Cong viec test', 'KH Yeu cau', 'Nguyen Van An', '0', '2012-12-13 14:13:41', '2012-12-14 15:43:00', null, 'anld@isoftco.com', 'anld.agrib@gmail.com', null, null, '2012-12-14 07:19:00', '2012-12-14 15:28:47', '0', '5');
INSERT INTO `task` VALUES ('5', '1', 'Nhắc việc phòng 2012', 'KH yêu cầu kiểm tra đường cáp quang', 'Nguyen Van An', '0', '2012-12-14 06:09:00', '2012-12-14 15:39:00', null, 'anldisoftco@isoftco.com', 'anld.agrib@gmail.com', null, null, '2012-12-14 07:19:00', '2012-12-14 06:10:24', '0', '5');
INSERT INTO `task` VALUES ('6', '1', 'Công việc test nội dung liên quan đến email', 'Setup và thực hiện gửi email xong với sfMailer. Email management in symfony is centered around a mailer object. And like many other core symfony objects, the mailer is a factory. It is configured in the factories.yml configuration file, and always available via the context instance:\r\n\r\nEmail management in symfony is centered around a mailer object. And like many other core symfony objects, the mailer is a factory. It is configured in the factories.yml configuration file, and always available via the context instance:', 'Lê Đức An', '0', '2012-12-14 15:39:00', null, null, 'anldisoftco@isoftco.com', 'anld.agrib@gmail.com', null, null, '2012-12-14 07:19:00', '2012-12-13 02:58:24', '0', '4');
INSERT INTO `task` VALUES ('7', '1', 'Chép bài Xác suất thống kê', 'AAA\r\nVBBB\r\nCCCC', 'Lê Đức An', '0', '2012-12-14 10:26:00', null, null, 'anld@isoftco.com', 'anld.agrib@gmail.com', null, null, '2012-12-14 07:19:00', '2012-12-13 20:36:12', '0', '5');
INSERT INTO `task` VALUES ('8', '1', 'Day di thoi', 'AAAAAAAAAAAAAAAAAAAAAAAAAA', 'Nguyen Van An', '0', '2012-12-14 07:19:00', '2012-12-14 15:52:00', null, 'anld@isoftco.com', 'anld.agrib@gmail.com', 'Nguyen Van An', '2012-12-14 15:42:45', '2012-12-14 07:19:00', '2012-12-14 15:42:45', '0', '5');

-- ----------------------------
-- Table structure for `task_comment`
-- ----------------------------
DROP TABLE IF EXISTS `task_comment`;
CREATE TABLE `task_comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `task_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `can_view` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `task_id_idx` (`task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of task_comment
-- ----------------------------
INSERT INTO `task_comment` VALUES ('1', '3', '1', 'AAAAAAAAAAAAA', '2012-12-12 01:30:55', '0000-00-00 00:00:00', '1');
INSERT INTO `task_comment` VALUES ('2', '3', '1', 'BBBBBBBBBBBB', '2012-12-12 01:31:07', '0000-00-00 00:00:00', '1');
INSERT INTO `task_comment` VALUES ('3', '3', '1', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAa', '2012-12-12 02:52:17', '2012-12-12 02:52:17', null);
INSERT INTO `task_comment` VALUES ('4', '4', '1', 'AAAAAAAAAAAAAAA', '2012-12-12 17:59:00', '2012-12-12 17:59:00', null);
INSERT INTO `task_comment` VALUES ('5', '6', '2', 'test', '2012-12-13 03:00:36', '2012-12-13 03:00:36', null);
INSERT INTO `task_comment` VALUES ('6', '6', '2', 'test', '2012-12-13 03:09:58', '2012-12-13 03:09:58', null);
INSERT INTO `task_comment` VALUES ('7', '6', '2', 'Test email sending', '2012-12-13 03:13:29', '2012-12-13 03:13:29', null);
