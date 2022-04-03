use datalayer_example;

CREATE TABLE usuario (
    id int primary key auto_increment,
    nome varchar(100),
    email varchar(100),
    senha varchar(255),
    id_tipo_usuario int not null,
    ativo char(2)
);

CREATE TABLE celular (
    id int primary key auto_increment,
    id_usuario int not null,
    celular varchar(50),
    ativo char(2)
);

CREATE TABLE anuncio (
    id int primary key auto_increment,
    id_objeto int not null,
    id_tipo_imovel int not null,
    id_cidade int not null,
    titulo varchar(255),
    preco varchar(255),
    descricao LONGTEXT,
    quartos int,
    garagem int,
    area varchar(50), 
    id_usuario varchar(100),
    ativo char(2)
);

CREATE TABLE anuncio_imagem (
    id int primary key auto_increment,
    url_imagem varchar(255),
    id_anuncio int
);

CREATE TABLE objetivo (
    id int primary key auto_increment,
    nome varchar(200)
);

CREATE TABLE tipo_imovel (
    id int primary key auto_increment,
    nome varchar(200)
);

CREATE TABLE cidade (
    id int primary key auto_increment,
    nome varchar(200)
);

CREATE TABLE geral (
    id int primary key auto_increment,
    email varchar(100),
    celular varchar(20),
    creci varchar(100),
    endereco varchar(150),
    facebook varchar(100),
    instagram varchar(100),
    url varchar(100)
);

INSERT INTO usuario (nome,email,senha,id_tipo_usuario,ativo)
       VALUES ("Felipe Henrique","felipe.deoliveira@unicesumar.edu.br","15d0d5ff64e1cae4fac3dab95f088b2e",1,"S");

INSERT INTO geral (email,celular,creci,endereco,facebook,instagram,url)
       VALUES ("hlima@hlimacorretor.com.br","44998287203","F33599","Rua João Perin","https://www.facebook.com/","https://www.instagram.com/","/theme/assets/img/fanpage_header.jpg");