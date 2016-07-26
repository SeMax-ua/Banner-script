CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL,
  `code` varchar(512) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);