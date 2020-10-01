# Host: localhost  (Version: 5.7.26)
# Date: 2020-10-01 21:59:10
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

INSERT INTO `admin` VALUES ('root','7c4a8d09ca3762af61e59520943dc26494f8941b');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

#
# Data for table "order_detail"
#

INSERT INTO `order_detail` VALUES (17,12,10,1),(18,13,19,1),(19,14,11,1),(20,15,9,1),(21,15,8,2),(24,18,8,10),(25,19,19,4),(26,20,10,1),(27,21,29,1),(28,22,23,1),(29,23,24,1),(30,24,26,1),(31,25,22,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'kinson','7c4a8d09ca3762af61e59520943dc26494f8941b','18900000008','666666666@qq.com','广东','广州市','番禺区','2020-09-04'),(2,'sam','7c4a8d09ca3762af61e59520943dc26494f8941b','17600000009','888888888@qq.com','广东','东莞市','东莞市','2020-09-08'),(6,'ggko','7c4a8d09ca3762af61e59520943dc26494f8941b','13170000008','437241304@qq.com','广东','东莞市','东莞市','2020-09-13'),(9,'johnson','7c4a8d09ca3762af61e59520943dc26494f8941b','18900006578','479520136@qq.com','北京','市辖区','东城区','2020-09-27');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "user_address"
#

INSERT INTO `user_address` VALUES (1,1,'广东','东莞市','东莞市','松山湖东莞理工学院','黄先生','18900000000'),(3,6,'广东','东莞市','东莞市','松山湖东莞理工学院','ggko','13170000000'),(4,2,'广东','东莞市','东莞市','松山湖大学路东莞理工学院','王生','17600000000'),(7,1,'广东','广州市','番禺区','大龙街新桥村','黄生','17600000008'),(8,6,'广东','东莞市','东莞市','松山湖小麦公社','kkgo','15600000009'),(9,9,'北京','市辖区','东城区','长安路','john','17633325789'),(11,2,'北京','市辖区','东城区','长安街66号','王燊','15698243587');

#
# Structure for table "user_log"
#

DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "user_log"
#

INSERT INTO `user_log` VALUES (2,'2','sam','127.0.0.1','2020-09-30 09:56:37','登录失败：验证码错误！'),(3,'2','sam','127.0.0.1','2020-09-30 09:56:44','登录成功！'),(4,'1','kinson','127.0.0.1','2020-09-30 21:30:08','登录成功！'),(5,'2','sam','127.0.0.1','2020-10-01 15:05:22','登录成功！'),(6,'1','kinson','127.0.0.1','2020-10-01 15:13:11','登录成功！'),(7,'2','sam','127.0.0.1','2020-10-01 15:25:35','登录成功！'),(8,'1','kinson','127.0.0.1','2020-10-01 15:29:09','登录成功！'),(9,'2','sam','127.0.0.1','2020-10-01 18:08:50','登录成功！');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

#
# Data for table "watch"
#

