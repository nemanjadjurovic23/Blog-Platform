@extends('layout')

@section('MainSection')
    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4 pb-2">Comments</h3><hr>
                        @foreach($comments as $comment)
                            <div class="d-flex flex-start align-items-center mb-4">
                                <img class="rounded-circle shadow-1-strong me-3"
                                     src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="avatar"
                                     width="60"
                                     height="60"/>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $comment->user->name }}</h6>
                                    <p class="text-muted small mb-0">
                                        {{ $comment->created_at->format('F d, Y \a\t h:i A') }}
                                    </p>
                                    <p class="mt-3 mb-4 pb-2">{{ $comment->content }}</p>
                                </div>
                            </div>
                            <hr class="my-4">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
