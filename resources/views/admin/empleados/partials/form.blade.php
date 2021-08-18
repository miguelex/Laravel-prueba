<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' =>'form-control', 'placeholder' => 'Introduzca el nombre del empleado']) !!}
    @error('nombre')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('apellidos', 'Apellidos') !!}
    {!! Form::text('apellidos', null, ['class' =>'form-control', 'placeholder' => 'Introduzca los apellidos del empleado']) !!}
    @error('apellidos')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('dni', 'DNI') !!}
    {!! Form::text('dni', null, ['class' =>'form-control', 'placeholder' => 'Introduzca el DNI/NIE del empleado']) !!}
    @error('dni')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('fecha', 'Fecha de nacimiento') !!}
    {!! Form::date('fecha', null, ['class' =>'form-control']) !!}
    @error('fecha')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('codigoPostal', 'Código Postal') !!}
    {!! Form::number('codigoPostal', null, ['class' =>'form-control']) !!}
    @error('codigoPostal')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('ciudad', 'Ciudad') !!}
    {!! Form::select('ciudad', $ciudades, null, ['class' => 'form-control']) !!}
    @error('ciudad')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('direccion', 'Dirección') !!}
    {!! Form::text('direccion', null, ['class' =>'form-control', 'placeholder' => 'Introduzca el nombre del empleado']) !!}
    @error('direccion')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('situacion', 'Situación') !!}
    {!! Form::select('situacion', $situaciones, null, ['class' => 'form-control']) !!}
    @error('situacion')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
