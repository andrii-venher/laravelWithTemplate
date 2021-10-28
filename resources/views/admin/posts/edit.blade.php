@extends('layout')

@section('content')
<div class="container">
    <form action="/admin/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="author_id" class="form-label">Author</label>
            <select name="author_id" class="form-control" value="{{ $post->author_id }}">
                @foreach ($authors as $author)
                    @if ($post->author_id == $author->id)
                    <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                    @else
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <select name="image" class="form-control" value="{{ $post->image }}">
                @foreach ($images as $image)
                    @if ($post->image == $image)
                    <option value="{{ $image }}" selected>{{ $image }}</option>
                    @else
                    <option value="{{ $image }}">{{ $image }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger mx-auto">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@endsection