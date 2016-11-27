<div id="newUser" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create login.</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ base_url('users/insert') }}" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            Username: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-8">
                            <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            Password: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-8">
                            <input type="text" name="email" placeholder="Email address" class="form-control">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Create</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
