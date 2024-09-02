<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classeur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'user_id', "service_id"];

}
