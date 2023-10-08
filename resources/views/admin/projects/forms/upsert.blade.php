<div class="container pt-3">
    {{-- action="{{ $action }}"= è un segnaposto  --}}
    <form action="{{-- {{ $action }} --}}" class="row g-3" method="POST">
        @csrf()
        {{-- @method($method) = è un segnaposto --}}
        @method($method)

        <div class="col-md-6">
            <label for="inputTitle4" class="form-label">Title</label>
            {{-- value="{{ old('title'= ottenere il valore precedentemente inviato --}}
            {{-- , $project?->title) }} = stampare il valore di title --}}
            {{-- , $project?->title) }} = "?" se la variabile $project non è definito assegna "null"  --}}
            <input type="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $project?->title) }}" id="inputTitle4" name="title">
            @error('title')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputUrl4" class="form-label @error('url') is-invalid @enderror">url</label>
            <input type="url" class="form-control" id="inputUrl4" name="url"
                value="{{ old('url', $project?->url) }}">
            @error('url')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputDescription" class="form-label @error('description') is-invalid @enderror">Description</label>
            <input type="text" class="form-control" id="inputDescription" name="description"
                value="{{ old('description', $project?->description) }}">
            @error('description')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Conferma</button>
        </div>
    </form>
</div>
