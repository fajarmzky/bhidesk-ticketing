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
                            <label >Project Name</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label >Customers</label>
                            <select class="form-control select" name="id_customer" id="id_customer" autofocus required>
                                <option value="">-- Pilih Customer --</option>
                                @foreach ($customers as $itemCastomer)
                                    <option value="{{$itemCastomer->id}}">{{$itemCastomer->nama}}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label >Start Date</label>
                            <input type="text" class="form-control" id="start_date" name="start_date" autocomplete="off"  required>
                            <span class="help-block with-errors"></span>
                        </div> 

                        <div class="form-group">
                            <label >End Date</label>
                            <input type="text" class="form-control" id="end_date" name="end_date" autocomplete="off"  required>
                            <span class="help-block with-errors"></span>
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
