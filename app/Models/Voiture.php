<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'reference',
        'titre',
        'description',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'slug',
        'nature',
        'energie',
        'modele',
        'annee',
        'kilometrage',
        'type',
        'prix',
        'nbre_cylindre',
        'marque_id',
        'categorie_id',
        'status',
        'nouveau',
        'lieu'
    ];

   

}
