<html>
<head>
    @section("title", "Dashboardpage")
</head>
<body>
@extends("layout")

@section("MainSection")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($articles as $article)
                    <div class="card-body mt-4">
                        <div class="card">
                            <h3 class="m-2">{{$article->title}}</h3>
                            <p class="m-2">{{$article->content}}</p>
                            <h6 class="m-2">Author: {{$article->user->name}}</h6>
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
</html>

