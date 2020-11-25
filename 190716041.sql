-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 14 Haz 2020, 13:02:02
-- Sunucu sürümü: 10.4.10-MariaDB
-- PHP Sürümü: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `190716041`
--

CREATE DATABASE IF NOT EXISTS `190716041` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `190716041`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersadi`
--

DROP TABLE IF EXISTS `dersadi`;
CREATE TABLE IF NOT EXISTS `dersadi` (
  `dersId` int(11) NOT NULL AUTO_INCREMENT,
  `Lname` varchar(50) NOT NULL,
  PRIMARY KEY (`dersId`),
  KEY `Lname` (`Lname`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `dersadi`
--

INSERT INTO `dersadi` (`dersId`, `Lname`) VALUES
(1, 'İş Sağlığı ve Güvenliği'),
(2, 'İş Güvenliği ve İlk Yardım'),
(3, 'Genel Deri Teknolojisi'),
(4, 'Proje Çalışması'),
(5, 'Deri Analizi'),
(6, 'Girişimcilik'),
(7, 'Yabancı Dil - İngilizce'),
(8, 'Yabancı Dil II'),
(9, 'İnovasyon Yönetimi'),
(10, 'Emlak Komisyonculuğu Teknikleri'),
(11, 'Kent Analizi'),
(12, 'Emlak Değerleme Teknikleri'),
(13, 'Emlak Yönetimi ve Bilgi Sistemleri'),
(14, 'İmar Mevzuatı ve Uygulamaları'),
(15, 'Gayrimenkul Mevzuatı II'),
(16, 'Ceza Hukuku '),
(17, 'Matematik II');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `Eid` int(11) NOT NULL AUTO_INCREMENT,
  `TSid` int(11) NOT NULL,
  `Lid` int(11) NOT NULL,
  `Pid` int(11) NOT NULL,
  `ETypeid` int(11) DEFAULT NULL,
  PRIMARY KEY (`Eid`),
  KEY `TSid` (`TSid`),
  KEY `ETypeid` (`ETypeid`),
  KEY `Lid` (`Lid`),
  KEY `Pid` (`Pid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `exams`
--

