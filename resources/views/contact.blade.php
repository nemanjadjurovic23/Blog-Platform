<head>
    @section("title", "Contact")
</head>
<body class="d-flex flex-column min-vh-100">

@extends("layout")

@section("MainSection")
    <div class="container mt-4 flex-grow-1">
        <form action="{{ route('sendContacts') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Send</button>
                </div>
            </div>

        </form>
    </div>
@endsection
</body>
</html>
