<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supports extends Model
{
    protected $fillable = [
        'title', 'user_id',
    ];
}
