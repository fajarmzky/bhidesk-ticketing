@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Data Customers</h3>
        </div>

        <div class="box-header">
            @if(Auth::user()->role == "masteradmin")
            <a onclick="addForm()" class="btn btn-primary" >Add Customers</a>
            @endif
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="customers-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Customers</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $item)
                        <tr>
                            <td></td>
                            <td>CUST0{{$item->id}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->telepon}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>
                            @if(Auth::user()->role == "masteradmin")
                                <a onclick="editForm({{$item->id}})" class="btn btn-primary btn-xs" data-toggle="tooltip" title="edit"><i class="glyphicon glyphicon-edit"></i></a><br>
                                <a onclick="deleteData({{$item->id}})" class="btn btn-danger btn-xs" data-toggle="tooltip" title="delete"><i class="glyphicon glyphicon-trash"></i></a>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    @include('usercustomers.form')

@endsection

@section('bot')

    <!-- DataTables -->
    <script src=" {{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }} "></script>
    <script src="{{ asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    <script type="text/javascript">

        $(function () {
            var t = $('#customers-table').DataTable({
                "columnDefs": [ {
                                    "searchable": false,
                                    "orderable": false,
                                    "targets": 0
                                    } ],
                "order": [[ 1, 'asc' ]]
                } );
    
                t.on( 'order.dt search.dt', function () {
                    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                        } );
                    } ).draw();
        });

        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Add Customers');
        }

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('POST');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "{{ url('/editCustomers') }}" + '/' + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Customers');

                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#email').val(data.email);
                    $('#telepon').val(data.telepon);
                    $('#alamat').val(data.alamat);
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
        }

        function deleteData(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.ajax({
                    url : "{{ url('/deleteCustomers') }}" + '/' + id,
                    type : "POST",
                    data : {'_method' : 'POST', '_token' : csrf_token},
                    success : function(data) {
                        window.location.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function () {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
            });
        }

        $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('/addCustomers') }}";
                    else url = "{{ url('/updateCustomers')}}" + '/'  + id;

                    $.ajax({
                        url : url,
                        type : "POST",
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            window.location.reload();
                            swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: 'Pastikan semua data sudah terisi',
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });
        });
    </script>

@endsection
