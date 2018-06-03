<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Carrera Field -->
<div class="form-group col-sm-6">
    {!! Form::label('carrera', 'Carrera:') !!}
    {!! Form::text('carrera', null, ['class' => 'form-control']) !!}
</div>

<!-- Semestre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('semestre', 'Semestre:') !!}
    {!! Form::text('semestre', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo', 'Correo:') !!}
    {!! Form::text('correo', null, ['class' => 'form-control']) !!}
</div>

<!-- Contrasena Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contrasena', 'Contrasena:') !!}
    {!! Form::text('contrasena', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Usuario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_usuario_id', 'Tipo Usuario Id:') !!}
    {!! Form::number('tipo_usuario_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('usuarios.index') !!}" class="btn btn-default">Cancel</a>
</div>
