<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formateur extends Model
{
    use HasFactory;
    
    // AJOUTEZ ABSOLUMENT CETTE LIGNE :
    //protected $table = 'formateur'; // Spécifiez le nom exact de notre table
    
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'specialite',
    ];
}