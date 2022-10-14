@extends('master')

@section('content')
<div class="row mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>All Post page</h4>
        @if (auth()->user() && auth()->user()->type != 0)
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
                    <a href="{{ route('post.view', $post) }}" class="btn btn-primary">Read more</a>
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
