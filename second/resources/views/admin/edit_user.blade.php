@extends('layout')
@section('title','Edit User')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit User</h1>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif

        <form method="post" action="{{ route('dashboard.users.update', $user->id) }}">
            @csrf
            <div class="mb-3">
                <label>Username</label>
                <input class="form-control" name="username" value="{{ old('username', $user->username) }}">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input class="form-control" name="email" value="{{ old('email', $user->email) }}">
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
            </div>
            <div class="mb-3">
                <label>Type</label>
                <select class="form-control" name="type">
                    <option value="admin" {{ old('type', $user->type) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="client" {{ old('type', $user->type) === 'client' ? 'selected' : '' }}>Client</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Update User">
        </form>
    </div>
@endsection
