<div class="modal fade" id="newLabel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nieuw ticket label</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="">
          
          <div class="form-group">
            <label class="control-label col-sm-3">
              Naam: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-9">
              <input class="form-control" type="text" name="name" placeholder="Label name" />
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3">
              Beschrijving: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-9">
              <textarea class="form-control" rows="7" placeholder="Label beschrijving" name="description"></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Opslaan</button>
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Sluiten</button>
      </div>
    </div>
  </div>
</div>