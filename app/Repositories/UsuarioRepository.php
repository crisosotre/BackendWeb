<?php

namespace App\Repositories;

use App\Models\Usuario;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UsuarioRepository
 * @package App\Repositories
 * @version June 1, 2018, 3:51 pm UTC
 *
 * @method Usuario findWithoutFail($id, $columns = ['*'])
 * @method Usuario find($id, $columns = ['*'])
 * @method Usuario first($columns = ['*'])
*/
class UsuarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'codigo',
        'carrera',
        'semestre',
        'correo',
        'contrasena',
        'tipo_usuario_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Usuario::class;
    }
}
