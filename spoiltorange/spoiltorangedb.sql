-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 12:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spoiltorange`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `b_seats` int(11) NOT NULL,
  `b_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `c_id`, `s_id`, `m_id`, `b_seats`, `b_amt`) VALUES
(51, 1, 9, 14, 6, 720);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_phno` bigint(10) NOT NULL,
  `c_pwd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_email`, `c_phno`, `c_pwd`) VALUES
(0, 'admin', 'admin@gmail.com', 12345, 'admin'),
(1, '  Nupur Shenoy', 'nupur@gmail.com', 1234567890, 'asd'),
(2, ' Spoorthi Udupa', 'spoo@gmail.com', 6364671405, 'asd'),
(5, 'Astra Pinto', 'astra@gmail.com', 9765798590, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_genre` varchar(50) NOT NULL,
  `m_director` varchar(50) NOT NULL,
  `m_duration` varchar(50) NOT NULL,
  `m_language` varchar(50) NOT NULL,
  `m_description` varchar(5000) NOT NULL,
  `m_rdate` date NOT NULL,
  `m_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`m_id`, `m_name`, `m_genre`, `m_director`, `m_duration`, `m_language`, `m_description`, `m_rdate`, `m_img`) VALUES
(7, 'The Matrix: Resurrection', 'Action', 'Lana Wachowski', '90 mins', 'English', 'To find out if his reality is a physical or mental construct, Mr. Anderson, aka Neo, will have to choose to follow the white rabbit once more. If he\'s learned anything, it\'s that choice, while an illusion, is still the only way out of -- or into -- the Matrix. ', '2021-12-24', 'matrix.jpg'),
(8, '83', 'Family', 'Kabir Khan', '150 mins', 'Hindi', 'On June 25, 1983, the Lord\'s Cricket Ground witnessed 14 men beat the twice over World Champions West Indies, putting India back onto the cricket world stage.', '2021-12-31', '83.jpg'),
(13, 'Spiderman: No Way Home', 'Action', 'Jon Watts', '150 mins', 'English', 'When Peter asks for help from Doctor Strange, the stakes become even more dangerous, forcing him to discover what it truly means to be Spider-Man.', '2021-12-17', 'spidey.jpg'),
(14, 'Shang-Chi', 'Action', 'Destin Daniel Cretton', '120 mins', 'English', 'Martial-arts master Shang-Chi confronts the past he thought he left behind when he\'s drawn into the web of the mysterious Ten Rings organization.', '2021-12-09', 'shangchi.jpg'),
(15, 'Dia', 'Romance', 'K. S. Ashok', '90 mins', 'Kannada', 'Dia takes three years to confess her feelings to Rohith but after a terrible accident, she is told he does not survive. Later, when she starts seeing Adi, she finds out that Rohith is still alive.', '2020-12-07', 'dia.jpg'),
(16, 'Shershaah', 'Action', 'Vishnuvardhan', '120 mins', 'Hindi', 'Vikram Batra, a young man, dreams of becoming a soldier and falls in love with Dimple. Soon after his training, he climbs the military ranks and contributes to India\'s victory in the Kargil war.', '2021-12-08', 'shershaah.jpg'),
(17, 'Love Mocktail', 'Romance', 'Darling Krishna', '150 mins', 'Kannada', 'After rescuing a woman, Adi reminisces about his love life and tells her about all the heartbreaks he endured in his quest to find his true love.', '2020-02-01', 'lovemocktail.jpg'),
(18, 'Bell Bottom', 'Family', 'Ranjit Tiwari', '110 mins', 'Hindi', 'An undercover agent code-named Bellbottom embarks on a covert mission to free 210 hostages held by hijackers.', '2021-12-08', 'bellbottom.jpg'),
(19, 'A Quiet Place 2', 'Action', ' John Krasinski', '90 mins', 'English', 'In a post-apocalyptic world, Regan and her family learn that the alien predators can be defeated using high-frequency audio. Armed with this knowledge, they then set out to look for other survivors.', '2021-02-03', 'quietplace2.jpg'),
(20, 'ABCD 2', 'Family', 'Remo D\'Souza', '150 mins', 'Hindi', 'Suresh and Vinnie are childhood friends who are passionate about dancing. They form a dance group but face many hurdles to participate in the Las Vegas dancing competition.', '2021-12-07', 'abcd2.jpg'),
(21, 'KGF', 'Action', ' Prashanth Neel', '150 mins', 'Kannada', 'Rocky, a young man, seeks power and wealth in order to fulfil a promise to his dying mother. His quest takes him to Mumbai, where he gets involved with the notorious gold mafia.', '2020-02-05', 'kgf.jpg'),
(23, 'Mimi', 'Family', '  Laxman Utekar', '120 mins', 'Hindi', 'Harbouring big dreams but not the means to achieve them, a woman reluctantly agrees to become a surrogate for a couple. However, when problems begin to crop up, she must face some tough decisions.\r\n', '2021-02-10', 'mimi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `s_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `s_date` date NOT NULL,
  `s_time` time NOT NULL,
  `s_screenno` int(11) NOT NULL,
  `s_cinema` varchar(5) NOT NULL,
  `s_price` int(11) NOT NULL,
  `s_capacity` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`s_id`, `m_id`, `s_date`, `s_time`, `s_screenno`, `s_cinema`, `s_price`, `s_capacity`) VALUES
(1, 13, '2021-12-31', '22:00:00', 3, '3D', 120, 100),
(2, 13, '2021-12-30', '17:30:00', 2, '3D', 110, 100),
(3, 13, '2021-12-29', '14:00:00', 3, '3D', 100, 100),
(4, 13, '2022-01-01', '19:00:00', 3, '3D', 100, 100),
(5, 8, '2022-01-06', '19:30:00', 1, '2D', 120, 100),
(6, 7, '2022-01-02', '10:00:00', 2, '2D', 120, 100),
(7, 7, '2022-01-04', '18:00:00', 3, '2D', 120, 100),
(8, 8, '2022-01-06', '15:00:00', 1, '2D', 110, 100),
(9, 14, '2022-01-12', '11:00:00', 2, '3D', 120, 94),
(10, 14, '2021-12-31', '16:00:00', 3, '3D', 120, 100),
(11, 15, '2021-12-30', '14:00:00', 2, '2D', 110, 100),
(12, 15, '2022-01-12', '19:00:00', 2, '2D', 110, 100),
(13, 16, '2022-01-02', '19:00:00', 2, '2D', 120, 100),
(14, 16, '2022-01-04', '15:00:00', 2, '2D', 120, 100),
(15, 17, '2022-01-02', '17:00:00', 1, '2D', 110, 100),
(16, 18, '2022-01-12', '16:00:00', 3, '2D', 110, 100),
(17, 19, '2022-01-01', '14:00:00', 1, '2D', 100, 100),
(18, 20, '2021-01-06', '10:00:00', 2, '2D', 110, 100),
(19, 21, '2022-01-12', '15:00:00', 2, '2D', 100, 100),
(20, 22, '2022-01-30', '17:30:00', 3, '2D', 80, 100),
(21, 23, '2021-01-20', '17:00:00', 2, '2D', 120, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
