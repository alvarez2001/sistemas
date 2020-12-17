<form action="{{ $rutaRoute }}" class="was-validated" id="formulario-crear-usuario" method="post"
    enctype="multipart/form-data">
    <div class="form-row">
        <div class="col-12">
            <p class="text-danger mb-3">
                <small>Los campos que contengan ( * ) son
                    <strong>Obligatorios</strong></small>
            </p>
            @csrf
            @method('put')
        </div>

        <div class="col-12 form-group ">
            @include('partials.msjSession')
            @include('partials.error-validators')
        </div>


        @include('forms-partials.input-form', [
        'columns' => 'col-12 col-md-6',
        'validar' => True,
        'name' => 'nombre',
        'placeholder'=>'Introduce tu nombre',
        'max' => 155,
        'type' => 'text',
        'attrModel' => $usuario->nombre
        ])

        @include('forms-partials.input-form', [
        'columns' => 'col-12 col-md-6',
        'validar' => True,
        'name' => 'apellido',
        'placeholder'=>'Introduce tu apellido',
        'max' => 155,
        'type' => 'text',
        'attrModel' => $usuario->apellido
        ])

        @include('forms-partials.input-form', [
        'columns' => 'col-12 col-md-4',
        'validar' => False,
        'name' => 'cedula',
        'placeholder'=>'Introduce tu cédula',
        'max' => 8,
        'type' => 'text',
        'attrModel' => $usuario->cedula
        ])
        @include('forms-partials.input-form', [
        'columns' => 'col-12 col-md-8',
        'validar' => False,
        'name' => 'correo',
        'placeholder'=>'Introduce tu correo',
        'max' => 255,
        'type' => 'email',
        'attrModel' => $usuario->correo
        ])





        @if ($showPassword)

        @include('forms-partials.input-form', [
        'columns' => 'col-12 col-md-4',
        'validar' => True,
        'name' => 'nickname',
        'placeholder'=>'Introduce tu nickname',
        'max' => 100,
        'type' => 'text',
        'attrModel' => $usuario->nickname
        ])

            @include('forms-partials.input-form', [
            'columns' => 'col-12 col-md-4',
            'validar' => True,
            'name' => 'password',
            'placeholder'=>'Introduce tu contraseña',
            'max' => 255,
            'type' => 'password',
            'attrModel' => $usuario->password
            ])
            @else

            @include('forms-partials.input-form', [
        'columns' => 'col-12 col-md-8',
        'validar' => True,
        'name' => 'nickname',
        'placeholder'=>'Introduce tu nickname',
        'max' => 100,
        'type' => 'text',
        'attrModel' => $usuario->nickname
        ])
        @endif



        <div class="col-12 col-md-4 form-group">
            <label for="rol_id" class="@error('rol_id') text-danger @enderror">Rol*</label>
            <select name="rol_id" id="rol_id" class="form-control validarInput" required value="{{ old('rol_id') }}">
                @forelse($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                @empty
                    <option value="">No existen roles</option>
                @endforelse
            </select>
            <small class="form-text text-muted"> Rol del usuario </small>
        </div>

        @if($showPassword)
        <div class="col-12 form-group">
            <label for="imagen_usu" class="@error('imagen') text-danger @enderror">Imagen del
                usuario*</label>
            <div class="custom-file ">

                <input type="file" name="imagen" id="imagen_usu" class="custom-file-input validarInput"
                    id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile" id="imagen_usu_label">Elige
                    una
                    imagen *</label>

                <small class="form-text  @error('imagen') invalid-feedback @else text-muted @enderror">
                    @error('imagen')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @else
                        Seleccione una imagen
                    @enderror
                </small>


            </div>

        </div>
        @endif

        <div class="col-12 form-group">

            <img src="@if($usuario->imagen) {{ config('app.url').'/public/images/thumbnails/'.$usuario->imagen }} @endif" class="rounded imagen-presubida imagenesPresubida"
                id="imagen-previsualizar" data-toggle="modal" data-target="#imagenPresubida">
        </div>

        <div class="col-12 form-group text-center mb-5">
            <button class="btn btn-caritas" type="submit">
                {{ $nombreButton }}
            </button>
        </div>

    </div>
</form>
