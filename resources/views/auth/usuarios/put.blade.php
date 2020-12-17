@extends('layouts.LayoutHome')
@section('title', 'Modulo usuarios | Editar ')
@section('title-section', 'Actualizar Usuario')
@section('second-content')
    <div class="row ">

        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <div class="row justify-content-center">

                <div class="col-12  mx-auto">
                    @include('forms-partials.usuarios-form',[
                    'rutaRoute' => route('usuarios.actualizar', $usuario) ,
                    'showPassword' => False,
                    'nombreButton' => 'Actualizar Usuario'
                    ])
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="imagenPresubida" tabindex="-1" aria-labelledby="imagenPresubidaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">

                <div class="modal-body">
                    <img src="{{ config('app.url') . '/public/images/thumbnails/' . $usuario->imagen }}"
                        class="w-100 h-100 imagenesPresubida">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-caritas" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
