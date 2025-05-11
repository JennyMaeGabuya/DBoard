-- Database Backup
-- Database: `hr_records`
-- Generated: 2025-05-11 13:55:23

DROP TABLE IF EXISTS `201_files`;
CREATE TABLE `201_files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `folder_id` int NOT NULL,
  `filename` varchar(255) NOT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`folder_id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `201_files` VALUES("1","1","ABRAHAM, ELLEN M..pdf","2025-05-03 13:15:47");
INSERT INTO `201_files` VALUES("2","2","AGBING, MICKAELA M..pdf","2025-05-03 13:15:53");
INSERT INTO `201_files` VALUES("3","3","AGUILA, LOTALIE V..pdf","2025-05-03 13:16:17");
INSERT INTO `201_files` VALUES("4","4","ALFILER, EMMANUEL A..pdf","2025-05-03 13:16:25");
INSERT INTO `201_files` VALUES("5","5","ANDAL, AILEEN L..pdf","2025-05-03 13:16:30");
INSERT INTO `201_files` VALUES("6","6","ARIOLA, ALWIN E..pdf","2025-05-03 13:16:37");
INSERT INTO `201_files` VALUES("7","7","ATIENZA, JEFFREY C..pdf","2025-05-03 13:16:43");
INSERT INTO `201_files` VALUES("8","8","AVEO, MYLENE B..pdf","2025-05-03 13:16:49");
INSERT INTO `201_files` VALUES("9","9","BABADILLA, ROWENA R..pdf","2025-05-03 13:16:56");
INSERT INTO `201_files` VALUES("10","10","BAGIOEN, MARY CLAIRE S..pdf","2025-05-03 13:17:02");
INSERT INTO `201_files` VALUES("11","11","BALITA, ANNABELLE S..pdf","2025-05-03 13:17:10");
INSERT INTO `201_files` VALUES("12","12","BARROGO, AL JOHNRY S..pdf","2025-05-03 13:17:16");
INSERT INTO `201_files` VALUES("13","13","BAUTISTA, CAMILLE GRACE O..pdf","2025-05-03 13:17:22");
INSERT INTO `201_files` VALUES("14","14","BAUTISTA, MARIO D..pdf","2025-05-03 13:17:50");
INSERT INTO `201_files` VALUES("15","15","BENEDICTO, RONALD A..pdf","2025-05-03 13:17:56");
INSERT INTO `201_files` VALUES("16","16","BINAY, ARLYN O..pdf","2025-05-03 13:18:02");
INSERT INTO `201_files` VALUES("17","17","BISCOCHO, MYLENE M..pdf","2025-05-03 13:18:08");
INSERT INTO `201_files` VALUES("18","18","BRUCAL, RICHARD C..pdf","2025-05-03 13:18:15");
INSERT INTO `201_files` VALUES("19","19","CABRERA, MARJORIE O..pdf","2025-05-03 13:18:25");
INSERT INTO `201_files` VALUES("20","20","CALINISAN, LOURDES O..pdf","2025-05-03 13:18:35");
INSERT INTO `201_files` VALUES("21","21","CARAAN, KARLA M..pdf","2025-05-03 13:18:53");
INSERT INTO `201_files` VALUES("22","22","CARAAN, LENILYN C..pdf","2025-05-03 13:19:08");
INSERT INTO `201_files` VALUES("23","23","CARINGAL, LILIAN E..pdf","2025-05-03 13:19:19");
INSERT INTO `201_files` VALUES("24","24","CASTILLO, LORENA M..pdf","2025-05-03 13:19:35");
INSERT INTO `201_files` VALUES("25","25","CASTILLO, MIAN S..pdf","2025-05-03 13:19:44");
INSERT INTO `201_files` VALUES("26","26","CUEVAS, REA MAE C..pdf","2025-05-03 13:19:55");
INSERT INTO `201_files` VALUES("27","27","DE LA PAZ, ROSARIE C..pdf","2025-05-03 13:20:05");
INSERT INTO `201_files` VALUES("28","28","DE LEON, RODANTE G..pdf","2025-05-03 13:20:14");
INSERT INTO `201_files` VALUES("29","29","DE OCAMPO, LEMUEL B..pdf","2025-05-03 13:20:22");
INSERT INTO `201_files` VALUES("30","30","DEL MUNDO, HERWIN D..pdf","2025-05-03 13:20:34");
INSERT INTO `201_files` VALUES("31","31","DEL MUNDO, RONALDO A..pdf","2025-05-03 13:20:48");
INSERT INTO `201_files` VALUES("32","32","DIMAANO, FERDINAND L..pdf","2025-05-03 13:20:59");
INSERT INTO `201_files` VALUES("33","33","DIMAYUGA, EVA P..pdf","2025-05-03 13:21:09");
INSERT INTO `201_files` VALUES("34","34","ESMEDILLA, GLENN JOSHUA M..pdf","2025-05-03 13:21:20");
INSERT INTO `201_files` VALUES("35","35","ESMEDILLA, RUEL A..pdf","2025-05-03 13:21:31");
INSERT INTO `201_files` VALUES("36","36","FEDERICO, JELLO MAE I..pdf","2025-05-03 13:21:41");
INSERT INTO `201_files` VALUES("37","37","FELIPE, CHRISTIAN M..pdf","2025-05-03 13:21:52");
INSERT INTO `201_files` VALUES("38","38","FLORES, KIMBERLY M..pdf","2025-05-03 13:22:01");
INSERT INTO `201_files` VALUES("39","39","FLORO, ARNEL D..pdf","2025-05-03 13:22:10");
INSERT INTO `201_files` VALUES("40","40","GONZALES, ABEGAEL L..pdf","2025-05-03 13:22:20");
INSERT INTO `201_files` VALUES("41","41","GONZALES, GILBERT O..pdf","2025-05-03 13:22:28");
INSERT INTO `201_files` VALUES("42","42","GONZALES, MARK JOHN DANNYL D..pdf","2025-05-03 13:22:44");
INSERT INTO `201_files` VALUES("43","43","GORDO, CAMILLE C..pdf","2025-05-03 13:22:53");
INSERT INTO `201_files` VALUES("44","44","GUEVARRA, GRACE L..pdf","2025-05-03 13:23:05");
INSERT INTO `201_files` VALUES("45","45","GUNDA, JUDIEL A..pdf","2025-05-03 13:23:16");
INSERT INTO `201_files` VALUES("46","46","HERNANDEZ, CHRISTIAN JAMES C..pdf","2025-05-03 13:23:28");
INSERT INTO `201_files` VALUES("47","47","HERNANDEZ, MARY ANN M..pdf","2025-05-03 13:23:42");
INSERT INTO `201_files` VALUES("48","48","HERNANDEZ, NENET M..pdf","2025-05-03 13:23:53");
INSERT INTO `201_files` VALUES("49","49","HIDALGO, LADY IVY T..pdf","2025-05-03 13:24:04");
INSERT INTO `201_files` VALUES("50","50","ILAGAN, JANET M..pdf","2025-05-03 13:24:15");
INSERT INTO `201_files` VALUES("51","51","ILAGAN, JAY M..pdf","2025-05-03 13:24:24");
INSERT INTO `201_files` VALUES("52","52","ILAGAN, KRISNO O..pdf","2025-05-03 13:24:37");
INSERT INTO `201_files` VALUES("53","53","ILAGAN, WILKIM D..pdf","2025-05-03 13:24:46");
INSERT INTO `201_files` VALUES("54","54","INGALLA, SAMANTHA ABIGAIL M..pdf","2025-05-03 13:25:00");
INSERT INTO `201_files` VALUES("55","55","KASILAG, KAREN U..pdf","2025-05-03 13:25:10");
INSERT INTO `201_files` VALUES("56","56","KATIGBAK, REVELYN G..pdf","2025-05-03 13:25:22");
INSERT INTO `201_files` VALUES("57","57","KATIMBANG, GELYN M..pdf","2025-05-03 13:25:35");
INSERT INTO `201_files` VALUES("58","58","LACSON, JOEY G..pdf","2025-05-03 13:25:44");
INSERT INTO `201_files` VALUES("59","59","LALAMUNAN, YVAN JAMES H..pdf","2025-05-03 13:25:52");
INSERT INTO `201_files` VALUES("60","60","LAQUI, KAREN JOY A..pdf","2025-05-03 13:26:04");
INSERT INTO `201_files` VALUES("61","61","LAQUI, MERLYN C..pdf","2025-05-03 13:26:14");
INSERT INTO `201_files` VALUES("62","62","LESCANO, DEBBIE M..pdf","2025-05-03 13:26:24");
INSERT INTO `201_files` VALUES("63","63","LEYESA, GERARD T..pdf","2025-05-03 13:26:32");
INSERT INTO `201_files` VALUES("64","64","LEYESA, MA. TERESA T..pdf","2025-05-03 13:26:44");
INSERT INTO `201_files` VALUES("65","65","LITAN, RHODA P..pdf","2025-05-03 13:26:55");
INSERT INTO `201_files` VALUES("66","66","LOJO, NOREEN M..pdf","2025-05-03 13:27:03");
INSERT INTO `201_files` VALUES("67","67","LUBI, MICHAEL L..pdf","2025-05-03 13:27:13");
INSERT INTO `201_files` VALUES("68","68","LUBIS, HILDA L..pdf","2025-05-03 13:27:24");
INSERT INTO `201_files` VALUES("69","69","MAGPANTAY, CONCEPCION M..pdf","2025-05-03 13:27:46");
INSERT INTO `201_files` VALUES("70","70","MAGPANTAY, ERWIN L..pdf","2025-05-03 13:27:55");
INSERT INTO `201_files` VALUES("71","72","MALABANAN, MIRASOL E..pdf","2025-05-03 13:28:11");
INSERT INTO `201_files` VALUES("72","73","MALALUAN, EMILIA R..pdf","2025-05-03 13:28:22");
INSERT INTO `201_files` VALUES("73","74","MANALO, ALVIN L..pdf","2025-05-03 13:28:35");
INSERT INTO `201_files` VALUES("74","75","MANALO, ANGELITA L..pdf","2025-05-03 13:28:50");
INSERT INTO `201_files` VALUES("75","76","MANALO, JOEL L..pdf","2025-05-03 13:28:59");
INSERT INTO `201_files` VALUES("76","78","MANALO, NOVILITO M..pdf","2025-05-03 13:29:20");
INSERT INTO `201_files` VALUES("77","79","MANALO, PRIMROSE B..pdf","2025-05-03 13:29:42");
INSERT INTO `201_files` VALUES("78","80","MANALO, ROY A..pdf","2025-05-03 13:30:17");
INSERT INTO `201_files` VALUES("79","81","MANDIGMA, ALAIZA L..pdf","2025-05-03 13:30:26");
INSERT INTO `201_files` VALUES("80","82","MANIGBAS, SHERYL A..pdf","2025-05-03 13:30:38");
INSERT INTO `201_files` VALUES("81","83","MANIGBAS, VICKY K..pdf","2025-05-03 13:30:48");
INSERT INTO `201_files` VALUES("82","84","MARALIT, JOCELYN D..pdf","2025-05-03 13:31:02");
INSERT INTO `201_files` VALUES("83","85","MARANAN, ALONA MAE M..pdf","2025-05-03 13:31:11");
INSERT INTO `201_files` VALUES("84","86","MATANGUIHAN, EDWIN C..pdf","2025-05-03 13:31:25");
INSERT INTO `201_files` VALUES("85","87","MATANGUIHAN, JAY V..pdf","2025-05-03 13:31:51");
INSERT INTO `201_files` VALUES("86","88","MATANGUIHAN, MARIBEL L..pdf","2025-05-03 13:32:00");
INSERT INTO `201_files` VALUES("87","89","MATIBAG, MARIBEL L..pdf","2025-05-03 13:32:11");
INSERT INTO `201_files` VALUES("88","90","MAUHAY, MARILYN S..pdf","2025-05-03 13:32:19");
INSERT INTO `201_files` VALUES("89","91","MENDOZA, ELAINE D..pdf","2025-05-03 13:32:27");
INSERT INTO `201_files` VALUES("90","92","METRILLO, JAY A..pdf","2025-05-03 13:32:38");
INSERT INTO `201_files` VALUES("91","93","NARIO, ANA ROSE M..pdf","2025-05-03 13:32:45");
INSERT INTO `201_files` VALUES("92","94","OBTIAL, ANGELA JOYCE L..pdf","2025-05-03 13:32:57");
INSERT INTO `201_files` VALUES("93","95","OCAMPO, GINA D..pdf","2025-05-03 13:33:05");
INSERT INTO `201_files` VALUES("94","96","OLARTE, MICHAEL R..pdf","2025-05-03 13:33:16");
INSERT INTO `201_files` VALUES("95","97","OLAVE, FE R..pdf","2025-05-03 13:33:23");
INSERT INTO `201_files` VALUES("96","98","ORENSE, JONAS KING L..pdf","2025-05-03 13:33:32");
INSERT INTO `201_files` VALUES("97","99","ORENSE, TRINA CORINNE E..pdf","2025-05-03 13:33:41");
INSERT INTO `201_files` VALUES("98","100","OSEÑA, NILDA T..pdf","2025-05-03 13:33:49");
INSERT INTO `201_files` VALUES("99","101","PALCUTO, LANY B..pdf","2025-05-03 13:33:57");
INSERT INTO `201_files` VALUES("100","102","PALO, CHERYL P..pdf","2025-05-03 13:34:06");
INSERT INTO `201_files` VALUES("101","103","PANGANIBAN, ELMIE H..pdf","2025-05-03 13:34:23");
INSERT INTO `201_files` VALUES("102","104","PASIA, JENNY E..pdf","2025-05-03 13:34:31");
INSERT INTO `201_files` VALUES("103","105","PURA, PRISCILA I..pdf","2025-05-03 13:34:41");
INSERT INTO `201_files` VALUES("104","106","RABUSA, BABYLYN M..pdf","2025-05-03 13:34:49");
INSERT INTO `201_files` VALUES("105","107","REYES, GIO H..pdf","2025-05-03 13:34:58");
INSERT INTO `201_files` VALUES("106","108","REYES, HARLEY ALEXIS V..pdf","2025-05-03 13:35:06");
INSERT INTO `201_files` VALUES("107","109","REYES, JOAN R..pdf","2025-05-03 13:35:13");
INSERT INTO `201_files` VALUES("108","110","SADSAD, ELNIÑA JANE L..pdf","2025-05-03 13:35:24");
INSERT INTO `201_files` VALUES("109","111","SAGUN, SHERLYN T..pdf","2025-05-03 13:35:30");
INSERT INTO `201_files` VALUES("110","112","SARMIENTO, EDWIN T..pdf","2025-05-03 13:35:38");
INSERT INTO `201_files` VALUES("111","113","SARMIENTO, MAE ANN M..pdf","2025-05-03 13:35:47");
INSERT INTO `201_files` VALUES("112","114","SILVA, JONABETH N..pdf","2025-05-03 13:35:55");
INSERT INTO `201_files` VALUES("113","115","SISCAR, MORENA S..pdf","2025-05-03 13:36:05");
INSERT INTO `201_files` VALUES("114","116","TAPEL, FLORY I..pdf","2025-05-03 13:36:13");
INSERT INTO `201_files` VALUES("115","117","TIBAYAN, KRIZA JOY R..pdf","2025-05-03 13:36:20");
INSERT INTO `201_files` VALUES("116","118","TIPAN, ELSA B..pdf","2025-05-03 13:36:27");
INSERT INTO `201_files` VALUES("117","119","TIPAN, GALLY D..pdf","2025-05-03 13:36:34");
INSERT INTO `201_files` VALUES("118","120","TIPAN, LALAINE B..pdf","2025-05-03 13:36:41");
INSERT INTO `201_files` VALUES("119","121","TIPAN, MARY ROSE L..pdf","2025-05-03 13:36:48");
INSERT INTO `201_files` VALUES("120","122","TIPAN, NOIME T..pdf","2025-05-03 13:36:56");
INSERT INTO `201_files` VALUES("121","123","TUMAMBING, OLIVER A..pdf","2025-05-03 13:37:03");
INSERT INTO `201_files` VALUES("122","124","UMALI, MARA M..pdf","2025-05-03 13:37:16");
INSERT INTO `201_files` VALUES("123","125","VELASQUEZ, GIAN MARCO R..pdf","2025-05-03 13:37:24");
INSERT INTO `201_files` VALUES("124","126","VERGARA, GIAN LORENZ S..pdf","2025-05-03 13:37:34");
INSERT INTO `201_files` VALUES("125","127","VERGARA, JOCELYN R..pdf","2025-05-03 13:37:47");
INSERT INTO `201_files` VALUES("126","128","VERGARA, PEPITO D..pdf","2025-05-03 13:37:57");
INSERT INTO `201_files` VALUES("127","77","MANALO, MELITON A..pdf","2025-05-07 20:11:57");
INSERT INTO `201_files` VALUES("128","71","MALABAG, ROWELL B..pdf","2025-05-07 20:21:24");

