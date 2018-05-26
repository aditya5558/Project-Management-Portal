-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2018 at 01:30 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit_head`
--

CREATE TABLE `credit_head` (
  `Credit_key` varchar(20) DEFAULT NULL,
  `Date_of_credit` date DEFAULT NULL,
  `Amount` decimal(10,0) DEFAULT NULL,
  `Memo` varchar(50) DEFAULT NULL,
  `SubHead` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `credit_head`
--

TRUNCATE TABLE `credit_head`;
--
-- Dumping data for table `credit_head`
--

INSERT INTO `credit_head` (`Credit_key`, `Date_of_credit`, `Amount`, `Memo`, `SubHead`) VALUES
('ECR/2015/000176', '2018-01-12', '1000', '', 'REIMBURSEMENT_OF_RENT'),
('ECR/2015/000176', '2016-08-08', '2899412', '', 'UNALLOCATED'),
('ECR/2015/000176', '2016-12-12', '130000', '', 'UNALLOCATED'),
('ECR/2015/000176', '2017-02-02', '1230', '', 'UNALLOCATED');

-- --------------------------------------------------------

--
-- Table structure for table `debit_head`
--

CREATE TABLE `debit_head` (
  `debit_key` varchar(20) DEFAULT NULL,
  `Date_of_debit` date DEFAULT NULL,
  `Amount` decimal(10,0) DEFAULT NULL,
  `Memo` varchar(50) DEFAULT NULL,
  `SubHead` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `debit_head`
--

TRUNCATE TABLE `debit_head`;
--
-- Dumping data for table `debit_head`
--

INSERT INTO `debit_head` (`debit_key`, `Date_of_debit`, `Amount`, `Memo`, `SubHead`) VALUES
('ECR/2015/000176', '2016-10-04', '900', '', 'TRAVEL'),
('ECR/2015/000176', '2016-11-11', '8620', '', 'TRAVEL'),
('ECR/2015/000176', '2016-12-02', '50159', '', 'CONTINGENCY'),
('ECR/2015/000176', '2016-11-04', '21049', '', 'CONTINGENCY'),
('ECR/2015/000176', '2016-12-13', '20323', '', 'MANPOWER/FELLOWSHIP'),
('ECR/2015/000176', '2016-12-22', '98748', '', 'EQUIPMENT'),
('ECR/2015/000176', '2016-12-23', '26343', '', 'CONTINGENCY'),
('ECR/2015/000176', '2016-12-26', '950', '', 'TRAVEL'),
('ECR/2015/000176', '2017-01-05', '15000', '', 'MANPOWER/FELLOWSHIP'),
('ECR/2015/000176', '2017-01-13', '900', '', 'TRAVEL'),
('ECR/2015/000176', '2017-01-24', '32852', '', 'CONTINGENCY'),
('ECR/2015/000176', '2017-02-04', '15000', '', 'MANPOWER/FELLOWSHIP'),
('ECR/2015/000176', '2017-02-14', '33497', '', 'CONTINGENCY'),
('ECR/2015/000176', '2016-12-01', '6181', '', 'TRAVEL'),
('ECR/2015/000176', '2017-03-08', '2069', '', 'TRAVEL'),
('ECR/2015/000176', '2017-03-20', '45030', '', 'CONTINGENCY'),
('ECR/2015/000176', '2017-03-24', '2028', '', 'TRAVEL'),
('ECR/2015/000176', '2017-03-31', '15000', '', 'MANPOWER/FELLOWSHIP'),
('ECR/2015/000176', '2016-10-03', '12000', '', 'MANPOWER/FELLOWSHIP'),
('ECR/2015/000176', '2016-11-20', '111', '', 'MANPOWER/FELLOWSHIP');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `amount` double DEFAULT NULL,
  `memo` varchar(100) DEFAULT NULL,
  `month` varchar(15) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `sanc_key` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `expenditure`
--

TRUNCATE TABLE `expenditure`;
--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`amount`, `memo`, `month`, `year`, `sanc_key`) VALUES
(12900, NULL, 'October', 2016, 'ECR/2015/000176'),
(29780, NULL, 'November', 2016, 'ECR/2015/000176'),
(202704, NULL, 'December', 2016, 'ECR/2015/000176'),
(48752, NULL, 'January', 2017, 'ECR/2015/000176'),
(48497, NULL, 'February', 2017, 'ECR/2015/000176'),
(64127, NULL, 'March', 2017, 'ECR/2015/000176'),
(38035, NULL, 'March', 2017, 'MHRD1210/921'),
(0, NULL, 'September', 2017, 'ECR/2015/000176');

-- --------------------------------------------------------

--
-- Table structure for table `grant_rec`
--

CREATE TABLE `grant_rec` (
  `Memo` varchar(50) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `month` varchar(15) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `sanc_key` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `grant_rec`
--

TRUNCATE TABLE `grant_rec`;
--
-- Dumping data for table `grant_rec`
--

INSERT INTO `grant_rec` (`Memo`, `amount`, `month`, `year`, `sanc_key`) VALUES
(NULL, 1000, 'January', 2018, 'MHRD1210/921'),
(NULL, 0, 'June', 2017, 'MHRD1210/921'),
(NULL, 23000, 'September', 2017, 'MHRD1210/921'),
(NULL, 0, 'July', 2017, 'MHRD1210/921'),
(NULL, 0, 'November', 2017, 'MHRD1210/921'),
(NULL, -48000, 'October', 2017, 'MHRD1210/921'),
(NULL, -24000, 'August', 2017, 'MHRD1210/921'),
(NULL, 2899412, 'August', 2016, 'ECR/2015/000176'),
(NULL, 0, 'January', 2019, 'ECR/2015/000176'),
(NULL, 123, 'February', 2022, 'ECR/2015/000176'),
(NULL, 0, 'January', 2022, 'ECR/2015/000176'),
(NULL, 123, 'December', 2021, 'ECR/2015/000176'),
(NULL, 1000, 'January', 2018, 'ECR/2015/000176'),
(NULL, 0, 'February', 2018, 'ECR/2015/000176'),
(NULL, 0, 'May', 2018, 'ECR/2015/000176'),
(NULL, 0, 'June', 2018, 'ECR/2015/000176'),
(NULL, 130000, 'December', 2016, 'ECR/2015/000176'),
(NULL, 1230, 'February', 2017, 'ECR/2015/000176');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `sanc_key` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `interest` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `interest`
--

TRUNCATE TABLE `interest`;
--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`sanc_key`, `year`, `interest`) VALUES
('', 2016, 56301.00),
('ECR/2015/000176', 2016, 74577.54),
('ECR/2015/000176', 2017, 71952.00),
('ECR/2015/000176', 2016, 74577.54),
('ECR/2015/000176', 2016, 74577.54);

-- --------------------------------------------------------

--
-- Table structure for table `managedata`
--

CREATE TABLE `managedata` (
  `Sl_No` int(11) NOT NULL,
  `ProjSancAuth` varchar(50) NOT NULL,
  `Subagency` varchar(50) NOT NULL,
  `AddressSancAuth` varchar(50) NOT NULL,
  `ProjTitle` varchar(50) DEFAULT NULL,
  `Sancorderno` varchar(20) DEFAULT NULL,
  `SancDate` date DEFAULT NULL,
  `Dept` varchar(50) NOT NULL,
  `PrincInv` varchar(50) NOT NULL,
  `CoCord` varchar(50) NOT NULL,
  `Cost` decimal(10,0) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Dateofrec` date DEFAULT NULL,
  `Duration` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `managedata`
