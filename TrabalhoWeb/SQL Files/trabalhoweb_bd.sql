-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Jun-2019 às 23:06
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trabalhoweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amizade`
--

CREATE TABLE `amizade` (
  `id_usuario1` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `amizade`
--

INSERT INTO `amizade` (`id_usuario1`, `id_usuario2`) VALUES
(1, 2),
(1, 2),
(4, 5),
(5, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `id_postagem_coment` int(11) NOT NULL,
  `id_usuario_coment` int(11) NOT NULL,
  `conteudo` varchar(100) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtida`
--

CREATE TABLE `curtida` (
  `id` int(11) NOT NULL,
  `id_postagem_curtida` int(11) NOT NULL,
  `id_usuario_curtida` int(11) NOT NULL,
  `autor_curtida` varchar(30) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id`, `nome`) VALUES
(1, 'Amigos'),
(2, 'FamÃ­lia'),
(3, 'Trabalho'),
(4, 'Faculdade'),
(5, 'TESTANDO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `conteudo` varchar(100) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id`, `id_usuario`, `conteudo`, `data`) VALUES
(1, 2, 'Conteúdo de postagem teste 1', '2011-12-18 13:17:17'),
(2, 1, 'Conteúdo de postagem teste 2', '2019-05-30 13:25:00'),
(3, 3, 'Conteúdo de postagem teste 6', '2019-06-01 13:25:00'),
(4, 2, 'Post do amigo de id 2', '2019-06-04 00:00:00'),
(5, 4, 'oi oi ', '2019-06-04 19:57:32'),
(6, 4, '', '2019-06-04 21:17:25'),
(7, 4, 'meu deus mt bugado', '2019-06-04 21:17:43'),
(8, 5, 'https://www.maniadegato.net/wp-content/uploads/2017/10/gato-furioso.jpg', '2019-06-04 22:56:57'),
(9, 5, '', '2019-06-04 22:57:34'),
(10, 4, 'aaaa', '2019-06-05 17:48:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_amizade`
--

CREATE TABLE `solicitacao_amizade` (
  `id` int(11) NOT NULL,
  `id_usuario_solicitante` int(11) NOT NULL,
  `id_usuario_solicitado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cod_grupo` int(11) NOT NULL,
  `detalhes` text NOT NULL,
  `foto` text NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `cod_grupo`, `detalhes`, `foto`, `cod_usuario`, `login`, `senha`) VALUES
(1, 'Usuario Teste', '99999999999', 'teste@teste.com', 5, 'testando', 'http://www.escolhalivre.com/Images/imagem_perfil.jpg', 0, 'usertest', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Teste Amizade', '99999999999', 'teste2@teste.com', 5, 'testando2', 'http://www.escolhalivre.com/Images/imagem_perfil.jpg', 0, 'usertest2', 'e10adc3949ba59abbe56e057f20f883e2'),
(3, 'Teste4', '99999999999', 'teste4@teste.com', 5, 'testando4', 'http://www.escolhalivre.com/Images/imagem_perfil.jpg', 0, 'usertest4', 'e10adc3949ba59abbe56e057f20f883e3'),
(4, 'Thabata santos de almeida', '71987930701', 'engthabata@gmail.com', 0, '', 'https://vignette.wikia.nocookie.net/powerpuff/images/f/f4/OwAAAAxsfLABiWOnAlGDs_gVt2bXtOebdp7Jyj1qcZhpxy-zo6OnpzrjdUlb_ysowfo0rJCEOER47ccnjKHPJ4FIglbAAm1T1UKQ-kMnk5ILlDjAhtBHAB9ZHMfMP.jpg/revision/latest?cb=20110726183839&path-prefix=pt-br', 0, 'docinho', 'doce'),
(5, 'lindinha', '55365635+6', 'lindinha@gmail.com', 0, 'dsads', 'https://i.ytimg.com/vi/HYljHpoNajg/hqdefault.jpg', 0, 'lindinha', 'linda'),
(6, 'florzinha', '231231231', 'florzinha@gmail.com', 0, 'adasdad', 'https://http2.mlstatic.com/matriz-de-bordado-meninas-super-poderosas-florzinha-D_NQ_NP_653797-MLB26646586219_012018-F.jpg', 0, 'florzinha', 'd38e99d9790733c939e88698afbc30b6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_postagem_coment` (`id_postagem_coment`),
  ADD KEY `id_usuario_coment` (`id_usuario_coment`);

--
-- Indexes for table `curtida`
--
ALTER TABLE `curtida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_postagem_curtida` (`id_postagem_curtida`),
  ADD KEY `id_usuario_curtida` (`id_usuario_curtida`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `solicitacao_amizade`
--
ALTER TABLE `solicitacao_amizade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario_solicitante` (`id_usuario_solicitante`),
  ADD KEY `id_usuario_solicitado` (`id_usuario_solicitado`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `curtida`
--
ALTER TABLE `curtida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `solicitacao_amizade`
--
ALTER TABLE `solicitacao_amizade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `id_postagem_coment` FOREIGN KEY (`id_postagem_coment`) REFERENCES `postagem` (`id`),
  ADD CONSTRAINT `id_usuario_coment` FOREIGN KEY (`id_usuario_coment`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `curtida`
--
ALTER TABLE `curtida`
  ADD CONSTRAINT `id_postagem_curtida` FOREIGN KEY (`id_postagem_curtida`) REFERENCES `comentario` (`id`),
  ADD CONSTRAINT `id_usuario_curtida` FOREIGN KEY (`id_usuario_curtida`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `solicitacao_amizade`
--
ALTER TABLE `solicitacao_amizade`
  ADD CONSTRAINT `id_usuario_solicitado` FOREIGN KEY (`id_usuario_solicitado`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `id_usuario_solicitante` FOREIGN KEY (`id_usuario_solicitante`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
