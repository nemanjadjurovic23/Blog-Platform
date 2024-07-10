<head>
    @section('title', 'Edit Contact')
</head>

<body class="d-flex flex-column min-vh-100">
@extends('layout')

@section('MainSection')

    <div class="container flex-grow-1">
        <h4 class="mt-4">Edit User</h4>
        <div class="row mt-4 justify-content-center">

            <form method="POST" action="{{ route('users.update', ['singleUser' => $singleUser->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group mt-2">
                    <input type="text" class="form-control" name="name" required value="{{ $singleUser->name }}">
                </div>
                <div class="form-group mt-2">
                    <input type="email" class="form-control" name="email" required value="{{ $singleUser->email }}">
                </div>
                <div class="form-group mt-2">
                    <input type="password" class="form-control" name="password" required value="{{ $singleUser->password }}">
                </div>
                <div class="form-group mt-2">
                    <label for="role">Select Role</label>
                    <select class="form-control" id="role" name="role">
                        @foreach($roles as $role)
                            <option value="{{ $role }}" {{ $singleUser->role == $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Save</button>
            </form>
        </div>
    </div>
@endsection
</body>
