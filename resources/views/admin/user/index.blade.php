@extends('admin.layouts.template')
@section('title','Tout les utilisateurs')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header p-3 ">
                        <h5 class="card-title ">Liste des utilisateurs</h5>
                        <a href="{{ route('user.create') }}" class="btn btn-md border-0 btn-primary">Ajouter</a>
                    </div>
                    <div class="card-body">
                       <table class="table text-center">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td colspan="">{{$user->name}}</td>
                                <td colspan="">{{$user->email}}</td>
                                <td colspan="">{{$user->role}}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection