<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $table = 'sms';
    protected $fillable = [
        'sms_detail','receiver','phone','issend','status'
    ];
}
