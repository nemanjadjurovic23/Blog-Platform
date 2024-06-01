<head>
    @section("title", "All Articles")
</head>
<body class="d-flex flex-column min-vh-100">

@extends("layout")

@section("MainSection")

    <div class="container flex-grow-1">

        <h4 class="mt-4">Add Article</h4>
        <div class="row mt-4 justify-content-center">
            <form method="POST" action="/admin/articles/add" class="col-md-12">
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
                        <a href="/admin/articles/delete/{{ $article->id }}" class="btn btn-danger mb-2">Delete</a>
                        <a href="/admin/articles/edit/{{ $article->id }}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
</body>