--

TRUNCATE TABLE `managedata`;
--
-- Dumping data for table `managedata`
--

INSERT INTO `managedata` (`Sl_No`, `ProjSancAuth`, `Subagency`, `AddressSancAuth`, `ProjTitle`, `Sancorderno`, `SancDate`, `Dept`, `PrincInv`, `CoCord`, `Cost`, `StartDate`, `EndDate`, `Dateofrec`, `Duration`, `Status`) VALUES
(1, 'MHRD', 'SERB', 'New Delhi', 'Unicellular Transfusions', 'MHRD1210/921', '2017-01-04', 'Chemistry', 'Dr.Ramakrsihna', 'Dr.Ramakrsihna', '100000', '2017-02-10', '2018-06-08', '2017-01-27', 5, 'Ongoing'),
(2, 'SERB', 'SERB', 'Vasant Square Mall, Vasant Kunj, New Delhi 110070', 'Optimal Damping of porous screen in Tunned Liquid ', 'ECR/2015/000176', '2016-08-05', 'Applied Mechanics and Hydraulics', 'Dr. Nasar Thuvanismail', 'Dr. Nasar Thuvanismail', '3267880', '2016-08-29', '2016-08-29', '2016-08-29', 3, 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `modify`
--

CREATE TABLE `modify` (
  `sanc_key` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `x` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `modify`
--

TRUNCATE TABLE `modify`;
--
-- Dumping data for table `modify`
--

INSERT INTO `modify` (`sanc_key`, `year`, `x`) VALUES
('ECR/2015/000176', 2022, 1),
('ECR/2015/000176', 2021, 1),
('ECR/2015/000176', 2016, 0),
('MHRD1210/921', 2017, 1),
('ECR/2015/000176', 2017, 1),
('ECR/2015/000176', 2018, 1),
('MHRD1210/921', 2016, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unallocated`
--

CREATE TABLE `unallocated` (
  `sanc_key` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `unallocated`
--

TRUNCATE TABLE `unallocated`;
--
-- Dumping data for table `unallocated`
--

INSERT INTO `unallocated` (`sanc_key`, `amount`) VALUES
('MHRD1210/921', -24560),
('ECR/2015/000176', 3030765);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `managedata`
--
ALTER TABLE `managedata`
  ADD PRIMARY KEY (`Sl_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
