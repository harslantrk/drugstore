<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table = 'receipt';
    protected $fillable = [
        'patient_id','report_id','start_date','finish_date','quantity','unit_price','sum','total','detail'
    ];
}
