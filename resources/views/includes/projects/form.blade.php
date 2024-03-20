@if ($project->exists)
    <form action="{{ route('adminprojects.update', $project) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('adminprojects.store') }}" method="POST">
@endif


@csrf

<div class="row mb-5">
    <div class="col-6">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo del progetto</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $project->title) }}">
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug"
                value="{{ old('slug', $project->slug) }}" disabled>
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="content" class="form-label">Descrizione</label>
            <textarea class="form-control" id="content" name="content" rows="10">{{ old('content', $project->content) }}</textarea>
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="url" class="form-label">Indirizzo http</label>
            <input type="url" class="form-control" id="url" name="url"
                value="{{ old('url', $project->url) }}">
        </div>
    </div>

</div>
<div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('adminprojects.index') }}" class="btn btn-primary"><i
            class="fa-solid fa-arrow-left me-2"></i>Torna indietro</a>
    <div class="align-items-center d-flex gap-2">
        <button class="btn btn-secondary" type="reset"><i class="fa-solid fa-eraser me-2"></i>Svuota i campi</button>
        <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk me-2"></i>Salva</button>

    </div>
</div>
</form>
