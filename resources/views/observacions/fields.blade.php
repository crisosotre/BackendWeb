<!-- Tipotutoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoTutoria', 'Tipotutoria:') !!}
    {!! Form::text('tipoTutoria', null, ['class' => 'form-control']) !!}
</div>

<!-- Tiemposuficiente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tiempoSuficiente', 'Tiemposuficiente:') !!}
    {!! Form::text('tiempoSuficiente', null, ['class' => 'form-control']) !!}
</div>

<!-- Tutoriadaherramientas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tutoriaDaHerramientas', 'Tutoriadaherramientas:') !!}
    {!! Form::number('tutoriaDaHerramientas', null, ['class' => 'form-control']) !!}
</div>

<!-- Tutor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tutor_id', 'Tutor Id:') !!}
    {!! Form::number('tutor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('observacions.index') !!}" class="btn btn-default">Cancel</a>
</div>