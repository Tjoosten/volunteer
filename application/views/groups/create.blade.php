@layout('layouts/app')

@section('content')
    <div class="container padding-container">
        <div class="row">
            {{-- TODO: embed flash session. --}}

            <div class="col-9">
                <div class="card card-padding">
					<div class="card-block">
                        <h3 class="display-5">Nieuwe vrijwilligers groep:</h3>
                        <hr>

                        <form action="{{ base_url('group/store') }}" method="post" enctype="multipart/form-data">
                            {{-- TODO: implement csrf token --}}
                            {{-- TODO: Implement validation to the form. --}}

                            <div class="form-group row @if(! empty(form_error('title'))) has-danger @endif">
                                <label for="title" class="col-2 col-form-label">Ploeg naam: <span class="text-danger">*</span></label>
                                <div class="col-5">
                                    <input class="form-control" type="text" placeholder="Naam" name="title" id="title">

                                    @if (! empty(form_error('title')))
                                        <div class="form-control-feedback"><small>{{ form_error('title') }}</small></div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-2 col-form-label">Afbeelding: <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <input type="file" name="image" class="form-control-file" id="image" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">(Deze afbeelding zal gebruikt worden als hoofd afbeelding voor de groep.)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-2 col-form-label">Beschrijving:<span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <textarea name="description" placeholder="Groepsbeschrijving" id="description" aria-describedby="help-description" class="form-control" rows="10" cols="80" spellcheck="true"></textarea>
                                    <small id="help-description" class="form-text text-muted">(Beschrijvings veld word ondersteund door de markdown syntax.)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-2 col-10">
                                    <button type="submit" class="btn btn-outline-success"><span class="fa fa-check" aria-hidden="true"></span> Aanmaken</button>
                                    <button type="reset" class="btn btn-outline-danger"><span class="fa fa-close" aria-hidden="true"></span> Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-3">
                @include('groups/includes/sidebar')
            </div>
        </div>
    </div>
@endsection
