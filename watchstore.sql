# Host: localhost  (Version: 5.7.26)
# Date: 2020-09-20 15:17:07
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES ('root','123456');

#
# Structure for table "order_detail"
#

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `b_o_id` int(11) DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

#
# Data for table "order_detail"
#

INSERT INTO `order_detail` VALUES (17,12,10,1),(18,13,19,1),(19,14,11,1),(20,15,9,1),(21,15,8,2),(24,18,8,10),(25,19,19,4),(26,20,10,1);

#
# Structure for table "order_state"
#

DROP TABLE IF EXISTS `order_state`;
CREATE TABLE `order_state` (
  `os_id` int(11) DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "order_state"
#

INSERT INTO `order_state` VALUES (1,'待发货'),(2,'已发货'),(3,'已收货');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `registertime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'kinson','123456','18900000008','666666666@qq.com','广东','广州市','番禺区','2020-09-04'),(2,'sam','123456','17600000009','888888888@qq.com','广东','东莞市','东莞市','2020-09-08'),(6,'ggko','123456','13170000008','437241304@qq.com','广东','东莞市','东莞市','2020-09-13');

#
# Structure for table "user_address"
#

DROP TABLE IF EXISTS `user_address`;
CREATE TABLE `user_address` (
  `h_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consignee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`h_a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "user_address"
#

INSERT INTO `user_address` VALUES (1,1,'广东','东莞市','东莞市','松山湖东莞理工学院','黄先生','18900000000'),(3,6,'广东','东莞市','东莞市','松山湖东莞理工学院','ggko','13170000000'),(4,2,'广东','东莞市','东莞市','松山湖大学路东莞理工学院','王生','17600000000'),(7,1,'广东','广州市','番禺区','大龙街新桥村','黄生','17600000008'),(8,6,'广东','东莞市','东莞市','松山湖小麦公社','kkgo','15600000009');

#
# Structure for table "watch"
#

DROP TABLE IF EXISTS `watch`;
CREATE TABLE `watch` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `bname` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `modelcode` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `store` int(10) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `sell` int(10) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

#
# Data for table "watch"
#

INSERT INTO `watch` VALUES (8,'CASIO 卡西欧 G-SHOCK 经典复古防水男士手表','CASIO 卡西欧 G-SHOCK 经典复古防水男士手表','W-218H-1A','184','卡西欧(CASIO)','2020-09-04','电子表',35,'5f51f6c3c4392.jpg',15),(9,'CASIO 卡西欧 G-SHOCK 运动防水手表男表 黑金','GA-110系列 黑金双显','GA-110GB-1A','1490','卡西欧(CASIO)','2020-09-06','电子表',57,'5f54d3e6c421b.jpg',9),(10,'TISSOT 天梭 俊雅系列 皮带石英男表','TISSOT 天梭 俊雅系列 皮带石英男表 玫瑰金','T063.610.36.037.00','2550','天梭(TISSOT)','2020-09-06','石英表',11,'5f54db9af3845.jpg',5),(11,'Emporio Armani 阿玛尼 男士手表经典休闲机械镂空时尚男腕表 珍珠白','Emporio Armani 阿玛尼 男士手表经典休闲机械镂空时尚男腕表 珍珠白','AR60007','3999','阿玛尼(Emporio Armani)','2020-09-09','机械表',14,'5f5884159baab.jpg',5),(19,'HUAWEI 华为 WATCH GT2 46MM 智能手表 曜石黑','HUAWEI 华为 WATCH GT2 46MM 智能手表 曜石黑','WATCH GT2-曜石黑','1488','华为(HUAWEI)','2020-09-10','智能手表',16,'5f59e1954b32b.jpg',9);

#
# Structure for table "watch_img"
#

DROP TABLE IF EXISTS `watch_img`;
CREATE TABLE `watch_img` (
  `b_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "watch_img"
#

INSERT INTO `watch_img` VALUES ('8','5f51f6c3c5a62.jpg'),('8','5f51f6c3c70e3.jpg'),('9','5f54d3e6c0c4f.jpg'),('9','5f54d3e6c52a0.jpg'),('10','5f54db9af2563.jpg'),('10','5f54db9af0737.jpg'),('11','5f5884159e5ae.jpg'),('11','5f588415a12b9.png'),('19','5f59e1954e4f3.jpg'),('19','5f59e19550d2c.jpg'),('19','5f59e1955311f.jpg'),('19','5f59e195596c4.jpg');

#
# Structure for table "watch_order"
#

DROP TABLE IF EXISTS `watch_order`;
CREATE TABLE `watch_order` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `all_price` double DEFAULT NULL,
  `discounts` double DEFAULT NULL,
  `pay` double DEFAULT NULL,
  `h_a_id` int(11) DEFAULT NULL,
  `expressNum` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `l_msg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

#
# Data for table "watch_order"
#

INSERT INTO `watch_order` VALUES (13,1,1488,297.6,1190.4,1,'888888888888','2020-09-15 14:18:46','2',NULL),(15,6,1858,371.6,1486.4,3,'12345678912388','2020-09-18 10:38:58','2',NULL),(18,6,1840,0,1840,3,NULL,'2020-09-18 16:46:12','1',NULL),(19,6,5952,0,5952,3,NULL,'2020-09-18 21:05:43','1',NULL),(20,2,2550,0,2550,4,NULL,'2020-09-19 13:38:59','1','66666666');
