<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "settings";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon', 'logo', 'name', 'web_site', 'email', 'phone', 'fax', 'address', 'facebook', 'twitter', 'instagram', 'google_plus', 'youtube', 'latitude', 'longitude', 'analytics_code',
    ];
}
