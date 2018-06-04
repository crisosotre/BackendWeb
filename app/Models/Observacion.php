<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Observacion
 * @package App\Models
 * @version June 4, 2018, 7:00 am UTC
 *
 * @property string tipoTutoria
 * @property integer inquietudesSolucionadas
 * @property integer tratoDelTutor
 * @property integer tiempoSuficiente
 * @property integer tutoriaDaHerramientas
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
        'tutor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipoTutoria' => 'string',
        'inquietudesSolucionadas' => 'integer',
        'tratoDelTutor' => 'integer',
        'tiempoSuficiente' => 'integer',
        'tutoriaDaHerramientas' => 'integer',
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
