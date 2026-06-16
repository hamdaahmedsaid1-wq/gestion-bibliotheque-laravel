@extends('layouts.app')

@section('content')

<div class="page-container">

    <div class="navbar">
        <a href="/dashboard">🏠 Dashboard</a>
        <a href="/livres">📚 Livres</a>
        <a href="/emprunteurs">👤 Emprunteurs</a>
        <a href="/emprunts">🔁 Emprunts</a>
    </div>

    <div class="form-card">
        <h1 class="page-title">Nouvel emprunt</h1>
        <p class="page-subtitle">Enregistrer un livre emprunté.</p>

        <form action="{{ route('emprunts.store') }}" method="POST">
            @csrf

            <label>Livre</label>
            <select name="livre_id" required>
                <option value="">Choisir un livre</option>
                @foreach($livres as $livre)
                    <option value="{{ $livre->id }}">{{ $livre->titre }}</option>
                @endforeach
            </select>

            <label>Emprunteur</label>
            <select name="emprunteur_id" required>
                <option value="">Choisir un emprunteur</option>
                @foreach($emprunteurs as $emprunteur)
                    <option value="{{ $emprunteur->id }}">
                        {{ $emprunteur->nom }} {{ $emprunteur->prenom }}
                    </option>
                @endforeach
            </select>

            <label>Date emprunt</label>
            <input type="date" name="date_emprunt" required>

            <label>Date retour prévue</label>
            <input type="date" name="date_retour_prevue" required>

            <div class="form-actions">
                <a href="{{ route('emprunts.index') }}" class="link-back">Retour</a>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>

</div>

@endsection