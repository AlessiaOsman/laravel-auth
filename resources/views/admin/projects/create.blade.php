@extends('layouts.app')

@section('title', 'Aggiungi Progetto')

@section('content')

<header>
    <h1 class="mb-5">Inserisci un nuovo progetto</h1>
    @include('includes.projects.form')
</header>

@endsection