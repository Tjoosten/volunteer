<div class="modal fade" id="lostPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset wachtwoord.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" action="{{ base_url('authencation/lost') }}" id="reset">
              {{-- TODO: Implement csrf token. --}}
            <div class="form-group">
              <label for="email" class="form-control-label sr-only">email:</label>
              <input type="text" name="email" class="form-control" id="email" placeholder="Uw email adres">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="reset" class="btn btn-success">
            <span class="fa fa-check" aria-hidden="true"></span> Reset
        </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">
            <span class="fa fa-close" aria-hidden="true"></span> Sluit
        </button>
      </div>
    </div>
  </div>
</div>
