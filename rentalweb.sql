DROP DATABASE IF EXISTS rentalweb;
CREATE DATABASE rentalweb CHARACTER SET utf8;
USE rentalweb;

CREATE TABLE user(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  lastname VARCHAR (50) NOT NULL,
  firstname VARCHAR (100) NOT NULL,
  adress VARCHAR (300) NOT NULL,
  email VARCHAR (200) NOT NULL,
  password VARCHAR (500) NOT NULL
);

CREATE TABLE annonce(
  annonce_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR (255) NOT NULL,
  description TEXT NOT NULL,
  country VARCHAR (255) NOT NULL,
  town VARCHAR (255),
  cp INT (25) NOT NULL,
  price FLOAT NOT NULL,
  image VARCHAR (600),
  rentalStart Date
);

INSERT INTO annonce (title, description, country, town, cp, price, image, rentalStart) VALUES
('T2 En centre ville', 'studio près des commerces, idéal pour les étudiants', 'France', 'Bordeaux', 33075, 50, NULL, '2021-11-15')