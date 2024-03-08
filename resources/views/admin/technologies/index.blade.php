@extends('layouts.app')

@section('page-title', 'Tutti le technology')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                Sei loggato!
            </h1>
            <div class="m-4">
                <a href="{{ route('admin.technologies.create') }}" class="btn btn-xs btn-primary">
                    add new technology
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
                                    {{-- <th scope="col">Slug</th> --}}
                                    <th scope="col">show</th>
                                    <th scope="col">edit</th>
                                    <th scope="col">delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($technologies as $technology)
                                    <tr>
                                        <th scope="row">{{ $technology->id }}</th>
                                        <td>{{ $technology->title }}</td>
                                        {{-- <td>{{ $type->slug }}</td> --}}
                                        <td>
                                            <a href="{{ route('admin.technologies.show', ['technology' => $technology->slug]) }}" class="btn btn-xs btn-primary">
                                                Show
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.technologies.edit', ['technology' => $technology->slug]) }}" class="btn btn-warning">
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <form 
                                            onsubmit="return confirm('Are you sure you want to delete this comic?');"
                                            class="d-inline-block" action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}"  method="POST">
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
