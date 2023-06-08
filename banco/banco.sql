CREATE DATABASE lista5;
use lista5;

CREATE TABLE agenda(
    id_agenda int primary key auto_increment not null,
    nome varchar(50) not null,
    apelido varchar(40) not null,
    endereco varchar(70) not null,
    bairro varchar(50) not null,
    cidade varchar(50) not null,
    estado varchar(02) not null,
    telefone varchar(15) not null,
    celular varchar(15) not null,
    email varchar(70) not null,
    dt_cadastro date not null,
    foto text null
);