@extends('layouts.layout')
@section('title','Login de usuario')

@section('first-Content')

<div class="container-fluid fondoLogin"
      style="background: url({{ asset('images/loginFondo.jpg') }});" imagen="">
      <div class="container">
            <div class="row justify-content-center align-items-center vh-100">
                  <div class="col-sm-8  col-md-6 col-lg-4">
                        <div class="card card-login">
                              <div class="card-header pb-0 pt-5">
                                    <img class="centrado-absoluto"
                              src="{{ asset('images/icono-logo.png') }}"
                                          alt="logo caritas">
                                    <h1 class="text-center ">Login</h1>
                              </div>
                              <div class="card-body pt-0 ">

                                    <form  method="POST"
                                          class="d-block" action="{{ route('login.login') }}">
                                          @csrf

                                          <div class="form-group">
                                                <label for="" class="@error('nickname') text-danger @enderror">Usuario</label>
                                                <input type="text" class="form-control @error('nickname') is-invalid @enderror"
                                                      placeholder="Ingrese su usuario" name="nickname"  value="{{ old('nickname') }}">
                                                      @error('nickname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                          </div>

                                          <div class="form-group">
                                                <label for="" class="@error('password') text-danger @enderror">Contraseña</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                      placeholder="Ingrese su contraseña" name="password">
                                                      @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                          </div>

                                          <div class="form-group text-center">

                                          </div>

                                          <div class="form-group text-center mb-0">
                                                <button class="btn btn-caritas" type="submit">
                                                      Iniciar sesión
                                                </button>
                                          </div>

                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>

@endsection
