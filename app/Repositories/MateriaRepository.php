<?php

namespace App\Repositories;

use App\Models\Materia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MateriaRepository
 * @package App\Repositories
 * @version June 1, 2018, 3:53 pm UTC
 *
 * @method Materia findWithoutFail($id, $columns = ['*'])
 * @method Materia find($id, $columns = ['*'])
 * @method Materia first($columns = ['*'])
*/
class MateriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'profesor',
        'tipoCurso'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Materia::class;
    }
}
