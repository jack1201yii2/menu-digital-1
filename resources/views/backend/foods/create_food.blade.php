@extends('layouts.backend')

@section('content')
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Crear Aliemnto</h4>
                    <p>
                        <br>
                        Restaurant : {{$foodType->restaurant->restaurant_name}}
                        <br>
                        Categoría : {{$foodType->type_name}}
                    </p>
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
                        <form class="form form-vertical" id="add_food_form" {{-- action="{{ route('food-types.store') }}" --}} method="POST">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="row justify-content-center">
                                    <div class="col-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nombre</label>
                                            <input type="text" class="form-control" autocomplete="false" name="food_name" placeholder="Nombre de Categoría">
                                        </div>
                                    </div>
                                    <div class="col-2 col-lg-2">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Precio</label>
                                            <input type="number" step="any" class="form-control" name="food_price" placeholder="Nombre de Categoría">
                                        </div>
                                    </div>
                                    <div class="col-8 col-lg-8">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Descripción</label>
                                            <textarea class="form-control" name="food_description" rows="4" placeholder="Escribe la descripción"></textarea>
                                        </div>
                                    </div>

                                    <input type="hidden" name="food_type_id" value="{{$foodType->id}}">
                                    
                                    <div class="col-12" align="right">
                                        <a href="{{ route('food-types.show',$foodType->id.'?restaurant_id='.$foodType->restaurant->id) }}" class="btn btn-info mr-1 mb-1">Regresar</a>
                                        <button type="submit" class="btn btn-success mr-1 mb-1 btn_add_type">Guardar</button>
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
    <script type="text/javascript">
        $('#add_food_form').on('submit', function(e) {
            e.preventDefault(); // prevent default form submit
            var form = $('#add_food_form'); // contact form
            var submit = $('.btn_add_type'); // submit button
            $.ajax({
                url: '{{ route('foods.store') }}', // form action url
                type: 'POST', // form submit method get/post
                data: form.serialize(),
                beforeSend: function() {
                    //alert.html('El producto se esta guardando').fadeIn().fadeOut();
                    submit.prop('disabled', true);
                    submit.html('Guardando...'); // change submit button text
                },
                success: function(data) {
                    form.trigger('reset');
                    submit.prop('disabled', false);
                    submit.html('Guardado'); // reset submit button text
                },
                error: function(e) {
                    console.log(e)
                    alert('Hubo algún problema, recargue la página e intente de nuevo');
                }
            });
        });
    </script>
@endsection