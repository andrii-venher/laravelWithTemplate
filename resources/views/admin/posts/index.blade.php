@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Date</th>
                    <th scope="col">Author</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->isNotEmpty())
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ substr($post->content, 0, 50) . '...' }}</td>
                    <td>{{ $post->date }}</td>
                    <td>{{ $post->author->name }}</td>
                    <td>{{ $post->comments }}</td>
                    <td>{{ $post->image }}</td>
                    <td>
                        <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-primary mx-auto mb-3">Update</a>
                        <form action="/admin/posts/{{ $post->id }}" method="POST">
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
        <a href="/admin/posts/create" class="btn btn-primary mx-auto mb-3">Create</a>
    </div>
</div>


@endsection