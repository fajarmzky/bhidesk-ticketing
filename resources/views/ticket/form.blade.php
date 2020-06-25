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
                            <label >Customers</label>
                            <select class="form-control select" name="id_project" id="id_project" autofocus required>
                                <option value="">-- Pilih Project --</option>
                                @foreach ($projects as $itemProject)
                                    <option value="{{$itemProject->id}}">{{$itemProject->name}}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label >Type</label>
                            <select class="form-control select" name="type" id="type" autofocus required>
                                <option value="">-- Pilih Type --</option>
                                    <option value="Service Request">Service Request</option>
                                    <option value="Problem Issue">Problem Issue</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label >Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" autofocus required></textarea>
                        </div>

                        <div class="form-group">
                            <label >Solution</label>
                            <textarea class="form-control" id="solution" name="solution" autofocus required></textarea>
                        </div>

                        <div class="form-group">
                            <label >Assign To</label>
                            <select class="form-control select" name="id_user" id="id_user" autofocus required>
                                <option value="">-- Pilih Users --</option>
                                @foreach ($users as $item)
                                    <option value="{{$item->id}}">{{$item->name}} | {{$item->role}}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label >Priority</label>
                            <select class="form-control select" name="priority" id="priority" autofocus required>
                                <option value="">-- Pilih Priority --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label >Status</label>
                            <select class="form-control select" name="status" id="status" autofocus required>
                                <option value="">-- Pilih Status --</option>
                                    <option value="Open">Open</option>
                                    <option value="On Progress">On Progress</option>
                                    <option value="Finish">Finish</option>
                                    <option value="Close">Close</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label >Created Date</label>
                            <input type="text" class="form-control" id="created_time" name="created_time" autocomplete="off"  required>
                            <span class="help-block with-errors"></span>
                        </div> 

                        <div class="form-group">
                            <label >Finished Date</label>
                            <input type="text" class="form-control" id="finished_time" name="finished_time" autocomplete="off"  required>
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
