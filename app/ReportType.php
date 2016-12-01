<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    protected $table = 'reports_type';
    protected $fillable =[
        'report_type'
    ];
}
