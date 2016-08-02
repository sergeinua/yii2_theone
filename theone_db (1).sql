-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 26 2016 г., 15:51
-- Версия сервера: 5.5.44-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `theone_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created` bigint(20) NOT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated` bigint(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `watch` int(11) NOT NULL,
  `shortdesc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=103 ;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `slug`, `thumbnail`, `content`, `created`, `type`, `meta_title`, `meta_description`, `meta_keyword`, `updated`, `category_id`, `watch`, `shortdesc`, `status`) VALUES
(100, 'Мы открыли наш сайт', 'we-are-opened', 'illu_article_content.jpg', '<h2>Мы открыли наш сайт!</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;- це текст-&quot;риба&quot;, що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною &quot;рибою&quot; аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. &quot;Риба&quot; не тільки успішно пережила п&#39;ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп&#39;ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[Gallery]</p>\r\n\r\n<p><img alt="" src="http://the-one.rcl/img/illu_article_content.jpg" style="height:483px; width:650px" /></p>\r\n\r\n<p><img alt="" src="http://the-one.rcl/img/illu_article_content.jpg" style="height:483px; width:650px" /></p>\r\n\r\n<p>[/Gallery]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Мы рады будем видеть вас на нашем сайте</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong><span style="font-family:pt serif,serif; font-size:16px">&nbsp;- це текст-&quot;риба&quot;, що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною &quot;рибою&quot; аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. &quot;Риба&quot; не тільки успішно пережила п&#39;ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп&#39;ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.</span></p>\r\n\r\n<p>[Carousel]</p>\r\n\r\n<p><img alt="" src="http://the-one.rcl/img/illu_article_content.jpg" style="height:483px; width:650px" /></p>\r\n\r\n<p><img alt="" src="http://the-one.rcl/img/illu_article_content.jpg" style="height:483px; width:650px" /></p>\r\n\r\n<p>[/Carousel]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1455627116, NULL, 'Мы открыли наш сайт', 'Мы открыли наш сайт', 'Мы открыли наш сайт', 1455801461, 3, 3, 'Открытие сайта The-One', 10),
(101, 'Путешествие в египет', 'travel-to-egypt', 'small-gallery-4.jpg', '<p>asdasdasd</p>\r\n', 1456409347, NULL, 'asdas', 'asdasd', 'asdasd', 1456485481, 5, 2, '', 10),
(102, 'У нас для вас хорошие новости', 'we-have-a-great-news', 'small-gallery-4.jpg', '<p>asdasd</p>\r\n', 1456414321, NULL, 'asdasd', 'asda', 'sdasdasd', 1456486897, 3, 3, 'asdasdasd', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `article_category`
--

INSERT INTO `article_category` (`id`, `name`, `description`, `slug`) VALUES
(1, 'Советы и идеи', '', 'advices-and-ideas'),
(2, 'Тематические свадьбы', '', 'creative-weddings'),
(3, 'Новости', 'Новости', 'the-one-news'),
(4, 'Статьи', 'Статьи', 'articles'),
(5, 'Путешествия', '', 'honeymoon'),
(6, 'Мастер-классы', '', 'workshops');

-- --------------------------------------------------------

--
-- Структура таблицы `article_to_related_article`
--

CREATE TABLE IF NOT EXISTS `article_to_related_article` (
  `article_id` int(11) NOT NULL,
  `related_article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `article_to_related_article`
--

INSERT INTO `article_to_related_article` (`article_id`, `related_article_id`) VALUES
(100, 100),
(100, 100),
(100, 0),
(101, 0),
(101, 0),
(101, 0),
(102, 0),
(102, 0),
(102, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `article_view_count`
--

CREATE TABLE IF NOT EXISTS `article_view_count` (
  `article_id` bigint(20) DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `article_view_count`
--

INSERT INTO `article_view_count` (`article_id`, `session_id`, `time`) VALUES
(100, 'd54pkgfatoj302t2lbc4gcbnn0', 1455719176),
(100, '1j46983264857ajaqbsadfmso4', 1455719811),
(100, '7a8npkc4vjm8r1vm6k7t4f87u4', 1455801461),
(101, '85u2hfe579i1q4veop102q6gp3', 1456409355),
(102, '85u2hfe579i1q4veop102q6gp3', 1456415974),
(102, '2b3o1t8o0hudne25l68lh6qm06', 1456472172),
(101, 'tk876cbobk5vl79i9vj0iqos36', 1456485481),
(102, 'tk876cbobk5vl79i9vj0iqos36', 1456486897);

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner` text COLLATE utf8_unicode_ci,
  `size` int(11) NOT NULL,
  `position` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `banner`
--

INSERT INTO `banner` (`id`, `route`, `banner`, `size`, `position`, `url`) VALUES
(16, 'professionals/single', '0ee75aa349488831444fc16a6340c21c.jpg', 1, 'sidebar', 'tsyegdfgdg'),
(17, 'professionals/single', 'a40bb49bc94b56dcbe57b183492fcccb.jpg', 1, 'sidebar', 'asdasdasd'),
(18, 'professionals/index', '76389d08447ca1af57112c1cdd43ff78.jpg', 1, 'sidebar', 'aasdasd'),
(19, 'professionals/index', 'd529b4a9dc62037c2637ce6d6fb784cf.jpg', 1, 'content-3-3', 'http://ya.ru'),
(20, 'article/the-one-news', 'b40ae28cb18c5cc915850d0fd0657e4d.jpg', 1, 'sidebar', 'ya.ru'),
(21, 'professionals/index', '419f7c1ae930c13b2c436abda4619cf0.jpg', 1, 'content-1-2', 'http://ya.ru'),
(22, 'professionals/index', '36687e5fddc09cd632ac54130c8a93d7.jpg', 1, 'content-1-2', 'http://ya.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hex` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id`, `hex`, `name`, `slug`) VALUES
(8, '#ed0000', 'Алый', 'alloy'),
(10, '#4b1130', 'Чёрный', 'black'),
(11, '#8f7ec4', 'Морской', 'seabreeze'),
(46, '#75a3ae', 'карич', 'karich');

-- --------------------------------------------------------

--
-- Структура таблицы `color_to_article`
--

CREATE TABLE IF NOT EXISTS `color_to_article` (
  `color_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `color_to_article`
--

INSERT INTO `color_to_article` (`color_id`, `article_id`) VALUES
(10, 101);

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_author_id` int(11) DEFAULT NULL,
  `user_professional_id` int(11) DEFAULT NULL,
  `rate` smallint(2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `parent_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commentsFK_user_author` (`user_author_id`),
  KEY `commentsFK_user_professional` (`user_professional_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `user_author_id`, `user_professional_id`, `rate`, `date`, `title`, `text`, `parent_id`) VALUES
(97, 33, 28, 4, '2016-02-08 14:59:23', NULL, 'Класно сыграли ребята.Играйте еще!', 0),
(98, 1, 20, 4, '2016-02-17 09:22:05', NULL, 'Очень классный парень!', 0),
(99, 33, 20, 4, '2016-02-24 08:05:39', NULL, 'Всё отлично.Интересно и замечательно.Мне понравилось', 0),
(100, 33, 33, 4, '2016-02-24 08:44:04', NULL, 'adadsasd', 0),
(101, 1, 33, 4, '2016-02-25 15:03:47', NULL, 'asdasdasd', 0),
(102, 1, 33, 4, '2016-02-25 15:04:33', NULL, 'asdasd', 0),
(103, 1, 33, 4, '2016-02-25 15:04:51', NULL, 'asd', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `group_to_professional`
--

CREATE TABLE IF NOT EXISTS `group_to_professional` (
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  KEY `group_to_professionalFK_user` (`user_id`),
  KEY `group_to_professionalFK_group` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `group_to_professional`
--

INSERT INTO `group_to_professional` (`user_id`, `group_id`) VALUES
(21, 3),
(29, 3),
(29, 4),
(29, 5),
(20, 3),
(20, 4),
(20, 5),
(28, 3),
(28, 4),
(28, 5),
(33, 4),
(33, 6),
(33, 17),
(33, 24),
(33, 29),
(1, 4),
(1, 22),
(35, 4),
(35, 5),
(35, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `magazine`
--

CREATE TABLE IF NOT EXISTS `magazine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shortdesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `announcement` text COLLATE utf8_unicode_ci,
  `cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issuu` text COLLATE utf8_unicode_ci,
  `journals_ua` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `magazine`
--

INSERT INTO `magazine` (`id`, `name`, `price`, `shortdesc`, `content`, `announcement`, `cover`, `issuu`, `journals_ua`, `created`, `updated`, `status`) VALUES
(4, 'The One Magazine №1', '45', 'Новый выпуск', 'Новый выпускНовый выпускНовый выпускНовый выпуск', 'Новый выпускНовый выпускНовый выпускНовый выпускНовый выпуск', '9776d0699a9581c05c71ceecaba26d2a.jpg', 'Новый выпускНовый выпускНовый выпуск', 'Новый выпускНовый выпускНовый выпуск', 1454073431, 1456130931, 0),
(5, 'The One Magazine №2', '123', 'sdasd', 'assda', 'sdfasdfasdfasd', 'ca0f35fd582487da8e7511de86967612.jpg', 'fsafdasdf', 'asdf', 1456129909, 1456130967, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1446465915),
('m130524_201442_init', 1446465916),
('m151029_125147_all_the_user_migrations', 1446465916),
('m151030_073255_all_the_articles_migrations', 1446465916),
('m151030_080429_banners', 1446465916),
('m151030_081036_settings', 1446465916),
('m151207_065322_colors_with_relation', 1449471422),
('m151224_084635_team', 1450947649),
('m151224_120929_magazine', 1450959681),
('m151225_092155_preferences', 1455710250),
('m160217_114732_professionals_view_counter', 1455710250),
('m160217_141704_articles_view_count', 1455718757);

-- --------------------------------------------------------

--
-- Структура таблицы `professional_group`
--

CREATE TABLE IF NOT EXISTS `professional_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `slug` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `professional_group`
--

INSERT INTO `professional_group` (`id`, `name`, `description`, `slug`) VALUES
(3, 'Аксесуары', 'accessories', 'accessories'),
(4, 'Аренда автомобилей', 'car-rent', 'car-rent'),
(5, 'Банкетные залы', 'banquet-halls', 'banquet-halls'),
(6, 'Флористика', 'floristics', 'floristics'),
(7, 'Венчание', 'wedding', 'wedding'),
(8, 'Видеосъемка', 'video-shooting', 'video-shooting'),
(9, 'Фото', 'photo', 'photo'),
(10, 'Живая музыка,диджеи', 'music', 'music'),
(11, 'Выездная церемония', 'visiting-ceremony', 'visiting-ceremony'),
(12, 'Кейтеринг', 'catering', 'catering'),
(13, 'Загсы', 'registry-offices', 'registry-offices'),
(14, 'Макияж и маникюр', 'makeup', 'makeup'),
(15, 'Мальчишник и девишник', 'stag-party', 'stag-party'),
(16, 'Медовый месяц', 'honeymoon', 'honeymoon'),
(17, 'Места для фотосессий', 'photosession-place', 'photosession-place'),
(18, 'Мужские костюмы', 'mens-suits', 'mens-suits'),
(19, 'Нижнее бельё', 'underwear', 'underwear'),
(20, 'Обручальные кольца', 'wedding-rings', 'wedding-rings'),
(21, 'Оформление свадьбы', 'wedding-decoration', 'wedding-decoration'),
(22, 'Подарки', 'gifts', 'gifts'),
(23, 'Образ невесты', 'bride-image', 'bride-image'),
(24, 'Салоны красоты', 'beauty-salons', 'beauty-salons'),
(25, 'Свадебные агенства', 'wedding-agencies', 'wedding-agencies'),
(26, 'Свадебные платья', 'wedding-dress', 'wedding-dress'),
(27, 'Свадебный танец', 'wedding-dance', 'wedding-dance'),
(28, 'Свадьба за границей', 'wedding-abroad', 'wedding-abroad'),
(29, 'Семейные консультации', 'family-counseling', 'family-counseling'),
(30, 'Спецэффекты', 'special-effects', 'special-effects'),
(31, 'Ведущие', 'special-leading', 'special-leading'),
(32, 'Кондитерские изделия', 'confectionery', 'confectionery'),
(33, 'Рестораны', 'restaurants', 'restaurants'),
(34, 'Шоу и артисты', 'shows-artists', 'shows-artists'),
(35, 'Новые фишки', 'new-chips\r\n', 'new-chips');

-- --------------------------------------------------------

--
-- Структура таблицы `professional_view_count`
--

CREATE TABLE IF NOT EXISTS `professional_view_count` (
  `professional_id` bigint(20) DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `professional_view_count`
--

INSERT INTO `professional_view_count` (`professional_id`, `session_id`, `time`) VALUES
(20, 'hn9d31pnivn1403sq4q7sb9n71', 1455714777),
(28, 'hn9d31pnivn1403sq4q7sb9n71', 1455714808),
(29, 'hn9d31pnivn1403sq4q7sb9n71', 1455714988),
(29, 'd54pkgfatoj302t2lbc4gcbnn0', 1455719625),
(20, 'd54pkgfatoj302t2lbc4gcbnn0', 1455719776),
(20, 'eqi5o180s409g77mu5ktghe3t0', 1455797246),
(28, 'eqi5o180s409g77mu5ktghe3t0', 1455797256),
(28, '2m80h7cgkbhh4bfnnfh8co3600', 1456152446),
(33, '3u1daqv9ptk2m57eovqfj3h4l3', 1456228753),
(20, 'ienr6qet7i2k20ioq2e1d8lmm3', 1456301112),
(28, 'ienr6qet7i2k20ioq2e1d8lmm3', 1456303244),
(33, 'ienr6qet7i2k20ioq2e1d8lmm3', 1456303381),
(33, '2nrtvo85vg4sabvsflgg9j6ub0', 1456334806),
(33, '0no68m6r9qjmn1tm82qk1nbe60', 1456401405),
(33, '85u2hfe579i1q4veop102q6gp3', 1456409009),
(1, '85u2hfe579i1q4veop102q6gp3', 1456409505),
(29, '85u2hfe579i1q4veop102q6gp3', 1456413689),
(35, 'e5lbk8c6iofhrgqom72kn333h5', 1456488684);

-- --------------------------------------------------------

--
-- Структура таблицы `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `route_to_banner`
--

CREATE TABLE IF NOT EXISTS `route_to_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_id` int(11) DEFAULT NULL,
  `banner_id` int(11) DEFAULT NULL,
  `position` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `route_to_bannerFK_route` (`route_id`),
  KEY `route_to_bannerFK_banner` (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `group` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=72 ;

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`id`, `key`, `value`, `group`) VALUES
(20, 'main_page_heading', ' Журнал The One', 5),
(21, 'main_page_text', 'о профессионалах, которые делают мир красивее, о наставниках, которые помогут создать прекрасное своими руками, о друзьях, которые подскажут отличные идеи.Шедевр состоит из мелочей и вы можете создать его сами!\r\n        ', 5),
(24, 'soc_fb', 'http://www.ya.ru11111', 0),
(25, 'soc_tw', 'http://www.ya.ru', 0),
(26, 'soc_vimeo', 'http://www.ya.ru', 0),
(27, 'soc_vk', 'http://www.ya.ru', 0),
(28, 'soc_inst', 'https://www.instagram.com/the_one_mag/', 0),
(29, 'block_1_heading', 'Новый выпуск', 5),
(30, 'block_1_image', 'block_1_image_0e225619527aa12e39f60b1d70c47b01.jpg', 5),
(31, 'block_1_subheading', 'уже в продаже', 5),
(32, 'block_1_url', 'http://www.ya.ru', 5),
(33, 'block_2_heading', 'asdadsasd', 5),
(34, 'block_2_image', 'block_2_image_670643cbb1d52e1c53bb7ab8c7c19d4f.jpg', 5),
(35, 'block_2_subheading', 'asdasdasdasdadasda', 5),
(36, 'block_2_url', 'http://www.ya.ru', 5),
(37, 'ads_1_link', 'http://www.ya.ru', 5),
(38, 'ads_1_image', 'ads_1_image_3e975d331fa8f626baf067bee2add956.jpg', 5),
(39, 'ads_2_link', 'http://www.ya.ru', 5),
(40, 'ads_2_image', 'ads_2_image_f2a2a95784daca92f004b4b2dbb5b975.jpg', 5),
(41, 'ads_3_image', 'ads_3_image_945d29bd0ade7929fdc85df7edad0096.jpg', 5),
(42, 'ads_3_link', 'http://www.ya.ru', 5),
(43, 'instagram_client_id', NULL, 0),
(44, 'instagram_cache', NULL, 0),
(45, 'instagram_client_id', NULL, 2);
INSERT INTO `setting` (`id`, `key`, `value`, `group`) VALUES
(46, 'instagram_cache', '{"status":"ok","items":[{"can_delete_comments":false,"code":"BCN7fm2BBSO","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12749823_103250876734819_2142893417_n.jpg?ig_cache_key=MTE5Mjg3MTEzMzA3OTQwOTgwNg%3D%3D.2","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/12749823_103250876734819_2142893417_n.jpg?ig_cache_key=MTE5Mjg3MTEzMzA3OTQwOTgwNg%3D%3D.2","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/e35\\/12749823_103250876734819_2142893417_n.jpg?ig_cache_key=MTE5Mjg3MTEzMzA3OTQwOTgwNg%3D%3D.2","width":640,"height":640}},"can_view_comments":true,"comments":{"count":0,"data":[]},"alt_media_url":null,"caption":{"created_time":"1456421342","text":"\\u00ab \\u0416\\u0435\\u043d\\u0449\\u0438\\u043d\\u044b \\u0441\\u0438\\u043b\\u044c\\u043d\\u0435\\u0435 \\u043d\\u0430\\u0441. \\u0414\\u043b\\u044f \\u043d\\u0438\\u0445 \\u043d\\u0435 \\u0441\\u0443\\u0449\\u0435\\u0441\\u0442\\u0432\\u0443\\u0435\\u0442 \\u0433\\u043b\\u0443\\u043f\\u043e\\u0441\\u0442\\u0435\\u0439 \\u2014 \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u0433\\u043b\\u0430\\u0432\\u043d\\u043e\\u0435. \\u0416\\u0438\\u0437\\u043d\\u044c, \\u0434\\u0435\\u0442\\u0438, \\u0441\\u0432\\u043e\\u0431\\u043e\\u0434\\u0430. \\u041e\\u043d\\u0438 \\u043d\\u0435 \\u0432\\u0438\\u0434\\u044f\\u0442 \\u0441\\u043c\\u044b\\u0441\\u043b\\u0430 \\u0432 \\u0432\\u0435\\u0447\\u043d\\u043e\\u0439 \\u0436\\u0438\\u0437\\u043d\\u0438 \\u2014 \\u043e\\u043d\\u0438 \\u043f\\u0440\\u043e\\u0434\\u043e\\u043b\\u0436\\u0430\\u044e\\u0442\\u0441\\u044f \\u0432 \\u0434\\u0435\\u0442\\u044f\\u0445, \\u0438 \\u044d\\u0442\\u043e\\u0433\\u043e \\u0434\\u043e\\u0441\\u0442\\u0430\\u0442\\u043e\\u0447\\u043d\\u043e. \\u041e\\u043d\\u0438 \\u043d\\u0435 \\u0437\\u0430\\u0432\\u043e\\u0435\\u0432\\u0430\\u0442\\u0435\\u043b\\u0438 \\u2014 \\u0438\\u043c \\u0438 \\u0442\\u0430\\u043a \\u043f\\u0440\\u0438\\u043d\\u0430\\u0434\\u043b\\u0435\\u0436\\u0438\\u0442 \\u043c\\u0438\\u0440, \\u043f\\u043e\\u0442\\u043e\\u043c\\u0443 \\u0447\\u0442\\u043e \\u043e\\u043d\\u0438 \\u0441\\u043f\\u043e\\u0441\\u043e\\u0431\\u043d\\u044b \\u0441\\u043e\\u0437\\u0434\\u0430\\u0442\\u044c \\u043d\\u043e\\u0432\\u0443\\u044e \\u0436\\u0438\\u0437\\u043d\\u044c\\u00bb.\\n\\u0414\\u0436\\u043e\\u043d\\u043d\\u0438 \\u0414\\u0435\\u043f\\u043f\\n\\nmodel - \\u0421\\u0432\\u0435\\u0442\\u043b\\u0430\\u043d\\u0430 \\u041c\\u0430\\u0442\\u0432\\u0438\\u0435\\u043d\\u043a\\u043e\\nph- @sobokar\\n#theone #magazine  #fashion #insta #wedding #dress #photo #xxl #the_one_agency #the_one_girl #like4like #follow4follow #woman #beautiful #gold","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1192871135923148590"},"link":"https:\\/\\/www.instagram.com\\/p\\/BCN7fm2BBSO\\/","likes":{"count":17,"data":[{"username":"nicolettemichelt","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12728612_1567912540194255_1650951285_a.jpg","id":"2535553958","full_name":"Print Your Pictures"},{"username":"agussmassa","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/11355083_435068970024848_263160219_a.jpg","id":"2940174236","full_name":"Agustin Massa"},{"username":"hashking_","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12748447_249807808698151_1345483517_a.jpg","id":"2051389141","full_name":"Rohit\\ud83d\\udc51"},{"username":"stephschulte","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/11428226_1657988184433537_909663877_a.jpg","id":"20832446","full_name":"Stephanie Schulte"}]},"created_time":"1456421342","type":"image","id":"1192871133079409806_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BCKUuQXBBQk","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12716473_911891092265207_1937721559_n.jpg?ig_cache_key=MTE5MTg1NjE5MDk4NTA4MTg5Mg%3D%3D.2.l","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/c180.0.720.720\\/12716573_1689461274626620_1222966932_n.jpg?ig_cache_key=MTE5MTg1NjE5MDk4NTA4MTg5Mg%3D%3D.2.c","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s640x640\\/sh0.08\\/e35\\/12716473_911891092265207_1937721559_n.jpg?ig_cache_key=MTE5MTg1NjE5MDk4NTA4MTg5Mg%3D%3D.2.l","width":640,"height":640}},"can_view_comments":true,"comments":{"count":0,"data":[]},"alt_media_url":null,"caption":{"created_time":"1456300351","text":"\\u041d\\u043e\\u0447\\u044c \\u043f\\u0440\\u0438\\u0434\\u0430\\u0451\\u0442 \\u0431\\u043b\\u0435\\u0441\\u043a \\u0437\\u0432\\u0451\\u0437\\u0434\\u0430\\u043c \\u0438 \\u0436\\u0435\\u043d\\u0449\\u0438\\u043d\\u0430\\u043c.\\n(c) \\u0411\\u0430\\u0439\\u0440\\u043e\\u043d\\nmodel- \\n@diana_khodakovskaya\\nph-@sobokar\\n #theone #magazine #dianakhidakovskaya #fashion #editor #insta #wedding #dress #photo #xxl #the_one_agency #the_one_girl #like4like #follow4follow #girl #beautiful","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1191859846975330166"},"link":"https:\\/\\/www.instagram.com\\/p\\/BCKUuQXBBQk\\/","likes":{"count":12,"data":[{"username":"top7showwomen","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12081241_1185763201453281_45600130_a.jpg","id":"2094472143","full_name":"\\u0422\\u043e\\u043f 7 \\u0432\\u0435\\u0434\\u0443\\u0449\\u0438\\u0445 \\u0434\\u0435\\u0432\\u0443\\u0448\\u0435\\u043a \\u041c\\u043e\\u0441\\u043a\\u0432\\u044b"},{"username":"tnaishevskaya","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12407285_971237682944220_1492716826_a.jpg","id":"2695214044","full_name":"Tanya Najshevskaja"},{"username":"maxim_nadtochiy","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/10654950_1476198119299155_1717495027_a.jpg","id":"226475130","full_name":""},{"username":"tanya_najshevskaja","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11909292_1017012178343767_181605845_a.jpg","id":"295458689","full_name":""}]},"created_time":"1456300351","type":"image","id":"1191856190985081892_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BCJHpkQhBZ2","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12747786_215115138839218_207244561_n.jpg?ig_cache_key=MTE5MTUxNzIxOTE3MjEyODM3NA%3D%3D.2.l","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/c70.0.463.463\\/12729416_1546201919025915_1704977425_n.jpg?ig_cache_key=MTE5MTUxNzIxOTE3MjEyODM3NA%3D%3D.2.c","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s480x480\\/e35\\/12747786_215115138839218_207244561_n.jpg?ig_cache_key=MTE5MTUxNzIxOTE3MjEyODM3NA%3D%3D.2.l","width":480,"height":480}},"can_view_comments":true,"comments":{"count":0,"data":[]},"alt_media_url":null,"caption":{"created_time":"1456259942","text":"\\"\\u041a\\u0430\\u0436\\u0434\\u0430\\u044f \\u0436\\u0435\\u043d\\u0449\\u0438\\u043d\\u0430 \\u0438\\u0449\\u0435\\u0442 \\u0441\\u0432\\u043e\\u0435 \\u043e\\u0442\\u0440\\u0430\\u0436\\u0435\\u043d\\u0438\\u0435 \\u0432 \\u0433\\u043b\\u0430\\u0437\\u0430\\u0445 \\u043c\\u0443\\u0436\\u0447\\u0438\\u043d\\u044b. \\u0418 \\u0442\\u0430, \\u043a\\u0442\\u043e \\u0441\\u043a\\u0430\\u0436\\u0435\\u0442, \\u0447\\u0442\\u043e \\u043d\\u0430\\u0448\\u043b\\u0430 \\u0441\\u0432\\u043e\\u0435 \\u043f\\u0440\\u0435\\u0434\\u043d\\u0430\\u0437\\u043d\\u0430\\u0447\\u0435\\u043d\\u0438\\u0435 \\u0432 \\u0440\\u0430\\u0431\\u043e\\u0442\\u0435, \\u0434\\u0435\\u0442\\u044f\\u0445, \\u043f\\u0441\\u0438\\u0445\\u043e\\u043b\\u043e\\u0433\\u0438\\u0438 \\u0438\\u043b\\u0438 \\u0432 \\u0432\\u044f\\u0437\\u0430\\u043d\\u0438\\u0438 \\u2014 \\u043e\\u0431\\u043c\\u0430\\u043d\\u044b\\u0432\\u0430\\u0435\\u0442 \\u043d\\u0430\\u0441 \\u0438\\u043b\\u0438 \\u0441\\u0430\\u043c\\u0443 \\u0441\\u0435\\u0431\\u044f. \\u0422\\u0430\\u043a \\u0443\\u0436 \\u0443\\u0441\\u0442\\u0440\\u043e\\u0438\\u043b \\u0422\\u0432\\u043e\\u0440\\u0435\\u0446, \\u0447\\u0442\\u043e \\u0436\\u0435\\u043d\\u0449\\u0438\\u043d\\u0430 \\u0440\\u043e\\u0436\\u0434\\u0430\\u0435\\u0442\\u0441\\u044f \\u0438 \\u043f\\u0440\\u043e\\u0434\\u043e\\u043b\\u0436\\u0430\\u0435\\u0442\\u0441\\u044f \\u0431\\u0435\\u0441\\u043a\\u043e\\u043d\\u0435\\u0447\\u043d\\u043e \\u2014 \\u0432 \\u043e\\u0431\\u044a\\u044f\\u0442\\u0438\\u044f\\u0445 \\u043c\\u0443\\u0436\\u0447\\u0438\\u043d\\u044b.\\"\\ud83d\\udc95\\ud83d\\udc91 \\u041d\\u0435 \\u0432\\u0430\\u0436\\u043d\\u043e, \\u043e\\u0442\\u043c\\u0435\\u043d\\u044f\\u044e\\u0442 \\u0438\\u043b\\u0438 \\u043f\\u0435\\u0440\\u0435\\u043d\\u043e\\u0441\\u044f\\u0442 \\u043f\\u0440\\u0430\\u0437\\u0434\\u043d\\u0438\\u043a\\u0438, \\u0432\\u0435\\u0434\\u044c \\u043b\\u044e\\u0431\\u043e\\u0432\\u044c \\u0432\\u043d\\u0435 \\u043f\\u043e\\u043b\\u0438\\u0442\\u0438\\u0447\\u0435\\u0441\\u043a\\u0438\\u0445 \\u0440\\u0430\\u0437\\u0431\\u043e\\u0440\\u043e\\u043a \\u0438 \\u043f\\u043e\\u0432\\u043e\\u0434 \\u043f\\u043e\\u0431\\u043b\\u0430\\u0433\\u043e\\u0434\\u0430\\u0440\\u0438\\u0442\\u044c \\u043b\\u044e\\u0431\\u0438\\u043c\\u044b\\u0445 \\u043c\\u0443\\u0436\\u0447\\u0438\\u043d \\u043d\\u0438\\u043a\\u043e\\u0433\\u0434\\u0430 \\u043d\\u0435 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u043b\\u0438\\u0448\\u043d\\u0438\\u043c! \\u041f\\u043e\\u0442\\u043e\\u043c\\u0443, \\u0447\\u0442\\u043e \\u043c\\u044b \\u0437\\u0430\\u0432\\u0438\\u0441\\u0438\\u043c\\u044b \\u0434\\u0440\\u0443\\u0433 \\u043e\\u0442 \\u0434\\u0440\\u0443\\u0433\\u0430, \\u043c\\u044b - \\u043e\\u0434\\u043d\\u043e \\u0446\\u0435\\u043b\\u043e\\u0435, \\u043c\\u044b - \\u0432\\u0437\\u0430\\u0438\\u043c\\u043d\\u0430\\u044f \\u043f\\u043e\\u0434\\u0434\\u0435\\u0440\\u0436\\u043a\\u0430, \\u043c\\u044b - \\u043e\\u0431\\u0449\\u0435\\u0435 \\u0441\\u0447\\u0430\\u0441\\u0442\\u044c\\u0435! \\u0418 \\u0442\\u0430\\u043a \\u0431\\u0443\\u0434\\u0435\\u0442 \\u0432\\u0441\\u0435\\u0433\\u0434\\u0430! \\ud83d\\udc9e\\ud83d\\udc9e \\u0421\\u043f\\u0430\\u0441\\u0438\\u0431\\u043e, \\u041d\\u0430\\u0441\\u0442\\u043e\\u044f\\u0449\\u0438\\u043c!! \\u0417\\u0434\\u043e\\u0440\\u043e\\u0432\\u044c\\u044f \\u0432\\u0430\\u043c, \\u0441\\u0438\\u043b, \\u0432\\u0434\\u043e\\u0445\\u043d\\u043e\\u0432\\u0435\\u043d\\u0438\\u044f \\u0438 \\u0433\\u043e\\u0440\\u0434\\u043e\\u0441\\u0442\\u0438 \\u0437\\u0430 \\u0441\\u0432\\u043e\\u044e \\u0416\\u0435\\u043d\\u0449\\u0438\\u043d\\u0443! \\nWith love from the ONE Girls\\nxoxoxo\\ud83d\\udc8b\\ud83d\\udc8b\\ud83d\\udc8b #mensworld #holiday #congratulations #celebration #man #boy #husband #theone #best #only #love #health #wish #quotes #happy #harmony #soul #heart #future #like #life #theonegirls #beauty #together #follow #followme #kiss #girl #the_one_mag","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1191517223341266421"},"link":"https:\\/\\/www.instagram.com\\/p\\/BCJHpkQhBZ2\\/","likes":{"count":18,"data":[{"username":"hannanaslan","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/10831888_778391858900930_2097455568_a.jpg","id":"33374845","full_name":"Hannan Aslan"},{"username":"yanayork","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12729569_1669403106673293_56602571_a.jpg","id":"218289858","full_name":"\\ud83d\\udc51"},{"username":"alisaradoi","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/10838865_1556824281198707_1621457919_a.jpg","id":"52355432","full_name":"Makeup Artist"},{"username":"goddess_chime","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/916509_205252459821857_40804677_a.jpg","id":"185352642","full_name":"Monay"}]},"created_time":"1456259942","type":"image","id":"1191517219172128374_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BCIXorphBb4","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/1390285_1690342147870566_915325939_n.jpg?ig_cache_key=MTE5MTMwNjA1MjE1NTc0MTk0NA%3D%3D.2.l","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/c180.0.720.720\\/12783233_1714719102145540_363472210_n.jpg?ig_cache_key=MTE5MTMwNjA1MjE1NTc0MTk0NA%3D%3D.2.c","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s640x640\\/sh0.08\\/e35\\/1390285_1690342147870566_915325939_n.jpg?ig_cache_key=MTE5MTMwNjA1MjE1NTc0MTk0NA%3D%3D.2.l","width":640,"height":640}},"can_view_comments":true,"comments":{"count":1,"data":[{"created_time":"1456257139","text":"Fantastic \\ud83d\\udc4d\\ud83d\\udc4d\\ud83d\\udc4d","from":{"username":"thelace_brand","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12543335_1650698161860344_2050134454_a.jpg","id":"1758694262","full_name":"The LACE +380938899459 \\ud83d\\udc8c"},"id":"1191493705132152373"}]},"alt_media_url":null,"caption":{"created_time":"1456234769","text":"\\u041d\\u0435\\u043a\\u043e\\u0442\\u043e\\u0440\\u044b\\u043c \\u0436\\u0435\\u043d\\u0449\\u0438\\u043d\\u0430\\u043c \\u0434\\u043e\\u0441\\u0442\\u0430\\u0442\\u043e\\u0447\\u043d\\u043e \\u043e\\u0434\\u0438\\u043d \\u0440\\u0430\\u0437 \\u043f\\u0440\\u043e\\u0439\\u0442\\u0438 \\u043f\\u043e \\u0443\\u043b\\u0438\\u0446\\u0435, \\u0447\\u0442\\u043e\\u0431\\u044b \\u043e\\u0441\\u0442\\u0430\\u0442\\u044c\\u0441\\u044f \\u0432 \\u043f\\u0430\\u043c\\u044f\\u0442\\u0438 \\u043c\\u0443\\u0436\\u0447\\u0438\\u043d\\u044b \\u043d\\u0430\\u0432\\u0441\\u0435\\u0433\\u0434\\u0430.\\n(c)\\u041a\\u0438\\u043f\\u043b\\u0438\\u043d\\u0433 \\u0420\\nmodel - \\u0410\\u043d\\u043d\\u0430 \\u0421\\u043e\\u0443\\u0441\\u0442\\u0438\\u043d\\u0430\\nph - @sobokar\\n #theone #magazine  #fashion #insta #wedding #dress #photo #xxl #the_one_agency #the_one_girl #like4like #follow4follow #girl #beautiful","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1191306315239265313"},"link":"https:\\/\\/www.instagram.com\\/p\\/BCIXorphBb4\\/","likes":{"count":25,"data":[{"username":"jaswalartist","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12328333_128576880843589_401813883_a.jpg","id":"327754308","full_name":"Tarun Singh Jaswal"},{"username":"taimara.ramos","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12748280_901179316668505_790637080_a.jpg","id":"1202243250","full_name":"Taimara Ramos"},{"username":"sam.khan_","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12748475_101673670224270_446357700_a.jpg","id":"2265234344","full_name":"Sam Khan"},{"username":"shelinaxxii","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12749785_1114893005210418_1024119619_a.jpg","id":"1517688020","full_name":""}]},"created_time":"1456234769","type":"image","id":"1191306052155741944_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BCISJYkBBRj","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/925146_485638928311494_2131588405_n.jpg?ig_cache_key=MTE5MTI4MTkxMTEyNjAzNzYwMw%3D%3D.2","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/925146_485638928311494_2131588405_n.jpg?ig_cache_key=MTE5MTI4MTkxMTEyNjAzNzYwMw%3D%3D.2","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/e35\\/925146_485638928311494_2131588405_n.jpg?ig_cache_key=MTE5MTI4MTkxMTEyNjAzNzYwMw%3D%3D.2","width":640,"height":640}},"can_view_comments":true,"comments":{"count":1,"data":[{"created_time":"1456243707","text":"Yeah cool! \\u003c3","from":{"username":"hartworx","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11875342_975298115861242_725804613_a.jpg","id":"13392962","full_name":"Hartworx"},"id":"1191381029970253575"}]},"alt_media_url":null,"caption":{"created_time":"1456231891","text":"#Repost @the_one_agency with @repostapp\\n\\u30fb\\u30fb\\u30fb\\n\\u041a\\u0430\\u043a \\u0431\\u0435\\u0437 \\u0421\\u0432\\u0435\\u0442\\u043b\\u0430\\u043d\\u044b \\u041c\\u0430\\u0442\\u0432\\u0438\\u0435\\u043d\\u043a\\u043e \\u043d\\u0435\\u0432\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e \\u043f\\u0440\\u0435\\u0434\\u0441\\u0442\\u0430\\u0432\\u0438\\u0442\\u044c \\u0441\\u0432\\u0430\\u0434\\u0435\\u0431\\u043d\\u044b\\u0439 \\u043c\\u0438\\u0440, \\u0442\\u0430\\u043a \\u0438 \\u043d\\u0438 \\u043e\\u0434\\u043d\\u043e \\u0434\\u043e\\u0441\\u0442\\u043e\\u0439\\u043d\\u043e\\u0435 \\u043c\\u0435\\u0440\\u043e\\u043f\\u0440\\u0438\\u044f\\u0442\\u0438\\u0435 \\u043d\\u0435 \\u043e\\u0431\\u0445\\u043e\\u0434\\u0438\\u0442\\u0441\\u044f \\u0431\\u0435\\u0437 The ONE! \\u0412\\u0447\\u0435\\u0440\\u0430 \\u0441\\u043e\\u0441\\u0442\\u043e\\u044f\\u043b\\u0430\\u0441\\u044c \\u043f\\u0440\\u0435\\u043c\\u044c\\u0435\\u0440\\u0430 \\u0441\\u0432\\u0430\\u0434\\u0435\\u0431\\u043d\\u043e\\u0439 \\u043f\\u0440\\u0435\\u043c\\u0438\\u0438 Wedding Awards by Andrey Djedjula! \\u0417\\u0430\\u0438\\u043d\\u0442\\u0440\\u0438\\u0433\\u043e\\u0432\\u0430\\u043d\\u044b \\u0438 \\u0441 \\u0443\\u0434\\u043e\\u0432\\u043e\\u043b\\u044c\\u0441\\u0442\\u0432\\u0438\\u0435\\u043c \\u0431\\u0443\\u0434\\u0435\\u043c \\u0441\\u043b\\u0435\\u0434\\u0438\\u0442\\u044c \\u0437\\u0430 \\u0445\\u043e\\u0434\\u043e\\u043c \\u0441\\u043e\\u0431\\u044b\\u0442\\u0438\\u0439!\\n#theone #the_one_agency \\n#svadebniyperepoloh #svadebniy_perepoloh  #\\u0441\\u0432\\u0430\\u0434\\u0435\\u0431\\u043d\\u044b\\u0439\\u043f\\u0435\\u0440\\u0435\\u043f\\u043e\\u043b\\u043e\\u0445 #agency #wedding #life #love #happytime #flowers #beauty #concert #award #ceremony  #fun #follow #beautiful #fashion  #cool\\n#follow4follow #like4like #like #celebrities #the_one_mag #theonegirl #theonegirls #weddingawardsbyandreydjedjula","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1191281914137548202"},"link":"https:\\/\\/www.instagram.com\\/p\\/BCISJYkBBRj\\/","likes":{"count":26,"data":[{"username":"gain.10000.freefooolloowers","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/11429824_1438421579819092_1744516243_a.jpg","id":"2033825458","full_name":"\\ud83d\\udc47FREE F0LL0WERZ\\ud83d\\udc47"},{"username":"jefferiesg","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/10661274_332181053621322_1305553991_a.jpg","id":"560624681","full_name":"George Jefferies"},{"username":"y14nn1","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12519215_1503045453333099_36927619_a.jpg","id":"793628600","full_name":""},{"username":"sarahabbott4","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/1168480_964269463669293_708639575_a.jpg","id":"2040444906","full_name":"Sarah Abbott"}]},"created_time":"1456231891","type":"image","id":"1191281911126037603_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BCISBLEBBRX","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12751381_982747005096606_1574087743_n.jpg?ig_cache_key=MTE5MTI4MTM0Njg3NDcwOTA3OQ%3D%3D.2.l","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/c0.135.1080.1080\\/12729703_1991492731075934_30303115_n.jpg?ig_cache_key=MTE5MTI4MTM0Njg3NDcwOTA3OQ%3D%3D.2.c","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s640x640\\/sh0.08\\/e35\\/12751381_982747005096606_1574087743_n.jpg?ig_cache_key=MTE5MTI4MTM0Njg3NDcwOTA3OQ%3D%3D.2.l","width":640,"height":640}},"can_view_comments":true,"comments":{"count":0,"data":[]},"alt_media_url":null,"caption":{"created_time":"1456231824","text":"\\u041f\\u043e\\u0447\\u0435\\u0442\\u043d\\u044b\\u0439 \\u0433\\u043e\\u0441\\u0442\\u044c #weddingawardsbyandreydjedjula \\u043f\\u043e\\u044f\\u0432\\u0438\\u043b\\u0441\\u044f \\u043d\\u0430 \\u043c\\u0435\\u0440\\u043e\\u043f\\u0440\\u0438\\u044f\\u0442\\u0438\\u0438 \\u0432 \\u043a\\u043e\\u043c\\u043f\\u0430\\u043d\\u0438\\u0438 #theonegirls \\ud83d\\ude0e  #theone #magazine #dianakhidakovskaya #fashion #editor #insta #wedding #dress #photo #xxl #the_one_agency #the_one_girl #like4like #follow4follow #girl #beautiful\\n\\n#Repost @diana_khodakovskaya with @repostapp\\n\\u30fb\\u30fb\\u30fb\\n#weddingawards ;-) #theone \\u003c3","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1191282498706085343"},"link":"https:\\/\\/www.instagram.com\\/p\\/BCISBLEBBRX\\/","likes":{"count":7,"data":[{"username":"inna5551","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12716756_972481299496318_852882720_a.jpg","id":"268932282","full_name":"Inna"},{"username":"goodframepro","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/10488681_1491904834359967_566622366_a.jpg","id":"1414544555","full_name":"\\u041a\\u043e\\u043c\\u043f\\u0430\\u043d\\u0438\\u044f GOODFRAME PRODUCTION."},{"username":"syvak_sax","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/11333304_149219855410201_1567547562_a.jpg","id":"1646085895","full_name":"Saxophonist Alexandr"},{"username":"irka_dmytrenko","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11055751_354584731409438_1607861365_a.jpg","id":"330602959","full_name":"Irina"}]},"created_time":"1456231824","type":"image","id":"1191281346874709079_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BCGOWvlhBfS","location":{"name":"Caribbean Club"},"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12724743_179511979086656_1504122831_n.jpg?ig_cache_key=MTE5MDcwMjI4NzA2MDk5ODA5OA%3D%3D.2.l","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/c236.0.607.607\\/12724735_1764227867146483_753091130_n.jpg?ig_cache_key=MTE5MDcwMjI4NzA2MDk5ODA5OA%3D%3D.2.c","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s640x640\\/sh0.08\\/e35\\/12724743_179511979086656_1504122831_n.jpg?ig_cache_key=MTE5MDcwMjI4NzA2MDk5ODA5OA%3D%3D.2.l","width":640,"height":640}},"can_view_comments":true,"comments":{"count":0,"data":[]},"alt_media_url":null,"caption":{"created_time":"1456162795","text":"\\u0417\\u0434\\u0435\\u0441\\u044c \\u0432\\u0441\\u0435 \\u0438 \\u0431\\u0435\\u0437 the ONE \\u0442\\u0430\\u043a\\u043e\\u0435 \\u043d\\u0435 \\u043e\\u0431\\u0445\\u043e\\u0434\\u0438\\u0442\\u0441\\u044f!!! \\ud83d\\ude0e\\u2764 \\u0414\\u0440\\u0443\\u0437\\u044c\\u044f, \\u0441 \\u043a\\u0435\\u043c \\u0435\\u0449\\u0435 \\u043d\\u0435 \\u043f\\u043e\\u0437\\u0434\\u043e\\u0440\\u043e\\u0432\\u0430\\u043b\\u0438\\u0441\\u044c, \\u043f\\u043e\\u0434\\u0445\\u043e\\u0434\\u0438\\u0442\\u0435 \\u043a 16 \\u0441\\u0442\\u043e\\u043b\\u0438\\u043a\\u0443 \\u043a the ONE Girls!\\ud83d\\ude18\\ud83d\\ude18\\ud83d\\ude18 #the_one_agency #the_one_mag #wedding #weddingawards #2016 #celebration #holiday #the_one_girls #happy #love #like #smile #friends #family #followme #follow #museum #best #amazing #beauty #life #lifestyle #professional #relax #restaurant","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1190702291263690144"},"link":"https:\\/\\/www.instagram.com\\/p\\/BCGOWvlhBfS\\/","likes":{"count":17,"data":[{"username":"top_people_kiev","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12716977_1714197805490895_2017197898_a.jpg","id":"1092303254","full_name":"\\ud83d\\udc8e\\u0421\\u0410\\u041c\\u042b\\u0415 \\u041a\\u0420\\u0410\\u0421\\u0418\\u0412\\u042b\\u0415 \\u041b\\u042e\\u0414\\u0418 \\u041a\\u0418\\u0415\\u0412\\u0410\\ud83d\\udc8e"},{"username":"wnt__fo110werz","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12346195_1664827287110009_1733166100_a.jpg","id":"2285755756","full_name":""},{"username":"khrystia_bohush","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12749893_1074832822538097_644683804_a.jpg","id":"2016659596","full_name":"Kristy"},{"username":"terri3000","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12479195_610816625740357_1066086483_a.jpg","id":"1949912126","full_name":"Terri Dean"}]},"created_time":"1456162795","type":"image","id":"1190702287060998098_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BCF0AN-BBac","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12749902_1139834276048879_1114403404_n.jpg?ig_cache_key=MTE5MDU4NjM4OTkyNzA0MDY2OA%3D%3D.2.l","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/c120.0.840.840\\/12783406_524696244399859_1598499625_n.jpg?ig_cache_key=MTE5MDU4NjM4OTkyNzA0MDY2OA%3D%3D.2.c","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s640x640\\/sh0.08\\/e35\\/12749902_1139834276048879_1114403404_n.jpg?ig_cache_key=MTE5MDU4NjM4OTkyNzA0MDY2OA%3D%3D.2.l","width":640,"height":640}},"can_view_comments":true,"comments":{"count":0,"data":[]},"alt_media_url":null,"caption":{"created_time":"1456148979","text":"\\u0410\\u0432\\u0442\\u043e\\u0440\\u0441\\u043a\\u0438\\u0439 \\u043f\\u0440\\u043e\\u0435\\u043a\\u0442 \\u0436\\u0443\\u0440\\u043d\\u0430\\u043b\\u0430 The ONE \\u0434\\u043e\\u043a\\u0430\\u0437\\u0430\\u043b \\u043c\\u0438\\u0440\\u0443, \\u0447\\u0442\\u043e The ONE Girls \\u0430\\u0431\\u0441\\u043e\\u043b\\u044e\\u0442\\u043d\\u043e \\u043e\\u0441\\u043e\\u0431\\u0435\\u043d\\u043d\\u044b\\u0435, \\u043d\\u0430\\u043f\\u043e\\u043b\\u043d\\u0435\\u043d\\u043d\\u044b\\u0435 \\u0436\\u0435\\u043d\\u0441\\u043a\\u0438\\u043c \\u043c\\u0430\\u0433\\u043d\\u0435\\u0442\\u0438\\u0437\\u043c\\u043e\\u043c \\u0438 \\u043e\\u0447\\u0430\\u0440\\u043e\\u0432\\u0430\\u043d\\u0438\\u0435\\u043c. \\n\\u0418 \\u0441\\u0435\\u0433\\u043e\\u0434\\u043d\\u044f \\u043c\\u044b \\u0445\\u043e\\u0442\\u0438\\u043c \\u043d\\u0430\\u043f\\u043e\\u043b\\u043d\\u0438\\u0442\\u044c \\u043e\\u0441\\u043b\\u0435\\u043f\\u0438\\u0442\\u0435\\u043b\\u044c\\u043d\\u043e\\u0439 \\u043a\\u0440\\u0430\\u0441\\u043e\\u0442\\u043e\\u0439 \\u0438 \\u043f\\u043e\\u0437\\u043d\\u0430\\u043a\\u043e\\u043c\\u0438\\u0442\\u044c \\u0432\\u0430\\u0441 \\u0441 \\u043d\\u0430\\u0448\\u0438\\u043c \\u0434\\u0438\\u0440\\u0435\\u043a\\u0442\\u043e\\u0440\\u043e\\u043c \\u043f\\u043e \\u0441\\u043f\\u0435\\u0446\\u043f\\u0440\\u043e\\u0435\\u043a\\u0442\\u0430\\u043c, \\u0440\\u043e\\u0441\\u043a\\u043e\\u0448\\u043d\\u043e\\u0439 \\u0418\\u043d\\u043d\\u043e\\u0447\\u043a\\u043e\\u0439!\\n\\n#the_one_agency #wedding #event #planning #professional #team #best #amazing #new #gold #beauty #love #flowers #decor #design #magic #miracle #heaven #follow #strong #beautiful  #woman #gorgeous #idea #follow #followme","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1190586394020681014"},"link":"https:\\/\\/www.instagram.com\\/p\\/BCF0AN-BBac\\/","likes":{"count":19,"data":[{"username":"raspopina_ekaterina","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12558507_826842504094616_1280475706_a.jpg","id":"1028213183","full_name":"\\u0420\\u0430\\u0441\\u043f\\u043e\\u043f\\u0438\\u043d\\u0430 \\u0415\\u043a\\u0430\\u0442\\u0435\\u0440\\u0438\\u043d\\u0430"},{"username":"marry.ua","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12276800_1243919392291867_1454105970_a.jpg","id":"1657360991","full_name":"\\u0421\\u0432\\u0430\\u0434\\u0435\\u0431\\u043d\\u044b\\u0439 \\u043f\\u043e\\u0440\\u0442\\u0430\\u043b"},{"username":"etoile.flora","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12747681_1702113086730517_1989694701_a.jpg","id":"1903687467","full_name":"\\"Etoile Flora\\""},{"username":"shanimariemodeling","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12543395_1007856465939192_468773634_a.jpg","id":"2176695880","full_name":"Shannon Marie\\u263a\\ufe0f"}]},"created_time":"1456148979","type":"image","id":"1190586389927040668_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BB77bGWBBWI","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12063011_1079668245440363_1333270109_n.jpg?ig_cache_key=MTE4NzgwNDI3MzcyNDEwMjAyNA%3D%3D.2","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/12063011_1079668245440363_1333270109_n.jpg?ig_cache_key=MTE4NzgwNDI3MzcyNDEwMjAyNA%3D%3D.2","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s640x640\\/sh0.08\\/e35\\/12063011_1079668245440363_1333270109_n.jpg?ig_cache_key=MTE4NzgwNDI3MzcyNDEwMjAyNA%3D%3D.2","width":640,"height":640}},"can_view_comments":true,"comments":{"count":0,"data":[]},"alt_media_url":null,"caption":{"created_time":"1455817325","text":"\\u0425\\u043e\\u0440\\u043e\\u0448\\u0438\\u0435 \\u0434\\u0435\\u0432\\u043e\\u0447\\u043a\\u0438 \\u0441\\u043f\\u044f\\u0442 \\u0432 \\u043f\\u0438\\u0436\\u0430\\u043c\\u0435, \\u043f\\u043b\\u043e\\u0445\\u0438\\u0435 \\u2013 \\u0433\\u043e\\u043b\\u044b\\u043c\\u0438, \\u0443\\u043c\\u043d\\u044b\\u0435 \\u2013 \\u043f\\u043e \\u0441\\u0438\\u0442\\u0443\\u0430\\u0446\\u0438\\u0438\\ud83d\\ude09\\n\\n\\u0410 \\u043c\\u044b \\u0441 \\u043d\\u0430\\u0448\\u0435\\u0439 \\u0432\\u0435\\u043b\\u0438\\u043a\\u043e\\u043b\\u0435\\u043f\\u043d\\u043e\\u0439 \\u0415\\u043a\\u0430\\u0442\\u0435\\u0440\\u0438\\u043d\\u043e\\u0439 \\u0436\\u0435\\u043b\\u0430\\u0435\\u043c \\u0432\\u0430\\u043c \\u043d\\u0435\\u0441\\u043a\\u0443\\u0447\\u043d\\u043e\\u0439 \\u043d\\u043e\\u0447\\u0438!\\n\\n#theonemag #the_one #magazine #new #magic #beauty #color #surprise #original #best #amazing #great #create #edition #idea #decor #design # #love #like #like4like #follow4follow #follow #followme  #smile #happy #art #interesting #inspiration #black","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1187804631515010800"},"link":"https:\\/\\/www.instagram.com\\/p\\/BB77bGWBBWI\\/","likes":{"count":20,"data":[{"username":"anna_farfalla","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12568758_1682352745367811_1569880462_a.jpg","id":"286310501","full_name":"Anna Pogrebnyak"},{"username":"kristina.matkobozhik","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11176267_1595200130751769_199705619_a.jpg","id":"1741191425","full_name":"\\u041a\\u0440\\u0438\\u0441\\u0442\\u0438\\u043d\\u0430 \\u041c\\u0430\\u0442\\u043a\\u043e\\u0431\\u043e\\u0436\\u0438\\u043a"},{"username":"coat____sale","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12345692_1526974964295707_1157384365_a.jpg","id":"2336284541","full_name":"\\u041d\\u043e\\u0440\\u043a\\u0430 | \\u0421\\u0422\\u041e\\u041a | \\u041a\\u043b\\u0438\\u043a\\u043d\\u0438 \\u2197\\ufe0f"},{"username":"bufon4ik","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11324287_525673354254959_1491259603_a.jpg","id":"209944717","full_name":"bufon4ik"}]},"created_time":"1455817325","type":"image","id":"1187804273724102024_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BB7oRkKhBQQ","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/10431763_899392486845868_492260151_n.jpg?ig_cache_key=MTE4NzcyMDA1NTY2NDk0MDA0OA%3D%3D.2","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/10431763_899392486845868_492260151_n.jpg?ig_cache_key=MTE4NzcyMDA1NTY2NDk0MDA0OA%3D%3D.2","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/e35\\/10431763_899392486845868_492260151_n.jpg?ig_cache_key=MTE4NzcyMDA1NTY2NDk0MDA0OA%3D%3D.2","width":640,"height":640}},"can_view_comments":true,"comments":{"count":0,"data":[]},"alt_media_url":null,"caption":{"created_time":"1455807285","text":"\\u041b\\u0443\\u0447\\u0448\\u0438\\u0439 \\u0430\\u043a\\u0441\\u0435\\u0441\\u0441\\u0443\\u0430\\u0440 \\u0436\\u0435\\u043d\\u0449\\u0438\\u043d\\u044b - \\u0435\\u0451 \\u0443\\u043b\\u044b\\u0431\\u043a\\u0430! \\n\\u0412\\u043e\\u0441\\u0445\\u0438\\u0442\\u0438\\u0442\\u0435\\u043b\\u044c\\u043d\\u0430\\u044f \\u0417\\u043b\\u0430\\u0442\\u043e\\u0432\\u043b\\u0430\\u0441\\u043a\\u0430 \\u041a\\u0440\\u0438\\u0441\\u0442\\u0438\\u043d\\u0430 \\u0434\\u043b\\u044f \\u043d\\u0430\\u0448\\u0435\\u0433\\u043e \\u0436\\u0443\\u0440\\u043d\\u0430\\u043b\\u0430 The One!\\n\\n#Repost @kristina.matkobozhik with @repostapp\\n\\u30fb\\u30fb\\u30fb\\n\\u0424\\u043e\\u0442\\u043e\\u0441\\u0435\\u0441\\u0441\\u0438\\u044f \\u0434\\u043b\\u044f The One magazine\\n\\n#theonemag #the_one #magazine #new #magic #beauty #color #surprise #original #best #amazing #great #create #edition #idea #decor #design #love #like #follow4follow #follow #followme  #smile #happy #art #interesting #inspiration #black #gold","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1187720393977501322"},"link":"https:\\/\\/www.instagram.com\\/p\\/BB7oRkKhBQQ\\/","likes":{"count":13,"data":[{"username":"yanabelyaeva_official","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12750242_1760533377509344_456372913_a.jpg","id":"1513581531","full_name":"Yana"},{"username":"stanislav_jewell","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/1516547_539991266163072_560676408_a.jpg","id":"1472240018","full_name":"\\u041e\\u0431\\u0440\\u0443\\u0447\\u0430\\u043b\\u044c\\u043d\\u044b\\u0435 \\u041a\\u043e\\u043b\\u044c\\u0446\\u0430\\ud83d\\udc8d"},{"username":"anna_ann_s","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12445992_135726006802959_1626105719_a.jpg","id":"309586041","full_name":"\\u0410\\u043d\\u043d\\u0430 S"},{"username":"coat____sale","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12345692_1526974964295707_1157384365_a.jpg","id":"2336284541","full_name":"\\u041d\\u043e\\u0440\\u043a\\u0430 | \\u0421\\u0422\\u041e\\u041a | \\u041a\\u043b\\u0438\\u043a\\u043d\\u0438 \\u2197\\ufe0f"}]},"created_time":"1455807285","type":"image","id":"1187720055664940048_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BB6xuxWhBQr","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/10311254_1555202191461314_546153549_n.jpg?ig_cache_key=MTE4NzQ4MDE3MDEzMTYyNTAwMw%3D%3D.2","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/10311254_1555202191461314_546153549_n.jpg?ig_cache_key=MTE4NzQ4MDE3MDEzMTYyNTAwMw%3D%3D.2","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/e35\\/10311254_1555202191461314_546153549_n.jpg?ig_cache_key=MTE4NzQ4MDE3MDEzMTYyNTAwMw%3D%3D.2","width":640,"height":640}},"can_view_comments":true,"comments":{"count":1,"data":[{"created_time":"1455807409","text":"Love your profile, follow us!","from":{"username":"passionpursuers","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/10808776_1492644627671368_1985346277_a.jpg","id":"1566332681","full_name":"Pursue Your Passion"},"id":"1187721090861110972"}]},"alt_media_url":null,"caption":{"created_time":"1455778689","text":"\\u042d\\u0442\\u043e \\u0434\\u0435\\u0439\\u0441\\u0442\\u0432\\u0438\\u0442\\u0435\\u043b\\u044c\\u043d\\u043e \\u0441\\u0447\\u0430\\u0441\\u0442\\u044c\\u0435... #Repost @oshka_shimko \\u30fb\\u30fb\\u30fb\\n\\u041e\\u0434\\u043d\\u0438\\u043c \\u0438\\u0437 \\u043e\\u0431\\u043e\\u0436\\u0430\\u0435\\u043c\\u044b\\u0445 \\u043d\\u0430\\u043c\\u0438 \\u0430\\u0441\\u043f\\u0435\\u043a\\u0442\\u043e\\u0432 \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u043d\\u0430\\u0434 \\u0432\\u044b\\u043f\\u0443\\u0441\\u043a\\u0430\\u043c\\u0438 \\u0436\\u0443\\u0440\\u043d\\u0430\\u043b\\u0430 The ONE \\u043e\\u0434\\u043d\\u043e\\u0437\\u043d\\u0430\\u0447\\u043d\\u043e \\u043c\\u043e\\u0436\\u043d\\u043e \\u043d\\u0430\\u0437\\u0432\\u0430\\u0442\\u044c \\u0437\\u043d\\u0430\\u043a\\u043e\\u043c\\u0441\\u0442\\u0432\\u043e \\u0441 \\u043d\\u0435\\u0432\\u0435\\u0440\\u043e\\u044f\\u0442\\u043d\\u043e \\u0442\\u0430\\u043b\\u0430\\u043d\\u0442\\u043b\\u0438\\u0432\\u044b\\u043c\\u0438, \\u044f\\u0440\\u043a\\u0438\\u043c\\u0438, \\u0438\\u043d\\u0442\\u0435\\u0440\\u0435\\u0441\\u043d\\u044b\\u043c\\u0438 \\u043f\\u0435\\u0440\\u0441\\u043e\\u043d\\u0430\\u043c\\u0438 - \\u0413\\u0443\\u0440\\u0443 \\u0434\\u0438\\u0437\\u0430\\u0439\\u043d\\u0435\\u0440\\u0441\\u043a\\u043e\\u0433\\u043e, \\u0444\\u043b\\u043e\\u0440\\u0438\\u0441\\u0442\\u0438\\u0447\\u0435\\u0441\\u043a\\u043e\\u0433\\u043e, \\u0434\\u0435\\u043a\\u043e\\u0440\\u0430\\u0442\\u043e\\u0440\\u0441\\u043a\\u043e\\u0433\\u043e \\u0438\\u043b\\u0438, \\u0432 \\u0434\\u0430\\u043d\\u043d\\u043e\\u043c \\u0441\\u043b\\u0443\\u0447\\u0430\\u0435, \\u043a\\u043e\\u043d\\u0434\\u0438\\u0442\\u0435\\u0440\\u0441\\u043a\\u043e\\u0433\\u043e \\u0438\\u0441\\u043a\\u0443\\u0441\\u0441\\u0442\\u0432\\u0430.\\ud83d\\ude0b \\u0412\\u043e\\u0442 \\u0442\\u044b \\u0441 \\u0432\\u043e\\u0441\\u0445\\u0438\\u0449\\u0435\\u043d\\u0438\\u0435\\u043c \\u043d\\u0430\\u0431\\u043b\\u044e\\u0434\\u0430\\u0435\\u0448\\u044c \\u0437\\u0430 \\u0438\\u0445 \\u043c\\u0430\\u0441\\u0442\\u0435\\u0440\\u0441\\u0442\\u0432\\u043e\\u043c \\u0441 \\u044d\\u043a\\u0440\\u0430\\u043d\\u0430 \\u0442\\u0435\\u043b\\u0435\\u0432\\u0438\\u0437\\u043e\\u0440\\u0430, \\u0441\\u043c\\u043e\\u0442\\u0440\\u0438\\u0448\\u044c \\u043d\\u0430 \\u0438\\u0445 \\u043f\\u043e\\u0442\\u0440\\u044f\\u0441\\u0430\\u044e\\u0449\\u0438\\u0435 \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u043d\\u0430 \\u0441\\u0430\\u0439\\u0442\\u0430\\u0445 \\u0438 \\u0442\\u0443\\u0442 \\u0442\\u044b \\u0443\\u0436\\u0435 \\u043b\\u0438\\u0447\\u043d\\u043e \\u0437\\u043d\\u0430\\u043a\\u043e\\u043c \\u0438 \\u0431\\u0435\\u0440\\u0435\\u0448\\u044c \\u044d\\u043a\\u0441\\u043a\\u043b\\u044e\\u0437\\u0438\\u0432\\u043d\\u043e\\u0435 \\u0438\\u043d\\u0442\\u0435\\u0440\\u0432\\u044c\\u044e \\u0434\\u043b\\u044f \\u0440\\u043e\\u0434\\u043d\\u043e\\u0433\\u043e The ONE!! \\ud83d\\ude00\\ud83d\\ude00\\ud83d\\ude00\\n\\u0418\\u043c\\u0435\\u043d\\u043d\\u043e \\u0442\\u0430\\u043a\\u0438\\u043c \\u0434\\u043e\\u043b\\u0433\\u043e\\u0436\\u0434\\u0430\\u043d\\u043d\\u044b\\u043c \\u0438 \\u0438\\u043d\\u0442\\u0435\\u0440\\u0435\\u0441\\u043d\\u044b\\u043c \\u0431\\u044b\\u043b\\u043e \\u0437\\u043d\\u0430\\u043a\\u043e\\u043c\\u0441\\u0442\\u0432\\u043e \\u0441 \\u043b\\u044e\\u0431\\u0438\\u043c\\u0438\\u0446\\u0435\\u0439 \\u043c\\u0438\\u043b\\u043b\\u0438\\u043e\\u043d\\u043e\\u0432 \\u0441 \\u041b\\u0438\\u0437\\u043e\\u0439 \\u0413\\u043b\\u0438\\u043d\\u0441\\u043a\\u043e\\u0439! \\ud83d\\udc8e \\u0421\\u043f\\u0430\\u0441\\u0438\\u0431\\u043e \\u0431\\u043e\\u043b\\u044c\\u0448\\u043e\\u0435 @lizaglinska \\u0437\\u0430 \\u0442\\u043e, \\u0447\\u0442\\u043e \\u0443\\u043a\\u0440\\u0430\\u0441\\u0438\\u043b\\u0438 \\u043d\\u0430\\u0448 \\u043d\\u043e\\u0432\\u044b\\u0439 \\u0432\\u044b\\u043f\\u0443\\u0441\\u043a!! \\ud83d\\udc9b\\ud83d\\udc9b\\ud83d\\udc9b\\ud83d\\udc9b\\ud83d\\udc9b\\ud83d\\udc90\\ud83d\\udc90\\ud83d\\udc90\\ud83d\\udc90\\ud83d\\udc90\\ud83d\\udc90\\ud83d\\udc90 #theonemag #the_one #magazine #new #issue #magic #beauty #star #interview #pastry #best #amazing #great #create #chef #idea #dessert  #design #flora #interesting #love #like #smile #foodporn #art #interesting #inspiration #black #gold  @lizaglinska with @repostapp\\n\\u30fb\\u30fb\\u30fb\\n\\u0417\\u0430\\u043c\\u0435\\u0447\\u0430\\u0442\\u0435\\u043b\\u044c\\u043d\\u043e\\u0435 \\u0438\\u043d\\u0442\\u0435\\u0440\\u0432\\u044c\\u044e \\u0432 \\u0436\\u0443\\u0440\\u043d\\u0430\\u043b\\u0435 \\"the One\\") \\u043e \\u0436\\u0438\\u0437\\u043d\\u0438, \\u0440\\u0430\\u0431\\u043e\\u0442\\u0435, \\u043b\\u0438\\u0447\\u043d\\u043e\\u043c \\u0438 \\u043e \\u043c\\u043e\\u0435\\u0439 \\u043a\\u043d\\u0438\\u0433\\u0435, \\u043a\\u043e\\u0442\\u043e\\u0440\\u0430\\u044f \\u0443\\u0432\\u0438\\u0434\\u0438\\u0442 \\u0441\\u0432\\u0435\\u0442 \\u0432 \\u044d\\u0442\\u043e\\u043c \\u0433\\u043e\\u0434\\u0443! \\u0443\\u0436\\u0435 \\u0432 \\u043f\\u0440\\u043e\\u0434\\u0430\\u0436\\u0435.. \\u0424\\u043e\\u0442\\u043e: @dmitriykhoroshayev  \\u0438 @uliya_ger","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1187480172832757521"},"link":"https:\\/\\/www.instagram.com\\/p\\/BB6xuxWhBQr\\/","likes":{"count":21,"data":[{"username":"mosbrands","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12534096_1687563461528686_1305454587_a.jpg","id":"1581454712","full_name":"\\u041e\\u0431\\u0443\\u0432\\u044c \\u0423\\u0433\\u0433\\u0438 \\u0421\\u0430\\u043f\\u043e\\u0433\\u0438"},{"username":"adakoenig","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11371282_1021587161227203_1234573892_a.jpg","id":"193305910","full_name":"Alexandra Marchenko"},{"username":"joniimapaulin","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11311130_410396642478401_1556302454_a.jpg","id":"1730509692","full_name":"JONII MA PAULIN PARIS"},{"username":"king_darius_vii","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/11349159_536083293213731_471716927_a.jpg","id":"1368763183","full_name":"\\ud83d\\udd31 Darius Mathis \\ud83d\\udd31"}]},"created_time":"1455778689","type":"image","id":"1187480170131625003_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BB6wvA3hBfu","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12748298_1693040694314421_368123729_n.jpg?ig_cache_key=MTE4NzQ3NTc4ODc0NDg5MDM1MA%3D%3D.2.l","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/c100.0.403.403\\/12748176_1710982289122767_1725833957_n.jpg?ig_cache_key=MTE4NzQ3NTc4ODc0NDg5MDM1MA%3D%3D.2.c","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s480x480\\/e35\\/12748298_1693040694314421_368123729_n.jpg?ig_cache_key=MTE4NzQ3NTc4ODc0NDg5MDM1MA%3D%3D.2.l","width":480,"height":480}},"can_view_comments":true,"comments":{"count":1,"data":[{"created_time":"1455836817","text":"Nice. I love watching people putting themselves out there \\ud83d\\udc4d Let''s see more.","from":{"username":"chrisbroyart","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11184567_1605646919714616_1031289653_a.jpg","id":"1313756","full_name":"Christopher Broy"},"id":"1187967782533469352"}]},"alt_media_url":null,"caption":{"created_time":"1455778166","text":"Cherchez la femme... ;) ... \\u043d\\u043e \\u0438\\u0449\\u0438\\u0442\\u0435 \\u043d\\u0430\\u0441\\u0442\\u043e\\u044f\\u0449\\u0443\\u044e \\u0436\\u0435\\u043d\\u0449\\u0438\\u043d\\u0443!! \\u0421\\u043e \\u0432\\u0440\\u0435\\u043c\\u0435\\u043d\\u0435\\u043c \\u0432\\u0441\\u0435\\u043c\\u0443 \\u043c\\u043e\\u0436\\u043d\\u043e \\u043d\\u0430\\u0443\\u0447\\u0438\\u0442\\u044c\\u0441\\u044f, \\u043d\\u043e \\u0448\\u0430\\u0440\\u043c, \\u0436\\u0435\\u043d\\u0441\\u0442\\u0432\\u0435\\u043d\\u043d\\u043e\\u0441\\u0442\\u044c, \\u0438\\u0441\\u043a\\u0443\\u0441\\u0441\\u0442\\u0432\\u043e \\u043e\\u0431\\u043e\\u043b\\u044c\\u0449\\u0435\\u043d\\u0438\\u044f \\u0434\\u0430\\u044e\\u0442\\u0441\\u044f \\u043d\\u0430\\u0441\\u0442\\u043e\\u044f\\u0449\\u0435\\u0439 \\u0436\\u0435\\u043d\\u0449\\u0438\\u043d\\u0435 \\u043e\\u0442 \\u043f\\u0440\\u0438\\u0440\\u043e\\u0434\\u044b \\u043f\\u0440\\u0438 \\u0440\\u043e\\u0436\\u0434\\u0435\\u043d\\u0438\\u0438! \\u041e\\u043d\\u0438 \\u0443 \\u043d\\u0435\\u0435 \\u0432 \\u043a\\u0440\\u043e\\u0432\\u0438! \\n\\u041d\\u0430\\u0448\\u0430 \\u0418\\u0440\\u043e\\u0447\\u043a\\u0430 \\u0442\\u043e\\u0447\\u043d\\u043e \\u0437\\u043d\\u0430\\u0435\\u0442, \\u0447\\u0442\\u043e \\u044d\\u0442\\u043e \\u0438\\u043c\\u0435\\u043d\\u043d\\u043e \\u0442\\u0430\\u043a ;) #theonemag #the_one #magazine #new #magic #beauty #color #surprise #original #best #amazing #great #create #edition #idea #decor #design #flora #world #shiny #love #like #smile #happy #art #interesting #inspiration #black #gold","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1187475792234550892"},"link":"https:\\/\\/www.instagram.com\\/p\\/BB6wvA3hBfu\\/","likes":{"count":26,"data":[{"username":"delitefulybee","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12729542_1709952979220985_1622528759_a.jpg","id":"192436876","full_name":"\\ud83d\\udc8bDelitefulybee\\ud83d\\udc8b\\u2800\\u2800"},{"username":"threadsailor","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552272_1024705944265639_2131823445_a.jpg","id":"2108302336","full_name":"Thread \\u0026 Sailor Boutique"},{"username":"bethanyrenee94","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12534232_855852774532171_115113775_a.jpg","id":"2533538311","full_name":"Bethany Russell"},{"username":"excellentlynicole","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12446151_235409863461725_657854393_a.jpg","id":"2182971929","full_name":"Nicole Lytwyn"}]},"created_time":"1455778166","type":"image","id":"1187475788744890350_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BB2wj37hBUV","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12627957_1049542305110362_613748242_n.jpg?ig_cache_key=MTE4NjM0OTEyMzMyNzIzNTM0OQ%3D%3D.2","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/12627957_1049542305110362_613748242_n.jpg?ig_cache_key=MTE4NjM0OTEyMzMyNzIzNTM0OQ%3D%3D.2","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s640x640\\/sh0.08\\/e35\\/12627957_1049542305110362_613748242_n.jpg?ig_cache_key=MTE4NjM0OTEyMzMyNzIzNTM0OQ%3D%3D.2","width":640,"height":640}},"can_view_comments":true,"comments":{"count":0,"data":[]},"alt_media_url":null,"caption":{"created_time":"1455643857","text":"\\u042f \\u0432\\u0441\\u0435\\u0433\\u0434\\u0430 \\u0431\\u044b\\u043b \\u0443\\u0431\\u0435\\u0436\\u0434\\u0435\\u043d, \\u0447\\u0442\\u043e \\u0436\\u0435\\u043d\\u0449\\u0438\\u043d\\u044b \\u043e\\u0431\\u043b\\u0430\\u0434\\u0430\\u044e\\u0442 \\u0441\\u0432\\u0435\\u0440\\u0445\\u044a\\u0435\\u0441\\u0442\\u0435\\u0441\\u0442\\u0432\\u0435\\u043d\\u043d\\u043e\\u0439 \\u0441\\u043f\\u043e\\u0441\\u043e\\u0431\\u043d\\u043e\\u0441\\u0442\\u044c\\u044e \\u0437\\u043d\\u0430\\u0442\\u044c, \\u0447\\u0442\\u043e \\u043f\\u0440\\u043e\\u0438\\u0441\\u0445\\u043e\\u0434\\u0438\\u0442 \\u0432 \\u0434\\u0443\\u0448\\u0435 \\u043c\\u0443\\u0436\\u0447\\u0438\\u043d\\u044b. \\u0412\\u0441\\u0435 \\u043e\\u043d\\u0438 \\u2014 \\u0432\\u0435\\u0434\\u044c\\u043c\\u044b.\\n(\\u041f\\u0430\\u0443\\u043b\\u043e \\u041a\\u043e\\u044d\\u043b\\u044c\\u043e. \\u0412\\u0435\\u0434\\u044c\\u043c\\u0430 \\u0441 \\u041f\\u043e\\u0440\\u0442\\u043e\\u0431\\u0435\\u043b\\u043b\\u043e)\\nThe ONE \\u043f\\u0440\\u0435\\u0434\\u0443\\u043f\\u0440\\u0435\\u0436\\u0434\\u0430\\u0435\\u0442! \\u041f\\u043e\\u043e\\u0441\\u0442\\u043e\\u0440\\u043e\\u0436\\u043d\\u0435\\u0439 \\u0441 \\u043d\\u0430\\u0448\\u0438\\u043c \\u0433\\u043b\\u0430\\u0432\\u043d\\u044b\\u043c \\u0440\\u0435\\u0434\\u0430\\u043a\\u0442\\u043e\\u0440\\u043e\\u043c! \\u041c\\u0430\\u043b\\u043e \\u043b\\u0438 \\u0447\\u0442\\u043e...\\ud83d\\ude09\\n#theonemag #the_one #magazine #new #magic #beauty #color #surprise #original #best #amazing #great #create #edition #idea #decor #design # #love #like #like4like #follow4follow #follow #followme  #smile #happy #art #interesting #inspiration #black #gold","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1186350220196451612"},"link":"https:\\/\\/www.instagram.com\\/p\\/BB2wj37hBUV\\/","likes":{"count":6,"data":[{"username":"tracyd971","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12728553_182721562097646_1136690421_a.jpg","id":"2322136426","full_name":"Tracy Derrick"},{"username":"anna_ann_s","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12445992_135726006802959_1626105719_a.jpg","id":"309586041","full_name":"\\u0410\\u043d\\u043d\\u0430 S"},{"username":"galina.zaharova","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12716819_731977993606469_1452758080_a.jpg","id":"1499560441","full_name":"\\u0413\\u0430\\u043b\\u0438\\u043d\\u0430 \\u0417\\u0430\\u0445\\u0430\\u0440\\u043e\\u0432\\u0430"},{"username":"the_one_agency","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12139694_1620737564857710_384081431_a.jpg","id":"636633177","full_name":"The ONE AGENCY"}]},"created_time":"1455643857","type":"image","id":"1186349123327235349_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BB2C_I3hBcb","location":{"name":"\\u041c\\u0432\\u0446 - \\u0411\\u0440\\u043e\\u0432\\u0430\\u0440\\u0441\\u043a\\u043e\\u0439 \\u041f\\u0440\\u043e\\u0441\\u043f\\u0435\\u043a\\u0442"},"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12627921_1685216158384819_1462724774_n.jpg?ig_cache_key=MTE4NjE0ODY4NjgwMDA5OTA5OQ%3D%3D.2.l","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/c85.0.433.433\\/12677443_162338557480492_1129527231_n.jpg?ig_cache_key=MTE4NjE0ODY4NjgwMDA5OTA5OQ%3D%3D.2.c","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s480x480\\/e35\\/12627921_1685216158384819_1462724774_n.jpg?ig_cache_key=MTE4NjE0ODY4NjgwMDA5OTA5OQ%3D%3D.2.l","width":480,"height":480}},"can_view_comments":true,"comments":{"count":1,"data":[{"created_time":"1455620641","text":"This is amazing \\ud83d\\ude04","from":{"username":"pippatuckers00","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12407210_932955086783524_1071838313_a.jpg","id":"219043725","full_name":"Pippa"},"id":"1186154368756619039"}]},"alt_media_url":null,"caption":{"created_time":"1455619963","text":"\\u042d\\u0442\\u043e \\u0438\\u043d\\u0442\\u0435\\u0440\\u0435\\u0441\\u043d\\u043e\\u0435 \\u0438 \\u044f\\u0440\\u043a\\u043e\\u0435 \\u0441\\u043e\\u0431\\u044b\\u0442\\u0438\\u0435 \\u0441\\u0432\\u0430\\u0434\\u0435\\u0431\\u043d\\u043e\\u0433\\u043e \\u043c\\u0438\\u0440\\u0430 \\u0436\\u0434\\u0443\\u0442 \\u043d\\u0435 \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043d\\u0435\\u0432\\u0435\\u0441\\u0442\\u044b, \\u043d\\u043e \\u0438 \\u043c\\u044b, \\u0447\\u0442\\u043e\\u0431\\u044b \\u0432\\u043d\\u043e\\u0432\\u044c \\u0432\\u0441\\u0442\\u0440\\u0435\\u0442\\u0438\\u0442\\u044c\\u0441\\u044f \\u0441 \\u0432\\u0430\\u043c\\u0438, \\u043f\\u043e\\u0440\\u0430\\u0434\\u043e\\u0432\\u0430\\u0442\\u044c \\u043d\\u043e\\u0432\\u044b\\u043c\\u0438 \\u0432\\u044b\\u043f\\u0443\\u0441\\u043a\\u0430\\u043c\\u0438 \\u0436\\u0443\\u0440\\u043d\\u0430\\u043b\\u0430 The ONE \\u0438 \\u043d\\u0430\\u0441\\u043b\\u0430\\u0434\\u0438\\u0442\\u0441\\u044f \\u0432\\u0434\\u043e\\u0445\\u043d\\u043e\\u0432\\u043b\\u044f\\u044e\\u0449\\u0435\\u0439 \\u043a\\u0440\\u0430\\u0441\\u043e\\u0442\\u043e\\u0439! \\u041c\\u044b \\u0443\\u0436\\u0435 \\u0433\\u043e\\u0442\\u043e\\u0432\\u0438\\u043c\\u0441\\u044f! \\u0410 \\u0432\\u044b \\u0442\\u0430\\u043c \\u0431\\u0443\\u0434\\u0435\\u0442\\u0435?? #wedding #weddingexhibition #2016 #theone #best #the_one_mag #the_one_agency #professional #amazing #beauty #bride #groom #dress #flora #decor #design #kiev #ukraine #soon #follow #welcome #inspiration #invite #love #like #celebration #spring","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1186148690633692332"},"link":"https:\\/\\/www.instagram.com\\/p\\/BB2C_I3hBcb\\/","likes":{"count":15,"data":[{"username":"beautyjinn","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11094453_384175241754580_1560296242_a.jpg","id":"1788302371","full_name":"\\u0421\\u0430\\u043b\\u043e\\u043d \\u041a\\u0440\\u0430\\u0441\\u043e\\u0442\\u044b Beauty Jinn"},{"username":"dolcesposa","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11193036_1598997083673129_513370302_a.jpg","id":"1948058778","full_name":"\\u0421\\u0432\\u0430\\u0434\\u0435\\u0431\\u043d\\u044b\\u0435 \\u043f\\u043b\\u0430\\u0442\\u044c\\u044f 2016 NEW"},{"username":"sum0515","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552352_1659786697614799_1293267004_a.jpg","id":"2286393438","full_name":"Tiger"},{"username":"elenamorar_official","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11351700_919551881451351_1077908707_a.jpg","id":"1962708862","full_name":"Elena Morar"}]},"created_time":"1455619963","type":"image","id":"1186148686800099099_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BBzu7fuhBZZ","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12748335_191682834528636_1182328443_n.jpg?ig_cache_key=MTE4NTQ5NzUyNTU4MzYxNTU3Nw%3D%3D.2.l","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/c180.0.720.720\\/12627836_790739687694876_1194900390_n.jpg?ig_cache_key=MTE4NTQ5NzUyNTU4MzYxNTU3Nw%3D%3D.2.c","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s640x640\\/sh0.08\\/e35\\/12748335_191682834528636_1182328443_n.jpg?ig_cache_key=MTE4NTQ5NzUyNTU4MzYxNTU3Nw%3D%3D.2.l","width":640,"height":640}},"can_view_comments":true,"comments":{"count":0,"data":[]},"alt_media_url":null,"caption":{"created_time":"1455542339","text":"\\u0423 \\u041d\\u0410\\u0421 \\u041f\\u0420\\u0410\\u0417\\u0414\\u041d\\u0418\\u041a!!!\\ud83c\\udf89\\n\\u0421\\u0435\\u0433\\u043e\\u0434\\u043d\\u044f \\u043c\\u044b \\u043f\\u043e\\u0437\\u0434\\u0440\\u0430\\u0432\\u043b\\u044f\\u0435\\u043c \\u043d\\u0430\\u0448\\u0443 \\u0444\\u0430\\u043d\\u0442\\u0430\\u0441\\u0442\\u0438\\u0447\\u0435\\u0441\\u043a\\u0443\\u044e, \\u043b\\u044e\\u0431\\u0438\\u043c\\u0443\\u044e \\u0410\\u043d\\u0435\\u0447\\u043a\\u0443 \\u0441 \\u0414\\u043d\\u0435\\u043c \\u0420\\u043e\\u0436\\u0434\\u0435\\u043d\\u0438\\u044f!!!\\ud83d\\udc90\\n\\u0410\\u043d\\u044e\\u0442 !! \\u0422\\u044b \\u043f\\u043e\\u0442\\u0440\\u044f\\u0441\\u0430\\u044e\\u0449\\u0430\\u044f \\u0432\\u043e \\u0432\\u0441\\u0435\\u0445 \\u0441\\u043c\\u044b\\u0441\\u043b\\u0430\\u0445, \\u0442\\u0432\\u043e\\u0451 \\u0432\\u043d\\u0443\\u0442\\u0440\\u0435\\u043d\\u043d\\u0435\\u0435 \\u0441\\u0432\\u0435\\u0447\\u0435\\u043d\\u0438\\u0435 \\u0438 \\u043a\\u0440\\u0430\\u0441\\u043e\\u0442\\u0430 \\u043e\\u0434\\u043d\\u043e\\u0437\\u043d\\u0430\\u0447\\u043d\\u043e \\u0434\\u0435\\u043b\\u0430\\u044e\\u0442 \\u043c\\u0438\\u0440 \\u043b\\u0443\\u0447\\u0448\\u0435, \\u0430 \\u0434\\u043e\\u0431\\u0440\\u043e\\u0435 \\u0441\\u0435\\u0440\\u0434\\u0446\\u0435, \\u043f\\u043e\\u0437\\u0438\\u0442\\u0438\\u0432, \\u043e\\u0431\\u0430\\u044f\\u043d\\u0438\\u0435 \\u0438 \\u043e\\u0442\\u043a\\u0440\\u044b\\u0442\\u0430\\u044f \\u0434\\u0443\\u0448\\u0430 \\u043f\\u0440\\u0438\\u0442\\u044f\\u0433\\u0438\\u0432\\u0430\\u044e\\u0442 \\u0438 \\u0437\\u0430\\u0447\\u0430\\u0440\\u043e\\u0432\\u044b\\u0432\\u0430\\u044e\\u0442!! \\u0421\\u0447\\u0430\\u0441\\u0442\\u043b\\u0438\\u0432\\u044b, \\u0447\\u0442\\u043e \\u0442\\u044b \\u0441 \\u043d\\u0430\\u043c\\u0438!!! \\u041b\\u042e\\u0411\\u0418\\u041c \\u0438 \\u0426\\u0415\\u041d\\u0418\\u041c!!!\\ud83d\\udc9b\\nPH - @sobokar \\n#happybirthday #bday #celebrate #theonemag #the_one #magazine #new #magic #beauty #color #surprise #original #best #amazing #great  #edition #idea #decor #design # #love #like #follow #followme  #smile #happy #art #interesting #inspiration #black #gold","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1185498571341042842"},"link":"https:\\/\\/www.instagram.com\\/p\\/BBzu7fuhBZZ\\/","likes":{"count":6,"data":[{"username":"anna_ann_s","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12445992_135726006802959_1626105719_a.jpg","id":"309586041","full_name":"\\u0410\\u043d\\u043d\\u0430 S"},{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},{"username":"aleksandr.tsybrovskyi","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11251941_856081034464905_511388631_a.jpg","id":"1612241448","full_name":"\\u0410\\u043b\\u0435\\u043a\\u0441\\u0430\\u043d\\u0434\\u0440"},{"username":"galina.zaharova","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12716819_731977993606469_1452758080_a.jpg","id":"1499560441","full_name":"\\u0413\\u0430\\u043b\\u0438\\u043d\\u0430 \\u0417\\u0430\\u0445\\u0430\\u0440\\u043e\\u0432\\u0430"}]},"created_time":"1455542339","type":"image","id":"1185497525583615577_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BBr_W5oBBUb","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12568820_1682878431994029_746270790_n.jpg?ig_cache_key=MTE4MzMxNzk3Nzc0ODIxNTA2Nw%3D%3D.2.l","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/c0.135.1080.1080\\/12717016_477578862448229_1884810550_n.jpg?ig_cache_key=MTE4MzMxNzk3Nzc0ODIxNTA2Nw%3D%3D.2.c","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s640x640\\/sh0.08\\/e35\\/12568820_1682878431994029_746270790_n.jpg?ig_cache_key=MTE4MzMxNzk3Nzc0ODIxNTA2Nw%3D%3D.2.l","width":640,"height":640}},"can_view_comments":true,"comments":{"count":1,"data":[{"created_time":"1455324848","text":"Nice!\\ud83d\\udc4c","from":{"username":"iqta.gs","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12424373_436423973212797_309155332_a.jpg","id":"2537011182","full_name":"IQtags"},"id":"1183673077331137973"}]},"alt_media_url":null,"caption":{"created_time":"1455282517","text":"\\u0412\\u0441\\u044f\\u043a\\u0430\\u044f \\u0436\\u0435\\u043d\\u0449\\u0438\\u043d\\u0430 - \\u044d\\u0442\\u043e \\u0442\\u0430\\u0439\\u043d\\u0430 \\u043f\\u043e\\u043a\\u0440\\u044b\\u0442\\u0430\\u044f \\u043f\\u043b\\u0430\\u0442\\u044c\\u0435\\u043c! (\\u041f\\u0435\\u043d\\u0435\\u043b\\u043e\\u043f\\u0430 \\u041a\\u0440\\u0443\\u0437)\\n\\u041c\\u044b \\u0443\\u043c\\u0435\\u0435\\u043c \\u043f\\u0435\\u0440\\u0435\\u0432\\u043e\\u043f\\u043b\\u043e\\u0449\\u0430\\u0442\\u044c\\u0441\\u044f, \\u043c\\u044b \\u0443\\u043c\\u0435\\u0435\\u043c \\u0443\\u0434\\u0438\\u0432\\u043b\\u044f\\u0442\\u044c! \\u041f\\u043e\\u0440\\u043e\\u0439 \\u0441\\u043a\\u0440\\u044b\\u0432\\u0430\\u0435\\u043c \\u0441\\u0432\\u043e\\u0439 \\u043c\\u0438\\u0440, \\u0430 \\u0438\\u043d\\u043e\\u0433\\u0434\\u0430 \\u043e\\u0442\\u043a\\u0440\\u044b\\u0432\\u0430\\u0435\\u043c \\u0435\\u0433\\u043e \\u043e\\u0441\\u043e\\u0431\\u0435\\u043d\\u043d\\u044b\\u043c!\\n\\u041d\\u0430\\u0448\\u0430 \\u043d\\u0435\\u0441\\u0440\\u0430\\u0432\\u043d\\u0435\\u043d\\u043d\\u0430\\u044f \\u0410\\u043d\\u043d\\u0430 \\u0421\\u043e\\u0443\\u0441\\u0442\\u0438\\u043d\\u0430 \\u0434\\u043b\\u044f The ONE Black Edition!\\nPH - @sobokar\\n\\n#theonemag #the_one #magazine #new #magic #beauty #color #surprise #original #best #amazing #great #create #edition #idea #decor #design # #love #like #like4like #follow4follow #follow #followme  #smile #happy #art #interesting #inspiration #black #gold","from":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"},"id":"1183320180101748466"},"link":"https:\\/\\/www.instagram.com\\/p\\/BBr_W5oBBUb\\/","likes":{"count":10,"data":[{"username":"olya_sviridenko","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12237058_1485967505043859_1506621570_a.jpg","id":"2293624882","full_name":"Olga Sviridenko"},{"username":"aleksandr.tsybrovskyi","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/11251941_856081034464905_511388631_a.jpg","id":"1612241448","full_name":"\\u0410\\u043b\\u0435\\u043a\\u0441\\u0430\\u043d\\u0434\\u0440"},{"username":"aira_city_image","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12093752_806538316125444_174861785_a.jpg","id":"1969416653","full_name":"\\u041a\\u043e\\u043c\\u043f\\u0430\\u043d\\u0438\\u044f \\"\\u0410\\u0439\\u0440\\u0430\\""},{"username":"miamitattooco","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12783326_1698414653733786_2102398015_a.jpg","id":"368942226","full_name":"Miami Tattoo Co. \\u00a9\\u2122"}]},"created_time":"1455282517","type":"image","id":"1183317977748215067_791845260","user":{"username":"the_one_mag","profile_picture":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-19\\/s150x150\\/12552461_1053525288001922_321488503_a.jpg","id":"791845260","full_name":"The_one magazine"}},{"can_delete_comments":false,"code":"BBrzrQmBBQ_","location":null,"images":{"low_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s320x320\\/e35\\/12568335_494342784085079_2107897261_n.jpg?ig_cache_key=MTE4MzI2NjYwMDI0MjEyMzgzOQ%3D%3D.2","width":320,"height":320},"thumbnail":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/s150x150\\/e35\\/12568335_494342784085079_2107897261_n.jpg?ig_cache_key=MTE4MzI2NjYwMDI0MjEyMzgzOQ%3D%3D.2","width":150,"height":150},"standard_resolution":{"url":"https:\\/\\/scontent-frt3-1.cdninstagram.com\\/t51.2885-15\\/e35\\/12568335_494342784085079_2107897261_n.jpg?ig_cache_key=MTE4MzI2NjYwMDI0MjEyMzgzOQ%3D%3D.2","width":640,"height":640}},"can_view_comments":true,"comments":{"count":0,"data":[]},"alt_media_ur', 2);
INSERT INTO `setting` (`id`, `key`, `value`, `group`) VALUES
(47, 'instagram_cache_expires', '1456588255', 2),
(48, 'instagram_access_token', NULL, 2),
(52, 'about_block1_image', 'about_block1_image_6b6212a0bd4a463fe48ec32df635a4bc.png', 3),
(53, 'about_block1_text', '<p>Журнал The One о профессионалах, которые делают мир красивее, о наставниках, которые помогут создать прекрасное своими руками, о друзьях, которые подскажут отличные идеи.</p>\r\n\r\n<p>Шедевр состоит из мелочей и вы можете создать его сами!</p>\r\n\r\n<p>Журнал The One - дизайн, декор, флористика и подарки для вашего главного дня! Поверьте, мы вложили в него не только свои знания, опыт и профессионализм, но и душу и отличное настроение!:) Первый выпуск будет посвящен свадьбам. Уверены, что вам будет</p>\r\n', 3),
(54, 'about_block4_image', 'about_block4_image_b19e21a3d6e98c08d945d6a25a385a9a.jpg', 3),
(55, 'about_block2_heading', 'О чём на журнал?', 3),
(56, 'about_block2_text', '<p>О профессионалах, которые делают мир красивее, о наставниках, которые помогут создать прекрасное своими руками, о друзьях, которые подскажут отличные идеи.</p>\r\n\r\n<p>Шедевр состоит из мелочей и вы можете создать его сами!</p>\r\n', 3),
(57, 'about_block3_image', 'about_block3_image_6025ededa74f073652a04236d27c1b65.jpg', 3),
(58, 'about_block3_heading', 'О чем наш журнал?', 3),
(59, 'about_block3_text', '<p>Кружева ― аристократичная классика, о которой мы не устаем вам рассказывать, не первый год неизменно остается в фаворитах. Однако с каждым годом этот романтичный тренд раскрывает все новые грани и оттенки. Во-первых, наконец-то в моду вошли кружева &laquo;со смыслом&raquo;.</p>\r\n\r\n<p>К примеру, у Кейт Миддлтон на фате были изображены все узоры природных элементов Великобритании. Во-вторых, дизайнеры начали использовать цветное кружево, а в-третьих, появился кружевной total look как в одежде, так и в декоре мероприятий и интерьеров.</p>\r\n', 3),
(60, 'about_block4_heading', 'Наши принципы', 3),
(61, 'about_block4_text', '<p>Наши проекты &ndash; это креативность и драматургия! На наших свадьбах все должно работать. Если в вазе стоит прекрасный бутон, то он обязательно распустится. И мы знаем, как цветет папоротник&hellip; Забудьте о стандартах и клише! Поверьте, что все возможно!</p>\r\n\r\n<p>Мы гарантируем идеальный результат даже в самые кратчайшие сроки. Мы работаем только с лучшими специалистами, так как ценим своих клиентов и дорожим своей репутацией.</p>\r\n\r\n<p>Самое большое наше вдохновение &ndash; это наши пары, а главная награда &ndash; их благодарность и счастье. то, что делаем, поэтому всегда работаем в отличном</p>\r\n', 3),
(64, 'category_colors', 'advices-and-ideas', 1),
(65, 'category_colors', 'thematical-weddings', 1),
(66, 'category_colors', 'honeymoon', 1),
(67, 'contact_phones', '[{"nums":["+38 (044) 568-50-46","+38 (044) 234--33-77"],"time":"пн-пт 10:00-19:00"},{"nums":["+38 (050) 311-00-39"],"time":"пн-вс 09:00-21:00"}]', 4),
(68, 'contact_emails', '["office@perepoloh.com.ua","office2@perepoloh.com.ua"]', 4),
(69, 'contact_adress', 'г.Киев\r\nул.Никольско-Ботаническая, 14/7', 4),
(70, 'contact_map_coords', NULL, 4),
(71, 'socials', '[]', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `top_quote` text COLLATE utf8_unicode_ci,
  `main_quote` text COLLATE utf8_unicode_ci,
  `soc_tw` bigint(20) DEFAULT NULL,
  `soc_fb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soc_vk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soc_in` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id`, `name`, `photo`, `profession`, `top_quote`, `main_quote`, `soc_tw`, `soc_fb`, `soc_vk`, `soc_in`, `slug`) VALUES
(6, 'Ольга', '19c96f592089dfbd37e5a81e02f20a4e.png', 'Менеджер агенства', 'Мы отлично знаем, что хороший результат можно получить только благодаря крутой команде.\r\nУ нас она именно такая. Каждый отдается проектам на полную', '<p>Агентство &mdash; это моя жизнь. Я получаю огромное удовольствие от того, что делаю и вкладываю в каждый проект максимум энергии. А еще я обожаю свою команду, благодаря которой мы делаем такие замечательные проекты.</p>\r\n', 123, 'asdfasdfasf', 'adfas', 'asdfas', 'asdfasdf'),
(7, 'Сергей', '1216acde478d56fb2e848e5a8acc892a.png', 'Режисёр', 'Я режисер. И это класно', '<p>Всё таки класно что я режиссёр.</p>\r\n', NULL, '', '', '', 'sergey'),
(8, 'Даниил', 'ed6fea9c016d793ba89c9d8d0a997bf8.png', 'Фотограф', 'Я хорошо фотографирую.', '<p>А ты хорошо фотографируешь?</p>\r\n', NULL, '', '', '', 'danyill');

-- --------------------------------------------------------

--
-- Структура таблицы `term`
--

CREATE TABLE IF NOT EXISTS `term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `term_group_id` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `termFK_term_group` (`term_group_id`),
  KEY `termFK_parent_term` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `term`
--

INSERT INTO `term` (`id`, `term_group_id`, `parent`, `name`, `description`, `slug`) VALUES
(7, 6, 0, 'Зима', 'Зимаааааasdasd', 'winter'),
(13, 6, NULL, 'Весна', 'Весна', 'vesna'),
(14, 6, NULL, 'Лето', 'Летняя пора', 'leto'),
(19, 13, NULL, 'Организация свадьбы', 'Советы по декору.Дельные', 'wedding-organization'),
(20, 13, NULL, 'Образ невесты', 'Образ невесты', 'brides-image'),
(22, 13, NULL, 'Флористика', 'Флористика', 'floristics'),
(23, 13, NULL, 'Декор', 'Статьи на тему декора.Декор Свадеб.', 'decor'),
(24, 6, NULL, 'Осень', 'Осень', 'osen'),
(25, 20, NULL, 'Американская', '', 'american'),
(26, 20, NULL, 'Греческая', '', 'greece'),
(27, 20, NULL, 'Индийская', '', 'indian'),
(28, 21, NULL, 'Деревенская', '', 'village'),
(29, 21, NULL, 'Кантри', '', 'country'),
(30, 22, NULL, 'Чекбокс1', '', 'checkbox1'),
(31, 22, NULL, 'Чекбокс2', '', 'checkbox2'),
(32, 23, NULL, 'Значение для еще одного', '', 'another-one-value'),
(33, 23, NULL, 'И еще одного', '', 'and-another-one');

-- --------------------------------------------------------

--
-- Структура таблицы `term_group`
--

CREATE TABLE IF NOT EXISTS `term_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `type` varchar(32) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `term_group`
--

INSERT INTO `term_group` (`id`, `slug`, `name`, `parent_id`, `type`) VALUES
(2, 'advices-and-ideas', 'Советы и идеи', 0, 'select'),
(5, 'creative-weddings', 'Тематические свадьбы', 0, 'select'),
(6, 'season', 'Сезон', 5, 'checkbox'),
(13, 'subcategory', 'Подкатегория', 2, 'link'),
(16, 'the-one-news', 'Новости', 0, 'select'),
(17, 'articles', 'Статьи', 0, 'select'),
(18, 'honeymooon', 'Медовый месяц', 0, 'select'),
(19, 'workshops', 'Мастер-классы', 0, 'select'),
(20, 'country', 'Страна', 5, 'checkbox'),
(21, 'style', 'Стиль', 5, 'checkbox'),
(22, 'checkboxes', 'Чекбоксы', 2, 'checkbox'),
(23, 'another-checkboxes', 'Еще одни чекбоксы', 2, 'checkbox');

-- --------------------------------------------------------

--
-- Структура таблицы `term_to_article`
--

CREATE TABLE IF NOT EXISTS `term_to_article` (
  `term_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  KEY `term_to_articleFK_term` (`term_id`),
  KEY `term_to_articleFK_article` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latlng` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socials` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `slug` (`slug`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `city`, `slug`, `status`, `created_at`, `updated_at`, `avatar`, `role`, `type`, `phone`, `contact_email`, `country`, `adress`, `latlng`, `socials`) VALUES
(1, 'Джон', 'Сноу', 'asdasd', '$2y$13$LC61MTDJWwYDjWPRqE92sOJ9VdZ95Z3./RZl6yWZDfbR/ZdPrkqU2', 'dasda', 'admin@admin.admin', 'Кировоград', 'historical-weddings', 10, 0, 1456478565, '4cdee8bf4cdedbd464ba3ffe30a5efb9.jpg', 'admin', 10, '["123123","qweqeqe","312312"]', '', 'AU', 'вулиця Жолудєва, Київ, Украина', '', ''),
(20, 'asdasdasdas', 'asdad', '', '', NULL, 'asdasd', 'asdasda', 'sdasdasd', 10, 1449752086, 1453297853, 'b3c8b506d52becc5f47f9ac3decb639b.jpg', 'user', 10, '', '', '', '', '', ''),
(21, 'Василий', 'Marabunta', '', '', NULL, 'asd@asda.er', 'asdasd', 'asdasd', 10, 1449756137, 1453282404, 'd44e733fe7a745480fff25fd55b0cb97.jpg', 'user', 10, '', '', '', '', '', ''),
(28, 'zxcvzxcv', 'zxcvzxcvzxcv', '3ZiUuSg9N_z8k4qwE1iKt0iMqgDRdIl5', '$2y$13$Rt1SvztsM0NyAn6SViVHjOYMuNHDc6sr.Px7L7sPVGZhyTtrvP.ca', NULL, 'bzxzxbxcbzxc@vcnbnpocn.rt', '', 'user_vQ6SBj5b', 5, 1452847030, 1454672464, '8ae263bce8790978ba7b0db5483c0a58.jpg', 'user', 10, '', '', '', '', '', ''),
(29, '', '', 'VXmRNxEaf9K1XXwmLpU8P1Yht_aj4ceq', '$2y$13$qXpLshLRu2SHkJs7lbRe0u/m8oZ4BOMqxt2R3txFXACt7u37INHFu', NULL, 'zxccxz@zxcxcz.zxccxz', '', 'user_7yLVKMPy', 5, 1453223960, 1453284465, '12cba84bf1a9a615934ccc0610d1e54d.jpg', 'user', 10, '', '', '', '', '', ''),
(31, NULL, NULL, 'm9WyKeTQcrmmkpCtFjfn8CjDAly89Gv3', '$2y$13$LnJMoR6mcor8fzTs.3f3.Osc.Jl5cxiQ3TXtQJjKMMgd91L4iy7sO', NULL, 'neuser@neuser.up', '', 'user_tLlt-RvZ', 5, 1454499456, 1454499456, '', '', 0, '', '', '', '', '', ''),
(33, 'Евгений', 'Потапенко', 'kpZbIpBahdvozZDNY6jgqiSPUNv-ZWAL', '$2y$13$czJBLtKmUfRrLHQyeXDfYu8JqErsdbXzPqzltlOXgBPWVHnt5o1Im', NULL, 'asd@asd.asd', 'Силикон Велий', '2222231313123123123123123', 10, 1454500085, 1456307057, 'eeba958c72a6576b164a73abfdff3b33.jpg', 'user', 10, '["+3(093) 7236 444"]', 'asdasd@asdasdadad.er11', '', '', '', ''),
(35, 'Евгенийa12', 'Потапенко', 'JLGTsTuKRd-HhxBQWrD9QkmnIhvQ42m-', '$2y$13$M6NFB/aOMZB7bLBHYckNF.OCQfgm8gyNIyprNlSc7xG3zC3n11LOu', NULL, 'injericho@gmail.com', 'льво', 'jerichozis', 10, 1456488458, 1456500530, 'af6c1a7e76fee200db6ffa114987b631.jpg', 'user', 10, '["+3 0937236477","+31231231 123123 ","1231541 41 1515 151 "]', '', 'AU', 'улица', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user_likes_to_pro`
--

CREATE TABLE IF NOT EXISTS `user_likes_to_pro` (
  `user_id` int(11) DEFAULT NULL,
  `professional_id` int(11) DEFAULT NULL,
  KEY `user_likes_to_proFK_user` (`user_id`),
  KEY `user_likes_to_proFK_professional` (`professional_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_likes_to_pro`
--

INSERT INTO `user_likes_to_pro` (`user_id`, `professional_id`) VALUES
(1, 28),
(33, 20),
(33, 28),
(33, 33),
(1, 33),
(1, 29),
(1, 1),
(1, 20),
(35, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `user_media`
--

CREATE TABLE IF NOT EXISTS `user_media` (
  `user_id` int(11) DEFAULT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumbnail_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_mediaFK` (`user_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `user_media`
--

INSERT INTO `user_media` (`user_id`, `url`, `type`, `id`, `thumbnail_url`, `order`) VALUES
(1, '5c07c768625d8c4acebead6cf6a3ba46.jpg', 'image', 44, 'http://the-one.rcl/img/thumbnail/5c07c768625d8c4acebead6cf6a3ba46.jpg', 1),
(1, 'https://www.youtube.com/watch?v=Xatpy4p6WVU', 'video', 45, 'http://img.youtube.com/vi/Xatpy4p6WVU/0.jpg', 2),
(1, '40542413fbac05094355ffe8cddb5ec7.jpg', 'image', 46, 'http://the-one.rcl/img/thumbnail/40542413fbac05094355ffe8cddb5ec7.jpg', 5),
(1, 'https://vimeo.com/96795096', 'video', 47, 'https://i.vimeocdn.com/video/476955437_200x150.jpg', 4),
(1, 'https://www.youtube.com/watch?v=NXaT7-McFcw', 'video', 49, 'http://img.youtube.com/vi/NXaT7-McFcw/0.jpg', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `user_professional_info`
--

CREATE TABLE IF NOT EXISTS `user_professional_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `views` bigint(20) DEFAULT NULL,
  `rate_average` smallint(2) DEFAULT '0',
  `organisation_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organisation_info` text COLLATE utf8_unicode_ci,
  `likes` bigint(20) DEFAULT '0',
  `website` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `soc_vk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soc_tw` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soc_fb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating_delta` int(11) DEFAULT NULL,
  `likes_delta` int(11) DEFAULT NULL,
  `soc_vine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soc_i` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `media_json` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `user_professional_info`
--

INSERT INTO `user_professional_info` (`user_id`, `views`, `rate_average`, `organisation_name`, `organisation_info`, `likes`, `website`, `lat`, `lng`, `soc_vk`, `soc_tw`, `soc_fb`, `adress`, `rating_delta`, `likes_delta`, `soc_vine`, `soc_i`, `media_json`) VALUES
(1, 1, NULL, 'Исторические свадьбы', 'О нашей компании можно сказать многое.И этим всё сказано.', 0, 'www.site.org', NULL, NULL, '', '', '', 'asdfasdf', 123, 0, '', '', ''),
(20, 6, NULL, 'DJ Tapolsky', '<p>Анатолий Тапольский родился в 1976 г. в Украине. С 1995 по 2002 на разных радиостанциях вёл радио-шоу. Сейчас является постоянным ведущим своего радио-шоу Time 2 Bass вещающем на радиостанции электронной музыки Kiss Fm.<br />\r\nИграть Тапольский начал в 1996 г. Предпочтение отдаёт drum-n-bass и всем его направлениям.</p>\r\n\r\n<p>Начиная с 2005 года Тапольский пишет музыку вместе с украинским популярным проектом Redco. Spring Morning, трек созданный Тапольским и Redco буквально взорвал радиоэфиры, являясь долгое время одним из самых часто звучащих в радиоэфирах Украины. В 2005 г. Тапольский получает приз на территории TopDJ за особый вклад в культуру d-n-b.</p>\r\n\r\n<p>Единственный в Украине лейбл d-n-b Фрагменты Звукозапись принадлежит Анатолию Тапольскому, выпускающий музыку направления d-n-b, а также DJ миксов.</p>\r\n', 0, '', NULL, NULL, '', '', '', 'Ул.Гуликова 1', 0, 0, '', '', ''),
(21, 0, NULL, 'Вокал "Алёшка"', '', 0, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '', ''),
(28, 4, NULL, 'Группа "Григорашки" ', '', 0, '', NULL, NULL, '', '', '', '', NULL, NULL, '', '', ''),
(29, 3, NULL, 'ВИА "Поехавшая Коробка"', '', 0, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '', ''),
(31, 0, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(33, 5, NULL, 'Василий сергеич122222222', 'Мы можем Многое!', 0, '', NULL, NULL, '', '', '', '', NULL, NULL, '', '', '[]'),
(35, 1, 0, 'Энтерпрайз', 'Мы занимаемся многим', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user_rating_delta`
--

CREATE TABLE IF NOT EXISTS `user_rating_delta` (
  `user_professional_id` int(11) DEFAULT NULL,
  `dalta` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_to_fav_article`
--

CREATE TABLE IF NOT EXISTS `user_to_fav_article` (
  `article_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  KEY `user_to_fav_articlesFK_article` (`article_id`),
  KEY `user_to_fav_articlesFK_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_to_fav_article`
--

INSERT INTO `user_to_fav_article` (`article_id`, `user_id`) VALUES
(101, 1),
(102, 1),
(100, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_to_fav_professional`
--

CREATE TABLE IF NOT EXISTS `user_to_fav_professional` (
  `user_id` int(11) DEFAULT NULL,
  `professional_id` int(11) DEFAULT NULL,
  KEY `user_to_fav_professionalFK_user` (`user_id`),
  KEY `user_to_fav_professionalFK_professional` (`professional_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_weds_events`
--

CREATE TABLE IF NOT EXISTS `user_weds_events` (
  `user_id` int(11) DEFAULT NULL,
  `event_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `user_weds_eventsFK` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `commentsFK_user_author` FOREIGN KEY (`user_author_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `commentsFK_user_professional` FOREIGN KEY (`user_professional_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `group_to_professional`
--
ALTER TABLE `group_to_professional`
  ADD CONSTRAINT `group_to_professionalFK_group` FOREIGN KEY (`group_id`) REFERENCES `professional_group` (`id`),
  ADD CONSTRAINT `group_to_professionalFK_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `route_to_banner`
--
ALTER TABLE `route_to_banner`
  ADD CONSTRAINT `route_to_bannerFK_banner` FOREIGN KEY (`banner_id`) REFERENCES `banner` (`id`),
  ADD CONSTRAINT `route_to_bannerFK_route` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`);

--
-- Ограничения внешнего ключа таблицы `term`
--
ALTER TABLE `term`
  ADD CONSTRAINT `termFK_term_group` FOREIGN KEY (`term_group_id`) REFERENCES `term_group` (`id`);

--
-- Ограничения внешнего ключа таблицы `term_to_article`
--
ALTER TABLE `term_to_article`
  ADD CONSTRAINT `term_to_articleFK_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `term_to_articleFK_term` FOREIGN KEY (`term_id`) REFERENCES `term` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_likes_to_pro`
--
ALTER TABLE `user_likes_to_pro`
  ADD CONSTRAINT `user_likes_to_proFK_professional` FOREIGN KEY (`professional_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_likes_to_proFK_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_media`
--
ALTER TABLE `user_media`
  ADD CONSTRAINT `user_mediaFK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_professional_info`
--
ALTER TABLE `user_professional_info`
  ADD CONSTRAINT `user_professional_infoFK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_to_fav_article`
--
ALTER TABLE `user_to_fav_article`
  ADD CONSTRAINT `user_to_fav_articlesFK_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `user_to_fav_articlesFK_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_to_fav_professional`
--
ALTER TABLE `user_to_fav_professional`
  ADD CONSTRAINT `user_to_fav_professionalFK_professional` FOREIGN KEY (`professional_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_to_fav_professionalFK_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_weds_events`
--
ALTER TABLE `user_weds_events`
  ADD CONSTRAINT `user_weds_eventsFK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
