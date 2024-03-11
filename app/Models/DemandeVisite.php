<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeVisite extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
    'titre',
    'nom',
    'prenom',
    'email',
    'telephone',
    'message',
    'reference',
    'start',
    'end'];
}
