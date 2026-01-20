@extends('admin.layouts.template')
@section('title','Modifier un utilisateur')
@section('content')
        
         <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('admin/assets/images/logo-abbr.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5 text-center">
                        <h2 class="fs-20 fw-bolder mb-4">Modification</h2>
                        <h4 class="fs-13 fw-bold mb-2">Modifier un utilisateur</h4>
                        {{-- <p class="fs-12 fw-medium text-muted">Thank you for get back <strong>Nelel</strong> web applications, let's access our the best recommendation for you.</p> --}}
                        <form action="{{ route('user.update', $user->id) }}" method="post" class="w-100 mt-4 pt-2">
                            @csrf
                            <div class="form-floating mb-4">
                                 @error('name')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                                <label for="floatingInput">Nom</label>
                            </div>
                            
                            <div class="form-floating mb-4">
                                @error('email')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                <input type="email" class="form-control" id="floatingInput" value="{{ old('email', $user->email) }}" name="email" required>
                                <label for="floatingInput">Email </label>
                            </div>
                            <div class="form-floating mb-4">
                                 @error('password')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                <input type="password" class="form-control"  name="password" required value="{{ old('password', $user->password) }}">
                                <label for="floatingInput">Mot de passe</label>
                            </div>

                            <select class="form-select" aria-label="Role" name="role" required value="{{ old('role', $user->role) }}">
                                 @error('role')
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                {{-- <option selected>Role</option> --}}
                                <option value="1">Admin</option>
                                <option value="2" selected>Apprenant</option>
                                <option value="3">Formateur</option>
                            </select>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection