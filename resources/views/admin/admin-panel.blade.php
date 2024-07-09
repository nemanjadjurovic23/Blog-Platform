@extends('admin/admin-layout')

@section('MainSection')
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/contacts">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/users">Users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container flex-grow-1">

        <h4 class="mt-4">Add Article</h4>
        <div class="row mt-4 justify-content-center">
            <form method="POST" action="{{ route('articles.add') }}" class="col-md-12">
                @csrf
                <div class="form-group mt-2">
                    <input type="text" class="form-control" name="title" placeholder="Add title" value="{{ old('title') }}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control" name="content" placeholder="Add content" value="{{ old('content') }}">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Add</button>
            </form>
        </div>

        <h3 class="mt-2">All Articles</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Author</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($allArticles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->content }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td>
                        <a href="{{ route('articles.delete', ['singleArticle' => $article->id]) }}" class="btn btn-danger mb-2">Delete</a>
                        <a href="{{ route('articles.edit', ['singleArticle' => $article->id]) }}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
