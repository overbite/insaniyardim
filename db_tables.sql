-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: 198.23.57.27:3306
-- Üretim Zamanı: 16 Şub 2015, 20:44:21
-- Sunucu sürümü: 10.0.13-MariaDB-log
-- PHP Sürümü: 5.4.36-0+deb7u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+02:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Tablo için tablo yapısı `aileler`
--

CREATE TABLE IF NOT EXISTS `aileler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reis` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `mahalle` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sokak` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `apnu` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `kapinu` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `yerkek` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `ykadin` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `ecocuk` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `kcocuk` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `bebek` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `hasta` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `ihtiyac` text COLLATE utf8_turkish_ci NOT NULL,
  `verilen` text COLLATE utf8_turkish_ci NOT NULL,
  `kaydeden` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `guncelleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `gunceltarih` int(10) unsigned NOT NULL,
  `evegidildi` varchar(5) COLLATE utf8_turkish_ci NOT NULL,
  `calisan` varchar(3) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=92 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastalar`
--

CREATE TABLE IF NOT EXISTS `hastalar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `idiki` int(11) NOT NULL,
  `rapor` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `songiris` int(10) unsigned NOT NULL,
  `ipadresi` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=18 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
