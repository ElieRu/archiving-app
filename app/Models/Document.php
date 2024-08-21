<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    
    protected $fillable = ['titre', 'chemin', 'type', 'description', 'user_id', 'classeur_id', 'service_id'];

}
