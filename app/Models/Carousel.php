<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carousel
 *
 * @property $id
 * @property $name
 * @property $img
 * @property $selected
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carousel extends Model
{
    
    static $rules = [
		'name' => 'required',
		'img' => 'required',
		'selected' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','img','selected'];



}
