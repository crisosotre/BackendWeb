<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Numestudiantes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numEstudiantes', 'Numestudiantes:') !!}
    {!! Form::number('numEstudiantes', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipotutoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoTutoria', 'Tipotutoria:') !!}
    {!! Form::text('tipoTutoria', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipotexto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoTexto', 'Tipotexto:') !!}
    {!! Form::text('tipoTexto', null, ['class' => 'form-control']) !!}
</div>

<!-- Generodiscursivo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('generoDiscursivo', 'Generodiscursivo:') !!}
    {!! Form::text('generoDiscursivo', null, ['class' => 'form-control']) !!}
</div>

<!-- Programaacademico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('programaAcademico', 'Programaacademico:') !!}
    {!! Form::text('programaAcademico', null, ['class' => 'form-control']) !!}
</div>

<!-- Tutor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tutor_id', 'Tutor Id:') !!}
    {!! Form::number('tutor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estudiante Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estudiante_id', 'Estudiante Id:') !!}
    {!! Form::number('estudiante_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Materia Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('materia_id', 'Materia Id:') !!}
    {!! Form::number('materia_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('asistencias.index') !!}" class="btn btn-default">Cancel</a>
</div>
