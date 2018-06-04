<?php

namespace App\Repositories;

use App\Models\Observacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ObservacionRepository
 * @package App\Repositories
 * @version June 4, 2018, 7:10 am UTC
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
        'inquietudesSolucionadas',
        'tratoDelTutor',
        'tiempoSuficiente',
        'tutoriaDaHerramientas',
        'comentarios',
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
