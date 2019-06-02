drop SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `TrabalhoWeb`
--

CREATE DATABASE `TrabalhoWeb`;
USE `TrabalhoWeb`;


--
-- Estrutura da tabela `contato`
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
-- Extraindo dados da tabela `contato`
--

INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `cod_grupo`, `detalhes`, `foto`, `cod_usuario`, `login`, `senha`) VALUES
(1, 'Usuario Teste', '99999999999', 'teste@teste.com', 5, 'testando', 'http://www.escolhalivre.com/Images/imagem_perfil.jpg', 0, 'usertest', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `cod_grupo`, `detalhes`, `foto`, `cod_usuario`, `login`, `senha`) VALUES
(2, 'Teste Amizade', '99999999999', 'teste2@teste.com', 5, 'testando2', 'http://www.escolhalivre.com/Images/imagem_perfil.jpg', 0, 'usertest2', 'e10adc3949ba59abbe56e057f20f883e2');
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `cod_grupo`, `detalhes`, `foto`, `cod_usuario`, `login`, `senha`) VALUES
(3, 'Teste4', '99999999999', 'teste4@teste.com', 5, 'testando4', 'http://www.escolhalivre.com/Images/imagem_perfil.jpg', 0, 'usertest4', 'e10adc3949ba59abbe56e057f20f883e3');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

-- criação da tabela de amizade


CREATE TABLE `postagem` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `conteudo` varchar(100) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `postagem` ADD CONSTRAINT `id_usuario` FOREIGN KEY ( `id` ) REFERENCES `usuario` ( `id` ) ;

CREATE TABLE `amizade` (
  `id_usuario1` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- insert para criar postagens
INSERT INTO `postagem` (`id`, `id_usuario`, `conteudo`) VALUES
(1, 1, 'Conteúdo de postagem teste 1');

INSERT INTO `postagem` (`id`, `id_usuario`, `conteudo`) VALUES
(2, 1, 'Conteúdo de postagem teste 2');

INSERT INTO `postagem` (`id`, `id_usuario`, `conteudo`) VALUES
(3, 1, 'Conteúdo de postagem teste 2');

select * from `postagem`;

-- insert para criar amizade (passar o id dos dois amigos)
INSERT INTO `amizade` (`id_usuario1`, `id_usuario2`) VALUES
(1, 2);


-- select para obter todos os amigos do usuário (só trocar o 1 pelo id do usuário)
select * from usuario
join amizade
on amizade.id_usuario1 = 1 or amizade.id_usuario2 = 1
where usuario.id in (amizade.id_usuario1, amizade.id_usuario2) and usuario.id != 1;

SELECT * FROM usuario WHERE login = 'usertest' AND senha = 'e10adc3949ba59abbe56e057f20f883e';


select * from postagem
where id_usuario = 1;


