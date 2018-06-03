<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Asistencia
 * @package App\Models
 * @version June 1, 2018, 4:00 pm UTC
 *
 * @property date fecha
 * @property integer numEstudiantes
 * @property string tipoTutoria
 * @property string tipoTexto
 * @property string generoDiscursivo
 * @property string programaAcademico
 * @property integer tutor_id
 * @property integer estudiante_id
 * @property integer materia_id
 */
class Asistencia extends Model
{
    use SoftDeletes;

    public $table = 'asistencias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'date',
        'numEstudiantes' => 'integer',
        'tipoTutoria' => 'string',
        'tipoTexto' => 'string',
        'generoDiscursivo' => 'string',
        'programaAcademico' => 'string',
        'tutor_id' => 'integer',
        'estudiante_id' => 'integer',
        'materia_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function usuarios(){
        return $this->hasMany('App\Models\Usuario');
    }
    
    public function materia(){
        return $this->hasOne('App\Models\Materia');
    }
}
