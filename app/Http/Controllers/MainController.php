<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use App\User ;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Validator;
use Auth;
class MainController extends Controller
{
    //
    function index()
    {
     return view('welcome');
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
                return redirect()->to('/showRequests');
            }elseif($login[0]->user_role == 1){
                $userInfo = $login[0]->commercial_register;
                return redirect()->to('/ownerPanel/'.$login[0]->id)->with('picture',$userInfo);
            }
            else{
                return view('errorLogin');
            }

            return view('welcome');
        }
    }


    function successlogin()
    {

     return view('successlogin');
    }

    function logout()
    {
     Auth::logout();
     return redirect()->to('/main');
    }

    public function registrateOwner(Request $request)
    {

        if($request->hasFile('photo')) {
//            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
//            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
//            $extention = $request->file('photo')->getClientOriginalExtension();
//            $fileNameToStore = $filename.'_'.time().'.'.$extention;
//            $path = $request->file('photo')->storeAs('public/images/', $fileNameToStore);
            $file = Input::file('photo');
            $file->move(public_path().'/uploads',$file->getClientOriginalName());
            $url = URL::to("/").'/uploads/'.$file->getClientOriginalName();
        } else {
            $url = 'public/uploads/noimage.jpg';
        }
//        dd($request->get('product_name'));
        $user = new User([
            'user_name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_phone'=> $request->get('user_phone'),
            'details'=> $request->get('details'),
            'password'=> mt_rand(1000, 9999),
            'commercial_register'=> $url,
            'user_role'=> 1 ,
          ]);
          $user->save();
          return view('registrated', ['user_name' =>$user->user_name]);
    }

}

