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

           $space_id = DB::table('work_spaces')->insertGetId([
            'ws_name' =>$request->name,
            'user_id' => $request->owner_id,
            'ws_address' => $request->address,
            'ws_city_id' => $request->city,
            'region_id' => $request->region,
            'website' => $request->websiteURL,
            'description' => $request->desc
          ]);
           DB::table('phone_numbers')->insert([

               'phone_number' => $request->phone,
               'work_space_id' => $space_id,
           ]);
        DB::table('phone_numbers')->insert([

            'phone_number' => $request->phone2,
            'work_space_id' => $space_id,
        ]);
        $image = $request->image;
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'WSimage/'.'ws-'.time().'.'.'jpeg';
        \File::put(public_path().'/'.$imageName, base64_decode($image));
        DB::table('images')->insert([
            'img_url' => $imageName,
            'work_space_id' => $space_id,
        ]);
        return 1 ;

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

    public  function showPayment(){

        $Payments = DB::table('payments')->get();
        return view('OwnerPanel.showPayment',['payments'=>$Payments]) ;

    }
}
