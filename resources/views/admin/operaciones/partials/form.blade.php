<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('tipo', null, ['class' =>'form-control', 'placeholder' => 'Introduzca el nombre de la operación']) !!}
    @error('tipo')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
