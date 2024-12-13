@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="mb-3">
                        <strong>Name:</strong> {{ auth()->user()->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ auth()->user()->email }}
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                        <a href="{{ route('profile.change-password') }}" class="btn btn-secondary">Change Password</a>
                    </div>

                    <div class="mb-3">
                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection