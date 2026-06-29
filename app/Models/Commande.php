<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
        protected $fillable = [
        'client_id',
        'date_comm',
        'qtt_comm',
        'num_comm',
        'total_comm',

    ];
    public function client(){
    return $this->belongsTo(Client::class);
    }

public function produits()
{
    return $this->belongsToMany(
        Produit::class,
        'commande_produit',
        'commande_id',
        'produit_id'
    )->withPivot('qtt_comm');
}

}
