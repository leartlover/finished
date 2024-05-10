<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getInfo(Request $request, $id = null)
    {
        // Überprüfen, ob eine ID angegeben ist
        if ($id !== null) {
            // Führen Sie die Abfrage aus, um Informationen über das Ticket mit der angegebenen ID abzurufen
            $ticketInfo = DB::table('Ticket as T')
                ->join('Filme as F', 'T.Fk_Film', '=', 'F.Id_Film')
                ->join('Studio as S', 'F.Fk_studio', '=', 'S.Id_studio')
                ->join('Sprachen as SP', 'T.Fk_Sprache', '=', 'SP.Id_Sprachen')
                ->where('T.Id_Ticket', $id)
                ->select(
                    'T.Id_Ticket',
                    'F.Titel',
                    'F.Schaudatum',
                    'F.Erste_Ausstrahlung',
                    'F.Film_Ende',
                    'F.Laenge',
                    'F.Beschreibung',
                    'F.Regisseur',
                    'F.Hauptdarsteller',
                    'S.Studio',
                    'SP.Sprache',
                    'T.Preis',
                    'T.Kaufdatum',
                    'T.Platz',
                    'T.Reihe',
                    'T.Saal',
                    'T.Kino'
                )
                ->first(); // Holen Sie nur das erste Ergebnis
                
            // Überprüfen, ob ein Ergebnis gefunden wurde
            if ($ticketInfo) {
                // Geben Sie die Daten im JSON-Format aus
                return response()->json($ticketInfo);
            } else {
                // Geben Sie eine Fehlermeldung aus, wenn kein Ticket mit der angegebenen ID gefunden wurde
                return response()->json(['error' => 'Ticket not found for the given ID'], 404);
            }
        } else {
            // Wenn keine ID angegeben ist, führen Sie eine Abfrage für alle Tickets durch
            $allTickets = DB::table('Ticket as T')
                ->join('Filme as F', 'T.Fk_Film', '=', 'F.Id_Film')
                ->join('Studio as S', 'F.Fk_studio', '=', 'S.Id_studio')
                ->join('Sprachen as SP', 'T.Fk_Sprache', '=', 'SP.Id_Sprachen')
                ->select(
                    'T.Id_Ticket',
                    'F.Titel',
                    'F.Schaudatum',
                    'F.Erste_Ausstrahlung',
                    'F.Film_Ende',
                    'F.Laenge',
                    'F.Beschreibung',
                    'F.Regisseur',
                    'F.Hauptdarsteller',
                    'S.Studio',
                    'SP.Sprache',
                    'T.Preis',
                    'T.Kaufdatum',
                    'T.Platz',
                    'T.Reihe',
                    'T.Saal',
                    'T.Kino'
                )
                ->orderBy('T.Kaufdatum', 'DESC')
                ->get();
                
            // Geben Sie die Daten im JSON-Format aus
            return response()->json($allTickets);
        }
    }

}
