<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Marquee
 *
 * @property $id
 * @property $color
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Marquee extends Model
{
    
    static $rules = [
		'color' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['color'];



}
