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

	<body>
		<header class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
			<nav class="container">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<a class="navbar-brand font-heading" href="{{ base_url() }}">ActivismeBE - Vrijwilligers</a>

				<div class="collapse navbar-collapse" id="navbarsExampleDefault">
					<ul class="navbar-nav mr-auto">
						@if (! $this->user)
							<li class="nav-item"><a class="nav-link" href="{{ base_url('group') }}"><span class="fa fa-users" aria-hidden="true"></span> Vrijwilligers groepen</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ base_url('faq') }}"><span class="fa fa-question-circle" aria-hidden="true"></span> FAQ</a></span>
						@elseif ($this->user && in_array('Admin', $this->permissions))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="Groups" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fa fa-users" aria-hidden="true"></span> Groepen
                                </a>

                                <div class="dropdown-menu" aria-labelledby="Groups">
                                    <a class="dropdown-item" href="{{ base_url('group/create') }}">Groep aanmaken.</a>
                                    <a class="dropdown-item" href="{{ base_url('group/backend') }}">Groepen back-end.</a>
                                    <a class="dropdown-item" href="{{ base_url('group') }}">Groepen front-end</a>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ base_url('volunteers') }}"><span class="fa fa-user" aria-hidden="true"></span> Vrijwilligers</a></li>
						@elseif ($this->user && in_array('Volunteer', $this->permissions))
						@endif
					</ul>


                    @if (! $this->user)
                        <div class="my-4 my-lg-0">
    						<a href="{{ base_url('authencation') }}" style="margin-right: 5px;" class="btn btn-outline-success my-2 my-sm-0">
                                <span class="fa fa-sign-in" aria-hidden="true"></span> Login
                            </a>
                        </div>
                    @elseif ($this->user)
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" href="#" id="account" data-toggle="dropdown" aria-haspopup="true" aria-expaneded="false">
                                    <span class="fa fa-user" aria-hidden="true"></span> {{ $this->user['name'] }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="account">
                                    <a class="dropdown-item" href="{{ base_url('account') }}"><span class="fa fa-cogs" aria-hidden="true"></span> Instellingen</a>
                                    <a class="dropdown-item" href="{{ base_url('authencation/logout')}}"><span class="fa fa-sign-out" aria-hidden="true"></span> Uitloggen</a>
                                </div>
                            </li>
                        </ul>
                    @endif
				</div>
			</nav>
		</header>

		@yield('content')
		@yield('footer')

		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="{{ base_url('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ base_url('assets/js/ie10-viewport-bug-workaround.js') }}"></script>
	</body>
</html>
