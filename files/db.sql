-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Gegenereerd op: 25 mei 2016 om 12:52
-- Serverversie: 5.5.42
-- PHP-versie: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `DB2524346`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `handytools`
--

CREATE TABLE `handytools` (
  `id` int(11) NOT NULL,
  `name` varchar(29) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mediaarticles`
--

CREATE TABLE `mediaarticles` (
  `id` int(11) NOT NULL,
  `name` varchar(29) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `thememeetings`
--

CREATE TABLE `thememeetings` (
  `id` int(11) NOT NULL,
  `name` varchar(29) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `handytools`
--
ALTER TABLE `handytools`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `mediaarticles`
--
ALTER TABLE `mediaarticles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `thememeetings`
--
ALTER TABLE `thememeetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `handytools`
--
ALTER TABLE `handytools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `mediaarticles`
--
ALTER TABLE `mediaarticles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `thememeetings`
--
ALTER TABLE `thememeetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;