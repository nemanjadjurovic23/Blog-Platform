<head>
    @section("title", "Blog")
</head>

<body>
@extends("layout")
@section("MainSection")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($allArticles as $article)
                    <div class="card mt-4">
                        <div class="card-body">
                            <h3 class="card-title">{{ $article->title }}</h3>
                            <p class="card-text">{{ $article->content }}</p>
                            <h6 class="card-subtitle text-muted">Author: {{ $article->user->name }}</h6>
                            <a href="#" class="btn btn-primary mt-2">View More</a>
                            <a href="#" class="btn btn-primary mt-2"><i class="fa-regular fa-heart"></i></a>
                        </div>
                    </div>
                @endforeach
                <div class="mt-4 d-flex justify-content-center">
                    {{ $allArticles->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
