DROP TABLE IF EXISTS Besoins;
DROP TABLE IF EXISTS Employe;
DROP TABLE IF EXISTS TypeEmploye;
DROP TABLE IF EXISTS Service;


CREATE TABLE Service(
    id int UNSIGNED AUTO_INCREMENT,
    nom VARCHAR(60)NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

CREATE TABLE TypeEmploye(
    id int UNSIGNED AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

CREATE TABLE Employe(
    id int UNSIGNED AUTO_INCREMENT,
    nom VARCHAR(60) NOT NULL,
    email VARCHAR(60),
    id_type INT UNSIGNED,
    id_service INT UNSIGNED,
    PRIMARY KEY(id),
    CONSTRAINT fk_employe_type FOREIGN KEY(id_type) REFERENCES TypeEmploye(id),
    CONSTRAINT fk_employe_service FOREIGN KEY(id_service) REFERENCES Service(id)
) ENGINE = INNODB;

CREATE TABLE Besoins(
    id int UNSIGNED AUTO_INCREMENT,
    id_employe INT UNSIGNED,
    id_superieur INT UNSIGNED,
    date_declaration DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_resolution DATETIME ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    CONSTRAINT fk_employe_besoins FOREIGN KEY(id_employe) REFERENCES Employe(id),
    CONSTRAINT fk_superieur_besoins FOREIGN KEY(id_superieur) REFERENCES Employe(id)
) ENGINE = INNODB;
