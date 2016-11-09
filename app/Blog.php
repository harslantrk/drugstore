<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "emc_blog";
    protected $fillable = [
        'categories_id', 'gallery_id', 'name','slug', 'description', 'content', 'like_count', 'seen_count',  'comment_count', 'tags', 'status', 'priority', 'author',
    ];
}
