@extends('layouts.default')

@section('title', "Users: Edit ($user->name ?? 'New')")

@section('content')
    <form method="POST" action="/users/{{ $user->id }}/edit">
        @csrf
        @method('POST')

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit User</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $user->name ?? '' }}</h6>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" value="{{ $user->name }}" placeholder="Update your name">
                    <small id="name-help" class="form-text text-muted">Try thinkng of something creative.</small>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" aria-describedby="email-help" value="{{ $user->email }}" placeholder="Update your email">
                    <small id="email-help" class="form-text text-muted">Try thinkng of something creative.</small>
                </div>

                {{-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" aria-describedby="password-help" placeholder="Update your password">
                    <small id="password-help" class="form-text text-muted">Try thinkng of something creative.</small>
                </div> --}}

                <button type="submit" class="btn btn-xl btn-block btn-warning">Submit</button>
            </div>
        </div>
    </form>
@endsection
