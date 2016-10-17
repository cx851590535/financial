/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : financial

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-10-11 18:42:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2016_09_05_081309_entrust_setup_tables', '1');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(10) NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(2) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型（1：菜单，2：功能）',
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', '13', '', '0', '/user/index', '1', '用户管理', '用户管理页面', '2016-09-06 16:54:02', '2016-09-06 16:54:05');
INSERT INTO `permissions` VALUES ('2', '13', '', '0', '/user/add', '2', '添加用户', '添加用户', '2016-09-06 16:54:09', '2016-09-06 16:54:12');
INSERT INTO `permissions` VALUES ('3', '13', '', '1', '/permission/index', '1', '权限信息', '权限列表', '2016-09-07 11:15:20', '2016-09-07 11:15:23');
INSERT INTO `permissions` VALUES ('12', '13', '', '2', '/permission/add', '2', '添加权限', '权限添加', '2016-09-09 10:37:14', '2016-09-09 10:37:18');
INSERT INTO `permissions` VALUES ('13', '0', 'icon-cog', '1', '#a', '1', '系统设置', '系统设置主菜单', '2016-09-09 10:39:05', '2016-09-23 15:47:42');
INSERT INTO `permissions` VALUES ('14', '13', '', '2', '/permission/role/show', '1', '权限分配', '权限分配页面', '2016-09-09 11:16:40', '2016-09-09 11:16:43');
INSERT INTO `permissions` VALUES ('15', '13', '', '0', '/permission/role/set', '2', '权限分配', '权限分配功能', '2016-09-09 11:17:34', '2016-09-09 11:17:37');
INSERT INTO `permissions` VALUES ('16', '13', '', '0', '/permission/role/get', '2', '权限获取', '根据角色获取权限', '2016-09-13 15:21:23', '2016-09-13 15:21:26');
INSERT INTO `permissions` VALUES ('17', '13', '', '6', '/permission/del', '2', '删除权限', '删除权限', '2016-09-13 18:38:20', '2016-09-13 18:38:20');
INSERT INTO `permissions` VALUES ('18', '13', '', '7', '/permission/modfy', '2', '修改权限', '修改权限功能', '2016-09-14 10:13:20', '2016-09-14 10:13:20');
INSERT INTO `permissions` VALUES ('19', '13', '', '3', '/role/index', '1', '角色管理', '角色管理菜单页面', '2016-09-14 10:16:51', '2016-09-14 10:16:51');
INSERT INTO `permissions` VALUES ('20', '13', '', '4', '/user/check', '2', '检查用户名是否存在', '判断账户是否存在', '2016-09-20 15:28:45', '2016-09-20 15:28:45');
INSERT INTO `permissions` VALUES ('21', '13', '', '0', '/user/forbid', '2', '修改用户状态', '修改用户状态', '2016-09-20 16:48:40', '2016-09-20 16:48:40');
INSERT INTO `permissions` VALUES ('28', '13', '', '0', '/user/del', '2', '删除用户', '删除用户', '2016-09-20 17:06:45', '2016-09-20 17:06:45');
INSERT INTO `permissions` VALUES ('29', '13', '', '0', '/role/add', '2', '添加角色', '', '2016-09-23 10:43:28', '2016-09-23 10:43:28');
INSERT INTO `permissions` VALUES ('30', '13', '', '0', '/role/del', '2', '删除角色', '删除角色', '2016-09-23 10:43:59', '2016-09-23 10:43:59');
INSERT INTO `permissions` VALUES ('31', '0', 'icon-shopping-cart', '2', '#b', '1', '商品管理', '商品接口管理', '2016-09-23 15:40:08', '2016-09-23 15:48:52');
INSERT INTO `permissions` VALUES ('32', '31', '', '1', '/product/list', '1', '商品列表', '获取商品列表', '2016-09-23 15:50:00', '2016-09-23 15:50:00');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('1', '1');
INSERT INTO `permission_role` VALUES ('2', '1');
INSERT INTO `permission_role` VALUES ('3', '1');
INSERT INTO `permission_role` VALUES ('12', '1');
INSERT INTO `permission_role` VALUES ('13', '1');
INSERT INTO `permission_role` VALUES ('14', '1');
INSERT INTO `permission_role` VALUES ('15', '1');
INSERT INTO `permission_role` VALUES ('16', '1');
INSERT INTO `permission_role` VALUES ('17', '1');
INSERT INTO `permission_role` VALUES ('18', '1');
INSERT INTO `permission_role` VALUES ('19', '1');
INSERT INTO `permission_role` VALUES ('20', '1');
INSERT INTO `permission_role` VALUES ('21', '1');
INSERT INTO `permission_role` VALUES ('28', '1');
INSERT INTO `permission_role` VALUES ('29', '1');
INSERT INTO `permission_role` VALUES ('30', '1');
INSERT INTO `permission_role` VALUES ('31', '1');
INSERT INTO `permission_role` VALUES ('32', '1');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', '管理员', '管理员', '管理员', '2016-09-06 16:55:01', '2016-09-06 16:55:03');
INSERT INTO `roles` VALUES ('3', '普通用户', '普通用户', '普通用户', '2016-09-23 11:09:59', '2016-09-23 11:09:59');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `account` varchar(12) CHARACTER SET utf8mb4 NOT NULL COMMENT '用户登录帐号',
  `nickname` varchar(40) CHARACTER SET utf8mb4 NOT NULL COMMENT '用户昵称',
  `password` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `roleid` int(2) NOT NULL COMMENT '角色编号',
  `status` tinyint(1) NOT NULL COMMENT '状态（1：启用，2：禁用）',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '陈祥', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '2016-09-06 10:14:25', '2016-09-06 10:14:25');
