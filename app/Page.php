<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = "emc_page";
    protected $fillable = [
        'title', 'slug', 'description', 'content', 'keyword', 'priority', 'status', 'gallery_id', 'cat_id', 'parent',
    ];
}
