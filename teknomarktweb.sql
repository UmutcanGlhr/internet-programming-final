-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Oca 2023, 03:46:03
-- Sunucu sürümü: 8.0.28
-- PHP Sürümü: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `teknomarktweb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adresler`
--

CREATE TABLE `adresler` (
  `id` int UNSIGNED NOT NULL,
  `UyeId` int UNSIGNED NOT NULL,
  `AdSoyad` varchar(100) NOT NULL,
  `adres` varchar(250) NOT NULL,
  `Ilce` varchar(100) NOT NULL,
  `Sehir` varchar(100) NOT NULL,
  `TelefonNumarasi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `adresler`
--

INSERT INTO `adresler` (`id`, `UyeId`, `AdSoyad`, `adres`, `Ilce`, `Sehir`, `TelefonNumarasi`) VALUES
(3, 8, 'umutcan gülher', 'ömerağa mh.', 'tepebaşı', 'Eskişehir', '05368770793');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` tinyint UNSIGNED NOT NULL,
  `SiteAdi` varchar(50) NOT NULL,
  `SiteTitle` varchar(60) NOT NULL,
  `SiteDescription` varchar(150) NOT NULL,
  `SiteKeywords` varchar(255) NOT NULL,
  `SiteCopyrightMetni` varchar(255) NOT NULL,
  `SiteLogosu` varchar(60) NOT NULL,
  `SiteEmailAdresi` varchar(60) NOT NULL,
  `SiteEmailSifresi` varchar(60) NOT NULL,
  `SiteLinki` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `SiteAdi`, `SiteTitle`, `SiteDescription`, `SiteKeywords`, `SiteCopyrightMetni`, `SiteLogosu`, `SiteEmailAdresi`, `SiteEmailSifresi`, `SiteLinki`) VALUES
(1, 'TeknoMarkt', 'Beyaz Eşya Mağazası', 'Beyaz eşya da uygun fiyat ve ödeme koşulları burada.', 'Beyaz eşya, çamaşır makinesi, buzdolabı , fırın , \r\nklima , ankastre', 'Teknomarktta tüm hakları saklıdır.', '', 'janbon2626@gmail.com', '123456789erer', 'http://www.teknomarkt.net');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuler`
--

CREATE TABLE `menuler` (
  `id` int UNSIGNED NOT NULL,
  `UrunTuru` varchar(250) NOT NULL,
  `MenuAdi` varchar(250) NOT NULL,
  `UrunSayisi` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `menuler`
--

INSERT INTO `menuler` (`id`, `UrunTuru`, `MenuAdi`, `UrunSayisi`) VALUES
(1, 'Buzdolabi', 'A++ Modeller', 1),
(2, 'Buzdolabi', 'A+ Modeller', 1),
(3, 'Buzdolabi', 'B Modeller', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `id` int UNSIGNED NOT NULL,
  `UyeId` int UNSIGNED NOT NULL,
  `UrunId` int UNSIGNED NOT NULL,
  `UrunAdedi` int UNSIGNED NOT NULL,
  `SepetNumarasi` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `id` int UNSIGNED NOT NULL,
  `SiparisNumarasi` int UNSIGNED NOT NULL,
  `UrunId` int UNSIGNED NOT NULL,
  `UrunAdi` varchar(100) NOT NULL,
  `UrunFiyati` double NOT NULL,
  `ParaBirimi` char(3) NOT NULL,
  `UrunAdedi` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sozlesmelervemetinler`
--

