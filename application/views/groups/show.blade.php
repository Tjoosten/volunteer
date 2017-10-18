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
						<a href="mailto:vrijwilligers@activisme.be" class="card-link">Ik heb nog vragen?</a>

                        @if ($this->user && in_array('Admin', $this->permissions))
                            <span class="pull-right">
                                <a href="#" class="card-link text-warning">Wijzig</a>
                                <a href="{{ base_url('group/delete/1') }}" class="card-link text-danger">Verwijder</a>
                            </span>
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div>

    {{-- Modal includes --}}
    {{-- /Modal includes --}}
@endsection

@section('footer')
	@include('layouts/includes/footer')
@endsection
