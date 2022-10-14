@extends('master')

@section('content')
<div class="row d-flex justify-content-center align-items-center mt-5">
    <div class="col-md-5">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="col-md-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
            </div>
            <div class="col-md-12">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="col-md-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-md-12">
                <label for="password_confirmation" class="form-label">Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="col-md-12 mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary mr-5">Register</button>
                <a class="btn btn-success" href="{{ route('login') }}">
                    Already registered?
                </a>
            </div>
        </form>
    </div>
</div>
@endsection