<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\storage;
use App\Http\Requests\valideVehicule;
use App\Http\Requests\modifVehicule;

class vehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicule = \App\Models\vehicule::orderBy('created_at', 'desc')->paginate();
         return view('admin.index',[
             'vehicule' => $vehicule
         ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicule = new \App\Models\vehicule();
        $vehicule->fill([
            'modele' => 'TXL',
            'marque' => 'TOYOTA',
            'type' => 'voiture',
            'annee' => 2020,
        ]);
        return view('admin.form',[
            'vehicules'=> $vehicule
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(valideVehicule $request)
    {
        $visuel = $request->visuel;
        $data = $visuel->store('file', 'public');
        $pdf = $request->document;
        $doc = $pdf->store('file', 'public');
        $vehicule = new \App\Models\vehicule();
        $vehicule->modele = $request->modele;
        $vehicule->marque = $request->marque;
        $vehicule->type = $request->type;
        $vehicule->couleur = $request->couleur;
        $vehicule->prix = $request->prix;
        $vehicule->annee = $request->annee;
        $vehicule->document = $doc;
        $vehicule->visuel = $data;
        $vehicule->save();
        return view('admin.index',[
            'vehicule' => \App\Models\vehicule::orderBy('created_at', 'desc')->paginate()
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

  $vehicule = \App\Models\vehicule::findOrFail($id);
        return view('admin.vehicule',[
            'vehicule' => $vehicule
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicule = \App\Models\vehicule::findOrFail($id);
        return view('admin.edit',[
            'vehicule' => $vehicule
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(modifVehicule $request, string $id)
    {
        $vehicule =\App\Models\vehicule::findOrFail($id);
        $vehicule->update($request->validated());
        return view('admin.index',[
            'vehicule' => \App\Models\vehicule::orderBy('created_at', 'desc')->paginate()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicule =\App\Models\vehicule::findOrFail($id);
        $vehicule->delete();
        return view('admin.index',[
            'vehicule' => \App\Models\vehicule::orderBy('created_at', 'desc')->paginate(0)
        ]);
    }
}
