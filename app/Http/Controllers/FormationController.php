<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Http\Requests\FormationRequest;
use App\Models\Formateur;
use App\Models\User;


class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::Paginate(5);
        return view('admin.formation.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formateurs = User::where('role', 'formateur')->get();
        return view('admin.formation.create', compact('formateurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormationRequest $formationRequest)
    {
      
      Formation::create($formationRequest->validated());
      return redirect()->route('formation.index')->with('success', 'Formation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $formation = Formation::findOrFail($id);
        return view('admin.formation.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id)
    {
        $formation = Formation::findOrFail($id);
        $formateurs = User::where('role', 'formateur')->get();
        return view('admin.formation.edit', compact('formation', 'formateurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormationRequest $request, string $id)
    {
        $formation = Formation::findOrFail($id);
        $formation->update($request->validated());
        return redirect()->route('formation.index')->with('success', 'Formation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formation = Formation::findOrFail($id);
        $formation->delete();
        return redirect()->route('formation.index')->with('success', 'Formation supprimée avec succès.');
    }
}