INSERT INTO `exams` (`Eid`, `TSid`, `Lid`, `Pid`, `ETypeid`) VALUES
(7, 3, 14, 10, 1),
(8, 4, 15, 11, 4),
(9, 2, 13, 10, 3),
(10, 4, 16, 5, 2),
(11, 5, 17, 1, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `examtypes`
--

DROP TABLE IF EXISTS `examtypes`;
CREATE TABLE IF NOT EXISTS `examtypes` (
  `Etypeid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`Etypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `examtypes`
--

INSERT INTO `examtypes` (`Etypeid`, `type`) VALUES
(1, 'TEST'),
(2, 'KLASİK'),
(3, 'UYGULAMA'),
(4, 'PROJE TESLİM');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lectures`
--

DROP TABLE IF EXISTS `lectures`;
CREATE TABLE IF NOT EXISTS `lectures` (
  `Lid` int(11) NOT NULL AUTO_INCREMENT,
  `Lcode` varchar(10) NOT NULL,
  `Lname` varchar(70) NOT NULL,
  `TSid` int(11) NOT NULL,
  `Pid` int(11) NOT NULL,
  PRIMARY KEY (`Lid`),
  KEY `TSid` (`TSid`,`Pid`),
  KEY `Pid` (`Pid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `lectures`
--

INSERT INTO `lectures` (`Lid`, `Lcode`, `Lname`, `TSid`, `Pid`) VALUES
(3, 'DKO 2146.1', 'Deri Analizi', 2, 3),
(13, 'CGİ 1204.2', 'İş Sağlığı ve Güvenliği', 2, 10),
(14, 'YDI 2106.3', 'Yabancı Dil - İngilizce', 3, 10),
(15, 'DKO 1206.2', 'İnovasyon Yönetimi', 4, 11),
(16, 'EYP 1144.1', 'Kent Analizi', 4, 5),
(17, 'BLG 1102.1', 'Matematik II', 5, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lecturescode`
--

DROP TABLE IF EXISTS `lecturescode`;
CREATE TABLE IF NOT EXISTS `lecturescode` (
  `lecturesId` int(11) NOT NULL AUTO_INCREMENT,
  `Lcode` varchar(50) NOT NULL,
  PRIMARY KEY (`lecturesId`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `lecturescode`
--

INSERT INTO `lecturescode` (`lecturesId`, `Lcode`) VALUES
(1, 'CGİ 1204.2'),
(2, 'CGİ 1204.1'),
(3, 'DKO 2114.1'),
(4, 'DKO 1114.1'),
(5, 'DKO 2106.1'),
(6, 'DKO 2146.1'),
(7, 'CBU 2401.4'),
(9, 'YDI 2106.3'),
(10, 'YDI 1122.1'),
(11, 'DKO 1206.2'),
(12, 'EYP 1124.1'),
(13, 'EYP 1144.1'),
(14, 'EYP 2104.1'),
(15, 'EYP 2174.1'),
(16, 'EYP 2116.1'),
(17, 'BLG 1102.1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `Pid` int(11) NOT NULL AUTO_INCREMENT,
  `Pname` varchar(100) NOT NULL,
  PRIMARY KEY (`Pid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `programs`
--

INSERT INTO `programs` (`Pid`, `Pname`) VALUES
(1, 'Bilgisayar Programcılığı Normal Öğretim'),
(2, 'Çocuk Gelişimi Normal Öğretim'),
(3, 'Deri Konfeksiyon Normal Öğretim'),
(4, 'Dış Ticaret Normal Öğretim'),
(5, 'Emlak ve Emalk Yönetimi Normal Öğretim'),
(6, 'Moda Tasarımı Normal Öğretim'),
(7, 'Özel Güvenlik ve Koruma Normal Öğretim'),
(8, 'Pazarlama Normal Öğretim'),
(9, 'Yerel Yönetimler Normal Öğretim'),
(10, 'Çocuk Gelişimi İkinci Öğretim'),
(11, 'Dış Ticaret İkinci Öğretim'),
(12, 'Moda Tasarımı İkinci Öğretim'),
(13, 'Özel Güvenlik ve Koruma İkinci Öğretim'),
(14, 'Yerel Yönetimler İkinci Öğretim'),
(15, 'Çocuk Gelişimi Uzaktan Öğretim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teachingstafs`
--

DROP TABLE IF EXISTS `teachingstafs`;
CREATE TABLE IF NOT EXISTS `teachingstafs` (
  `TSid` int(11) NOT NULL AUTO_INCREMENT,
  `TSname` varchar(30) NOT NULL,
  `TSsurname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`TSid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `teachingstafs`
--

INSERT INTO `teachingstafs` (`TSid`, `TSname`, `TSsurname`, `password`, `email`) VALUES
(1, 'emin', 'dinçer', '$2y$10$gQYQoCdQ4vIW6Kqa9reCs.lMvD53JzwSo6srEakB8rgNQTDcG6L9G', 'admin@cbu.edu.tr'),
(2, 'ahmet', 'tosun', '$2y$10$ddJuXCMd0/EuUHHNuKzV9.glyiCVpu9v67qCjHk5wQzNGQhYw11vm', 'ahmet.tosun@cbu.edu.tr'),
(3, ' ali̇ i̇hsan ', 'karakaya', '$2y$10$PWfgCujLsmlpuKCvjnlGRurjIAlqe7g9QbM5k.rh.uNC87UG.uSJi', 'ali.karakaya@cbu.edu.tr'),
(4, ' ali̇ mahi̇r', 'çinar', '$2y$10$v0ooRpmSHUpP9IWKs9BJHuqE1ty42NC59pKAs.AbM8AvB6cREIYhi', 'ali.mahir@cbu.edu.tr'),
(5, ' aslan', 'bozkurt', '$2y$10$JUNJCixr/UWWM7.aQ44t8OxhCWsCBKgGxUVP57R5BldzJjIHxk.0q', 'aslan.bozkurt@cbu.edu.tr');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`TSid`) REFERENCES `teachingstafs` (`TSid`),
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`ETypeid`) REFERENCES `examtypes` (`Etypeid`),
  ADD CONSTRAINT `exams_ibfk_3` FOREIGN KEY (`Lid`) REFERENCES `lectures` (`Lid`),
  ADD CONSTRAINT `exams_ibfk_4` FOREIGN KEY (`Pid`) REFERENCES `programs` (`Pid`);

--
-- Tablo kısıtlamaları `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`Pid`) REFERENCES `programs` (`Pid`),
  ADD CONSTRAINT `lectures_ibfk_2` FOREIGN KEY (`TSid`) REFERENCES `teachingstafs` (`TSid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
