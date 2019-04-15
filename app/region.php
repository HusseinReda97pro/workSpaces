<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    protected $table = 'regions';
    protected $primaryKey = 'region_id';
    protected $fillable = ['city_id', 'region_name'];



    public function city()
    {
        return $this->belongsTo('App\Http\Models\City', 'city_id');
    }
}
