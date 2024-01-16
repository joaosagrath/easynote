-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/12/2023 às 21:17
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `easynote`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `ra` int(10) NOT NULL,
  `aluno` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `emprestimo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `ra`, `aluno`, `cpf`, `curso`, `email`, `telefone`, `password`, `emprestimo`) VALUES
(2, 504473, 'Adilson', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(3, 503751, 'Adrieli', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(4, 505957, 'Ahmed', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(5, 505927, 'Alessandro', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(6, 504756, 'Alessandro', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(7, 505912, 'Alexandre', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(8, 505355, 'Ali', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(9, 505614, 'Allan', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(10, 503796, 'Allyson', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(11, 505965, 'Amilton', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(12, 505583, 'Amir', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(13, 504964, 'Amira', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(14, 505285, 'Ana', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(15, 505235, 'Ana', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(16, 503626, 'Ana', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(17, 505503, 'Ana', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(18, 505566, 'Anderson', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(19, 503231, 'Anderson', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(20, 500010, 'Anderson', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(21, 503908, 'Andre', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(22, 504650, 'Andre', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(23, 504886, 'André', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(24, 504040, 'Andrei', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(25, 502981, 'Anna', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(26, 504220, 'Anthony', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(27, 504652, 'Arthur', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(28, 504800, 'Ary', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(29, 504381, 'Augusto', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(30, 505233, 'Beatriz', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(31, 505768, 'Bianca', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(32, 505727, 'Bianca', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(33, 503879, 'Bouchra', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(34, 505262, 'Brahian', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(35, 502028, 'Brayan', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(36, 504472, 'Breno', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(37, 502090, 'Bruno', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(38, 500632, 'Bruno', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(39, 504596, 'Bruno', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(40, 501700, 'Caio', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(41, 504168, 'Carlos', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(42, 505316, 'Carlos', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(43, 504637, 'Carlos', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(44, 505967, 'Carlos', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(45, 505393, 'Carlos', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(46, 505934, 'Carlos', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(47, 505759, 'Carolina', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(48, 502998, 'Cassiano', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(49, 504771, 'Cássio', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(50, 503535, 'Cesar', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(51, 501184, 'Cleyber', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(52, 504169, 'Cleyton', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(53, 504175, 'Cristiely', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(54, 504250, 'Cristovão', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(55, 505913, 'Daniela', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(56, 505589, 'Danley', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(57, 505572, 'Danniell', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(58, 504532, 'Davi', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(59, 505463, 'Davi', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(60, 505922, 'David', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(61, 500644, 'Dayane', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(62, 506003, 'Diego', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(63, 504454, 'Diego', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(64, 504657, 'Diogo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(65, 502390, 'Diuary', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(66, 504390, 'Douglas', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(67, 501199, 'Eduardo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(68, 503114, 'Eduardo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(69, 505212, 'Eduardo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(70, 505368, 'Eduardo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(71, 503117, 'Eduardo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(72, 505945, 'Eduardo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(73, 503596, 'Eduardo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(74, 504311, 'Eduardo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(75, 505620, 'Eliaber', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(76, 505149, 'Elioenel', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(77, 503880, 'Emílio', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(78, 505213, 'Emilly', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(79, 503743, 'Enzo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(80, 504228, 'Erick', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(81, 14660, 'Fabiano', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(82, 222931, 'Fábio', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(83, 503782, 'Fares', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(84, 505487, 'Felipe', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(85, 505447, 'Felipe', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(86, 506028, 'Felipe', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(87, 505878, 'Felipe', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(88, 505760, 'Felipe', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(89, 502447, 'Felipe', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(90, 505277, 'Felipe', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(91, 505245, 'Felipe', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(92, 504066, 'Fernanda', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(93, 504991, 'Fernanda', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(94, 505923, 'Fernando', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(95, 502584, 'Fernando', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(96, 505591, 'Fernando', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(97, 504496, 'Frederico', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(98, 503634, 'Gabriel', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(99, 504506, 'Gabriel', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(100, 505502, 'Gabriel', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(101, 505866, 'Gabriel', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(102, 504927, 'Gabriel', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(103, 503783, 'Gabriel', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(104, 504674, 'Gabriel', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(105, 503282, 'Gabriel', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(106, 505170, 'Gabriel', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(107, 505459, 'Gabriel', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(108, 505828, 'Gabriel', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(109, 503510, 'Gabriel', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(110, 503155, 'Gabriel', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(111, 503982, 'Gabriel', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(112, 504320, 'Gabriele', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(113, 199174, 'Gabriella', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(114, 505367, 'Geison', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(115, 505383, 'Guilherme', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(116, 504321, 'Guilherme', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(117, 503711, 'Guilherme', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(118, 505528, 'Guilherme', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(119, 504110, 'Guilherme', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(120, 505404, 'Guilherme', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(121, 505697, 'Guilherme', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(122, 502181, 'Gustavo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(123, 505297, 'Gustavo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(124, 502443, 'Gustavo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(125, 503997, 'Gustavo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(126, 505740, 'Gustavo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(127, 504829, 'Gustavo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(128, 505853, 'Gustavo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(129, 503166, 'Gustavo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(130, 504117, 'Gustavo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(131, 503556, 'Gustavo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(132, 504841, 'Gustavo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(133, 504824, 'Gustavo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(134, 504116, 'Hasan', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(135, 505202, 'Hector', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(136, 503426, 'Helcio', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(137, 505919, 'Hellen', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(138, 503793, 'Henrique', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(139, 504514, 'Henrique', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(140, 504385, 'Heron', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(141, 505320, 'Heron', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(142, 505372, 'Hiago', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(143, 504240, 'Hisham', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(144, 504230, 'Homam', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(145, 505857, 'Igor', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(146, 504842, 'Igor', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(147, 505592, 'Inacio', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(148, 283710, 'Isabela', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(149, 502961, 'Ivo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(150, 505776, 'Jacira', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(151, 504765, 'Jean', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(152, 503415, 'Jean', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(153, 503957, 'Jean', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(154, 503424, 'Jean', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(155, 502522, 'Jean', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(156, 504664, 'Jean', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(157, 504786, 'Jefferson', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(158, 505911, 'Jhevison', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(159, 505514, 'Jhonatan', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(160, 505432, 'Jihad', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(161, 504471, 'Ademar', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(162, 505741, 'João', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(163, 504093, 'João', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(164, 503728, 'João', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(165, 505643, 'Joao', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(166, 502537, 'João', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(167, 505085, 'João', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(168, 503636, 'João', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(169, 505783, 'João', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(170, 503109, 'João', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(171, 505191, 'João', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(172, 505184, 'João', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(173, 505171, 'João', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(174, 504898, 'João', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(175, 504346, 'João', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(176, 505820, 'João', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(177, 505429, 'João', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(178, 505274, 'João', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(179, 502483, 'João', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(180, 504551, 'João', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(181, 505375, 'Jorge', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(182, 504620, 'José', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(183, 505613, 'Joshua', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(184, 504088, 'Josimar', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(185, 503890, 'Josué', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(186, 505350, 'Júlia', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(187, 505750, 'Juliane', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(188, 7190, 'Juliano', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(189, 505743, 'Julio', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(190, 505630, 'Kaiky', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(191, 505451, 'Kaila', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(192, 505692, 'Kauã', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(193, 505381, 'Kauan', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(194, 505617, 'Kauê', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(195, 504038, 'Kaue', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(196, 505737, 'Ketelyn', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(197, 503089, 'Khensane', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(198, 500621, 'Laércio', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(199, 503916, 'Lays', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(200, 505847, 'Leandro', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(201, 504185, 'Leonardo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(202, 505537, 'Lilian', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(203, 505043, 'Luan', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(204, 505328, 'Luan', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(205, 504493, 'Lucas', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(206, 505087, 'Lucas', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(207, 504157, 'Lucas', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(208, 504838, 'Lucas', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(209, 505749, 'Lucas', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(210, 505228, 'Lucas', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(211, 505669, 'Lucas', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(212, 505270, 'Lucas', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(213, 503663, 'Lucas', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(214, 504033, 'Luis', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(215, 505610, 'Luis', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(216, 506025, 'Luis', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(217, 501792, 'Luisa', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(218, 504758, 'Luiz', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(219, 503582, 'Luiz', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(220, 504237, 'Luiz', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(221, 505827, 'Marcelo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(222, 502567, 'Marcelo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(223, 505943, 'Marcus', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(224, 503669, 'Maria', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(225, 503286, 'Maria', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(226, 505952, 'Mariana', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(227, 506034, 'Marlenne', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(228, 505216, 'Marlon', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(229, 505340, 'Mateus', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(230, 505400, 'Mateus', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(231, 505176, 'Matheus', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(232, 503929, 'Matheus', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(233, 503955, 'Matheus', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(234, 504297, 'Matheus', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(235, 504069, 'Matheus', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(236, 505629, 'Matheus', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(237, 504435, 'Matheus', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(238, 505586, 'Matheus', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(239, 505441, 'Matheus', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(240, 505777, 'Mauricio', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(241, 505881, 'Nasser', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(242, 504783, 'Nathalia', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(243, 505988, 'Nathan', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(244, 503386, 'Nelson', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(245, 505605, 'Nícholas', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(246, 505529, 'Nicolas', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(247, 504008, 'Nicolas', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(248, 504885, 'Octavio', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(249, 503057, 'Otavio', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(250, 505849, 'Patryk', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(251, 505194, 'Paulo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(252, 504170, 'Pedro', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(253, 505745, 'Pedro', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(254, 503378, 'Pedro', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(255, 504446, 'Pedro', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(256, 503871, 'Pedro', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(257, 502975, 'Pedro', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(258, 504372, 'Pedro', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(259, 506015, 'Pedro', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(260, 505041, 'Pedro', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(261, 505738, 'Pedro', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(262, 503226, 'Pedro', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(263, 505761, 'Pedro', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(264, 505448, 'Queiro', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(265, 503419, 'Rafael', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(266, 503717, 'Rafael', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(267, 504638, 'Rafael', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(268, 502169, 'Raul', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(269, 504244, 'Reginaldo', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(270, 503814, 'Renam', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(271, 503722, 'Renan', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(272, 502735, 'Rhyan', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(273, 502102, 'Ricardo', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(274, 505829, 'Robert', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(275, 504611, 'Roberto', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(276, 504621, 'Rubens', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(277, 504827, 'Ryan', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(278, 504944, 'Saler', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(279, 503822, 'Samuel', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(280, 505309, 'Samuel', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(281, 505578, 'Samuel', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(282, 504422, 'Scheligan', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(283, 504423, 'Tailyne', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(284, 505597, 'Thaina', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(285, 504567, 'Thiago', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(286, 504364, 'Thiago', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(287, 505326, 'Thiago', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(288, 505938, 'Thiago', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(289, 505508, 'Thiago', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(290, 502771, 'Thomas', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(291, 503073, 'Thyago', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(292, 505362, 'Tobias', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(293, 505096, 'Valeska', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(294, 505527, 'Victor', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(295, 501187, 'Vinícios', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(296, 503264, 'Vinícius', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(297, 503318, 'Vinícius', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(298, 503835, 'Vinicius', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(299, 503423, 'Vinícius', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(300, 502626, 'Vinícius', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(301, 503132, 'Vithor', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(302, 503538, 'Vitor', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(303, 505071, 'Vitor', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(304, 505860, 'Vitor', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(305, 505619, 'Vitor', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(306, 505278, 'Wellington', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(307, 505707, 'Wesley', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(308, 505354, 'Wiam', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(309, 504700, 'Willian', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(310, 501353, 'Willian', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(311, 505831, 'Wuigor', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(312, 505826, 'Yael', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(313, 504837, 'Youssef', '000.000.000-00', 'Análise e Desenvolvimento de Sistemas', 'email@email', '(00) 00000-0000', '123', 0),
(314, 505968, 'Zainab', '000.000.000-00', 'Engenharia de Software', 'email@email', '(00) 00000-0000', '123', 0),
(315, 505319, 'João Alessandro Girardi', '008.398.349-00', 'Engenharia de Software', 'joaosagrath@gmail.com', '(45) 99111-0868', 'Metal', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id_emprestimos` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_equipamento` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `datain` varchar(16) NOT NULL,
  `dataout` varchar(16) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id_emprestimos`, `id_aluno`, `id_equipamento`, `id_operador`, `datain`, `dataout`, `observacao`, `status`) VALUES
