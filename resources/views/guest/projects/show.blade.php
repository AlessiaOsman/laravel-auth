@extends('layouts.app')

@section('title', 'Progetti')

@section('content')
    <div class="card my-5">
        <div class="card-header">
            <h1>{{ $project->title }}</h1>
        </div>
        <div class="card-body">
          <h5 class="card-title mb-4"><a href="{{ $project->url }}">{{ $project->url }}</a></h5>
          <p class="card-text mb-4">{{ $project->content }}</p>
          <div class="d-flex justify-content-between">
            <a href="{{ route('guest.home') }}" class="btn btn-primary"><i
              class="fa-solid fa-arrow-left me-2"></i>Torna indietro</a>
        
            
        </div>  
        </div>
      </div>
@endsection
