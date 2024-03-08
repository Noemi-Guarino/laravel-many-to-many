@extends('layouts.app')

@section('page-title', 'Tutti le tipologie')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                Sei loggato!
            </h1>
            <div class="m-4">
                <a href="{{ route('admin.types.create') }}" class="btn btn-xs btn-primary">
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
                                    {{-- <th scope="col">Slug</th> --}}
                                    <th scope="col">show</th>
                                    <th scope="col">edit</th>
                                    <th scope="col">delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <th scope="row">{{ $type->id }}</th>
                                        <td>{{ $type->title }}</td>
                                        {{-- <td>{{ $type->slug }}</td> --}}
                                        <td>
                                            <a href="{{ route('admin.types.show', ['type' => $type->slug]) }}" class="btn btn-xs btn-primary">
                                                Show
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.types.edit', ['type' => $type->slug]) }}" class="btn btn-warning">
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <form 
                                            onsubmit="return confirm('Are you sure you want to delete this comic?');"
                                            class="d-inline-block" action="{{ route('admin.types.destroy', ['type' => $type->id]) }}"  method="POST">
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
