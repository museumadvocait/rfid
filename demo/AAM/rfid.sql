-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2014 at 02:00 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `aggregation_arduino1`
--

CREATE TABLE IF NOT EXISTS `aggregation_arduino1` (
  `rfid_tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aggregation_arduino1_log`
--

CREATE TABLE IF NOT EXISTS `aggregation_arduino1_log` (
  `unix_timestamp` bigint(20) NOT NULL,
  `line` text NOT NULL,
  `rfid_tag` text NOT NULL,
  `arduino` bigint(20) NOT NULL,
  `repeat` bigint(20) NOT NULL,
  `arduino_timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aggregation_arduino2`
--

CREATE TABLE IF NOT EXISTS `aggregation_arduino2` (
  `rfid_tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aggregation_arduino2_log`
--

CREATE TABLE IF NOT EXISTS `aggregation_arduino2_log` (
  `unix_timestamp` bigint(20) NOT NULL,
  `line` text NOT NULL,
  `rfid_tag` text NOT NULL,
  `arduino` bigint(20) NOT NULL,
  `repeat` bigint(20) NOT NULL,
  `arduino_timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `arduino1_aggregation`
--

CREATE TABLE IF NOT EXISTS `arduino1_aggregation` (
  `value` text NOT NULL,
  `text` text NOT NULL,
  `aggregated_text` text NOT NULL,
  `visitor` text NOT NULL,
  `visit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `arduino2_aggregation`
--

CREATE TABLE IF NOT EXISTS `arduino2_aggregation` (
  `value` text NOT NULL,
  `text` text NOT NULL,
  `aggregated_text` text NOT NULL,
  `visitor` text NOT NULL,
  `visit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_arduino1`
--

CREATE TABLE IF NOT EXISTS `content_arduino1` (
  `ID` text NOT NULL,
  `value` text NOT NULL,
  `language` text NOT NULL,
  `text` text NOT NULL,
  `aggregated_text` text NOT NULL,
  `visitor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_arduino1`
--

INSERT INTO `content_arduino1` (`ID`, `value`, `language`, `text`, `aggregated_text`, `visitor`) VALUES
('B1', '0C00319AFB5C', 'English', 'The colors of this shawl are traditional in clothing from El Salvador.', 'Notice the distinctly darker shades of the colors in this shawl from Nicaragua, compared to the dress from Guatemala. The difference in dye color is due to each country''s unique vegetation. \r\n', 'Visitor1'),
('B2', '0C004745E6E8', 'Spanish', 'Los colores de este chal son tradicionales en la ropa de El Salvador.', 'Observe los tonos claramente más oscuras de los colores en este mantón de Nicaragua, en comparación con el vestido de Guatemala. La diferencia en el color de tinte se debe a la vegetación única de cada país.', 'Visitor2'),
('R1', '10002144F782', 'German', 'Die Farben dieses Schal sind im traditionellen Kleidung aus El Salvador.', 'Beachten Sie die deutlich dunkleren Schattierungen der Farben in dieser Schal aus Nicaragua, im Vergleich zu dem Kleid aus Guatemala. Der Unterschied in der Farbstoff-Farbe ist auf einzigartige Vegetation des jeweiligen Landes.', 'Visitor3'),
('R2', '100021574523', 'Italian', 'I colori di questa scialle sono tradizionali in vestiti da El Salvador.', 'Notate le tonalità nettamente più scure dei colori di questa scialle dal Nicaragua, rispetto al vestito dal Guatemala. La differenza di colore della tintura è dovuto alla vegetazione unica di ciascun paese.', 'Visitor4'),
('Y1', '0F002D84BD1B', 'French', 'Les couleurs de ce châle sont traditionnels dans les vêtements de El Salvador.', 'Remarquez les nuances nettement plus sombres des couleurs dans ce châle du Nicaragua, par rapport à la robe de Guatemala. La différence de couleur de teinture est dû à la végétation unique de chaque pays.', 'Visitor5'),
('Y2', '0F00305F1777', 'Portuguese', 'As cores deste xale são tradicionais em roupas de El Salvador.', 'Observe os tons mais escuros distintamente das cores neste xale da Nicarágua, em comparação com o vestido da Guatemala. A diferença na cor da tintura é devido a vegetação única de cada país.', 'Visitor6'),
('P1', '0D001EFE967B', 'Default', 'The colors of this shawl are traditional in clothing from El Salvador.', 'Notice the distinctly darker shades of the colors in this shawl from Nicaragua, compared to the dress from Guatemala. The difference in dye color is due to each country''s unique vegetation. ', '-');

-- --------------------------------------------------------

--
-- Table structure for table `content_arduino2`
--

CREATE TABLE IF NOT EXISTS `content_arduino2` (
  `ID` text NOT NULL,
  `value` text NOT NULL,
  `language` text NOT NULL,
  `text` text NOT NULL,
  `aggregated_text` text NOT NULL,
  `visitor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_arduino2`
--

INSERT INTO `content_arduino2` (`ID`, `value`, `language`, `text`, `aggregated_text`, `visitor`) VALUES
('B1', '0C00319AFB5C', 'English', 'The colors of this dress are traditional in Guatemalan clothing.', 'Notice the distinctly darker shades of the colors in this shawl from Nicaragua, compared to the dress from Guatemala. The difference in dye color is due to each country''s unique vegetation. \r\n', 'Visitor1'),
('B2', '0C004745E6E8', 'Spanish', 'Los colores de este vestido son tradicionales en prendas de vestir de Guatemala.', 'Observe los tonos claramente más oscuras de los colores en este mantón de Nicaragua, en comparación con el vestido de Guatemala. La diferencia en el color de tinte se debe a la vegetación única de cada país.', 'Visitor2'),
('R1', '10002144F782', 'German', 'Die Farben des Kleides sind in guatemaltekischen traditionellen Kleidung.', 'Beachten Sie die deutlich dunkleren Schattierungen der Farben in dieser Schal aus Nicaragua, im Vergleich zu dem Kleid aus Guatemala. Der Unterschied in der Farbstoff-Farbe ist auf einzigartige Vegetation des jeweiligen Landes.', 'Visitor3'),
('R2', '100021574523', 'Italian', 'I colori di questo vestito sono tradizionali in vestiti guatemalteco.', 'Notate le tonalità nettamente più scure dei colori di questa scialle dal Nicaragua, rispetto al vestito dal Guatemala. La differenza di colore della tintura è dovuto alla vegetazione unica di ciascun paese.', 'Visitor4'),
('Y1', '0F002D84BD1B', 'French', 'Les couleurs de cette robe sont traditionnels dans les vêtements guatémaltèque.', 'Remarquez les nuances nettement plus sombres des couleurs dans ce châle du Nicaragua, par rapport à la robe de Guatemala. La différence de couleur de teinture est dû à la végétation unique de chaque pays.', 'Visitor5'),
('Y2', '0F00305F1777', 'Portuguese', 'As cores deste vestido são tradicionais em roupas da Guatemala.', 'Observe os tons mais escuros distintamente das cores neste xale da Nicarágua, em comparação com o vestido da Guatemala. A diferença na cor da tintura é devido a vegetação única de cada país.', 'Visitor6'),
('P1', '0D001EFE967B', 'Default', 'The colors of this dress are traditional in Guatemalan clothing.', 'Notice the distinctly darker shades of the colors in this shawl from Nicaragua, compared to the dress from Guatemala. The difference in dye color is due to each country''s unique vegetation. ', '-');

-- --------------------------------------------------------

--
-- Table structure for table `language_arduino1`
--

CREATE TABLE IF NOT EXISTS `language_arduino1` (
  `unix_timestamp` bigint(20) NOT NULL,
  `line` text NOT NULL,
  `rfid_tag` text NOT NULL,
  `arduino` bigint(20) NOT NULL,
  `repeat` bigint(20) NOT NULL,
  `arduino_timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `language_arduino2`
--

CREATE TABLE IF NOT EXISTS `language_arduino2` (
  `unix_timestamp` bigint(20) NOT NULL,
  `line` text NOT NULL,
  `rfid_tag` text NOT NULL,
  `arduino` bigint(20) NOT NULL,
  `repeat` bigint(20) NOT NULL,
  `arduino_timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `unix_timestamp` bigint(20) NOT NULL,
  `line` text NOT NULL,
  `rfid_tag` text NOT NULL,
  `arduino` bigint(20) NOT NULL,
  `repeat` bigint(20) NOT NULL,
  `arduino_timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_arduino1`
--

CREATE TABLE IF NOT EXISTS `log_arduino1` (
  `unix_timestamp` bigint(20) NOT NULL,
  `line` text NOT NULL,
  `rfid_tag` text NOT NULL,
  `arduino` bigint(20) NOT NULL,
  `repeat` bigint(20) NOT NULL,
  `arduino_timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_arduino2`
--

CREATE TABLE IF NOT EXISTS `log_arduino2` (
  `unix_timestamp` bigint(20) NOT NULL,
  `line` text NOT NULL,
  `rfid_tag` text NOT NULL,
  `arduino` bigint(20) NOT NULL,
  `repeat` bigint(20) NOT NULL,
  `arduino_timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
