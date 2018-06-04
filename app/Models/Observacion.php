<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Observacion
 * @package App\Models
 * @version June 4, 2018, 7:10 am UTC
 *
 * @property string tipoTutoria
 * @property string inquietudesSolucionadas
 * @property integer tratoDelTutor
 * @property string tiempoSuficiente
 * @property string tutoriaDaHerramientas
 * @property string comentarios
 * @property integer tutor_id
 */
class Observacion extends Model
{
    use SoftDeletes;

    public $table = 'observacions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tipoTutoria',
        'inquietudesSolucionadas',
        'tratoDelTutor',
        'tiempoSuficiente',
        'tutoriaDaHerramientas',
        'comentarios',
        'tutor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipoTutoria' => 'string',
        'inquietudesSolucionadas' => 'string',
        'tratoDelTutor' => 'integer',
        'tiempoSuficiente' => 'string',
        'tutoriaDaHerramientas' => 'string',
        'comentarios' => 'string',
        'tutor_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
