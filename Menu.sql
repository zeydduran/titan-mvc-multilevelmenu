--
 -- Tablo için tablo yapýsý `menuler`
 --
 CREATE TABLE `menuler` (
  `id` int(11) UNSIGNED NOT NULL,
  `menuAdi` varchar(100) NOT NULL,
  `menuLink` varchar(100) NOT NULL,
  `ustId` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `sirasi` int(11) NOT NULL DEFAULT '0'
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 
 --
 -- Tablo döküm verisi `menuler`
 --

 INSERT INTO `menuler` (`id`, `menuAdi`, `menuLink`, `ustId`, `sirasi`) VALUES
 (1, 'Anasayfa', 'index', 0, 0),
 (2, 'Kurumsal', '#', 0, 1),
 (3, 'Hakkýmýzda', 'hakkimizda', 2, 1),
 (4, 'Tarihçe', 'tarihce', 2, 1),
 (5, 'Ürünler', '#', 0, 2),
 (6, 'X Ürün', 'x-urun', 5, 2),
 (7, 'Y ürün', 'y-urun', 5, 2),
 (8, 'Z Ürün', 'z-urun', 5, 2),
 (9, 'Üretim', 'uretim', 0, 3);
 
 --
 -- Tablo için indeksler `menuler`
 --
 ALTER TABLE `menuler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`menuAdi`),
  ADD KEY `id` (`id`);
 
 --
 -- Tablo için AUTO_INCREMENT deðeri `menuler`
 --
 ALTER TABLE `menuler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
  