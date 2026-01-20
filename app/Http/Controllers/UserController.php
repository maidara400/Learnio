<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    




    public function index()
    {
        $users = User::paginate(4);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
       
      
         $roles = [
            1 => 'admin',
            2 => 'apprenant',
            3 => 'formateur',
        ];

        $data = $request->validated();

        $data['role'] = $roles[$request->role];
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()
            ->route('user.create')
            ->with('success', 'Utilisateur '.$data['role'].' ajouté avec succès');
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
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
         
         $roles = [
            1 => 'admin',
            2 => 'apprenant',
            3 => 'formateur',
        ];

        $data = $request->validated();

        $data['role'] = $roles[$request->role];
        $data['password'] = bcrypt($request->password);

        User::where('id', $id)->update($data);

        return redirect()
            ->route('user.index')
            ->with('success', 'Utilisateur '.$data['role'].' modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()
            ->route('user.index')
            ->with('success', 'Utilisateur supprimé avec succès');
    }
}
