<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprunteur extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'adresse'
    ];
    public function emprunts()
{
    return $this->hasMany(Emprunt::class);
}
}
