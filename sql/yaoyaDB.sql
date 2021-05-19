-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 5 月 19 日 21:24
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `yaoya`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite`
--

CREATE TABLE `favorite` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `favorite`
--

INSERT INTO `favorite` (`user_id`, `product_id`) VALUES
(1, 2),
(1, 11);

-- --------------------------------------------------------

--
-- テーブルの構造 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `image_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image_name`) VALUES
(1, 'ミニトマト/オーガニックエコフェスタ優秀賞受賞‼︎ 有機JAS認定', 3240, 'image2.jpg'),
(2, 'これがブロッコリーに見えるか？', 2700, 'tomato.jpg'),
(3, '無農薬・無化学肥料・動物性不使用・ 新玉ねぎ（固定種）1.5Kg', 2300, 'onion.jpg'),
(4, '無農薬・無化学肥料・動物性不使用・ ミニトマト/500g ×4パック', 3220, 'tomato.jpg'),
(5, '【無農薬・無肥料】生命力あふれる旬にんじん', 2200, 'ninhin.jpg'),
(6, '最高品種！無農薬 北海道産じゃがいも15個', 550, 'imo.jpg'),
(7, '無農薬・無化学肥料・動物性不使用・ 茄子（固定種）', 420, 'nasu.jpg'),
(8, '無農薬・無化学肥料・動物性不使用・ 茄子（固定種） だと思うじゃん？', 39800, 'nasu.jpg'),
(9, 'レタス/オーガニックエコフェスタ優秀賞受賞‼︎ 有機JAS認定3こセット', 1420, 'retasu.jpg'),
(10, 'パプリカ/オーガニックエコフェスタ優秀賞受賞‼︎ 有機JAS認定', 890, 'papurika.jpg'),
(11, 'ただの人参だとおもうな？', 180000, 'ninhin.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `purchase`
--

INSERT INTO `purchase` (`id`, `user_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `purchase_detail`
--

INSERT INTO `purchase_detail` (`purchase_id`, `product_id`, `count`) VALUES
(1, 1, 2),
(1, 3, 3),
(2, 1, 2),
(2, 2, 3),
(2, 3, 1),
(3, 1, 2),
(5, 2, 4),
(5, 8, 5),
(6, 11, 2),
(7, 1, 8),
(8, 3, 0),
(8, 5, 2),
(8, 9, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, '赤松 来樹の裏垢', 'a@gmail.com', 'a'),
(12, '赤松 来樹', 'akamatsu@gmail.com', 'akamatsupass'),
(13, '吉田 慶音', 'yosida@gmail.com', 'yoshidapass'),
(14, '大神 香奈子', 'oogami@gmail.com', 'oogamipass'),
(15, '松丸 直樹', 'matsumaru@gmail.com', 'matsumarupass');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`purchase_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- テーブルの制約 `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- テーブルの制約 `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD CONSTRAINT `purchase_detail_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`),
  ADD CONSTRAINT `purchase_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
