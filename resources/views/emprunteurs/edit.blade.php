@extends('layouts.app')

@section('content')

<div class="card form-card">
    <h1 class="page-title">Modifier un emprunteur</h1>
    <p class="page-subtitle">Modifiez les informations de l’emprunteur.</p>

    @if ($errors->any())
        <div class="message-success" style="background:#fee2e2;color:#991b1b;border:1px solid #fecaca;">
            <ul style="margin-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('emprunteurs.update', $emprunteur->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nom</label>
        <input type="text" name="nom" value="{{ $emprunteur->nom }}" required>

        <label>Prénom</label>
        <input type="text" name="prenom" value="{{ $emprunteur->prenom }}" required>

        <label>Téléphone</label>
        <input type="text" name="telephone" value="{{ $emprunteur->telephone }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ $emprunteur->email }}">

        <label>Adresse</label>
        <input type="text" name="adresse" value="{{ $emprunteur->adresse }}">

        <div class="form-actions">
            <button type="submit" class="btn btn-warning">Modifier</button>
            <a href="{{ route('emprunteurs.index') }}" class="link-back">Retour</a>
        </div>
    </form>
</div>

@endsection