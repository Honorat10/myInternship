<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'lettre', 'nom_complet', 'email', 'service', 'type', 'ecole', 'cv', 'status', 'date_depot',
    ];
}
