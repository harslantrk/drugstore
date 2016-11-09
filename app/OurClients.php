<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurClients extends Model
{
    protected $table="emc_our_clients";
     protected $fillabled = [
    	'name', 'comment','position','image','slug','status','priority',
    ];
}
