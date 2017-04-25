@layout('layouts/app')

@section('content')
    <div class="container padding-container">
        <div class="row">
            <div class="offset-2 col-8"> {{-- Col ---}}
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" role="tab" href="#info">Account informatie</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#security">Account beveiliging</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#group">Mijn vrijwilligers groepen</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="card-block">
                                <form class="" action="index.html" method="post">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Naam: <span class="text-danger">*</span></label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="{{ $this->user['name'] }}" id="example-text-input">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Gebruikersnaam: <span class="text-danger">*</span></label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="{{ $this->user['username'] }}" id="example-text-input">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-3 col-form-label">Email adres: <span class="text-danger">*</span></label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="{{ $this->user['email'] }}" id="example-text-input">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-3 col-9">
                                            <div class="pull-left">
                                                <button type="submit" type="submit" class="btn btn-outline-success"><span class="fa fa-check" aria-hidden="true"></span> Aanpassen</button>
                                                <button type="reset" type="reset" class="btn btn-outline-danger"><span class="fa fa-close" aria-hidden="true"></span> Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="security" role="tabpanel">
                            <div class="card-block">
                                <form class="" action="index.html" method="post">
                                    <div class="form-group row">
                                        <label for="password" class="col-3 col-form-label">Wachtwoord: <span class="text-danger">*</span></label>
                                        <div class="col-9">
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="confirmation" class="col-3 col-form-label">Bevestiging: <span class="text-danger">*</span></label>
                                        <div class="col-9">
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-3 col-9">
                                            <div class="pull-left">
                                                <button class="btn btn-outline-success" type="submit"><span class="fa fa-check" aria-hidden="true"></span> Aanpassen</button>
                                                <button class="btn btn-outline-danger" type="reset"><span class="fa fa-close" aria-hidden="true"></span> Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="group" role="tabpanel">
                            <div class="card-block">
                                <h4 class="card-title">Group</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                              </div>
                        </div>
                    </div>
                 </div>
            </div> {{-- /col --}}
        </div>
    </div>
@endsection
