<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public $timestamps = FALSE;

    const IP         = 'ip';
    const TYPE       = 'type';
    const CREATED_AT = 'created_at';

    protected $fillable = [
        self::IP,
        self::TYPE,
        self::CREATED_AT,
    ];
}
