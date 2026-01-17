@extends('admin.layouts.template')
@section('title','Tout les utilisateurs')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header p-3 ">
                        <h5 class="card-title ">Liste des formateurs</h5>
                        <a href="{{ route('formateur.create') }}" class="btn btn-md border-0 btn-primary">Ajouter</a>
                    </div>
                    <div class="card-body">
                       <table class="table text-center">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Specialite</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($formateurs as $formateur)
                            <tr>
                                <th scope="row">{{$formateur->id}}</th>
                                <td colspan="">{{$formateur->nom}}</td>
                                <td colspan="">{{$formateur->email}}</td>
                                <td colspan="">{{$formateur->specialite}}</td>
                                <td>
                                    <a href="{{ route('formateur.edit', $formateur->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                    <form action="{{ route('formateur.destroy', $formateur->id) }}" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce Formateur ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $formateurs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection