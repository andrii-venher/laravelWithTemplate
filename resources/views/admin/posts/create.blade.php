@extends('layout')

@section('content')
<div class="container">
    <form action="/admin/posts" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="author_id" class="form-label">Author</label>
            <select name="author_id" class="form-control">
                @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <select name="image" class="form-control">
                @foreach ($images as $image)
                <option value="{{ $image }}">{{ $image }}</option>
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