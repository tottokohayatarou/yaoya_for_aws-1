-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 5 月 16 日 18:47
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `shop`
--

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
(6, 1),
(2, 2),
(3, 2),
(4, 3),
(5, 1),
(7, 4),
(8, 5),
(9, 3),
(10, 4);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
