@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <header class="">
        <h1 class='text-center mb-5'>Scopri tutti i miei pogetti</h1>
        @if ($projects->hasPages())
            {{ $projects->links() }}
        @endif
    </header>
    @forelse ($projects as $project)
        <div class="card my-5">
            <div class="card-header">
                <h1>{{ $project->title }}</h1>
            </div>
            <div class="card-body">
                <h5 class="card-title mb-4"><a href="{{ $project->url }}">{{ $project->url }}</a></h5>
                <p class="card-text mb-4">{{ $project->content }}</p>
                <div class="d-flex justify-content-end">
                  <a href="{{ route('guest.projects.show', $project->slug) }}" class="btn btn-primary"><i
                    class="fa-solid fa-eye me-2"></i>Vedi</a>
                </div>
            </div>
        </div>
    @empty
        <h1>Non ci sono progetti da visualizzare</h1>
    @endforelse
@endsection
