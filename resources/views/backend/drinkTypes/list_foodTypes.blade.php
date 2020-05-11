@extends('layouts.backend')

@section('content')
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Categorías de alimentos registrados en {{$restaurant->restaurant_name}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="mb-3" align="right">
                            <a href="{{ route('food-types.create','restaurant_id='.$restaurant->id) }}" class="btn btn-success mr-1 mb-1 waves-effect waves-light">Agregar categoría</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipo de alimento</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($restaurant->foodTypes as $foodType)
                                       <tr>
                                           <td>{{$foodType->id}}</td>
                                           <td>{{$foodType->type_name}}</td>
                                           <td>{{$foodType->foods->count()}}</td>
                                           <td>
                                                <a class="btn btn-info mr-1 mb-1 waves-effect waves-light" href="{{ route('food-types.show',$foodType->id.'?restaurant_id='.$restaurant->id) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ url('admin/restaurant-users/'.$foodType->id.'/edit?restaurant_id='.$restaurant->id) }}" class="btn btn-warning mr-1 mb-1 waves-effect waves-light">
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
                <div class="card-footer" align="right">
                    <a href="{{ route('restaurants.show',$restaurant->id) }}" class="btn btn-info mr-1 mb-1">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    <script type="text/javascript">
        $('.dataex-html5-selectors').DataTable({
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