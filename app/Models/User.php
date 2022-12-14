<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    public $timestamps = FALSE;

    const NAME = 'name';

    protected $fillable = [
        self::NAME,
    ];
}
