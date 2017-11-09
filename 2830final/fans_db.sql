# Host: localhost  (Version: 5.5.40)
# Date: 2016-05-08 18:45:39
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "fans_comments"
#

DROP TABLE IF EXISTS `fans_comments`;
CREATE TABLE `fans_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(400) DEFAULT NULL,
  `createtime` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='留言表';

#
# Data for table "fans_comments"
#

INSERT INTO `fans_comments` VALUES (1,1,'American Pharoah (foaled February 2, 2012) is a Thoroughbred racehorse who in 2015 became the 12th American Triple Crown winner, and the first since Affirmed in 1978. He also became the only horse to win the Breeders\' Cup Classic along with all three Trip','2016-05-07 02:00:00'),(2,1,'American Pharoah (foaled February 2, 2012) is a Thoroughbred racehorse who in 2015 became the 12th American Triple Crown winner, and the first since Affirmed in 1978. He also became the only horse to win the Breeders\' Cup Classic along with all three Trip','2016-05-07 02:00:00'),(3,1,'Crown winner, and the first since Affirmed in 1978. He also became the only horse to win the Breeders\' Cup Classic along with all three Tripf Crown winner, and the first since Affirmed in 1978. He also became the only horse to win the Breeders\' Cup Classic along with all three Trip  Crown winner, and the first since Affirmed in 1978. He also became the only horse to win the Breeders\' Cup Classic a','0000-00-00 00:00:00'),(4,1,'American Pharoah (foaled February 2, 2012) is a Thoroughbred racehorse who in 2015 became the 12th American Triple Crown winner, and the first since Affirmed in 1978. ','2016-05-07 19:30:41'),(5,1,'asdfasdfadfasdfa','2016-05-07 19:31:17'),(6,1,'@1: i am your father!!!!!','2016-05-07 19:40:26'),(7,6,'@sqr123: i am your father too','2016-05-07 23:31:17'),(8,1,'@admin: asdfasdfasfd','2016-05-08 18:28:09'),(9,1,'sdafsd','2016-05-08 18:38:33'),(10,5,'dsaf','2016-05-08 18:42:58');

#
# Structure for table "fans_info"
#

DROP TABLE IF EXISTS `fans_info`;
CREATE TABLE `fans_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fans_userid` int(11) DEFAULT '0' COMMENT '粉丝用户id',
  `createtime` datetime DEFAULT NULL COMMENT '加粉时间',
  `star_id` int(11) DEFAULT '0' COMMENT '明星id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='粉丝列表';

#
# Data for table "fans_info"
#

INSERT INTO `fans_info` VALUES (1,6,'2016-05-08 00:00:37',1),(3,1,'2016-05-08 00:04:09',1);

#
# Structure for table "star_info"
#

DROP TABLE IF EXISTS `star_info`;
CREATE TABLE `star_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `star_name` varchar(255) DEFAULT NULL COMMENT '明星姓名',
  `star_occupation` varchar(255) DEFAULT NULL COMMENT '明星职业',
  `star_brief` varchar(255) DEFAULT NULL COMMENT '明星简介',
  `star_logo` varchar(255) DEFAULT NULL COMMENT '明星头像',
  `star_detail` text COMMENT '明星详情',
  `star_born` varchar(255) DEFAULT NULL COMMENT '明星出生日期',
  `star_nationality` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='明星信息';

#
# Data for table "star_info"
#

INSERT INTO `star_info` VALUES (1,'Kobe Bean Bryant','Basketball player','Kobe Bean Bryant (born August 23, 1978) is an American retired professional basketball player. He played his entire 20-year career with the Los Angeles Lakers of the National Basketball Association (NBA). He entered the NBA directly from high school.','star_logo.jpg','Â Â Â Â Kobe Bean Bryant (born August 23, 1978) is an American retired professional basketball player. He played his entire 20-year career with the Los Angeles Lakers of the National Basketball Association (NBA). He entered the NBA directly from high school and won five NBA championships with the Lakers. Bryant is an 18-time All-Star, 15-time member of the All-NBA Team, and 12-time member of the All-Defensive team. He led the NBA in scoring during two seasons, and ranks third on both the league\'s all-time regular season scoring and all-time postseason scoring lists. He holds the NBA record for the most seasons playing with one franchise for an entire career.<br/>\r\nÂ Â Â Â The son of former NBA player Joe Bryant, Kobe Bryant enjoyed a successful high school basketball career at Lower Merion High School in Pennsylvania, where he was recognized as the top high school basketball player in the country. He declared for the NBA draft upon graduation, and was selected with the 13th overall pick in the 1996 NBA draft by the Charlotte Hornets, who traded him to the Los Angeles Lakers. As a rookie, Bryant earned himself a reputation as a high-flyer and a fan favorite by winning the 1997 Slam Dunk Contest, and he was named an All-Star by his second season. Despite a feud between them, Bryant and Shaquille O\'Neal led the Lakers to three consecutive championships from 2000 to 2002.<br/>\r\nÂ Â Â Â In 2003, Bryant was accused of sexual assault in Colorado, but the charges were eventually dropped, and a civil suit was settled out of court. After the Lakers lost the 2004 NBA Finals, O\'Neal was traded to the Miami Heat. Bryant became the cornerstone of the Lakers, and he led the NBA in scoring during the 2005-06 and 2006-07 seasons. In 2006, he scored a career-high 81 points against the Toronto Raptors, the second most points scored in a single game in league history behind Wilt Chamberlain\'s 100-point game in 1962. Bryant was awarded the regular season\'s Most Valuable Player Award (MVP) in 2008. After losing in the 2008 NBA Finals, he led the Lakers to two consecutive championships in 2009 and 2010, earning the Finals MVP Award on both occasions. He continued to be among the top players in the league through 2013, when the 34-year-old Bryant suffered a torn Achilles tendon. Although he recovered, his play was limited the following two years by season-ending injuries to his knee and shoulder, respectively. Citing his physical decline, he announced that he would be retiring after the 2015-16 season.','August 23, 1978','American');

