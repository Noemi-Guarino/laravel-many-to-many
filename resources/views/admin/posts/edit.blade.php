@extends('layouts.app')

@section('page-title', 'Modifica il tuo post')

@section('main-content')
<div class="my_container">
    <h1>
        Post edit
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
            
            <form action="{{ route('admin.posts.update', ['post' => $post->slug ]) }}" enctype="multipart/form-data" method="POST">
                @csrf

                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="enter the title..." maxlength="64" required value="{{ old ('title', $post->title ) }}">
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">slug</label>
                    <textarea class="form-control" id="slug" name="slug" rows="3" placeholder="enter the slug..."></textarea value="{{ old ('title',$post->slug )}}">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">content</label>
                    <textarea class="form-control" id="content" name="content" rows="3" placeholder="enter the content..."></textarea value="{{ old ('title',$post->content)}}">
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
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                                class="form-check-input"
                                type="checkbox"
                                id="technology-{{ $technology->id }}"
                                name="technologies[]"
                                value="{{ $technology->id }}">
                            <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology ->title }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="cover_img" class="form-label">Cover image</label>
                    <input class="form-control" type="file" id="cover_img" name="cover_img">
    
                    @if ($post->cover_img != null)
                        <div class="mt-2">
                            <h4>
                                Copertina attuale:
                            </h4>
                            <img src="/storage/{{ $post->cover_img }}" style="max-width: 400px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="delete_cover_img" name="delete_cover_img">
                                <label class="form-check-label" for="delete_cover_img">
                                    Rimuovi immagine
                                </label>
                            </div>
                        </div>
                    @endif
                </div>

                <div>
                    <button type="submit" class="btn btn-success w-100">
                        update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
