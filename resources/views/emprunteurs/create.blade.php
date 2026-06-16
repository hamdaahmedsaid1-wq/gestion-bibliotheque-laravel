@extends('layouts.app')

@section('content')

<div class="card form-card">
    <h1 class="page-title">Ajouter un emprunteur</h1>
    <p class="page-subtitle">Remplissez les informations de l’emprunteur.</p>

    @if ($errors->any())
        <div class="message-success" style="background:#fee2e2;color:#991b1b;border:1px solid #fecaca;">
            <ul style="margin-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('emprunteurs.store') }}" method="POST">
        @csrf

        <label>Nom</label>
        <input type="text" name="nom" value="{{ old('nom') }}" required>

        <label>Prénom</label>
        <input type="text" name="prenom" value="{{ old('prenom') }}" required>

        <label>Téléphone</label>
        <input type="text" name="telephone" value="{{ old('telephone') }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">

        <label>Adresse</label>
        <input type="text" name="adresse" value="{{ old('adresse') }}">

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('emprunteurs.index') }}" class="link-back">Retour</a>
        </div>
    </form>
</div>

@endsection