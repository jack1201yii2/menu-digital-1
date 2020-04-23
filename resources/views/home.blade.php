@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->branch_office_id == null)
                        @if (Auth::user()->restaurantUsers->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>RFC</th>
                                        <th>Usuarios</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::user()->restaurantUsers as $restaurant)
                                        <tr>
                                            <td>{{ $restaurant->restaurant->name_restaurant }}</td>
                                            <td>{{ $restaurant->restaurant->rfc }}</td>
                                            <td>{{ $restaurant->restaurant->restaurantUsers->count() }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-round"><i class="fa fa-eye"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h2 style="text-transform: uppercase;">Soy el fuck dueño : {{Auth::user()->user_restaurant_name}} </h2>
                            <div class="col-lg-12" align="right">
                                <button class="btn btn-success">Agregar restaurant</button>
                                <button class="btn btn-info">Agregar usuario</button>
                            </div>
                            <br>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>RFC</th>
                                        <th>Usuarios</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($restaurants as $restaurant)
                                        <tr>
                                            <td>{{ $restaurant->name_restaurant }}</td>
                                            <td>{{ $restaurant->rfc }}</td>
                                            <td>{{ $restaurant->restaurantUsers->count() }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                                <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @else
                        <strong>Bienvenido a la sucursal "{{ Auth::user()->branchOffice->branch_office_name}} "</strong>
                    @endif
                    <br>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
