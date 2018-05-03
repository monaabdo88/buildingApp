<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    //
    protected $table = "site_settings";
    protected $fillable = [
        'slug','namesetting','value','type'
    ];
}