#
# Structure for table "star_photo"
#

DROP TABLE IF EXISTS `star_photo`;
CREATE TABLE `star_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `star_id` int(11) DEFAULT NULL,
  `star_photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='明星相册';

#
# Data for table "star_photo"
#

INSERT INTO `star_photo` VALUES (1,1,'1.jpg'),(2,1,'2.jpg'),(3,1,'3.jpg'),(4,1,'4.jpg'),(5,1,'5.jpg'),(6,1,'6.jpg'),(7,1,'7.jpg'),(8,1,'8.jpg'),(9,1,'9.jpg'),(18,1,'photo_18.jpg');

#
# Structure for table "star_posts"
#

DROP TABLE IF EXISTS `star_posts`;
CREATE TABLE `star_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `createtime` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='明星帖子';

#
# Data for table "star_posts"
#

INSERT INTO `star_posts` VALUES (1,'The son of former NBA player Joe Bryant','The son of former NBA player Joe Bryant, Kobe Bryant enjoyed a successful high school basketball career at Lower Merion High School in Pennsylvania, where he was recognized as the top high school basketball player in the country. He declared for the NBA draft upon graduation, and was selected with the 13th overall pick in the 1996 NBA draft by the Charlotte Hornets, who traded him to the Los Angeles Lakers. As a rookie, Bryant earned himself a reputation as a high-flyer and a fan favorite by winning the 1997 Slam Dunk Contest, and he was named an All-Star by his second season. Despite a feud between them, Bryant and Shaquille O\'Neal led the Lakers to three consecutive championships from 2000 to 2002.\n\nIn 2003, Bryant was accused of sexual assault in Colorado, but the charges were eventually dropped, and a civil suit was settled out of court. After the Lakers lost the 2004 NBA Finals, O\'Neal was traded to the Miami Heat. Bryant became the cornerstone of the Lakers, and he led the NBA in scoring during the 2005-06 and 2006-07 seasons. In 2006, he scored a career-high 81 points against the Toronto Raptors, the second most points scored in a single game in league history behind Wilt Chamberlain\'s 100-point game in 1962. Bryant was awarded the regular season\'s Most Valuable Player Award (MVP) in 2008. After losing in the 2008 NBA Finals, he led the Lakers to two consecutive championships in 2009 and 2010, earning the Finals MVP Award on both occasions. He continued to be among the top players in the league through 2013, when the 34-year-old Bryant suffered a torn Achilles tendon. Although he recovered, his play was limited the following two years by season-ending injuries to his knee and shoulder, respectively. Citing his physical decline, he announced that he would be retiring after the 2015-16 season.','s1.jpg','2016-05-08 00:48:00'),(2,'The son of former NBA player Joe Bryant','\nIn 2003, Bryant was accused of sexual assault in Colorado, but the charges were eventually dropped, and a civil suit was settled out of court. After the Lakers lost the 2004 NBA Finals, O\'Neal was traded to the Miami Heat. Bryant became the cornerstone of the Lakers, and he led the NBA in scoring during the 2005–06 and 2006–07 seasons. In 2006, he scored a career-high 81 points against the Toronto Raptors, the second most points scored in a single game in league history behind Wilt Chamberlain\'s 100-point game in 1962. Bryant was awarded the regular season\'s Most Valuable Player Award (MVP) in 2008. After losing in the 2008 NBA Finals, he led the Lakers to two consecutive championships in 2009 and 2010, earning the Finals MVP Award on both occasions. He continued to be among the top players in the league through 2013, when the 34-year-old Bryant suffered a torn Achilles tendon. Although he recovered, his play was limited the following two years by season-ending injuries to his knee and shoulder, respectively. Citing his physical decline, he announced that he would be retiring after the 2015–16 season.','s1.jpg','2016-05-07 00:02:00'),(3,'The son of former NBA player Joe Bryan','\nIn 2003, Bryant was accused of sexual assault in Colorado, but the charges were eventually dropped, and a civil suit was settled out of court. After the Lakers lost the 2004 NBA Finals, O\'Neal was traded to the Miami Heat. Bryant became the cornerstone of the Lakers, and he led the NBA in scoring during the 2005–06 and 2006–07 seasons. In 2006, he scored a career-high 81 points against the Toronto Raptors, the second most points scored in a single game in league history behind Wilt Chamberlain\'s 100-point game in 1962. Bryant was awarded the regular season\'s Most Valuable Player Award (MVP) in 2008. After losing in the 2008 NBA Finals, he led the Lakers to two consecutive championships in 2009 and 2010, earning the Finals MVP Award on both occasions. He continued to be among the top players in the league through 2013, when the 34-year-old Bryant suffered a torn Achilles tendon. Although he recovered, his play was limited the following two years by season-ending injuries to his knee and shoulder, respectively. Citing his physical decline, he announced that he would be retiring after the 2015–16 season.','s1.jpg','2016-05-06 02:00:00'),(4,'The son of former NBA player Joe Bryan','\nIn 2003, Bryant was accused of sexual assault in Colorado, but the charges were eventually dropped, and a civil suit was settled out of court. After the Lakers lost the 2004 NBA Finals, O\'Neal was traded to the Miami Heat. Bryant became the cornerstone of the Lakers, and he led the NBA in scoring during the 2005–06 and 2006–07 seasons. In 2006, he scored a career-high 81 points against the Toronto Raptors, the second most points scored in a single game in league history behind Wilt Chamberlain\'s 100-point game in 1962. Bryant was awarded the regular season\'s Most Valuable Player Award (MVP) in 2008. After losing in the 2008 NBA Finals, he led the Lakers to two consecutive championships in 2009 and 2010, earning the Finals MVP Award on both occasions. He continued to be among the top players in the league through 2013, when the 34-year-old Bryant suffered a torn Achilles tendon. Although he recovered, his play was limited the following two years by season-ending injuries to his knee and shoulder, respectively. Citing his physical decline, he announced that he would be retiring after the 2015–16 season.','s1.jpg','2016-05-05 01:00:00'),(5,'The son of former NBA player Joe Bryan','\nIn 2003, Bryant was accused of sexual assault in Colorado, but the charges were eventually dropped, and a civil suit was settled out of court. After the Lakers lost the 2004 NBA Finals, O\'Neal was traded to the Miami Heat. Bryant became the cornerstone of the Lakers, and he led the NBA in scoring during the 2005–06 and 2006–07 seasons. In 2006, he scored a career-high 81 points against the Toronto Raptors, the second most points scored in a single game in league history behind Wilt Chamberlain\'s 100-point game in 1962. Bryant was awarded the regular season\'s Most Valuable Player Award (MVP) in 2008. After losing in the 2008 NBA Finals, he led the Lakers to two consecutive championships in 2009 and 2010, earning the Finals MVP Award on both occasions. He continued to be among the top players in the league through 2013, when the 34-year-old Bryant suffered a torn Achilles tendon. Although he recovered, his play was limited the following two years by season-ending injuries to his knee and shoulder, respectively. Citing his physical decline, he announced that he would be retiring after the 2015–16 season.','s1.jpg','2016-05-04 01:00:00'),(9,'asdfasdfa','asdfasdfa','image_9.jpg','2016-05-08 18:36:41');

#
# Structure for table "star_posts_comments"
#

DROP TABLE IF EXISTS `star_posts_comments`;
CREATE TABLE `star_posts_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT '0',
  `content` varchar(255) DEFAULT NULL,
  `createtime` datetime DEFAULT '0000-00-00 00:00:00',
  `userid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='帖子回复';

#
# Data for table "star_posts_comments"
#

INSERT INTO `star_posts_comments` VALUES (1,1,'test','2016-05-08 01:34:27',1),(2,1,'@sqr123: adsfasdfadsf','2016-05-08 01:36:02',1),(3,1,'sdfafd','2016-05-08 01:58:42',1),(4,8,'ad','2016-05-08 17:27:56',1);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `permission` char(1) NOT NULL,
  `password` char(40) NOT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'admin','b','f865b53623b121fd34ee5426c792e5c33af8c227','2016-05-07 23:22:29'),(2,'sqr129','a','c3998bb1b0317bd7094c1c17ede636c739e92b8a','2015-05-29 17:15:07'),(3,'sqr1299','a','b88583a27630d3f85fd3785f64577b3e8ef7f87a','2015-05-29 23:08:31'),(4,'sqr128','a','de412af63b1a15550bf762bd788f9556c2358d87','2016-05-07 23:17:40'),(5,'sqr123','a','de412af63b1a15550bf762bd788f9556c2358d87','2015-05-28 20:12:43');
