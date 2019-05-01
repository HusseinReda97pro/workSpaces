<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Strategy\searchByName;
use App\DesignPatterns\Strategy\searchByRegion;
use App\DesignPatterns\Strategy\searchContext;
use Illuminate\Http\Request;
use DB ;
use Illuminate\Support\Facades\Mail;

class WorkSpacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getWorkspaces()
    {
        $ws = DB::table('work_spaces')
                ->join('images','work_spaces.ws_id','images.work_space_id')
                ->select('work_spaces.ws_id','work_spaces.ws_name','work_spaces.description','images.img_url')->get();
        return $ws ;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
// ده حسين مكركب الدنيا خالص
//    public function searchWorkspaceRegion(Request $request)
//    {
//        $ws = DB::table('work_spaces')
//            ->where('work_spaces.ws_city_id',$request->city_id)
//            ->where('work_spaces.region_id',$request->region_id)
//            ->join('images','work_spaces.ws_id','images.work_space_id')
//            ->select('work_spaces.ws_id','work_spaces.ws_name','work_spaces.description','images.img_url')->get();
//        return $ws ;
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function searchWorkspaceName($name)
//    {
//        $ws = DB::table('work_spaces')
//            ->where('work_spaces.ws_name','like','%'.$name.'%')
//            ->join('images','work_spaces.ws_id','images.work_space_id')
//            ->select('work_spaces.ws_id','work_spaces.ws_name','work_spaces.description','images.img_url')->get();
//        return $ws ;
//    }
    public function searchWorkspaceRegion(Request $request)
    {
        $context = new searchContext(searchByRegion::getInstance());
        return $context->doSearch($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//     كده هتاخد Request بقي
//   public function searchWorkspaceName($name)
    public function searchWorkspaceName(Request $request)

    {

        $context = new searchContext( searchByName::getInstance());

        return $context->doSearch($request);


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userSeeDetails(Request $request)
    {
        $workspaceData = DB::table('work_spaces')
            ->where('ws_id',$request->ws_id )
            ->join('phone_numbers','work_spaces.ws_id','=','phone_numbers.work_space_id')
            ->select('work_spaces.user_id','work_spaces.ws_name','work_spaces.ws_address','work_spaces.website','phone_numbers.phone_number')
            ->get() ;
        DB::table('customers')->insert([
           'cust_email' => $request->mail ,
            'ws_id' => $request->ws_id ,
            'owner_id' => $workspaceData[0]->user_id
        ]);
        $workspaceData = DB::table('work_spaces')
            ->where('ws_id',$request->ws_id )
            ->join('phone_numbers','work_spaces.ws_id','=','phone_numbers.work_space_id')
            ->select('work_spaces.ws_name','work_spaces.ws_address','work_spaces.website','phone_numbers.phone_number')
            ->get() ;

        $data = array("name"=>$workspaceData[0]->ws_name, "address"=>$workspaceData[0]->ws_address,
            "website"=>$workspaceData[0]->website , "mail"=>$request->mail);
//        return $data ;
//        array_merge($data , ['mail' => $request->mail]) ;


        Mail::send(['text'=>'mail.mailReservation'], $data , function($message)use ($data) {
            $message->to($data['mail'], 'Our Customer')->subject
            ('WorkSpace Details');
            $message->from('mm4041156@gmail.com','Workspace Support');
        });



        return 1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSeen($id)
    {
        $seen = DB::table('customers')
                ->where('owner_id',$id)->count();
        return $seen ;
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
