CREATE DATABASE database_GlowZone;
USE database_GlowZone;
CREATE TABLE cenik
(
    ID int AUTO_INCREMENT,
    Cena DOUBLE not null,
    Velikost int not null,
    Barva varchar(255),
    PRIMARY KEY (ID)
);

CREATE TABLE coments 
(
    id_coment int AUTO_INCREMENT PRIMARY KEY,
    ime varchar(255),
    priimek varchar(255),
    coment varchar(255)
);

INSERT INTO coments(ime, priimek, coment)
VALUES ("admin","admin","Test");

INSERT INTO cenik(Cena,Velikost,Barva) VALUES
(19.99,30,"Rdeča"),
(25.99,50,"Črna"),
(32.99,80,"Zelena");