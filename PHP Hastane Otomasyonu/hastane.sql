-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 Oca 2018, 13:16:51
-- Sunucu sürümü: 10.1.26-MariaDB
-- PHP Sürümü: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hastane`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ameliyatlar`
--

CREATE TABLE `ameliyatlar` (
  `hastanu` int(11) NOT NULL,
  `hastaad` varchar(30) NOT NULL,
  `tarih` datetime NOT NULL,
  `ameliyat` varchar(30) NOT NULL,
  `ameliyathane` int(11) NOT NULL,
  `doktor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ameliyatlar`
--

INSERT INTO `ameliyatlar` (`hastanu`, `hastaad`, `tarih`, `ameliyat`, `ameliyathane`, `doktor`) VALUES
(4, 'Ahmet Altingoz', '2017-12-13 09:00:00', 'Tiroid Bezi', 6, 'taylangelekci');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktorlar`
--

CREATE TABLE `doktorlar` (
  `dkullaniciadi` varchar(30) NOT NULL,
  `dsifre` varchar(30) NOT NULL,
  `dalan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `doktorlar`
--

INSERT INTO `doktorlar` (`dkullaniciadi`, `dsifre`, `dalan`) VALUES
('taylangelekci', 'dsifre123', 'Genel Cerrahi'),
('asliavci', 'dsifre456', 'Cocuk Hastaliklari');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastayatis`
--

CREATE TABLE `hastayatis` (
  `hastaadi` varchar(30) NOT NULL,
  `yatistarihi` date NOT NULL,
  `odano` int(11) NOT NULL,
  `yatisnedeni` varchar(500) NOT NULL,
  `doktor` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `muayeneler`
--

CREATE TABLE `muayeneler` (
  `hastano` int(11) NOT NULL,
  `hastaadi` varchar(30) NOT NULL,
  `tarih` datetime NOT NULL,
  `kisasikayet` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `doktor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `muayeneler`
--

INSERT INTO `muayeneler` (`hastano`, `hastaadi`, `tarih`, `kisasikayet`, `doktor`) VALUES
(2, 'Mine Durmaz', '2017-12-14 14:50:00', 'Ates, Mide Bulantisi', 'asliavci'),
(3, 'Canberk Anar', '2017-12-28 10:35:00', 'Apandisit', 'taylangelekci'),
(6, 'Oguzcan Ozdemir', '2017-12-15 08:00:00', 'Midede Yanma', 'taylangelekci'),
(7, 'Feyyaz BaÅŸer', '2018-01-13 07:00:00', 'Hemoroid', 'taylangelekci');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `receteler`
--

CREATE TABLE `receteler` (
  `recetekodu` varchar(10) NOT NULL,
  `hasta` varchar(30) NOT NULL,
  `tarih` date NOT NULL,
  `ilaclar` varchar(500) NOT NULL,
  `doktor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tahliller`
--

CREATE TABLE `tahliller` (
  `hastaadi` varchar(30) NOT NULL,
  `tarih` date NOT NULL,
  `tahlil` varchar(500) NOT NULL,
  `doktor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tahliller`
--

INSERT INTO `tahliller` (`hastaadi`, `tarih`, `tahlil`, `doktor`) VALUES
('Mehmet Avci', '2017-12-30', 'Hematoloji', 'taylangelekci'),
('Mehmet Avci', '2017-12-30', 'MR', 'taylangelekci'),
('rtrsydgfh', '2017-12-09', 'Hormon', 'taylangelekci'),
('rtrsydgfh', '2017-12-09', 'Gaita', 'taylangelekci'),
('rtrsydgfh', '2017-12-09', 'Sperm', 'taylangelekci'),
('rtrsydgfh', '2017-12-09', 'Ultrason', 'taylangelekci');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ameliyatlar`
--
ALTER TABLE `ameliyatlar`
  ADD PRIMARY KEY (`hastanu`);

--
-- Tablo için indeksler `muayeneler`
--
ALTER TABLE `muayeneler`
  ADD PRIMARY KEY (`hastano`);

--
-- Tablo için indeksler `receteler`
--
ALTER TABLE `receteler`
  ADD PRIMARY KEY (`recetekodu`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ameliyatlar`
--
ALTER TABLE `ameliyatlar`
  MODIFY `hastanu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `muayeneler`
--
ALTER TABLE `muayeneler`
  MODIFY `hastano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
