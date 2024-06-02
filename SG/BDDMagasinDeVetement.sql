DROP DATABASE IF EXISTS Magasin_De_Vetements;

CREATE DATABASE IF NOT EXISTS Magasin_De_Vetements;

USE Magasin_De_Vetements;

DROP TABLE IF EXISTS Clients;

CREATE TABLE Clients (
    idClients_Clients INT AUTO_INCREMENT NOT NULL,
    nom_Clients VARCHAR(60),
    prenom_Clients VARCHAR(60),
    email_Clients VARCHAR(60),
    Adresse_Clients VARCHAR(60),
    pwd_Clients VARCHAR(60),
    tel_Clients VARCHAR(60),
    role_Clients VARCHAR(60),
    PRIMARY KEY (idClients_Clients)
) ENGINE = InnoDB;


DROP TABLE IF EXISTS Articles;

CREATE TABLE Articles (
    idArticles_Articles INT AUTO_INCREMENT NOT NULL,
    nomArticle_Articles VARCHAR(60),
    description_Articles VARCHAR(600),
    taille_Articles INT(60),
    prix_Articles INT(60),
    genre_Articles VARCHAR(60),
    type_Articles VARCHAR(60),
    ref_Articles INT(60),
    image_Articles VARCHAR(60),
    PRIMARY KEY (idArticles_Articles)
) ENGINE = InnoDB;

DROP TABLE IF EXISTS Panier;

CREATE TABLE Panier (
    idPanier_Panier INT AUTO_INCREMENT NOT NULL,
    idClients_Panier INT(60),
    idArticles_Panier INT(60),
    commande_idcommande_commande INT(60),
    PRIMARY KEY (idPanier_Panier)
) ENGINE = InnoDB;

DROP TABLE IF EXISTS Commande;

CREATE TABLE Commande (
    idCommande_Commande INT AUTO_INCREMENT NOT NULL,
    numero_Commande INT(60),
    panier_idpanier_panier INT(60),
    PRIMARY KEY (idCommande_Commande)
) ENGINE = InnoDB;

ALTER TABLE
    Panier
ADD
    CONSTRAINT FK_Panier_commande_idcommande_commande FOREIGN KEY (commande_idcommande_commande) REFERENCES Commande (idCommande_Commande);

ALTER TABLE
    Commande
ADD
    CONSTRAINT FK_Commande_panier_idpanier_panier FOREIGN KEY (panier_idpanier_panier) REFERENCES Panier (idPanier_Panier);

