@extends('app')

@section('title', 'Cours et Ressources - Étudiant')
@section('page_title', 'Mes Cours')

@section('sidebar')
    @include('layouts.sidebar-etudiant')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Ressources de Cours</h3>
            <p>Liste des matières et accès aux documents de cours (PDF, présentations, etc.).</p>
            <!-- Liste des cours -->
        </div>
    </div>
@endsection
