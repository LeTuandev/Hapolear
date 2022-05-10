@extends('layouts.index')

@section('content')
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="container bg-white mt-5 d-flex align-items-center justify-content-center flex-column p-5">
        <div class="d-flex align-items-center justify-content-center flex-column">
            <p class="reset-title">Reset Password</p>
            <p class="reset-access">Enter email to reset your password</p>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="mt-3 w-50">
            <label for="email" class="reset-email">Email:</label>
            <input id="email" name="email" value="{{ old('email') }}" type="email" class="w-100" placeholder="enter your email">
            <span class="text-danger">@error('email')
                {{ $message }}
            @enderror</span>
        </div>
        <div class="mt-3">
            <button class="reset-btn" type="submit">Reset Password</button>
        </div>
    </div>
</form>
@endsection
