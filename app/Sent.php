<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sent extends Model
{
     protected $fillable = [
        'sender_id','receiver_id','title', 'description',
    ];
}
