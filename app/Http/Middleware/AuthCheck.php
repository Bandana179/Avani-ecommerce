<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\CustomUser;

class AuthCheck
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
        // for protected route
        // if(!session()->has('user_session')&&($request->path() != 'account/login' && $request->path() != 'account/register')){
        //     return redirect('account/login')->with('error','You must be logged in');
        // }
        // for protected link
        // if(session()->has('user_session') && ($request->path() == 'account/login' || $request->path() == 'account/register' ) ){
        //     return back();
        //     // $data = CustomUser::where('id','=',session('user_session'))->first();
        //     // if($data->is_admin == '0'){
        //     //     return redirect('user/dashboard');
        //     //     return back();
        //     // }else if($data->is_admin == '1'){
        //     //     return back();
        //     //     return redirect('admin/dashboard');
        //     // }
        // }
        if(session()->has('user_session'))
        {
            return $next($request);
        }
        else
        {
            return back();
            // return redirect('account/login')->with('error','You must be logged in');
        }

        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
