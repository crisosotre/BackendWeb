<?php

namespace App\Repositories;

use App\Models\TipoUsuario;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoUsuarioRepository
 * @package App\Repositories
 * @version June 1, 2018, 3:30 pm UTC
 *
 * @method TipoUsuario findWithoutFail($id, $columns = ['*'])
 * @method TipoUsuario find($id, $columns = ['*'])
 * @method TipoUsuario first($columns = ['*'])
*/
class TipoUsuarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TipoUsuario::class;
    }
}
