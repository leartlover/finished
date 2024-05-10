<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $table = 'Filme'; 

    protected $primaryKey = 'Id_Film';
    public $timestamps = true;
    protected $fillable = [
        'Titel', 'Schaudatum', 'Erste_Ausstrahlung', 'Film_Ende', 
        'Laenge', 'Beschreibung', 'Bild','Fk_studio', 'Regisseur', 'Hauptdarsteller'
    ];
}

