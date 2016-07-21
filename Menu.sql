--
 -- Tablo i�in tablo yap�s� `menuler`
 --
 CREATE TABLE `menuler` (
  `id` int(11) UNSIGNED NOT NULL,
  `menuAdi` varchar(100) NOT NULL,
  `menuLink` varchar(100) NOT NULL,
  `ustId` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `sirasi` int(11) NOT NULL DEFAULT '0'
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 
 --
 -- Tablo d�k�m verisi `menuler`
 --

 INSERT INTO `menuler` (`id`, `menuAdi`, `menuLink`, `ustId`, `sirasi`) VALUES
 (1, 'Anasayfa', 'index', 0, 0),
 (2, 'Kurumsal', '#', 0, 1),
 (3, 'Hakk�m�zda', 'hakkimizda', 2, 1),
 (4, 'Tarih�e', 'tarihce', 2, 1),
 (5, '�r�nler', '#', 0, 2),
 (6, 'X �r�n', 'x-urun', 5, 2),
 (7, 'Y �r�n', 'y-urun', 5, 2),
 (8, 'Z �r�n', 'z-urun', 5, 2),
 (9, '�retim', 'uretim', 0, 3);
 
 --
 -- Tablo i�in indeksler `menuler`
 --
 ALTER TABLE `menuler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`menuAdi`),
  ADD KEY `id` (`id`);
 
 --
 -- Tablo i�in AUTO_INCREMENT de�eri `menuler`
 --
 ALTER TABLE `menuler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
  