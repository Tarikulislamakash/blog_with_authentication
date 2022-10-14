@extends('master')

@section('content')

@if (Session::has('post-success'))
    <div class="row d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-5">
            <div class="alert alert-success">
                <ul class="list-unstyled">
                    <li>{{ Session::get('post-success') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="row d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-5">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        <li>{{ $error }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endif

<div class="row d-flex justify-content-center align-items-center mt-5">

    <div class="col-md-5">
        <form method="POST" action="{{ route('post.store') }}">
            @csrf
            <div class="col-md-12">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
            </div>
            <div class="col-md-12">
                <label for="content" class="form-label">Post Content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-primary mr-5">Publish</button>
            </div>
        </form>
    </div>
</div>
@endsection
