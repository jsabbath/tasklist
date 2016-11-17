-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `tasklist`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `dt_criacao` datetime DEFAULT NULL,
  `dt_alteracao` datetime DEFAULT NULL,
  `dt_remocao` datetime DEFAULT NULL,
  `dt_conclusao` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_task`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `task`
--

INSERT INTO `task` (`id_task`, `titulo`, `descricao`, `dt_criacao`, `dt_alteracao`, `dt_remocao`, `dt_conclusao`, `status`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'Consectetur adipiscing elit. In dictum consequat nisi, vel mattis metus condimentum a. Donec eget mi lobortis, hendrerit orci sit amet, tincidunt est. Sed interdum viverra nunc. Lorem', '2016-10-06 15:54:40', '2016-10-06 18:18:07', NULL, NULL, 1),
(2, 'Donec volutpat ante arks', 'A sagittis eros mollis sit amet. Aliquam eu felis non quam finibus feugiat at ac leo. Mauris dignissim mollis lorem. In lacinia sapien vel luctus pellentesque. Nulla dapibus venenatis justo, ac', '2016-10-06 16:20:42', '2016-10-06 18:20:03', NULL, '2016-10-06 18:20:14', 2),
(3, 'Nullam maximus risus a bibendum', 'Morbi ornare purus ac imperdiet fermentum. Donec a efficitur dolor. Nam est libero', '2016-10-06 17:37:42', NULL, '2016-10-06 17:38:24', NULL, 0),
(4, 'Nullam vel tellus diam', 'Donec vestibulum varius ornare. Integer vel vehicula arcu, ut mattis leo. Pellentesque efficitur est sit amet dolor gravida semper', '2016-10-06 18:17:55', NULL, NULL, NULL, 1),
(5, 'Proin fermentum sem sapien', 'Maecenas dictum magna eu tellus tempus ornare. Aenean sollicitudin neque quis nulla cursus, quis ultrices lectus fringilla.', '2016-10-06 18:18:32', NULL, NULL, '2016-10-06 18:19:59', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
