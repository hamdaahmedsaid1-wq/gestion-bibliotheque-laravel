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

<div class="card">
    <div class="top-bar">
        <div>
            <h1 class="page-title">Liste des emprunteurs</h1>
            <p class="page-subtitle">Gérez les personnes qui empruntent des livres.</p>
        </div>

        <a href="{{ route('emprunteurs.create') }}" class="btn btn-primary">+ Ajouter un emprunteur</a>
    </div>

    <form action="{{ route('emprunteurs.index') }}" method="GET" style="margin-top:15px; display:flex; gap:10px;">
        <input type="text" name="recherche" value="{{ $recherche ?? '' }}" placeholder="Rechercher par nom, prénom ou téléphone">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>

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
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($emprunteurs as $emprunteur)
                    <tr>
                        <td>{{ $emprunteur->id }}</td>
                        <td>{{ $emprunteur->nom }}</td>
                        <td>{{ $emprunteur->prenom }}</td>
                        <td>{{ $emprunteur->telephone }}</td>
                        <td>{{ $emprunteur->email }}</td>
                        <td>{{ $emprunteur->adresse }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('emprunteurs.edit', $emprunteur->id) }}" class="btn btn-warning">Modifier</a>

                                <form action="{{ route('emprunteurs.destroy', $emprunteur->id) }}" method="POST" onsubmit="return confirm('Supprimer cet emprunteur ?');">
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
                            <div class="empty-box">Aucun emprunteur trouvé.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection