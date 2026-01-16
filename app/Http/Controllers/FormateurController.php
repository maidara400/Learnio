<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formateur; // Import du modèle (notez le F majuscule)

class FormateurController extends Controller
{
    // Afficher la liste des formateurs
    public function index(){
    $formateurs = Formateur::paginate(10); // ← Changé de all() à paginate()
    return view('formateur.index', compact('formateurs'));
}
    // Afficher le formulaire de création
    public function create(){
        return view('formateur.create');
    }
    
    // Enregistrer un nouveau formateur
    public function store(Request $request){
        // Validation
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:formateurs,email', // Note: "formateurs" au pluriel
            'specialite' => 'required',
        ]);

        // Enregistrement
        Formateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'specialite' => $request->specialite,
        ]);

        // Redirection
        return redirect()->route('formateurs.index')
            ->with('success', 'Formateur ajouté avec succès');
    }
    
    // Afficher les détails d'un formateur
    public function show($id){
        $formateur = Formateur::findOrFail($id); // Trouve ou erreur 404
        return view('formateurs.show', compact('formateur'));
    }
    
    // Afficher le formulaire de modification
    public function edit($id){
        $formateur = Formateur::findOrFail($id);
        return view('formateurs.edit', compact('formateur'));
    }
    
    // Mettre à jour un formateur
    public function update(Request $request, $id){
        // Trouver le formateur
        $formateur = Formateur::findOrFail($id);
        
        // Validation (email unique sauf pour l'enregistrement actuel)
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:formateur,email,' . $id,
            'specialite' => 'required',
        ]);

        // Mise à jour
        $formateur->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'specialite' => $request->specialite,
        ]);

        // Redirection
        return redirect()->route('formateurs.index')
            ->with('success', 'Formateur modifié avec succès');
    }
    
    // Supprimer un formateur
    public function destroy($id){
        // Trouver et supprimer
        $formateur = Formateur::findOrFail($id);
        $formateur->delete();

        // Redirection
        return redirect()->route('formateurs.index')
            ->with('success', 'Formateur supprimé avec succès');
    }
}