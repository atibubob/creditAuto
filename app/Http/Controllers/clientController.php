<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\valideClient;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client =  \App\Models\client::orderBy('created_at', 'desc')->paginate();
        return view('admin.client',[
            'client' => $client
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clienForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(valideClient $request)
    {
        $login = \App\Models\client::where('email',$request->email)->first();
        if ($login){
            echo '<script>alert("cette email est deja utise veillez creer une autre adresse email")</script>';
            return view('clienForm');
        }else{
            $client = new \App\Models\client();
            $client->nom = $request->nom;
            $client->prenom = $request->prenom;
            $client->password = $request->password;
            $client->email = $request->email;
            $client->address = $request->address; 
            $client->save();
            $user = new \App\Models\User(); 
            $user->name = $request->nom;
            $user->email = $request->email;
            $user->role = 'client';
            $user->password = Hash::make($request->password);
            $user->save();
            $histo = $client->vehicules;
            $login = \App\Models\client::where('email',$request->email)->first();
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
            return view('Board',[
                'login' => $login,
                'vehicule' => $vehicule,
                'histo' => $histo
            ]);
        }
      
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.many');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = \App\Models\client::findOrFail($id);
        return view('modification',[
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(valideClient $request, string $id)
    {
      
        $client =\App\Models\client::findOrFail($id);
        $user =\App\Models\User::findOrFail($id);
        $client->update($request->validated());
        $user->update($request->validated());
        $histo = $client->vehicules;
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
        return view('Board',[
            'login' => \App\Models\client::findOrFail($id),
            'vehicule' => $collection,
            'histo' => $histo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client =\App\Models\client::findOrFail($id);
        $user =\App\Models\User::findOrFail($id);
        $user->delete();
        $client->delete();
        return view('admin.client',[
            'client' => \App\Models\client::orderBy('created_at', 'desc')->paginate(0)
        ]);   
    }
}
