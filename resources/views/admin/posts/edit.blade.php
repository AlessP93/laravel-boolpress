@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Modifica: {{$post->title}}</h1>
            </div>
            <div class="card-body">
                <form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $post->title)}}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Contenuto</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10">{{old('content', $post->content)}}</textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Immagine</label>
                        @if($post->image)
                        <div>
                            <img width="100" src="{{asset("storage/{$post->image}")}}" alt="">
                        </div>
                        @endif
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                            <option value="">Seleziona Categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{old('published', $post->published) ? 'checked' : ''}}>
                        <label class="form-check-label" for="published">Pubblica</label>
                        @error('published')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Modifica</button>
                </form>
            </div>
        </div>
    </div>
@endsection