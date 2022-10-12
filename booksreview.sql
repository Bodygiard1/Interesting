-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2022 at 02:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booksreview`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookdetail`
--

CREATE TABLE `bookdetail` (
  `bookID` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `publicationYear` int(4) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `ISBN` int(15) NOT NULL,
  `review` text NOT NULL,
  `amazonLink` text NOT NULL,
  `imageLink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookdetail`
--

INSERT INTO `bookdetail` (`bookID`, `title`, `author`, `publisher`, `publicationYear`, `subject`, `ISBN`, `review`, `amazonLink`, `imageLink`) VALUES
(1, 'Rock-a-Bye Rumpus: Action Rhymes for the Very Young', 'Sebastien Braun', 'Macmillan Childrens Books', 2022, 'Children Book', 1529027950, '', 'https://www.amazon.co.uk/Rock-Bye-Rumpus-Julia-Donaldson/dp/1529027950?ref_=Oct_d_omwf_d_266239&pd_rd_w=Pu415&content-id=amzn1.sym.11754b59-9e76-41e6-af29-c04f39ce138f&pf_rd_p=11754b59-9e76-41e6-af29-c04f39ce138f&pf_rd_r=CKMK8ZAX8X2P279FS2T4&pd_rd_wg=mBr1Z&pd_rd_r=3da33876-7eaf-4f69-ae04-c0548c39a7c4&pd_rd_i=1529027950', '51toP7X+39L._SX258_BO1,204,203,200_.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookdetail`
--
ALTER TABLE `bookdetail`
  ADD PRIMARY KEY (`bookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookdetail`
--
ALTER TABLE `bookdetail`
  MODIFY `bookID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
