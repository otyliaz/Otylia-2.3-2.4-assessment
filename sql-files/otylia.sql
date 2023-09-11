-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 11:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otylia`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `idlanguage` int(11) NOT NULL,
  `language` varchar(45) DEFAULT NULL,
  `family` varchar(45) DEFAULT NULL,
  `sub-family` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`idlanguage`, `language`, `family`, `sub-family`) VALUES
(1, 'English', 'Indo-European', 'Germanic'),
(2, 'Spanish', 'Indo-European', 'Romance'),
(3, 'Chinese (Mandarin)', 'Sino-Tibetan', 'Sinitic'),
(4, 'Hindi', 'Indo-European', 'Indo-Aryan'),
(5, 'Arabic', 'Afro-Asiatic', 'Semitic'),
(6, 'Bengali', 'Indo-European', 'Indo-Aryan'),
(7, 'Russian', 'Indo-European', 'Slavic'),
(8, 'Japanese', 'Japonic', 'Japanese'),
(9, 'Punjabi', 'Indo-European', 'Indo-Aryan'),
(10, 'German', 'Indo-European', 'Germanic'),
(11, 'French', 'Indo-European', 'Romance'),
(12, 'Italian', 'Indo-European', 'Romance'),
(13, 'Korean', 'Koreanic', 'Korean'),
(14, 'Portuguese', 'Indo-European', 'Romance'),
(15, 'Swahili', 'Niger-Congo', 'Bantu'),
(16, 'Turkish', 'Turkic', 'Oghuz'),
(17, 'Dutch', 'Indo-European', 'Germanic'),
(18, 'Vietnamese', 'Austroasiatic', 'Vietic'),
(19, 'Tamil', 'Dravidian', 'Southern'),
(20, 'Urdu', 'Indo-European', 'Indo-Aryan'),
(21, 'Indonesian', 'Austronesian', 'Malayo-Polynesian'),
(22, 'Polish', 'Indo-European', 'Slavic'),
(23, 'Thai', 'Kra-Dai', 'Tai'),
(24, 'Persian', 'Indo-European', 'Iranian'),
(25, 'Swedish', 'Indo-European', 'Germanic'),
(26, 'Danish', 'Indo-European', 'Germanic'),
(27, 'Greek', 'Indo-European', 'Hellenic'),
(28, 'Finnish', 'Uralic', 'Finnic'),
(29, 'Czech', 'Indo-European', 'Slavic'),
(30, 'Romanian', 'Indo-European', 'Romance'),
(31, 'Hungarian', 'Uralic', 'Ugric'),
(32, 'Norwegian', 'Indo-European', 'Germanic'),
(33, 'Slovak', 'Indo-European', 'Slavic'),
(34, 'Hebrew', 'Afro-Asiatic', 'Semitic'),
(35, 'Malay', 'Austronesian', 'Malayo-Polynesian'),
(37, 'Slovenian', 'Indo-European', 'Slavic'),
(38, 'Bulgarian', 'Indo-European', 'Slavic'),
(39, 'Lithuanian', 'Indo-European', 'Balto-Slavic'),
(40, 'Catalan', 'Indo-European', 'Romance'),
(41, 'Georgian', 'Kartvelian', 'Georgian'),
(42, 'Lao', 'Kra-Dai', 'Tai'),
(43, 'Serbian', 'Indo-European', 'Slavic'),
(44, 'Albanian', 'Indo-European', 'Albanian'),
(45, 'Sinhala', 'Indo-European', 'Indo-Aryan'),
(46, 'Estonian', 'Uralic', 'Finnic'),
(47, 'Latvian', 'Indo-European', 'Balto-Slavic'),
(48, 'Javanese', 'Austronesian', 'Malayo-Polynesian'),
(49, 'Armenian', 'Indo-European', 'Armenian'),
(50, 'Afrikaans', 'Indo-European', 'Germanic'),
(51, 'Haitian Creole', 'Creole', 'French'),
(52, 'Icelandic', 'Indo-European', 'Germanic'),
(53, 'Zulu', 'Niger-Congo', 'Bantu'),
(54, 'Yoruba', 'Niger-Congo', 'Volta-Niger'),
(55, 'Amharic', 'Afro-Asiatic', 'Semitic'),
(56, 'Nepali', 'Indo-European', 'Indo-Aryan'),
(57, 'Tagalog (Filipino)', 'Austronesian', 'Malayo-Polynesian'),
(58, 'Serbo-Croatian (Bosnian-Montenegrin)', 'Indo-European', 'Slavic'),
(59, 'Chinese (Cantonese)', 'Sino-Tibetan', 'Sinitic'),
(60, 'Basque', 'Basque', 'Basque');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `idlist` int(11) NOT NULL,
  `listname` varchar(255) NOT NULL,
  `iduser_lang` int(11) DEFAULT NULL,
  `level` varchar(64) NOT NULL,
  `public` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`idlist`, `listname`, `iduser_lang`, `level`, `public`) VALUES
(14, 'canto on top 哈哈', 25, 'Advanced', 0),
(28, 'English greetings for beginners', 32, 'Beginner', 1),
(29, 'More information', 32, 'Intermediate', 1),
(30, 'A third series', 32, 'Advanced', 1),
(34, 'My personal list', 32, 'Intermediate', 0),
(38, 'gamer99', 36, 'Beginner', 0),
(39, 'ssh', 36, 'Beginner', 0),
(40, 'mynewaccount', 36, 'Beginner', 1),
(46, 'NCEA level 2 French', 46, 'Intermediate', 1),
(48, 'y\'all', 26, 'Beginner', 0),
(49, 'common arabic verbs', 38, 'Beginner', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`) VALUES
(24, 'gamer99', '0be64ae89ddd24e225434de95d501711339baeee18f009ba9b4369af27d30d60'),
(26, 'hello', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
(28, 'newuser', 'f054de55473411a291521b0212c8e0001f360314d21758ae2d747423d470eace'),
(30, 'mynewaccount', 'c908c58052d9285deb2a5f915541891c5665eb7ebe7165cefda69d3e85497d01'),
(32, 'test123', '6fec2a9601d5b3581c94f2150fc07fa3d6e45808079428354b868e412b76e6bb'),
(33, '&&&&&&&ti', 'd12372ee0eebf5a50a9c4203bccb6a3412bb364c23b7ec4d29aabbead64c6b28'),
(34, 'solkim', '3461a7dc6c7d6fd1d3dbfef9719db5ea2389c2f2772f1ccab1b2329e522f71e6'),
(35, 'ddddddddddd\'', '4b179810791a19af3bfeafbdcf0aca274d9ac7d5f063b8e0b75189360c0cf3a3');

-- --------------------------------------------------------

--
-- Table structure for table `user_languages`
--

CREATE TABLE `user_languages` (
  `iduser_lang` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idlanguage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_languages`
--

INSERT INTO `user_languages` (`iduser_lang`, `iduser`, `idlanguage`) VALUES
(25, 24, 59),
(26, 24, 40),
(28, 24, 9),
(29, 26, 34),
(32, 24, 1),
(33, 26, 1),
(36, 33, 5),
(37, 33, 18),
(38, 32, 5),
(41, 24, 13),
(43, 34, 21),
(44, 24, 60),
(45, 24, 12),
(46, 24, 11),
(47, 32, 11),
(48, 32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vocab`
--

CREATE TABLE `vocab` (
  `idword` int(11) NOT NULL,
  `idlist` int(11) DEFAULT NULL,
  `wordTL` varchar(255) NOT NULL,
  `translation` varchar(255) NOT NULL,
  `pronunciation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vocab`
--

INSERT INTO `vocab` (`idword`, `idlist`, `wordTL`, `translation`, `pronunciation`) VALUES
(29, 46, 'à propos de', 'it\'s about...', ''),
(30, 46, 'annuler', 'to cancel', '/a.ny.le/'),
(31, 46, 'avertir', 'warn', '/a.vɛʁ.tiʁ/'),
(32, 49, 'يأكل', 'to eat', 'ya\'akul'),
(33, 49, 'يعرف', 'to know', 'ya\'aref'),
(34, 49, 'يكتب', 'to write', 'yaktob'),
(35, 48, 'bon día', 'good morning', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`idlanguage`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`idlist`),
  ADD KEY `iduser_lang` (`iduser_lang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `user_languages`
--
ALTER TABLE `user_languages`
  ADD PRIMARY KEY (`iduser_lang`),
  ADD KEY `iduser_idx` (`iduser`),
  ADD KEY `idlanguage_idx` (`idlanguage`);

--
-- Indexes for table `vocab`
--
ALTER TABLE `vocab`
  ADD PRIMARY KEY (`idword`),
  ADD KEY `idlist` (`idlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `idlanguage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `idlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_languages`
--
ALTER TABLE `user_languages`
  MODIFY `iduser_lang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `vocab`
--
ALTER TABLE `vocab`
  MODIFY `idword` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`iduser_lang`) REFERENCES `user_languages` (`iduser_lang`),
  ADD CONSTRAINT `lists_ibfk_2` FOREIGN KEY (`iduser_lang`) REFERENCES `user_languages` (`iduser_lang`) ON DELETE CASCADE;

--
-- Constraints for table `user_languages`
--
ALTER TABLE `user_languages`
  ADD CONSTRAINT `idlanguage` FOREIGN KEY (`idlanguage`) REFERENCES `languages` (`idlanguage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iduser` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_languages_ibfk_1` FOREIGN KEY (`idlanguage`) REFERENCES `languages` (`idlanguage`) ON DELETE CASCADE;

--
-- Constraints for table `vocab`
--
ALTER TABLE `vocab`
  ADD CONSTRAINT `vocab_ibfk_1` FOREIGN KEY (`idlist`) REFERENCES `lists` (`idlist`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
