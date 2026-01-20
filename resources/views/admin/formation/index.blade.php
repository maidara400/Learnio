@extends('admin.layouts.template')
@section('title','Tout les utilisateurs')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header p-3 ">
                        <h5 class="card-title ">Liste des formations</h5>
                        <a href="{{ route('formation.create') }}" class="btn btn-md border-0 btn-primary">Ajouter</a>
                    </div>
                    <div class="card-body">
                       <table class="table text-center">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">titre</th>
                            <th scope="col">description</th>
                            <th scope="col">duree</th>
                            <th scope="col">niveau</th>
                            <th scope="col">formateur</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($formations as $formation)
                            <tr>
                                <th scope="row">{{$formation->id}}</th>
                                <td colspan="">{{$formation->titre}}</td>
                                <td colspan="">{{$formation->description}}</td>
                                <td colspan="">{{$formation->duree}} An(s)</td>
                                <td colspan="">{{$formation->niveau}}</td>
                                <td colspan="">{{$formation->formateur_id}}</td>
                                <td>
                                    <a href="{{ route('formation.edit', $formation->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                    <form action="{{ route('formation.destroy', $formation->id) }}" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce Formateur ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $formations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection