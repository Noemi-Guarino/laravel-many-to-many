@extends('layouts.app')

@section('page-title', $post->title)

@section('main-content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div>
                    @if ($post->cover_img != null)
                        <div class="my-3">
                            <img src="{{ asset('storage/'.$post->cover_img) }}" style="max-width: 400px;">
                        </div>
                    @endif
                </div>
                <h1 class="text-center text-success">
                    {{ $post->title }}
                </h1>

                <h2>
                    Slug: {{ $post->title }}
                </h2>

                <p>
                    {{ $post->content }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
