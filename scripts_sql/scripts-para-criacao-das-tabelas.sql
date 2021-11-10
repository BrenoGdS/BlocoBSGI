/* BSGI2020-2Logicov2: */
CREATE DATABASE BLOCOBSGI;

CREATE TABLE LiderOrganizacional (
    idliderorganizacional INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
    idorganizacao INTEGER,
    idusuario INTEGER
);

CREATE TABLE Usuario (
    idusuario INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nomeusuario VARCHAR(60) NOT NULL,
    emailusuario VARCHAR(60) NOT NULL,
    senhausuario VARCHAR(60) NOT NULL,
    boladministrador SMALLINT NOT NULL,
    codusuario INTEGER,
    telefoneusuario BIGINT(11) ZEROFILL,
    codtiposexo TINYINT(1) NOT NULL
);

CREATE TABLE Organizacao (
    idorganizacao INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
    idtipoorg TINYINT(2) NOT NULL,
    idorganizacaopai INTEGER,
    nomeorg VARCHAR(30) NOT NULL,
    telfixoorg INT(10) ZEROFILL,
    telcelorg BIGINT(11) ZEROFILL,
    emailorg VARCHAR(60),
    CEPorg INTEGER(8) ZEROFILL,
    idcidadeorg INT(4) NOT NULL,
    logradouroorg VARCHAR(60),
    numorg INT(3),
    complementoorg VARCHAR(30),
    bairroorg VARCHAR(30)
);

CREATE TABLE TipoOrganizacao (
    idtipoorg TINYINT(2) PRIMARY KEY NOT NULL,
    desctipoorg VARCHAR(30) NOT NULL
);

CREATE TABLE UsuarioOrganizacao (
    idusuarioorganizacao INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
    idusuario INTEGER,
    idorganizacao INTEGER
);

CREATE TABLE Evento (
    idevento INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
    idorganizacao INTEGER NOT NULL,
    idtipoevento TINYINT(2) NOT NULL,
    titulo VARCHAR(60) NOT NULL,
    dataevento DATETIME NOT NULL,
    CEPevento INTEGER(8) ZEROFILL,
    idcidadeevento INT(4),
    logradouroevento VARCHAR(60),
    numevento INT(3),
    complementoevento VARCHAR(30),
    bairroevento VARCHAR(30)
);

CREATE TABLE TipoEvento (
    idtipoevento TINYINT(2) PRIMARY KEY NOT NULL,
    desctipoevento VARCHAR(60) NOT NULL
);

CREATE TABLE UF (
    idUF CHAR(2) PRIMARY KEY NOT NULL,
    nomeUF VARCHAR(30) NOT NULL,
    idregiao TINYINT(1)
);

CREATE TABLE Cidade (
    idcidade INT(4) PRIMARY KEY NOT NULL,
    idUF CHAR(2),
    desccidade VARCHAR(30) NOT NULL
);

CREATE TABLE Regiao (
    idregiao TINYINT(1) PRIMARY KEY NOT NULL,
    descregiao VARCHAR(12) NOT NULL
);

CREATE TABLE tiposexo (
    codtiposexo TINYINT(1) PRIMARY KEY NOT NULL,
    desctiposexo VARCHAR(12) NOT NULL
);
 
ALTER TABLE LiderOrganizacional ADD CONSTRAINT FKLiderOrganizacional1
    FOREIGN KEY (idorganizacao)
    REFERENCES Organizacao (idorganizacao);
 
ALTER TABLE LiderOrganizacional ADD CONSTRAINT FKLiderOrganizacional2
    FOREIGN KEY (idusuario)
    REFERENCES Usuario (idusuario);


ALTER TABLE Usuario ADD CONSTRAINT FKUsuario2
    FOREIGN KEY (codtiposexo)
    REFERENCES tiposexo (codtiposexo);

 
ALTER TABLE Organizacao ADD CONSTRAINT FKOrganizacao2
    FOREIGN KEY (idtipoorg)
    REFERENCES TipoOrganizacao (idtipoorg);
 
ALTER TABLE Organizacao ADD CONSTRAINT FKOrganizacao3
    FOREIGN KEY (idcidadeorg)
    REFERENCES Cidade (idcidade);
 
ALTER TABLE Organizacao ADD CONSTRAINT FKOrganizacao4
    FOREIGN KEY (idorganizacaopai)
    REFERENCES Organizacao (idorganizacao);
 
ALTER TABLE UsuarioOrganizacao ADD CONSTRAINT FKUsuarioOrganizacao1
    FOREIGN KEY (idorganizacao)
    REFERENCES Organizacao (idorganizacao);
 
ALTER TABLE UsuarioOrganizacao ADD CONSTRAINT FKUsuarioOrganizacao2
    FOREIGN KEY (idusuario)
    REFERENCES Usuario (idusuario);

ALTER TABLE Evento ADD CONSTRAINT FKEvento2
    FOREIGN KEY (idtipoevento)
    REFERENCES TipoEvento (idtipoevento);
 
ALTER TABLE Evento ADD CONSTRAINT FKEvento3
    FOREIGN KEY (idcidadeevento)
    REFERENCES Cidade (idcidade);
 
ALTER TABLE Evento ADD CONSTRAINT FKEvento4
    FOREIGN KEY (idorganizacao)
    REFERENCES Organizacao (idorganizacao);
 
ALTER TABLE UF ADD CONSTRAINT FKUF2
    FOREIGN KEY (idregiao)
    REFERENCES Regiao (idregiao);
 
ALTER TABLE Cidade ADD CONSTRAINT FKCidade2
    FOREIGN KEY (idUF)
    REFERENCES UF (idUF);
