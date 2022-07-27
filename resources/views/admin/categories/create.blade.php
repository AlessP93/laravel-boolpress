@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Crea una nuova categoria</h1>
                <div class="card-body">
                    <form action="{{route('admin.categories.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control  @error('title') is-invalid @enderror" id="name" name="title" {{old('name')}}>
                            @error('title')
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
