<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tablero
 *
 * @property $id
 * @property $descripcion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tablero extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','estado'];



}
