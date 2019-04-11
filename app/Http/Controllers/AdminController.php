<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use Illuminate\Http\Request;
use DB ;
use Illuminate\Support\Facades\Mail;


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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
             $this->sendAcceptMail();
            return $true ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRequest($id)
    {
        DB::table('users')->where('id', $id)->delete();
        $this->sendRejectedMail();
        return redirect()->to('/RequestsData');
    }
    public function sendAcceptMail(){
        Mail::to('pro.hussein.reda@gmail.com')->send(new sendMail(1));
    }
    public function sendRejectedMail(){
        Mail::to('pro.hussein.reda@gmail.com')->send(new sendMail(0));
    }
}
