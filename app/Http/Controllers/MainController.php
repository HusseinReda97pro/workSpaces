<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ; 
use App\User ;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    //
    function index()
    {
     return view('login');
    }
    function checklogin(Request $request)
    {

        $this->validate($request, [
        'email'   => 'required|email',
        'password'  => 'required|alphaNum'
        ]);

        $login = DB::table("users")
                    ->where('email',$request->email)
                    ->where('password',$request->password)
                    ->get() ; 
       
            
        if($login->isEmpty())
        {
            return back()->with('error', 'Wrong Login Details');
        }
        else
        {
            if($login[0]->user_role== 0) {
                return redirect()->to('/RequestsData');
            }elseif($login[0]->user_role == 1){
                return redirect()->to('/ownerPanel/'.$login[0]->id);
                // return redirect()->action(
                //     'OwnerController@show', ['id' => $login[0]->id]
                // );
                
                
            }
            else {
                return view('errorLogin');
            }
            return view('welcome');
        }

    }

    public function registrateOwner(Request $request)
    {
        if($request->hasFile('photo')) {
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            $path = $request->file('photo')->storeAs('public/images/', $fileNameToStore);
        } else {
            $path = 'public/images/noimage.jpg';
        }
        // dd($request->get('product_name'));
        $user = new User([
            'user_name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_phone'=> $request->get('user_phone'),
            'details'=> $request->get('details'),
            'password'=>mt_rand(1000, 9999),
            'commercial_register'=> str_replace("public", "storage", $path),
            'user_role'=> 1 ,            
          ]);
          $user->save();
          return view('registrated', ['user_name' =>$user->user_name]);
    }   
    function logout()
    {
     Auth::logout();
     return redirect('main');
    }
}

