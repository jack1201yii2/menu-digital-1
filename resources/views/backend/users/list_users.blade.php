@extends('layouts.backend')

@section('content')
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Usuarios registrados</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="mb-3" align="right">
                            <a href="{{ route('restaurants.show',$restaurant->id) }}" class="btn btn-success mr-1 mb-1 waves-effect waves-light">Regresar</a>
                            <a href="{{ route('restaurant-users.create','restaurant='.$restaurant->id) }}" class="btn btn-success mr-1 mb-1 waves-effect waves-light">Agregar usuario para {{$restaurant->name_restaurant}}</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre de usuario</th>
                                        <th>NickName</th>
                                        <th>Correo</th>
                                        <th>Verificado</th>
                                        <th>Restaurant</th>
                                        <th>Rol</th>
                                        <th>Creado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($restaurant_users as $restaurant_user)
                                        <tr>
                                            <td>{{$restaurant_user->user->id}}</td>
                                            <td>{{$restaurant_user->user->user_name}}</td>
                                            <td>{{$restaurant_user->user->user_nickname}}</td>
                                            <td>{{$restaurant_user->user->email}}</td>
                                            <td>{{$restaurant_user->user->email_verified_at}}</td>
                                            <td>{{$restaurant_user->restaurant->restaurant_name}}</td>
                                            <td>Dueño</td>
                                            <td>{{date('d-m-Y',strtotime($restaurant_user->user->created_at))}}</td>
                                            <td>
                                                <button type="button" onclick="data_user({{$restaurant_user->user->id}})" class="btn btn-info mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#data_user">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <a href="{{ url('admin/restaurant-users/'.$restaurant_user->user->id.'/edit?restaurant_id='.$restaurant->id) }}" class="btn btn-warning mr-1 mb-1 waves-effect waves-light">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($branchOffice_users as $branchOffice_user)
                                        <tr>
                                            <td>{{$branchOffice_user->id}}</td>
                                            <td>{{$branchOffice_user->user_name}}</td>
                                            <td>{{$branchOffice_user->user_nickname}}</td>
                                            <td>{{$branchOffice_user->email}}</td>
                                            <td>{{$branchOffice_user->email_verified_at}}</td>
                                            <td>{{$branchOffice_user->branchOffice->branch_office_name}}</td>
                                            <td>Gerente</td>
                                            <td>{{date('d-m-Y',strtotime($branchOffice_user->created_at))}}</td>
                                            <td>
                                                <button type="button" onclick="data_user({{$branchOffice_user->id}})" class="btn btn-info mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#data_user">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <a href="{{ url('admin/restaurant-users/'.$branchOffice_user->id.'/edit?restaurant_id='.$restaurant->id) }}" class="btn btn-warning mr-1 mb-1 waves-effect waves-light">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="data_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info white">
                    <h5 class="modal-title" id="myModalLabel130">Info Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="data_user_section"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
@section('script')
    <script type="text/javascript">
        $('.dataex-html5-selectors').DataTable({
            // "columnDefs": [{
            //     "visible": false,
            //     "targets": 2
            // }],
            "order": [
                [0, 'desc']
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });

        function data_user(id) {
            $.ajax({
                url: '/admin/restaurant-users/'+id,
                type: 'GET',
                data:{},
                success: function(result) {
                    $('#data_user_section').html(result);
                }
            })
        }

        // (function(window, document, $) {
        //     'use strict';

        //      // onShow event
        //     $('#onshowbtn').on('click', function() {
        //         $('#onshow').on('show.bs.modal', function() {
        //             alert('onShow event fired.');
        //         });
        //     });

        //     // onShown event
        //     $('#onshownbtn').on('click', function() {
        //         $('#onshown').on('shown.bs.modal', function() {
        //             alert('onShown event fired.');
        //         });
        //     });

        //     // onHide event
        //     $('#onhidebtn').on('click', function() {
        //         $('#onhide').on('hide.bs.modal', function() {
        //             alert('onHide event fired.');
        //         });
        //     });

        //     // onHidden event
        //     $('#onhiddenbtn').on('click', function() {
        //         $('#onhidden').on('hidden.bs.modal', function() {
        //             alert('onHidden event fired.');
        //         });
        //     });
        // })(window, document, jQuery);

    </script>
@endsection