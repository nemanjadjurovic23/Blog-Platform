<head>
    @section('title', 'Edit Contact')
</head>

<body class="d-flex flex-column min-vh-100">
@extends('layout')

@section('MainSection')

    <div class="container flex-grow-1">
        <h4 class="mt-4">Edit Contact</h4>
        <div class="row mt-4 justify-content-center">

            <form method="POST" action="/admin/contacts/update/{{ $singleContact->id }}">
                @csrf
                @method('PUT')
                <div class="form-group mt-2">
                    <input type="email" class="form-control" name="email" required value="{{ $singleContact->email }}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control" name="subject" required value="{{ $singleContact->subject }}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control" name="message" required value="{{ $singleContact->message }}">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Save</button>
            </form>

        </div>
    </div>

@endsection
</body>
