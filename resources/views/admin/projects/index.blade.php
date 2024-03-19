@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <header>
        <h1 class='text-center mb-5'>Progetti</h1>
    </header>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Creato il</th>
                <th scope="col">Url</th>
                <th scope="col">Slug</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->content }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td><a href="{{ $project->url }}">{{ $project->url }}</a></td>
                    <td>{{ $project->slug }}</td>
                    <td>
                        <div class="d-flex gap-2">
                        <a href="{{ route('adminprojects.show', $project) }}" class="btn btn-sm btn-primary"><i
                                class="fa-solid fa-eye"></i></a>
                        <form action="{{ route('adminprojects.destroy', $project)}}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger "><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <th>Nessun progetto da mostrare</th>
                </tr>
            @endforelse

        </tbody>
    </table>

@endsection

@section('scripts')
      @vite('resources/js/delete_confirmation.js')
@endsection
