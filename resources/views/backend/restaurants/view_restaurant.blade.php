@extends('layouts.backend')

@section('content')
<section id="statistics-card">
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6" align="left">
                                <h2 class="text-bold-700">Información Restaurant / Empresa</h2>
                                <p>
                                    <strong>Nombre:</strong> {{$restaurant->restaurant_name}} <br>
                                    <strong>RFC:</strong> {{$restaurant->rfc}}
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <a href="{{ route('restaurant-users.index','restaurant='.$restaurant->id) }}">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">Usuarios</h2>
                            <p class="mb-0 line-ellipsis">{{$restaurant->restaurantUsers->count()}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <a href="{{ route('branch-offices.index','restaurant='.$restaurant->id) }}">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-home text-warning font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">Sucursales</h2>
                            <p class="mb-0 line-ellipsis">{{$restaurant->branchOffices->count()}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <a href="#">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-edit text-danger font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">Editar</h2>
                            <p class="mb-0 line-ellipsis">{{$restaurant->name_restaurant}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <a href="#">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-primary p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-trash text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">Eliminar</h2>
                            <p class="mb-0 line-ellipsis">{{$restaurant->name_restaurant}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <a href="{{ route('food-types.index','restaurant='.$restaurant->id) }}">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="fa fa-cutlery text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">Alimentos</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <a href="{{ route('restaurant-users.index','restaurant='.$restaurant->id) }}">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="fa fa-glass text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">Bebidas</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection
@section('script')
@endsection