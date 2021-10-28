@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-primary mx-auto mb-3">Update</a>
                        <form action="/admin/categories/{{ $category->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <th colspan="5">No data</th>
                @endif
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="/admin/categories/create" class="btn btn-primary mx-auto mb-3">Create</a>
    </div>
</div>


@endsection