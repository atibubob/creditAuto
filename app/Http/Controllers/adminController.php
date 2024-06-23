<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use App\Http\Requests\adminValide;
use App\Http\Requests\adminEdit;
use Carbon\Carbon;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = 'admin';
        $user =  \App\Models\User::where('role', $admin)->get();
        return view('admin.user',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.userForm'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(adminValide $request)
    {
        $login = \App\Models\User::where('email',$request->email)->first();
        if ($login){
            echo '<script>alert("cette email est deja utise veillez creer une autre adresse email")</script>';
            return view('admin.userForm');
        }else{
        $user = new \App\Models\User(); 
        $user->name = $request->nom;
        $user->email = $request->email;
        $user->role = 'admin';
        $user->password = Hash::make($request->password);
        $user->save();
        $admin = 'admin';
        return view('admin.user',[
            'user' => \App\Models\User::where('role', $admin)->get()
        ]); 
    }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       $today = Carbon::now()->toDateString();
      //$dispo = \App\Models\vehicule::whereHas('clients')->with(['clients' => function($query){
      //  $query->select('clients.*', 'client_vehicule.date_d', 'client_vehicule.date_f','client_vehicule.montant')->join('client_vehicule','clients.id', '=', 'client_vehicule.client_id');
      //}])->get();
      // dd($dispo);
       $loc = \App\Models\client::pluck('id');
     // $re = $loc->vehicules()->withPivot('date_d', 'date_f', 'montant')->get();
     $collection = new Collection();
     foreach($loc as $v){
        $client =  \App\Models\client::find($v); 
        $donne =  $client->vehicules;
       // ['id' => $donne->id, 'modele' => $donne->modele, 'marque' => $donne->marque],
       foreach($donne as $vehicule){
        if ($vehicule->pivot->date_f > $today){
            $collection->push([
                'id' => $vehicule->id,
                'modele' => $vehicule->modele,
                'marque' => $vehicule->marque,
                'prix' => $vehicule->prix,
                'type' => $vehicule->type,
                'dd' => $vehicule->pivot->date_d,
                'df' => $vehicule->pivot->date_f 
            ]);
        }
      
    } 
       
    }

    return view('admin.location',[
        'vehicule' => $collection
    ]); 
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('admin.editeur',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(adminEdit $request, string $id)
    {   
         $user =\App\Models\User::findOrFail($id);
        $user->update($request->validated());
        $admin = 'admin';
        return view('admin.user',[
            'user' => \App\Models\User::where('role', $admin)->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user =\App\Models\User::findOrFail($id);
        $user->delete();
        $admin = 'admin';
        return view('admin.user',[
            'users' => \App\Models\User::where('role', $admin)->get()
        ]); 
    }

    public function document($id){
        $document = \App\Models\vehicule::findOrFail($id);
        $patch = $document->document; 
            return response()->file('storage/'.$patch);
    }
}
