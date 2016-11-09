<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table="emc_contacts";
    protected $fillable = [
        'subject','email','phone','message','status','read',
    ];
}
