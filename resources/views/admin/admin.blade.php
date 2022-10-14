@extends('master')

@section('content')


@if (Session::has('post-hide'))
    <div class="row d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-12">
            <div class="alert alert-success">
                <ul class="list-unstyled">
                    <li>{{ Session::get('post-hide') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endif


<div class="row mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>All Post page</h4>
        @if (auth()->user()->type != 0)
            <a href="{{ route('post.create') }}" class="btn btn-success">Add New</a>
        @endif
    </div>

    @foreach( $posts as $post )
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text">{{ $post->content }}</p>
                <div class="post-footer d-flex justify-content-between align-items-center">
                    <p>Created By <b>{{ $post->user->name }}</b></p>
                    <div>

                        @if (auth()->user()->type == 1)
                            <a href="{{ route('post.hide', $post) }}" class="btn btn-success">Hide</a>
                        @endif

                        <a href="{{ route('post.view', $post) }}" class="btn btn-primary">Read more</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mx-2 my-5">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
    {{-- Pagination --}}

</div>
@endsection
