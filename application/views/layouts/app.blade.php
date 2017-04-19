<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>ActivismeBE - Vrijwilligers | {{ $title }}</title>

		<link rel="icon"       href="{{ base_url('assets/img/favicon.ico') }}">
		<link rel="stylesheet" href="{{ base_url('assets/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ base_url('assets/css/custom.css') }}">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Allan:700" type="text/css">
	</head>

	<body style="background-color: #f7f7f7;">
		<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand font-heading" href="#">ActivismeBE - Vrijwilligers</a>

			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Procedure</a>
					</li>
				</ul>
				<div class="my-4 my-lg-0">
					<a href="" style="margin-right: 5px;" class="btn btn-outline-success my-2 my-sm-0">Login</a>
				</div>
			</div>
		</nav>

		@yield('content')

		<footer style="background-color: #fff;" class="text-muted footer-padding-top">
			<div class="container">

				<ul class="list-unstyled">
					<li class="footer-menu"><a href=""><span class="fa fa-github" aria-hidden="true"></span> GitHub</a></li>
					<li class="footer-menu"><a href=""><span class="fa fa-facebook" aria-hidden="true"></span> Facebook</a></li>
					<li class="footer-menu"><a href=""><span class="fa fa-twitter" aria-hidden="true"></span> Twitter</a></li>
					<li class="footer-menu"><a href=""><span class="fa fa-gavel" aria-hidden="true"></span> Disclaimer</a></li>
				</ul>


				<p>ActivismeBE - Vrijwilligers is een onderdeel van <a href="http://www.activisme.be">ActivismeBE</a>. Website ontworpen door Tim Joosten.</p>
				<p>&copy 2017. Alle rechten voorbehouden.</p>

			</div>
		</footer>

		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="{{ base_url('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ base_url('assets/js/ie10-viewport-bug-workaround.js') }}"></script>
	</body>
</html>
