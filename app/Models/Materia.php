<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Materia
 * @package App\Models
 * @version June 1, 2018, 3:53 pm UTC
 *
 * @property string nombre
 * @property string profesor
 * @property string tipoCurso
 */
class Materia extends Model
{
    use SoftDeletes;

    public $table = 'materias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'profesor',
        'tipoCurso'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'profesor' => 'string',
        'tipoCurso' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function asistencias(){
        return $this->hasMany('App\Models\Asistencia');
    }
}