(1, 201, 83, 2, '01/11/2023 18:57', '01/11/2023 21:00', '', 'Finalizado'),
(2, 313, 89, 1, '01/11/2023 18:58', '01/11/2023 21:10', '', 'Finalizado'),
(3, 52, 36, 1, '01/11/2023 19:05', '01/11/2023 21:10', '', 'Finalizado'),
(4, 213, 121, 2, '01/11/2023 19:17', '01/11/2023 21:17', '', 'Finalizado'),
(5, 160, 102, 1, '01/11/2023 19:18', '01/11/2023 21:36', '', 'Finalizado'),
(6, 31, 86, 2, '01/11/2023 19:26', '01/11/2023 21:40', '', 'Finalizado'),
(7, 56, 61, 2, '02/11/2023 18:52', '02/11/2023 21:00', '', 'Finalizado'),
(8, 88, 49, 1, '02/11/2023 18:53', '02/11/2023 21:13', '', 'Finalizado'),
(9, 215, 132, 2, '02/11/2023 18:58', '02/11/2023 21:18', '', 'Finalizado'),
(10, 49, 114, 2, '02/11/2023 19:06', '02/11/2023 21:22', '', 'Finalizado'),
(11, 239, 78, 1, '02/11/2023 19:21', '02/11/2023 21:43', '', 'Finalizado'),
(12, 87, 62, 1, '03/11/2023 18:58', '03/11/2023 21:09', '', 'Finalizado'),
(13, 289, 75, 1, '03/11/2023 19:00', '03/11/2023 21:15', '', 'Finalizado'),
(14, 242, 75, 1, '03/11/2023 19:07', '03/11/2023 21:22', '', 'Finalizado'),
(15, 254, 115, 2, '03/11/2023 19:14', '03/11/2023 21:24', '', 'Finalizado'),
(16, 138, 59, 2, '03/11/2023 19:19', '03/11/2023 21:40', '', 'Finalizado'),
(17, 151, 65, 2, '03/11/2023 19:26', '03/11/2023 21:43', '', 'Finalizado'),
(18, 110, 94, 1, '04/11/2023 18:51', '04/11/2023 21:04', '', 'Finalizado'),
(19, 279, 110, 1, '04/11/2023 19:02', '04/11/2023 21:08', '', 'Finalizado'),
(20, 272, 123, 2, '04/11/2023 19:15', '04/11/2023 21:13', '', 'Finalizado'),
(21, 117, 63, 1, '04/11/2023 19:23', '04/11/2023 21:41', '', 'Finalizado'),
(22, 192, 75, 2, '05/11/2023 18:55', '05/11/2023 21:11', '', 'Finalizado'),
(23, 220, 95, 2, '05/11/2023 19:01', '05/11/2023 21:20', '', 'Finalizado'),
(24, 159, 51, 2, '05/11/2023 19:21', '05/11/2023 21:36', '', 'Finalizado'),
(25, 89, 63, 2, '06/11/2023 19:14', '06/11/2023 21:06', '', 'Finalizado'),
(26, 151, 24, 1, '06/11/2023 19:16', '06/11/2023 21:16', '', 'Finalizado'),
(27, 232, 24, 2, '06/11/2023 19:16', '06/11/2023 21:39', '', 'Finalizado'),
(28, 270, 68, 1, '07/11/2023 19:14', '07/11/2023 21:09', '', 'Finalizado'),
(29, 118, 59, 1, '07/11/2023 19:15', '07/11/2023 21:14', '', 'Finalizado'),
(30, 215, 44, 2, '07/11/2023 19:18', '07/11/2023 21:25', '', 'Finalizado'),
(31, 197, 60, 1, '07/11/2023 19:23', '07/11/2023 21:26', '', 'Finalizado'),
(32, 121, 1, 2, '07/11/2023 19:27', '07/11/2023 21:27', '', 'Finalizado'),
(33, 156, 106, 1, '08/11/2023 19:05', '08/11/2023 21:26', '', 'Finalizado'),
(34, 98, 112, 2, '08/11/2023 19:16', '08/11/2023 21:27', '', 'Finalizado'),
(35, 287, 79, 2, '08/11/2023 19:25', '08/11/2023 21:29', '', 'Finalizado'),
(36, 101, 99, 1, '08/11/2023 19:26', '08/11/2023 21:32', '', 'Finalizado'),
(37, 110, 117, 2, '09/11/2023 19:16', '09/11/2023 21:23', '', 'Finalizado'),
(38, 263, 114, 2, '10/11/2023 19:05', '10/11/2023 21:26', '', 'Finalizado'),
(39, 120, 96, 1, '10/11/2023 19:27', '10/11/2023 21:44', '', 'Finalizado'),
(40, 40, 53, 1, '12/11/2023 19:15', '12/11/2023 21:11', '', 'Finalizado'),
(41, 10, 128, 1, '12/11/2023 19:21', '12/11/2023 21:15', '', 'Finalizado'),
(42, 110, 91, 1, '12/11/2023 19:24', '12/11/2023 21:32', '', 'Finalizado'),
(43, 294, 79, 1, '12/11/2023 19:24', '12/11/2023 21:39', '', 'Finalizado'),
(44, 87, 8, 1, '13/11/2023 19:05', '13/11/2023 21:19', '', 'Finalizado'),
(45, 179, 62, 1, '14/11/2023 18:54', '14/11/2023 21:03', '', 'Finalizado'),
(46, 184, 66, 1, '14/11/2023 18:59', '14/11/2023 21:12', '', 'Finalizado'),
(47, 18, 117, 2, '14/11/2023 19:03', '14/11/2023 21:23', '', 'Finalizado'),
(48, 238, 54, 2, '14/11/2023 19:25', '14/11/2023 21:26', '', 'Finalizado'),
(49, 301, 24, 2, '14/11/2023 19:27', '14/11/2023 21:43', '', 'Finalizado'),
(50, 10, 38, 1, '15/11/2023 18:55', '15/11/2023 21:00', '', 'Finalizado'),
(51, 173, 26, 1, '15/11/2023 19:20', '15/11/2023 21:14', '', 'Finalizado'),
(52, 164, 63, 2, '16/11/2023 18:53', '16/11/2023 21:16', '', 'Finalizado'),
(53, 259, 128, 2, '16/11/2023 18:54', '16/11/2023 21:22', '', 'Finalizado'),
(54, 164, 123, 2, '16/11/2023 19:02', '16/11/2023 21:28', '', 'Finalizado'),
(55, 52, 96, 1, '16/11/2023 19:08', '16/11/2023 21:28', '', 'Finalizado'),
(56, 256, 86, 2, '16/11/2023 19:10', '16/11/2023 21:35', '', 'Finalizado'),
(57, 67, 60, 2, '16/11/2023 19:13', '16/11/2023 21:38', '', 'Finalizado'),
(58, 71, 103, 1, '17/11/2023 19:16', '17/11/2023 21:44', '', 'Finalizado'),
(59, 28, 13, 2, '17/11/2023 19:21', '17/11/2023 21:44', '', 'Finalizado'),
(60, 80, 87, 2, '18/11/2023 18:57', '18/11/2023 21:11', '', 'Finalizado'),
(61, 105, 74, 1, '18/11/2023 18:58', '18/11/2023 21:35', '', 'Finalizado'),
(62, 191, 70, 1, '18/11/2023 19:17', '18/11/2023 21:42', '', 'Finalizado'),
(63, 118, 105, 2, '19/11/2023 19:24', '19/11/2023 21:01', '', 'Finalizado'),
(64, 84, 59, 2, '19/11/2023 19:25', '19/11/2023 21:06', '', 'Finalizado'),
(65, 182, 8, 1, '20/11/2023 19:13', '20/11/2023 21:39', '', 'Finalizado'),
(66, 37, 115, 2, '21/11/2023 19:03', '21/11/2023 21:01', '', 'Finalizado'),
(67, 41, 120, 1, '21/11/2023 19:04', '21/11/2023 21:02', '', 'Finalizado'),
(68, 273, 13, 2, '21/11/2023 19:07', '21/11/2023 21:12', '', 'Finalizado'),
(69, 202, 42, 2, '21/11/2023 19:18', '21/11/2023 21:40', '', 'Finalizado'),
(70, 207, 74, 1, '22/11/2023 18:53', '22/11/2023 21:02', '', 'Finalizado'),
(71, 161, 125, 1, '22/11/2023 19:05', '22/11/2023 21:08', '', 'Finalizado'),
(72, 228, 16, 2, '22/11/2023 19:11', '22/11/2023 21:29', '', 'Finalizado'),
(73, 181, 6, 1, '22/11/2023 19:13', '22/11/2023 21:33', '', 'Finalizado'),
(74, 24, 114, 2, '23/11/2023 18:54', '23/11/2023 21:22', '', 'Finalizado'),
(75, 59, 9, 2, '23/11/2023 19:05', '23/11/2023 21:25', '', 'Finalizado'),
(76, 11, 14, 2, '24/11/2023 19:17', '24/11/2023 21:15', '', 'Finalizado'),
(77, 230, 86, 1, '25/11/2023 19:12', '25/11/2023 21:07', '', 'Finalizado'),
(78, 2, 42, 1, '26/11/2023 18:56', '26/11/2023 21:15', '', 'Finalizado'),
(79, 311, 32, 1, '26/11/2023 19:14', '26/11/2023 21:19', '', 'Finalizado'),
(80, 33, 29, 2, '26/11/2023 19:17', '26/11/2023 21:29', '', 'Finalizado'),
(81, 252, 7, 1, '26/11/2023 19:23', '26/11/2023 21:31', '', 'Finalizado'),
(82, 7, 81, 1, '27/11/2023 18:51', '27/11/2023 21:03', '', 'Finalizado'),
(83, 283, 41, 2, '27/11/2023 18:53', '27/11/2023 21:16', '', 'Finalizado'),
(84, 261, 100, 1, '27/11/2023 19:09', '27/11/2023 21:20', '', 'Finalizado'),
(85, 229, 74, 2, '27/11/2023 19:15', '27/11/2023 21:24', '', 'Finalizado'),
(86, 288, 117, 2, '27/11/2023 19:19', '27/11/2023 21:25', '', 'Finalizado'),
(87, 311, 115, 1, '27/11/2023 19:27', '27/11/2023 21:34', '', 'Finalizado'),
(88, 55, 16, 1, '27/11/2023 19:28', '27/11/2023 21:39', '', 'Finalizado'),
(89, 194, 28, 1, '28/11/2023 18:53', '28/11/2023 21:00', '', 'Finalizado'),
(90, 182, 121, 1, '28/11/2023 19:09', '28/11/2023 21:13', '', 'Finalizado'),
(91, 223, 51, 2, '28/11/2023 19:22', '28/11/2023 21:25', '', 'Finalizado'),
(92, 240, 59, 2, '28/11/2023 19:28', '28/11/2023 21:42', '', 'Finalizado'),
(93, 1, 16, 1, '29/11/2023 18:51', '29/11/2023 21:20', '', 'Finalizado'),
(94, 173, 129, 2, '29/11/2023 19:01', '29/11/2023 21:40', '', 'Finalizado'),
(95, 199, 106, 2, '30/11/2023 19:03', '30/11/2023 21:04', '', 'Finalizado'),
(96, 94, 19, 1, '30/11/2023 19:19', '30/11/2023 21:23', '', 'Finalizado'),
(97, 114, 6, 1, '30/11/2023 19:29', '30/11/2023 21:31', '', 'Finalizado'),
(98, 119, 90, 2, '01/12/2023 18:57', '01/12/2023 21:17', '', 'Finalizado'),
(99, 253, 84, 2, '02/12/2023 19:00', '', '', 'Em Andamento'),
(100, 145, 95, 1, '02/12/2023 19:06', '', '', 'Em Andamento');

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id_equipamento` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `patrimonio` int(5) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `data` varchar(16) NOT NULL,
  `uso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipamentos`
--

INSERT INTO `equipamentos` (`id_equipamento`, `id_operador`, `patrimonio`, `marca`, `modelo`, `status`, `observacao`, `data`, `uso`) VALUES
(1, 1, 1660, 'Samsung', 'Chromebook', 'Disponível', '', '01-12-2023', 1),
(2, 1, 1663, 'Samsung', 'Chromebook', 'Disponível', '', '01-12-2023', 1),
(3, 1, 1784, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(4, 1, 1785, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(5, 1, 1786, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(6, 1, 1787, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 2),
(7, 1, 1788, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 1),
(8, 1, 3777, 'Lenovo', 'G40', 'Disponível', NULL, '01-12-2023', 2),
(9, 1, 3779, 'Lenovo', 'G40', 'Disponível', NULL, '01-12-2023', 1),
(10, 1, 3782, 'Lenovo', 'G40', 'Disponível', NULL, '01-12-2023', 0),
(11, 1, 3784, 'Lenovo', 'G40', 'Disponível', NULL, '01-12-2023', 0),
(12, 1, 3785, 'Lenovo', 'G40', 'Disponível', NULL, '01-12-2023', 0),
(13, 1, 3971, 'Dell', 'Inspiron 5458', 'Disponível', NULL, '01-12-2023', 2),
(14, 1, 3972, 'Dell', 'Inspiron 5458', 'Disponível', NULL, '01-12-2023', 1),
(15, 1, 3974, 'Dell', 'Inspiron 5458', 'Disponível', NULL, '01-12-2023', 0),
(16, 1, 3977, 'Dell', 'Inspiron 5458', 'Disponível', NULL, '01-12-2023', 3),
(17, 1, 3978, 'Dell', 'Inspiron 5458', 'Disponível', NULL, '01-12-2023', 0),
(18, 1, 3980, 'Dell', 'Inspiron 5458', 'Disponível', NULL, '01-12-2023', 0),
(19, 1, 3995, 'Lenovo', 'G40', 'Disponível', NULL, '01-12-2023', 1),
(20, 1, 4004, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(21, 1, 4005, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(22, 1, 4006, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(23, 1, 4007, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(24, 1, 4008, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 3),
(25, 1, 4010, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(26, 1, 4011, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 1),
(27, 1, 4012, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(28, 1, 4013, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 1),
(29, 1, 4014, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 1),
(30, 1, 4015, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(31, 1, 4017, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 1),
(32, 1, 4018, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(33, 1, 4019, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(34, 1, 4021, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(35, 1, 4022, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(36, 1, 4023, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 1),
(37, 1, 4041, 'Positivo', 'Q464A', 'Disponível', NULL, '01-12-2023', 0),
(38, 1, 4042, 'Positivo', 'Q464A', 'Disponível', NULL, '01-12-2023', 1),
(39, 1, 4043, 'Positivo', 'Q464A', 'Disponível', NULL, '01-12-2023', 0),
(40, 1, 4044, 'Positivo', 'Q464A', 'Disponível', NULL, '01-12-2023', 0),
(41, 1, 4046, 'Positivo', 'Q464A', 'Disponível', NULL, '01-12-2023', 1),
(42, 1, 4047, 'Positivo', 'Q464A', 'Disponível', NULL, '01-12-2023', 2),
(43, 1, 4048, 'Positivo', 'Q464A', 'Disponível', NULL, '01-12-2023', 0),
(44, 1, 4049, 'Positivo', 'Q464A', 'Disponível', NULL, '01-12-2023', 1),
(45, 1, 4778, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(46, 1, 4779, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(47, 1, 4780, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(48, 1, 4781, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(49, 1, 4782, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(50, 1, 4783, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(51, 1, 4784, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 2),
(52, 1, 4785, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(53, 1, 4786, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 1),
(54, 1, 4787, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 1),
(55, 1, 4788, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(56, 1, 4789, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(57, 1, 4790, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(58, 1, 4791, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(59, 1, 4792, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 4),
(60, 1, 4793, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 2),
(61, 1, 4794, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 1),
(62, 1, 4795, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 2),
(63, 1, 4796, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 3),
(64, 1, 4797, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(65, 1, 4798, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 1),
(66, 1, 4799, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 1),
(67, 1, 4800, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(68, 1, 4801, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 1),
(69, 1, 4802, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(70, 1, 4804, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(71, 1, 4806, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(72, 1, 4815, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(73, 1, 4816, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(74, 1, 4817, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(75, 1, 4818, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(76, 1, 4819, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(77, 1, 4820, 'Samsung', 'Chromebook', 'Disponível', NULL, '01-12-2023', 0),
(78, 1, 13017, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(79, 1, 13018, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 2),
(80, 1, 13019, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(81, 1, 13020, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(82, 1, 13021, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(83, 1, 13022, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(84, 1, 13023, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(85, 1, 13025, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(86, 1, 13026, 'Dell', 'Inspiron 15 P90F', 'Com Defeito', '', '01-12-2023', 3),
(87, 1, 13027, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(88, 1, 13028, 'Dell', 'Inspiron 15 P90F', 'Em Manutencao', '', '01-12-2023', 0),
(89, 1, 13029, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(90, 1, 13030, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(91, 1, 13031, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(92, 1, 13032, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(93, 1, 13036, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(94, 1, 13037, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(95, 1, 13038, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 2),
(96, 1, 13039, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 6),
(97, 1, 13040, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(98, 1, 13042, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(99, 1, 13043, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(100, 1, 13044, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(101, 1, 13045, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(102, 1, 13046, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(103, 1, 13047, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(104, 1, 13048, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(105, 1, 13049, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(106, 1, 13050, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 2),
(107, 1, 13051, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(108, 1, 13052, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(109, 1, 13053, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(110, 1, 13054, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(111, 1, 13055, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(112, 1, 13056, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(113, 1, 13057, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(114, 1, 13058, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 3),
(115, 1, 13059, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 3),
(116, 1, 13060, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(117, 1, 13061, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 3),
(118, 1, 13100, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(119, 1, 13102, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 0),
(120, 1, 13103, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 1),
(121, 1, 13104, 'Dell', 'Inspiron 15 P90F', 'Disponível', NULL, '01-12-2023', 2),
(122, 1, 13112, 'Lenovo', 'Ideapad', 'Disponível', NULL, '01-12-2023', 0),
(123, 1, 13113, 'Dell', 'Latitude 3520', 'Disponível', NULL, '01-12-2023', 0),
(124, 1, 13114, 'Dell', 'Latitude 3520', 'Disponível', NULL, '01-12-2023', 0),
(125, 1, 13115, 'Dell', 'Latitude 3520', 'Disponível', NULL, '01-12-2023', 0),
(126, 1, 13116, 'Dell', 'Latitude 3520', 'Disponível', NULL, '01-12-2023', 0),
(127, 1, 13117, 'Dell', 'Latitude 3520', 'Disponível', NULL, '01-12-2023', 0),
(128, 1, 13118, 'Dell', 'Latitude 3520', 'Disponível', NULL, '01-12-2023', 2),
(129, 1, 13119, 'Dell', 'Latitude 3520', 'Disponível', NULL, '01-12-2023', 1),
(130, 1, 13120, 'Dell', 'Latitude 3520', 'Disponível', NULL, '01-12-2023', 0),
(131, 1, 13121, 'Dell', 'Latitude 3520', 'Disponível', NULL, '01-12-2023', 0),
(132, 1, 13122, 'Dell', 'Latitude 3520', 'Disponível', NULL, '01-12-2023', 1),
(133, 1, 13123, 'Dell', 'Latitude 3520', 'Disponível', NULL, '01-12-2023', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `inativos`
--

CREATE TABLE `inativos` (
  `id-inativos` int(11) NOT NULL,
  `ra` int(11) NOT NULL,
  `aluno` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `sala` int(11) NOT NULL,
  `controle_ar` tinyint(1) NOT NULL DEFAULT 0,
  `controle_projetor` tinyint(1) NOT NULL DEFAULT 0,
  `marcadores` tinyint(1) NOT NULL DEFAULT 0,
  `apagador` tinyint(1) NOT NULL DEFAULT 0,
  `observacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `material`
