drop SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE `TrabalhoWeb`;
USE `TrabalhoWeb`;


-- Estrutura da tabela `usuario`
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL PRIMARY KEY auto_increment,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cod_grupo` int(11) NOT NULL,
  `detalhes` text NOT NULL,
  `foto` text NOT NULL,
  `login` varchar(50) NOT NULL UNIQUE,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Estrutura da tabela `grupo`
CREATE TABLE `grupo` (
  `id` int(11) NOT NULL PRIMARY KEY auto_increment,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Estrutura da tabela `postagem`
CREATE TABLE `postagem` (
  `id` int(11) NOT NULL PRIMARY KEY auto_increment,
  `id_usuario` int(11) NOT NULL,
  `conteudo` varchar(100) NOT NULL ,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `postagem` ADD CONSTRAINT `id_usuario` FOREIGN KEY ( `id_usuario` ) REFERENCES `usuario` ( `id` ) ;

-- Estrutura da tabela `comentario`
CREATE TABLE `comentario` (
  `id` int(11) NOT NULL PRIMARY KEY auto_increment,
  `id_postagem_coment` int(11) NOT NULL,
  `id_usuario_coment` int(11) NOT NULL,
  `conteudo` varchar(100) NOT NULL ,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `comentario` ADD CONSTRAINT `id_postagem_coment` FOREIGN KEY ( `id_postagem_coment` ) REFERENCES `postagem` ( `id` ) ;
ALTER TABLE `comentario` ADD CONSTRAINT `id_usuario_coment` FOREIGN KEY ( `id_usuario_coment` ) REFERENCES `usuario` ( `id` ) ;

-- Estrutura da tabela `curtida`
CREATE TABLE `curtida` (
  `id` int(11) NOT NULL PRIMARY KEY auto_increment,
  `id_postagem_curtida`int(11) NOT NULL,
  `id_usuario_curtida` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `curtida` ADD CONSTRAINT `id_postagem_curtida` FOREIGN KEY ( `id_postagem_curtida` ) REFERENCES `comentario` ( `id` );
ALTER TABLE `curtida` ADD CONSTRAINT `id_usuario_curtida` FOREIGN KEY ( `id_usuario_curtida` ) REFERENCES `usuario` ( `id` ) ;

-- Estrutura da tabela `amizade`
CREATE TABLE `amizade` (
  `id_usuario1` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL,
  `data` datetime not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Estrutura da tabela `solicitacao_amizade`
CREATE TABLE `solicitacao_amizade` (
  `id` int(11) NOT NULL PRIMARY KEY auto_increment,
  `id_usuario_solicitante` int(11) NOT NULL,
  `id_usuario_solicitado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `solicitacao_amizade` ADD CONSTRAINT `id_usuario_solicitante` FOREIGN KEY ( `id_usuario_solicitante` ) REFERENCES `usuario` ( `id` ) ;
ALTER TABLE `solicitacao_amizade` ADD CONSTRAINT `id_usuario_solicitado` FOREIGN KEY ( `id_usuario_solicitado` ) REFERENCES `usuario` ( `id` ) ;




