@extends('layouts.app')

@section('content')

<div class="card form-card">
    <h1 class="page-title">Ajouter un livre</h1>
    <p class="page-subtitle">Remplissez le formulaire pour enregistrer un nouveau livre.</p>

    @if ($errors->any())
        <div class="message-success" style="background:#fee2e2;color:#991b1b;border:1px solid #fecaca;">
            <ul style="margin-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <form action="{{ route('livres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Titre</label>
        <input type="text" name="titre" value="{{ old('titre') }}" required>

        <label>Auteur</label>
        <input type="text" name="auteur" value="{{ old('auteur') }}" required>

        <label>Catégorie</label>
        <input type="text" name="categorie" value="{{ old('categorie') }}" required>

        <label>Année</label>
        <input type="number" name="annee" value="{{ old('annee') }}" required>

        <label>Quantité</label>
        <input type="number" name="quantite" value="{{ old('quantite') }}" required>
       
     

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('livres.index') }}" class="link-back">Retour</a>
        </div>
    </form>
</div>

@endsection