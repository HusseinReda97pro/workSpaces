<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
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
    public function searchWorkspaceRegion(Request $request)
    {
        $ws = DB::table('work_spaces')
            ->where('work_spaces.ws_city_id',$request->city_id)
            ->where('work_spaces.region_id',$request->region_id)
            ->join('images','work_spaces.ws_id','images.work_space_id')
            ->select('work_spaces.ws_id','work_spaces.ws_name','work_spaces.description','images.img_url')->get();
        return $ws ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchWorkspaceName($name)
    {
        $ws = DB::table('work_spaces')
            ->where('work_spaces.ws_name','like','%'.$name.'%')
            ->join('images','work_spaces.ws_id','images.work_space_id')
            ->select('work_spaces.ws_id','work_spaces.ws_name','work_spaces.description','images.img_url')->get();
        return $ws ;
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
