<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoUsuario
 * @package App\Models
 * @version June 1, 2018, 3:30 pm UTC
 *
 * @property string nombre
 */
class TipoUsuario extends Model
{
    use SoftDeletes;

    public $table = 'tipo_usuarios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    
}
