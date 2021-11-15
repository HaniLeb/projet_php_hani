DROP DATABASE IF EXISTS rentalweb;
CREATE DATABASE rentalweb CHARACTER SET utf8;
USE rentalweb;

CREATE TABLE rentalweb.user(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR (50) NOT NULL,
  lastname VARCHAR (100) NOT NULL,
  firstname VARCHAR (100) NOT NULL,
  adress VARCHAR (300) NOT NULL,
  email VARCHAR (200) NOT NULL,
  password VARCHAR (500) NOT NULL
);

CREATE TABLE rentalweb.annonce(
  annonce_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR (255) NOT NULL,
  type VARCHAR (255) NOT NULL,
  description TEXT NOT NULL,
  country VARCHAR (255) NOT NULL,
  town VARCHAR (255),
  cp INT (25) NOT NULL,
  price FLOAT NOT NULL,
  image VARCHAR (600),
  rentalStart Date,
  rentalEnd Date
);

ALTER TABLE rentalweb.user ADD UNIQUE(`username`);

INSERT INTO rentalweb.annonce (title, type, description, country, town, cp, price, image, rentalStart, rentalEnd) VALUES
('T2 En centre ville', 'T2', 'studio près des commerces, idéal pour les étudiants', 'France', 'Bordeaux', 33075, 50, NULL, '2021-11-15', '2021-11-30'),
('Studio en centre ville', 'T1', 'studio près des commerces', 'France', 'Paris', 7500, 100, NULL, '2021-11-25', '2021-11-28'),
('Maison en campagne', 'T4', 'Ideal pour profiter du plein air', 'France', NULL, 34000, 50, NULL, '2021-12-01', '2021-12-10'),
('Maison en centre ville', 'T5', 'Maison ideal pour visiter tout les lieux culturel à proximité', 'France', 'paris', 95000, 150, NULL, '2022-01-01', '2022-02-01')