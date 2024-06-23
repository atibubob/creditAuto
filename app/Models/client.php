<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $fillable =  [
        'nom',
        'prenom',
        'password', 
        'email', 
        'address' 
    ];
    public function vehicules (){
        return $this->belongsToMany(\App\Models\vehicule::class,'client_vehicule')->withPivot('date_d', 'date_f', 'montant');
    }
}
