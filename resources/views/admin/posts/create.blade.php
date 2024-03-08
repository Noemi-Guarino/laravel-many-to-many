@extends('layouts.app')

@section('page-title', 'Crea il tuo post')

@section('main-content')
<div class="my_container">
    <h1>
        Post Create
    </h1>

    <div class="row">
        <div class="col py-4">
            <div class="mb-4">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                    Come back
                </a>
            </div>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ( $errors->all() as $error )
                    <li>{{ $error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="enter the title..." maxlength="64" required value="{{ old ('title')}}">
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">slug</label>
                    <textarea class="form-control" id="slug" name="slug" rows="3" placeholder="enter the slug..."></textarea value="{{ old ('slug')}}">
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">Tipologia</label>
                    <select name="type_id" id="type_id" class="form-select">
                        <option
                            value="{{ old('type_id') }}">
                            Seleziona una tipologia...
                        </option>
                        @foreach ( $types as $type )
                            <option
                            value="{{ $type->id }}"
                            {{ old('type_id') }}>
                            {{ $type->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="technology_id" class="form-label">Tipologia</label>
                    <select name="technology_id" id="technology_id" class="form-select">
                        <option
                            value="{{ old('technology_id') }}">
                            Seleziona una tipologia...
                        </option>
                        @foreach ( $technologies as $technology )
                            <option
                            value="{{ $technology->id }}"
                            {{ old('technology_id') }}>
                            {{ $technology->title }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label for="content" class="form-label">content</label>
                    <textarea class="form-control" id="content" name="content" rows="3" placeholder="enter the content..."></textarea value="{{ old ('content')}}">
                </div>

                <div>
                    <button type="submit" class="btn btn-success w-100">
                            Add
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
