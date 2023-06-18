<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use App\Models\User;
                    
class authAdmin

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::has('user')){
            $user=User::find(Session()->get('user')->id);
            //if user connect is admin 
            if($user){
                if($user->utype==='ADM'){return $next($request);}
                else{return redirect()->route('home');}
            }
            else{return redirect()->route('login');}
        }else{return redirect()->route('home');}
    }
}
