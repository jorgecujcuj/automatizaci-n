<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Img
 *
 * @property $id
 * @property $idtablero
 * @property $img
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Img extends Model
{
  
    static $rules = [
		'idtablero' => 'required',
		'img' => 'required|image|mimes:jpeg,png,svg|max:1024',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idtablero','img'];

}
