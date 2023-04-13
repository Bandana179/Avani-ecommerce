<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomUser;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Product;
use Session;

class CustomesUserController extends Controller
{
    public function login(){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['categories', 'subcategories','childcategories','products','sub']);
         view()->composer(
            'inc.navbar',
            function ($view) {
                $categories=Category::all();
                $subcategories=SubCategory::all();
                $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
                $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
                $data=compact(['categories', 'subcategories','childcategories','products']);
                $view->with('data', $data);
            }
        );
        view()->composer(
            'inc.footer',
            function ($view) {
                $sub=ChildCategory::limit(10)->get();
                $data=compact(['sub']);
                $view->with('data', $data);
            }
        );

           return view('pages.login')->with($data);

    }
    public function register(){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['categories', 'subcategories','childcategories','products','sub']);
        view()->composer(
            'inc.navbar',
            function ($view) {
                $categories=Category::all();
                $subcategories=SubCategory::all();
                $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
                $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
                $data=compact(['categories', 'subcategories','childcategories','products']);
                $view->with('data', $data);
            }
        );
        view()->composer(
            'inc.footer',
            function ($view) {
                $sub=ChildCategory::limit(10)->get();
                $data=compact(['sub']);
                $view->with('data', $data);
            }
        );
        return view('pages.register')->with($data);
    }

    public function check(Request $request)
    {
        // return $request->input();
        // validate request
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);

        $userInfo = CustomUser::where('email','=',$request->email)->first();

        // return $userInfo;

        if(!$userInfo){
            return back()->with('success','We do not reconigize your email address');
        }else{
            // check password
            if(Hash::check($request->password,$userInfo->password)){
                // $request->session()->put('LoggedUser',$userInfo->id);
                if($userInfo->is_admin=='1'){
                    $request->session()->put('admin_session', $userInfo->id);
                    $request->session()->put('admin_name', $userInfo->full_name);
                    $request->session()->put('email', $userInfo->email);
                    return redirect('admin/dashboard');
                }else if($userInfo->is_admin=='0'){
                    $request->session()->put('user_session',$userInfo->id);
                    $request->session()->put('user_name', $userInfo->full_name);
                    $request->session()->put('user_email', $userInfo->email);
                    $user=CustomUser::find(session()->get('user_session'));
                    return redirect('user/dashboard');
                }
            }else{
                return back()->with('error','Incorrect Password');
            }
        }
    }


    public function logout(Request $request){
        // if(session()->has('LoggedUser')){
        //     session()->pull('LoggedUser');
        //     return redirect('/');
        $request->session()->flush();

        Auth::logout();

        return redirect('/');
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'full_name'=>'required',
            'phone_number'=>'required',
            'email'=>'required|email|unique:custom_users',
            'password'=>'required|min:5|max:12',
            'confirm_password'=>'required'
        ]);
        // insert data into database
        $user = new CustomUser;
        $user->full_name = $request->full_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save){
            return back()->with('success','User Register to Avani Nepal');
        }else{
            return back()->with('fail','something went wrong. try again later');
        }
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
    public function updateprofile($id, Request $request){
        $user=CustomUser::find($id);
        $userpass=$user->password;
        $user->full_name=$request->full_name;
        $user->phone_number=$request->phone;
        $user->email=$request->email;
        if(empty($request->password)&& is_null($request->password)){
            $user->password=$userpass;
        }
        else{
            $user->password=Hash::make($request->password);
        }
        $save=$user->save();
        if($save){
            return back()->with('success','User data updated');
        }

    }
}
