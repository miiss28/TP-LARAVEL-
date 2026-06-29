<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande_produit extends Model
{
   
        protected $fillable = [
        'commande_id',
        'produit_id',
        'qtt_comm',

    ];

}
