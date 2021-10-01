<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Operacione
 *
 * @property $id
 * @property $idcatalogo
 * @property $idtablero
 * @property $iduser
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Operacione extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idcatalogo','idtablero','iduser'];

}
