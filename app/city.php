<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = 'city';
    protected $primaryKey = 'city_id';
    protected $fillable = ['city_name'];



    public function region()
    {
        return $this->hasMany('App\Http\Models\Zone', 'zone_id');
    }
}
