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


            ->where('users.state','=',0)
            ->where('users.activate','=',0)
            ->select('users.id','users.user_name','users.user_phone','users.email','users.created_at','users.state','users.activate','users.commercial_register')
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

            //  $this->sendAcceptMail();
            // return $true ;

            $user = DB::table('users')
                ->where('id', $id)->select('email','password')->get();

            $data = array(
                'email' => $user[0]->email,
                'password' => $user[0]->password
            );

            Mail::send('mail.mailSend', $data , function ($message) use($data) {
                $message->from('mm4041156@gmail.com','Workspace Support');
                $message->to($data['email'],'Workspace Owner');
                $message->subject('Accept Workspace');
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
        DB::table('users')->where('id', $id)->delete();
        return 1 ;
    }
//    public function sendAcceptMail(){
//        Mail::to('pro.hussein.reda@gmail.com')->send(new sendMail(1));
//    }
//    public function sendRejectedMail(){
//        Mail::to('pro.hussein.reda@gmail.com')->send(new sendMail(0));
//    }
    public function addPayment(Request $request){
        DB::table('payments')->insert(
            [   'Bank_Name' => $request->Bank_Name ,
                'Bank_Account' => $request->Bank_Account,
                'Bank_Number'=>$request->Bank_Number,
                'Swift_Code' => $request->Swift_Code

            ]
        );

        return redirect()->to('/addPayment') ;

    }
    public  function  test(){

        Mail::send('mail.mailReservation', ["Hi","Hi"], function ($message) {
            $message->from('mm4041156@gmail.com');
            $message->to("pro.hussein.reda@gmail.com");
            $message->subject('Title...');
        });
    }
}

