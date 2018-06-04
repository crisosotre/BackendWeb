<li class="{{ Request::is('tipoUsuarios*') ? 'active' : '' }}">
    <a href="{!! route('tipoUsuarios.index') !!}"><i class="fa fa-edit"></i><span>Tipo Usuarios</span></a>
</li>




<li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
    <a href="{!! route('usuarios.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

<li class="{{ Request::is('materias*') ? 'active' : '' }}">
    <a href="{!! route('materias.index') !!}"><i class="fa fa-edit"></i><span>Materias</span></a>
</li>

<li class="{{ Request::is('asistencias*') ? 'active' : '' }}">
    <a href="{!! route('asistencias.index') !!}"><i class="fa fa-edit"></i><span>Asistencias</span></a>
</li>



<li class="{{ Request::is('observacions*') ? 'active' : '' }}">
    <a href="{!! route('observacions.index') !!}"><i class="fa fa-edit"></i><span>Observacions</span></a>
</li>

