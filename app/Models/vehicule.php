<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicule extends Model
{
    use HasFactory;
    
    protected $fillable =  [
        'modele',
        'marque',
        'type',
        'couleur', 
        'prix', 
        'document', 
        'visuel',
        'annee',
        'montant' 
    ];
    public function clients (){
        return $this->belongsToMany(\App\Models\client::class,'client_vehicule')->withPivot('date_d', 'date_f', 'montant');
    }
}
