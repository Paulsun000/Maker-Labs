/*
* SQL Script for users table
*/

CREATE TABLE `users` (
	`lewisID` varchar(12) NOT NULL,
	`Fname` varchar(15) NOT NULL,
	`lname` varchar(15) NOT NULL,
	`email` varchar(35) NOT NULL,
	`status` enum('Pending','Active') NOT NULL DEFAULT 'Pending',
	`password` char(128) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
	PRIMARY KEY (`lewisID`)
	);
