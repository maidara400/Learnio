<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use Illuminate\Http\Request;

class FormateurController extends Controller
{
    public function index()
    {
        $formateurs = Formateur::all();
        return view('formateurs.index', compact('formateurs'));
    }

    public function create()
    {
        return view('formateurs.create');
    }

    public function store(Request $request)
    {
        Formateur::create($request->all());
        return redirect()->route('formateurs.index');
    }

    public function edit(Formateur $formateur)
    {
        return view('formateurs.edit', compact('formateur'));
    }

    public function update(Request $request, Formateur $formateur)
    {
        $formateur->update($request->all());
        return redirect()->route('formateurs.index');
    }

    public function destroy(Formateur $formateur)
    {
        $formateur->delete();
        return redirect()->route('formateurs.index');
    }
}
