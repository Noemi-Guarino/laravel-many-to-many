@extends('layouts.app')

@section('page-title', 'Modifica la tua technologies')

@section('main-content')
<div class="my_container">
    <h1>
        technologies edit
    </h1>

    <div class="row">
        <div class="col py-4">
            <div class="mb-4">
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary">
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
            
            <form action="{{ route('admin.technologies.update', ['technology' => $technology->slug ]) }}" method="POST">
                @csrf

                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="enter the title..." maxlength="64" required value="{{ old ('title', $technology->title ) }}">
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">slug</label>
                    <textarea class="form-control" id="slug" name="slug" rows="3" placeholder="enter the slug..."></textarea value="{{ old ('title', $technology->slug )}}">
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
