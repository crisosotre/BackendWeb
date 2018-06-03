<table class="table table-responsive" id="usuarios-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Codigo</th>
        <th>Carrera</th>
        <th>Semestre</th>
        <th>Correo</th>
        <th>Contrasena</th>
        <th>Tipo Usuario Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{!! $usuario->nombre !!}</td>
            <td>{!! $usuario->codigo !!}</td>
            <td>{!! $usuario->carrera !!}</td>
            <td>{!! $usuario->semestre !!}</td>
            <td>{!! $usuario->correo !!}</td>
            <td>{!! $usuario->contrasena !!}</td>
            <td>{!! $usuario->tipo_usuario_id !!}</td>
            <td>
                {!! Form::open(['route' => ['usuarios.destroy', $usuario->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('usuarios.show', [$usuario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('usuarios.edit', [$usuario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>