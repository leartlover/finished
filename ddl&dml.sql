drop database if exists projekt;
create database projekt;
use projekt;
-- Tabelle für Studios
CREATE TABLE Studio (
    Id_studio INT AUTO_INCREMENT PRIMARY KEY,
    Studio VARCHAR(255) NOT NULL
);
CREATE TABLE Ausstrahlungsart (
    Id_Ausstrahlungsart INT AUTO_INCREMENT PRIMARY KEY,
    Ausstrahlungsart VARCHAR(100)
);

-- Tabelle für Sprachen
CREATE TABLE Sprachen (
    Id_Sprachen INT AUTO_INCREMENT PRIMARY KEY,
    Sprache VARCHAR(100) NOT NULL
);

-- Tabelle für Filme
CREATE TABLE Filme (
    Id_Film INT AUTO_INCREMENT PRIMARY KEY,
    Schaudatum DATE,
    Erste_Ausstrahlung DATE,
    Film_Ende DATE,
    Titel VARCHAR(255) NOT NULL,
    Laenge INT, -- Angabe in Minuten
    Beschreibung TEXT,
    Bild BLOB,
    Fk_studio INT,
    Regisseur VARCHAR(255),
    Hauptdarsteller VARCHAR(255),
    FOREIGN KEY (Fk_studio) REFERENCES Studio(Id_studio)
);

-- Tabelle für Tickets
CREATE TABLE Ticket (
    Id_Ticket INT AUTO_INCREMENT PRIMARY KEY,
    Fk_Film INT NOT NULL,
    Preis DECIMAL(10,2),
    Kaufdatum DATE,
    Platz INT,
    Reihe VARCHAR(10),
    Saal VARCHAR(50),
    Fk_Ausstrahlungsart INT, 
    Fk_Sprache INT,
    Kino VARCHAR(255),
    FOREIGN KEY (Fk_Film) REFERENCES Filme(Id_Film),
    FOREIGN KEY (Fk_Sprache) REFERENCES Sprachen(Id_Sprachen)
    
);
CREATE TABLE Bewertungen (
    Id_Bewertung INT AUTO_INCREMENT PRIMARY KEY,
    Fk_Film INT NOT NULL,
    Bewertung INT CHECK (Bewertung BETWEEN 1 AND 5), -- Bewertung zwischen 1 und 5 Sternen
    Benutzer_Id INT, 
    Bewertungsdatum DATE,
    Kommentar TEXT,
    FOREIGN KEY (Fk_Film) REFERENCES Filme(Id_Film)
);

