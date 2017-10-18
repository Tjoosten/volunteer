@layout('layouts/app')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1 class="display-3">Hallo,</h1>
			<p>
				Welkom bij Activisme_BE - vrijwilligers, wil je bijdragen tot een community die zich inzet tijdens ludieke acties, armoedebestrijding, enz...
				Dan kun je misschien met al je skills en intresse bijdragen tot een groter geheel.
			</p>

			<p><a class="btn btn-primary" href="#" role="button">Lees meer »</a></p>
		</div>
	</div>

	<div class="container" style="min-height: 330px;">

		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline-danger card-padding">
					<img class="card-img-top" style="width:100%; height: 200px;" src="{{ base_url('assets/img/welfare.jpg') }}" alt="Card image cap">
					<div class="card-block">
						<h5 class="card-title">Ploeg: Armoedebestrijding</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="card-link">Card link</a>
						<a href="#" class="card-link">Another link</a>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card card-outline-danger card-padding">
					<img class="card-img-top" style="width:100%; height: 200px;" src="{{ base_url('assets/img/developer.jpg') }}" alt="Card image cap">
					<div class="card-block">
						<h5 class="card-title">Ploeg: Informatica</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="card-link">Card link</a>
						<a href="#" class="card-link">Another link</a>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card card-outline-info card-padding">
					<img class="card-img-top" style="width:100%; height: 200px;" src="{{ base_url('assets/img/volunteer.jpg') }}" alt="Card image cap">
					<div class="card-block">
						<h5 class="card-title">Ploeg: Losse vrijwilligers</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="card-link">Card link</a>
						<a href="#" class="card-link">Another link</a>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card card-outline-danger card-padding">
					<img class="card-img-top" style="width:100%; height: 200px;" src="{{ base_url('assets/img/activist.png') }}" alt="Card image cap">
					<div class="card-block">
						<h5 class="card-title">Ploeg: Activisten</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="card-link">Card link</a>
						<a href="#" class="card-link">Another link</a>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card card-outline-info card-padding">
					<img class="card-img-top" style="width:100%; height: 200px;" src="{{ base_url('assets/img/writer.jpg') }}" alt="Card image cap">
					<div class="card-block">
						<h5 class="card-title">Ploeg: Schrijvers</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="card-link">Card link</a>
						<a href="#" class="card-link">Another link</a>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card card-outline-info card-padding">
					<img class="card-img-top" style="width:100%; height: 200px;" src="{{ base_url('assets/img/grafisch.png') }}" alt="Card image cap">
					<div class="card-block">
						<h5 class="card-title">Ploeg: Grafische ontwerpers</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="card-link">Card link</a>
						<a href="#" class="card-link">Another link</a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.container -->
@endsection

@section('footer')
	@include('layouts/includes/footer')
@endsection
