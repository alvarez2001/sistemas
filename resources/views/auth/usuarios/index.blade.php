@extends('layouts.LayoutHome')
@section('title', 'Modulo usuarios')
@section('title-section', 'Modulo usuarios')
@section('second-content')
    <div class="row ">

        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-2">
                    <a href="{{ route('usuarios.showFormCrear') }}" class="a-card-data">
                        <div class="card card-data">
                            <div class="card-header text-center">
                                <h2 class="m-0">Registro</h2>
                            </div>
                            <div class="card-body">
                                <img class="w-100 h-100" src="{{ asset('images/iconos-web/018-edit.svg') }}" alt="Registro">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-2">
                    <a href="{{ route('usuarios.listar') }}" class="a-card-data">
                        <div class="card card-data">
                            <div class="card-header text-center">
                                <h2 class="m-0">Listar</h2>
                            </div>
                            <div class="card-body">
                                <img class="w-100 h-100" src="{{ asset('images/iconos-web/027-search.svg') }}"
                                    alt="Registro">
                            </div>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </div>

@endsection
