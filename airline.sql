SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Table structure for "flight_details"

CREATE TABLE `flights`(
`f_no` varchar(10) NOT NULL,
`flight_name` varchar(30) NOT NULL,
`source` varchar(20) NOT NULL,
`destination` varchar(20) NOT NULL,
`journey_date` date DEFAULT NULL,
`departure_time` time DEFAULT NULL,
`arrival_time` time DEFAULT NULL,
`seats_economy` int(5) DEFAULT NULL,
`seats_business` int(5) DEFAULT NULL,
`price_economy` int(10) DEFAULT NULL,
`price_business` int(10) DEFAULT NULL,
PRIMARY KEY (`f_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for "flight_details"

INSERT INTO `flights` (`f_no`, `flight_name`, `source`, `destination`,`journey_date`, `departure_time`, `arrival_time`, `seats_economy`, `seats_business`, `price_economy`, `price_business`) VALUES
('IG111', 'IndiGo', 'Mumbai', 'Kolkata', '2019-10-10', '15:00', '16:00', 200, 90, 5000, 7500),
('IG222', 'IndiGo', 'Mumbai', 'Bengaluru', '2019-10-11', '20:00', '22:00', 195, 100, 4000, 6500),
('IG333', 'IndiGo', 'Chennai', 'Mumbai', '2019-10-12', '18:00', '20:00', 190, 90, 5000, 7000),
('IG444', 'IndiGo', 'Mumbai', 'Ahmedabad', '2019-10-13', '7:00', '8:00', 150, 70, 3000, 5000),
('IG555', 'IndiGo', 'Lucknow', 'Mumbai', '2019-10-14', '10:00', '12:00', 250, 100, 5000, 7500),
('JA111', 'Jet Airways', 'Kolkata', 'Mumbai', '2019-10-15', '8:00', '10:30', 200, 90, 4500, 7500),
('JA222', 'Jet Airways', 'Mumbai', 'Lucknow', '2019-10-16', '14:00', '16:00', 180, 95, 5000, 7000),
('JA333', 'Jet Airways', 'Mumbai', 'Chennai', '2019-10-17', '21:00', '23:00', 170, 85, 4500, 7500),
('JA444', 'Jet Airways', 'Mumbai', 'Bengaluru', '2019-10-18', '17:00', '19:00', 200, 90, 4000, 6500),
('JA555', 'Jet Airways', 'Mumbai', 'Ahmedabad', '2019-10-19', '15:00', '16:00', 150, 70, 3500, 4500),
('AI111', 'Air India', 'Mumbai', 'Kolkata', '2019-10-20', '7:00', '9:00', 200, 90, 4500, 7500),
('AI222', 'Air India', 'Chennai', 'Mumbai', '2019-10-12', '20:00', '22:00', 180, 80, 5000, 7500),
('AI333', 'Air India', 'Kolkata', 'Chennai', '2019-10-14', '9:00', '11:00', 170, 80,4000, 6000),
('AI444', 'Air India', 'Bengaluru', 'Ahmedabad', '2019-10-16', '17:00', '19:00', 180, 90, 4500, 6500),
('AI555', 'Air India', 'Lucknow', 'Kolkata', '2019-10-18', '23:00', '00:30', 190, 90, 4000, 6000);

-- Table struture for "passenger"20
 
CREATE TABLE `passengers`(
`P_id` int(10) NOT NULL AUTO_INCREMENT,
`F_name` varchar(20) NOT NULL,
`L_name` varchar(20) NOT NULL,
`gender` varchar(8) DEFAULT NULL,
`age` int(11) DEFAULT NULL,
`ph_no` varchar(15) DEFAULT NULL,
`email` varchar(35) DEFAULT NULL,
`f_no` varchar(30) DEFAULT NULL,
PRIMARY KEY (`P_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--  Dumping data for table `passenger`

INSERT INTO `passengers` (`P_id`,`F_name`, `L_name`, `age`,`gender`, `ph_no`, `email`,`f_no`) VALUES
(1,'Rishabh', 'Singh', 20, 'Male', '7777777777', 'singhrishab415@gmail.com','JA222'),
(2,'Chirag', 'Singhvi', 22, 'Male', '8888888888', 'chiragsinghvi@gmail.com','IG444'),
(3,'Hiren', 'Satwara', 20, 'Male', '9999999999', 'hirensatwara@gmail.com','AI111'),
(4,'Sarvesh', 'Sawant', 20, 'Male', '5555555555', 'sarveshsawant@gmail.com', 'IG111'),
(5,'Momin', 'Danish', 20, 'Male', '6969696969', 'momindanish@gmail.com', 'IG555'),
(6,'Momin', 'Usma', 20, 'Female', '1111111111', 'mominusma@gmail.com', 'AI444'),
(7,'Vipul', 'Purohit', 20, 'Male', '2222222222', 'purohitvipul@gmail.com', 'JA555'),
(8,'Siddhi', 'Shah', 20, 'Female', '4444444444', 'siddhimemes@gmail.com', 'JA555');

-- Table for "payment_details"

CREATE TABLE `payment_details`(
`payment_id` varchar(20) NOT NULL,
`P_id` int(10) NOT NULL,
`payment_date` date DEFAULT NULL,
`payment_amount` int(10) DEFAULT NULL,
`payment_mode` varchar(15) DEFAULT NULL,
PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

-- Dumping data for "payment details"

INSERT INTO `payment_details` (`payment_id`,`P_id`,`payment_date`, `payment_amount`, `payment_mode`) VALUES
('11',1,'2019-10-6', 7000, 'credit card'),
('22',2, '2019-10-7', 5000, 'credit card'),
('33',6, '2019-10-8', 6500, 'net banking'),
('44',8, '2019-10-9', 4500, 'debit card');

-- Table for "ticket_details"

CREATE TABLE `ticket_details` (
`pnr` varchar(15) NOT NULL,
`f_no` vaRchar(10) DEFAULT NULL,
`journey_date` date DEFAULT NULL,
`class` varchar (10) DEFAULT NULL,
`booking_status` varchar(20) DEFAULT NULL,
`no_of_passengers` int(5) DEFAULT NULL,
`payment_id` varchar(20) DEFAULT NULL,
`P_id` varchar(20) DEFAULT NULL,
PRIMARY KEY (`pnr`),
KEY `P_id` (`P_id`),
KEY `journey_date` (`journey_date`),
KEY `f_no` (`f_no`),
KEY `f_no_2` (`f_no`,`journey_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping table for "ticket_details"

INSERT INTO `ticket_details` (`pnr`, `f_no`, `journey_date`, `class`, `booking_status`,`no_of_passengers`, `payment_id`, `P_id`) VALUES
('7777', 'JA222', '2019-10-16', 'business', 'CONFIRMED','5', '11', '1'),
('1111', 'IG444', '2019-10-13', 'business', 'CONFIRMED','3', '22', '2'),
('6666', 'AI444', '2019-10-16', 'business', 'CONFIRMED','4', '33', '6'),
('2222', 'JA555', '2019-10-19', 'business', 'CONFIRMED','2', '44', '8');

  
-- ALTER TABLE `ticket_details`
--   ADD CONSTRAINT `ticket_details_ibfk_1` FOREIGN KEY (`f_no`,`journey_date`) REFERENCES `flight_details` (`f_no`, `departure_date`)ON UPDATE CASCADE;
COMMIT;  



 