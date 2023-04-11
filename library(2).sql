-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 08:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookId` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `libraryUserId` int(11) NOT NULL,
  `isbn` varchar(100) DEFAULT NULL,
  `Deweydecimal` varchar(50) DEFAULT NULL,
  `bookprofile` varchar(100) NOT NULL,
  `bookTitle` varchar(100) NOT NULL,
  `bookSubject` varchar(100) NOT NULL,
  `bookAuthors` varchar(255) NOT NULL,
  `bookDescription` varchar(255) NOT NULL,
  `bookSource` varchar(100) NOT NULL,
  `bookPublisher` varchar(100) NOT NULL,
  `bookPlacePublisher` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `sectionID`, `libraryUserId`, `isbn`, `Deweydecimal`, `bookprofile`, `bookTitle`, `bookSubject`, `bookAuthors`, `bookDescription`, `bookSource`, `bookPublisher`, `bookPlacePublisher`) VALUES
(4, 40, 57, '0987654', '0000', 'sorceresstone.jpg', 'Harry Potter and The Sorceres Stone', 'MAjic Majic', 'Jk Rowling', 'Scholastic changed the name because they didnt believe American children would buy a book with the word Philosopher in the title and thought emphasizing it was about magic would help market the book', 'jhgjhgfd', 'jhgfcv bnmkjhugf', 'kjhgfdcvbnjkhgf'),
(5, 40, 57, '09876542', '0000', 'chamber (2).jpg', 'Harry Potter and the Chamber of Secrets', 'Magic Magic', 'Jk Rowling', 'the main conflict when Harry fights Tom Riddle the teenage Lord Voldemort They fight in the Chamber of Secrets which was opened by Ginny Weasley without she knowing it Ginny was controlled by Riddles diary in which he left a part of his soul', 'asdf', 'asd', 'asdf'),
(6, 40, 57, '1234445', '0000', 'order.jpg', 'Harry Potter and the order of the Phoenix', 'Majic Majic', 'Jk Rowling', 'Harry Ron and Hermione start teaching at Hogwarts training students in defensive spells to become part of the Army Draco Malfoy and other Slytherin students are then recruited by Umbridge to try to uncover the secretive group creating the Inquisitorial Sq', 'khgfdsdghjklhgfds', 'fgjhklhgfds', 'weww'),
(7, 40, 57, 'JHGF6789', '0000', 'azakaban.jpg', 'Harry Potter and the Prisoner of Azkaban', 'Magic Magic', 'JK Rowling', 'The film follows Harrys third year at Hogwarts and his quest to uncover the truth about his past including the connection recently escaped Azkaban prisoner Sirius Black has to Harry and his late parents With this film the Harry Potter series switched to a', 'ertyuiytr', 'asd', 'asasas'),
(8, 36, 57, 'HIJH876543', '0000', 'goblet.jpg', 'Harry Potter and the Goblet of Fire', 'Magic Magic', 'Jk Howling', 'The story follows his adventures and growing-up process major conflict Harry attempts to remain alive through the Triwizard Tournament and to discover, who submitted his name to the Goblet of Fire.', 'ewrtyuiytrew', 'www.cosmopolitan.com', 'ewrtyuiouytr'),
(11, 36, 57, 'KJHGF6789', '040', 'db2.png', 'DATA BASE 2', 'DSFSDF', 'FSDFSDF', 'SDFSDFSD', 'DSFSDFSD', 'FSDFSDFS', 'DFSDFSDF'),
(12, 36, 57, 'DB400000', '100', 'db4.png', 'Database 4', 'Advance Data Base', 'Maam Lucy', 'Advance Data BaseAdvance Data BaseAdvance Data BaseAdvance Data Base', 'ebook', 'ccs', 'ccs'),
(13, 40, 131, 'sb500', '170', 'db3.png', 'asasEthics', 'sas', 'sdasdasd', 'assdasdasd', 'dsdad', 'sadasdasd', 'sdsdsad');

-- --------------------------------------------------------

--
-- Table structure for table `borrowbook`
--

CREATE TABLE `borrowbook` (
  `borrowID` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `libraryspaceId` int(11) NOT NULL,
  `libraryUserId` int(11) NOT NULL,
  `BorrowPicture` varchar(100) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `status` varchar(30) DEFAULT 'wait for approval',
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowbook`
--

