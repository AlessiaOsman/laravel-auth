@extends('layouts.app')

@section('title', 'project')

@section('content')
    <div class="card my-5">
        <div class="card-header">
            <h1>{{ $project->title }}</h1>
        </div>
        <div class="card-body">
          <h5 class="card-title mb-4"><a href="{{ $project->url }}">{{ $project->url }}</a></h5>
          <p class="card-text mb-4">{{ $project->content }}</p>
          <div class="d-flex justify-content-between">
          <a href="{{ route('adminprojects.index', $project) }}" class="btn btn-primary"><i
            class="fa-solid fa-arrow-left me-2"></i>Torna indietro</a>
            <div class="d-flex align-items-center gap-2">
                <form action="{{route('adminprojects.destroy', $project)}}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="btn btn-danger "><i class="fa-solid fa-trash-can me-2"></i>Elimina</button>
                </form>
                <a class="btn btn-warning" href="{{route('adminprojects.edit', $project)}}"><i class="fa-solid fa-pencil me-2"></i>Modifica</a>
            </div>
            

        </div>  
        </div>
      </div>
@endsection
@section('scripts')
      @vite('resources/js/delete_confirmation.js')
@endsection
