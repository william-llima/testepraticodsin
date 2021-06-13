drop database salaodsin;
create database if not exists salaodsin;

use salaodsin;

create table clientes(
id int not null auto_increment,
nome varchar(100) not null,
email varchar(100) not null,
telefone varchar(100) not null,
cpf varchar(30) not null,
senha varchar(100) not null,
primary key(id)
);


create table services(
id int not null auto_increment,
type varchar(100) not null,
primary key(id)
);

create table servicesdesc(
id int not null auto_increment,
serviceid int,
type varchar(100) not null,
preco varchar(20) not null,
descricao varchar(500) not null,
horarioest varchar(20) not null,
foreign key(serviceid)references services(id),
primary key(id)
);
create table agendamentos(
id int not null auto_increment,
typeid int,
clientid int,
dataagendamento varchar(20) not null,
semanaag varchar(20) not null,
horariomarcado varchar(100) not null,
foreign key(clientid)references clientes(id),
foreign key(typeid)references servicesdesc(id),
primary key(id)
);
create table horariosd(
id int not null auto_increment,
typeservices int,
horario varchar(20) not null,
foreign key(typeservices)references services(id),
primary key(id)
);

insert into services(type)values("Cortes"),
("Escova"),
("Quimicas");
insert into servicesdesc(serviceid,type,preco,descricao,horarioest)values(1,"Masculino","20","Corte de cabelo masculino","30m"),
(1,"Feminino","50","Corte de cabelo Feminino","30m"),
(1,"Infantil","30","Corte de cabelo Infantil","30m"),
(2,"Tradicional","80","Escova tradicional de cabelo","2h"),
(2,"Progressiva","150","Progressiva Capilar","2h"),
(2,"Definitive","170","Escova Definitiva","2h"),
(3,"Coloração","150","Coloração capilar","2h"),
(3,"Balayagem","150","Balayagem capilar","2h"),
(3,"Mechas","150","Mechas capilar","2h"),
(3,"Mechas californianas","150","Mechas Californianas capilar","2h"),
(3,"Reflexos","150","Mechas capilares reflexiveis","2h");


insert into horariosd(typeservices,horario)values(1,"8:00"),
(1,"8:30"),
(1,"9:00"),
(1,"9:30"),
(1,"10:00"),
(1,"10:30"),
(1,"11:00"),
(1,"11:30"),
(1,"12:00"),
(1,"12:30"),
(1,"13:00"),
(1,"13:30"),
(1,"14:00"),
(1,"14:30"),
(1,"15:00"),
(1,"15:30"),
(1,"16:00"),
(1,"16:30"),
(1,"17:00"),
(1,"17:30"),
(2,"8:00"),
(2,"10:00"),
(2,"12:00"),
(2,"14:00"),
(2,"16:00"),
(3,"8:00"),
(3,"10:00"),
(3,"12:00"),
(3,"14:00"),
(3,"16:00");






-- create table escovas(
-- id int not null auto_increment,
-- type varchar(100) not null,
-- preco varchar(20) not null,
-- 
-- primary key(id)
-- );

-- create table maquiagen(
-- id int not null auto_increment,
-- type varchar(100) not null,
-- preco varchar(20) not null,
-- descricao varchar(500) not null,
-- primary key(id)
-- );
-- create table quimicasg(
-- id int not null auto_increment,
-- type varchar(100) not null,
-- preco varchar(20) not null,
-- descricao varchar(500) not null,
-- primary key(id)
-- );
-- CORTES
-- Feminino
-- Masculino
-- Infantil
-- ESCOVAS
-- Tradicional
-- Progressiva
-- Definitiva
-- QUÍMICAS EM GERAL
-- Coloração
-- Balayagem
-- Mechas
-- Mechas Californianas
-- Reflexos