INSERT INTO `borrowbook` (`borrowID`, `bookId`, `libraryspaceId`, `libraryUserId`, `BorrowPicture`, `reason`, `status`, `date`) VALUES
(18, 4, 4, 132, 'db4.png', 'sasas', 'Approved', '2023-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `commentoncontents`
--

CREATE TABLE `commentoncontents` (
  `commentID` int(11) NOT NULL,
  `commentName` varchar(100) NOT NULL,
  `commentEmail` varchar(100) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `contID` int(11) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentoncontents`
--

INSERT INTO `commentoncontents` (`commentID`, `commentName`, `commentEmail`, `comment`, `contID`, `date`) VALUES
(24, 'sdsdasd', 'GT201900649@wmsu.edu.ph', 'sadasdsad', 10, 'Wednesday, March 29th 2023'),
(25, 'Fern', 'fernandoaragon117@yahoo.com', 'just a Test in a Cp', 10, 'Friday, April 7th 2023'),
(27, 'ff', 'fernandoaragon117@yahoo.com', 'xzxzxzxzx', 10, 'Saturday, April 8th 2023'),
(28, 'Fern', 'gt201900484@wmsu.edu.ph', 'Just a sample in cp nanaman', 12, 'Saturday, April 8th 2023'),
(31, 'hahayss', 'rexjohnlaurente@gmail.com', 'dsadasdasd', 10, 'Sunday, April 9th 2023');

-- --------------------------------------------------------

--
-- Table structure for table `contactusmessage`
--

CREATE TABLE `contactusmessage` (
  `cntmID` int(11) NOT NULL,
  `cntmFname` varchar(50) NOT NULL,
  `cntmEmail` varchar(50) NOT NULL,
  `cntmSubject` varchar(50) NOT NULL,
  `cntmMessage` varchar(5000) NOT NULL,
  `reply` varchar(5000) DEFAULT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` varchar(20) DEFAULT 'notseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactusmessage`
--

INSERT INTO `contactusmessage` (`cntmID`, `cntmFname`, `cntmEmail`, `cntmSubject`, `cntmMessage`, `reply`, `date`, `time`, `status`) VALUES
(18, 'sdsds', 'gt201900484@wmsu.edu.ph', 'dsadsadsadsads', 'sSDSD', 'fsdfsdfsdfddfgdfgdfgdfgdfgdfgfsss', 'Tuesday, April 4th 2', '1680569962', 'replied'),
(20, 'Jeus Golero', 'gt201900020@wmsu.edu.ph', 'Sample', 'dsadasdasdasdasdasd', 'Kosa man Jeus', 'Sunday, April 9th 20', '1681034628', 'replied'),
(21, 'asdasdas', 'gt201900484@wmsu.edu.ph', 'sdasdsd', 'asdasdasdsad', NULL, 'Sunday, April 9th 20', '1681042367', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `contID` int(11) NOT NULL,
  `contProfile` varchar(30) NOT NULL,
  `contTitle` varchar(50) NOT NULL,
  `contDesc` varchar(5000) NOT NULL,
  `contType` varchar(30) DEFAULT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`contID`, `contProfile`, `contTitle`, `contDesc`, `contType`, `date`) VALUES
(9, 'db1.png', 'Database 1', '<pre>DataBaseq</pre>', 'announcement', 'Wednesday, March 29t'),
(10, 'db2.png', 'A Relational Database For the Software Engineering', '<blockquote class=\"blockquote\">Relational Database</blockquote><table class=\"table table-bordered\"><tbody><tr><td>Data</td><td>Base</td><td>2</td></tr></tbody></table><p><br></p>', 'blogs', 'Wednesday, March 29t'),
(11, '450px-Aegon_on_Balerion.jpg', 'sdasdasd', '<blockquote class=\"blockquote\"><p>sdsdasd</p></blockquote><p style=\"text-align: center; \">asdasdasdasdasdasd</p><table class=\"table table-bordered\"><tbody><tr><td>as</td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td>a</td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td>a</td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td>a</td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td>a</td></tr></tbody></table><p><br></p>', 'blogs', 'Friday, April 7th 20'),
(12, '450px-Aegon_on_Balerion.jpg', 'dsdsad', '<blockquote class=\"blockquote\">dsfsasdasdasdsad</blockquote>', 'blogs', 'Friday, April 7th 20'),
(13, '450px-Aegon_on_Balerion.jpg', 'dsdasdasdasdasd', '<blockquote class=\"blockquote\"><p>sdsadasdasdasdasdsadsd</p></blockquote><table class=\"table table-bordered\"><tbody><tr><td>Name</td><td>sadasdas</td><td>sadasd</td><td>sdasdas</td><td>sdasdasd</td></tr></tbody></table><p><br></p>', 'announcement', 'Saturday, April 8th '),
(14, 'library.jpg', 'The Library', '<blockquote class=\"blockquote\"><span style=\"font-family: &quot;Arial Black&quot;;\">asdsadasdasdasdasdasdasdasdsad</span></blockquote><h3><span style=\"font-family: &quot;Arial Black&quot;;\">dfsdfsdfsdfsdfdfdsfsdf</span></h3>', 'announcement', 'Saturday, April 8th '),
(16, 'user.png', 'bjmbjbjkjkn', '<p>jjhnhbjhb</p>', 'blogs', 'Saturday, April 8th ');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `eventPic` varchar(200) NOT NULL,
  `eventName` varchar(100) NOT NULL,
  `eventDesc` varchar(2000) NOT NULL,
  `eventDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `eventPic`, `eventName`, `eventDesc`, `eventDate`) VALUES
(10, '450px-Aegon_on_Balerion.jpg', 'qwsqsaadasdasdasdasd', '<blockquote class=\"blockquote\"><p>Tommorow</p></blockquote><p><br></p><table class=\"table table-bordered\"><tbody><tr><td>1</td><td>2</td><td>3</td><td>4</td></tr></tbody></table><p><br></p>', '2023-04-10'),
(11, 'library.jpg', 'library Tour', '<h1>dsadasdasdasd</h1><pre>sdsadasdasdasdasdasd</pre>', '2023-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `external_info`
--

CREATE TABLE `external_info` (
  `externalID` int(10) NOT NULL,
  `siteTitle` varchar(255) NOT NULL,
  `about_us` varchar(5000) NOT NULL,
  `siteContact` varchar(15) NOT NULL,
  `siteEmail` varchar(50) DEFAULT NULL,
  `siteAddress` varchar(50) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `libraryUserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `external_info`
--

INSERT INTO `external_info` (`externalID`, `siteTitle`, `about_us`, `siteContact`, `siteEmail`, `siteAddress`, `date`, `libraryUserId`) VALUES
(1, 'Zamboanga City Library', 'Our library is a community-focused institution that is committed to providing high-quality resources and services to the people of Zamboanga City. We are dedicated to fostering a love for reading and learning, and we strive to empower individuals to reach their full potential through education and information. \r\n\r\n\r\nOur library has a rich collection of books, journals, magazines, and multimedia resources covering a wide range of topics, including history, literature, science, technology, and the arts resources with book and educational resources design to help young mind grow and develop.\r\n\r\nin addition to our collection we offer a variety of programs and services for all ages, such us story telling section, books , workshop and computer access, our knowledgeable and friendly staffs is always on hand to provide assistance and guidance to any one seeking information or looking for a good read\r\n\r\n', '9358250452', 'argonfernando453@gmail.com', 'Ja Gamboa Drive Putik', 'Thursday April 6th 2023', 57);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faqID` int(11) NOT NULL,
  `libraryUserId` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faqID`, `libraryUserId`, `title`, `description`, `date`) VALUES
(8, 57, 'faq1', 'faq1faq1faq1', 'Wednesday, February 22nd 2023'),
(9, 57, 'faq2', 'faq2faq2faq2faq2faq2faq2', 'Wednesday, February 22nd 2023'),
(10, 57, 'faq3', 'faq2faq2faq2faq2faq2', 'Wednesday, February 22nd 2023'),
(11, 57, 'faq2', 'faq2faq2faq2faq2faq2', 'Wednesday, February 22nd 2023');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `galleryID` int(11) NOT NULL,
  `galleryPic` varchar(100) DEFAULT NULL,
  `galleryTitle` varchar(100) DEFAULT NULL,
  `galleryDesc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`galleryID`, `galleryPic`, `galleryTitle`, `galleryDesc`) VALUES
(9, 'willian-justen-de-vasconcellos-Ti6HdLv04-c-unsplash.jpg', 'sdfghj', 'gfdsdfghjk');

-- --------------------------------------------------------

--
-- Table structure for table `libraryspace`
--

CREATE TABLE `libraryspace` (
  `libraryspaceId` int(11) NOT NULL,
  `libraryspacePic` varchar(100) NOT NULL,
  `libraryspaceName` varchar(100) NOT NULL,
  `libraryspaceLimit` int(11) NOT NULL,
  `libraryspaceDesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libraryspace`
--

INSERT INTO `libraryspace` (`libraryspaceId`, `libraryspacePic`, `libraryspaceName`, `libraryspaceLimit`, `libraryspaceDesc`) VALUES
(4, 'db4.png', 'Section 33', 14, ''),
(5, 'db4.png', 'dsdasd', 23, '');

-- --------------------------------------------------------

--
-- Table structure for table `libraryuser`
--

CREATE TABLE `libraryuser` (
  `libraryUserId` int(255) NOT NULL,
  `libraryUserpicture` varchar(100) DEFAULT 'user.png',
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `libraryUserFirtsName` varchar(50) DEFAULT 'update data',
  `libraryUserLastName` varchar(50) DEFAULT 'update data',
  `libraryUseAge` int(50) DEFAULT 0,
  `contactNumber` varchar(30) NOT NULL,
  `librarylocation` varchar(255) DEFAULT 'update data',
  `libraryUserRole` int(10) DEFAULT 3,
  `libraryUserCode` varchar(50) NOT NULL,
  `coderesetinteral` varchar(50) NOT NULL DEFAULT '0',
  `libraryUserStatus` varchar(50) NOT NULL,
  `availabiltyONOFF` varchar(30) NOT NULL DEFAULT 'offline',
  `flagsuspendedz` int(1) DEFAULT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libraryuser`
--

INSERT INTO `libraryuser` (`libraryUserId`, `libraryUserpicture`, `email`, `password`, `libraryUserFirtsName`, `libraryUserLastName`, `libraryUseAge`, `contactNumber`, `librarylocation`, `libraryUserRole`, `libraryUserCode`, `coderesetinteral`, `libraryUserStatus`, `availabiltyONOFF`, `flagsuspendedz`, `date`) VALUES
(57, 'aaaa.jpg', 'argonfernando453@gmail.com', '$2y$10$jAfjuajKOc.19s.RB1NfB.v9M/F8d7t3zYdY9c03gr4LvVSvTRl5K', 'Alexis', 'Aragon', 21, '09356787777', 'Tetuan Zamboanga City', 1, '0', '0', 'verified', 'online', 0, 'Monday February 20th 2023'),
(131, 'user.png', 'argonfernando@gmail.com', '$2y$10$j3H3IKjEW6RUVhA9buCVUORfNAptTW2MFUQVZvcugf3nOAKaqcvSy', 'sdfghjk', 'dfghjkl', 21, '09358250452', 'dfghjkl', 2, '0', '0', 'verified', 'offline', 0, ''),
(132, 'user.png', 'gt201900484@wmsu.edu.ph', '$2y$10$MPBE/fw8fKdG8L79PaQzS.NSwFMbUhoyruqgKpL.peELzohPvoyaG', 'asdadasd', 'sdasdasd', 21, '09358250452', 'xdxczxczxc', 3, '0', '0', 'verified', 'online', NULL, 'Monday, April 10th 2023');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notifID` int(11) NOT NULL,
  `noficationDetails` varchar(255) NOT NULL,
  `time` int(50) DEFAULT NULL,
  `destination` varchar(100) NOT NULL,
  `status` varchar(30) DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notifID`, `noficationDetails`, `time`, `destination`, `status`) VALUES
