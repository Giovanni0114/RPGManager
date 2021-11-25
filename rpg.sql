-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Lis 2021, 00:37
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `rpg`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbapperance`
--

CREATE TABLE `tbapperance` (
  `apperance_id` int(11) NOT NULL,
  `description` varchar(30) NOT NULL,
  `charisma` int(11) DEFAULT NULL,
  `intimidation` int(11) DEFAULT NULL,
  `seduction` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tbapperance`
--

INSERT INTO `tbapperance` (`apperance_id`, `description`, `charisma`, `intimidation`, `seduction`) VALUES
(1, 'Inspired', 4, 1, 0),
(2, 'Casual', 2, 1, 2),
(3, 'Ugly', 1, 3, 1),
(4, 'Elegant', 3, 1, 1),
(5, 'Filthy', 1, 4, 0),
(6, 'Offended', 1, 2, 1),
(7, 'Lost', 1, 1, 2),
(8, 'Confident', 1, 0, 3),
(9, 'Angry', 2, 3, 0),
(10, 'Lusty', 0, 0, 4),
(11, 'Cunning', 2, 2, 1),
(12, 'Proud', 3, 0, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbbackgrounds`
--

CREATE TABLE `tbbackgrounds` (
  `backgroung_id` int(11) NOT NULL,
  `backgroung_name` varchar(30) DEFAULT NULL,
  `main_advanatage` varchar(50) DEFAULT NULL,
  `advanatage1` varchar(50) DEFAULT NULL,
  `advanatage2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tbbackgrounds`
--

INSERT INTO `tbbackgrounds` (`backgroung_id`, `backgroung_name`, `main_advanatage`, `advanatage1`, `advanatage2`) VALUES
(1, 'Knight', 'Master of Blade', 'Parry this!', 'Stun!'),
(2, 'Noble', 'OBEY ME YOU PEASANT!', 'I know a guy...', 'I can afford'),
(3, 'Criminal', 'Sneak attack', 'Shady', 'Silver Tongue'),
(4, 'Pirate', 'Ship with Crew', 'Scary look', 'Load the cannon!'),
(5, 'Detective', 'I see everything', 'I know your file', 'Support Call'),
(6, 'Monk', 'Martial Arts', 'Inner Peace', 'Self-Discipline');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbcharacter`
--

CREATE TABLE `tbcharacter` (
  `character_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `species_id` int(11) DEFAULT NULL,
  `apperance_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `pd` int(11) DEFAULT NULL,
  `hp` int(11) DEFAULT NULL,
  `str_v` int(11) DEFAULT NULL,
  `dex_v` int(11) DEFAULT NULL,
  `int_v` int(11) DEFAULT NULL,
  `prof_bonus` int(11) DEFAULT 3,
  `player_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tbcharacter`
--

INSERT INTO `tbcharacter` (`character_id`, `first_name`, `last_name`, `species_id`, `apperance_id`, `class_id`, `pd`, `hp`, `str_v`, `dex_v`, `int_v`, `prof_bonus`, `player_id`) VALUES
(1, 'Kiki', 'Jardindottir', 6, 12, 6, 0, 14, 9, 12, 15, 3, 6),
(2, 'Forski', 'Z Norski', 3, 8, 1, 0, 22, 16, 13, 8, 3, 6),
(3, 'Wojtek', 'Małkowski', 6, 12, 6, 0, 123, 12, 12, 12, 3, 3),
(4, 'Emi', 'Tasha', 6, 12, 6, 0, 30, 15, 14, 12, 3, 1),
(5, 'sdss', 'asd', 3, 5, 1, 0, 12, 10, 10, 10, 3, 7),
(6, 'Korialii', 'Kilian', 3, 3, 2, 0, 12, 10, 10, 10, 3, 3),
(7, 'Misiaki', 'Toshiko', 4, 9, 5, 26, 52, 14, 16, 22, 3, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbcharacter_party`
--

CREATE TABLE `tbcharacter_party` (
  `ch_p_id` int(11) NOT NULL,
  `party_id` int(11) DEFAULT NULL,
  `character_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tbcharacter_party`
--

INSERT INTO `tbcharacter_party` (`ch_p_id`, `party_id`, `character_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 2, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbclass`
--

CREATE TABLE `tbclass` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `class_role` varchar(30) DEFAULT NULL,
  `main_weapon` varchar(30) DEFAULT NULL,
  `main_armor` varchar(30) DEFAULT NULL,
  `magic` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tbclass`
--

INSERT INTO `tbclass` (`class_id`, `class_name`, `class_role`, `main_weapon`, `main_armor`, `magic`) VALUES
(1, 'Warrior', 'DPS', 'Sword', 'Chainmail', 0),
(2, 'Paladin', 'Tank', 'Hammer', 'Plate Armor', 1),
(3, 'Cleric', 'Healer', 'Holy Symbol', 'Robe', 1),
(4, 'Rouge', 'Utility', 'Daggers', 'Leather Armor', 0),
(5, 'Wizard', 'Utility/DPS', 'Wand', 'Robe', 1),
(6, 'Ranger', 'DPS', 'Bow', 'Leather Armor', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbparty`
--

CREATE TABLE `tbparty` (
  `party_id` int(11) NOT NULL,
  `party_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tbparty`
--

INSERT INTO `tbparty` (`party_id`, `party_name`) VALUES
(1, 'Ragnarok Party'),
(2, 'Fantastic Tree'),
(3, 'We are doing this for gold');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbplayer`
--

CREATE TABLE `tbplayer` (
  `player_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `phone_number` varchar(16) DEFAULT NULL,
  `fav_class` int(11) DEFAULT NULL,
  `hours_played` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tbplayer`
--

INSERT INTO `tbplayer` (`player_id`, `first_name`, `last_name`, `phone_number`, `fav_class`, `hours_played`) VALUES
(1, 'Sam', 'Riegel', '145 145 754', 4, 152),
(2, 'Marisha', 'Ray', '789 875 245', 3, 89),
(3, 'Liam', 'O\'Brien', '786 149 470', 1, 152),
(4, 'Laura', 'Bailey', '852 456 951', 5, 254),
(5, 'Travis/Robin', 'Willingham', '684 624 153', 4, 178),
(6, 'Taliesin', 'Jaffe', '301 005 441', 3, 96),
(7, 'Ashley', 'Johnson', '334 4343 44', 1, 24),
(8, 'Emilia', 'Kubara', '123456789', 4, 68);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbspecies`
--

CREATE TABLE `tbspecies` (
  `species_id` int(11) NOT NULL,
  `species_name` varchar(30) NOT NULL,
  `avg_height` int(11) DEFAULT NULL,
  `avg_weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tbspecies`
--

INSERT INTO `tbspecies` (`species_id`, `species_name`, `avg_height`, `avg_weight`) VALUES
(1, 'Human', 180, 90),
(2, 'Elf', 200, 70),
(3, 'Half-Orc', 220, 140),
(4, 'Gnome', 120, 60),
(5, 'Dwarf', 140, 90),
(6, 'Half-Elf', 190, 80);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `tbapperance`
--
ALTER TABLE `tbapperance`
  ADD PRIMARY KEY (`apperance_id`);

--
-- Indeksy dla tabeli `tbbackgrounds`
--
ALTER TABLE `tbbackgrounds`
  ADD PRIMARY KEY (`backgroung_id`);

--
-- Indeksy dla tabeli `tbcharacter`
--
ALTER TABLE `tbcharacter`
  ADD PRIMARY KEY (`character_id`),
  ADD KEY `species_id` (`species_id`),
  ADD KEY `apperance_id` (`apperance_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indeksy dla tabeli `tbcharacter_party`
--
ALTER TABLE `tbcharacter_party`
  ADD PRIMARY KEY (`ch_p_id`),
  ADD KEY `party_id` (`party_id`),
  ADD KEY `character_id` (`character_id`);

--
-- Indeksy dla tabeli `tbclass`
--
ALTER TABLE `tbclass`
  ADD PRIMARY KEY (`class_id`);

--
-- Indeksy dla tabeli `tbparty`
--
ALTER TABLE `tbparty`
  ADD PRIMARY KEY (`party_id`);

--
-- Indeksy dla tabeli `tbplayer`
--
ALTER TABLE `tbplayer`
  ADD PRIMARY KEY (`player_id`),
  ADD KEY `fav_class` (`fav_class`);

--
-- Indeksy dla tabeli `tbspecies`
--
ALTER TABLE `tbspecies`
  ADD PRIMARY KEY (`species_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `tbapperance`
--
ALTER TABLE `tbapperance`
  MODIFY `apperance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `tbbackgrounds`
--
ALTER TABLE `tbbackgrounds`
  MODIFY `backgroung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `tbcharacter`
--
ALTER TABLE `tbcharacter`
  MODIFY `character_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT dla tabeli `tbcharacter_party`
--
ALTER TABLE `tbcharacter_party`
  MODIFY `ch_p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `tbclass`
--
ALTER TABLE `tbclass`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `tbparty`
--
ALTER TABLE `tbparty`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `tbplayer`
--
ALTER TABLE `tbplayer`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `tbspecies`
--
ALTER TABLE `tbspecies`
  MODIFY `species_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `tbcharacter`
--
ALTER TABLE `tbcharacter`
  ADD CONSTRAINT `tbcharacter_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `tbspecies` (`species_id`),
  ADD CONSTRAINT `tbcharacter_ibfk_2` FOREIGN KEY (`apperance_id`) REFERENCES `tbapperance` (`apperance_id`),
  ADD CONSTRAINT `tbcharacter_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `tbclass` (`class_id`),
  ADD CONSTRAINT `tbcharacter_ibfk_4` FOREIGN KEY (`player_id`) REFERENCES `tbplayer` (`player_id`);

--
-- Ograniczenia dla tabeli `tbcharacter_party`
--
ALTER TABLE `tbcharacter_party`
  ADD CONSTRAINT `tbcharacter_party_ibfk_1` FOREIGN KEY (`party_id`) REFERENCES `tbparty` (`party_id`),
  ADD CONSTRAINT `tbcharacter_party_ibfk_2` FOREIGN KEY (`character_id`) REFERENCES `tbcharacter` (`character_id`);

--
-- Ograniczenia dla tabeli `tbplayer`
--
ALTER TABLE `tbplayer`
  ADD CONSTRAINT `tbplayer_ibfk_1` FOREIGN KEY (`fav_class`) REFERENCES `tbclass` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
