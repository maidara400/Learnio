<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    protected $fillable = [
        'nom',
        'email',
        'specialite'
    ];

     public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