--

INSERT INTO `material` (`id_material`, `id_operador`, `sala`, `controle_ar`, `controle_projetor`, `marcadores`, `apagador`, `observacao`) VALUES
(1, 0, 310, 1, 0, 1, 1, ''),
(2, 0, 311, 1, 1, 1, 1, ''),
(3, 0, 312, 1, 1, 1, 1, ''),
(4, 0, 313, 1, 0, 1, 1, ''),
(5, 0, 314, 1, 1, 1, 1, ''),
(6, 0, 315, 1, 1, 0, 1, ''),
(7, 0, 316, 1, 1, 1, 0, ''),
(8, 0, 317, 1, 1, 1, 1, ''),
(9, 0, 318, 0, 1, 1, 1, ''),
(10, 0, 319, 1, 1, 1, 1, ''),
(11, 0, 320, 1, 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `operadores`
--

CREATE TABLE `operadores` (
  `id_operador` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `operador` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `operadores`
--

INSERT INTO `operadores` (`id_operador`, `login`, `operador`, `cpf`, `email`, `password`) VALUES
(1, 'admin', 'Administrador', '000.000.000-00', '', 'admin@'),
(2, 'joao', 'João Girardi', '008.398.349-00', 'joaosagrath@gmail.com', 'Metalica83');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id_professor` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `rp` int(11) NOT NULL,
  `professor` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professores`
--

INSERT INTO `professores` (`id_professor`, `id_operador`, `rp`, `professor`, `curso`) VALUES
(1, 2, 123, 'Charles Bussarelo', 'Engenharia do Software'),
(2, 2, 456, 'Jesus henrique', 'Engenharia do Software');

-- --------------------------------------------------------

--
-- Estrutura para tabela `retirada`
--

CREATE TABLE `retirada` (
  `id_retirada` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `controle_ar` tinyint(1) NOT NULL DEFAULT 0,
  `controle_projetor` tinyint(1) NOT NULL DEFAULT 0,
  `marcadores` tinyint(1) NOT NULL DEFAULT 0,
  `apagador` tinyint(1) NOT NULL DEFAULT 0,
  `datain` varchar(16) NOT NULL,
  `dataout` varchar(16) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `retirada`
--

INSERT INTO `retirada` (`id_retirada`, `id_material`, `id_professor`, `id_operador`, `controle_ar`, `controle_projetor`, `marcadores`, `apagador`, `datain`, `dataout`, `observacao`, `status`) VALUES
(1, 9, 2, 2, 1, 1, 1, 1, '01/11/2023 18:57', '01/11/2023 21:00', '', 'Entregue'),
(2, 5, 1, 2, 1, 1, 1, 1, '01/11/2023 18:58', '01/11/2023 21:10', '', 'Entregue'),
(3, 7, 1, 2, 1, 1, 1, 1, '01/11/2023 19:05', '01/11/2023 21:10', '', 'Entregue'),
(4, 9, 2, 1, 1, 1, 1, 1, '01/11/2023 19:17', '01/11/2023 21:17', '', 'Entregue'),
(5, 6, 1, 1, 1, 1, 1, 1, '01/11/2023 19:18', '01/11/2023 21:36', '', 'Entregue'),
(6, 9, 2, 1, 1, 1, 1, 1, '01/11/2023 19:26', '01/11/2023 21:40', '', 'Entregue'),
(7, 4, 1, 2, 1, 1, 1, 1, '02/11/2023 18:52', '02/11/2023 21:00', '', 'Entregue'),
(8, 6, 1, 2, 1, 1, 1, 1, '02/11/2023 18:53', '02/11/2023 21:13', '', 'Entregue'),
(9, 6, 1, 1, 1, 1, 1, 1, '02/11/2023 18:58', '02/11/2023 21:18', '', 'Entregue'),
(10, 1, 2, 1, 1, 1, 1, 1, '02/11/2023 19:06', '02/11/2023 21:22', '', 'Entregue'),
(11, 3, 2, 1, 1, 1, 1, 1, '02/11/2023 19:21', '02/11/2023 21:43', '', 'Entregue'),
(12, 7, 2, 2, 1, 1, 1, 1, '03/11/2023 18:58', '03/11/2023 21:09', '', 'Entregue'),
(13, 6, 1, 2, 1, 1, 1, 1, '03/11/2023 19:00', '03/11/2023 21:15', '', 'Entregue'),
(14, 4, 2, 2, 1, 1, 1, 1, '03/11/2023 19:07', '03/11/2023 21:22', '', 'Entregue'),
(15, 5, 1, 2, 1, 1, 1, 1, '03/11/2023 19:14', '03/11/2023 21:24', '', 'Entregue'),
(16, 4, 2, 1, 1, 1, 1, 1, '03/11/2023 19:19', '03/11/2023 21:40', '', 'Entregue'),
(17, 9, 2, 2, 1, 1, 1, 1, '03/11/2023 19:26', '03/11/2023 21:43', '', 'Entregue'),
(18, 10, 2, 1, 1, 1, 1, 1, '04/11/2023 18:51', '04/11/2023 21:04', '', 'Entregue'),
(19, 6, 1, 2, 1, 1, 1, 1, '04/11/2023 19:02', '04/11/2023 21:08', '', 'Entregue'),
(20, 6, 2, 2, 1, 1, 1, 1, '04/11/2023 19:15', '04/11/2023 21:13', '', 'Entregue'),
(21, 9, 1, 2, 1, 1, 1, 1, '04/11/2023 19:23', '04/11/2023 21:41', '', 'Entregue'),
(22, 9, 2, 1, 1, 1, 1, 1, '05/11/2023 18:55', '05/11/2023 21:11', '', 'Entregue'),
(23, 9, 1, 2, 1, 1, 1, 1, '05/11/2023 19:01', '05/11/2023 21:20', '', 'Entregue'),
(24, 3, 1, 1, 1, 1, 1, 1, '05/11/2023 19:21', '05/11/2023 21:36', '', 'Entregue'),
(25, 6, 2, 2, 1, 1, 1, 1, '06/11/2023 19:14', '06/11/2023 21:06', '', 'Entregue'),
(26, 9, 1, 2, 1, 1, 1, 1, '06/11/2023 19:16', '06/11/2023 21:16', '', 'Entregue'),
(27, 7, 2, 2, 1, 1, 1, 1, '06/11/2023 19:16', '06/11/2023 21:39', '', 'Entregue'),
(29, 10, 2, 1, 1, 1, 1, 1, '07/11/2023 19:15', '07/11/2023 21:14', '', 'Entregue'),
(30, 4, 2, 1, 1, 1, 1, 1, '07/11/2023 19:18', '07/11/2023 21:25', '', 'Entregue'),
(31, 4, 1, 2, 1, 1, 1, 1, '07/11/2023 19:23', '07/11/2023 21:26', '', 'Entregue'),
(32, 1, 1, 2, 1, 1, 1, 1, '07/11/2023 19:27', '07/11/2023 21:27', '', 'Entregue'),
(33, 4, 2, 2, 1, 1, 1, 1, '08/11/2023 19:05', '08/11/2023 21:26', '', 'Entregue'),
(34, 4, 2, 2, 1, 1, 1, 1, '08/11/2023 19:16', '08/11/2023 21:27', '', 'Entregue'),
(35, 2, 1, 1, 1, 1, 1, 1, '08/11/2023 19:25', '08/11/2023 21:29', '', 'Entregue'),
(36, 9, 2, 1, 1, 1, 1, 1, '08/11/2023 19:26', '08/11/2023 21:32', '', 'Entregue'),
(37, 1, 1, 1, 1, 1, 1, 1, '09/11/2023 19:16', '09/11/2023 21:23', '', 'Entregue'),
(38, 7, 1, 1, 1, 1, 1, 1, '10/11/2023 19:05', '10/11/2023 21:26', '', 'Entregue'),
(39, 4, 1, 1, 1, 1, 1, 1, '10/11/2023 19:27', '10/11/2023 21:44', '', 'Entregue'),
(40, 3, 1, 2, 1, 1, 1, 1, '12/11/2023 19:15', '12/11/2023 21:11', '', 'Entregue'),
(41, 1, 2, 2, 1, 1, 1, 1, '12/11/2023 19:21', '12/11/2023 21:15', '', 'Entregue'),
(42, 2, 1, 1, 1, 1, 1, 1, '12/11/2023 19:24', '12/11/2023 21:32', '', 'Entregue'),
(43, 9, 1, 2, 1, 1, 1, 1, '12/11/2023 19:24', '12/11/2023 21:39', '', 'Entregue'),
(44, 8, 2, 1, 1, 1, 1, 1, '13/11/2023 19:05', '13/11/2023 21:19', '', 'Entregue'),
(45, 1, 2, 2, 1, 1, 1, 1, '14/11/2023 18:54', '14/11/2023 21:03', '', 'Entregue'),
(46, 4, 1, 2, 1, 1, 1, 1, '14/11/2023 18:59', '14/11/2023 21:12', '', 'Entregue'),
(47, 2, 1, 1, 1, 1, 1, 1, '14/11/2023 19:03', '14/11/2023 21:23', '', 'Entregue'),
(48, 9, 2, 2, 1, 1, 1, 1, '14/11/2023 19:25', '14/11/2023 21:26', '', 'Entregue'),
(49, 10, 1, 2, 1, 1, 1, 1, '14/11/2023 19:27', '14/11/2023 21:43', '', 'Entregue'),
(50, 1, 1, 1, 1, 1, 1, 1, '15/11/2023 18:55', '15/11/2023 21:00', '', 'Entregue'),
(51, 4, 2, 2, 1, 1, 1, 1, '15/11/2023 19:20', '15/11/2023 21:14', '', 'Entregue'),
(52, 3, 1, 1, 1, 1, 1, 1, '16/11/2023 18:53', '16/11/2023 21:16', '', 'Entregue'),
(53, 5, 2, 1, 1, 1, 1, 1, '16/11/2023 18:54', '16/11/2023 21:22', '', 'Entregue'),
(54, 4, 2, 1, 1, 1, 1, 1, '16/11/2023 19:02', '16/11/2023 21:28', '', 'Entregue'),
(55, 3, 2, 2, 1, 1, 1, 1, '16/11/2023 19:08', '16/11/2023 21:28', '', 'Entregue'),
(56, 2, 2, 1, 1, 1, 1, 1, '16/11/2023 19:10', '16/11/2023 21:35', '', 'Entregue'),
(57, 1, 1, 1, 1, 1, 1, 1, '16/11/2023 19:13', '16/11/2023 21:38', '', 'Entregue'),
(58, 1, 1, 1, 1, 1, 1, 1, '17/11/2023 19:16', '17/11/2023 21:44', '', 'Entregue'),
(59, 6, 2, 2, 1, 1, 1, 1, '17/11/2023 19:21', '17/11/2023 21:44', '', 'Entregue'),
(60, 10, 2, 2, 1, 1, 1, 1, '18/11/2023 18:57', '18/11/2023 21:11', '', 'Entregue'),
(61, 8, 1, 1, 1, 1, 1, 1, '18/11/2023 18:58', '18/11/2023 21:35', '', 'Entregue'),
(62, 10, 1, 1, 1, 1, 1, 1, '18/11/2023 19:17', '18/11/2023 21:42', '', 'Entregue'),
(63, 5, 2, 2, 1, 1, 1, 1, '19/11/2023 19:24', '19/11/2023 21:01', '', 'Entregue'),
(64, 5, 2, 1, 1, 1, 1, 1, '19/11/2023 19:25', '19/11/2023 21:06', '', 'Entregue'),
(65, 1, 1, 2, 1, 1, 1, 1, '20/11/2023 19:13', '20/11/2023 21:39', '', 'Entregue'),
(66, 10, 2, 2, 1, 1, 1, 1, '21/11/2023 19:03', '21/11/2023 21:01', '', 'Entregue'),
(67, 10, 2, 1, 1, 1, 1, 1, '21/11/2023 19:04', '21/11/2023 21:02', '', 'Entregue'),
(68, 7, 1, 2, 1, 1, 1, 1, '21/11/2023 19:07', '21/11/2023 21:12', '', 'Entregue'),
(69, 1, 2, 1, 1, 1, 1, 1, '21/11/2023 19:18', '21/11/2023 21:40', '', 'Entregue'),
(70, 7, 1, 1, 1, 1, 1, 1, '22/11/2023 18:53', '22/11/2023 21:02', '', 'Entregue'),
(71, 4, 2, 1, 1, 1, 1, 1, '22/11/2023 19:05', '22/11/2023 21:08', '', 'Entregue'),
(72, 9, 1, 1, 1, 1, 1, 1, '22/11/2023 19:11', '22/11/2023 21:29', '', 'Entregue'),
(73, 7, 1, 2, 1, 1, 1, 1, '22/11/2023 19:13', '22/11/2023 21:33', '', 'Entregue'),
(74, 2, 1, 1, 1, 1, 1, 1, '23/11/2023 18:54', '23/11/2023 21:22', '', 'Entregue'),
(75, 4, 1, 1, 1, 1, 1, 1, '23/11/2023 19:05', '23/11/2023 21:25', '', 'Entregue'),
(76, 3, 2, 1, 1, 1, 1, 1, '24/11/2023 19:17', '24/11/2023 21:15', '', 'Entregue'),
(77, 4, 1, 1, 1, 1, 1, 1, '25/11/2023 19:12', '25/11/2023 21:07', '', 'Entregue'),
(78, 7, 1, 1, 1, 1, 1, 1, '26/11/2023 18:56', '26/11/2023 21:15', '', 'Entregue'),
(79, 5, 1, 2, 1, 1, 1, 1, '26/11/2023 19:14', '26/11/2023 21:19', '', 'Entregue'),
(80, 3, 1, 2, 1, 1, 1, 1, '26/11/2023 19:17', '26/11/2023 21:29', '', 'Entregue'),
(81, 5, 2, 1, 1, 1, 1, 1, '26/11/2023 19:23', '26/11/2023 21:31', '', 'Entregue'),
(82, 2, 2, 1, 1, 1, 1, 1, '27/11/2023 18:51', '27/11/2023 21:03', '', 'Entregue'),
(83, 6, 1, 2, 1, 1, 1, 1, '27/11/2023 18:53', '27/11/2023 21:16', '', 'Entregue'),
(84, 9, 2, 2, 1, 1, 1, 1, '27/11/2023 19:09', '27/11/2023 21:20', '', 'Entregue'),
(85, 3, 2, 1, 1, 1, 1, 1, '27/11/2023 19:15', '27/11/2023 21:24', '', 'Entregue'),
(86, 10, 1, 1, 1, 1, 1, 1, '27/11/2023 19:19', '27/11/2023 21:25', '', 'Entregue'),
(87, 1, 1, 1, 1, 1, 1, 1, '27/11/2023 19:27', '27/11/2023 21:34', '', 'Entregue'),
(88, 1, 1, 2, 1, 1, 1, 1, '27/11/2023 19:28', '27/11/2023 21:39', '', 'Entregue'),
(89, 8, 2, 2, 1, 1, 1, 1, '28/11/2023 18:53', '28/11/2023 21:00', '', 'Entregue'),
(90, 6, 2, 2, 1, 1, 1, 1, '28/11/2023 19:09', '28/11/2023 21:13', '', 'Entregue'),
(91, 3, 2, 2, 1, 1, 1, 1, '28/11/2023 19:22', '28/11/2023 21:25', '', 'Entregue'),
(92, 2, 1, 2, 1, 1, 1, 1, '28/11/2023 19:28', '28/11/2023 21:42', '', 'Entregue'),
(93, 3, 2, 2, 1, 1, 1, 1, '29/11/2023 18:51', '29/11/2023 21:20', '', 'Entregue'),
(94, 7, 2, 1, 1, 1, 1, 1, '29/11/2023 19:01', '29/11/2023 21:40', '', 'Entregue'),
(95, 3, 2, 2, 1, 1, 1, 1, '30/11/2023 19:03', '30/11/2023 21:04', '', 'Entregue'),
(96, 4, 1, 1, 1, 1, 1, 1, '30/11/2023 19:19', '30/11/2023 21:23', '', 'Entregue'),
(97, 4, 1, 1, 1, 1, 1, 1, '30/11/2023 19:29', '30/11/2023 21:31', '', 'Entregue'),
(98, 2, 1, 1, 1, 1, 1, 1, '01/12/2023 18:57', '01/12/2023 21:17', '', 'Entregue'),
(99, 3, 2, 2, 1, 1, 1, 1, '02/12/2023 19:00', '', '', 'Em Uso'),
(100, 6, 1, 2, 1, 1, 1, 1, '02/12/2023 19:06', '', '', 'Em Uso');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id_emprestimos`);

--
-- Índices de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id_equipamento`);

--
-- Índices de tabela `inativos`
--
ALTER TABLE `inativos`
  ADD PRIMARY KEY (`id-inativos`);

--
-- Índices de tabela `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Índices de tabela `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`id_operador`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_professor`);

--
-- Índices de tabela `retirada`
--
ALTER TABLE `retirada`
  ADD PRIMARY KEY (`id_retirada`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id_emprestimos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id_equipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de tabela `inativos`
--
ALTER TABLE `inativos`
  MODIFY `id-inativos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `operadores`
--
ALTER TABLE `operadores`
  MODIFY `id_operador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `retirada`
--
ALTER TABLE `retirada`
  MODIFY `id_retirada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
