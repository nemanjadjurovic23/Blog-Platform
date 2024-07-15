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
                                         src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="avatar"
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

                                <div class="small d-flex justify-content-start">
                                    <a href="#!" class="d-flex align-items-center me-3">
                                        <i class="far fa-thumbs-up me-2"></i>
                                        <p class="mb-0">Like</p>
                                    </a>
                                    <a href="#!" class="d-flex align-items-center me-3">
                                        <i class="far fa-comment-dots me-2"></i>
                                        <p class="mb-0">Comment</p>
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <div class="d-flex flex-start w-100">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                         src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="avatar"
                                         width="40"
                                         height="40"/>
                                    <div data-mdb-input-init class="form-outline w-100">
                <textarea class="form-control" id="textAreaExample" rows="4"
                          style="background: #fff;"></textarea>
                                        <label class="form-label" for="textAreaExample">Message</label>
                                    </div>
                                </div>
                                <div class="float-end mt-2 pt-1">
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-primary btn-sm">Post comment
                                    </button>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-outline-primary btn-sm">Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </section>

</body>
@endsection


