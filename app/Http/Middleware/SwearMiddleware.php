<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class SwearMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $users=User::all();
        foreach ($users as $user){
            echo $user->name;
            if (strstr($request->name,$user->name)){
                return  redirect()->back()->withInput()-> withErrors(['error'=> 'Negalima naudoti vartotoju vardu']);
            }
        }

       // $request->name= str_replace('po velniais','po v****',$request->name );
        /*
        if (strstr($request->name, 'po velniais')){
            return  redirect()->back()->withInput()-> withErrors(['error'=> 'Tekste yra keiksmažodžių']);
        }
        */
        //        $request->name="CIA IS MIDDLEWARE";
        return $next($request);
    }
}
