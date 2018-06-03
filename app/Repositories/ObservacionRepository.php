<?php

namespace App\Repositories;

use App\Models\Observacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ObservacionRepository
 * @package App\Repositories
 * @version June 3, 2018, 11:38 pm UTC
 *
 * @method Observacion findWithoutFail($id, $columns = ['*'])
 * @method Observacion find($id, $columns = ['*'])
 * @method Observacion first($columns = ['*'])
*/
class ObservacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipoTutoria',
        'tiempoSuficiente',
        'tutoriaDaHerramientas',
        'tutor_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Observacion::class;
    }
}
