@extends('admin.layouts.template')
@section('title','Ajouter un formateur')
@section('content')
        
         <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('admin/assets/images/logo-abbr.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5 text-center">
                        <h2 class="fs-20 fw-bolder mb-4">Inscription</h2>
                        <h4 class="fs-13 fw-bold mb-2">Inscrire un nouveau formateur</h4>
                        {{-- <p class="fs-12 fw-medium text-muted">Thank you for get back <strong>Nelel</strong> web applications, let's access our the best recommendation for you.</p> --}}
                        <form action="{{ route('formateur.store') }}" method="post" class="w-100 mt-4 pt-2">
                            @csrf
                            <div class="form-floating mb-4">
                                 @error('nom')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" required>
                                <label for="floatingInput">Nom</label>
                            </div>
                            
                            <div class="form-floating mb-4">
                                @error('email')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                <input type="email" class="form-control" id="floatingInput" value="{{ old('email') }}" name="email" required>
                                <label for="floatingInput">Email </label>
                            </div>
                            
                            <select class="form-select" aria-label="specialite" name="specialite" required value="{{ old('specialite') }}">
                                 @error('specialite')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                {{-- <option selected>Role</option> --}}
                                <option value="1">Developpement Web</option>
                                <option value="2" selected>IA</option>
                                <option value="3">Base de Données</option>
                                <option value="4">Cybersécurité</option>
                                <option value="5">Design</option>
                                <option value="6">Reseaux</option>
                            </select>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection