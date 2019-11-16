-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Nov-2019 às 19:05
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` varchar(400) NOT NULL,
  `endereco` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`id`, `titulo`, `texto`, `endereco`) VALUES
(11, 'fome', 'qwewqe', 'arquivos/763825c9fee478d7f54f5e4e964ffb51.php'),
(12, 'fome', 'qwewqe', 'arquivos/66dcd0cd2be024545a16c9bd32d2ae02.php'),
(13, 'tedio', 'asd', 'arquivos/562ac36b777fccbc08bddb71fd7ebb74.php'),
(14, 'tedio', 'asd', 'arquivos/36dc2882085fb3dd51310e9a4d12dec1.php'),
(15, 'tedio', 'asd', 'arquivos/dd1bcd9ecadcf534466a38cb92124c1b.php'),
(16, 'interner ruim', 'asdasdasdas1 5asd\r\nasdasdqweqwr', 'arquivos/b67e69885ee63765d0505dd1c1b6f50f.php'),
(17, 'Lorem Ipsum Dolor Sit Amet', 'lorem ipsum dolor asdasdsad\r\nlorem ipsum dolor asdasdsad\r\nlorem ipsum dolor asdasdsad\r\nlorem ipsum dolor asdasdsad\r\nlorem ipsum dolor asdasdsad\r\nlorem ipsum dolor asdasdsad', 'arquivos/f6d6cecfaec3a434228b3ff31c013561.php'),
(18, 'asdasdas', 'aaaaaaaaaaaaaaa\r\ndddddddddddddd', 'arquivos/9e3cc31932f9a1ca2b5694efc6c70bb7.php'),
(19, 'poihjkhjkh', 'ewjnjednjdddeews', 'arquivos/bd3163779310470177a59112e7834b10.php'),
(20, 'computador lento', 'ooga ooga, meu computador é muito lento ooga booga', 'arquivos/15553af51819163dfd7bed0613ccf08f.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teste`
--
ALTER TABLE `teste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
