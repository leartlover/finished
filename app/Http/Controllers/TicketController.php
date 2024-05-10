<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class TicketController extends Controller
{
    public function getTicketInfo(Request $request, $id = null)
    {
        if ($id !== null) {
            $ticket = DB::table('Ticket as T')
                ->where('T.Id_Ticket', '=', $id)
                ->select('T.*')
                ->first();

            if ($ticket) {
                return response()->json([
                    'ticket' => $ticket,
                ]);
            } else {
                return response()->json([
                    'error' => 'Ticket not found',
                ], 404);
            }
        } else {
            $allTickets = DB::table('Ticket as T')
                ->select('T.*')
                ->get();
        
            return response()->json([
                'tickets' => $allTickets,
            ]);
        }
    }
    public function deleteTicket($id)
    {
        try {
            $deleted = DB::table('Ticket')->where('Id_Ticket', $id)->delete();
        
            if ($deleted) {
                return response()->json(['message' => 'Ticket successfully deleted'], 200);
            } else {
                return response()->json(['error' => 'Ticket not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete ticket: ' . $e->getMessage()], 500);
        }
    }
    public function addTicket(Request $request)
    {
        //return ($request);
        $validated = $request->validate([
            'Fk_Film' => 'required|integer|exists:filme,id_film',  
            'Preis' => 'required|numeric|between:0,9999.99', 
            'Kaufdatum' => 'required|date',                
            'Platz' => 'required|integer',                  
            'Reihe' => 'required|string|max:10',            
            'Saal' => 'required|string|max:50',             
            'Fk_Ausstrahlungsart' => 'required|integer|exists:ausstrahlungsart,id_ausstrahlungsart', 
            'Fk_Sprache' => 'required|integer|exists:sprachen,id_sprachen', 
            'Kino' => 'required|string|max:255'            
        ]);

        $ticket = new Ticket($validated);
        $ticket->save();
    }
    public function updateTicket(Request $request)
    {
        
        $id = $request->input('Id_Ticket');
        if (!$id) {
            return response()->json(['error' => 'Ticket ID is required'], 400);
        } /*else{
            return response()->json(['success' =>'Ticket found ID: '.$id. ' req:'.$request], 200);
        }*/

        
        $ticket = Ticket::findOrFail($id);

        
        $validated = $request->validate([
            'Fk_Film' => 'required|integer|exists:filme,id_film',  
            'Preis' => 'required|numeric|between:0,9999.99', 
            'Kaufdatum' => 'required|date',                
            'Platz' => 'required|integer',                  
            'Reihe' => 'required|string|max:10',            
            'Saal' => 'required|string|max:50',             
            'Fk_Ausstrahlungsart' => 'required|integer|exists:ausstrahlungsart,id_ausstrahlungsart', 
            'Fk_Sprache' => 'required|integer|exists:sprachen,id_sprachen', 
            'Kino' => 'required|string|max:255'            
        ]);

        
        $ticket->update($validated);

        
    }




}

