<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'ticket';
    protected $primaryKey = 'Id_Ticket';
    public $timestamps = false;

    protected $fillable = [
        'Fk_Film', 'Preis', 'Kaufdatum', 'Platz', 'Reihe', 'Saal', 
        'Fk_Ausstrahlungsart', 'Fk_Sprache', 'Kino'
    ];    
}
