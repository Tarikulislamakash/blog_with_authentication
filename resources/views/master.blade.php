<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<style>
        .alert ul{
            margin-bottom: 0px !important;
        }
	</style>

    @yield('style')

	<title>Hello, world!</title>
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Navbar Start -->
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container-fluid">
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarText">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">All Posts</a>
                                </li>

								@if( auth()->user() )

                                    @if( auth()->user()->type == 1 )
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin') }}">Admin Page</a>
                                        </li>
                                    @endif

								@else
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}">Login</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">Register</a>
								</li>
								@endif
							</ul>

							@if( auth()->user() )
							<ul class="navbar-nav mb-2 mb-lg-0 d-flex align-items-center">
								<li class="nav-item">
									<a class="nav-link" href="#">{{ auth()->user()->name }}</a>
								</li>
								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<button style="border: none !important; color: rgb(0 0 0 / 55%); background-color: rgba(var(--bs-light-rgb),var(--bs-bg-opacity))!important;" type="submit">Logout</button>
								</form>
							</ul>
							@endif

						</div>
					</div>
				</nav>
				<!-- Navbar End -->
			</div>
		</div>

		@yield('content')

	</div>

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