DROP TABLE IF EXISTS `201_folders`;
CREATE TABLE `201_folders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `201_folders` VALUES("1","ABRAHAM, ELLEN M","");
INSERT INTO `201_folders` VALUES("2","AGBING, MICKAELA M","");
INSERT INTO `201_folders` VALUES("3","AGUILA, LOTALIE V","");
INSERT INTO `201_folders` VALUES("4","ALFILER, EMMANUEL A","");
INSERT INTO `201_folders` VALUES("5","ANDAL, AILEEN L","");
INSERT INTO `201_folders` VALUES("6","ARIOLA, ALWIN E","");
INSERT INTO `201_folders` VALUES("7","ATIENZA, JEFFREY C","");
INSERT INTO `201_folders` VALUES("8","AVEO, MYLENE B","");
INSERT INTO `201_folders` VALUES("9","BABADILLA, ROWENA R","");
INSERT INTO `201_folders` VALUES("10","BAGIOEN, MARY CLAIRE S","");
INSERT INTO `201_folders` VALUES("11","BALITA, ANNABELLE S","");
INSERT INTO `201_folders` VALUES("12","BARROGO, AL JOHNRY S","");
INSERT INTO `201_folders` VALUES("13","BAUTISTA, CAMILLE GRACE O","");
INSERT INTO `201_folders` VALUES("14","BAUTISTA, MARIO D","");
INSERT INTO `201_folders` VALUES("15","BENEDICTO, RONALD A","");
INSERT INTO `201_folders` VALUES("16","BINAY, ARLYN O","");
INSERT INTO `201_folders` VALUES("17","BISCOCHO, MYLENE M","");
INSERT INTO `201_folders` VALUES("18","BRUCAL, RICHARD C","");
INSERT INTO `201_folders` VALUES("19","CABRERA, MARJORIE O","");
INSERT INTO `201_folders` VALUES("20","CALINISAN, LOURDES O","");
INSERT INTO `201_folders` VALUES("21","CARAAN, KARLA M","");
INSERT INTO `201_folders` VALUES("22","CARAAN, LENILYN C","");
INSERT INTO `201_folders` VALUES("23","CARINGAL, LILIAN E","");
INSERT INTO `201_folders` VALUES("24","CASTILLO, LORENA M","");
INSERT INTO `201_folders` VALUES("25","CASTILLO, MIAN S","");
INSERT INTO `201_folders` VALUES("26","CUEVAS, REA MAE C","");
INSERT INTO `201_folders` VALUES("27","DE LA PAZ, ROSARIE C","");
INSERT INTO `201_folders` VALUES("28","DE LEON, RODANTE G","");
INSERT INTO `201_folders` VALUES("29","DE OCAMPO, LEMUEL B","");
INSERT INTO `201_folders` VALUES("30","DEL MUNDO, HERWIN D","");
INSERT INTO `201_folders` VALUES("31","DEL MUNDO, RONALDO A","");
INSERT INTO `201_folders` VALUES("32","DIMAANO, FERDINAND L","");
INSERT INTO `201_folders` VALUES("33","DIMAYUGA, EVA P","");
INSERT INTO `201_folders` VALUES("34","ESMEDILLA, GLENN JOSHUA M","");
INSERT INTO `201_folders` VALUES("35","ESMEDILLA, RUEL A","");
INSERT INTO `201_folders` VALUES("36","FEDERICO, JELLO MAE I","");
INSERT INTO `201_folders` VALUES("37","FELIPE, CHRISTIAN M","");
INSERT INTO `201_folders` VALUES("38","FLORES, KIMBERLY M","");
INSERT INTO `201_folders` VALUES("39","FLORO, ARNEL D","");
INSERT INTO `201_folders` VALUES("40","GONZALES, ABEGAEL L","");
INSERT INTO `201_folders` VALUES("41","GONZALES, GILBERT O","");
INSERT INTO `201_folders` VALUES("42","GONZALES, MARK JOHN DANNYL D","");
INSERT INTO `201_folders` VALUES("43","GORDO, CAMILLE C","");
INSERT INTO `201_folders` VALUES("44","GUEVARRA, GRACE L","");
INSERT INTO `201_folders` VALUES("45","GUNDA, JUDIEL A","");
INSERT INTO `201_folders` VALUES("46","HERNANDEZ, CHRISTIAN JAMES C","");
INSERT INTO `201_folders` VALUES("47","HERNANDEZ, MARY ANN M","");
INSERT INTO `201_folders` VALUES("48","HERNANDEZ, NENET M","");
INSERT INTO `201_folders` VALUES("49","HIDALGO, LADY IVY T","");
INSERT INTO `201_folders` VALUES("50","ILAGAN, JANET M","");
INSERT INTO `201_folders` VALUES("51","ILAGAN, JAY M","");
INSERT INTO `201_folders` VALUES("52","ILAGAN, KRISNO O","");
INSERT INTO `201_folders` VALUES("53","ILAGAN, WILKIM D","");
INSERT INTO `201_folders` VALUES("54","INGALLA, SAMANTHA ABIGAIL M","");
INSERT INTO `201_folders` VALUES("55","KASILAG, KAREN U","");
INSERT INTO `201_folders` VALUES("56","KATIGBAK, REVELYN G","");
INSERT INTO `201_folders` VALUES("57","KATIMBANG, GELYN M","");
INSERT INTO `201_folders` VALUES("58","LACSON, JOEY G","");
INSERT INTO `201_folders` VALUES("59","LALAMUNAN, YVAN JAMES H","");
INSERT INTO `201_folders` VALUES("60","LAQUI, KAREN JOY A","");
INSERT INTO `201_folders` VALUES("61","LAQUI, MERLYN C","");
INSERT INTO `201_folders` VALUES("62","LESCANO, DEBBIE M","");
INSERT INTO `201_folders` VALUES("63","LEYESA, GERARD T","");
INSERT INTO `201_folders` VALUES("64","LEYESA, MA. TERESA T","");
INSERT INTO `201_folders` VALUES("65","LITAN, RHODA P","");
INSERT INTO `201_folders` VALUES("66","LOJO, NOREEN M","");
INSERT INTO `201_folders` VALUES("67","LUBI, MICHAEL L","");
INSERT INTO `201_folders` VALUES("68","LUBIS, HILDA L","");
INSERT INTO `201_folders` VALUES("69","MAGPANTAY, CONCEPCION M","");
INSERT INTO `201_folders` VALUES("70","MAGPANTAY, ERWIN L","");
INSERT INTO `201_folders` VALUES("71","MALABAG, ROWELL B","");
INSERT INTO `201_folders` VALUES("72","MALABANAN, MIRASOL E","");
INSERT INTO `201_folders` VALUES("73","MALALUAN, EMILIA R","");
INSERT INTO `201_folders` VALUES("74","MANALO, ALVIN L","");
INSERT INTO `201_folders` VALUES("75","MANALO, ANGELITA L","");
INSERT INTO `201_folders` VALUES("76","MANALO, JOEL L","");
INSERT INTO `201_folders` VALUES("77","MANALO, MELITON A","");
INSERT INTO `201_folders` VALUES("78","MANALO, NOVILITO M","");
INSERT INTO `201_folders` VALUES("79","MANALO, PRIMROSE B","");
INSERT INTO `201_folders` VALUES("80","MANALO, ROY A","");
INSERT INTO `201_folders` VALUES("81","MANDIGMA, ALAIZA L","");
INSERT INTO `201_folders` VALUES("82","MANIGBAS, SHERYL A","");
INSERT INTO `201_folders` VALUES("83","MANIGBAS, VICKY K","");
INSERT INTO `201_folders` VALUES("84","MARALIT, JOCELYN D","");
INSERT INTO `201_folders` VALUES("85","MARANAN, ALONA MAE M","");
INSERT INTO `201_folders` VALUES("86","MATANGUIHAN, EDWIN C","");
INSERT INTO `201_folders` VALUES("87","MATANGUIHAN, JAY V","");
INSERT INTO `201_folders` VALUES("88","MATANGUIHAN, MARIBEL L","");
INSERT INTO `201_folders` VALUES("89","MATIBAG, MARIBEL L","");
INSERT INTO `201_folders` VALUES("90","MAUHAY, MARILYN S","");
INSERT INTO `201_folders` VALUES("91","MENDOZA, ELAINE D","");
INSERT INTO `201_folders` VALUES("92","METRILLO, JAY A","");
INSERT INTO `201_folders` VALUES("93","NARIO, ANA ROSE M","");
INSERT INTO `201_folders` VALUES("94","OBTIAL, ANGELA JOYCE L","");
INSERT INTO `201_folders` VALUES("95","OCAMPO, GINA D","");
INSERT INTO `201_folders` VALUES("96","OLARTE, MICHAEL R","");
INSERT INTO `201_folders` VALUES("97","OLAVE, FE R","");
INSERT INTO `201_folders` VALUES("98","ORENSE, JONAS KING L","");
INSERT INTO `201_folders` VALUES("99","ORENSE, TRINA CORINNE E","");
INSERT INTO `201_folders` VALUES("100","OSEÑA, NILDA T","");
INSERT INTO `201_folders` VALUES("101","PALCUTO, LANY B","");
INSERT INTO `201_folders` VALUES("102","PALO, CHERYL P","");
INSERT INTO `201_folders` VALUES("103","PANGANIBAN, ELMIE H","");
INSERT INTO `201_folders` VALUES("104","PASIA, JENNY E","");
INSERT INTO `201_folders` VALUES("105","PURA, PRISCILA I","");
INSERT INTO `201_folders` VALUES("106","RABUSA, BABYLYN M","");
INSERT INTO `201_folders` VALUES("107","REYES, GIO H","");
INSERT INTO `201_folders` VALUES("108","REYES, HARLEY ALEXIS V","");
INSERT INTO `201_folders` VALUES("109","REYES, JOAN R","");
INSERT INTO `201_folders` VALUES("110","SADSAD, ELNIÑA JANE L","");
INSERT INTO `201_folders` VALUES("111","SAGUN, SHERLYN T","");
INSERT INTO `201_folders` VALUES("112","SARMIENTO, EDWIN T","");
INSERT INTO `201_folders` VALUES("113","SARMIENTO, MAE ANN M","");
INSERT INTO `201_folders` VALUES("114","SILVA, JONABETH N","");
INSERT INTO `201_folders` VALUES("115","SISCAR, MORENA S","");
INSERT INTO `201_folders` VALUES("116","TAPEL, FLORY I","");
INSERT INTO `201_folders` VALUES("117","TIBAYAN, KRIZA JOY R","");
INSERT INTO `201_folders` VALUES("118","TIPAN, ELSA B","");
INSERT INTO `201_folders` VALUES("119","TIPAN, GALLY D","");
INSERT INTO `201_folders` VALUES("120","TIPAN, LALAINE B","");
INSERT INTO `201_folders` VALUES("121","TIPAN, MARY ROSE L","");
INSERT INTO `201_folders` VALUES("122","TIPAN, NOIME T","");
INSERT INTO `201_folders` VALUES("123","TUMAMBING, OLIVER A","");
INSERT INTO `201_folders` VALUES("124","UMALI, MARA M","");
INSERT INTO `201_folders` VALUES("125","VELASQUEZ, GIAN MARCO R","");
INSERT INTO `201_folders` VALUES("126","VERGARA, GIAN LORENZ S","");
INSERT INTO `201_folders` VALUES("127","VERGARA, JOCELYN R","");
INSERT INTO `201_folders` VALUES("128","VERGARA, PEPITO D","");

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('superadmin','admin') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reset_token` varchar(100) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `employee_no` (`employee_no`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `admin` VALUES("1","LDR001","admin","$2y$10$wqvEaTtRI0nEDhPjE9c6yujXvGzJ/ySeu5/ULFfYSiO1MMjYbY1sS","jennymaegabuya8@gmail.com","superadmin","2025-02-17 06:35:11","2025-05-03 02:32:39","70d595eb8df0e895ef9a01aef3bd56fc307658eb4f7911da752a8da2f4b37d33dac6d38421fba0a9b175e99b106d92d68391","2025-03-30 11:55:31");

DROP TABLE IF EXISTS `appointed_cert_issuance`;
CREATE TABLE `appointed_cert_issuance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `start_date` date NOT NULL,
  `position` varchar(255) NOT NULL,
  `office_appointed` varchar(255) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `pera` decimal(10,2) NOT NULL,
  `rta` decimal(10,2) NOT NULL,
  `clothing` decimal(10,2) NOT NULL,
  `mid_year_bonus` decimal(10,2) NOT NULL,
  `year_end_bonus` decimal(10,2) NOT NULL,
  `cash_gift` decimal(10,2) NOT NULL,
  `productivity_enhancement` decimal(10,2) NOT NULL,
  `date_issued` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `extra_salary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  CONSTRAINT `appointed_cert_issuance_chk_1` CHECK (json_valid(`extra_salary`))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `appointed_cert_issuance` VALUES("3","Hon. Atty. Juan Dela Cruz","Dela Cruz","Male","2025-02-01","Admin Officer II","HR Office","12500.00","5600.00","534534.00","543543.00","45345.00","4345435.00","4345435.00","543543.00","2025-03-05","2025-03-08 16:05:23","2025-05-09 10:29:00","{\"New added edit\": 326432}");
INSERT INTO `appointed_cert_issuance` VALUES("4","Appointed test huhu","Test q ko","Male","2024-12-07","Admin Officer 321","Assesor\'s Office","56878.00","987.00","6578.00","788.00","879.00","796.00","5666.00","7769.00","2025-05-09","2025-03-08 16:43:48","2025-05-09 09:19:55","");
INSERT INTO `appointed_cert_issuance` VALUES("6","Testing for cert","Cert ni Mamamoo","Female","2025-05-08","Admin Officer 7","Assesor\'s Office","44354.00","34534.00","435.00","23432.00","4355.00","34534.00","34534.00","345345.00","2025-05-09","2025-05-09 09:07:49","2025-05-09 09:10:56","{\"new fields test\": \"23432\", \"Appointed test new\": \"9834923\"}");

DROP TABLE IF EXISTS `elected_cert_issuance`;
CREATE TABLE `elected_cert_issuance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `start_date` date NOT NULL,
  `position` varchar(255) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `pera` decimal(10,2) NOT NULL,
  `rta` decimal(10,2) NOT NULL,
  `clothing` decimal(10,2) NOT NULL,
  `mid_year_bonus` decimal(10,2) NOT NULL,
  `year_end_bonus` decimal(10,2) NOT NULL,
  `cash_gift` decimal(10,2) NOT NULL,
  `productivity_enhancement` decimal(10,2) NOT NULL,
  `date_issued` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `extra_salary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  CONSTRAINT `elected_cert_issuance_chk_1` CHECK (json_valid(`extra_salary`))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `elected_cert_issuance` VALUES("1","Jenny Mae A. Gabuya","Gabuya","Female","2025-02-02","Admin Officer III","545345.00","3234.00","34234.00","432432.00","34234.00","233432.00","3234324.00","34324.00","2025-05-09","2025-03-01 18:06:55","2025-05-09 08:46:31","");
INSERT INTO `elected_cert_issuance` VALUES("5","Elected test huhu","elected new","Male","2025-05-05","Admin Officer II","23456.00","43122.00","43232.00","23454.00","54345.00","34534.00","34543.00","34534.00","2025-05-09","2025-05-09 09:15:36","2025-05-09 10:20:29","{\"Elected New\": 87324}");

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employee_no` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `name_extension` varchar(10) DEFAULT NULL,
  `dob` date NOT NULL,
  `pob` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','O+','O-','Unknown') DEFAULT 'Unknown',
  `mobile_no` bigint DEFAULT NULL,
  `email_address` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `account_status` tinyint(1) NOT NULL DEFAULT '1',
  `hr_staff` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_no`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `employee` VALUES("148","Gerard","Tibayan","Leyesa","","1995-11-02","Mataasnakahoy, Batangas","Male","Single","Bryg. Calingatan Mataasnakahoy, Batangas","A+","9278669681","gerard.8k@gmail.com","","Office of the Municipal Planning and Development Coordinator","Planning Officer II","1","0","2025-05-09 01:48:01","2025-05-09 01:48:01");
INSERT INTO `employee` VALUES("151810100001","ANA ROSE","MENDOZA","NARIO","","1974-05-16","DON CARLOS, BUKIDNON","Female","Married","CALINGATAN, MATAASNAKAHOY, BATANGAS","O+","9175636887","narioana26@yahoo.com","","Office of the Municipal Civil Registry","Administrative Officer II (Public Relations Officer I)","1","0","2025-05-09 18:32:39","2025-05-09 18:32:39");
INSERT INTO `employee` VALUES("151810100001-X","Rosarie","Decastro","Delapaz","","1964-10-15","Lipa City","Female","Married","Banaybanay Concepcion Lipa City, Batangas","O+","9178578111","rhose_mark@yahoo.com","","Office of the Municipal Budget","Municipal Government Department Head (Mun. Budget)","1","0","2025-05-08 22:36:34","2025-05-08 22:36:34");
INSERT INTO `employee` VALUES("ACT-003","Rowena","Robles","Babadilla","","1982-07-30","Mataasnakahoy, Batangas","Female","Single","Bayorbor Mataasnakahoy, Batangas","B+","9171598751","babadillawhena@yahoo.com","","Office of the Municipal Accountant","Administrative Assistant I (Bookbinder III)","1","0","2025-05-07 09:29:30","2025-05-07 09:29:30");
INSERT INTO `employee` VALUES("ACT-004","Mylene","Binay","Aveo","","1983-08-28","Mataasnakahoy, Batangas","Female","Married","094 Rizal St. Longos Mataasnakahoy, Batangas","O+","9308684595","mylezaveo@gmail.com","","Office of the Municipal Accounting","Administrative Aide III (Utility Worker II)","1","0","2025-05-07 09:19:15","2025-05-07 09:19:15");
INSERT INTO `employee` VALUES("ACT001","Lenilyn","Carpo","Caraan","","1985-03-18","Calasiao, Pangasinan","Female","Married","419 Rafael Lubis St. 2A Mataasnakahoy, Batangas","A+","9258817882","carpo_lenilyn@yahoo.com","","Office of the Municipal Accountant","Mun. Gov\'t Dept. Head ( Municipal Accountant) ","1","0","2025-05-08 00:03:15","2025-05-08 00:03:15");
INSERT INTO `employee` VALUES("ACT002","Mylene","Matanguihan","Biscocho","","1976-02-18","FAB Hospital, Lipa City","Female","Married","Purok 4 Brgy. Upa Mataasnakahoy, Batangas","B+","9237179997","biscocho_mylene@yahoo.com","","Office of the Municipal Accounting","Administrative Officer IV (Management and Audit Analyst II)","1","0","2025-05-07 20:37:37","2025-05-07 20:37:37");
INSERT INTO `employee` VALUES("ACT003","JAY","ATIENZA","METRILLO","","1984-03-04","MATAASNAKAHOY, BATANGAS","Male","Married","UPA, MATAASNAKAHOY, BATANGAS","O+","9186204164","metrillojay069@gmail.com","","Municipal Treasury Office (MTO)","Assistant Municipal Treasurer","1","0","2025-05-09 08:14:59","2025-05-09 08:14:59");
INSERT INTO `employee` VALUES("ACT004","MICHAEL","LUBI","LUBI","","1978-09-29","NANGKAAN, MATAASNAKAHOY, BATANGAS","Male","Married","109, PUROK 2, NANGKAAN, MATAASNAKAHOY, BATANGAS","B+","9476212325","lubi9790@gmail.com","","Office of the Municipal Accounting","Administrative Aide I (Utility Worker I)","1","0","2025-05-10 07:26:44","2025-05-10 07:26:44");
INSERT INTO `employee` VALUES("AGR-008","Christian James","Castillo","Hernandez","","1998-10-10","Bubuyan, Mataasnakahoy, Batangas","Male","Single","024 Brgy. Bubuyan Mataasnakahoy, Batangas","B+","9122711811","cjzaihernandez@gmail.com","","Office of the Municipal Agriculture","Administrative Officer I","1","0","2025-05-09 00:12:04","2025-05-09 00:12:04");
INSERT INTO `employee` VALUES("AGR001","Aileen","Leyesa","Andal","","1976-09-30","Mataasnakahoy","Female","Married","Calingatan Mataasnakahoy, Batangas","A+","9171890486","aileenleyesaandal@gmail.com","","Office of the Municipal Agriculture ","Municipal Government Department Head (Municipal Agriculturist SG-24)","1","0","2025-05-07 00:21:19","2025-05-07 00:21:19");
INSERT INTO `employee` VALUES("AGR002","JAY","VERGARA","MATANGUIHAN","","1978-12-31","MATAASNAKAHOY","Male","Married","UPA, MATAASNAKAHOY, BATANGAS","AB+","9759096259","NA2@gmail.com","","Office of the Municipal Agriculture","Administrative Aide VI (labor Foreman)","1","0","2025-05-09 06:36:04","2025-05-09 06:36:04");
INSERT INTO `employee` VALUES("AGR004","EDWIN","TIBAYAN","SARMIENTO","","1968-03-25","MATAASNAKAHOY","Male","Married","BRGY. III, MATAASNAKAHOY, BATANGAS","O+","9397621083","NA5@gmail.com","","Office of the Municipal Agriculture","Farm Foreman","1","0","2025-05-10 00:47:14","2025-05-10 00:47:14");
INSERT INTO `employee` VALUES("AGR005","RHODA","PAGARAN","LITAN","","1971-08-28","TUPI SOUTH COTABATO","Female","Married","CRISANTA HOMES SUBDIVISION, CALINGATAN, MATAAS NA KAHOY, BATANGAS","A+","9202539331","rhoda_litann46@yahoo.com","","Office of the Municipal Engineer","Administrative Assistant I","1","0","2025-05-07 19:19:49","2025-05-07 19:19:49");
INSERT INTO `employee` VALUES("AGR008","SHERYL","ARMSTRONG","MANIGBAS","","1979-02-08","PIODURAN, ALBAY","Female","Married","CARMA ST., BRGY. II,  MATAASNAKAHOY, BATANGAS","A+","9217918635","sherylm321@gmail.com","","Office of the Municipal Agriculture","Administrative Aide III (Clerk I)","1","0","2025-05-10 08:00:43","2025-05-10 08:00:43");
INSERT INTO `employee` VALUES("AGR013","Joey","Gonzales","Lacson","","1984-03-08","Mataasnakahoy","Male","Single","Brgy. Nangkaan Mataasnakahoy, Batangas","O+","9396150670","lacsonjoey8@gmail.com","","Office of the Municipal Accounting","Administrative Aide I (Utility Worker I) ","1","0","2025-05-09 01:23:32","2025-05-09 01:23:32");
INSERT INTO `employee` VALUES("AGRI007","CHERYL","PRESTO","PALO","","1980-05-16","PUERTO PRINCESA, PALAWAN","Female","Married","F.SILVA, CALINGATAN, MATAASNAKAHOY, BATANGAS","A+","9068149427","chechepresto@yahoo.com","","Office of the Municipal Agriculture","Administrative Aide VI (Utility Foreman)","1","0","2025-05-09 19:36:53","2025-05-09 19:36:53");
INSERT INTO `employee` VALUES("ASS004","ROY","ABARINTOS","MANALO","","1977-02-03","MATAASNAKAHOY, BATANGAS","Male","Married","CALINGATAN, MATAASNAKAHOY, BATANGAS","O+","9272322274","roprinicar@yahoo.com","","Office of the Municipal Assessor","Administrative Assistant I (Bookbinder III)","1","0","2025-05-09 01:22:12","2025-05-09 01:22:12");
INSERT INTO `employee` VALUES("ASS007","Jeffrey","Cuarto","Atienza","","1990-05-18","Mataasnakahoy, Batangas","Male","Single","63 Lobrin St. Purok IV Upa Mataasnakahoy, Batangas","A+","9108558507","jeffreyatienzac@gmail.com","","Office of the Municipal Assessor ","Administrative Aide I (Utility Worker I) ","1","0","2025-05-07 00:44:31","2025-05-07 00:44:31");
INSERT INTO `employee` VALUES("ASS010","Mark John Dannyl","De Leon","Gonzales","","1995-11-29","Mataasnakahoy, Batangas","Male","Single","Brgy. Kinalaglagan Mataasnakahoy, Batangas","B+","9758321502","gonzalesdannyl669@gmail.com","","Office of the Municipal Disaster Risk Reduction and Management","Administrative Aide III (Driver I) ","1","0","2025-05-08 23:53:07","2025-05-08 23:53:07");
INSERT INTO `employee` VALUES("ASS012","BABYLYN","MASANGKAY","RABUSA","","1986-02-14","PANGAO, LIPA CITY","Female","Married","PUROK 1, CALINGATAN, MATAASNAKAHOY, BATANGAS","A+","9685911890","ayeshazyril.azr@gmail.com","","Office of the Municipal Assessor","AdministratIve Aide I (Utility worker I)","1","0","2025-05-09 23:19:39","2025-05-09 23:19:39");
INSERT INTO `employee` VALUES("ASS013","ELNIÑA JANE","LUMBERA","SADSAD","","1997-06-03","MATAASNAKAHOY, BATANGAS","Female","Single","PUROK 5, UPA, MATAASNAKAHOY, BATANGAS","B+","9996599179","ejanelsadsad@gmail.com","","Office of the Municipal Assessor","Administrative Assistant II (Clerk IV)","1","0","2025-05-10 00:01:12","2025-05-10 00:01:12");
INSERT INTO `employee` VALUES("EMP005","Marjorie","Orense","Cabrera","","1999-08-23","Nangkaan Mataasnakahoy, Batangas","Female","Single","155 Purok 3 Nangkaan Mataasnakahoy, Batangas","A-","9474077036","marjoriecabrera2399@gmail.com","Marjorie.png","Office of the Municipal Human Resource Management","Administrative Aide IV ( Human Resource Management Aide)","1","1","2025-02-19 14:09:03","2025-05-08 16:00:00");
INSERT INTO `employee` VALUES("EMP006","Lenard Joseph","V.","Ariola","","1993-11-15","Iloilo City","Male","Single","303 Jaro St., Iloilo","A-","9691234567","elena.torres@email.com","Lenard.png","HR Coordinator","Job Order","1","1","2025-02-19 14:09:03","2025-04-23 05:50:52");
INSERT INTO `employee` VALUES("EMP007","Gilbert","Oseña","Gonzales","","1976-10-14","Batangas City","Male","Married","19 Sarmiento St. Brgy III Mataasnakahoy, Batangas","O+","9770923216","blank08162005@gmail.com","Gilbert.png","Office of the Local Disaster Risk Reduction and Management","Administrative Aide I","1","1","2025-02-19 14:09:03","2025-05-08 16:00:00");
INSERT INTO `employee` VALUES("EMP008","Isabel","T.","Mendoza","","1998-02-25","Laguna","Female","Single","505 Calamba Rd., Laguna","AB-","9891234567","isabel.mendoza@email.com","","","","1","0","2025-02-19 14:09:03","2025-04-23 05:50:52");
INSERT INTO `employee` VALUES("EMP009","Miguel","R.","Domingo","","1991-08-09","Pampanga","Male","Married","606 Angeles St., Pampanga","O+","9991234567","miguel.domingo@email.com","","","","1","0","2025-02-19 14:09:03","2025-04-23 05:50:52");
INSERT INTO `employee` VALUES("GSO-002","SHERLYN","TAPAY","SAGUN","","1980-03-09","MATAASNAKAHOY, BATANGAS","Female","Married","333, LONGOS ST, MACALINTAL SUBD., BRGY.III, MATAASNAKAHOY, BATANGAS","O+","9171192604","lovely_lhen03@yahoo.com","","Office of the Mayor","Labor and Employment Officer I","1","0","2025-05-10 00:39:33","2025-05-10 00:39:33");
INSERT INTO `employee` VALUES("GSO-006","Eva","Precilla","Dimayuga","","1977-04-25","Mataasnakahoy, Batangas","Female","Married","Purok II Sitio Parang Brgy II Mataasnakahoy, Batangas","B+","9173113215","gimayugaeva46@gmail.com","","Office of the Mayor-Office of the General Services Officer","Administrative Aide III (Utility Worker II)","1","0","2025-05-08 23:15:21","2025-05-08 23:15:21");
INSERT INTO `employee` VALUES("GSO003","NILDA","TISBE","OSEÑA","","0972-11-12","MATAASNAKAHOY, BATANGAS","Female","Single","BRGY. IV, MATAASNAKAHOY, BATANGAS","O+","9483102571","nildaosena1@gmail.com","","Mayor\'s Office - Office of the Municipal General Services Officer","Administrative Aide I (Utility Worker I)","1","0","2025-05-10 08:41:50","2025-05-10 08:41:50");
INSERT INTO `employee` VALUES("GSO006","Mary Claire","Sayas","Bagioen","","1997-03-10","Mataasnakahoy","Female","Single","150 Nangkaan Mataasnakahoy, Batangas","B+","9060050076","maryclairesbagioen@gmail.com","","Mayor\'s Office- Office of the Municipal General Services Officer","Administrative Officer I (Supply Officer I)","1","0","2025-05-07 09:35:17","2025-05-06 16:00:00");
INSERT INTO `employee` VALUES("GSO008","Christian","Manalo","Felipe","","1996-05-01","Mataasnakahoy","Male","Single","242 Nangkaan Mataasnakahoy, Batangas","B+","9567222425","felipechristian.23@gmail.com","","Mayors Office of the Municipal General Services Officer","Administrative Aide I (Utility Worker I)","1","0","2025-05-08 23:23:13","2025-05-08 23:23:13");
INSERT INTO `employee` VALUES("HRM-003","LANY","BUNYI","PALCUTO","","1965-08-28","ORIENTAL MINDORO","Female","Married","CRISANTA HOMES SUBDIVISION, CALINGATAN, MATAASNAKAHOY, BATANGAS","O+","9171852210","lanybpalcuto@yahoo.com","","Office of the Municipal Health","Dental Aide ","1","0","2025-05-09 19:21:49","2025-05-09 19:21:49");
INSERT INTO `employee` VALUES("HRM002","NOIME","TAPAT","TIPAN","","1972-02-05","LIPA CITY","Female","Widowed","#200, BRGY. II, MATAASNAKAHOY, BATANGAS","B+","9206311387","noimetipan@yahoo.com.ph","","Office of the Municipal Human Resource Management","Administrative Officer IV (Human Resource Management Officer II)","1","0","2025-05-10 06:25:00","2025-05-10 06:25:00");
INSERT INTO `employee` VALUES("HRM004","Gelyn","Matibag","Katimbang","","1981-05-28","Dita, Cuenca, Batangas","Female","Married","Brgy. Dita Cuenca, Batangas","B+","9772866201","gmatibag10581@yahoo.com","Gelyn.png","Office of the Municipal Human Resource Management ","Administrative Officer II ( Human Resource Management Officer I)","1","1","2025-02-19 14:09:03","2025-05-11 13:48:08");
INSERT INTO `employee` VALUES("HRM005","ELMIE","HERNANDEZ","PANAGANIBAN","","1976-12-02","MATAASNAKAHOY, BATANGAS","Female","Married","PUROK 3, BUBUYAN, MATAASNAKAHOY, BATANGAS","O+","9293470507","elmiehp@gmail.com","","Office of the Municipal Human Resource Management","Administrative Aide VI (Clerk III)","1","1","2025-05-09 19:46:56","2025-05-09 19:46:56");
INSERT INTO `employee` VALUES("LDR001","GALLY","DIMAYUGA","TIPAN","","1990-06-28","CUENCA, BATANGAS","Male","Single","CUENCA, BATANGAS","A+","9175633720","admin@gmail.com","Gally.png","Office of the Municipal Human Resource Management","Municipal Government Department Head (Municipal Human Resource Management Officer)","1","1","2025-02-17 06:33:54","2025-05-11 13:43:23");
INSERT INTO `employee` VALUES("LDR002","Annabelle","Subol","Balita","","1975-09-06","Mataasnakahoy, Batangas","Female","Married","55 Victomar Subd. Brgy IV Mataasnakahoy, Batangas","B+","9778194809","belle.balita@gmail.com","","Office of the Mayor","Administrative Officer II","1","0","2025-05-07 09:46:06","2025-05-07 09:46:06");
INSERT INTO `employee` VALUES("LDR003","KRIZA JOY","RECIO","TIBAYAN","","1991-03-25","MATAASNAKAHOY, BATANGAS","Female","Married","KINALAGLAGAN, MATAASNAKAHOY, BATANGAS","B+","9171081992","azirk_17@yahoo.com","","Office of the Mayor","Youth Development Assistant II","1","0","2025-05-10 01:47:48","2025-05-10 01:47:48");
INSERT INTO `employee` VALUES("LDR010","JONAS KING","LUBI","ORENSE","","1997-11-09","MATAASNAKAHOY, BATANGAS","Male","Single","051, PUROK 1, NANGKAAN, MATAASNAKAHOY, BATANGAS","O+","9652814876","jkorense@gmail.com","","Mayor\'s Office - Office of the Municipal Disaster Risk Reduction and Management","Administrative Aide I (Utility Worker I)","1","0","2025-05-09 19:01:11","2025-05-09 19:01:11");
INSERT INTO `employee` VALUES("MBO_003","ELAINE","DESPOJO","MENDOZA","","1994-02-17","MATAASNAKAHOY","Female","Single","BRGY. I, MATAASNAKAHOY, BATANGAS","O+","9171239593","mendozaelaine1726@yahoo.com","","Office of the Municipal Budget","Administrative Office I (Records Officer I)","1","0","2025-05-09 08:08:48","2025-05-09 08:08:48");
INSERT INTO `employee` VALUES("MBO-003","VICKY","KATIMBANG","MANIGBAS","","1974-12-21","BRGY. I, MATAASNAKAHOY, BATANGAS","Female","Single","BRGY. I, MATAASNAKAHOY, BATANGAS","O+","9171381847","vkmanigbas@yahoo.com","","Office of the Municipal Budget","Administrative Officer II (Budget Officer I)","1","0","2025-05-09 01:32:59","2025-05-09 01:32:59");
INSERT INTO `employee` VALUES("MBO004","MARY ROSE","LESCANO","TIPAN","","1988-12-20","LIPA CITY, BATANGAS","Female","Married","#144, ZONE 1, BUBUYAN, MATAASNAKAHOY, BATANGAS","B+","9764771424","mhadelrose@gmail.com","","Office of the Municipal Budget","Administrative Assistant I (Bookbinder III)","1","0","2025-05-10 06:18:05","2025-05-10 06:18:05");
INSERT INTO `employee` VALUES("MCR-001","LALAINE","BATHAN","TIPAN","","1964-02-19","MATAASNAKAHOY, BATANGAS","Female","Married","CALINGATAN, MATAASNAKAHOY, BATANGAS","O+","9173291964","tipanlalaine2@gmail.com","","Office of the Municipal Civil Registry","Municipal Civil Registrar","1","0","2025-05-10 02:14:36","2025-05-10 02:14:36");
INSERT INTO `employee` VALUES("MCR002","PRIMROSE","BAYANI","MANALO","","1976-03-15","MATAASNAKAHOY, BATANGAS","Female","Married","CALINGATAN, MATAASNAKAHOY, BATANGAS","B+","9669477873","NA1@gmail.com","","Office of the Municipal Civil Registry","Registration Officer II","1","0","2025-05-09 01:14:22","2025-05-09 01:14:22");
INSERT INTO `employee` VALUES("MCR004","ELSA","BACEA","TIPAN","","1980-08-04","PANAY, CAPIZ","Female","Married","NANGKAAN, MATAASNAKAHOY, BATANGAS","O+","9384197916","aliyahanthony054@gmail.com","","Office of the Municipal Civil Registry","Administrative Assistant I (Bookbinder III)","1","0","2025-05-10 01:53:49","2025-05-10 01:53:49");
INSERT INTO `employee` VALUES("MCRO05","MARA","MANALO","UMALI","","1996-09-12","MATAASNAKAHOY, BATANGAS","Female","Single","#244, LUMANG LIPA, MATAASNAKAHOY, BATANGAS","B+","9157018196","umalimara70@gmail.com","","Office of the Municipal Civil Registry","Administrative Aide I (Utility Worker I)","1","0","2025-05-10 06:46:56","2025-05-10 06:46:56");
INSERT INTO `employee` VALUES("MEO001","Nenet","Matanguihan","Hernandez","","1959-12-28","Mataasnakahoy","Female","Married","Rizal St. Brgy. II-A Mataasnakahoy, Batangas","B+","9778320407","nenet_h@yahoo.com","","Office of the Municipal Engineer","Municipal Engineer - SG24","1","0","2025-05-09 00:26:45","2025-05-09 00:26:45");
INSERT INTO `employee` VALUES("MEO003","Grace","Lobrin","Guevarra","","1961-12-05","Mataasnakahoy, Batangas","Female","Married","Brgy. II-A Mataasnakahoy, Batangas","O+","9297422844","none@gmail.com","","Office of the Municipal Engineering","Engineering Assistant","1","0","2025-05-09 00:04:29","2025-05-09 00:04:29");
INSERT INTO `employee` VALUES("MEO005","MELITON","AGOJO","MANALO","","1962-03-10","MATAASNAKAHOY","Male","Married","NANGKAAN, MATAASNAKAHOY, BATANGAS","AB+","9532251492","NA@gmail.com","","Office of the Municipal Engineering","Administrative Assistant I (Reproduction Machine Operator III)","1","0","2025-05-09 01:02:32","2025-05-09 01:02:32");
INSERT INTO `employee` VALUES("MEO006","MARILYN","SUBOL","MAUHAY","","1962-10-20","MATAASNAKAHOY","Female","Married","178, LUBIS, BRGY.IV, MATAASNAKAHOY, BATANGAS","O+","9175163032","msmauhay55@gmail.com","","Office of the Municipal Engineering","Engineer II","1","0","2025-05-10 08:15:41","2025-05-10 08:15:41");
INSERT INTO `employee` VALUES("MEO008","Wilkim","De Roxas","Ilagan","","1994-05-02","Mataasnakahoy","Male","Married","040 Sarmiento St. Mataasnakahoy, Batangas","B+","9121023527","kimzhel12@gmail.com","","Office of the Municipal Engineering","Administrative Aide III (Clerk I) ","1","0","2025-05-09 01:04:26","2025-05-09 01:04:26");
INSERT INTO `employee` VALUES("MEO03","Samantha Abigail","Manalo","Ingalla","","1998-03-14","Sta. Cruz, Manila","Female","Single","BLK  3 Lot 10, Crisanta Homes Subd. Brgy. Calingatan Mataasnakahoy, Batangas","O+","9354615130","samantha.m.ingalla@gmail.com","","Office of the Municipal Engineering ","Engineer I ","1","0","2025-05-09 01:09:33","2025-05-09 01:09:33");
INSERT INTO `employee` VALUES("MH024","JONABETH","NIEVA","SILVA","","1988-07-24","ABRA DE ILOG OCCIDENTAL MINDORO","Female","Married","055, RIZAL, BRGY. III, MATAASNAKAHOY, BATANGAS","O+","9353780459","sjonabeth@yahoo.com","","Office of the Municipal Health","Nurse I","1","0","2025-05-10 01:27:31","2025-05-10 01:27:31");
INSERT INTO `employee` VALUES("MHO_005","MIRASOL","ENRIQUEZ","MALABANAN","","1968-01-06","MATAASNAKAHOY, BATANGAS","Female","Married","UPA, MATAASNAKAHOY, BATANGAS","B+","9519633299","N/a@gmail.com","","Office of the Municipal Health","Midwife II","1","0","2025-05-08 23:42:21","2025-05-08 23:42:21");
INSERT INTO `employee` VALUES("MHO-001","Karla","Manalo","Caraan","","1979-08-07","Manila","Female","Married","Shercon Resort San Sebastian Mataasnakahoy, Batangas","A+","9256070879","karlacaraanmd@gmail.com","","Municipal Health Officer SG-24","Municipal Government Department Head","1","0","2025-05-07 21:13:03","2025-05-07 21:13:03");
INSERT INTO `employee` VALUES("MHO-002","MARIBEL","LACORTE","MATANGUIHAN","","1972-11-18","LIPA CITY","Female","Married","BRGY. 2A, MATAASNAKAHOY, BATANGAS","O+","9190005014","mimatanguihanm@gmail.com","","Office of the Municipal Health","Nurse I","1","0","2025-05-09 06:42:27","2025-05-09 06:42:27");
INSERT INTO `employee` VALUES("MHO-014","PRISCILA","INCIONG","PURA","","1967-07-08","MATAASNAKAHOY, BATANGAS","Female","Married","119, MATAASNAKAHOY, BATANGAS","B+","9216603090","NA4@gmail.com","","Office of the Municipal Health","Midwife II","1","0","2025-05-09 20:16:25","2025-05-09 20:16:25");
INSERT INTO `employee` VALUES("MHO003","Debbie","Matanguihan","Lescano","","1968-12-19","Mataasnakahoy, Batangas","Female","Single","090 Rizal St. Brgy. II- A Mataasnakahoy, Batangas","B+","9158816400","dmlescano1219@gmail.com","","Office of the Municipal Health","Medical Technologist II","1","0","2025-05-09 01:43:31","2025-05-09 01:43:31");
INSERT INTO `employee` VALUES("MHO005","CONCEPCION","MEDINA","MAGPANTAY","","1969-12-08","LIPA CITY","Female","Married","POBLACION III, MATAASNAKAHOY, BATANGAS","O+","9237417017","connie.magpantay_08@yahoo.com","","Office of the Municipal Health","Midwife II","1","0","2025-05-08 00:26:48","2025-05-08 16:00:00");
INSERT INTO `employee` VALUES("MHO007","JOCELYN","DE OCAMPO","MARALIT","","1974-02-09","MATAASNAKAHOY, BATANGAS","Female","Married","PUROK  V, BAYORBOR, MATAASNAKAHOY, BATANGAS","O+","9082846721","jhoymaralit_74@gmail.com","","Office of the Municipal Health","Midwife II","1","0","2025-05-09 01:42:38","2025-05-09 01:42:38");
INSERT INTO `employee` VALUES("MHO009","OLIVER","AGUILA","TUMAMBING","","1965-01-16","MATAASNAKAHOY","Male","Single","BRGY. I, MATAASNAKAHOY, BATANGAS","O+","9338294184","oliver.tumambing65@yahoo.com","","Office of the Municipal Health","Administrative Aide III (Driver I)","1","0","2025-05-10 06:41:48","2025-05-10 06:41:48");
INSERT INTO `employee` VALUES("MHO010","EDWIN","CUENCA","MATANGUIHAN","","1973-08-03","LIPA CITY","Male","Married","NANGKAAN, MATAASNAKAHOY, BATANGAS","O+","9153859657","edwin.matanguihan@yahoo.com","","Office of the Municipal Health","Nursing Attendant I","1","0","2025-05-09 01:51:26","2025-05-09 01:51:26");
INSERT INTO `employee` VALUES("MTO-006","Mian","Subol","Castillo","","1976-01-15","Mataasnakahoy, Batangas","Female","Single","188 Rafael Lubis St. Barangay IV Mataasnakahoy, Batangas","O+","9175236213","mianell1976@yahoo.com","","Office of the Municipal Treasury","Administrative Assistant I (Reproduction Machine Operator III)","1","0","2025-05-08 00:27:41","2025-05-08 00:27:41");
INSERT INTO `employee` VALUES("MTO-007","JOEL","LITONG","MANALO","","1989-06-08","MATAASNAKAHOY, BATANGAS","Male","Single","SANTOL, MATAASNAKAHOY, BATANGAS","B+","9458411157","maryjaneabu199@gmail.com","","Office of the Municipal Treasury","Administratuve Aide I (Utility Worker I)","1","0","2025-05-09 00:43:47","2025-05-09 00:43:47");
INSERT INTO `employee` VALUES("MTO-008","Mickaela","Manalo","Agbing","","1999-10-05","Mataasnakahoy Batangas","Female","Single","065 Purok 6 San Sebastian Mataasnakahoy, Batangas ","O+","9068461286","mickaelaagbing05@gmail.com","","Office of the Municipal Treasury","Revenue Collection Clerk I SG-5","1","0","2025-05-06 23:50:46","2025-05-06 23:50:46");
INSERT INTO `employee` VALUES("MTO001","Lady Ivy","Tipan","Hidalgo","","1981-08-31","Mataasnakahoy, Batangas","Female","Married","Ibaba St. Brgy. Calingatan Mataasnakahoy, Batangas","AB+","9171284810","ladyivyhidalgo@gmail.com","","Municipal Treasury Office ","Municipal Treasurer","1","0","2025-05-09 00:32:38","2025-05-09 00:32:38");
INSERT INTO `employee` VALUES("MTO006","Mario","Diaz","Bautista","","1985-07-16","Malabanan Balete Batangas","Male","Married","Loob Mataasnakahoy, Batangas","O+","9097875935","marz1617@yahoo.com","","Office of the Municipal Treasury","Administrative Aide III (Utility Worker II)","1","0","2025-05-07 10:14:38","2025-05-07 10:14:38");
INSERT INTO `employee` VALUES("MTOOO3","Arlyn","Oseña","Binay","","1974-11-19","Mataasnakahoy, Batangas","Female","Single","094 Rizal Mataasnakahoy, Batangas","O+","0","osenaarlyn@gmail.com","","Office of the Municipal Treasury","Local Revenue Collection Officer I","1","0","2025-05-07 10:27:36","2025-05-07 16:00:00");
INSERT INTO `employee` VALUES("OMM-0011","Camille","Corpuz","Gordo","","1994-08-14","Lipa City","Female","Married","032 Mandigma St. Purok 1 Brgy. I Mataasnakahoy, Batangas","O+","9065537343","camillecrpz47@gmail.com","","Office of the Mayor","Administrative Aide I (Utility Worker I)","1","0","2025-05-08 23:58:27","2025-05-08 23:58:27");
INSERT INTO `employee` VALUES("OMM001","Janet","Magpantay","Ilagan","","1967-12-07","Mataasnakahoy, Batangas","Female","Married","JMI Farm Brgy. Santol Mataasnakahoy, Barangay","O+","9175781717","jayne_168@yahoo.com","Janet.png","Office of the Mayor","Municipal Mayor","1","1","2025-02-19 14:09:03","2025-05-08 16:00:00");
INSERT INTO `employee` VALUES("OMM003","Ma. Teresa","Tibayan","Leyesa","","1995-07-12","Brgy. Loob Mataasnakahoy, Batangas","Female","Single","107 Purok 6 Brgy. Loob Mataasnakahoy, Batangas","O+","9452664979","teresaleyesa15@gmail.com","","Office of the Mayor","Administrative Assistant II (Clerk IV)","1","0","2025-05-09 01:53:24","2025-05-09 01:53:24");
INSERT INTO `employee` VALUES("OMM005","Lorena","Morada","Castillo","","1970-11-20","Poblacion Mataasnakahoy, Batangas","Female","Married","132 Rafael Lubis Brgy. IV Mataasnakahoy, Batangas","O+","9151963398","lhorencastillo20@yahoo.com","","Office of the Mayor","Administrative Aide I (Utility Worker I) SG-1","1","0","2025-05-08 00:17:29","2025-05-08 00:17:29");
INSERT INTO `employee` VALUES("OMM006","Rodante","Gonzales","De Leon","","1961-01-20","Calingatan, Mataasnakahoy","Male","Single","Calingatan Mataasnakahoy, Batangas","O+","9175798863","deleonrodante20@yahoo.com","","Office of Mayor Office of the Business Permits and Licensing Officer","Municipal Government Assistant Department Head","1","0","2025-05-08 22:48:26","2025-05-08 22:48:26");
INSERT INTO `employee` VALUES("OMM012","FE","RIMORIN","OLAVE ","","1968-03-03","LIPA CITY","Female","Married","SANTOL, MATAASNAKAHOY, BATANGAS","O+","9177979409","fe.olave0503@gmail.com","","Mayor\'s Office - Office of the Municipal General Services Officer","Administrative Assistant I (Bookbinder III)","1","0","2025-05-09 18:53:44","2025-05-09 18:53:44");
INSERT INTO `employee` VALUES("OMM013","MAE ANN","MALIBIRAN","SARMIENTO","","1999-02-26","MATAASNAKAHOY, BATANGAS","Female","Single","257, PUROK 7, LUMANG LIPA, MATAASNAKAHOY, BATANGAS","O+","9266096076","seansarmientoM@gmail.com","","Office of the Mayor- Office of the General Services Officer","Administrative Aide I (Utility Worker I)","1","0","2025-05-10 01:19:37","2025-05-10 01:19:37");
INSERT INTO `employee` VALUES("OMM019","MARIBEL","LANDICHO","MATIBAG","","1984-10-15","KINALAGLAGAN, MATAASNAKHAOY","Female","Married","PUROK 2, SAN SEBASTIAN, MATAASNAKAHOY, BATANGAS","B+","9270533559","jrbebzmatibag1715@yahoo.com","","Office of the Mayor- Office of the Business Permits and Licensing Office","Administrative Aide III (Utility Worker II)","1","0","2025-05-09 06:56:11","2025-05-09 06:56:11");
INSERT INTO `employee` VALUES("OMM020","GIO","HERNANDEZ","REYES","","1996-01-21","BRGY II-A, MATAASNAKAHOY, BATANGAS","Male","Married","043, VERGARA, BRGY. II-A, MATAASNAKAHOY, BATANGAS","A+","9976092020","ghr012196@gmail.com","","Mayor\'s Office - Office of the Business Permits and Licensing Officer","Administrative Aide I (Utility Worker I)","1","0","2025-05-09 23:36:50","2025-05-09 23:36:50");
INSERT INTO `employee` VALUES("OMM021","EMILIA","REYES","MALALUAN","","1968-11-18","SAMPALOC, MANILA","Female","Single","BRGY. I, MATAASNAKAHOY, BATANGAS","B+","9175491663","supermelowtouch@yahoo.com","","Mayor\'s Office - Office of the Municipal General Services Officer","Municipal Government Assistant Department Head","1","0","2025-05-10 07:43:09","2025-05-10 07:43:09");
INSERT INTO `employee` VALUES("OMM026","MORENA","SAYAS","SISCAR","","1994-06-12","MATAASNAKAHOY, BATANGAS","Female","Married","UPA, MATAASNAKAHOY, BATANGAS","O+","9197715005","siscarmorena6@gmail.com","","Office of the Municipal Social Welfare and Development","Administrative Aide I (Utility Worker I)","1","0","2025-05-10 01:36:31","2025-05-10 01:36:31");
INSERT INTO `employee` VALUES("OMM033","Emmanuel","Azurin","Alfiler","","1964-12-19","Quezon City","Male","N/A","18 Col.Divino St. Concepcion Uno Marikina City, Metro Manila","O+","9171786179","bunnyalfiler@yahoo.com","","Office off the Sangguniang Bayan","Secretary to the Sangguniang Bayan ","1","0","2025-05-07 00:12:14","2025-05-07 00:12:14");
INSERT INTO `employee` VALUES("OMM084","Lotalie","Villapando","Aguila","","1965-12-23","Mataasnakahoy, Batangas","Female","Single","Poblacion III Mataasnakahoy, Batangas","A+","9108586249","utah_jas@yahoo.com","","Office of the Municipal Treasury","Administrative Assistant I (Bookbinder III) ","1","0","2025-05-07 00:02:42","2025-05-07 00:02:42");
INSERT INTO `employee` VALUES("OMN038","Arnel","Dela Vega","Floro","","1977-12-27","Tondo Manila","Male","Single","J. Hernandez St. Brgy I Mataasnakahoy, Batangas","O+","9776297370","floroarnel12@gmail.com","","Office of the Mayor (Business Permits and Licensing Section)","Administrative Aide I (Utility Worker I)","1","0","2025-05-08 23:28:39","2025-05-08 23:28:39");
INSERT INTO `employee` VALUES("OMO41","ERWIN","LANDICHO","MAGPANTAY","","1978-05-09","MATAASNAKAHOY, BATANGAS","Male","Married","BARANGAY III, MATAASNAKAHOY, BATANGAS","A+","9298586998","emagpantay72@gmail.com","","Office of the Mayor","Administratuve Aide III (Driver I)","1","0","2025-05-08 23:30:06","2025-05-08 23:30:06");
INSERT INTO `employee` VALUES("OMO42","GIAN MARCO","RIATA","VELASQUEZ","","1997-05-09","MILAN, ITALY","Male","Married","17, PUROK 1, SAN SEBASTIAN, MATAASNAKAHOY, BATANGAS","O+","9674783907","marco.velasquez0905@gmail.com","","Office of the Mayor","Administrative Aide I (Utility Worker I)","1","0","2025-05-10 06:54:33","2025-05-10 06:54:33");
INSERT INTO `employee` VALUES("PDC001","MICHAEL","REYES","OLARTE","","1981-06-05","UPA, MATAASNAKAHOY, BATANGAS","Male","Married","UPA, MATAASNAKAHOY, BATANGAS","B+","9171890536","mike_olarte_ce@yahoo.com","","Municipal Planning and Development Office","Municipal Government Department Head (Municipal Planning and Development Coordinator)","1","0","2025-05-09 18:44:20","2025-05-09 18:44:20");
INSERT INTO `employee` VALUES("PDC005","HARLEY ALEXIS","VERGARA","REYES","","1999-01-25","MATAASNAKAHOY, BATANGAS","Male","Single","130, SITIO PARANG, MATAASNAKAHOY, BATANGAS","A+","9971028053","reyesharley25@gmail.com","","Office of the Municipal Planning and Development Coordinator","Administrative Aide I (Utility Worker I)","1","0","2025-05-09 23:43:08","2025-05-09 23:43:08");
INSERT INTO `employee` VALUES("PDC006","TRINA CORINNE","ESMIDILLA","ORENSE","","1997-06-20","BATANGAS CITY","Female","Single","PUROK 1, NANGKAAN, MATAASNAKAHOY, BATANGAS","B+","9559832173","trinaorense20@gmail.com","","office of the Municipal Planning and Development Coordinator","Administrative Officer II","1","0","2025-05-09 19:16:04","2025-05-09 19:16:04");
INSERT INTO `employee` VALUES("PDO005","ANGELITA","LESCANO","MANALO","","1978-12-28","MATAASNAKAHOY, BATANGAS","Female","Married","PUROK 1, STA. FE VILLAS, UPA, MATAASNAKAHOY, BATANGAS","O+","9297609075","angelitamanalo783@gmail.com","","Office of the Municipal Disaster Risk Reduction and Management","Administratuve Aide I (Utility worker I)","1","0","2025-05-09 00:28:46","2025-05-09 00:28:46");
INSERT INTO `employee` VALUES("PDO006","GIAN LORENZ","SOLIS","VERGARA","","1992-09-23","MATAASNAKAHOY, BATANGAS","Male","Single","IMMACULATE CONCEPCION VILLAGE, UPA, MATAASNAKAHOY, BATANGAS","A+","9997563835","gianlvergara@gmail.com","","Mayor\'s Office - Office of the Municipal Disaster Risk Reduction Management","Local Disaster Risk Reduction and Management Officer II","1","0","2025-05-10 07:01:46","2025-05-10 07:01:46");
INSERT INTO `employee` VALUES("PDO007","ALONA MAE","MANALO","MARANAN","","1998-08-10","MATAASNAKAHOY, BATANGAS","Female","Single","60, SAN SEBASTIAN, MATAASNAKAHOY, BATANGAS","O+","9363843868","alonamaran@yahoo.com","","Mayor\'s Office - Office of the Municipal Disaster Risk Reduction and Management","Administrative Aide III (Clerk I)","1","0","2025-05-10 08:08:05","2025-05-10 08:08:05");
INSERT INTO `employee` VALUES("SBO-004","Merlyn","Caraan","Laqui","","1968-02-26","Mataasnakahoy, Batangas","Female","Married","Brgy. III Mataasnakahoy, Batangas","AB+","9171385500","merlynlaqui@yahoo.com","","Office of the Sangguniang Bayan","Sangguniang Bayan Member ","1","0","2025-05-09 01:37:18","2025-05-09 01:37:18");
INSERT INTO `employee` VALUES("SBO-006","Karen Joy","Araneta","Laqui","","1991-05-13","Mataasnakahoy, Batangas","Female","Single","113 C. Recinto St. Brgy. I Mataasnakahoy, Batangas","O+","9171882093","k.laqui@yahoo.com","","Office of the Sangguniang Bayan","Sangguniang Bayan Member ","1","0","2025-05-09 01:31:37","2025-05-09 01:31:37");
INSERT INTO `employee` VALUES("SBO-008","Lourdes","Orozo","Calinisan","","1976-02-09","Mataasnakahoy","Female","Married","Purok 1 Kinalaglagan Mataasnakahoy, Batangas","O+","9108558332","calinisanlourdesorozo@gmail.com","","Office of the Sangguniang Bayan","Sangguniang Bayan Member ","1","0","2025-05-07 20:58:41","2025-05-08 16:00:00");
INSERT INTO `employee` VALUES("SBO-009","Lemuel","Villanueva","De Ocampo","","1985-05-19","Mataasnakahoy, Batangas","Male","Single","Bayorbor Mataasnakahoy, Batangas","A+","9052417240","konlem1985@gmail.com","","Office of the Sangguniang Bayan","Sangguniang Bayan Member","1","0","2025-05-08 22:54:19","2025-05-08 16:00:00");
INSERT INTO `employee` VALUES("SBO-014","ALVIN","LITONG","MANALO","","1988-05-27","MATAASNAKAHOY, BATANGAS","Male","Single","SANTOL, MATAASNAKAHOY, BATANGAS","B+","9217150542","galvinmanalo@gmail.com","","Office of the Sanguniang Bayan","Administratuve Assistant II (Clerk IV)","1","0","2025-05-08 23:52:34","2025-05-08 23:52:34");
INSERT INTO `employee` VALUES("SBO-015","Mary Ann","Mendoza","Hernandez","","1981-07-11","Mataasnakahoy","Female","Married","Purok 5 Brgy. Bubuyan Mataasnakahoy, Batangas","O+","9194618093","meann_ajboy@yahoo.com","","Office of the Sangguniang Bayan","Administrative Assistant I (Reproduction Machine Operator III) ","1","0","2025-05-09 00:17:04","2025-05-09 00:17:04");
INSERT INTO `employee` VALUES("SBO001","Jay","Manalo","Ilagan","","1973-12-30","Mataasnakahoy, Batangas","Male","Married","JMI Farm Brgy. Santol Mataasnakahoy, Batangas","O+","9175177337","jaymanaloilagan31@gmail.com","","Office of Vice Mayor","Vice Mayor","1","0","2025-05-09 00:56:40","2025-05-09 00:56:40");
INSERT INTO `employee` VALUES("SBO002","Ferdinand","Loleng","Dimaano ","","1972-10-22","Mataasnakahoy","Male","Married","Brgy I Mataasnakahoy, Batangas","O+","9673666467","dimaanoputo@gmail.com","","Office of the Sangguniang Bayan","Sangguniang Bayan Member ","1","0","2025-05-08 23:10:12","2025-05-08 16:00:00");
INSERT INTO `employee` VALUES("SBO004","Herwin","Dimaano","Del Mundo","","1973-06-05","Mataasnakahoy, Batangas","Male","Married","Subdivision Brgy III Mataasnakahoy, Batangas","O-","9171882350","hd5delmundo@gmail.com","","Office of the Sangguniang Bayan","Sangguniang Bayan Member ","1","0","2025-05-08 22:59:07","2025-05-08 16:00:00");
INSERT INTO `employee` VALUES("SBO006","PEPITO","DELEON","VERGARA","","1964-07-28","MATAASNAKAHOY, BATANGAS","Male","Married","IMMACULATE CONCEPCION VILLAGE, UPA, MATAASNAKAHOY, BATANGAS","A+","9151120998","agavergs@yahoo.com","","Office of the Sanguniang Bayan","Municipal Councilor","1","0","2025-05-10 07:19:58","2025-05-10 07:19:58");
INSERT INTO `employee` VALUES("SBO007","ROWELL","BENEDICTO","MALABAG","","1988-08-18","BATANGAS CITY","Male","Single","RIZAL, BRGY. III, MATAASNAKAHOY, BATANGAS","B+","9453264015","rowellmalabag_88@yahoo.com","","Office of the Sanguniang Bayan","Municipal Councilor","1","0","2025-05-10 07:33:54","2025-05-10 07:33:54");
INSERT INTO `employee` VALUES("SBO008","ALAIZA","LUMBERA","MANDIGMA","","1999-08-07","LIPA CITY, BATANGAS","Female","Single","PUROK 4, SAN SEBASTIAN, MATAASNAKAHOY, BATANGAS","O+","9079537315","mandigmaaa@gmail.com","","Office of the Sangguniang Bayan","Administrative Aide I (Utility Worker I)","1","0","2025-05-10 07:48:31","2025-05-10 07:48:31");
INSERT INTO `employee` VALUES("SBO009","GINA","DIMAANO","OCAMPO","","1974-11-29","MATAASNAKAHOY, BATANGAS","Female","Married","PUROK 3, MATAASNAKAHOY, BATANGAS","A+","9912005913","ginadocampo@gmail.com","","Office of the Sangguniang Bayan","Secretary to the Sangguniang Bayan I","1","0","2025-05-10 08:32:02","2025-05-10 08:32:02");
INSERT INTO `employee` VALUES("SBO010","Al Johnry","Salazar","Barrogo","","2001-03-24","Lipa City","Male","Single","Purok 6 Calingatan Mataasnakahoy, Batangas","B+","9558225167","aljbarrogo@gmail.com","","N/A","Chairperson, Sangguniang Kabataan ","1","0","2025-05-07 20:20:26","2025-05-07 20:20:26");
INSERT INTO `employee` VALUES("SBO013","HILDA","LESCANO","LUBIS","","1970-05-14","MATAASNAKAHOY","Female","Married","CALINGATAN, MATAASNAKAHOY, BATANGAS","O+","9237427757","lubishilda@yahoo.com","","Office of the Municipal Vice -  Mayor","Administrative Assistant I (Reproduction machine operator III)","1","0","2025-05-07 20:15:03","2025-05-07 20:15:03");
INSERT INTO `employee` VALUES("SBO014","FLORY","ILAGAN","TAPEL","","1973-04-07","MATAASNAKAHOY, BATANGAS","Female","Married","#53, SANTOL, MATAASNAKAHOY, BATANGAS","A+","9187503861","orytapel@yahoo.com","","Office of the Sanguniang Bayan","Administrative Assistant I (Bookbinder III)","1","0","2025-05-10 01:42:17","2025-05-10 01:42:17");
INSERT INTO `employee` VALUES("SBO015","Abegael","Lubis","Gonzales","","1993-05-20","Mataasnakahoy, Batangas","Female","Married","Calingatan Mataasnakahoy, Batangas","B+","9951196985","abegail.lubis@gmail.com","","Office of the Sangguniang Bayan","Administrative Aide III (Utility Worker II) ","1","0","2025-05-08 23:33:07","2025-05-08 23:33:07");
INSERT INTO `employee` VALUES("SWD-002","Lilian","Esparagoza","Caringal","","1971-10-01","Lipa City","Female","Married","14 Boundary Barangay II Mataasnakahoy, Batangas","O+","9194505807","caringalilian@gmail.com","","Office of the Municipal Social Welfare & Development","Day Care Worker II (SG-8)","1","0","2025-05-08 00:08:35","2025-05-08 00:08:35");
INSERT INTO `employee` VALUES("SWD-014","Ellen","Macasaet","Abraham","","1978-01-27","Batangas","Female","Married","158 Rafael Lubis St. Brgy IV Mataasnakahoy, Batangas","O+","9771423142","ellenmabraham101518@gmail.com","","Office of the Municipal Social Welfare and Development","Administrative Officer I (Records Officer I)","1","0","2025-05-06 21:05:01","2025-05-06 16:00:00");
INSERT INTO `employee` VALUES("SWD003","JOCELYN","RECIO","VERGARA","","1978-12-11","MATAASNAKAHOY, BATANGAS","Female","Single","NANGKAAN, MATAASNAKAHOY, BATANGAS","B+","9007770383","jocelynvergara584@gmail.com","","Office of the Municipal Planning and Development Coordinator","Administrative Assistant I (Bookbinder III)","1","0","2025-05-10 07:10:28","2025-05-10 07:10:28");
INSERT INTO `employee` VALUES("SWD005","NOREEN","MATANGUIHAN","LOJO","","1985-05-20","MATAASNAKAHOY, BATANGAS","Female","Married","II-A, MATAASNAKAHOY, BATANGAS","B+","9991939737","noreenjun@gmail.com","","Office of the Municipal Social Welfare & Development","Social Welfare Aide","1","0","2025-05-07 19:32:42","2025-05-07 19:32:42");
INSERT INTO `employee` VALUES("SWD006","Krisno","De Castro","Ilagan","","1990-03-31","Batangas City, Batangas","Male","Single","126 Rizal St. Brgy. 3 Mataasnakahoy, Batangas","B+","9386731594","ilagankris31@gmail.com","","Office of the Municipal Social Welfare and Development","Administrative Aide I (Utility Worker II) ","1","0","2025-05-09 01:00:38","2025-05-09 01:00:38");
INSERT INTO `employee` VALUES("SWD012","JENNY","ESMIDILLA","PASIA","","1998-11-22","MATAASNAKAHOY, BATANGAS","Female","Single","111, SAN SEBASTIAN, MATAASNAKAHOY, BATANGAS","AB+","9352571084","jennypasia8@gmail.com","","Office of the Municipal Social Welfare and Development","Administrative Aide I (Utility Worker I)","1","0","2025-05-09 20:04:52","2025-05-09 20:04:52");
INSERT INTO `employee` VALUES("SWD013","JOAN","ROBLES","REYES","","1988-10-26","LIPA CITY, BATANGAS","Female","Married","SICO, LIPA CITY, BATANGAS","B+","9093489106","lgumkahoy.joanreyes@gmail.com","","Office of the Municipal Social Welfare and Development","Administrative Aide I (Utility Worker I)","1","0","2025-05-09 23:51:32","2025-05-09 23:51:32");
INSERT INTO `employee` VALUES("SWD014","ANGELA JOYCE","LUBI","OBTIAL","","1996-01-25","MATAASNAKAHOY","Female","Single","PUROK 2, NANGKAAN, MATAASNAKAHOY, BATANGAS","Unknown","9672560724","ajobtial@gmail.com","","Office of the Municipal Social Welfare and Development","Administrative Aide I (Utility Worker I)","1","0","2025-05-10 08:27:51","2025-05-10 08:27:51");

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text,
  `color` varchar(255) NOT NULL,
  `sent_mail` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `events` VALUES("1","sdsdsd","2025-03-15 13:15:00","2025-03-16 13:15:00","dsderewr","#ff8585","0");
INSERT INTO `events` VALUES("2","Zumba","2025-03-24 08:00:00","2025-03-24 10:00:00","Zumba Wellness Fitness activity for the elders and youth!","","0");
INSERT INTO `events` VALUES("8","sa","2025-03-15 12:58:00","2025-03-15 13:00:00","sasa","","0");
INSERT INTO `events` VALUES("11","start and end","2025-03-18 00:00:00","2025-03-20 00:00:00","sdhsjdsa","#ff0000","0");
INSERT INTO `events` VALUES("14","backup okay","2025-04-16 20:45:00","2025-04-16 20:55:00","okii","#d5343c","1");

DROP TABLE IF EXISTS `government_info`;
CREATE TABLE `government_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(100) NOT NULL,
  `gsis_no` varchar(20) NOT NULL,
  `pag_ibig_no` varchar(20) NOT NULL,
  `philhealth_no` varchar(20) NOT NULL,
  `sss_no` varchar(20) NOT NULL,
  `tin_no` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `government_info` VALUES("2","LDR001","2004647207","1211-3530-8011","09-000092019-2","N/A","463-485-211","2025-03-11 08:25:50","2025-05-11 13:54:48");
INSERT INTO `government_info` VALUES("9","AGR005","71082800543","04032100280-9","09-00000-1165-6","N/A","903-001-029","2025-05-07 19:19:49","2025-05-07 19:19:49");
INSERT INTO `government_info` VALUES("10","SWD005","2005693524","919316807850","230021300344","0425549861","252-558-874","2025-05-07 19:32:42","2025-05-07 19:32:42");
INSERT INTO `government_info` VALUES("11","SBO013","20022006641","040139258609","09-000057356-5","04-3078124-5","194-235-577","2025-05-07 20:15:03","2025-05-07 20:15:03");
INSERT INTO `government_info` VALUES("12","MHO005","2002006601","1490-0022-0379","09-200523324-2","N/A","941-367-812","2025-05-08 00:26:48","2025-05-08 16:00:00");
INSERT INTO `government_info` VALUES("13","OMO41","2006020447","1210-6050-8038","02-025500045-5","04-0982692-4","495-0430223","2025-05-08 23:30:06","2025-05-08 23:30:06");
INSERT INTO `government_info` VALUES("14","MHO_005","2002006722","149000206322","090445796","N/A","183-234-185","2025-05-08 23:42:21","2025-05-08 23:42:21");
INSERT INTO `government_info` VALUES("15","SBO-014","2004793270","1211-58940661","030505866572","04-1959195-1","281-445-059-000","2025-05-08 23:52:34","2025-05-08 23:52:34");
INSERT INTO `government_info` VALUES("16","PDO005","N/A","121292801967","09-250692094-0","04-3411661-2","471-606-229-000","2025-05-09 00:28:46","2025-05-09 00:28:46");
INSERT INTO `government_info` VALUES("17","MTO-007","2006127891","121169738809","01-050751782-5","N/A","296-355-508-000","2025-05-09 00:43:47","2025-05-09 00:43:47");
INSERT INTO `government_info` VALUES("18","MEO005","LP62031003186","044990554901","09-200520003-4","03-8403236-7","2507436999","2025-05-09 01:02:32","2025-05-09 01:02:32");
INSERT INTO `government_info` VALUES("19","MCR002","006-0120-0559-2","149000216682","09-000044584-2","N/A","908-739-855","2025-05-09 01:14:22","2025-05-09 01:14:22");
INSERT INTO `government_info` VALUES("20","ASS004","006-0104-0118-5","040138806110","09-025009700-9","04-1037634-0","908-740-638","2025-05-09 01:22:12","2025-05-09 01:22:12");
INSERT INTO `government_info` VALUES("21","MBO-003","2002006119","040138806208","09-00044572-9","N/A","903-001-044","2025-05-09 01:32:59","2025-05-09 01:32:59");
INSERT INTO `government_info` VALUES("22","MHO007","2004106763","121064742174","09-200846164-5","0430625026","186-358-512","2025-05-09 01:42:38","2025-05-09 01:42:38");
INSERT INTO `government_info` VALUES("23","MHO010","02003965005","1211-4567-2705","09-0000-77994-5","04-0919549-3","289-634-245","2025-05-09 01:51:26","2025-05-09 01:51:26");
INSERT INTO `government_info` VALUES("24","AGR002","LP-78123101668","149000218241","09-200280566-0","N/A","938-864-813","2025-05-09 06:36:04","2025-05-09 06:36:04");
INSERT INTO `government_info` VALUES("25","MHO-002","2005677620","1490-0049-2230","09-050184211-6","04-0920657-3","918-812-791","2025-05-09 06:42:27","2025-05-09 06:42:27");
INSERT INTO `government_info` VALUES("26","OMM019","2005693526","12123294902","09-200925397-3","04-1377721-8","260721248-000","2025-05-09 06:56:11","2025-05-09 06:56:11");
INSERT INTO `government_info` VALUES("27","MBO_003","200-569-3522","1212-3295-0244","09-025636679-6","04-295-2463-3","709-349-175-000","2025-05-09 08:08:48","2025-05-09 08:08:48");
INSERT INTO `government_info` VALUES("28","ACT003","2004106761","1210-6476-2778","09-200519873-0","N/A","260-518-883","2025-05-09 08:14:59","2025-05-09 08:14:59");
INSERT INTO `government_info` VALUES("29","151810100001","B74KGAMN013","040139258903","09-00000-1135-4","N/A","903-000-971","2025-05-09 18:32:39","2025-05-09 18:32:39");
INSERT INTO `government_info` VALUES("30","PDC001","2000831254","1020-0046-1045","09-025159534-7","34-0836649-5","239-368-868","2025-05-09 18:44:20","2025-05-09 18:44:20");
INSERT INTO `government_info` VALUES("31","OMM012","2003965006","090251016258","09-025100625-8","N/A","289-699-332","2025-05-09 18:53:44","2025-05-09 18:53:44");
INSERT INTO `government_info` VALUES("32","LDR010","N/A","1212-5565-3045","09-050562519-5","N/A","631-282-442","2025-05-09 19:01:11","2025-05-09 19:01:11");
INSERT INTO `government_info` VALUES("33","PDC006","200-594-9271","1212-8943-5543","09-250686971-6","N/A","505-905-854-000","2025-05-09 19:16:04","2025-05-09 19:16:04");
INSERT INTO `government_info` VALUES("34","HRM-003","2002006646","1490-0020-6367","09-025009696-7","N/A","903-000-989","2025-05-09 19:21:49","2025-05-09 19:21:49");
INSERT INTO `government_info` VALUES("35","AGRI007","200--556-6430","1211-6983-8179","09-200925388-4","0432474518","912827875","2025-05-09 19:36:53","2025-05-09 19:36:53");
INSERT INTO `government_info` VALUES("36","HRM005","2005832266","1030-0024-9608","092023951896","04-3173606-06","206-869-629","2025-05-09 19:46:56","2025-05-09 19:46:56");
INSERT INTO `government_info` VALUES("37","SWD012","N/A","1212-6119-4958","09-250684861-1","044251660-2","767-586-860","2025-05-09 20:04:52","2025-05-09 20:04:52");
INSERT INTO `government_info` VALUES("38","MHO-014","2004821355","1211-0752-8823","09-200979613-6","N/A","139-900-099","2025-05-09 20:16:25","2025-05-09 20:16:25");
INSERT INTO `government_info` VALUES("39","ASS012","200-6020-448","1212-9227-6862","09-200925373-6","04-162-78772","395-418-299-00000","2025-05-09 23:19:39","2025-05-09 23:19:39");
INSERT INTO `government_info` VALUES("40","OMM020","N/A","1211-6960-6461","09-250691840-7","04-3817228-3","701-748-616-000","2025-05-09 23:36:50","2025-05-09 23:36:50");
INSERT INTO `government_info` VALUES("41","PDC005","200-612-796-9","121-306-7114-14","09-254267152-3","N/A","746-482-887","2025-05-09 23:43:08","2025-05-09 23:43:08");
INSERT INTO `government_info` VALUES("42","SWD013","N/A","1210-4718-2833","09-050301894-1","04-0982692-4","410-509-437-000","2025-05-09 23:51:32","2025-05-09 23:51:32");
INSERT INTO `government_info` VALUES("43","ASS013","N/A","1212-4297-3423","09-250692087-8","34-8029626-6","357-307-680-000","2025-05-10 00:01:12","2025-05-10 00:01:12");
INSERT INTO `government_info` VALUES("44","GSO-002","2005849720","1090-0109-5577","080504609697","04-1220267-4","240-789-790","2025-05-10 00:39:33","2025-05-10 00:39:33");
INSERT INTO `government_info` VALUES("45","AGR004","2003964278","121077810180","09-2002-80534-2","N/A","943-206-092","2025-05-10 00:47:14","2025-05-10 00:47:14");
INSERT INTO `government_info` VALUES("46","OMM013","N/A","121249392443","09-250395445-3","34-8427265-5","378-610-255-000","2025-05-10 01:19:37","2025-05-10 01:19:37");
INSERT INTO `government_info` VALUES("47","MH024","N/A","121158550891","090252481892","0423624966","402756603","2025-05-10 01:27:31","2025-05-10 01:27:31");
INSERT INTO `government_info` VALUES("48","OMM026","N/A","N/A","09-253685354-7","04-4709490-9","747-779-943-000","2025-05-10 01:36:31","2025-05-10 01:36:31");
INSERT INTO `government_info` VALUES("49","SBO014","730-407-005-50","0401-4044-6307","09-0000-479-10-0","33-5219211-3","924-555-105-000","2025-05-10 01:42:17","2025-05-10 01:42:17");
INSERT INTO `government_info` VALUES("50","LDR003","2005639878","1211-79456613","09201591054","0420995698","419-879-816-000","2025-05-10 01:47:48","2025-05-10 01:47:48");
INSERT INTO `government_info` VALUES("51","MCR004","006-0174-4319-9","1210-1842-1636","09-200925378-7","N/A","413-528-892","2025-05-10 01:53:49","2025-05-10 01:53:49");
INSERT INTO `government_info` VALUES("52","MCR-001","2002006645","1490-0022-5217","09-00001112-5","N/A","138-936-203","2025-05-10 02:14:36","2025-05-10 02:14:36");
INSERT INTO `government_info` VALUES("53","MBO004","2005693528","121232873912","080508787662","0421373387","284-914-194-000","2025-05-10 06:18:05","2025-05-10 06:18:05");
INSERT INTO `government_info` VALUES("54","HRM002","02004146714","12108421647","09-200755798-3","33-1669575-3","151-695-590-000","2025-05-10 06:25:00","2025-05-10 06:25:00");
INSERT INTO `government_info` VALUES("55","MHO009","2004155020","121032021740","09-200750017-5","04-00158505-8","287-950-145-000","2025-05-10 06:41:48","2025-05-10 06:41:48");
INSERT INTO `government_info` VALUES("56","MCRO05","N/A","1211-484-54729","010520552346","0435-8290-05","322-997-568","2025-05-10 06:46:56","2025-05-10 06:46:56");
INSERT INTO `government_info` VALUES("57","OMO42","N/A","N/A","09-050533861-7","N/A","735-251-738","2025-05-10 06:54:33","2025-05-10 06:54:33");
INSERT INTO `government_info` VALUES("58","PDO006","N/A","1211-7257-8396","0905-0488-7420","04-3756999-4","328-649-823","2025-05-10 07:01:46","2025-05-10 07:01:46");
INSERT INTO `government_info` VALUES("59","SWD003","2002005049","1490-002212-8412","09-025009697-5","N/A","185-399-690","2025-05-10 07:10:28","2025-05-10 07:10:28");
INSERT INTO `government_info` VALUES("60","SBO006","2000560160","1040-0053-8423","09-000088047-6","N/A","127-254-920","2025-05-10 07:19:58","2025-05-10 07:19:58");
INSERT INTO `government_info` VALUES("61","ACT004","N/A","N/A","09-202327863-6","N/A","631402800","2025-05-10 07:26:44","2025-05-10 07:26:44");
INSERT INTO `government_info` VALUES("62","SBO007","2005331910","1211 1551 8131","0905 0296 5009","04-2329231-4","260 787 670","2025-05-10 07:33:54","2025-05-10 07:33:54");
INSERT INTO `government_info` VALUES("63","OMM021","2002006045","040321002907","09-000001158-3","N/A","903-001-037","2025-05-10 07:43:09","2025-05-10 07:43:09");
INSERT INTO `government_info` VALUES("64","SBO008","N/A","1212-5404-9027","09-250689078-2","0443721921","631-278-884-00000","2025-05-10 07:48:31","2025-05-10 07:48:31");
INSERT INTO `government_info` VALUES("65","AGR008","N/A","N/A","N/A","33-5900898-3","931-327-051","2025-05-10 08:00:43","2025-05-10 08:00:43");
INSERT INTO `government_info` VALUES("66","PDO007","N/A","N/A","09-050550143-7","04-4072814-6","352-878-850","2025-05-10 08:08:05","2025-05-10 08:08:05");
INSERT INTO `government_info` VALUES("67","MEO006","2001176739","121201025878","09-00005832-7","0385227126","126-226-056-000","2025-05-10 08:15:41","2025-05-10 08:15:41");
INSERT INTO `government_info` VALUES("68","SWD014","N/A","1212-2841-5700","090257628352","N/A","375-566-384","2025-05-10 08:27:51","2025-05-10 08:27:51");
INSERT INTO `government_info` VALUES("69","SBO009","N/A","1490-0112-3142","09-200027954","04-0983412-3","915-285-730","2025-05-10 08:32:02","2025-05-10 08:32:02");
INSERT INTO `government_info` VALUES("70","GSO003","N/A","121309702266","09-201165011-4","04-1516437-9","617-230-141-00000","2025-05-10 08:41:50","2025-05-10 08:41:50");
INSERT INTO `government_info` VALUES("71","SWD-014","2005948975","1020-0146-7005","19-051630642-8","33-566-45666","205-960-853-000","2025-05-06 21:05:01","2025-05-06 16:00:00");
INSERT INTO `government_info` VALUES("72","MTO-008","2006194189","121305179969","092506961191","04-4396206-4","514-337-662-00000","2025-05-06 23:50:46","2025-05-06 23:50:46");
INSERT INTO `government_info` VALUES("73","OMM084","651223301413","040139081410","09-0000-44578-8","N/A","903-000-930","2025-05-07 00:02:42","2025-05-07 00:02:42");
INSERT INTO `government_info` VALUES("74","OMM033","2001866922","1211-06621133","1900-00146580","03-8317115-1","129-421-600","2025-05-07 00:12:14","2025-05-07 00:12:14");
INSERT INTO `government_info` VALUES("75","AGR001","000-4316-8726-7","121183325315","09256903957","04-3168726-7","219-719-156-000","2025-05-07 00:21:19","2025-05-07 00:21:19");
INSERT INTO `government_info` VALUES("76","ASS007","N/A","121306638677","09-201139986-1","0423984567","411- 511-289-001","2025-05-07 00:44:31","2025-05-07 00:44:31");
INSERT INTO `government_info` VALUES("77","ACT-004","2005975270","121290541003","09-250352721-0","0415203214","300-527-598","2025-05-07 09:19:15","2025-05-07 09:19:15");
INSERT INTO `government_info` VALUES("78","ACT-003","006-0179-4315-6","121077084225","09-025037864-4","0429523634","408-865-142","2025-05-07 09:29:30","2025-05-07 09:29:30");
INSERT INTO `government_info` VALUES("79","GSO006","2005948976","121213855328","09-250691077-5","NA","728-091-314-000","2025-05-06 16:00:00","2025-05-06 16:00:00");
INSERT INTO `government_info` VALUES("80","LDR002","2006095027","149000043767","090500276249","0431504887","613-857-085","2025-05-07 09:46:06","2025-05-07 09:46:06");
INSERT INTO `government_info` VALUES("81","MTO006","2005693527","1212-6258-0019","09-201524328-9","04-1519140-7","259-225-089-000","2025-05-07 10:14:38","2025-05-07 10:14:38");
INSERT INTO `government_info` VALUES("82","SBO010","N/A","N/A","N/A","N/A","472-371-172","2025-05-07 20:20:26","2025-05-07 20:20:26");
INSERT INTO `government_info` VALUES("83","MTOOO3","2002006033","1490-0020-6309","09-000044576-1","N/A","903-001-011","2025-05-07 16:00:00","2025-05-07 16:00:00");
INSERT INTO `government_info` VALUES("84","ACT002","2005693529","121173188561","090000981817","04-3410762-1","943-214-531","2025-05-07 20:37:37","2025-05-07 20:37:37");
INSERT INTO `government_info` VALUES("85","SBO-008","N/A","N/A","N/A","04-0859030-3","268-708-603-000","2025-05-07 20:58:41","2025-05-08 16:00:00");
INSERT INTO `government_info` VALUES("86","MHO-001","2003625436","1210-98700773","03-000237410-9","N/A","264-052-519","2025-05-07 21:13:03","2025-05-07 21:13:03");
INSERT INTO `government_info` VALUES("87","ACT001","N/A","1211-0599-3096","01-050738494-9","02-2477278-7","306-597-853-000","2025-05-08 00:03:15","2025-05-08 00:03:15");
INSERT INTO `government_info` VALUES("88","SWD-002","02004041821","1210-0582-3452","09-2000-387810","N/A","306-224-964-000","2025-05-08 00:08:35","2025-05-08 00:08:35");
INSERT INTO `government_info` VALUES("89","OMM005","2006127966","121307333233","092538214533","UMID 0111-5764121-4","614809051","2025-05-08 00:17:29","2025-05-08 00:17:29");
INSERT INTO `government_info` VALUES("90","MTO-006","200 200 6095","1490-0026-6311","09-000044573-7","33-2066-641-9","908-739-863","2025-05-08 00:27:41","2025-05-08 00:27:41");
INSERT INTO `government_info` VALUES("91","151810100001-X","B64VF-RDD-02-9","040133166107","09-00000-1184-2","N/A","138-936-373","2025-05-08 22:36:34","2025-05-08 22:36:34");
INSERT INTO `government_info` VALUES("92","OMM006","61012001991","040140876101","09-050018211-2","03-9028316-8","131-212-894","2025-05-08 22:48:26","2025-05-08 22:48:26");
INSERT INTO `government_info` VALUES("93","SBO-009","2004990343","1211-76340895","N/A","0414528864","934-021-866","2025-05-08 22:54:19","2025-05-08 16:00:00");
INSERT INTO `government_info` VALUES("94","SBO004","02005612332","1490-0012-5116","09-050072861-1","04-3281614-7","922-152-861","2025-05-08 22:59:07","2025-05-08 16:00:00");
INSERT INTO `government_info` VALUES("95","SBO002","72102201915","040134315310","09-2002806101","33-9248766-0","901-553-465","2025-05-08 23:10:12","2025-05-08 16:00:00");
INSERT INTO `government_info` VALUES("96","GSO-006","2005693525","121262629131","09-100665650-3","04-0941292-7","175-950-829-000","2025-05-08 23:15:21","2025-05-08 23:15:21");
INSERT INTO `government_info` VALUES("97","GSO008","N/A","1211-8951-8705","09-050500785-8","04-35120526-8","473-735-397-000","2025-05-08 23:23:13","2025-05-08 23:23:13");
INSERT INTO `government_info` VALUES("98","OMN038","N/A","N/A","09-025545486-1","3465259794","345-914-679","2025-05-08 23:28:39","2025-05-08 23:28:39");
INSERT INTO `government_info` VALUES("99","SBO015","2005695134","121232661120","09-025636675-3","0429465378","295-942-806-000","2025-05-08 23:33:07","2025-05-08 23:33:07");
INSERT INTO `government_info` VALUES("100","EMP007","N/A","N/A","04-1018003-5818-0003","040983229-3","918-812-146","2025-05-08 16:00:00","2025-05-08 16:00:00");
INSERT INTO `government_info` VALUES("101","EMP005","N/A","1213-0367-1062","09-025867503-6","04-4373121-1","367-324-779-000","2025-05-08 16:00:00","2025-05-08 16:00:00");
INSERT INTO `government_info` VALUES("102","ASS010","N/A","N/A","09-250685938-9","N/A","N/A","2025-05-08 23:53:07","2025-05-08 23:53:07");
INSERT INTO `government_info` VALUES("103","OMM-0011","N/A","N/A","09-25184289-5","04-4323708-7","399-025-2546-00000","2025-05-08 23:58:27","2025-05-08 23:58:27");
INSERT INTO `government_info` VALUES("104","MEO003","2003965003","121077691205","09-200755791-6","N/A","293-010-901","2025-05-09 00:04:29","2025-05-09 00:04:29");
INSERT INTO `government_info` VALUES("105","AGR-008","2006020460","121253192640","09-250688893-1","0442559261","643-757-613-00000","2025-05-09 00:12:04","2025-05-09 00:12:04");
INSERT INTO `government_info` VALUES("106","SBO-015","2004146715","1210 1840 9855","09-200923584-1","N/A","933-190-240","2025-05-09 00:17:04","2025-05-09 00:17:04");
INSERT INTO `government_info` VALUES("107","MEO001","2003965004","1210-6964-8666","0920087161","04-0600415-0","146-053-871","2025-05-09 00:26:45","2025-05-09 00:26:45");
INSERT INTO `government_info` VALUES("108","MTO001","2002006644","1490-0022-0368","09-000063740-7","N/A","926-939-054","2025-05-09 00:32:38","2025-05-09 00:32:38");
INSERT INTO `government_info` VALUES("109","OMM001","2000977466","1210-41006116","19-090002573-8","33-1281047-7","130-102-600","2025-05-08 16:00:00","2025-05-08 16:00:00");
INSERT INTO `government_info` VALUES("110","SBO001","2002000417","040314342103","18-000084762-7","N/A","174-055-369-000","2025-05-09 00:56:40","2025-05-09 00:56:40");
INSERT INTO `government_info` VALUES("111","SWD006","N/A","1212-3967-6351","09201133559-6","04-1849647-1","251-767-137","2025-05-09 01:00:38","2025-05-09 01:00:38");
INSERT INTO `government_info` VALUES("112","MEO008","N/A","121093481888","090503730064","0426612289","317240808000","2025-05-09 01:04:26","2025-05-09 01:04:26");
INSERT INTO `government_info` VALUES("113","MEO03","2006127967","121292415548","012625537582","N/A","748-134-405-000","2025-05-09 01:09:33","2025-05-09 01:09:33");
INSERT INTO `government_info` VALUES("114","HRM004","2004155019","121031928133","09-2007100924","04-218-6722-0","934-490-296","2025-05-08 16:00:00","2025-05-11 13:54:17");
INSERT INTO `government_info` VALUES("115","AGR013","N/A","N/A","09-200846244-7","04-2575645-0","707-494-231","2025-05-09 01:23:32","2025-05-09 01:23:32");
INSERT INTO `government_info` VALUES("116","SBO-006","2005612333","N/A","03-050556521-1","0111-0416659-3","275-043-694-000","2025-05-09 01:31:37","2025-05-09 01:31:37");
INSERT INTO `government_info` VALUES("117","SBO-004","2002006696","1210-20309997","090000947325","0111-0389651-8","151-041-449","2025-05-09 01:37:18","2025-05-09 01:37:18");
INSERT INTO `government_info` VALUES("118","MHO003","2005-205-830","1210-2666-0584","19-052272263-8","33-0881487-2","177-477-455","2025-05-09 01:43:31","2025-05-09 01:43:31");
INSERT INTO `government_info` VALUES("119","148","N/A","1212-1754-1748","0105-2269-9212","34-7277567-2","476-182-580-000","2025-05-09 01:48:01","2025-05-09 01:48:01");
INSERT INTO `government_info` VALUES("120","OMM003","2003285966","1211-6997-0222","09-2506840920","0437467371","3282-44437-0000","2025-05-09 01:53:24","2025-05-09 01:53:24");

DROP TABLE IF EXISTS `leave_files`;
CREATE TABLE `leave_files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `folder_id` int NOT NULL,
  `filename` varchar(255) NOT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`folder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `leave_folders`;
CREATE TABLE `leave_folders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `service_records`;
CREATE TABLE `service_records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `designation` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `salary` decimal(15,2) NOT NULL,
  `station_place` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `abs_wo_pay` varchar(50) DEFAULT NULL,
  `date_separated` date DEFAULT NULL,
  `cause_of_separation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `employee_no` (`employee_no`),
  CONSTRAINT `service_records_ibfk_1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `service_records` VALUES("9","GSO003","2021-01-04","2025-05-04","Office of the Municipal General Services","Permanent","23000.00","GSO","M-kahoy, Bats","four","2025-05-05","","2025-05-11 00:00:00","2025-05-11 00:00:00");
INSERT INTO `service_records` VALUES("10","LDR001","2019-02-02","2025-05-04","Office of the Municipal Human Resource","Permanent","80000.00","HR","M-kahoy, Bats","two","2025-05-04","","2025-05-11 00:00:00","2025-05-11 00:00:00");