(159, 'You have new Reserve Book Request from <b>fern Aragon</b> Book Title  <b>DATA BASE 2</b>', 1681087388, 'borrow-overview-req.php?overview=88', 'read'),
(160, 'You have new Reserve Book Request from <b>fern Aragon</b> Book Title  <b>Harry Potter and the Prisoner of Azkaban</b>', 1681089049, 'borrow-overview-req.php?overview=89', 'read'),
(161, '<b>You have Newly Registered User for this day - Monday, April 10th 2023</b>', 1681095826, '', 'read'),
(162, 'You have new Reserve Book Request from <b>asdadasd sdasdasd</b> Book Title  <b>asasEthics</b>', 1681095901, 'borrow-overview-req.php?overview=90', 'read'),
(163, 'You have new On-site Book Request to Borrow from <b>asdadasd sdasdasd</b> Book Title  <b>Harry Potter and The Sorceres Stone</b>', 1681096066, 'borrow-overview-req-onsite.php?overview=18', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `resereID` int(11) NOT NULL,
  `libraryUserId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `validID` varchar(75) NOT NULL,
  `reason` varchar(5000) NOT NULL,
  `datestart` varchar(50) DEFAULT NULL,
  `dateend` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'wait for approval',
  `flag` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`resereID`, `libraryUserId`, `bookId`, `validID`, `reason`, `datestart`, `dateend`, `status`, `flag`) VALUES
(90, 132, 13, 'db1.png', 'zZZZ', '2023-04-10', '2023-04-13', 'Approved', '0');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionID` int(11) NOT NULL,
  `libraryUserId` int(11) NOT NULL,
  `Section_Name` varchar(100) NOT NULL,
  `Section_Desc` varchar(500) NOT NULL,
  `sectionProfile` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionID`, `libraryUserId`, `Section_Name`, `Section_Desc`, `sectionProfile`, `date`) VALUES
(36, 57, 'Astronomys', 'AstronomyAstronomyAstronomyAstronomyAstronomy\r\nAstronomyAstronomyAstronomyAstronomyAstronomy\r\nAstronomyAstronomyAstronomyAstronomyAstronomyjhgfdsa', 'aaaa.jpg', 'Wednesday, February 22nd 2023'),
(38, 57, 'Chemistry', 'ChemistryChemistryChemistryChemistryChemistry\r\nChemistryChemistryChemistryChemistryChemistry\r\nChemistryChemistryChemistryChemistryChemistry', 'aaaa.jpg', 'Wednesday, February 22nd 2023'),
(39, 57, 'Biology', 'SAERTY', 'aaaa.jpg', 'Thursday, February 23rd 2023'),
(40, 57, 'Fiction', 'kjhgfdsdfghjkkjhgfds ghguyg guyg uy gyuf yf yfyfi yf tyf', 'ORjn0.jpg', 'Monday, February 27th 2023'),
(41, 57, 'Metapsisic', 'wertyuioiytrewertyui', 'aaaa.jpg', 'Tuesday, March 7th 2023'),
(43, 131, 'Data Base1', 'dadasasas', 'db1.png', 'Monday, April 10th 2023');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `socialMediaID` int(10) NOT NULL,
  `iconLogo` varchar(100) NOT NULL,
  `iconLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`socialMediaID`, `iconLogo`, `iconLink`) VALUES