CREATE TABLE `sozlesmelervemetinler` (
  `id` tinyint UNSIGNED NOT NULL,
  `hakkimizdametni` text NOT NULL,
  `üyeliksözlesmesimetni` text NOT NULL,
  `kullanimkosullarimetni` text NOT NULL,
  `gizliliksözlesmesimetni` text NOT NULL,
  `mesafelisatissözlesmesimetni` text NOT NULL,
  `teslimatmetni` text NOT NULL,
  `iptaliadedegisimmetni` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `sozlesmelervemetinler`
--

INSERT INTO `sozlesmelervemetinler` (`id`, `hakkimizdametni`, `üyeliksözlesmesimetni`, `kullanimkosullarimetni`, `gizliliksözlesmesimetni`, `mesafelisatissözlesmesimetni`, `teslimatmetni`, `iptaliadedegisimmetni`) VALUES
(1, 'hakkimizda metni', 'üyeliksözlesmesimetni', 'kullanimkosullarimetni', 'gizliliksözlesmesimetni', 'mesafelisatissözlesmesimetni	', 'teslimatmetni', 'iptaliadedegisimmetni');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int UNSIGNED NOT NULL,
  `UrunTuru` varchar(250) NOT NULL,
  `UrunAdi` varchar(250) NOT NULL,
  `UrunFiyati` double UNSIGNED NOT NULL,
  `ParaBirimi` char(3) NOT NULL,
  `UrunAciklamasi` text NOT NULL,
  `UrunResmiBir` varchar(30) NOT NULL,
  `UrunResmiiki` varchar(30) NOT NULL,
  `UrunResmiUc` varchar(30) NOT NULL,
  `UrunResmiDort` varchar(30) NOT NULL,
  `Durumu` tinyint UNSIGNED NOT NULL,
  `ToplamSatisSayisi` int UNSIGNED NOT NULL,
  `ToplamSatisTutari` double UNSIGNED NOT NULL,
  `GoruntulenmeSayisi` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `UrunTuru`, `UrunAdi`, `UrunFiyati`, `ParaBirimi`, `UrunAciklamasi`, `UrunResmiBir`, `UrunResmiiki`, `UrunResmiUc`, `UrunResmiDort`, `Durumu`, `ToplamSatisSayisi`, `ToplamSatisTutari`, `GoruntulenmeSayisi`) VALUES
(1, 'Buzdolabi', 'BOSCH Buzdolabı', 10.999, 'TRY', 'A++ Enerji Tasaruflu', 'Buzdolabi1.jpeg', 'Buzdolabi2.jpeg', 'Buzdolabi3.jpeg', 'Buzdolabi4.png', 1, 0, 0, 0),
(3, 'Buzdolabi', 'BOSCH Buzdolabı', 11.999, 'TRY', 'A++ Enerji Tasaruflu', 'Buzdolabi1.jpeg', 'Buzdolabi2.jpeg', 'Buzdolabi3.jpeg', 'Buzdolabi4.png', 1, 0, 0, 0),
(4, 'Buzdolabi', 'BOSCH Buzdolabı', 12.999, 'TRY', 'A++ Enerji Tasaruflu', 'Buzdolabi1.jpeg', 'Buzdolabi2.jpeg', 'Buzdolabi3.jpeg', 'Buzdolabi4.png', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int NOT NULL,
  `EmailAdresi` varchar(250) NOT NULL,
  `Sifre` varchar(100) NOT NULL,
  `AdSoyad` varchar(100) NOT NULL,
  `TelefonNumarasi` varchar(11) NOT NULL,
  `Durumu` tinyint(1) NOT NULL,
  `kayitTarihi` int NOT NULL,
  `KayitIpAdresi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `EmailAdresi`, `Sifre`, `AdSoyad`, `TelefonNumarasi`, `Durumu`, `kayitTarihi`, `KayitIpAdresi`) VALUES
(8, 'umutcanguller_26@hotmail.com', 'f09696910bdd874a99cd74c8f05b5c44', 'umutcan gülher', '05368770793', 1, 1671818884, '127.0.0.1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yöneticiler`
--

CREATE TABLE `yöneticiler` (
  `id` int UNSIGNED NOT NULL,
  `KullaniciAdi` varchar(100) NOT NULL,
  `Sifre` varchar(100) NOT NULL,
  `AdSoyad` varchar(100) NOT NULL,
  `EmailAdresi` varchar(100) NOT NULL,
  `TelefonNumarasi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `yöneticiler`
--

INSERT INTO `yöneticiler` (`id`, `KullaniciAdi`, `Sifre`, `AdSoyad`, `EmailAdresi`, `TelefonNumarasi`) VALUES
(1, 'Umutcan', 'f09696910bdd874a99cd74c8f05b5c44', 'Umutcan Gülher', 'umutcanguller_26@hotmail.com', '05368770793');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adresler`
--
ALTER TABLE `adresler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sozlesmelervemetinler`
--
ALTER TABLE `sozlesmelervemetinler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yöneticiler`
--
ALTER TABLE `yöneticiler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adresler`
--
ALTER TABLE `adresler`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `menuler`
--
ALTER TABLE `menuler`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sozlesmelervemetinler`
--
ALTER TABLE `sozlesmelervemetinler`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `yöneticiler`
--
ALTER TABLE `yöneticiler`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
