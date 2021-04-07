<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' =>'form-control', 'placeholder' => 'Introduzca el nombre del permiso']) !!}
    @error('name')
        <small class="text-danger">
            {{ $message }}<br>
        </small>
    @enderror
    {!! Form::label('name', 'Descripción') !!}
    {!! Form::text('description', null, ['class' =>'form-control', 'placeholder' => 'Introduzca la descripción del permiso']) !!}
    @error('description')
        <small class="text-danger">
            {{ $message }}<br>
        </small>
    @enderror
</div>
