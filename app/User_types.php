<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_types extends Model
{
    protected $table = 'user_types';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name',
    ];
}