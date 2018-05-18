<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'food';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id',
    ];
}
