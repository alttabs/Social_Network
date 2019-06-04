-- insert para criar postagens
INSERT INTO `postagem` (`id_usuario`, `conteudo`, `data`) 
VALUES (2, 'Conteúdo de postagem teste 1', '2011-12-18 13:17:17');

INSERT INTO `postagem` (`id_usuario`, `conteudo`, `data`) VALUES
(1, 'Conteúdo de postagem teste 2', '2019-05-30 13:25:00');

INSERT INTO `postagem` (`id_usuario`, `conteudo`, `data`) VALUES
(3, 'Conteúdo de postagem teste 6', '2019-06-01 13:25:00');

INSERT INTO `postagem` (`id_usuario`, `conteudo`, `data`) VALUES
(2, 'Post do amigo de id 2', CURDATE());

-- insert para criar amizade (passar o id dos dois amigos)
INSERT INTO `amizade` (`id_usuario1`, `id_usuario2`) VALUES
(1, 2);

INSERT INTO `amizade` (`id_usuario1`, `id_usuario2`) VALUES
(1, 2);

--
-- inserts na tabela `contato`
--

INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `cod_grupo`, `detalhes`, `foto`, `cod_usuario`, `login`, `senha`) VALUES
(1, 'Usuario Teste', '99999999999', 'teste@teste.com', 5, 'testando', 'http://www.escolhalivre.com/Images/imagem_perfil.jpg', 0, 'usertest', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `cod_grupo`, `detalhes`, `foto`, `cod_usuario`, `login`, `senha`) VALUES
(2, 'Teste Amizade', '99999999999', 'teste2@teste.com', 5, 'testando2', 'http://www.escolhalivre.com/Images/imagem_perfil.jpg', 0, 'usertest2', 'e10adc3949ba59abbe56e057f20f883e2');
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `cod_grupo`, `detalhes`, `foto`, `cod_usuario`, `login`, `senha`) VALUES
(3, 'Teste4', '99999999999', 'teste4@teste.com', 5, 'testando4', 'http://www.escolhalivre.com/Images/imagem_perfil.jpg', 0, 'usertest4', 'e10adc3949ba59abbe56e057f20f883e3');
INSERT INTO `usuario` (`nome`, `telefone`, `email`, `cod_grupo`, `detalhes`, `foto`, `cod_usuario`, `login`, `senha`) VALUES
('Solicitação Teste', '99999999999', 'teste4@teste.com', 5, 'testando4', 'http://www.escolhalivre.com/Images/imagem_perfil.jpg', 0, 'solicitacaoteste', '123');


--
-- insert dados da tabela `grupo`
--
INSERT INTO `grupo` (`id`, `nome`) VALUES
(1, 'Amigos'),
(2, 'FamÃ­lia'),
(3, 'Trabalho'),
(4, 'Faculdade'),
(5, 'TESTANDO');


select * from amizade;
-- insert em curtidas
INSERT INTO curtida (id_postagem, id_usuario, quantidade)
VALUES (1, 1, 1);

-- inserts para solicitação de amizade
INSERT INTO solicitacao_amizade (id_usuario_solicitante, id_usuario_solicitado) VALUES
(3, 1);

-- delete para excluir solicitação de amizade
DELETE FROM solicitacao_amizade WHERE solicitacao_amizade.id_usuario_solicitado = 1 and solicitacao_amizade.id_usuario_solicitante = 3;


-- insert para inserir comentários
INSERT INTO comentario (id_postagem_coment, id_usuario_coment, conteudo, data) VALUES
(33, 3, 'teste', now());

