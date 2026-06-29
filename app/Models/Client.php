<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'email',
    ];
}
