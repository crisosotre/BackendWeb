<table class="table table-responsive" id="tipoUsuarios-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoUsuarios as $tipoUsuario)
        <tr>
            <td>{!! $tipoUsuario->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoUsuarios.destroy', $tipoUsuario->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoUsuarios.show', [$tipoUsuario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tipoUsuarios.edit', [$tipoUsuario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>