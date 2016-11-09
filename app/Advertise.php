<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $table = "advertises";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'page_id', 'layout', 'image', 'title', 'content', 'slug', 'display', 'status',
    ];
}
