<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Profesor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profesor', 'Profesor:') !!}
    {!! Form::text('profesor', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipocurso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoCurso', 'Tipocurso:') !!}
    {!! Form::text('tipoCurso', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('materias.index') !!}" class="btn btn-default">Cancel</a>
</div>
