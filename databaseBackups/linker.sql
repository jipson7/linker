-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2014 at 05:12 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `linker`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `skillsID` int(11) NOT NULL,
  `postal` varchar(6) NOT NULL,
  `deadline` varchar(10) NOT NULL,
  `creator` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `skillsID`, `postal`, `deadline`, `creator`) VALUES
(1, 'Website Project', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a justo euismod, ornare nisi a, aliquet diam. Etiam mattis cursus lobortis. Integer vel placerat magna, id congue enim. Vestibulum efficitur purus vel malesuada ullamcorper. Phasellus eleifend congue eros ac ornare. Sed non augue et nibh sagittis imperdiet in vitae nibh. Ut sed nunc sed ante molestie eleifend. Sed ultrices nulla id lacus malesuada, sed bibendum neque pretium. Nullam eget dolor ultrices, fermentum massa non, blandit sapien. Vestibulum et lobortis dui, ac molestie erat.', 1, 'K9H7T2', '12/31/2014', 'jipson'),
(2, 'Low Level Graphics', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin aliquam mauris, vitae cursus nisl elementum eget. Vivamus consectetur enim diam, non luctus felis placerat ut. In dapibus convallis nisl vulputate ullamcorper. Donec cursus tellus ac augue volutpat consectetur. Duis nunc mi, rutrum in consectetur eget, convallis sed risus. Morbi ipsum turpis, consequat vitae eleifend sit amet, scelerisque sed nibh. Donec pellentesque nibh tincidunt nisl placerat, non tempus justo laoreet.', 2, 'L1H7X3', '12/25/2014', 'jipson'),
(3, 'Game Engine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu malesuada neque. Fusce ipsum felis, facilisis sit amet aliquam in, vulputate et nisi. Sed vitae egestas enim. Donec a quam id nulla fringilla venenatis id ut est. Etiam lacinia tempus turpis, ut pretium tortor pulvinar in. Ut efficitur vestibulum tellus ac suscipit. Vestibulum gravida arcu eget velit consectetur, vitae consequat lectus tincidunt. Sed justo magna, mollis sed blandit sed, condimentum quis arcu. Duis finibus in nunc elementum consectetur. Fusce ut egestas purus. Phasellus viverra venenatis quam, id semper sem. Sed condimentum elementum mattis. Maecenas quis mollis odio, quis fermentum sem.', 3, 'P0A1C0', '12/25/2014', 'jipson'),
(4, 'iOS Application', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet diam ultrices, ultricies odio id, malesuada risus. Phasellus pharetra et lacus vel pellentesque. Curabitur iaculis libero diam, sed laoreet nulla aliquet nec. Mauris at molestie diam. Aenean ex mauris, condimentum in porta eget, imperdiet vitae enim. Phasellus ac cursus felis. Donec vulputate maximus elit, id auctor tortor aliquet sagittis. Etiam a consequat elit. Sed condimentum diam magna, at condimentum erat venenatis vitae. Maecenas tempus elit lorem, ac dictum nisl venenatis vel. Vestibulum et nisl turpis. Aenean consectetur arcu purus, vitae feugiat libero blandit at. In egestas mi et sapien pharetra rhoncus. Praesent facilisis, quam mattis iaculis consequat, nisl lacus aliquam lacus, ac ultrices nulla ante ac risus.', 4, 'K9H7T2', '12/25/2014', 'jipson');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
`id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `projectName` varchar(200) DEFAULT NULL,
  `actionscript` tinyint(4) NOT NULL DEFAULT '0',
  `assembly` tinyint(4) NOT NULL DEFAULT '0',
  `bash` tinyint(4) NOT NULL DEFAULT '0',
  `batch` tinyint(4) NOT NULL DEFAULT '0',
  `c` tinyint(4) NOT NULL DEFAULT '0',
  `cpp` tinyint(4) NOT NULL DEFAULT '0',
  `csharp` tinyint(4) NOT NULL DEFAULT '0',
  `cobol` tinyint(4) NOT NULL DEFAULT '0',
  `coffeescript` tinyint(4) NOT NULL DEFAULT '0',
  `css` tinyint(4) NOT NULL DEFAULT '0',
  `fortran` tinyint(4) NOT NULL DEFAULT '0',
  `go` tinyint(4) NOT NULL DEFAULT '0',
  `haskell` tinyint(4) NOT NULL DEFAULT '0',
  `html` tinyint(4) NOT NULL DEFAULT '0',
  `java` tinyint(4) NOT NULL DEFAULT '0',
  `javascript` tinyint(4) NOT NULL DEFAULT '0',
  `jquery` tinyint(4) NOT NULL DEFAULT '0',
  `lisp` tinyint(4) NOT NULL DEFAULT '0',
  `lua` tinyint(4) NOT NULL DEFAULT '0',
  `matlab` tinyint(4) NOT NULL DEFAULT '0',
  `objectivec` tinyint(4) NOT NULL DEFAULT '0',
  `pascal` tinyint(4) NOT NULL DEFAULT '0',
  `perl` tinyint(4) NOT NULL DEFAULT '0',
  `php` tinyint(4) NOT NULL DEFAULT '0',
  `python` tinyint(4) NOT NULL DEFAULT '0',
  `racket` tinyint(4) NOT NULL DEFAULT '0',
  `ruby` tinyint(4) NOT NULL DEFAULT '0',
  `swift` tinyint(4) NOT NULL DEFAULT '0',
  `visualbasic` tinyint(4) NOT NULL DEFAULT '0',
  `yql` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `username`, `projectName`, `actionscript`, `assembly`, `bash`, `batch`, `c`, `cpp`, `csharp`, `cobol`, `coffeescript`, `css`, `fortran`, `go`, `haskell`, `html`, `java`, `javascript`, `jquery`, `lisp`, `lua`, `matlab`, `objectivec`, `pascal`, `perl`, `php`, `python`, `racket`, `ruby`, `swift`, `visualbasic`, `yql`) VALUES
(1, NULL, 'Website Project', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(2, NULL, 'Low Level Graphics', 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, NULL, 'Game Engine', 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, NULL, 'iOS Application', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userInfo`
--

CREATE TABLE IF NOT EXISTS `userInfo` (
`id` int(11) NOT NULL,
  `accountDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `passHash` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `postal` varchar(6) NOT NULL,
  `province` varchar(2) NOT NULL,
  `email` varchar(200) NOT NULL,
  `emailConfirmed` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `userInfo`
--

INSERT INTO `userInfo` (`id`, `accountDate`, `firstName`, `lastName`, `username`, `password`, `passHash`, `city`, `postal`, `province`, `email`, `emailConfirmed`) VALUES
(28, '2014-12-02 21:27:12', 'Caleb', 'Phillips', 'jipson', 'testtest', '51abb9636078defbf888d8457a7c76f85c8f114c', 'Oshawa', 'K9H7T2', 'ON', 'caleb.phillips@uoit.net', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `projectName` (`projectName`);

--
-- Indexes for table `userInfo`
--
ALTER TABLE `userInfo`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `userInfo`
--
ALTER TABLE `userInfo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
