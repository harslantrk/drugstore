<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    //

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="emc_modules";
    protected $fillable = [
        'id','name','url','parent_id','priority','status',
    ];

}
