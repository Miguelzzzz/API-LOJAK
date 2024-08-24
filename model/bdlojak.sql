create database LOJAK;
use LOJAK;

create table tbCliente (
  nomeCliente varchar(100) not null,
  telefone varchar(18) not null, 
  cep char(8) not null,
  uf char(2) not null,
  cpf char(11) unique not null,
  codCliente int auto_increment primary key not null
) default charset = utf8;

create table tbCompra (
  nomeProduto varchar(20) not null,
  vendedora varchar(100) not null,
  formaPagamento varchar(11) not null,
  valor decimal (9,2) not null, 
  codCompra int auto_increment primary key not null,
  codCliente int not null,
  constraint FKcodigoCliente foreign key (codCliente) references tbCliente (codCliente)
) default charset = utf8;

-- select * from tbCliente;
-- select * from tbCompra;

-- drop database LOJAK;