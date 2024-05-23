<head>
    @section("title", "Blog")
</head>

<body>
@extends("layout")
@section("MainSection")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($blogArticles as $article)
                    <div class="card-body mt-4">
                        <div class="card">
                            <h3 class="m-2">{{$article->title}}</h3>
                            <p class="m-2">{{$article->content}}</p>
                            <h5 class="m-2">{{$article->author}}</h5>
                        </div>
                        <a class="btn btn-primary mt-2">View More</a>
                        <a class="btn btn-primary mt-2"><i class="fa-regular fa-heart"></i></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
</body>
