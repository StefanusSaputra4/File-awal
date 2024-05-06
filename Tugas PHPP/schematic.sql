CREATE TABLE `login` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username` (`Username`)
) 

SELECT * FROM login;

CREATE TABLE `activity` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `To Do` varchar(255) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) 

SELECT * FROM activity;

SELECT activity.*
FROM login
JOIN activity ON login.`Username` = activity.`Username`;