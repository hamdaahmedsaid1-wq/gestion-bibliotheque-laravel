@extends('layouts.app')

@section('content')
<div class="page-container">
<div class="navbar">
    <a href="/dashboard">🏠 Dashboard</a>
    <a href="/livres">📚 Livres</a>
    <a href="/emprunteurs">👤 Emprunteurs</a>
    <a href="/emprunts">🔁 Emprunts</a>

    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" style="background:none;border:none;color:white;font-weight:bold;cursor:pointer;font-size:16px;">
            🚪 Déconnexion
        </button>
    </form>
</div>

<div class="stats">
    <div class="stat-card">
        <h3>Total livres</h3>
        <p>{{ $livres->count() }}</p>
    </div>

    <div class="stat-card">
        <h3>Total quantité</h3>
        <p>{{ $livres->sum('quantite') }}</p>
    </div>
</div>

<div class="card">
    <div class="top-bar">
        <div>
            <h1 class="page-title">Liste des livres</h1>
            <p class="page-subtitle">Gérez facilement les livres de votre bibliothèque.</p>
        </div>

        <a href="{{ route('livres.create') }}" class="btn btn-primary">+ Ajouter un livre</a>
    </div>

    <form action="{{ route('livres.index') }}" method="GET" style="margin-top:15px; display:flex; gap:10px; flex-wrap:wrap;">
        <input
            type="text"
            name="recherche"
            value="{{ $recherche ?? '' }}"
            placeholder="Rechercher par titre, auteur ou catégorie"
            style="max-width:350px;"
        >
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>

    @if(!empty($recherche))
        <div style="margin-top:10px;">
            <a href="{{ route('livres.index') }}" class="link-back">Réinitialiser la recherche</a>
        </div>
    @endif

    @if(session('success'))
        <div class="message-success" style="margin-top:15px;">
            {{ session('success') }}
        </div>
    @endif
</div>

<div class="card">
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <th>Année</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($livres as $livre)
                <tr>
                    <td>{{ $livre->id }}</td>
                    <td>{{ $livre->titre }}</td>
                    <td>{{ $livre->auteur }}</td>
                    <td>{{ $livre->categorie }}</td>
                    <td>{{ $livre->annee }}</td>
                    <td>{{ $livre->quantite }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-warning">Modifier</a>

                            <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce livre ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div class="empty-box">Aucun livre trouvé.</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection