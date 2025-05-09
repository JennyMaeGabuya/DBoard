-- Database Backup
-- Database: `hr_records`
-- Generated: 2025-05-09 11:43:20

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

INSERT INTO `admin` VALUES("1","HRM-ADMIN","admin","$2y$10$wqvEaTtRI0nEDhPjE9c6yujXvGzJ/ySeu5/ULFfYSiO1MMjYbY1sS","jennymaegabuya8@gmail.com","superadmin","2025-02-17 14:35:11","2025-05-03 10:32:39","70d595eb8df0e895ef9a01aef3bd56fc307658eb4f7911da752a8da2f4b37d33dac6d38421fba0a9b175e99b106d92d68391","2025-03-30 11:55:31");

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
  `extra_salary` json DEFAULT NULL,
  PRIMARY KEY (`id`)
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
  `extra_salary` json DEFAULT NULL,
  PRIMARY KEY (`id`)
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

INSERT INTO `employee` VALUES("dsfd34","Jenny","Mae","Gabuyav2","III","2025-03-13","San Luis, Batangas","Female","soafer latina","Sta. Teresita, Batangas","O+","99230232716","jenny@gmail.com","","Treasure\'s Office","Admin Aide","0","0","2025-03-13 02:04:56","2025-04-30 00:00:00");
INSERT INTO `employee` VALUES("EMP001","Juan","Dela","Cruz","Jr.","1985-03-25","Manila","Male","Married","123 Mabini St., Manila","O+","9171234567","juan.cruz@email.com","","","","1","0","2025-02-19 22:09:03","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("EMP002","Noime","T.","Tipan","","1990-07-12","Quezon City","Male","Married","456 Rizal Ave., QC","A+","9281234567","maria.lopez@email.com","Noims.png","HR Officer","Admin Officer IV","1","1","2025-02-19 22:09:03","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("EMP003","Gelyn","M.","Katimbang","","1988-05-18","Cebu City","Female","Married","789 Osmena Blvd., Cebu","B+","9391234567","pedro.gonzalez@email.com","Gelyn.png","HR Assistant","Admin Officer II","1","1","2025-02-19 22:09:03","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("EMP004","Elmie","H.","Panganiban","","1995-01-20","Davao City","Female","Married","101 Bonifacio St., Davao","AB+","9491234567","ana.fernandez@email.com","Elmie.png","HR Specialist","Admin Aide VI","1","1","2025-02-19 22:09:03","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("EMP005","Marjorie","O.","Cabrera","","1982-09-05","Baguio City","Female","Single","202 Marcos Hwy, Baguio","O-","9591234567","carlos.rivera@email.com","Marjorie.png","HR Clerk","Admin Aide IV","1","1","2025-02-19 22:09:03","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("EMP006","Lenard Joseph","V.","Ariola","","1993-11-15","Iloilo City","Male","Single","303 Jaro St., Iloilo","A-","9691234567","elena.torres@email.com","Lenard.png","HR Coordinator","Job Order","1","1","2025-02-19 22:09:03","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("EMP007","Gilbert","O.","Gonzales","","1987-06-30","Batangas City","Male","Married","404 Laurel Ave., Batangas","B-","9791234567","rafael.velasco@email.com","Gilbert.png","HR Associate","Admin Aide I","1","1","2025-02-19 22:09:03","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("EMP008","Isabel","T.","Mendoza","","1998-02-25","Laguna","Female","Single","505 Calamba Rd., Laguna","AB-","9891234567","isabel.mendoza@email.com","","","","1","0","2025-02-19 22:09:03","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("EMP009","Miguel","R.","Domingo","","1991-08-09","Pampanga","Male","Married","606 Angeles St., Pampanga","O+","9991234567","miguel.domingo@email.com","","","","1","0","2025-02-19 22:09:03","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("EMP010","Janet","M.","Ilagan","","1984-12-01","Zamboanga City","Female","Married","707 Pilar St., Zamboanga","A+","9091234567","carmen.reyes@email.com","Janet.png","Executive Officer","Municipal Mayor","1","1","2025-02-19 22:09:03","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("HRM-ADMIN","Gally","Dimayuga","Tipan","","1990-06-28","CUENCA, BATANGAS","Male","Single","CUENCA, BATANGAS","A+","9123456789","admin@gmail.com","Gally.png","Office of the HRM","MHRMO","1","1","2025-02-17 14:33:54","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("saS","WEQWS","DSAD","2WEWE","dsdda","2025-03-12","sasa","Female","Single","sasa","AB-","23221432434","sdas@gmail.com","","","","1","0","2025-03-12 06:33:56","2025-04-23 13:50:52");
INSERT INTO `employee` VALUES("ssa","sas","sas","sas","sa","2025-03-13","sasa","Male","Other","asas","B+","23213820982","sas@gmailc.om","","s","s","1","1","2025-03-13 01:53:18","2025-05-03 00:00:00");

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `events` VALUES("13","Evening Debrief","2025-05-09 18:00:00","2025-05-09 18:30:00","Leadership catch-up.","#DA70D6","0");
INSERT INTO `events` VALUES("14","After-hours Maintenance","2025-05-09 19:00:00","2025-05-09 21:00:00","Planned IT maintenance.","#708090","0");
INSERT INTO `events` VALUES("12","End-of-Day Wrap Up","2025-05-09 17:30:00","2025-05-09 18:00:00","Summary and task reassignment.","#FF4500","1");
INSERT INTO `events` VALUES("11","Code Review","2025-05-09 16:30:00","2025-05-09 17:30:00","Team code review session.","#20B2AA","0");
INSERT INTO `events` VALUES("10","Sales Forecast Meeting","2025-05-09 15:30:00","2025-05-09 16:30:00","Projection for next quarter.","#FF69B4","1");
INSERT INTO `events` VALUES("9","Security Briefing","2025-05-09 14:45:00","2025-05-09 15:30:00","Cybersecurity policy updates.","#00CED1","0");
INSERT INTO `events` VALUES("8","UI/UX Feedback Session","2025-05-09 14:00:00","2025-05-09 14:45:00","User experience review.","#8B0000","0");
INSERT INTO `events` VALUES("7","Marketing Strategy Review","2025-05-09 13:00:00","2025-05-09 14:00:00","Refining campaign approach.","#FFD700","1");
INSERT INTO `events` VALUES("6","Lunch & Learn","2025-05-09 12:00:00","2025-05-09 13:00:00","Training session over lunch.","#4682B4","0");
INSERT INTO `events` VALUES("5","Team Sync","2025-05-09 11:00:00","2025-05-09 11:30:00","Mid-morning internal sync.","#DC143C","1");
INSERT INTO `events` VALUES("4","Client Call","2025-05-09 10:30:00","2025-05-09 11:00:00","Call with key client to align goals.","#9370DB","0");
INSERT INTO `events` VALUES("3","Project Kickoff","2025-05-09 09:30:00","2025-05-09 10:30:00","Initiating new development project.","#FFA500","1");
INSERT INTO `events` VALUES("2","Daily Standup","2025-05-09 09:00:00","2025-05-09 09:30:00","Quick team update.","#32CD32","0");
INSERT INTO `events` VALUES("1","Budget Review","2025-05-09 08:00:00","2025-05-09 09:00:00","Morning review of the financial plan.","#1E90FF","1");
INSERT INTO `events` VALUES("15","Late Shift Check-in","2025-05-09 21:00:00","2025-05-09 22:00:00","Support staff meeting.","#40E0D0","1");

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `gsis_no` (`gsis_no`),
  UNIQUE KEY `pag_ibig_no` (`pag_ibig_no`),
  UNIQUE KEY `philhealth_no` (`philhealth_no`),
  UNIQUE KEY `sss_no` (`sss_no`),
  UNIQUE KEY `tin_no` (`tin_no`),
  KEY `employee_no` (`employee_no`),
  CONSTRAINT `government_info_ibfk_1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `government_info` VALUES("2","HRM-ADMIN","4332423-3423","3287-387245","94586-7863","4353-2435","325436-32422","2025-03-11 16:25:50","2025-03-11 16:25:50");
INSERT INTO `government_info` VALUES("6","saS","31","32","325","536","61","2025-03-12 06:33:56","2025-03-12 06:33:56");
INSERT INTO `government_info` VALUES("7","ssa","NA","NA","NA","NA","NA","2025-03-13 01:53:18","2025-05-03 00:00:00");
INSERT INTO `government_info` VALUES("8","dsfd34","3223-4","3123-4","12312-4","3123-4","2313-4","2025-03-13 02:04:56","2025-04-30 00:00:00");

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `service_records` VALUES("2","HRM-ADMIN","2025-03-05","2025-03-07","dfsdsfs","fdf","3232.00","HRM","M-Kahoy","NA","2025-03-11","NA","2025-03-05 00:00:00","2025-03-24 15:07:28");
INSERT INTO `service_records` VALUES("3","HRM-ADMIN","2024-03-08","2025-03-06","dfsdsfs","Regular","12500.00","HRM","MKahoy","--td--","2025-03-07","NA","2025-03-08 00:00:00","2025-03-24 15:07:28");
INSERT INTO `service_records` VALUES("4","EMP009","2025-03-08","2025-04-01","sa","sa","1234345.00","sdsd","dsds","dsd","2025-03-07","dsds","2025-03-08 00:00:00","0000-00-00 00:00:00");
INSERT INTO `service_records` VALUES("5","EMP009","2025-03-07","2025-03-04","sa","NA","232323.00","sa","sa","NA","2025-03-04","test toast","2025-03-08 00:00:00","0000-00-00 00:00:00");
INSERT INTO `service_records` VALUES("6","HRM-ADMIN","2025-03-11","2025-03-12","dfsdsfs","sdjhasjd","38973487.00","HRM","hsdjah","--td--","2025-03-10","NA","2025-03-11 00:00:00","2025-03-24 15:07:28");
INSERT INTO `service_records` VALUES("7","HRM-ADMIN","2025-03-11","2025-03-12","dfsdsfs","sas","45345.00","HRM","6gdf","546","2025-03-12","hehehhhe","2025-03-11 00:00:00","2025-03-24 15:07:28");
INSERT INTO `service_records` VALUES("8","EMP009","2025-04-30","2025-05-02","ss","sa","21.00","sa","dfd","dfd","2025-04-29","hehe test","2025-04-30 00:00:00","0000-00-00 00:00:00");

