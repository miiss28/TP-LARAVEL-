<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    protected $fillable = [
        'ref_prod',
        'nom_prod',
        'prix_prod',
        'qtt_prod',
        'desc_prod',
    ];

    protected $primaryKey = 'ref_prod';
    public $incrementing=false;
    protected $keyType='String';
}
