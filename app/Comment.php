<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "emc_comments";
    protected $fillable = [
        'user_id', 'type_id', 'comment', 'status',  'type',
    ];
}
