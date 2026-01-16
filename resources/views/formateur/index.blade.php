<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Formateurs</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Liste des Formateurs</h1>
            <a href="{{ route('formateurs.create') }}" class="btn btn-primary">
                + Ajouter un Formateur
            </a>
        </div>

        <!-- Messages de succès/erreur -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Tableau des formateurs -->
        <div class="card">
            <div class="card-body">
                @if($formateurs->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Spécialité</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($formateurs as $formateur)
                                <tr>
                                    <td>{{ $formateur->id }}</td>
                                    <td>{{ $formateur->nom }}</td>
                                    <td>{{ $formateur->prenom }}</td>
                                    <td>{{ $formateur->email }}</td>
                                    <td>{{ $formateur->specialite }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <!-- Voir -->
                                            <a href="{{ route('formateurs.show', $formateur->id) }}" 
                                               class="btn btn-info btn-sm" 
                                               title="Voir détails">
                                                👁️
                                            </a>
                                            
                                            <!-- Modifier -->
                                            <a href="{{ route('formateurs.edit', $formateur->id) }}" 
                                               class="btn btn-warning btn-sm" 
                                               title="Modifier">
                                                ✏️
                                            </a>
                                            
                                            <!-- Supprimer -->
                                            <form action="{{ route('formateurs.destroy', $formateur->id) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce formateur ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer">
                                                    🗑️
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($formateurs->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $formateurs->links() }}
                    </div>
                    @endif
                @else
                    <div class="text-center py-5">
                        <div class="mb-3">
                            📭
                        </div>
                        <h4 class="text-muted">Aucun formateur trouvé</h4>
                        <p class="text-muted">Commencez par ajouter un nouveau formateur</p>
                        <a href="{{ route('formateurs.create') }}" class="btn btn-primary mt-3">
                            Ajouter le premier formateur
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script pour la confirmation de suppression -->
    <script>
        // Confirmation avant suppression
        document.querySelectorAll('form[onsubmit]').forEach(form => {
            form.onsubmit = function() {
                return confirm('Êtes-vous sûr de vouloir supprimer ce formateur ?');
            };
        });
    </script>
</body>
</html>