-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2015 at 07:15 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Жалюзи'),
(2, 'Ролеты'),
(3, 'Плиссе'),
(4, 'Антимоскитные сетки'),
(5, 'Внешние системы солнцезащиты');

-- --------------------------------------------------------

--
-- Table structure for table `category_sub`
--

CREATE TABLE `category_sub` (
`id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `category_sub`
--

INSERT INTO `category_sub` (`id`, `title`) VALUES
(1, 'Горизонтальные'),
(2, 'Вертикальные'),
(3, 'Деревянные и бамбуковые');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
`id` tinyint(3) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`) VALUES
(1, 'Vasya', 'vasya@mail.ru', 'Tets message from Vasya'),
(2, 'Oleg', 'oleg.nasteka@gmail.com', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
`id` tinyint(3) unsigned NOT NULL,
  `alias` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text,
  `is_published` tinyint(1) unsigned DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `alias`, `title`, `content`, `is_published`) VALUES
(10, 'Акции-и-новости', 'Акции и новости', '<!-- News bl -->\r\n<div class="container-fluid news-bl">\r\n <div class="w970">\r\n\r\n    <!-- -->\r\n    <div class="row news-in">\r\n     <div class="col-md-6 col-xs-6">\r\n       <img src="/images/news.jpg" class="img-responsive" alt="Responsive image">\r\n      </div>\r\n      <div class="col-md-6 col-xs-6">\r\n       <h3>Новости компании</h3>\r\n       <hr>\r\n        <p class="text-justify">\r\n\r\n          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.\r\n         Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.\r\n          Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum,\r\n          nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.\r\n         <br><br>\r\n\r\n          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin\r\n         gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.\r\n          Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum,\r\n          nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.\r\n       </p>\r\n      </div>\r\n    </div>\r\n    <!-- -->\r\n\r\n    <!-- -->\r\n    <div class="row news-in">\r\n     <div class="col-md-6 col-xs-6">\r\n       <img src="/images/news-02.jpg" class="img-responsive" alt="Responsive image">\r\n     </div>\r\n      <div class="col-md-6 col-xs-6">\r\n       <h3>Новости компании</h3>\r\n       <hr>\r\n        <p class="text-justify">\r\n\r\n          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.\r\n         Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.\r\n          Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum,\r\n          nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.\r\n         <br><br>\r\n\r\n          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin\r\n         gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.\r\n          Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum,\r\n          nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.\r\n       </p>\r\n      </div>\r\n    </div>\r\n    <!-- -->\r\n\r\n    <!-- -->\r\n    <div class="row news-in">\r\n     <div class="col-md-6 col-xs-6">\r\n       <img src="/images/news-03.jpg" class="img-responsive" alt="Responsive image">\r\n     </div>\r\n      <div class="col-md-6 col-xs-6">\r\n       <h3>Новости компании</h3>\r\n       <hr>\r\n        <p class="text-justify">\r\n\r\n          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.\r\n         Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.\r\n          Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum,\r\n          nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.\r\n         <br><br>\r\n\r\n          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin\r\n         gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.\r\n          Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum,\r\n          nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.\r\n       </p>\r\n      </div>\r\n    </div>\r\n    <!-- -->\r\n\r\n    <div class="row">\r\n     <div class="col-md-6">\r\n        <!-- Pagination -->\r\n       <nav>\r\n         <ul class="pagination">\r\n           <li>\r\n              <a href="#" aria-label="Previous">\r\n                <span aria-hidden="true">&laquo;</span>\r\n             </a>\r\n            </li>\r\n           <li><a href="#">1</a></li>\r\n            <li><a href="#">2</a></li>\r\n            <li><a href="#">3</a></li>\r\n            <li><a href="#">4</a></li>\r\n            <li><a href="#">5</a></li>\r\n            <li>\r\n              <a href="#" aria-label="Next">\r\n                <span aria-hidden="true">&raquo;</span>\r\n             </a>\r\n            </li>\r\n         </ul>\r\n       </nav>\r\n        <!-- Pagination end -->\r\n\r\n     </div>\r\n    </div>\r\n\r\n\r\n  </div>\r\n</div>\r\n<!-- News bl end-->\r\n\r\n<!-- How -->\r\n<div class="container-fluid section-6 how-news">\r\n <div class="w970">\r\n    <br>\r\n    <h2 class="text-center black">Как сделать заказ:</h2>\r\n   <div class="img-bl"></div>\r\n    <br>\r\n    <h4 class="black text-center">Заказ. Замер. Установка. <strong>Все очень просто!</strong></h4>\r\n    <button type="submit" class="btn-how center-block">Отправить заказ в работу <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>\r\n </div>\r\n</div>\r\n<!-- How end-->', 1),
(11, 'Горизонтальные-жалюзи-Standart', 'Горизонтальные жалюзи Standart', '', 1),
(12, 'Контакты', 'Контакты', '<!-- Contacts -->\r\n<div class="container-fluid" id="contacts">\r\n  <div class="w970">\r\n    <br>\r\n    <h2 class="text-center black">Посетите наш шоурум в Киеве</h2>\r\n    <hr>\r\n    <div class="row c-addr-bl">\r\n     <div class="col-md-12">\r\n       <div class="col-md-2 ">\r\n         <h4><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Адрес:</h4></div>\r\n       <div class="col-md-10">\r\n         03680, г. Киев, ул. Боженко 86Д (Казимира Малевича)<br>\r\n         на перекрестке улиц Боженко и Байковой, у Аптеки\r\n        </div>\r\n      </div>\r\n      <div class="col-md-12">\r\n       <div class="col-md-2 ">\r\n         <h4><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Телефоны:</h4>\r\n        </div>\r\n        <div class="col-md-10">\r\n         +38(044)371-40-17<br>\r\n         +38(097)433-00-87<br>\r\n         +38(095)720-92-52<br>\r\n       </div>\r\n      </div>\r\n    </div>\r\n\r\n    <br>\r\n    <img src="/images/contacts-bg.jpg" class="img-responsive" alt="Шоурум">\r\n   <br>\r\n    <button class="btn center-block">Связаться с нами</button>\r\n    <h3 class="text-center">Схема расположения на карте:</h3>\r\n </div>\r\n</div>\r\n<!-- Contacts -->', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `properties` text NOT NULL,
  `color_id` varchar(255) NOT NULL,
  `type_id` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `images_bl` text NOT NULL,
  `alias` varchar(255) NOT NULL,
  `content_short` text
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `content`, `properties`, `color_id`, `type_id`, `category_id`, `subcategory_id`, `images_bl`, `alias`, `content_short`) VALUES
(1, 'Горизонтальные жалюзи Standart', 'Горизонтальные жалюзи Standart', 'Система 16 мм Mini\r\nСистема 25 мм Standart\r\nСистема 50 мм', '', '', 1, 1, '<div class="item active">\r\n           <img src="images/our/01.jpg" alt="Наши работы">\r\n           <div class="carousel-caption">\r\n              <!-- Описание фото -->\r\n            </div>\r\n          </div>\r\n          <div class="item">\r\n            <img src="images/our/02.jpg" alt="Наши работы">\r\n           <div class="carousel-caption">\r\n              <!-- Описание фото -->\r\n\r\n            </div>\r\n          </div>\r\n          <div class="item">\r\n            <img src="images/our/03.jpg" alt="Наши работы">\r\n           <div class="carousel-caption">\r\n              <!-- Описание фото -->\r\n\r\n            </div>\r\n          </div>', 'Горизонтальные жалюзи Standart', NULL),
(2, 'Горизонтальные жалюзи Venus', 'В ассортименте компании «Роллотекс» присутствуют следующие системы горизонтальных жалюзей с алюминиевыми ламелями: Standart, Mini, Venus, Magnus.\r\nМы предлагаем не только широкий спектр цветовых решений, но и разные способы установки жалюзи на окне. Горизонтальные жалюзи можно поместить как в оконном проеме, так и между двойными рамами окна, а также на наклонных оконных поверхностях. Это наделяет горизонтальные жалюзи дополнительными преимуществами и позволяет использовать их для различных типов окон и помещений.\r\nКонструкция жалюзи очень проста, но в то же время обеспечивает безупречную работу изделия. Механизм управления находится в верхнем карнизе, из него же выходят капроновые лесенки, на которых располагаются ламели. Количество лесенок зависит от ширины изделия. Нижняя рейка утяжеляет всю конструкцию, делает ее не столь подвижной. А если Ваши жалюзи постоянно колышутся от сквозняков, то есть возможность зафиксировать нижнюю рейку, и придать конструкции большую неподвижность. Зафиксировать нижнюю рейку можно несколькими способами, для этого можно использовать различные типы кронштейнов.\r\nЛамели для этих жалюзи изготавливаются из алюминиевой ленты, ширина которой 25 мм и 16 мм. Они синхронно поворачиваются вокруг своей оси на 180°, вследствие чего прямые солнечные лучи отражаются на улицу (при полном закрытии жалюзи) или проникают в помещение под углом, который вы выберете (при повороте ламелей). Цветовые решения этих жалюзи зависят только от вашего выбора. Все используемые красители очень стойкие и экологически чистые, они не выгорят на солнце и не потеряют вида даже после долгих лет службы.', 'Система Venus 16 мм\r\nСистема Venus 25 мм\r\nСистема Venus 25 мм (Зебра)', '', '', 1, 1, '', '', NULL),
(3, 'Горизонтальные жалюзи Magnus', 'Горизонтальные жалюзи Magnus', '', '', '', 0, 0, '', 'Горизонтальные-жалюзи-Magnus', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` smallint(5) unsigned NOT NULL,
  `login` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(45) NOT NULL DEFAULT 'admin',
  `password` char(32) NOT NULL,
  `is_active` tinyint(1) unsigned DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `role`, `password`, `is_active`) VALUES
(2, 'admin', 'admin@mvc.com', 'admin', '44ca5fa5c67e434b9e779c5febc46f06', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_sub`
--
ALTER TABLE `category_sub`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category_sub`
--
ALTER TABLE `category_sub`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;