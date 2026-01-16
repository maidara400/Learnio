<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Formateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Fiche du formateur</h2>
                        <span class="badge bg-primary">ID: {{ $formateur->id }}</span>
                    </div>
                    <div class="card-body">
                        <!-- Messages -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <!-- Informations -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Nom:</strong>
                                <p class="form-control bg-light">{{ $formateur->nom }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Prénom:</strong>
                                <p class="form-control bg-light">{{ $formateur->prenom }}</p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Email:</strong>
                                <p class="form-control bg-light">{{ $formateur->email }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Spécialité:</strong>
                                <p class="form-control bg-light">{{ $formateur->specialite }}</p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Date de création:</strong>
                                <p class="form-control bg-light">
                                    {{ $formateur->created_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Dernière modification:</strong>
                                <p class="form-control bg-light">
                                    {{ $formateur->updated_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('formateurs.index') }}" class="btn btn-secondary">
                                ← Retour à la liste
                            </a>
                            <div class="btn-group">
                                <a href="{{ route('formateurs.edit', $formateur->id) }}" 
                                   class="btn btn-warning">
                                    ✏️ Modifier
                                </a>
                                <form action="{{ route('formateurs.destroy', $formateur->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Supprimer ce formateur ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ms-2">
                                        🗑️ Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Statistiques ou informations supplémentaires -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Informations supplémentaires</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="p-3 border rounded">
                                    <h6>Statut</h6>
                                    <span class="badge bg-success">Actif</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 border rounded">
                                    <h6>Ancienneté</h6>
                                    <p class="mb-0">{{ $formateur->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 border rounded">
                                    <h6>Actions rapides</h6>
                                    <a href="mailto:{{ $formateur->email }}" class="btn btn-sm btn-outline-primary">
                                        📧 Envoyer email
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>