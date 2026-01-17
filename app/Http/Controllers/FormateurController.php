<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formateur;
use App\Http\Requests\FormateurRequest;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $formateurs = Formateur::Paginate(5);
        return view('admin.formateur.index', compact('formateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.formateur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormateurRequest $request)
    {
         $specialite = [
            1 => 'Developpement Web',
            2 => 'IA',
            3 => 'Base de Donnees',
            4 => 'cybersecurite',
            5 => 'Design',
            6 => 'Reseaux',

        ];
        //
        $data = $request->validated();
        $data['specialite'] = $specialite[$request->specialite];
        Formateur::create($data);
        return redirect()->route('formateur.create')->with('success', 'Formateur créé avec succès.');   

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $formateur = Formateur::findOrFail($id);
        return view('admin.formateur.edit', compact('formateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormateurRequest $request, string $id)
    {
        //
        $specialite = [
            1 => 'Developpement Web',
            2 => 'IA',
            3 => 'Base de Donnees',
            4 => 'cybersecurite',
            5 => 'Design',
            6 => 'Reseaux',
        ];

        $data = $request->validated();

        $data['specialite'] = $specialite[$request->specialite];

        Formateur::where('id', $id)->update($data);

        return redirect()
            ->route('formateur.index')
            ->with('success', 'Formateur '.$data['specialite'].' modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $formateur = Formateur::findOrFail($id);
        $formateur->delete();
        return redirect()->route('formateur.index')->with('success', 'Formateur supprimé avec succès.');    
    }
}
