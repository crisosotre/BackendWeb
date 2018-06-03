<table class="table table-responsive" id="asistencias-table">
    <thead>
        <tr>
            <th>Fecha</th>
        <th>Numestudiantes</th>
        <th>Tipotutoria</th>
        <th>Tipotexto</th>
        <th>Generodiscursivo</th>
        <th>Programaacademico</th>
        <th>Tutor Id</th>
        <th>Estudiante Id</th>
        <th>Materia Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($asistencias as $asistencia)
        <tr>
            <td>{!! $asistencia->fecha !!}</td>
            <td>{!! $asistencia->numEstudiantes !!}</td>
            <td>{!! $asistencia->tipoTutoria !!}</td>
            <td>{!! $asistencia->tipoTexto !!}</td>
            <td>{!! $asistencia->generoDiscursivo !!}</td>
            <td>{!! $asistencia->programaAcademico !!}</td>
            <td>{!! $asistencia->tutor_id !!}</td>
            <td>{!! $asistencia->estudiante_id !!}</td>
            <td>{!! $asistencia->materia_id !!}</td>
            <td>
                {!! Form::open(['route' => ['asistencias.destroy', $asistencia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asistencias.show', [$asistencia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asistencias.edit', [$asistencia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>