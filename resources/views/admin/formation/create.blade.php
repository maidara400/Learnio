@extends('admin.layouts.template')
@section('title','Ajouter une formation')
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
                        <h4 class="fs-13 fw-bold mb-2">Inscrire une nouvelle formation</h4>
                        {{-- <p class="fs-12 fw-medium text-muted">Thank you for get back <strong>Nelel</strong> web applications, let's access our the best recommendation for you.</p> --}}
                        <form action="{{ route('formation.store') }}" method="post" class="w-100 mt-4 pt-2">
                            @csrf
                            <div class="form-floating mb-4">
                                 @error('titre')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" name="titre" value="{{ old('titre') }}" required>
                                <label for="floatingInput">Titre</label>
                            </div>
                        
                            <div class="form-floating mb-4">
                                 @error('description')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                <textarea class="form-control" name="description" placeholder="" id="floatingTextarea2" style="height: 100px">{{ old('description') }}</textarea>
                                <label for="floatingTextarea2">Description</label>
                            </div>
                            
                            <select class="form-select mb-4" aria-label="duree" name="duree" required value="{{ old('duree') }}">
                                 @error('duree')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                <option value="1" {{ old('duree') == '1' ? 'selected' : '' }}>1 an</option>
                                <option value="2" {{ old('duree') == '2' ? 'selected' : '' }}>2 ans</option>
                                <option value="3" {{ old('duree') == '3' ? 'selected' : '' }}>3 ans</option>
                                <option value="4" {{ old('duree') == '4' ? 'selected' : '' }}>4 ans</option>
                                
                            </select>

                            <select class="form-select mb-4" aria-label="niveau" name="niveau" required value="{{ old('niveau') }}">
                                 @error('niveau')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                <option value="débutant" {{ old('niveau') == 'débutant' ? 'selected' : '' }}>Débutant</option>
                                <option value="intermédiaire" {{ old('niveau') == 'intermédiaire' ? 'selected' : '' }}>Intermédiaire</option>
                                <option value="avancé" {{ old('niveau') == 'avancé' ? 'selected' : '' }}>Avancé</option>  
                            </select>

                              <select class="form-select" aria-label="formateur" name="formateur_id" required value="{{ old('formateur_id') }}">
                                 @error('formateur_id')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                @foreach($formateurs as $formateur)
                               
                                    <option value="{{ $formateur->id }}" {{ old('formateur_id') == $formateur->id ? 'selected' : '' }}>{{ $formateur->name }}</option>
                                @endforeach
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