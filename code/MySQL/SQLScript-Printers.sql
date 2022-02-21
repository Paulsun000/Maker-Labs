/*
* SQL Script for printers table
*/

CREATE TABLE `printers` (
	`printerID` int(12) NOT NULL AUTO_INCREMENT,
	`pname` varchar(15) NOT NULL,
	`pmodel` varchar(15) NOT NULL,
	`pimage` blob NOT NULL, PRIMARY KEY (`printerID`)
	); 
