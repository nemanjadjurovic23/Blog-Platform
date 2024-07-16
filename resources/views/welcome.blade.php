<head>
    @section("title", "Blog")
</head>

<body>
@extends("layout")
@section('MainSection')
    @foreach($articles as $article)
        <section>
            <div class="container mt-4">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-start align-items-center">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                         src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                         alt="avatar"
                                         width="60"
                                         height="60"/>
                                    <div>
                                        <h6 class="card-subtitle text-muted">{{ $article->user->name }}</h6>
                                        <p class="text-muted small mb-0">
                                            {{ $article->created_at }}
                                        </p>
                                    </div>
                                </div>
                                <h3 class="mt-3 mb-4 pb-2">
                                    {{ $article->title }}
                                </h3>
                                <p class="mt-3 mb-4 pb-2">
                                    {{ $article->content }}
                                </p>
                                <a href="{{ route('blog.articles') }}" class="btn btn-primary">
                                    View More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
</body>
