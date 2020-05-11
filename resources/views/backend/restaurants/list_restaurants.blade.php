@extends('layouts.backend')

@section('content')
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Restaurant's registrados</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="mb-3" align="right">
                            <a href="{{ route('restaurants.create') }}" class="btn btn-success mr-1 mb-1 waves-effect waves-light">Agregar Restaurant / Empresa</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre empresa</th>
                                        <th>RFC</th>
                                        <th>Creado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($restaurants as $restaurant)
                                        <tr>
                                            <td>{{$restaurant->id}}</td>
                                            <td>{{$restaurant->restaurant_name != null ? $restaurant->restaurant_name : $restaurant->restaurant->restaurant_name}}</td>
                                            <td>{{$restaurant->rfc}}</td>
                                            <td>{{$restaurant->restaurant_name != null ? date('d-m-Y',strtotime($restaurant->created_at)) : date('d-m-Y',strtotime($restaurant->restaurant->created_at))}}</td>
                                            <td>
                                                <a href="{{ route('restaurants.show', $restaurant->restaurant_name != null ? $restaurant->id : $restaurant->restaurant->id) }}" class="btn btn-info mr-1 mb-1 waves-effect waves-light">
                                                    <i class="fa fa-eye"></i>
                                                </a>
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
</section>
@endsection
@section('script')
    <script type="text/javascript">
        $('.dataex-html5-selectors').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
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
    </script>
@endsection