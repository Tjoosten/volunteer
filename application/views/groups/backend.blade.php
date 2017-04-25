@layout('layouts/app')

@section('content')
    <div class="container padding-container">
		<div class="row">
            {{-- TODO: embed flash session. --}}

			<div class="col-9">
				<div class="card card-padding">
					<div class="card-block">
                        <form class="form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="inputPassword2" placeholder="Zoek op naam">
                            </div>
                            <div class="form-group">
                                <button type="submit" style="margin-left: 5px;" class="btn btn-sm btn-success" name="button">Zoek</button>
                            </div>
                        </form>
                        <hr>

                        {{-- Volunteer output --}}
                            @if ($groups->count() === 0)
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading"><span class="fa fa-info-circle" aria-hidden="true"></span> Info:</h4>
                                    <p>Er zijn nog geen vrijwilligers groepen in het systeem.</p>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>#</th>
                                                <th>Naam:</th>
                                                <th colspan="2">Creatie:</th> {{-- Colspan 2 needed for functions. --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($groups->get() as $group)
                                                <tr>
                                                    <th scope="row">{{ $group->id }}</th>
                                                    <td>{{ $group->title }}</td>
                                                    <td>{{ $group->created_at->diffForHumans() }}</td>

                                                    <td> {{-- Options --}}
                                                        <a href="" class="badge badge-info">Bekijk</a>
                                                        <a href="" class="badge badge-warning">Wijzig</a>
                                                        <a href="{{ base_url('group/delete/' . $group->id) }}" class="badge badge-danger">Verwijder</a>
                                                    </td> {{-- /Options --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        {{-- Volunteer output --}}

					</div>
				</div>
			</div>

            <div class="col-3">
                @include('groups/includes/sidebar')
            </div>
		</div>
	</div>
@endsection
