<table class="table table-responsive" id="observacions-table">
    <thead>
        <tr>
            <th>Tipotutoria</th>
        <th>Inquietudessolucionadas</th>
        <th>Tratodeltutor</th>
        <th>Tiemposuficiente</th>
        <th>Tutoriadaherramientas</th>
        <th>Tutor Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($observacions as $observacion)
        <tr>
            <td>{!! $observacion->tipoTutoria !!}</td>
            <td>{!! $observacion->inquietudesSolucionadas !!}</td>
            <td>{!! $observacion->tratoDelTutor !!}</td>
            <td>{!! $observacion->tiempoSuficiente !!}</td>
            <td>{!! $observacion->tutoriaDaHerramientas !!}</td>
            <td>{!! $observacion->tutor_id !!}</td>
            <td>
                {!! Form::open(['route' => ['observacions.destroy', $observacion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('observacions.show', [$observacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('observacions.edit', [$observacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>