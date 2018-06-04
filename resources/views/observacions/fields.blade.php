<!-- Tipotutoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoTutoria', 'Tipotutoria:') !!}
    {!! Form::text('tipoTutoria', null, ['class' => 'form-control']) !!}
</div>

<!-- Inquietudessolucionadas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inquietudesSolucionadas', 'Inquietudessolucionadas:') !!}
    {!! Form::number('inquietudesSolucionadas', null, ['class' => 'form-control']) !!}
</div>

<!-- Tratodeltutor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tratoDelTutor', 'Tratodeltutor:') !!}
    {!! Form::number('tratoDelTutor', null, ['class' => 'form-control']) !!}
</div>

<!-- Tiemposuficiente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tiempoSuficiente', 'Tiemposuficiente:') !!}
    {!! Form::number('tiempoSuficiente', null, ['class' => 'form-control']) !!}
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
