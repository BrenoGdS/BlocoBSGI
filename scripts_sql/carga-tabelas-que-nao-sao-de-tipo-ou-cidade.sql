/* INSERTS apenas para testes em tabelas que não são de tipo ou cidadepara o banco BlocoBSGI */

/* tabela Tb_Organizacao */
INSERT INTO Tb_Organizacao ( id_tipo_org, id_organizacao_pai, nome_org, tel_fixo_org, tel_cel_org, email_org, CEP_org, id_cidade_org, logradouro_org, num_org, complemento_org, bairro_org)
VALUES
    (3,
    NULL,
    'Distrito Xpto',
    33334444,
    999998888,
    'email@gmail.com',
    72000000,
    199,
    'Rua Xpto',
    6,
    '1º Andar',
    'bairro_org');

    
INSERT INTO Tb_Organizacao ( id_tipo_org, id_organizacao_pai, nome_org, tel_fixo_org, tel_cel_org, email_org, CEP_org, id_cidade_org, logradouro_org, num_org, complemento_org, bairro_org)
VALUES
    (2,
    NULL,
    'Comunidade Xpto',
    33334444,
    999998888,
    'email@gmail.com',
    72000000,
    199,
    'Rua Xpto',
    6,
    '1º Andar',
    'bairro_org');

    
INSERT INTO Tb_Organizacao ( id_tipo_org, id_organizacao_pai, nome_org, tel_fixo_org, tel_cel_org, email_org, CEP_org, id_cidade_org, logradouro_org, num_org, complemento_org, bairro_org)
VALUES
    (1,
    NULL,
    'Bloco Xpto',
    33334444,
    999998888,
    'email@gmail.com',
    72000000,
    199,
    'Rua Xpto',
    6,
    '1º Andar',
    'bairro_org');



/* tabela Tb_Evento */
INSERT INTO Tb_Evento (
    id_organizacao,
    id_tipo_evento,
    titulo,
    data_evento,
    CEP_evento,
    id_cidade_evento,
    logradouro_evento,
    num_evento,
    complemento_evento,
    bairro_evento)
VALUES 
(
    1,
    1,
    'titulo 1',
    '2020-12-31 11:15',
    70000000,
    2,
    'RUA XPTO',
    6,
    'complemento_evento',
    'bairro_evento');

INSERT INTO Tb_Evento ( id_organizacao,id_tipo_evento, titulo, data_evento, CEP_evento, id_cidade_evento, logradouro_evento, num_evento, complemento_evento, bairro_evento)
VALUES 
(
    2,
    1,
    'titulo 2',
    '2020-12-31 12:15',
    70000000,
    2,
    'RUA XPTO',
    6,
    'complemento_evento',
    'bairro_evento');

INSERT INTO Tb_Evento ( id_organizacao,id_tipo_evento, titulo, data_evento, CEP_evento, id_cidade_evento, logradouro_evento, num_evento, complemento_evento, bairro_evento)
VALUES 
(
    3,
    1,
    'titulo 3',
    '2020-12-31 13:15',
    70000000,
    2,
    'RUA XPTO',
    6,
    'complemento_evento',
    'bairro_evento');

INSERT INTO Tb_Evento ( id_organizacao,id_tipo_evento, titulo, data_evento, CEP_evento, id_cidade_evento, logradouro_evento, num_evento, complemento_evento, bairro_evento)
VALUES 
(
    1,
    1,
    'titulo 1',
    '2020-12-31 11:15',
    70000000,
    2,
    'RUA XPTO',
    6,
    'complemento_evento',
    'bairro_evento');

INSERT INTO Tb_Evento ( id_organizacao,id_tipo_evento, titulo, data_evento, CEP_evento, id_cidade_evento, logradouro_evento, num_evento, complemento_evento, bairro_evento)
VALUES 
(
    2,
    1,
    'titulo 2',
    '2020-12-31 12:15',
    70000000,
    2,
    'RUA XPTO',
    6,
    'complemento_evento',
    'bairro_evento');