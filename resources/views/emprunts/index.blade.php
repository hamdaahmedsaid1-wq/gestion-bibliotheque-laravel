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
            <h1 class="page-title">Liste des emprunts</h1>
            <p class="page-subtitle">Suivez les livres empruntés et leurs dates de retour.</p>
        </div>

        <a href="{{ route('emprunts.create') }}" class="btn btn-primary">+ Nouvel emprunt</a>
    </div>

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
                    <th>Livre</th>
                    <th>Emprunteur</th>
                    <th>Date emprunt</th>
                    <th>Retour prévu</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($emprunts as $emprunt)
                    <tr>
                        <td>{{ $emprunt->id }}</td>
                        <td>{{ $emprunt->livre->titre }}</td>
                        <td>{{ $emprunt->emprunteur->nom }} {{ $emprunt->emprunteur->prenom }}</td>
                        <td>{{ $emprunt->date_emprunt }}</td>
                        <td>{{ $emprunt->date_retour_prevue }}</td>
                        <td>
                         @if($emprunt->statut == 'retourné')
                        <span style="color:green;font-weight:bold;">
                         Retourné
                    </span>
                    @else
                      <span style="color:red;font-weight:bold;">
                        En cours
                          </span>
                      @endif
                      </td>
                      <td>
    @if($emprunt->statut == 'retourné')
        <span class="badge badge-success">Retourné</span>
    @else
        <span class="badge badge-warning">En cours</span>
    @endif
</td>
                     
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="empty-box">Aucun emprunt trouvé.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection