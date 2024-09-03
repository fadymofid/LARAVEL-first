@extends('layout')
@section('title', 'Admin | Users')

@section('content')
    <div class="users_list">
        <div class="container">
            <h1 class="my-4">All Users</h1>
            <form action="{{ url('/users') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by username" value="{{ $search ?? '' }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                    @if($search)
                        <a href="{{ url('/users') }}" class="btn btn-secondary ml-2">Clear Search</a>
                    @endif
                </div>
            </form>
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Contacts</th>
                    <th>Created at</th>
                    <th>Control</th>
                </tr>
                </thead>
                <tbody>
                @if($users->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center">No users found.</td>
                    </tr>
                @else
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                @if($user->image?->name)
                                    <img src="{{ asset('images/' . $user->image->name) }}" alt="User Image">
                                @else
                                    <img src="{{ asset('images/default.png') }}" alt="Default Image">
                                @endif
                            </td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->type }}</td>
                            <td>
                                @if($user->contacts->isEmpty())
                                    No Contacts
                                @else
                                    <ul>
                                        @foreach ($user->contacts as $contact)
                                            <li>{{ $contact->title }}: {{ $contact->message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                <a href="/delete?model_name=users&id={{ $user->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection
