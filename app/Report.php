<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable =[
      'patient_id','report_type','start_date','finish_date','report_no'
    ];
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
