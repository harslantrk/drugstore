<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'user_id','title','start_time','end_time'
    ];
}