INSERT INTO `watch` VALUES (8,'CASIO 卡西欧 G-SHOCK 经典复古防水男士手表','CASIO 卡西欧 G-SHOCK 经典复古防水男士手表','W-218H-1A','184','卡西欧(CASIO)','2020-09-04','电子表',35,'5f51f6c3c4392.jpg',15),(9,'CASIO 卡西欧 G-SHOCK 运动防水手表男表 黑金','GA-110系列 黑金双显','GA-110GB-1A','1490','卡西欧(CASIO)','2020-09-06','电子表',57,'5f54d3e6c421b.jpg',9),(10,'TISSOT 天梭 俊雅系列 皮带石英男表','TISSOT 天梭 俊雅系列 皮带石英男表 玫瑰金','T063.610.36.037.00','2550','天梭(TISSOT)','2020-09-06','石英表',11,'5f54db9af3845.jpg',5),(11,'Emporio Armani 阿玛尼 男士手表经典休闲机械镂空时尚男腕表 珍珠白','Emporio Armani 阿玛尼 男士手表经典休闲机械镂空时尚男腕表 珍珠白','AR60007','3999','阿玛尼(Emporio Armani)','2020-09-09','机械表',14,'5f5884159baab.jpg',5),(19,'HUAWEI 华为 WATCH GT2 46MM 智能手表 曜石黑','HUAWEI 华为 WATCH GT2 46MM 智能手表 曜石黑','WATCH GT2-曜石黑','1488','华为(HUAWEI)','2020-09-10','智能手表',16,'5f59e1954b32b.jpg',9),(21,'Emporio Armani 阿玛尼 皮带时尚简约石英手表防水日历男表','Emporio Armani 阿玛尼 皮带时尚简约石英手表防水日历男表','AR2502','1799','阿玛尼(Emporio Armani)','2020-09-24','石英表',25,'5f6c408ba1eb5.jpg',0),(22,'DanielWellington 丹尼尔惠灵顿 DW 32MM 石英手表金边黑色钢带女表','DanielWellington 丹尼尔惠灵顿 DW 32MM 石英手表金边黑色钢带女表','DW00100201','1390','丹尼尔惠灵顿(DanielWellington)','2020-09-24','石英表',14,'5f6c43969aa2c.jpg',1),(23,'TIMEX 天美时 简约夜光石英表欧美表蓝色男表','TIMEX 天美时 简约夜光石英表欧美表蓝色男表','TW4B14100','599','天美时(TIMEX)','2020-09-24','石英表',57,'5f6c455a3f44e.jpg',1),(24,'CASIO 卡西欧 G-SHOCK 方形小金块 防水运动男士手表','CASIO 卡西欧 G-SHOCK 方形小金块 防水运动男士手表','GMW-B500GD-9','3999','卡西欧(CASIO)','2020-09-24','电子表',25,'5f6c483d35190.jpg',1),(25,'CASIO 卡西欧 G-SHOCK 小银块 太阳能不锈钢男士手表','CASIO 卡西欧 G-SHOCK 小银块 太阳能不锈钢男士手表','GMW-B5000D-1','3699','卡西欧(CASIO)','2020-09-24','电子表',24,'5f6c4a692c9b1.jpg',0),(26,'LONGINES 浪琴 康卡斯潜水系列 39MM 自动机械男士腕表','LONGINES 浪琴 康卡斯潜水系列 39MM 自动机械男士腕表','L3.741.4.56.6','9999','浪琴(LONGINES)','2020-09-24','机械表',12,'5f6c4c1e1a5be.jpg',1),(27,'SEIKO 精工 绿水鬼机械表潜水表 男款 绿色','SEIKO 精工 绿水鬼机械表潜水表 男款 绿色','SPB103J1','5880','精工(SEIKO)','2020-09-24','机械表',26,'5f6c4d878439d.jpg',0),(28,'Garmin 佳明 vivoactive3音乐版黑色 VA3M 运动智能手表','Garmin 佳明 vivoactive3音乐版黑色 VA3M 运动智能手表','010-01985-22','2080','佳明(Garmin)','2020-09-24','智能手表',19,'5f6c4f36e0ec5.jpg',0),(29,'苹果 APPLE Watch Series 5 智能手表 黑色','苹果 APPLE Watch Series 5 智能手表','APPLE Watch Series 5 - 黑','3199','苹果(APPLE)','2020-09-24','智能手表',12,'5f6c5068b8235.jpg',1);

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

INSERT INTO `watch_img` VALUES ('8','5f51f6c3c5a62.jpg'),('8','5f51f6c3c70e3.jpg'),('9','5f54d3e6c0c4f.jpg'),('9','5f54d3e6c52a0.jpg'),('10','5f54db9af2563.jpg'),('10','5f54db9af0737.jpg'),('11','5f5884159e5ae.jpg'),('11','5f588415a12b9.png'),('19','5f59e1954e4f3.jpg'),('19','5f59e19550d2c.jpg'),('19','5f59e1955311f.jpg'),('19','5f59e195596c4.jpg'),('21','5f6c408ba5d28.jpg'),('21','5f6c408ba86e4.jpg'),('22','5f6c43969d68c.jpg'),('22','5f6c43969fc0e.jpg'),('23','5f6c455a41a6c.jpg'),('23','5f6c455a4438c.jpg'),('24','5f6c483d383f2.jpg'),('24','5f6c483d43939.jpg'),('25','5f6c4a692fd1c.jpg'),('25','5f6c4a6933485.jpg'),('26','5f6c4c1e1d3c5.jpg'),('26','5f6c4c1e1fa6f.jpg'),('26','5f6c4c1e2366d.jpg'),('27','5f6c4d8787017.jpg'),('27','5f6c4d8789950.jpg'),('28','5f6c4f36e40ce.jpg'),('28','5f6c4f36e6793.jpg'),('28','5f6c4f36e8d5a.jpg'),('29','5f6c5068bb102.jpg'),('29','5f6c5068bea73.jpg');

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
  `payment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

#
# Data for table "watch_order"
#

INSERT INTO `watch_order` VALUES (13,1,1488,297.6,1190.4,1,'888888888888','2020-09-15 14:18:46','3',NULL,'线上支付'),(15,6,1858,371.6,1486.4,3,'12345678912388','2020-09-18 10:38:58','2',NULL,'线上支付'),(18,6,1840,0,1840,3,NULL,'2020-09-18 16:46:12','1',NULL,'线上支付'),(19,6,5952,0,5952,3,NULL,'2020-09-18 21:05:43','1',NULL,'线上支付'),(20,2,2550,0,2550,4,NULL,'2020-09-19 13:38:59','1','66666666','线上支付'),(21,6,3199,639.8,2559.2,3,NULL,'2020-09-24 15:54:49','1',NULL,'线上支付'),(22,2,599,0,599,4,NULL,'2020-09-25 15:22:40','1','6666666','线上支付'),(23,2,3999,0,3999,4,NULL,'2020-09-25 15:32:33','1','88888888','线上支付'),(24,1,9999,1999.8,7999.2,7,NULL,'2020-09-25 15:35:45','1','顺丰快递PLZ','货到付款'),(25,9,1390,0,1390,9,NULL,'2020-09-29 09:21:04','1',NULL,'线上支付');