(6, 'fa-youtube', 'ASDFGHJUI'),
(9, 'fa-twitter', 'qsadfgthyjk'),
(11, 'fa-instagram', 'asdfghj'),
(16, 'fa-dribbble', 'jdsdfghj'),
(17, 'fa-facebook-f', ''),
(18, 'fa-pinterest', 'zxdfghjkl;lkjhgfdfghjk');

-- --------------------------------------------------------

--
-- Table structure for table `system_core`
--

CREATE TABLE `system_core` (
  `coreID` int(11) NOT NULL,
  `smtppassword` varchar(50) NOT NULL,
  `smtphost` varchar(50) NOT NULL,
  `chatbotmsg` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_core`
--

INSERT INTO `system_core` (`coreID`, `smtppassword`, `smtphost`, `chatbotmsg`) VALUES
(1, 'rxeixtvwkzagyysc', 'smtp.gmail.com', '<img src=\"http://localhost/samapleSE2/assets/images/alluserprofiles/aaaa.jpg\" width=\"50px\" height=\"50px\" > ');

-- --------------------------------------------------------

--
-- Table structure for table `timeflag`
--

CREATE TABLE `timeflag` (
  `timeflagID` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`,`sectionID`,`libraryUserId`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `fksection` (`sectionID`),
  ADD KEY `fkuser` (`libraryUserId`);

--
-- Indexes for table `borrowbook`
--
ALTER TABLE `borrowbook`
  ADD PRIMARY KEY (`borrowID`,`bookId`,`libraryUserId`,`libraryspaceId`),
  ADD KEY `fkBorrowBook` (`bookId`),
  ADD KEY `fkBorrowBook1` (`libraryUserId`),
  ADD KEY `fkBorrowBook2` (`libraryspaceId`);

--
-- Indexes for table `commentoncontents`
--
ALTER TABLE `commentoncontents`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `fghj` (`contID`);

--
-- Indexes for table `contactusmessage`
--
ALTER TABLE `contactusmessage`
  ADD PRIMARY KEY (`cntmID`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`contID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `external_info`
--
ALTER TABLE `external_info`
  ADD PRIMARY KEY (`externalID`),
  ADD KEY `fkuserID` (`libraryUserId`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faqID`,`libraryUserId`),
  ADD KEY `fkUserToFaq` (`libraryUserId`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`galleryID`);

--
-- Indexes for table `libraryspace`
--
ALTER TABLE `libraryspace`
  ADD PRIMARY KEY (`libraryspaceId`);

--
-- Indexes for table `libraryuser`
--
ALTER TABLE `libraryuser`
  ADD PRIMARY KEY (`libraryUserId`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notifID`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`resereID`,`libraryUserId`,`bookId`),
  ADD KEY `libraryUserId` (`libraryUserId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionID`,`libraryUserId`),
  ADD KEY `fkSec` (`libraryUserId`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`socialMediaID`);

--
-- Indexes for table `system_core`
--
ALTER TABLE `system_core`
  ADD PRIMARY KEY (`coreID`);

--
-- Indexes for table `timeflag`
--
ALTER TABLE `timeflag`
  ADD PRIMARY KEY (`timeflagID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `borrowbook`
--
ALTER TABLE `borrowbook`
  MODIFY `borrowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `commentoncontents`
--
ALTER TABLE `commentoncontents`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contactusmessage`
--
ALTER TABLE `contactusmessage`
  MODIFY `cntmID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `contID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `external_info`
--
ALTER TABLE `external_info`
  MODIFY `externalID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `libraryspace`
--
ALTER TABLE `libraryspace`
  MODIFY `libraryspaceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `libraryuser`
--
ALTER TABLE `libraryuser`
  MODIFY `libraryUserId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notifID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `resereID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `socialMediaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fksection` FOREIGN KEY (`sectionID`) REFERENCES `section` (`sectionID`),
  ADD CONSTRAINT `fkuser` FOREIGN KEY (`libraryUserId`) REFERENCES `libraryuser` (`libraryUserId`);

--
-- Constraints for table `borrowbook`
--
ALTER TABLE `borrowbook`
  ADD CONSTRAINT `fkBorrowBook` FOREIGN KEY (`bookId`) REFERENCES `books` (`bookId`),
  ADD CONSTRAINT `fkBorrowBook1` FOREIGN KEY (`libraryUserId`) REFERENCES `libraryuser` (`libraryUserId`) ON DELETE CASCADE,
  ADD CONSTRAINT `fkBorrowBook2` FOREIGN KEY (`libraryspaceId`) REFERENCES `libraryspace` (`libraryspaceId`);

--
-- Constraints for table `commentoncontents`
--
ALTER TABLE `commentoncontents`
  ADD CONSTRAINT `commentoncontents_ibfk_1` FOREIGN KEY (`contID`) REFERENCES `contents` (`contID`) ON DELETE CASCADE;

--
-- Constraints for table `external_info`
--
ALTER TABLE `external_info`
  ADD CONSTRAINT `fkuserID` FOREIGN KEY (`libraryUserId`) REFERENCES `libraryuser` (`libraryUserId`);

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `fkUserToFaq` FOREIGN KEY (`libraryUserId`) REFERENCES `libraryuser` (`libraryUserId`);

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`libraryUserId`) REFERENCES `libraryuser` (`libraryUserId`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserve_ibfk_3` FOREIGN KEY (`bookId`) REFERENCES `books` (`bookId`) ON DELETE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `fkSec` FOREIGN KEY (`libraryUserId`) REFERENCES `libraryuser` (`libraryUserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
