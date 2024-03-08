@extends('layouts.app')

@section('page-title', $type->title)

@section('main-content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center text-success">
                    {{ $type->title }}
                </h1>

                <h2>
                    Slug: {{ $type->title }}
                </h2>
            </div>
        </div>
    </div>
</div>
@endsection
