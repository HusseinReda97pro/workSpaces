<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class work_space extends Model
{
    protected $fillable = [
        'ws_id','user_id', 'ws_name', 'ws_address', 'ws_phone_id','ws_city_id','ws_img_id','region_id','website', 'description',
    ];
}
