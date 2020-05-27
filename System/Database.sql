-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: May 27, 2020 at 04:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SolentMedical`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Reason` text DEFAULT NULL,
  `Checked_IN` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentID`, `UserID`, `Date`, `Time`, `Reason`, `Checked_IN`) VALUES
(31, 17, '2020-01-01', '00:00:08', 'check up', '0'),
(84, 19, '2020-01-06', '00:00:08', 'test', '0'),
(87, 4, '2020-05-05', '56:00:00', 'Test', '1');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `DiseaseID` int(11) NOT NULL,
  `DiseaseName` varchar(255) NOT NULL,
  `Causes` text NOT NULL,
  `Symptoms` text NOT NULL,
  `Description` text NOT NULL,
  `Treatment1` text NOT NULL,
  `Treatment2` varchar(255) NOT NULL,
  `Treatment3` varchar(255) NOT NULL,
  `BodyArea` text NOT NULL,
  `Gender` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`DiseaseID`, `DiseaseName`, `Causes`, `Symptoms`, `Description`, `Treatment1`, `Treatment2`, `Treatment3`, `BodyArea`, `Gender`) VALUES
(4, 'Acoustic neuroma\r\n', 'None', '- hearing loss\r\n- tinnitus\r\n- vertigo\r\n- persistent headaches\r\n- temporary blurred or double vision\r\n- weakness on one side of face\r\n- pain on one side of face\r\n- numbness on one side of face\r\n- ataxia\r\n- hoarse voice or difficulty swallowing\r\n', 'it is usually only affects one ear<br/>\r\nhearing sounds that come from inside the body<br/>\r\nthe sensation that you are moving or spinning\r\n', 'MRI scans\r\n', 'brain surgery\r\n', 'stereotactic radiosurgery\r\n', 'Brain', 'F'),
(5, 'Acromegaly\r\n', 'None', 'joint pain \r\nlarge hands and feet\r\ncarpal tunnel syndrome\r\noily skin\r\ncoarse skin\r\nthick\r\nskin tags\r\nenlarged nose\r\nenlarged tongue\r\nenlarged lips\r\na protruding jaw and brow\r\nwidely spaced teeth\r\ndeepening of the voice\r\nobstructive sleep apnoea\r\nexcessive sweating\r\nfatigue and weakness\r\nheadaches\r\nimpaired vision\r\nloss of sex drive\r\nerectile dysfunction\r\ngigantism\r\n', 'compression of the nerve in the wrist causing numbness and weakness of the hands<br/>\r\ndue to enlarged sinuses and vocal cords\r\nbreaks in breathing during sleep due to obstruction of the airway<br/>\r\nexcessive height in children and teenagers\r\n', 'Brain surgery\r\n', 'Medication', 'Radiotherapy', 'Brain', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `ID` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `PrimaryFun` varchar(255) NOT NULL,
  `SecondaryFun` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Number` int(13) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `County` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicalrecords`
--

CREATE TABLE `medicalrecords` (
  `RecordID` int(11) NOT NULL,
  `RecordType` varchar(255) NOT NULL,
  `RecordReport` text NOT NULL,
  `Date` date NOT NULL,
  `Treatment` text DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicalrecords`
--

INSERT INTO `medicalrecords` (`RecordID`, `RecordType`, `RecordReport`, `Date`, `Treatment`, `UserID`, `DoctorID`) VALUES
(5, 'Test Result', 'All Good', '2020-04-20', NULL, 1, 3),
(6, 'Recommendation', 'Would recommend sleeping pills to help, with your sleeping', '2020-02-17', 'Sleeping pills', 1, 3),
(7, 'Test result', 'Nut Allergies', '2020-04-05', 'antihistamines \r\n these can be taken when you notice the symptoms of a reaction, or before being exposed to an allergen to stop a reaction occurring\r\n\r\ndecongestants\r\n tablets, capsules, nasal sprays or liquids that can be used as a short-term treatment for a blocked nose\r\n\r\nCorticosteroids\r\nsprays, drops, creams, inhalers and tablets that can help reduce redness and swelling caused by an allergic reaction', 2, 3),
(8, 'Test Result', 'Flu', '2020-04-16', 'Flu Tablets', 2, 3),
(9, 'Test Results', 'test', '2020-04-21', 'test', 1, 4),
(10, 'Test Results', 'test', '2020-04-21', 'test', 1, 4),
(11, 'Test Results', 'test', '2020-04-21', 'test', 1, 4),
(12, 'Recommadation', 'flu tablets', '2020-04-21', '', 2, 4),
(13, 'Other', 'test', '2020-04-21', 'test', 1, 4),
(14, 'Other', 'test', '2020-04-21', 'test', 1, 4),
(15, 'Other', 'test', '2020-04-21', 'test', 1, 4),
(16, 'Prescription', 'test result', '2020-04-21', 'test result', 1, 4),
(17, 'Prescription', 'test result', '2020-04-21', 'test result', 1, 4),
(18, 'Test Results', 'Your all fine', '2020-04-21', '', 1, 4),
(19, 'Test Results', 'TEST', '2020-04-21', 'TEST', 19, 4),
(20, 'Test Results', 'Test', '2020-04-22', 'Test', 1, 4),
(21, 'Test Results', 'Test', '2020-04-24', 'test', 19, 4);

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `ID` int(11) NOT NULL,
  `TreatmentName` varchar(200) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`ID`, `TreatmentName`, `Description`) VALUES
(1, 'MRI scans', 'small tumors often don’t get bigger so just need to monitor them\r\n'),
(2, 'brain surgery\r\n', 'remove the tumour through a cut in the skull\r\n'),
(3, 'stereotactic radiosurgery\r\n', 'to remove small tumours or any pieces of a larger tumour that remain after surgery\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Gender` enum('M','F') DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNumber` int(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `AccessLevel` enum('Patient','Staff','Doctor','Admin') DEFAULT 'Patient'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `password`, `FirstName`, `LastName`, `Gender`, `Address`, `PhoneNumber`, `Email`, `DOB`, `AccessLevel`) VALUES
(1, 'Mike123', '123ekim', 'Mike', 'Johnson', 'M', '12 Dover Drive\r\nDoncester\r\nDO5 1DH', 784333444, 'mikejke11@outlook.co.uk', '1976-05-01', 'Patient'),
(2, 'Sarah11', 'Love1123', 'Sarah', 'Foster', 'F', '25 St Maurices Road\r\nPRITTLEWELL\r\nSS0 WB', 707334073, 'SarchFost@armyspy.com', '1977-08-26', 'Patient'),
(3, 'Lil23', 'happy123', 'Lily ', 'O\'Sullivan', 'F', '55 Tadcaster Rd\r\nPINN\r\nEX10 1JQ', 778026824, 'LilyOSullivan@teleworm.us', '1967-12-08', 'Doctor'),
(4, 'Vic123', 'pass123', 'Victoria', 'Walters', 'F', '64 Pier Road\r\nSTAPLEFORD\r\nNG9 2EZ', 786091704, '\r\nVictoriaWalters@armyspy.com', '1996-02-05', 'Staff'),
(5, 'admin', 'admin123', 'admin', 'admin', 'M', 'admin', 11, 'admin', '2020-04-13', 'Admin'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`DiseaseID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  ADD PRIMARY KEY (`RecordID`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `DiseaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  MODIFY `RecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
