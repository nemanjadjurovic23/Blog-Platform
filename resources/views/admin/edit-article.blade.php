<head>
    @section('title', 'Edit Article')
</head>

<body class="d-flex flex-column min-vh-100">
@extends('layout')

@section('MainSection')

    <div class="container flex-grow-1">
        <h4 class="mt-4">Edit Article</h4>
        <div class="row mt-4 justify-content-center">

            <form method="POST" action="/admin/update-article/{{ $singleArticle->id }}">
                @csrf
                @method('PUT')
                <div class="form-group mt-2">
                    <input type="text" class="form-control" name="title" required value="{{ $singleArticle->title }}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control" name="content" required value="{{ $singleArticle->content }}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control" name="author" required value="{{ $singleArticle->author }}">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Save</button>
            </form>

        </div>
    </div>

@endsection
</body>
