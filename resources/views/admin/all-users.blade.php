<head>
    @section("title", "All Articles")
</head>
<body class="d-flex flex-column min-vh-100">

@extends("layout")

@section("MainSection")

    <div class="container flex-grow-1">
        <h4 class="mt-4">Add User</h4>
        <div class="row mt-4 justify-content-center">
            <form method="POST" action="{{ route('users.add') }}" class="col-md-12">
                @csrf
                <div class="form-group mt-2">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group mt-2">
                    <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}" required>
                </div>
                <div class="form-group mt-2">
                    <label for="role">Select Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Add</button>
            </form>
        </div>

        <h3 class="mt-2">All Users</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($allUsers as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('users.delete', ['singleUser' => $user->id]) }}" class="btn btn-danger mb-2">Delete</a>
                        <a href="{{ route('users.edit', ['singleUser' => $user->id]) }}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
</body>
