<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $fillable = [
    'titre',
    'auteur',
    'categorie',
    'annee',
    'quantite',
    
];
    public function emprunts()
{
    return $this->hasMany(Emprunt::class);
}
}
