-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-06-03 10:58
-- 서버 버전: 10.4.24-MariaDB
-- PHP 버전: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `inboard`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `freeboard`
--

CREATE TABLE `freeboard` (
  `no` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `wdate` datetime NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `freeboard`
--

INSERT INTO `freeboard` (`no`, `name`, `email`, `pass`, `title`, `content`, `wdate`, `view`) VALUES
(1, '임민재', 'green@gmail.com', '1234', '오늘날씨 더움', '오늘날씨 매우 더움!', '2022-06-02 17:12:30', 1),
(2, '임민재', 'impaerior@daum.net', '1234', '지금 시간은 6시', '지금 시간은 6시', '2022-06-02 17:58:48', 5),
(3, '연습', 'green@gmail.com', '1234', 'UPDATE 연습', 'UPDATE 연습 진행중 입니다.', '2022-06-03 17:32:13', 7),
(4, '바보', 'green@gmail.com', '1234', '콤마가 없었다!', '오타 작렬!', '2022-06-03 17:29:50', 8);

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `no` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userphone` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`no`, `userid`, `userpass`, `username`, `useremail`, `userphone`, `address`) VALUES
(1, 'blue', '1111', 'blue', 'blue@naver.com', '010-123-4567', '서울시 강남구 역삼동'),
(2, 'pink', '1234', 'pink', 'pink@naver.com', '010-123-7777', '06035 서울 강남구 가로수길 17 B빌딩 10층');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `freeboard`
--
ALTER TABLE `freeboard`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`no`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `freeboard`
--
ALTER TABLE `freeboard`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
