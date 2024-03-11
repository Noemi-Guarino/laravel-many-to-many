@extends('layouts.app')

@section('page-title', 'Tutti i post')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                Sei loggato!
            </h1>
            <div class="m-4">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-xs btn-primary">
                    add new post
                </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <div>
                        <table class="table p-4">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Types</th>
                                    <th scope="col">technology</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">{{ $post->id }}</th>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>  
                                            @if ($post->type != null)
                                            <a href="{{ route('admin.types.show', ['type' => $post->type->id]) }}">
                                                {{ $post->type->title }}
                                            </a> 
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                @forelse ($post->technologies as $technology)
                                                    <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge rounded-pill text-bg-primary p-1">
                                                        {{ $technology->title }}
                                                    </a>
                                                @empty
                                                    -
                                                @endforelse
                                            </div>
                                        </td>  
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.posts.show', ['post' => $post->slug]) }}" class="btn btn-xs btn-primary">
                                                Show
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.posts.edit', ['post' => $post->slug]) }}" class="btn btn-warning">
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <form 
                                            onsubmit="return confirm('Are you sure you want to delete this comic?');"
                                            class="d-inline-block" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}"  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button  type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
