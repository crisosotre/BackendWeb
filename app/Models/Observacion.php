<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Observacion
 * @package App\Models
 * @version June 3, 2018, 11:38 pm UTC
 *
 * @property string tipoTutoria
 * @property string tiempoSuficiente
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
        'tiempoSuficiente' => 'string',
        'tutoriaDaHerramientas' => 'integer',
        'tutor_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipoTutoria' => 'resolvioInquietudes string text',
        'tiempoSuficiente' => 'tratoTutor integer number'
    ];

    
}
