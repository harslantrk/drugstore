<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table="emc_slider";
    protected $fillable = [
        'title','subtitle','link','image','status','opacity','priority',
    ];
}
