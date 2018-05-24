-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2018 pada 00.16
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `listbooks`
--

CREATE TABLE `listbooks` (
  `books_id` int(5) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `date_published` date NOT NULL,
  `number_of_pages` int(11) NOT NULL,
  `type_of_book_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `listbooks`
--

INSERT INTO `listbooks` (`books_id`, `title`, `author`, `date_published`, `number_of_pages`, `type_of_book_id`) VALUES
(1, 'book name 1', 'author name 1', '2018-02-04', 150, 1),
(2, 'book title 2', 'author name 1', '2018-02-04', 150, 3),
(3, 'book name 3', 'author name 1', '2018-02-04', 150, 1),
(4, 'book name 4', 'author name 4', '2018-02-05', 200, 1),
(5, 'book title 5', 'author name 4', '2018-02-05', 200, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_of_book`
--

CREATE TABLE `type_of_book` (
  `type_of_book_id` int(5) NOT NULL,
  `type_of_book` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `type_of_book`
--

INSERT INTO `type_of_book` (`type_of_book_id`, `type_of_book`) VALUES
(1, 'Novel'),
(2, 'Documentation'),
(3, 'Other');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `listbooks`
--
ALTER TABLE `listbooks`
  ADD PRIMARY KEY (`books_id`);

--
-- Indeks untuk tabel `type_of_book`
--
ALTER TABLE `type_of_book`
  ADD PRIMARY KEY (`type_of_book_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `listbooks`
--
ALTER TABLE `listbooks`
  MODIFY `books_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
