@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Crea un nuovo post</h1>
                <div class="card-body">
                    <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Titolo nuovo</label>
                            <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" {{old('title')}}>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Contenuto</label>
                            <textarea class="form-control  @error('content') is-invalid @enderror" id="content" name="content" rows="10">{{old('content')}}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file  @error('image') is-invalid @enderror" id="image" name="image" {{old('image')}}>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                                <option value="">Seleziona Categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <p>Tags</p>
    
                            @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="{{$tag->slug}}" value="{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}>
                                <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                            </div>
                            @endforeach
                            @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{old('published') ? 'checked' : ''}}>
                            <label class="form-check-label" for="published">Pubblica</label>
                            @error('published')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Crea</button>

                      </form>
                </div>
            </div>
        </div>
    </div>

@endsection

