<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    <div class="input-group mb-3">
        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
               value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>
        @if($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
</div>
{!! Form::label('name', 'Correo electrónico') !!}
<div class="input-group mb-3">
    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
           value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
        </div>
    </div>
    @if($errors->has('email'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('name', 'Password') !!}
    <div class="input-group mb-3">
        <input type="password" name="password"
               class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
               placeholder="{{ __('adminlte::adminlte.password') }}">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>
        @if($errors->has('password'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'Repetir password') !!}
    <div class="input-group mb-3">
        <input type="password" name="password_confirmation"
               class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
               placeholder="{{ __('adminlte::adminlte.retype_password') }}">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>
        @if($errors->has('password_confirmation'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </div>
        @endif
    </div>
</div>
