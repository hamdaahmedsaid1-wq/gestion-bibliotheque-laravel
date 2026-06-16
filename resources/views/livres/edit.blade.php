@extends('layouts.app')

@section('content')

<div class="card form-card">
    <h1 class="page-title">Modifier un livre</h1>
    <p class="page-subtitle">Mettez à jour les informations du livre.</p>

    @if ($errors->any())
        <div class="message-success" style="background:#fee2e2;color:#991b1b;border:1px solid #fecaca;">
            <ul style="margin-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livres.update', $livre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Titre</label>
        <input type="text" name="titre" value="{{ old('titre', $livre->titre) }}" required>

        <label>Auteur</label>
        <input type="text" name="auteur" value="{{ old('auteur', $livre->auteur) }}" required>

        <label>Catégorie</label>
        <input type="text" name="categorie" value="{{ old('categorie', $livre->categorie) }}" required>

        <label>Année</label>
        <input type="number" name="annee" value="{{ old('annee', $livre->annee) }}" required>

        <label>Quantité</label>
        <input type="number" name="quantite" value="{{ old('quantite', $livre->quantite) }}" required>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('livres.index') }}" class="link-back">Retour</a>
        </div>
    </form>
</div>

@endsection