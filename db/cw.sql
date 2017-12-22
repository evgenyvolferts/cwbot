-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: cw
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Items`
--

DROP TABLE IF EXISTS `Items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Items` (
  `ID` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Cost` int(5) NOT NULL DEFAULT '0',
  `Weight` int(3) NOT NULL DEFAULT '0',
  `Type` tinyint(1) NOT NULL DEFAULT '0',
  `Crafted` tinyint(1) NOT NULL DEFAULT '0',
  `Class` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Items`
--

LOCK TABLES `Items` WRITE;
/*!40000 ALTER TABLE `Items` DISABLE KEYS */;
INSERT INTO `Items` VALUES (100,'Меч Ученика',3,0,1,0,1),(101,'Короткий меч',30,0,1,0,1),(102,'Длинный меч',244,0,1,0,1),(103,'Меч Вдовы',645,0,1,0,1),(104,'Меч Рыцаря',1440,0,1,0,1),(105,'Эльфийский меч',1800,0,1,0,1),(106,'Рапира',3100,0,1,0,1),(107,'Меч берсеркера',4150,150,1,1,1),(108,'Короткое копье',55,0,1,0,2),(109,'Длинное копье',976,0,1,0,2),(110,'Эльфийское копье',1414,0,1,0,2),(111,'Хранитель',5270,180,1,1,2),(112,'Кухонный нож',3,0,2,0,1),(113,'Боевой нож',103,0,2,0,1),(114,'Кинжал',498,0,2,0,1),(115,'Экскалибур',7000,150,1,1,1),(116,'Трезубец',0,0,1,1,2),(117,'Кинжал охотника',0,0,2,1,1),(118,'Кинжал демона',0,0,2,1,1),(119,'Кирка шахтера',500,180,1,0,0),(120,'Молот гномов',0,0,1,1,0),(121,'Костолом',0,0,1,1,0),(122,'Кузнечный молот',0,0,1,1,0),(123,'Клещи',0,0,2,1,0),(124,'Нарсил',0,0,1,1,1),(125,'Алебарда',3600,180,1,1,2),(126,'Кинжал триумфа',0,0,2,1,1),(200,'Плотная куртка',3,0,5,0,0),(201,'Кожаный доспех',30,0,5,0,0),(202,'Стальная броня',330,0,5,0,0),(203,'Мифриловая броня',430,0,5,0,0),(204,'Куртка охотника',540,400,5,1,1),(205,'Броня хранителя',810,500,5,1,2),(206,'Шляпа',1,0,3,0,0),(207,'Стальной шлем',35,0,3,0,0),(208,'Серебряный шлем',80,0,3,0,0),(209,'Мифриловый шлем',317,0,3,0,0),(210,'Шапка охотника',420,180,3,1,1),(211,'Шлем хранителя',530,200,3,1,2),(212,'Деревянный щит',3,0,2,0,0),(213,'Щит скелета',50,0,2,0,0),(214,'Бронзовый щит',103,0,2,0,0),(215,'Серебряный щит',311,0,2,0,0),(216,'Мифриловый щит',498,0,2,0,0),(217,'Щит хранителя',790,200,2,1,2),(218,'Сандалии',1,0,6,0,0),(219,'Кожаные сапоги',43,0,6,0,0),(220,'Стальные сапоги',92,0,6,0,0),(221,'Серебряные сапоги',285,0,6,0,0),(222,'Мифриловые сапоги',370,0,6,0,0),(223,'Ботинки охотника',490,100,6,1,1),(224,'Сапоги хранителя',0,0,6,1,2),(225,'Браслеты',1,0,4,0,0),(226,'Кожаные перчатки',43,0,4,0,0),(227,'Стальные перчатки',92,0,4,0,0),(228,'Серебряные перчатки',285,0,4,0,0),(229,'Мифриловые перчатки',370,0,4,0,0),(230,'Браслеты охотника',490,100,4,1,1),(231,'Перчатки хранителя',520,150,4,1,2),(232,'Броня паладина',1400,500,5,1,2),(233,'Куртка демона',1100,0,5,1,1),(234,'Шлем паладина',840,200,3,1,2),(235,'Шапка демона',710,0,3,1,1),(236,'Ботинки демона',780,0,6,1,1),(237,'Сапоги паладина',780,0,6,1,2),(238,'Браслеты демона',780,0,4,1,1),(239,'Перчатки паладина',780,150,4,1,2),(240,'Щит паладина',1300,0,2,1,2),(241,'Рукавицы',0,150,4,1,0),(242,'Кузнечная роба',0,500,5,1,0),(243,'Куртка триумфа',0,0,5,1,1),(244,'Шапка триумфа',302,180,3,1,1),(245,'Ботинки триумфа',332,100,6,1,1),(246,'Браслеты триумфа',0,0,4,1,1),(247,'Броня крестоносца',0,0,5,1,2),(248,'Шлем крестоносца',0,0,3,1,2),(249,'Сапоги крестоносца',0,0,6,1,2),(250,'Перчатки крестоносца',0,0,4,1,2),(251,'Щит крестоносца',0,0,2,1,2),(303,'⚡Плащ Варлорда',0,0,8,0,0),(304,'⚜Печать власти',0,0,9,0,0),(305,'?Цилиндр',4,10,3,0,0),(306,'? Дамская шляпка',4,10,3,0,0),(307,'Кроличья лапка',4,10,7,0,0),(308,'Фляга',4,10,7,0,0),(309,'⍟Звезда шерифа',0,0,7,0,0),(310,'?Золотая медаль 1го сезона',100,1,7,0,0),(311,'?Серебряная медаль 1го сезона',100,1,7,0,0),(312,'?Бронзовая медаль 1го сезона',100,1,7,0,0),(313,'?Орден выжившего 1го сезона',100,1,7,0,0),(314,'Коготь вампира',4,10,7,0,0),(315,'Бутылка',4,10,7,0,0),(317,'?Счастливая кость',0,0,7,0,0),(318,'Бутылка рома',0,0,7,0,0),(401,'Зелье +1⚔',0,0,7,0,0),(402,'Зелье +1?',0,0,7,0,0),(403,'Зелье оживления питомца',0,0,7,0,0),(404,'? Ключ',0,0,7,0,0),(501,'?Талончик на свинью',0,0,7,0,0),(502,'?Талончик на гуся',0,0,7,0,0),(503,'?Талончик на лошадь',0,0,7,0,0),(504,'?Талончик на осла',0,0,7,0,0),(505,'?Талончик на эвока',0,0,7,0,0),(506,'?Талончик на тонтона',0,0,7,0,0),(507,'?Талончик на собаку',0,0,7,0,0),(508,'?Талончик на сову',0,0,7,0,0),(509,'?Талончик на вервольфа',0,0,7,0,0),(510,'?Талончик на упыря',0,0,7,0,0),(511,'?Талончик на василиска',0,0,7,0,0);
/*!40000 ALTER TABLE `Items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ItemsExchange`
--

DROP TABLE IF EXISTS `ItemsExchange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ItemsExchange` (
  `ExchangeID` int(11) NOT NULL,
  `TelegramID` int(11) NOT NULL,
  `ItemID` int(5) NOT NULL,
  `ItemAmount` int(11) NOT NULL,
  PRIMARY KEY (`ExchangeID`,`TelegramID`,`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ItemsExchange`
--

LOCK TABLES `ItemsExchange` WRITE;
/*!40000 ALTER TABLE `ItemsExchange` DISABLE KEYS */;
INSERT INTO `ItemsExchange` VALUES (1492417263,366560576,101,1),(1492417263,366560576,114,1),(1492417263,366560576,207,1),(1492417263,366560576,216,1),(1492447776,240390650,108,1),(1492447776,240390650,114,1),(1492447776,240390650,219,1),(1492453621,273034356,101,1),(1492453621,273034356,108,1),(1492453621,273034356,112,1),(1492453621,273034356,218,1),(1492453621,273034356,220,1),(1492453621,273034356,222,1),(1492453621,273034356,225,1),(1492455968,72622544,102,1),(1492455968,72622544,213,1),(1492462190,66210062,212,1),(1492554341,366560576,101,1),(1492554341,366560576,102,2),(1492554341,366560576,113,3),(1492554341,366560576,114,1),(1492554341,366560576,208,1),(1492554341,366560576,212,1),(1492554341,366560576,216,1),(1492554341,366560576,218,2),(1492554341,366560576,219,1),(1492554341,366560576,225,1),(1492554341,366560576,305,1),(1492762743,276433234,119,1),(1493020309,109806279,102,1),(1493020309,109806279,214,1),(1493031066,276433234,110,1),(1493031066,276433234,114,1),(1493058786,366560576,103,1),(1493058786,366560576,113,1),(1493058786,366560576,209,2),(1493058786,366560576,214,1),(1493058786,366560576,216,1),(1493058786,366560576,227,1),(1493101155,164668033,114,1),(1493236630,85613593,204,1),(1493236630,85613593,210,1),(1493237227,85613593,107,1),(1493291182,85613593,110,1),(1493291182,85613593,209,3),(1493291182,85613593,216,2),(1493291182,85613593,222,1),(1493291182,85613593,229,2),(1493644131,192901795,206,1),(1493645759,109806279,100,1),(1493645759,109806279,113,1),(1493645759,109806279,206,1),(1493654416,273034356,113,3),(1493654416,273034356,200,1),(1493654416,273034356,203,1),(1493654416,273034356,206,1),(1493654416,273034356,207,1),(1493654416,273034356,208,2),(1493654416,273034356,214,2),(1493654416,273034356,216,1),(1493654416,273034356,222,2),(1493654416,273034356,225,2),(1493655515,273034356,101,2),(1493655515,273034356,102,1),(1493655515,273034356,112,1),(1493655515,273034356,203,1),(1493655515,273034356,213,2),(1493655515,273034356,225,1),(1493655515,273034356,229,1),(1493708103,375123257,112,1),(1493708103,375123257,216,1),(1493708277,363634196,216,1),(1493708664,284959306,216,1),(1493708664,284959306,225,1),(1493709423,376095504,213,1),(1493709508,338520691,212,1),(1493709989,374330134,102,1),(1493709989,374330134,222,1),(1493709989,374330134,305,1),(1493710054,338895270,215,1),(1493710054,338895270,218,1),(1493710333,333248251,201,1),(1493710660,318597899,229,1),(1493710922,351613818,201,1),(1493711176,331930519,102,1),(1493711365,301161994,208,1),(1493711948,341164099,114,1),(1493711948,341164099,203,1),(1493714628,343501022,208,1),(1493714628,343501022,305,1),(1493714804,351051135,216,1),(1493767873,339089887,102,1),(1493768567,378972168,222,1),(1493788524,313167217,306,1),(1493788788,377817867,108,1),(1493788788,377817867,212,1),(1493790177,373729759,206,1),(1493790757,248842711,208,1),(1493800991,72672553,217,1),(1494427863,164668033,305,1),(1494438563,271257345,306,1),(1494439414,192901795,305,1),(1494441849,66210062,100,1),(1494484747,285295451,222,1),(1495349491,273034356,100,1),(1495351791,322503256,101,2),(1495351791,322503256,102,1),(1495378761,127726310,219,1),(1495551816,29312173,101,1),(1495551816,29312173,103,1),(1495551816,29312173,213,1),(1495987029,341447372,218,1),(1496002600,29312173,102,1),(1496002600,29312173,215,1),(1496081911,29312173,107,1),(1496304618,322503256,103,2),(1496304618,322503256,213,1),(1496304618,322503256,214,2),(1496304618,322503256,215,2),(1496898899,157419805,103,1),(1496902014,127726310,103,1),(1496902014,127726310,106,1),(1496948965,368860568,101,1),(1496950654,336682691,213,1),(1496951566,318954099,101,1),(1496952396,175282672,306,1),(1497189672,273034356,101,1),(1497189672,273034356,218,1),(1499194136,273034356,214,1),(1499194387,180315856,102,1),(1499194387,180315856,214,1);
/*!40000 ALTER TABLE `ItemsExchange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ItemsStats`
--

DROP TABLE IF EXISTS `ItemsStats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ItemsStats` (
  `ItemID` int(5) NOT NULL,
  `StatName` set('attack','defense','luck','mana','mining','stamina') COLLATE utf8mb4_unicode_ci NOT NULL,
  `StatValue` int(4) NOT NULL,
  PRIMARY KEY (`ItemID`,`StatName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ItemsStats`
--

LOCK TABLES `ItemsStats` WRITE;
/*!40000 ALTER TABLE `ItemsStats` DISABLE KEYS */;
INSERT INTO `ItemsStats` VALUES (100,'attack',1),(101,'attack',3),(102,'attack',6),(103,'attack',10),(104,'attack',16),(105,'attack',18),(105,'defense',2),(106,'attack',22),(107,'attack',25),(108,'attack',3),(108,'defense',1),(109,'attack',13),(109,'defense',3),(110,'attack',14),(110,'defense',9),(111,'attack',17),(111,'defense',15),(112,'attack',1),(113,'attack',3),(114,'attack',7),(115,'attack',31),(116,'attack',22),(116,'defense',22),(117,'attack',9),(118,'attack',11),(119,'attack',3),(119,'defense',3),(119,'mining',3),(120,'attack',14),(120,'defense',17),(120,'mining',6),(121,'attack',17),(121,'defense',23),(121,'mining',9),(122,'attack',17),(122,'defense',15),(122,'mana',500),(123,'attack',9),(123,'defense',5),(123,'mana',150),(124,'attack',40),(125,'attack',28),(125,'defense',29),(126,'attack',15),(200,'defense',2),(201,'defense',4),(202,'defense',8),(203,'attack',1),(203,'defense',9),(204,'attack',3),(204,'defense',7),(205,'attack',1),(205,'defense',12),(206,'defense',1),(207,'defense',2),(208,'defense',3),(209,'defense',5),(210,'attack',3),(210,'defense',3),(211,'attack',1),(211,'defense',6),(212,'defense',1),(213,'defense',2),(214,'defense',3),(215,'defense',5),(216,'defense',7),(217,'attack',1),(217,'defense',9),(218,'defense',1),(219,'defense',2),(220,'defense',3),(221,'defense',4),(222,'defense',6),(223,'attack',3),(223,'defense',3),(224,'defense',7),(225,'defense',1),(226,'defense',2),(227,'defense',3),(228,'defense',4),(229,'defense',6),(230,'attack',3),(230,'defense',3),(231,'defense',7),(232,'attack',3),(232,'defense',16),(233,'attack',6),(233,'defense',9),(234,'attack',3),(234,'defense',9),(235,'attack',6),(235,'defense',4),(236,'attack',5),(236,'defense',6),(237,'attack',3),(237,'defense',10),(238,'attack',5),(238,'defense',6),(239,'attack',3),(239,'defense',10),(240,'attack',3),(240,'defense',12),(241,'defense',6),(241,'mana',100),(242,'defense',12),(242,'mana',300),(243,'attack',9),(243,'defense',11),(244,'attack',9),(244,'defense',6),(245,'attack',7),(245,'defense',7),(246,'attack',7),(246,'defense',7),(247,'attack',6),(247,'defense',22),(248,'attack',6),(248,'defense',13),(249,'attack',6),(249,'defense',14),(250,'attack',6),(250,'defense',14),(251,'attack',6),(251,'defense',17),(307,'luck',1),(308,'stamina',1),(317,'luck',1),(318,'stamina',2);
/*!40000 ALTER TABLE `ItemsStats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Monsters`
--

DROP TABLE IF EXISTS `Monsters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Monsters` (
  `ID` varchar(32) NOT NULL,
  `FightID` varchar(20) NOT NULL,
  `Monster` varchar(100) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MessageID` int(11) NOT NULL DEFAULT '0',
  `ChatID` bigint(20) NOT NULL DEFAULT '0',
  `MessageText` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `FightID` (`FightID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Monsters`
--

LOCK TABLES `Monsters` WRITE;
/*!40000 ALTER TABLE `Monsters` DISABLE KEYS */;
/*!40000 ALTER TABLE `Monsters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MonstersList`
--

DROP TABLE IF EXISTS `MonstersList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MonstersList` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `NameInfinitive` varchar(20) NOT NULL,
  `RaidBoss` tinyint(1) NOT NULL DEFAULT '0',
  `RaidMinLevel` int(3) NOT NULL DEFAULT '0',
  `RaidMaxLevel` int(3) NOT NULL DEFAULT '0',
  `Level` int(3) NOT NULL DEFAULT '0',
  `Source` tinyint(1) NOT NULL DEFAULT '1',
  `BossLevel` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MonstersList`
--

LOCK TABLES `MonstersList` WRITE;
/*!40000 ALTER TABLE `MonstersList` DISABLE KEYS */;
INSERT INTO `MonstersList` VALUES (1,'вожака шершней','Вожак шершней',0,0,0,20,2,0),(2,'Гигантского краба','Гигантский краб',1,15,25,20,2,20),(3,'гигантского паука','Гигантский паук',0,0,0,40,1,0),(4,'дикого волка','Дикий волк',0,0,0,40,1,0),(5,'дикого кабана','Дикий кабан',0,0,0,40,1,0),(6,'жуткого краба','Жуткий краб',0,0,0,20,2,0),(7,'зараженную крысу','Зараженная крыса',0,0,0,99,1,0),(8,'злого лепрекона','Злой лепрекон',0,0,0,20,1,0),(9,'каменного краба','Каменный краб',0,0,0,20,2,0),(10,'капитана пиратов','Капитан пиратов',0,0,0,20,2,0),(11,'Королеву роя','Королева роя',1,26,35,20,2,30),(12,'Лича','Лич',1,46,99,20,2,50),(13,'матерого пирата','Матерый пират',0,0,0,20,2,0),(14,'молодого шершня','Молодой шершень',0,0,0,20,2,0),(15,'молодую черепаху','Молодая черепаха',0,0,0,20,2,0),(16,'огромного медведя','Огромный медведь',0,0,0,40,1,0),(17,'огромную крысу','Огромная крыса',0,0,0,99,1,0),(18,'одичалого волка','Одичалый волк',0,0,0,40,1,0),(19,'одичалого гоблина','Одичалый гоблин',0,0,0,40,1,0),(20,'одичалого кобольда','Одичалый кобольд',0,0,0,40,1,0),(21,'озорного скелета','Озорной скелет',0,0,0,20,2,0),(22,'опасного пирата','Опасный пират',0,0,0,20,2,0),(23,'песочного краба','Песочный краб',0,0,0,20,2,0),(24,'пирата','Пират',0,0,0,20,2,0),(25,'скелета','Скелет',0,0,0,20,2,0),(26,'скелета-воина','Скелет-воин',0,0,0,20,2,0),(27,'скелета-рыцаря','Скелет-рыцарь',0,0,0,20,2,0),(28,'стража Королевы Роя','Страж Королевы роя',0,0,0,20,2,0),(29,'Черную Бороду','Черная Борода',1,36,45,20,2,40),(30,'шершня-воина','Шершень-воин',0,0,0,20,2,0),(31,'шипастую черепаху','Шипастая черепаха',0,0,0,20,2,0),(32,'Главаря банды','Главарь банды',1,15,25,20,3,20),(33,'Ядовитое Жало','Ядовитое Жало',1,26,35,20,3,30),(34,'Циклопа','Циклоп',1,36,45,20,3,40),(35,'Гидру Пустошей','Гидра Пустошей',1,46,99,20,3,50),(36,'бандита','Бандит',0,0,0,20,3,0),(37,'летающее око','Летающее око',0,0,0,20,3,0),(38,'ящера','Ящер',0,0,0,20,3,0),(39,'опасную стрекозу','Опасная стрекоза',0,0,0,20,3,0);
/*!40000 ALTER TABLE `MonstersList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MonstersUsers`
--

DROP TABLE IF EXISTS `MonstersUsers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MonstersUsers` (
  `MonsterID` varchar(32) NOT NULL,
  `TelegramID` int(11) NOT NULL,
  `Time` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MonsterID`,`TelegramID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MonstersUsers`
--

LOCK TABLES `MonstersUsers` WRITE;
/*!40000 ALTER TABLE `MonstersUsers` DISABLE KEYS */;
/*!40000 ALTER TABLE `MonstersUsers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OutgoingMessages`
--

DROP TABLE IF EXISTS `OutgoingMessages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OutgoingMessages` (
  `MessageID` int(11) NOT NULL AUTO_INCREMENT,
  `TimeToSend` int(10) NOT NULL DEFAULT '0',
  `MessageURL` text,
  `Processed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MessageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OutgoingMessages`
--

LOCK TABLES `OutgoingMessages` WRITE;
/*!40000 ALTER TABLE `OutgoingMessages` DISABLE KEYS */;
/*!40000 ALTER TABLE `OutgoingMessages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Parameters`
--

DROP TABLE IF EXISTS `Parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Parameters` (
  `ParamName` varchar(15) NOT NULL,
  `ParamValue` varchar(15) NOT NULL,
  PRIMARY KEY (`ParamName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Parameters`
--

LOCK TABLES `Parameters` WRITE;
/*!40000 ALTER TABLE `Parameters` DISABLE KEYS */;
INSERT INTO `Parameters` VALUES ('debug','on'),('squad','1');
/*!40000 ALTER TABLE `Parameters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Resources`
--

DROP TABLE IF EXISTS `Resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Resources` (
  `ID` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Cost` int(5) NOT NULL,
  `Weight` int(3) NOT NULL,
  `Type` tinyint(1) NOT NULL DEFAULT '1',
  `NeededForCraft` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Resources`
--

LOCK TABLES `Resources` WRITE;
/*!40000 ALTER TABLE `Resources` DISABLE KEYS */;
INSERT INTO `Resources` VALUES (100,'/unobtanium',0,0,0,0),(101,'Нитки',2,1,1,1),(102,'Ветки',2,1,1,1),(103,'Шкура животного',3,1,1,0),(104,'Кость животного',3,1,1,1),(105,'Уголь',3,1,1,0),(106,'Древесный уголь',3,1,1,0),(107,'Порошок',4,1,1,1),(108,'Железная руда',4,2,1,0),(109,'Плотная ткань',4,1,1,0),(110,'Серебряная руда',6,2,1,0),(111,'Алюминиевая руда',15,2,1,0),(112,'Мифриловая руда',15,2,1,0),(113,'Философский камень',15,1,1,0),(114,'Адамантитовая руда',20,2,1,0),(115,'Сапфир',40,2,1,0),(116,'Растворитель',60,2,1,0),(117,'Рубин',80,2,1,0),(118,'Загуститель',100,2,1,0),(119,'Сталь',25,2,1,1),(120,'Кожа',10,1,1,0),(121,'Костяная пудра',16,1,1,1),(122,'Веревка',9,1,1,1),(123,'Кокс',13,1,1,0),(124,'Очищенная пудра',60,1,1,1),(125,'Серебряный сплав',100,3,1,1),(126,'Металлический лист',60,2,1,1),(127,'Стальная заготовка',55,2,1,1),(128,'Шнурок',35,1,1,1),(129,'Стальная нить',12,2,1,1),(130,'Металлическое волокно',120,2,1,1),(131,'Обработанная кожа',80,1,1,1),(132,'Серебряная заготовка',90,2,1,1),(133,'Заготовка кузнеца',370,3,1,1),(134,'?Сундучок',1,0,4,1),(135,'Сено',1,1,4,1),(136,'Комбикорм',1,1,4,1),(137,'Зерно',1,1,4,1),(138,'Лезвие экскалибура',50,2,3,1),(139,'Лезвие трезубца',50,2,3,1),(140,'Фрагмент брони паладина',50,2,3,1),(141,'Пыль',1,0,4,0),(142,'Странный сундук',1,0,4,1),(143,'?Рецепт экскалибура',50,2,3,1),(144,'?Рецепт трезубца',50,2,3,1),(145,'Заготовка ремесленника',370,2,1,1),(146,'Мифриловый сплав',150,3,1,1),(147,'? Шкатулка помощника',1,0,4,1),(148,'Фрагмент шлема паладина',50,2,3,1),(149,'Фрагмент сапог паладина',50,2,3,1),(150,'Фрагмент перчаток паладина',50,2,3,1),(151,'Фрагмент щита паладина',50,2,3,1),(152,'?Рецепт брони паладина',50,2,3,1),(153,'?Рецепт шлема паладина',50,2,3,1),(154,'?Рецепт сапог паладина',50,2,3,1),(155,'?Рецепт перчаток паладина',50,2,3,1),(156,'?Рецепт щита паладина',50,2,3,1),(157,'Фрагмент куртки демона',50,2,3,1),(158,'Фрагмент шапки демона',50,2,3,1),(159,'Фрагмент ботинок демона',50,2,3,1),(160,'Фрагмент браслетов демона',50,2,3,1),(161,'?Рецепт куртки демона',50,2,3,1),(162,'?Рецепт шапки демона',50,2,3,1),(163,'?Рецепт ботинок демона',50,2,3,1),(164,'?Рецепт браслетов демона',50,2,3,1),(165,'Лезвие кинжала охотника',50,2,3,0),(166,'Лезвие кинжала демона',50,2,3,1),(167,'Обломок кирки шахтеров',50,2,3,0),(168,'Обломок молота гномов',50,2,3,0),(169,'Обломок костолома',50,2,3,1),(170,'?Рецепт кирки шахтеров',50,2,3,0),(171,'?Рецепт молота гномов',50,2,3,0),(172,'?Рецепт костолома',50,2,3,1),(173,'?Рецепт кинжала охотника',50,2,3,0),(174,'?Рецепт кинжала демона',50,2,3,1),(175,'Упаковочный материал',0,0,3,1),(176,'?Старый сундук',1,0,4,1),(177,'?Старая шкатулка',1,0,4,1),(178,'Мясо монстров',1,0,4,0),(179,'Хомячки',1,0,4,1),(180,'Поводок',1,0,4,1),(181,'?Горшочек лепрекона',1,0,4,1),(182,'Сырье',0,0,4,1),(183,'Полотно',1,0,1,1),(184,'Фрагмент рукавиц',50,2,3,1),(185,'?Рецепт рукавиц',50,2,3,1),(186,'Обломок кузнечного молота',50,2,3,1),(187,'?Рецепт кузнечного молота',50,2,3,1),(188,'?Рецепт клещей',50,2,3,0),(189,'Фрагмент клещей',50,2,3,0),(190,'Фрагмент кузнечной робы',50,2,3,1),(191,'?Рецепт кузнечной робы',50,2,3,1),(192,'Лезвие Нарсила',50,2,3,1),(193,'Лезвие алебарды',50,2,3,1),(194,'Лезвие кинжала триумфа',50,2,3,1),(195,'Фрагмент куртки триумфа',50,2,3,1),(196,'Фрагмент шапки триумфа',50,2,3,1),(197,'Фрагмент ботинок триумфа',50,2,3,1),(198,'Фрагмент браслетов триумфа',50,2,3,1),(199,'Фрагмент брони крестоносца',50,2,3,1),(200,'Фрагмент шлема крестоносца',50,2,3,1),(201,'Фрагмент сапог крестоносца',50,2,3,1),(202,'Фрагмент перчаток крестоносца',50,2,3,1),(203,'Фрагмент щита крестоносца',50,2,3,1),(204,'Литейная форма',0,0,1,1),(206,'?Рецепт алебарды',50,2,3,1),(210,'?Рецепт куртки триумфа',50,2,3,1),(211,'?Рецепт шапки триумфа',50,2,3,1),(212,'?Рецепт ботинок триумфа',50,2,3,1),(213,'?Рецепт браслетов триумфа',50,2,3,1),(214,'?Рецепт кинжала триумфа',50,2,3,1),(215,'?Рецепт брони крестоносца',50,2,3,1),(216,'?Рецепт шлема крестоносца',50,2,3,1),(217,'?Рецепт сапог крестоносца',50,2,3,1),(218,'?Рецепт перчаток крестоносца',50,2,3,1),(219,'?Рецепт щита крестоносца',50,2,3,1),(221,'?Сундук мертвеца',1,0,4,1);
/*!40000 ALTER TABLE `Resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ResourcesExchange`
--

DROP TABLE IF EXISTS `ResourcesExchange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ResourcesExchange` (
  `ExchangeID` int(11) NOT NULL,
  `TelegramID` int(11) NOT NULL,
  `ResourceID` int(5) NOT NULL,
  `ResourceAmount` int(11) NOT NULL,
  PRIMARY KEY (`ExchangeID`,`TelegramID`,`ResourceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ResourcesExchange`
--

LOCK TABLES `ResourcesExchange` WRITE;
/*!40000 ALTER TABLE `ResourcesExchange` DISABLE KEYS */;
/*!40000 ALTER TABLE `ResourcesExchange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Squads`
--

DROP TABLE IF EXISTS `Squads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Squads` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `SquadName` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Squads`
--

LOCK TABLES `Squads` WRITE;
/*!40000 ALTER TABLE `Squads` DISABLE KEYS */;
INSERT INTO `Squads` VALUES (1,'KickAss');
/*!40000 ALTER TABLE `Squads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TelegramRequests`
--

DROP TABLE IF EXISTS `TelegramRequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TelegramRequests` (
  `UpdateID` int(11) NOT NULL,
  `Processed` tinyint(1) NOT NULL DEFAULT '0',
  `ChatType` set('callback','inline','group','private','supergroup') COLLATE utf8_unicode_ci NOT NULL,
  `ChatID` bigint(20) NOT NULL,
  PRIMARY KEY (`UpdateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TelegramRequests`
--

LOCK TABLES `TelegramRequests` WRITE;
/*!40000 ALTER TABLE `TelegramRequests` DISABLE KEYS */;
/*!40000 ALTER TABLE `TelegramRequests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `TelegramID` int(11) NOT NULL,
  `TelegramUsername` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Castle` set('red','white','black','blue','yellow','mint','twilight') COLLATE utf8_unicode_ci NOT NULL,
  `CharName` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `CharLevel` int(3) NOT NULL DEFAULT '1',
  `CharClass` int(1) NOT NULL DEFAULT '0',
  `Attack` int(3) NOT NULL DEFAULT '1',
  `Defense` int(3) NOT NULL DEFAULT '1',
  `Stamina` int(4) NOT NULL DEFAULT '0',
  `Exp` int(9) NOT NULL DEFAULT '0',
  `Updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemType1` int(3) NOT NULL DEFAULT '0',
  `ItemType2` int(3) NOT NULL DEFAULT '0',
  `ItemType3` int(3) NOT NULL DEFAULT '0',
  `ItemType4` int(3) NOT NULL DEFAULT '0',
  `ItemType5` int(3) NOT NULL DEFAULT '0',
  `ItemType6` int(3) NOT NULL DEFAULT '0',
  `ItemType7` int(3) NOT NULL DEFAULT '0',
  `Gold` int(5) NOT NULL DEFAULT '0',
  `Gem` int(5) NOT NULL DEFAULT '0',
  `Stock` int(5) NOT NULL DEFAULT '0',
  `Twink` tinyint(1) NOT NULL DEFAULT '0',
  `TGBot` tinyint(1) NOT NULL DEFAULT '0',
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  `SquadID` int(3) NOT NULL DEFAULT '0',
  `OwnerID` int(11) NOT NULL DEFAULT '0',
  `TelegramIDHash` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '1',
  `OriginalOwner` int(11) DEFAULT '0',
  `SquadAdd` datetime DEFAULT NULL,
  PRIMARY KEY (`TelegramID`),
  KEY `Admin` (`Admin`),
  KEY `CharName` (`CharName`),
  KEY `Twink` (`Twink`),
  KEY `SquadID` (`SquadID`),
  KEY `TelegramIDHash` (`TelegramIDHash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (85613593,'mreugene','red','КА_ливает_из_ЧВ',58,3,181,33,11,1048575,'2017-08-14 14:46:58',124,126,244,246,243,245,307,110,48,265,0,0,1,1,0,'02dd28e15831d14f1f74a9268fcb5050',1,0,NULL);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsersActivity`
--

DROP TABLE IF EXISTS `UsersActivity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsersActivity` (
  `TelegramID` int(11) NOT NULL,
  `LastMessageTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TelegramID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsersActivity`
--

LOCK TABLES `UsersActivity` WRITE;
/*!40000 ALTER TABLE `UsersActivity` DISABLE KEYS */;
/*!40000 ALTER TABLE `UsersActivity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsersReports`
--

DROP TABLE IF EXISTS `UsersReports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsersReports` (
  `BattleID` int(10) NOT NULL,
  `TelegramID` int(11) NOT NULL,
  `Attack` int(3) NOT NULL,
  `Defense` int(3) NOT NULL,
  `CharLevel` int(3) NOT NULL,
  `Exp` int(5) NOT NULL,
  `Gold` int(5) NOT NULL,
  PRIMARY KEY (`BattleID`,`TelegramID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsersReports`
--

LOCK TABLES `UsersReports` WRITE;
/*!40000 ALTER TABLE `UsersReports` DISABLE KEYS */;
/*!40000 ALTER TABLE `UsersReports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsersStock`
--

DROP TABLE IF EXISTS `UsersStock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsersStock` (
  `TelegramID` int(11) NOT NULL,
  `ResourceID` int(5) NOT NULL,
  `Amount` int(5) NOT NULL,
  PRIMARY KEY (`TelegramID`,`ResourceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsersStock`
--

LOCK TABLES `UsersStock` WRITE;
/*!40000 ALTER TABLE `UsersStock` DISABLE KEYS */;
/*!40000 ALTER TABLE `UsersStock` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-22 16:06:44
