<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('tipo', null, ['class' =>'form-control', 'placeholder' => 'Introduzca el nombre de la nueva situación']) !!}
    @error('name')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
