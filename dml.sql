
-- Einfügen von Studios
INSERT INTO Studio (Studio) VALUES
('Universal Pictures'),
('Warner Bros'),
('Paramount Pictures');
INSERT INTO Ausstrahlungsart (Ausstrahlungsart) VALUES
('IMAX'),
('2D'),
('3D'),
('4DX');
-- Einfügen von Sprachen
INSERT INTO Sprachen (Sprache) VALUES
('Deutsch'),
('Englisch'),
('Französisch'),
('Italienisch');

-- Einfügen von Filmen
INSERT INTO Filme (Schaudatum, Erste_Ausstrahlung, Film_Ende, Titel, Laenge, Beschreibung, Fk_studio, Regisseur, Hauptdarsteller) VALUES
('2023-05-01', '2023-04-01', '2023-05-15', 'Zeitreise zum Mars', 120, 'Ein Abenteuerfilm über eine Expedition zum Mars, die in einer unerwarteten Zeitreise endet.', 1, 'Jane Doe', 'John Smith'),
('2023-06-10', '2023-05-20', '2023-06-30', 'Die vergessene Stadt', 95, 'Eine Entdeckungsreise in eine antike Stadt, die von der modernen Welt vergessen wurde.', 2, 'Alice Johnson', 'David Brown');

-- Einfügen von Tickets
INSERT INTO Ticket (Fk_Film, Preis, Kaufdatum, Platz,  Reihe, Saal, Fk_Ausstrahlungsart, Fk_Sprache, Kino) VALUES
(1, 12.50, '2023-05-01', 15, 'D', 'Saal 1' ,1 ,1, 'CineMax Berlin'),
(2, 15.00, '2023-06-10', 20, 'A', 'Saal 2', 1, 2, 'CineMax München');
INSERT INTO Bewertungen (Fk_Film, Bewertung, Benutzer_Id, Bewertungsdatum, Kommentar) VALUES
(1, 4, 1, '2023-05-10', 'Toller Film, sehr empfehlenswert!'),
(2, 3, 2, '2023-05-11', 'Guter Film, aber etwas lang.');

