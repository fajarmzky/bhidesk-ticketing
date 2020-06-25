<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  id="form-item" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" >
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>


                <div class="modal-body">
                    <input type="hidden" id="id" name="id">

                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label >Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" autofocus required>
                                    <span class="help-block with-errors"></span>
                                </div>
                                <div class="col-xs-6">
                                    <label>Role</label>
                                    <select class="form-control select" name="role" id="role" autocomplete="off" autofocus required>
                                        <option value="">-- Role User --</option>
                                        <option value="masteradmin">masteradmin</option>
                                        <option value="operator">operator</option>
                                        <option value="engineer">engineer</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label >Email</label>
                                    <input type="email" class="form-control" id="email" name="email" autocomplete="off"  required>
                                    <span class="help-block with-errors"></span>
                                </div>
                                <div class="col-xs-6">
                                    <label >Telephone</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" autocomplete="off"  required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label >Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off"  required>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label >Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="off" required>
                            <span id='message'></span>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
