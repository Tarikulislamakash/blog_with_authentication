@extends('master')

@section('content')

@if (Session::has('post-update'))
    <div class="row d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-12">
            <div class="alert alert-success">
                <ul class="list-unstyled">
                    <li>{{ Session::get('post-update') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endif

<div class="row mt-4">
	<div class="d-flex justify-content-between align-items-center mb-4">
		<h4>Post Details</h4>
        @if (auth()->user() && auth()->user()->type != 0)
            <a href="{{ route('post.edit', $post) }}" class="btn btn-success">Edit</a>
        @endif
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h2 class="card-title">{{ $post->title }}</h2>
				<p class="card-text">{{ $post->content }}</p>
			</div>
		</div>
	</div>
</div>


@if (auth()->user())

<div class="row mt-4 d-flex justify-content-center align-items-center mt-5 pt-5">

	<div class="">
		<h3>Add Comment</h3>
	</div>


    @if (Session::has('comment-create'))
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-5">
                <div class="alert alert-success">
                    <ul class="list-unstyled">
                        <li>{{ Session::get('comment-create') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    @endif

    @if (Session::has('comment-hide'))
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-5">
                <div class="alert alert-success">
                    <ul class="list-unstyled">
                        <li>{{ Session::get('comment-hide') }}</li>
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

	<div class="col-md-5">
        <form method="POST" action="{{ route('comment.store', $post) }}">
            @csrf
            <div class="col-md-12">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
            </div>
            <div class="col-md-12">
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control" name="comment" id="comment" cols="30" rows="3"></textarea>
            </div>
            <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-primary mr-5">Comment</button>
            </div>
        </form>
    </div>

</div>


<div class="row mt-4 d-flex justify-content-center align-items-center mt-5 pt-5">

    @foreach ($comments as $comment)
        <div class="col-md-8 my-2">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{ $comment->content }}</p>
                    <div class="post-footer d-flex justify-content-between align-items-center">
                        <p>Created By <b>{{ $comment->user->name }}</b></p>
                        @if (auth()->user()->type != 0)
                            <a href="{{ route('comment.hide', [$comment, $post]) }}" class="btn btn-success">Hide</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

@endif

@endsection
