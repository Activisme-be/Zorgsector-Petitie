<div id="newTicket" class="modal fade" role="dialog">
  <div class="modal-dialog">

    {{-- Modal content--}}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Meld een probleem.</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{ base_url('feedback/insert') }}">

          <div class="form-group">
            <label class="col-sm-3 control-label">
              Email: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-9">
              <input class="form-control" name="email" placeholder="Email adres" />
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3">
              Hoofding: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-9">
              <input class="form-control" name="heading" placeholder="Ticket titel" />
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3">
              Categorie: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-9">
              <select class="form-control" name="category_id">
                <option value="">-- Selecteer categorie --</option>

                @foreach(Labels::all() as $label)
                  <option value="{{ $label->id }}">{{ $label->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3">
              Beschrijving: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-9">
              <textarea name="description" rows="7" class="form-control" placeholder="Probleem beschrijving"></textarea>
            </div>
          </div>

      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-success">Insturen</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
      </div>
    </div>

  </div>
</div>
