<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use App\work_space ;
use App\phone_number ;
use Illuminate\Support\Facades\Storage;
use Validator;
use Auth;
class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
//        $owner = DB::table('users')
//                ->where('id',$id)
//                ->select('name')->get();
        return view('OwnerPanel.placeData',['id'=>$id]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCities()
    {
        $city = DB::table('city')->select('city_id','city_name')->get();
        return $city ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function requestRegion($id)
    {
        $regions = DB::table('regions')
                    ->where('city_id',$id)
                    ->get();
        return $regions ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner_info = DB::table('users')
                            ->where('id',$id)->get();
         return view('ownerPanel', ['user_name' =>$owner_info[0]->user_name]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storePlace(Request $request)
    {
        /*
        $work_space = new work_space([
            'user_id' => $request->get('owner_id'),
            'ws_name' => $request->get('name'),
            'ws_address'=> $request->get('address'),
            
            'ws_city_id'=>$request->get('city'),
            'region_id' => $request->get('region'),
            'website' => $request->get('websiteURL'),
             'description' => $request->get('desc'),
            'user_role'=> 1 ,
          ]);
          $work_space->save();
           */ 

          DB::table('work_space')->insert([
            'ws_name' =>$request->name, 
            'user_id' => $request->owner_id,
            'ws_address' => $request->address,
           
            'ws_city_id' => $request->city,
            'region_id' => $request->region,
            'website' => $request->websiteURL,
            'description' => $request->desc,
            'user_role'=> 1 ,
          ]);
         
          return $true;
          

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
