<?php
/**
 * Created by PhpStorm.
 * User: Hussein Reda
 * Date: 4/30/2019
 * Time: 2:17 PM
 */

namespace App\DesignPatterns\Strategy;
use Illuminate\Support\Facades\DB;

class searchByName implements strategySearch
{
    private static $obj;

    private final function  __construct() {
    }

    public function search($request){

        $ws = DB::table('work_spaces')
            ->where('work_spaces.ws_name','like','%'.$request.'%')
            ->join('images','work_spaces.ws_id','images.work_space_id')
            ->select('work_spaces.ws_id','work_spaces.ws_name','work_spaces.description','images.img_url')->get();
        return $ws ;
    }


    public static function getInstance() {
        if(!isset(self::$obj)) {
            self::$obj = new searchByName();
        }
        return self::$obj;
    }

}





