<?php
/**
 * Created by PhpStorm.
 * User: Hussein Reda
 * Date: 4/30/2019
 * Time: 2:18 PM
 */

namespace App\DesignPatterns\Strategy;
use http\Env\Request;
use Illuminate\Support\Facades\DB;


class searchByRegion implements strategySearch
{
    public function search($request)
    {
        $ws = DB::table('work_spaces')
            ->where('work_spaces.ws_city_id',$request->city_id)
            ->where('work_spaces.region_id',$request->region_id)
            ->join('images','work_spaces.ws_id','images.work_space_id')
            ->select('work_spaces.ws_id','work_spaces.ws_name','work_spaces.description','images.img_url')->get();
        return $ws ;
    }

}
