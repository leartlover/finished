<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Filme;
class FilmController extends Controller
{
    public function getFilmeInfo(Request $request, $id = null)
    {
        if ($id !== null) {
            $film = DB::table('Filme as F')
                ->where('F.Id_Film', '=', $id)
                ->select('F.*')
                ->first();
        
            if ($film) {
                return response()->json($film);
            } else {
                return response()->json(['error' => 'Film not found']);
            }
        } else {
            $allFilme = DB::table('Filme as F')
                ->select('F.*')
                ->get();
            return response()->json($allFilme);
        }
    }

    public function deleteFilm($id) {
        DB::beginTransaction(); 
        try {
            
            DB::table('Bewertungen')->where('Fk_Film', $id)->delete();
    
            
            DB::table('Ticket')->where('Fk_Film', $id)->delete();
    
            
            $deleted = DB::table('Filme')->where('id_Film', $id)->delete();
    
            if ($deleted) {
                DB::commit(); 
                return response()->json(['success' => 'Film deleted successfully']);
            } else {
                return response()->json(['error' => 'Film not found'],404);
            }
        } catch (\Exception $e) {
            DB::rollBack(); 
            return response()->json(['error' => 'Failed to delete film: ' . $e->getMessage()], 500);
        }
    }
    public function addFilm(Request $request)
    {
        
        
        $validated = $request->validate([
            'Titel' => 'required|string|max:255',
            'Schaudatum' => 'required|date',
            'Erste_Ausstrahlung' => 'required|date',
            'Film_Ende' => 'required|date',
            'Laenge' => 'required|integer',
            'Beschreibung' => 'required|string',
            'Bild' => 'required|string',
            'Fk_studio' => 'required|integer|exists:studio,id_studio',
            'Regisseur' => 'nullable|string|max:255',
            'Hauptdarsteller' => 'nullable|string|max:255'
        ]);

        
        $film = new Filme($validated);
        $film->save();

        
    }
    public function updateFilm(Request $request)
    {
        
        $id = $request->input('Id_Film');
        if (!$id) {
            return response()->json(['error' => 'Film ID is required'], 400);
        } /*else{
            return response()->json(['success' =>'Film found ID: '.$id. ' req:'.$request], 200);
        }*/

        
        $film = Filme::findOrFail($id);
        //return($film);
        
        $validated = $request->validate([
            'Titel' => 'required|string|max:255',
            'Schaudatum' => 'required|date',
            'Erste_Ausstrahlung' => 'required|date',
            'Film_Ende' => 'required|date',
            'Laenge' => 'required|integer',
            'Beschreibung' => 'required|string',
            'Bild' => 'required|string',
            'Fk_studio' => 'required|integer|exists:studio,id_studio',
            'Regisseur' => 'nullable|string|max:255',
            'Hauptdarsteller' => 'nullable|string|max:255'
        ]);

        
        $film->update($validated);

        
    }
    
    
}
