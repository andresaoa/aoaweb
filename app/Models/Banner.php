<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Banner
 *
 * @property $id
 * @property $url_left
 * @property $img_left
 * @property $url_right
 * @property $img_right
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Banner extends Model
{
    
    static $rules = [
		'url_left' => 'required',
		'img_left' => 'required',
		'url_right' => 'required',
		'img_right' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['url_left','img_left','url_right','img_right'];



}
