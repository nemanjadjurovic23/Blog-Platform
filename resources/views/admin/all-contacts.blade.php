<head>
    @section("title", "All Contacts")
</head>
<body class="d-flex flex-column min-vh-100">
    @extends("layout")

    @section("MainSection")
        <div class="container flex-grow-1">
            <h3 class="mt-2">All Contacts</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($allContacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>
                            <a href="{{ route('contacts.delete', ['singleContact' => $contact->id]) }}" class="btn btn-danger">Delete</a>
                            <a href="{{ route('contacts.edit', ['singleContact' => $contact->id]) }}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endsection
</body>
