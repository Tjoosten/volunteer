@layout('layouts/app')

@section('content')
	<div class="container padding-container">
		<div class="row">
            @if ($this->session->flashdata('message') && $this->session->flashdata('class'))
                <div class="offset-2 col-8">
                    <div class="{{ $this->session->flashdata('class') }}" role="alert">
                        {{ $this->session->flashdata('message') }}
                    </div>
                </div>
            @endif

			<div class="offset-2 col-8">
				<div class="card">
					<div class="card-header">
						Login:
					</div>

					<div class="card-block">
						<form action="{{ base_url('authencation/verify') }}" method="POST">
							{{-- TODO: Implement csrf token. --}}

							<div class="form-group row"> {{-- /Email addess form-group --}}
								<label for="email-address" class="col-3 col-form-label">
									E-mail adres: <span class="text-danger">*</span>
								</label>
								<div class="col-9">
									<input class="form-control" type="email" id="email-address" name="email">
								</div>
							</div> {{-- /Email address form group --}}
							<div class="form-group row"> {{-- Password form-group --}}
								<label for="password-input" class="col-3 col-form-label">
									Wachtwoord: <span class="text-danger">*</span>
								</label>
								<div class="col-9">
									<input class="form-control" type="password" id="password-input" name="password">
								</div>
							</div> {{-- /Password form-group --}}
							<div class="form-group row"> {{-- Submit and reset form-group --}}
								<div class="offset-3 col-9">
									<button class="btn btn-outline-success" type="submit"> {{-- login button --}}
										<span class="fa fa-sign-in" aria-hidden="true"></span> Inloggen
									</button> {{-- /login button --}}
									<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#lostPass"> {{-- Forget password button --}}
										<span class="fa fa-key" aria-hidden="true"></span> Wachtwoord vergeten?
									</button> {{-- /Forget password button --}}
								</div>
							</div> {{-- /Submit and reset form-group --}}
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    @include('auth/includes/lost-password-modal')
@endsection
