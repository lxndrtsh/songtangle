<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>songtangle</title>

	<link href="/css/app.css" rel="stylesheet">
	<link href="/css/slate.css" rel="stylesheet">
	<link href="/css/custom.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.1/css/select2.min.css" rel="stylesheet" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="/">songtangle</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

						<ul class="nav navbar-nav navbar-right">
							@if (Auth::guest())
								<li><a href="/auth/login">Login</a></li>
								<li><a href="/auth/register">Register</a></li>
							@else
								<li class="dropdown">
									@include('plugins.notify.push')
								</li>
								<li class="dropdown">
									@include('plugins.notify.message')
								</li>
								<li class="dropdown">
									@include('plugins.dropdown.account')
								</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="top-fill"></div>
	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	@yield('customjs')
</body>
</html>
