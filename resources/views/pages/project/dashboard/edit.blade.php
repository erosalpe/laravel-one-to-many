@extends('layouts.app')

@section('title', 'Projects | Edit')

@vite('resources/js/app.js')

@section('style')
  
@endsection

@section('main')
    <h2>Modifica Progetto</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $project->title)}}">
            @error('title')
                <div class="alert alert-danger">

                    {{ $message }}

                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{old('description', $project->description)}}">
            @error('description')
                <div class="alert alert-danger">

                    {{ $message }}

                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="preview" class="form-label">Anteprima</label>
            @if($project->preview)
                <img src="{{asset('/storage/'. $project->preview)}}" alt="{{$project->title}}">
            @endif
                <input type="file" class="form-control @error('preview') is-invalid @enderror" id="preview" name="preview" value="{{old('preview', $project->preview)}}">
            @error('preview')
                <div class="alert alert-danger">

                    {{ $message }}

                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="language" class="form-label">Linguaggi utilizzati</label>
            <input type="text" class="form-control @error('language') is-invalid @enderror" id="language" name="language" value="{{old('language', $project->language)}}">
            @error('language')
                <div class="alert alert-danger">

                    {{ $message }}

                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Invia Modifiche</button>
    </form>
@endsection