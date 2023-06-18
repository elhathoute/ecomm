<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;
//model profile 
use App\Models\Profiles;

class RegisterController extends Controller
{
    //
    public function register_user(Request $request){
        $request->validate([
            'username'=>'required|min:4|max:15|alpha|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:20',
            'password__confirm'=>'required|same:password',
            'phone_number'=>'required|numeric|digits:10'
        ]);
        //ORM for save data
        //dd($request->all());

         $res=User::create([
             'username'=>$request->input('username'),
             'email'=>$request->input('email'),
             'password'=>Hash::make($request->input('password')),
             'phone'=>$request->input('phone_number')
         ]);
        
        $profile=Profiles::create([
            'user_id'=>$res->id,
            'name'=>$request->input('username'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone_number'),
            'status'=>1,
            'street'=>'',
            'city'=>4,
            'state'=>'',
            'country'=>2,
            'address'=>'',
            'address2'=>'',
            'province'=>'',
            'twitter'=>'',
            'facebook'=>'',
            'linkedin'=>'',
            'instagram'=>'',
            'zip'=>'',
            'phone'=>'',
            'fname'=>'',
            'lname'=>'',
            
        ]);

        if($res){
            //create session has user data
            Session::put('user',$res);
            //create session has user id
            Session::put('loginId',$res->id);
            return redirect()->route('home');

        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
    }
}
