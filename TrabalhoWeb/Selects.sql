-- select para obter todos os amigos do usuário (só trocar o 1 pelo id do usuário)
select * from usuario
join amizade
on amizade.id_usuario1 = 1 or amizade.id_usuario2 = 1
where usuario.id in (amizade.id_usuario1, amizade.id_usuario2) and usuario.id != 1;


-- select para buscar ao fazer login
SELECT * FROM usuario WHERE login = 'usertest' AND senha = 'e10adc3949ba59abbe56e057f20f883e';


-- select para pegar o post dos amigos do usuário já ordenados
select distinct * from postagem, amizade
where ((postagem.id_usuario = amizade.id_usuario1 or postagem.id_usuario = amizade.id_usuario2)
and (amizade.id_usuario1 = 1 or amizade.id_usuario2 = 1))  ORDER BY data desc;

    
-- select para identificar o autor do post
select * from postagem
where id_usuario = 1;


-- select para obter a quantidade de amigos do usuário
SELECT COUNT(*) FROM amizade
WHERE amizade.id_usuario1 = 2 OR amizade.id_usuario2 = 2;


-- select para buscar usuário pelo id
select * from usuario where id = $id;


-- select para buscar usuarios por nome com o id diferente do usuário logado
select * from usuario
where usuario.nome like '%Amizade%' AND id != 1;


-- select para verificar amizade
select * from amizade
where (amizade.id_usuario1 = 1 and id_usuario2 = 2) or (amizade.id_usuario1 = 2 and id_usuario2 = 1);


-- select para verificar solicitação de amizade
select * from solicitacao_amizade
where id_usuario_solicitante = 1 and id_usuario_solicitado = 2 OR id_usuario_solicitante = 1 and id_usuario_solicitado = 2;


-- select para verificar solicitações de amizade do usuário
select * from solicitacao_amizade
join usuario 
on usuario.id = solicitacao_amizade.id_usuario_solicitante
where id_usuario_solicitado = 1;
SELECT * FROM solicitacao_amizade JOIN usuario ON usuario.id = solicitacao_amizade.id_usuario_solicitante WHERE solicitacao_amizade.id_usuario_solicitado = 1;

-- select para pegar os comentários de um post (em andamento)
select * from comentario
join usuario
on usuario.id = comentario.id_usuario_coment
where id_postagem_coment = 33;

-- selects gerais
select * from usuario;
select * from postagem;
select * from usuario;
select * from amizade;
select * from solicitacao_amizade;
select * from comentario;



