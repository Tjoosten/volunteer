@layout('layouts/app')

@section('content')
	<div class="container padding-container">
		<div class="row">
			<div class="col-12">
				<div class="card card-padding">
					<img class="card-img-top" src="{{ base_url('assets/img/developer.jpg') }}" alt="Card image cap">
					<div class="card-block">
						<h5 class="card-title display-4">Ploeg: Armoedebestrijding</h5>
						<hr>

						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

						<hr>
						<a href="#" class="card-link">Ik wil vrijwilliger worden.</a>
						<a href="#" class="card-link">Ik heb nog vragen?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('footer')
	@include('layouts/includes/footer')
@endsection
