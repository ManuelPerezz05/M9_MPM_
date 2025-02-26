CREATE DATABASE IF NOT EXISTS manuel_perez_iticdesk;
USE manuel_perez_iticdesk;

CREATE TABLE usuaris (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    cognom VARCHAR(100) NOT NULL,
    dni VARCHAR(9) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    rol ENUM('professor', 'administrador') NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE incidencies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    referencia VARCHAR(100) NOT NULL UNIQUE,
    prioritat ENUM('I', 'II', 'III', 'IV') NOT NULL,
    titol VARCHAR(100) NOT NULL,
    descripcio TEXT NOT NULL,
    usuari_email VARCHAR(100) NOT NULL,
    data_creacio DATETIME DEFAULT CURRENT_TIMESTAMP,
    estat ENUM('Oberta', 'Gestio', 'Tancada', 'Reoberta') DEFAULT 'Oberta',
    FOREIGN KEY (usuari_email) REFERENCES usuaris(email)
);


INSERT INTO usuaris (nom, cognom, dni, email, rol, password)
VALUES ('eric', 'torrente', '19015812P', 'erictorrente@gmail.com', 'professor', 'eric');

INSERT INTO usuaris (nom, cognom, dni, email, rol, password)
VALUES ('manuel', 'perez', '89329423I', 'manuelperez@gmail.com', 'administrador', 'manuel');

INSERT INTO usuaris (nom, cognom, dni, email, rol, password)
VALUES ('aaron', 'rodriguez', '76335459P', 'aaronrodriguez@gmail.com', 'professor', 'aaron');

INSERT INTO usuaris (nom, cognom, dni, email, rol, password)
VALUES ('alex', 'ramos', '54864520M', 'alexramos@gmail.com', 'administrador', 'alex');



INSERT INTO incidencies (referencia, prioritat, titol, descripcio, usuari_email, estat) 
VALUES ('INC005', 'II', 'Projector sense senyal', 'El projector de l’aula 3 no detecta cap entrada de vídeo.', 'erictorrente@gmail.com', 'Gestio');

INSERT INTO incidencies (referencia, prioritat, titol, descripcio, usuari_email, estat) 
VALUES ('INC006', 'I', 'Fallada en el servidor de correu', 'Els correus electrònics no s’estan enviant ni rebent correctament.', 'manuelperez@gmail.com', 'Oberta');

INSERT INTO incidencies (referencia, prioritat, titol, descripcio, usuari_email, estat) 
VALUES ('INC003', 'I', 'Caiguda del sistema de xarxa', 'La xarxa interna ha deixat de funcionar i afecta a totes les aules.', 'aaronrodriguez@gmail.com', 'Oberta');

INSERT INTO incidencies (referencia, prioritat, titol, descripcio, usuari_email, estat) 
VALUES ('INC004', 'II', 'Error d’accés a l’aplicació', 'Diversos usuaris no poden iniciar sessió en l’aplicació de gestió.', 'alexramos@gmail.com', 'Gestio');
