<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{

    protected $fillable = [
        'titre',
        'description',
        'duree',
        'niveau',
        'formateur_id',
    ];
      public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'inscriptions');
    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }
}
