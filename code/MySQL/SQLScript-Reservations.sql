/*
* SQL Script for reservations table
*/

CREATE TABLE `reservations` (
	`reservationID` int(12) NOT NULL AUTO_INCREMENT,
	`printerID` int(12) NOT NULL,
	`lewisID` varchar(12) NOT NULL,
	`tdate` date NOT NULL,
	`ttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`reservationID`), KEY `LewisID` (`lewisID`),
	KEY `printerID` (`printerID`),
	CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`PrinterID`) REFERENCES `printers` (`PrinterID`), 
	CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`LewisID`) REFERENCES `users` (`LewisID`), 
	CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`printerID`) REFERENCES `printers` (`PrinterID`)
	); 
