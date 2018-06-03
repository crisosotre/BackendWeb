<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $materia->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $materia->nombre !!}</p>
</div>

<!-- Profesor Field -->
<div class="form-group">
    {!! Form::label('profesor', 'Profesor:') !!}
    <p>{!! $materia->profesor !!}</p>
</div>

<!-- Tipocurso Field -->
<div class="form-group">
    {!! Form::label('tipoCurso', 'Tipocurso:') !!}
    <p>{!! $materia->tipoCurso !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $materia->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $materia->updated_at !!}</p>
</div>

