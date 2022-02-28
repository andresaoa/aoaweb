<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nav
 *
 * @property $id
 * @property $img_logo
 * @property $text_logo
 * @property $item1
 * @property $item2
 * @property $item3
 * @property $item4
 * @property $dashboard
 * @property $profile
 * @property $login
 * @property $register
 * @property $logout
 * @property $color
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Nav extends Model
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
    protected $fillable = ['img_logo','text_logo','item1','item2','item3','item4','dashboard','profile','login','register','logout','color'];



}
