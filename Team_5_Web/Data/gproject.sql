/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : gproject

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 20xx-xx-xx 14:56:36
*/

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Admin id',
  `adminName` varchar(32) NOT NULL COMMENT 'User login account',
  `adminPwd` varchar(32) NOT NULL COMMENT 'User login password',
  `adminRealName` varchar(32) DEFAULT NULL COMMENT 'Admin formal name',
  `adminSex` tinyint(4) DEFAULT '1' COMMENT '1Male、2Female',
  `adminAge` tinyint(4) DEFAULT NULL COMMENT 'Admin age',
  `adminPhone` varchar(11) DEFAULT NULL COMMENT 'Admin contact number',
  `adminEmail` varchar(32) DEFAULT NULL,
  `adminAddress` varchar(256) DEFAULT NULL COMMENT 'Admin address',
  `createTime` varchar(12) DEFAULT NULL COMMENT 'creation time',
  `updateTime` varchar(12) DEFAULT NULL COMMENT 'User last information update time、默认为账户creation time',
  `state` tinyint(4) DEFAULT '1' COMMENT '1Super Admin 、2Teacher Admin 、3Student Admin ',
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `gproject`;
CREATE TABLE `gproject` (
  `gpId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Proposal ID',
  `gpThrId` int(11) DEFAULT NULL COMMENT 'Supervised Professor ID',
  `gpTitle` varchar(128) DEFAULT NULL COMMENT 'Proposal Name',
  `gpContent` varchar(2048) DEFAULT NULL COMMENT 'Proposal Content',
  `gpAim` varchar(128) DEFAULT NULL COMMENT 'Proposal Intension',
  `gpRequest` varchar(128) DEFAULT NULL COMMENT 'Proposal Requirements',
  `gpMust` varchar(128) DEFAULT NULL COMMENT 'Required Knowledge',
  `gpFormal` varchar(128) DEFAULT NULL COMMENT 'Form of Submittion',
  `gpOthers` varchar(2048) DEFAULT NULL COMMENT 'Proposal Relevant Note',
  `gpSHState` tinyint(4) DEFAULT '1' COMMENT '1Software Direction，2Hardware Direction',
  `createTime` varchar(12) DEFAULT NULL COMMENT 'Creation Time',
  `updateTime` varchar(12) DEFAULT NULL COMMENT 'updateTime',
  `state` tinyint(4) DEFAULT '1' COMMENT '0fail to pass 1passed but not assigned、2passed and assigned、3passed、-1fail to pass',
  PRIMARY KEY (`gpId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `major`;
CREATE TABLE `major` (
  `majorId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Major ID',
  `majorName` varchar(64) DEFAULT NULL COMMENT 'Major Name',
  PRIMARY KEY (`majorId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


INSERT INTO `major` VALUES ('1', 'CS');
INSERT INTO `major` VALUES ('2', 'IoT');
INSERT INTO `major` VALUES ('3', 'Communication');
INSERT INTO `major` VALUES ('4', 'Electronic Science and Technology');
INSERT INTO `major` VALUES ('5', 'Electronic Information Engineering');
INSERT INTO `major` VALUES ('6', 'Electronic Information Science and Technology');


DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `msgId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Message ID',
  `msgParentId` int(11) DEFAULT NULL COMMENT 'Used for replying',
  `msgFromId` int(11) DEFAULT NULL COMMENT 'Message Sender',
  `msgAccessId` int(11) DEFAULT NULL COMMENT 'Message Receiver',
  `msgContent` varchar(1024) DEFAULT NULL COMMENT 'Message Content',
  `createTime` varchar(12) DEFAULT NULL COMMENT 'Message Sent time',
  `state` tinyint(4) DEFAULT '1' COMMENT '1Student->Teacher -1Teacher->Studetn  2Admin->Student -2Admin->Teacher',
  `showStu` tinyint(4) DEFAULT '1' COMMENT '1Visiable -1Invisiable',
  `showThr` tinyint(4) DEFAULT '1' COMMENT '1Visiable -1Invisiable',
  PRIMARY KEY (`msgId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `plan`;
CREATE TABLE `plan` (
  `planId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Plan List ID',
  `plnStuId` int(11) NOT NULL,
  `plnThrId` int(11) NOT NULL,
  `plnGpId` int(11) NOT NULL,
  `endtime1` varchar(20) DEFAULT NULL,
  `title1` varchar(64) DEFAULT NULL,
  `other1` varchar(256) DEFAULT NULL,
  `endtime2` varchar(20) DEFAULT NULL,
  `title2` varchar(64) DEFAULT NULL,
  `other2` varchar(256) DEFAULT NULL,
  `endtime3` varchar(20) DEFAULT NULL,
  `title3` varchar(64) DEFAULT NULL,
  `other3` varchar(256) DEFAULT NULL,
  `endtime4` varchar(20) DEFAULT NULL,
  `title4` varchar(64) DEFAULT NULL,
  `other4` varchar(256) DEFAULT NULL,
  `endtime5` varchar(20) DEFAULT NULL,
  `title5` varchar(64) DEFAULT NULL,
  `other5` varchar(256) DEFAULT NULL,
  `endtime6` varchar(20) DEFAULT NULL,
  `title6` varchar(64) DEFAULT NULL,
  `other6` varchar(256) DEFAULT NULL,
  `endtime7` varchar(20) DEFAULT NULL,
  `title7` varchar(64) DEFAULT NULL,
  `other7` varchar(256) DEFAULT NULL,
  `flag` tinyint(4) DEFAULT '1',
  `createTime` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`planId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `stlinks`;
CREATE TABLE `stlinks` (
  `stlId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Proposal Selection Relationship Table',
  `stlSpId` int(11) DEFAULT NULL COMMENT 'Proposal ID',
  `stlThrId` int(11) DEFAULT NULL COMMENT 'Professor ID',
  `stlStuId` int(11) DEFAULT NULL COMMENT 'Student ID',
  `createTime` varchar(12) DEFAULT NULL COMMENT 'Creation Time',
  `updateTime` varchar(12) DEFAULT NULL COMMENT 'Update TIme',
  `state` tinyint(4) DEFAULT '1' COMMENT '1Chosen、2Comfirmed、3Abandon',
  PRIMARY KEY (`stlId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `stuId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Student ID',
  `stuCard` varchar(32) NOT NULL COMMENT 'User login account is Student ID',
  `stuPwd` varchar(32) NOT NULL COMMENT 'User login password',
  `stuRealName` varchar(32) DEFAULT NULL COMMENT 'Student name',
  `stuSex` tinyint(4) DEFAULT '1' COMMENT '1 Male, 2 Female',
  `stuAge` tinyint(4) DEFAULT NULL COMMENT 'Student age',
  `stuPhone` varchar(11) DEFAULT NULL COMMENT 'Student contact number',
  `stuEmail` varchar(32) DEFAULT NULL,
  `stuMajor` tinyint(4) DEFAULT NULL COMMENT 'Student facalty',
  `createTime` varchar(12) DEFAULT NULL COMMENT 'Account create time',
  `updateTime` varchar(12) DEFAULT NULL COMMENT 'User info last updated time, default time = account open time',
  `state` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`stuId`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `thrId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User ID',
  `thrName` varchar(32) NOT NULL COMMENT 'User login account',
  `thrPwd` varchar(32) NOT NULL COMMENT 'User login password',
  `thrRealName` varchar(32) DEFAULT NULL COMMENT 'User formal name',
  `thrSex` tinyint(4) DEFAULT '1' COMMENT '1Male、2Female',
  `thrAge` tinyint(4) DEFAULT NULL COMMENT 'User age',
  `thrStudy` varchar(128) DEFAULT NULL COMMENT 'User Research Direction',
  `thrEmail` varchar(32) DEFAULT NULL,
  `thrPhone` varchar(11) DEFAULT NULL COMMENT 'User contact number',
  `showState` char(4) DEFAULT NULL COMMENT 'phone, email, address, study',
  `thrAddress` varchar(256) DEFAULT NULL COMMENT 'User office address',
  `createTime` varchar(12) DEFAULT NULL COMMENT 'creation time',
  `updateTime` varchar(12) DEFAULT NULL COMMENT 'User last information update time、dafault is creation time',
  `state` tinyint(4) DEFAULT '1' COMMENT '1Normal -1Trash',
  PRIMARY KEY (`thrId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

studentstudent