<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Contact extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
 protected $fillable = ['nom','email','telephone','sujet','contenu'];


 
}
