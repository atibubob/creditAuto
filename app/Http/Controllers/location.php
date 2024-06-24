<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\loginValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class location extends Controller
{
    public function choix (Request $request) {
        return view('index',[
            'vehicule' =>\App\Models\vehicule::findOrFail($request->bolide),
            'client' => $request->client
        ]);    
    }
    public function louer(Request $request){
        $datef = Carbon::parse( $request->date_f);
        $dated = Carbon::parse( $request->date_d);
        $jour = $dated->diffInDays($datef);
        $vehicule = \App\Models\vehicule::where('id',$request->vehicule)->first();
        $client = \App\Models\client::where('id',$request->client)->first();
        $prix = $vehicule->prix * $jour;
        $vehicule->clients()->attach($client,[
            'date_d' => $request->date_d,
            'date_f' => $request->date_f,
            'montant' => $prix 
        ]);
        $collection = new Collection();
        $auto = \App\Models\vehicule::whereDoesntHave('clients')->get();
        foreach($auto as $vehicule){
                $collection->push([
                    'id' => $vehicule->id,
                    'modele' => $vehicule->modele,
                    'marque' => $vehicule->marque,
                    'prix' => $vehicule->prix,
                    'type' => $vehicule->type,
                    'couleur' => $vehicule->couleur,
                    'annee' => $vehicule->annee,
                    'image' => $vehicule->visuel  
                ]);
        }    
       $today = Carbon::now()->toDateString();
        $loc = \App\Models\client::pluck('id');
      foreach($loc as $v){
         $client =  \App\Models\client::find($v); 
         $donne =  $client->vehicules;
        foreach($donne as $vehicule){
         if ($vehicule->pivot->date_f <  $today){
             $collection->push([
                'id' => $vehicule->id,
                'modele' => $vehicule->modele,
                'marque' => $vehicule->marque,
                'prix' => $vehicule->prix,
                'type' => $vehicule->type,
                'couleur' => $vehicule->couleur,
                'annee' => $vehicule->annee,
                'image' => $vehicule->visuel  
             ]);
         
       
     } 
        
     }
    }
        $histo = $client->vehicules;
        return view('Board',[
            'login' => $client,
            'vehicule' => $collection,
            'histo' => $histo
        ]);
    
}
    
    public function login (loginValidation $request){
        $valide = $request->validated();
        $role = \App\Models\User::where('email',$request->email)->first();
       if( Auth::attempt($valide) and $role->role == "client"){
        $login = \App\Models\client::where('email',$request->email)->first();
        $histo = $login->vehicules;
        $collection = new Collection();
        $auto = \App\Models\vehicule::whereDoesntHave('clients')->get();
        foreach($auto as $vehicule){
                $collection->push([
                    'id' => $vehicule->id,
                    'modele' => $vehicule->modele,
                    'marque' => $vehicule->marque,
                    'prix' => $vehicule->prix,
                    'type' => $vehicule->type,
                    'couleur' => $vehicule->couleur,
                    'annee' => $vehicule->annee,
                    'image' => $vehicule->visuel 
                ]);
            }  
       $today = Carbon::now()->toDateString();
        $loc = \App\Models\client::pluck('id');
      foreach($loc as $v){
         $client =  \App\Models\client::find($v); 
         $donne =  $client->vehicules;
        foreach($donne as $vehicule){
         if ($vehicule->pivot->date_f <  $today){
             $collection->push([
                'id' => $vehicule->id,
                'modele' => $vehicule->modele,
                'marque' => $vehicule->marque,
                'prix' => $vehicule->prix,
                'type' => $vehicule->type,
                'couleur' => $vehicule->couleur,
                'annee' => $vehicule->annee,
                'image' => $vehicule->visuel  
             ]);
         }
       
     } 
        
     };
        return view('Board',[
            'login' => $login,
            'vehicule' => $collection,
            'histo' => $histo
        ]);
       }else{
        echo '<script>alert("Mot de passe ou addresse email incorect")</script>';
        return view('login');
       }
    }
    public function connection (loginValidation $request){
        $valide = $request->validated();
        $role = \App\Models\User::where('email',$request->email)->first();
       if( Auth::attempt($valide) and $role->role == "admin"){
        return view('admin.many');
       }else{
        echo '<script>alert("Mot de passe ou addresse email incorect")</script>';
        return view('admin.connexion');
       }
    }  

    public function auth (){
        return view('admin.connexion');
    }
}
