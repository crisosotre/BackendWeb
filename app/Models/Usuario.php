<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Usuario
 * @package App\Models
 * @version June 1, 2018, 3:51 pm UTC
 *
 * @property string nombre
 * @property string codigo
 * @property string carrera
 * @property string semestre
 * @property string correo
 * @property string contrasena
 * @property integer tipo_usuario_id
 */
class Usuario extends Model
{
    use SoftDeletes;

    public $table = 'usuarios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'codigo',
        'carrera',
        'semestre',
        'correo',
        'contrasena',
        'tipo_usuario_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'codigo' => 'string',
        'carrera' => 'string',
        'semestre' => 'string',
        'correo' => 'string',
        'contrasena' => 'string',
        'tipo_usuario_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function tipo_usuario(){
        return $this->hasOne('App\Models\TipoUsuario');
    }
    
}
