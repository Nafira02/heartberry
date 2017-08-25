-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Agu 2017 pada 06.22
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hbms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `pass`) VALUES
(11, 'admin', '123'),
(22, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `elderly`
--

CREATE TABLE IF NOT EXISTS `elderly` (
`id_elderly` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `born` date NOT NULL,
  `room` int(11) NOT NULL,
  `information` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `elderly`
--

INSERT INTO `elderly` (`id_elderly`, `name`, `born`, `room`, `information`) VALUES
(10, 'nana', '1887-12-13', 1, 'normal'),
(20, 'lala', '1889-12-13', 2, 'normal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `heartbeat`
--

CREATE TABLE IF NOT EXISTS `heartbeat` (
`id_hb` int(11) NOT NULL,
  `id_elderly` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `heartbeat` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `heartbeat`
--

INSERT INTO `heartbeat` (`id_hb`, `id_elderly`, `date`, `heartbeat`) VALUES
(3, 20, '2017-09-09 09:29:35', 85),
(4, 20, '2017-08-09 09:30:35', 100),
(5, 10, '2017-08-09 09:29:35', 78),
(6, 10, '2017-08-09 09:30:35', 90),
(7, 10, '2017-08-09 05:17:28', 80),
(8, 20, '2017-08-09 07:13:46', 112),
(9, 10, '2017-08-09 06:22:24', 90),
(10, 10, '2017-08-09 05:13:27', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elderly`
--
ALTER TABLE `elderly`
 ADD PRIMARY KEY (`id_elderly`);

--
-- Indexes for table `heartbeat`
--
ALTER TABLE `heartbeat`
 ADD PRIMARY KEY (`id_hb`), ADD KEY `id_elderly` (`id_elderly`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elderly`
--
ALTER TABLE `elderly`
MODIFY `id_elderly` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `heartbeat`
--
ALTER TABLE `heartbeat`
MODIFY `id_hb` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `heartbeat`
--
ALTER TABLE `heartbeat`
ADD CONSTRAINT `heartbeat_ibfk_1` FOREIGN KEY (`id_elderly`) REFERENCES `elderly` (`id_elderly`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
