-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2018 at 07:23 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edelweis`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` tinyint(1) UNSIGNED NOT NULL,
  `intro` text,
  `text` mediumtext,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `name`, `category_id`, `intro`, `text`, `picture`) VALUES
(1, 'Наш город Керчь', 2, '<p>Путешествие по одному из старейших заповедников на территории Украины подарит вам знакомство с античной и средневековой историей Керчи. Керченский историко-археологический заповедник насчитывает 15 памятников, из них – 10 являются памятниками Национального значения. В настоящее время на балансе заповедника 64,5 га охранных территорий.</p>', '<h3>Экскурсионными объектами в составе Заповедника являются:</h3>\r\n<p>Историко-археологический музей; Картинная галерея; Музей истории обороны Аджимушкайских каменоломен; Музей истории Эльтигенского десанта; Царский курган, памятник погребальной архитектуры IV в. до Р.Х.; Мелек-Чесменский курган - памятник погребальной архитектуры IV в. до Р.Х.; Крепость-Керчь - памятник фортификационного строительства XIX в.. А также античные городища: Нимфей, Пантикапей, Тиритака, Мирмекий, Парфений, Порфмий.</p>\r\n<h3>Наш город Керчь</h3>\r\n<p>Керченский музей один из старейших на территории Украины. Его официальное открытие состоялось 15 июня 1826 г. Идея основания государственного музея в Керчи была высказана И.А. Стемпковским (позднее керченским градоначальником) ещё в 1823 г., а в 1825-м – основании докладной записки, поданной императору Александру I генерал-губернатором Новороссийского края графом М.С. Воронцовым, решение об открытии музеев в Керчи и Одессе было принято. </p>\r\n<p>Основой коллекции Керченского музея древностей стало частное собрание Поля Дюбрюкса, постоянно пополнявшееся благодаря систематическим исследованиям античных и средневековых памятников, которые проводили, как П. Дюбрюкс и его современники, так и их последователи. </p>\r\n<p>С 1833 г. музей находился в подчинении Императорской Археологической Комиссии и одной из его основных задач стал не только сбор и хранение памятников, но и поиск уникальных экспонатов для пополнения коллекций Эрмитажа. В то же время научная деятельность Керченского музея сыграла важную роль в становлении отечественной археологии и заложила научные основы в области охраны памятников и краеведения.</p>\r\n<p>В число наиболее значимых археологических коллекций входит коллекция расписной керамики, терракот, античного стекла и клейменной керамики и пр. Ежегодные археологические экспедиции, проводимые, на территории Боспора являются основным источником комплектования фондовых коллекций.</p>\r\n<p>Архив заповедника насчитывает более 18 000 единиц хранения. Он состоит из документов отражающих многолетнюю историю Керченского музея Древностей и его правопреемника Керченского Заповедника, историю археологических исследований Керченского полуострова.</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` tinyint(1) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `is_articles` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`, `is_articles`) VALUES
(1, ' Главная', 0),
(2, 'Наш город', 1),
(3, 'Развлечения', 1),
(4, 'Об отеле', 1),
(5, 'Контакты', 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `phone_1` varchar(45) NOT NULL,
  `phone_2` varchar(45) DEFAULT NULL,
  `phone_3` varchar(45) DEFAULT NULL,
  `town` varchar(45) NOT NULL,
  `street` varchar(255) NOT NULL,
  `building` int(11) NOT NULL,
  `gps` varchar(255) DEFAULT NULL,
  `email_1` varchar(255) NOT NULL,
  `email_2` varchar(255) DEFAULT NULL,
  `slogan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `site_name`, `phone_1`, `phone_2`, `phone_3`, `town`, `street`, `building`, `gps`, `email_1`, `email_2`, `slogan`) VALUES
(1, 'Эдельвейс', '+7 (978) 011-60-61', NULL, NULL, 'Керчь', '23 Мая', 180, '45.350143 36.472678', 'mail@edelweis.in.ua', NULL, 'Лучшие условия в ценре Керчи!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`article_id`),
  ADD KEY `fk_article_category_idx` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name_UNIQUE` (`category`),
  ADD UNIQUE KEY `id_UNIQUE` (`category_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
