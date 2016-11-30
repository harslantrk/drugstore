<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $fillable = [
        'status','name','tc_no','phone','birthdate','street','district','city','apartment','post_code','school_name','class','educational','detail','social_insurance','parent_tc','parent_name','parent_phone','parent_kinship','report_type'
    ];
}
