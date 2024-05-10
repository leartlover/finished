<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Tickets</h1>
        <h3>Add Ticket:</h3>
        <p>POST:localhost:8000/api/ticket</p>
        <p>{
            "Fk_Film": 2,
            "Preis": "15.00",
            "Kaufdatum": "2023-06-10",
            "Platz": 20,
            "Reihe": "A",
            "Saal": "Saal 2",
            "Fk_Ausstrahlungsart": 1,
            "Fk_Sprache": 2,
            "Kino": "CineMax München"
            }
        </p>
        <h3>Update Ticket:</h3>
        <p>POST:localhost:8000/api/ticket/update</p>
        <p>{
            "Id_Ticket": 2,
            "Fk_Film": 2,
            "Preis": "150.00",
            "Kaufdatum": "2023-06-10",
            "Platz": 20,
            "Reihe": "A",
            "Saal": "Saal 2",
            "Fk_Ausstrahlungsart": 1,
            "Fk_Sprache": 2,
            "Kino": "CineMax München"
        }
        </p>
        <h3>Delete Ticket:</h3>
        <p>DELETE:localhost:8000/api/ticket/{id}</p>
    </div>
    <div>
        <h1>Filme</h1>
        <h3>Add Film:</h3>
        <p>POST:localhost:8000/api/film</p>
        <p>
            {
                "Schaudatum": "2024-05-10",
                "Erste_Ausstrahlung": "2024-05-15",
                "Film_Ende": "2024-06-15",
                "Titel": "Sample Movie",
                "Laenge": 120,
                "Beschreibung": "This is a sample movie description.",
                "Bild": "''<'base64_encoded_image_data>",
                "Fk_studio": 1,
                "Regisseur": "John Doe",
                "Hauptdarsteller": "Jane Smith"
            }
        </p>
        <h3>Update Film:</h3>
        <p>POST:localhost:8000/api/film/update</p>
        <p>
            {
                "Id_Film": "1",
                "Schaudatum": "2024-05-10",
                "Erste_Ausstrahlung": "2024-05-15",
                "Film_Ende": "2024-06-15",
                "Titel": "Sample Movie",
                "Laenge": 120,
                "Beschreibung": "This is a sample movie description.",
                "Bild": "<base64_encoded_image_data>",
                "Fk_studio": 1,
                "Regisseur": "John Doe",
                "Hauptdarsteller": "Jane Smith"
            }
        </p>
        <h3>Delete Film:</h3>
        <p>DELETE:localhost:8000/api/film/{id}</p>
    </div>
</body>
</html>