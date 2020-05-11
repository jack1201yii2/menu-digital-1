@extends('layouts.backend')

@section('content')
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Crear Restaurant / Empresa</h4>
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
                        <form class="form form-vertical" action="{{ route('restaurants.store') }}" method="POST">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nombre de Empresa/Restaurant</label>
                                            <input type="text" class="form-control" name="restaurant_name" placeholder="Nombre de Empresa/Restaurant">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">RFC</label>
                                            <input type="text" class="form-control" name="rfc" placeholder="RFC empresa">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12" align="right">
                                        <a href="{{ route('restaurants.index') }}" class="btn btn-info mr-1 mb-1">Regresar</a>
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