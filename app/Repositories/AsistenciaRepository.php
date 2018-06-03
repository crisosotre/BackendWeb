<?php

namespace App\Repositories;

use App\Models\Asistencia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsistenciaRepository
 * @package App\Repositories
 * @version June 1, 2018, 4:00 pm UTC
 *
 * @method Asistencia findWithoutFail($id, $columns = ['*'])
 * @method Asistencia find($id, $columns = ['*'])
 * @method Asistencia first($columns = ['*'])
*/
class AsistenciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'numEstudiantes',
        'tipoTutoria',
        'tipoTexto',
        'generoDiscursivo',
        'programaAcademico',
        'tutor_id',
        'estudiante_id',
        'materia_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Asistencia::class;
    }
}
