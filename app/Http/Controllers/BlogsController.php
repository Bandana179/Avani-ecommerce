<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\CustomUser;
use Session;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Product;
class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
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
        $sub=ChildCategory::limit(10)->get();
        $blogs=Blog::where('blog_status', 'publish')->get();
        $data=compact(['categories', 'subcategories','childcategories','products','blogs', 'sub']);
        return view('pages.blog.blog')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
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
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['categories', 'subcategories','childcategories','products', 'sub']);
        return view('pages.blog.addBlog')->with($data);
    }

    public function blogDetail($id){
        $blog=Blog::find($id);
        $blogs=Blog::limit(5)->get();
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
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
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['categories', 'subcategories','childcategories','products','blog', 'blogs','sub']);
        return view('pages.blog.blogDetail')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(session()->has('user_session')||session()->has('admin_session'))
        {
            $blog=new Blog;
            if(session()->has('user_session')){
             $blog->user_id=Session::get('user_session');
             $user=CustomUser::find(Session::get('user_session'));
             $blog->user_name=$user->full_name;
            }
            else{
                $blog->user_id=Session::get('admin_session');
                $user=CustomUser::find(Session::get('admin_session'));
                $blog->user_name=$user->full_name;

            }
            $blog->blog_title=$request->title;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $allowedfileExtension=['gif','jpg','png','jpeg'];
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = $file->getClientOriginalName();
                $check=in_array($extension,$allowedfileExtension);
                if($check){
                 $file->storeAs('public/uploads/blogs',$filename);
                 $file->move('uploads/blogs', $filename);
                 }
                 $blog->blog_image=$filename;
            }
            $blog->blog_description=$request->description;
            $blog->blog_status="publish";
            $blog->blog_date=date("jS  F Y ");
            $save=$blog->save();
            if($save){
                return redirect()->back()->with('success','Blog Added Success');
            }

        }
        else{

            return redirect()->back()->with('success','You must login first');
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
        $blog=Blog::find($id);
        $blog->delete();
        return back()->with('success','blog deleted');
    }
    public function listBlog(){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();

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
        $sub=ChildCategory::limit(10)->get();
        $blogs=Blog::all();
        $data=compact(['categories', 'subcategories','childcategories','products','blogs', 'sub']);
        return view('pages.admin.blog')->with($data);
    }
}
