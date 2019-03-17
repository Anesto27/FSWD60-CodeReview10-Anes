-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 17. Mrz 2019 um 11:27
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr10_Anes_Smajic_biglibrary`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `author`
--

CREATE TABLE `author` (
  `author_Id` int(11) NOT NULL,
  `author_first_name` varchar(55) DEFAULT NULL,
  `author_last_name` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `author`
--

INSERT INTO `author` (`author_Id`, `author_first_name`, `author_last_name`) VALUES
(1, 'Anne', 'Rice'),
(2, 'Paulo', 'Coelho'),
(3, 'Ivo', 'Andric'),
(4, 'Mahatma', 'Ghandi'),
(5, 'J.K', 'Rowling');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(9, 'Adrijana', 'Zenicanin', 'adrijana@gmx.at', 'f0c3cd6fc4b23eae95e39de1943792f62ccefd837158b69c63aebaf'),
(10, 'Anes', 'Smajic', 'smajic.kairo@gmx.at', '9c62ed987e77193bc16f799028d1b66baf58e493ba8ba23ef16d11f'),
(11, 'Goran', 'Stevic', 'stevic@gmx.at', 'f0c3cd6fc4b23eae95e39de1943792f62ccefd837158b69c63aebaf');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `library`
--

CREATE TABLE `library` (
  `library_id` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `address` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `library`
--

INSERT INTO `library` (`library_id`, `name`, `address`) VALUES
(1, 'International Library', 'Burggasse 1 1150 Vienna');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `ISBN` varchar(55) DEFAULT NULL,
  `descrp` varchar(500) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `borrow_price` float DEFAULT NULL,
  `fk_author_id` int(11) DEFAULT NULL,
  `fk_type_id` int(11) DEFAULT NULL,
  `fk_publisher_id` int(11) DEFAULT NULL,
  `fk_library_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `media`
--

INSERT INTO `media` (`media_id`, `title`, `image`, `ISBN`, `descrp`, `status`, `borrow_price`, `fk_author_id`, `fk_type_id`, `fk_publisher_id`, `fk_library_id`) VALUES
(1, 'Der Fuerst der Finsternis', 'https://images-na.ssl-images-amazon.com/images/I/51tOONf5riL.jpg', '1001-1001', 'Beschreibung Der Roman Der Fuerst der Finsternis wurde 1985 von der amerikanischen Schriftstellerin Anne Rice veroeffentlicht und ist das zweite Buch der Chronik der Vampire. Im Mittelpunkt der Handlung steht der Vampir Lestat, der im spaeten 20...', 0, 2.5, 1, 1, 1, 1),
(2, 'The Alchemist', 'https://images-na.ssl-images-amazon.com/images/I/41PRRBL1-kL.jpg', '1002-1002', 'The Alchemist is a novel by Brazilian author Paulo Coelho that was first published in 1988. Originally written in Portuguese, it became a widely translated international bestseller.', 0, 2.5, 2, 1, 2, 1),
(3, 'The Bridge on the Drina', 'https://images-na.ssl-images-amazon.com/images/I/91WFtkuqS7L.jpg', '1002-1002', 'The Bridge on the Drina is a historical novel by the Yugoslav writer Ivo Andric. It revolves around the Mehmed Pasa Sokolovic Bridge in Visegrad, which spans the Drina River and stands as a silent ...', 0, 2.5, 3, 1, 3, 1),
(4, 'The Story of My Experiments with Truth', 'https://images-na.ssl-images-amazon.com/images/I/71h6MOIyijL.jpg', '1003-1003', 'The Story of My Experiments with Truth is the autobiography of Mohandas K. Gandhi, covering his life from early childhood through to 1921. It was written in weekly instalments and published in his journal Navjivan from 1925 to 1929.', 0, 5, 4, 1, 4, 1),
(5, 'Harry Potter and the Philosopher\'s Stone', 'https://images-na.ssl-images-amazon.com/images/I/91LV0IoBo4L.jpg', '1005-1005', 'Harry Potter has been living an ordinary life, constantly abused by his surly and cold aunt and uncle, Vernon and Petunia Dursley and bullied by their spoiled son Dudley since the death of his parents ten years prior. His life changes on the day of his el', 0, 3, 5, 1, 5, 1),
(6, 'Harry Potter and the Chamber of Secrets', 'https://images-na.ssl-images-amazon.com/images/I/51jNORv6nQL.jpg', '1006-1006', 'On Harry Potter\'s twelfth birthday, the Dursley family—Harry\'s uncle Vernon, aunt Petunia, and cousin Dudley—hold a dinner party for a potential client of Vernon\'s drill-manufacturing company. Harry is not invited, but is content to spend the evening quie', 1, 4.5, 5, 1, 5, 1),
(7, 'Harry Potter and the Prisoner of Azkaban', 'https://images-na.ssl-images-amazon.com/images/I/51ME8NPXPCL.jpg', '1007-1007', 'Harry, Ron and Hermione return as teenagers for a third term at Hogwarts School of Witchcraft and Wizardry. But Harry\'s fate, and that of the entire community of wizards, looks bleak when the infamous Sirius Black--convicted of abetting evil Lord Voldemor', 1, 7, 5, 2, 5, 1),
(8, 'Harry Potter and the Goblet of Fire', 'https://images-na.ssl-images-amazon.com/images/I/51J0k4cENeL._SX342_.jpg', '1008-1008', 'he fourth movie in the Harry Potter franchise sees Harry (Daniel Radcliffe) returning for his fourth year at Hogwarts School of Witchcraft and Wizardry, along with his friends, Ron (Rupert Grint) and Hermione (Emma Watson). There is an upcoming tournament', 1, 1, 5, 3, 5, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `publisher`
--

CREATE TABLE `publisher` (
  `publisher_Id` int(11) NOT NULL,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `size_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `publisher`
--

INSERT INTO `publisher` (`publisher_Id`, `first_name`, `last_name`, `size_Id`) VALUES
(1, 'Reed', 'Elsevier', 1),
(2, 'Wayne', 'Enterprise', 2),
(3, 'The', 'Company1', 3),
(4, 'The', 'Company2', 4),
(5, 'The', 'Company3', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `typeName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `type`
--

INSERT INTO `type` (`type_id`, `typeName`) VALUES
(1, 'book'),
(2, 'movie'),
(3, 'cd');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_Id`);

--
-- Indizes für die Tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indizes für die Tabelle `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`library_id`);

--
-- Indizes für die Tabelle `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `media_ibfk_1` (`fk_publisher_id`),
  ADD KEY `author_id` (`fk_author_id`),
  ADD KEY `type_id` (`fk_type_id`),
  ADD KEY `media_ibfk_2` (`fk_library_id`);

--
-- Indizes für die Tabelle `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_Id`);

--
-- Indizes für die Tabelle `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `library`
--
ALTER TABLE `library`
  MODIFY `library_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_publisher_id`) REFERENCES `publisher` (`publisher_Id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_library_id`) REFERENCES `library` (`library_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `media_ibfk_3` FOREIGN KEY (`fk_author_id`) REFERENCES `author` (`author_Id`),
  ADD CONSTRAINT `media_ibfk_4` FOREIGN KEY (`fk_type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
