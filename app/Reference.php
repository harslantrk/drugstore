<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table="emc_reference";
     protected $fillabled = [
    	'name', 'link','image','status','priority'
    ];
}
