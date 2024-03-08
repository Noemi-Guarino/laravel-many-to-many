@extends('layouts.app')

@section('page-title', $technology->title)

@section('main-content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center text-success">
                    {{ $technology->title }}
                </h1>

                <h2>
                    Slug: {{ $technology->title }}
                </h2>
            </div>
        </div>
    </div>
</div>
@endsection
