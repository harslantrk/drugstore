<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "emc_categories";
    protected $fillable = [
        'title', 'type', 'description', 'access', 'parent', 'priority', 'status', 'gallery_id',
    ];
}
