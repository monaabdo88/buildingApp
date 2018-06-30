<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bu extends Model
{
    //
    protected $table = 'bu';
    protected $fillable = [
        'bu_name',
        'bu_price',
        'bu_rent',
        'bu_square',
        'bu_type',
        'bu_small_disc',
        'bu_meta',
        'bu_langtuide',
        'bu_latituide',
        'bu_large_disc',
        'bu_status',
        'user_id',
        'rooms_num',
        'bath_num',
        'bu_place',
        'image',
        'month',
        'year'
    ];
}
