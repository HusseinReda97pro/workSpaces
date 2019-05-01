<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use mysql_xdevapi\Exception;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_requests = DB::table('users')

            ->select('users.id','users.user_name','users.user_phone','users.email','users.created_at','users.state','users.activate')
            ->where('users.state','=',0)
            ->where('users.activate','=',0)
            ->orderby('created_at','desc')->get() ;
        return $user_requests;
    }
    public function showpendingRequests()
    {

        $user_requests = DB::table('users')

            ->select('users.id','users.user_role','users.user_name','users.user_phone','users.email','users.created_at','users.state','users.activate')
            ->where('users.state','=',1)
            ->where('users.user_role','!=',0)
            ->orderby('created_at','desc')->get() ;

        return $user_requests;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function city(Request $request)
    {
       DB::table('city')->insert(
            ['city_name' => $request->city_name]
        );
        $region = DB::table('city')->where('city_name', $request->city_name)->get();
        DB::table('regions')->insert(
            ['region_name' => $request->region_name ,'city_id' => $region[0]->city_id]
        );
        return $region;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showCity()
    {
        $cities = DB::table('regions')
            ->join('city','regions.city_id','city.city_id')
            ->select('regions.region_name','city.*')
            ->get();
        return $cities ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function region(Request $request)
    {
        DB::table('regions')->insert(
            ['region_name' => $request->region_name , 'city_id' => $request->city_id]
        );
        return 1 ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUserActivate($id)
    {
        //
        $user = User::find($id);
        //
        //$final = $input->only([''])
        //
        if($user['activate'] == 0) {
            $user['activate'] = 1 ;
        }else {
            $user['activate'] = 0 ;
        }


        $user->save() ;

        return $user ;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateState(Request $request, $id)
    {

        $true = DB::table('users')
            ->where('id', $id)
            ->update(['state' => 1]);

            $user_pass = DB::table('users')
                ->where('id', $request[id])->select('password')->get();
        fwrite(STDOUT, $user_pass . "\n");
           $user_email = DB::table('users')
                ->where('id', $request[id])->select('email')->get();
        fwrite(STDOUT, $user_email . "\n");

            Mail::send('emails.mailSend', $user_pass, function ($message) {
                $message->from('mm4041156@gmail.com');
                $message->to('husseinayman2@fci.helwan.edu.eg');
                $message->subject('accept...');
            });

        return $true;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public  function  deleteCity($id) {
        DB::table('city')->where('city_id', $id)->delete();
        $true =  DB::table('regions')->where('city_id', $id)->delete();
        return $true;

    }
    public function deleteRegion($region_name){
        $true =  DB::table('regions')->where('region_name', $region_name)->delete();
        return $true;
    }
    public function deleteRequest($id)
    {
        $true = DB::table('users')->where('id', $id)->delete();
        $this->sendRejectedMail();
        return $true ;
    }
//    public function sendAcceptMail(){
//        Mail::to('pro.hussein.reda@gmail.com')->send(new sendMail(1));
//    }
//    public function sendRejectedMail(){
//        Mail::to('pro.hussein.reda@gmail.com')->send(new sendMail(0));
//    }
    public function addPayment(Request $request){
        DB::table('Payments')->insert(
            [   'Bank_Name' => $request->Bank_Name ,
                'Bank_Account' => $request->Bank_Account,
                'Bank_Number'=>$request->Bank_Number,
                'Swift_Code' => $request->Swift_Code

            ]
        );

        return redirect("/addPayment") ;

    }
}
