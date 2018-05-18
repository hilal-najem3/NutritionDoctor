<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prescriptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'details', 'user_id',
    ];
}
