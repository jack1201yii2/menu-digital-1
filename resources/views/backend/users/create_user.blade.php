@extends('layouts.backend')

@section('content')
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Crear usuario para {{$restaurant->name_restaurant}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="col-12" align="center">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <form class="form form-vertical" action="{{ route('restaurant-users.store','restaurant_id='.$restaurant->id) }}" method="POST">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nombre de usuario</label>
                                            <input type="text" class="form-control" name="user_name" placeholder="Nombre de usuario">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">NickName</label>
                                            <input type="text" class="form-control" name="user_nickname" placeholder="RFC empresa">
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Correo del usuario</label>
                                            <input type="email" class="form-control" name="email" placeholder="Nombre de usuario">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Contraseña del usuario</label>
                                            <input type="password" class="form-control" name="password" placeholder="**********">
                                        </div>
                                    </div>

                                    <div class="col-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Seleccionar sucursal</label>
                                            <select class="form-control" name="branch_office_id">
                                                <option value="">Seleccionar sucursal</option>
                                                @foreach ($restaurant->branchOffices as $branchOffice)
                                                    <option value="{{$branchOffice->id}}">{{$branchOffice->branch_office_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12" align="right">
                                        <a href="{{ route('restaurant-users.index','restaurant='.$restaurant->id) }}" class="btn btn-info mr-1 mb-1">Regresar</a>
                                        <button type="submit" class="btn btn-success mr-1 mb-1">Guardar</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Limpar datos</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
@endsection