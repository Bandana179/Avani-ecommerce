<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use DB;

class BannersController extends Controller
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
        $banners=Banner::all();
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['banners','categories', 'subcategories','childcategories','products','sub']);
        return view('pages.admin.banner.listBanner')->with($data);
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
        $products=Product::all();
        $bannerfirst=Banner::where('banner_type', 'first Banner')->count();
        $bannersecond=Banner::where('banner_type', 'Second Banner')->count();
        $data=compact(['products','bannerfirst','bannersecond','categories', 'subcategories','childcategories','sub']);
        return view('pages.admin.banner.addBanner')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner=new Banner;
        $banner->banner_type=$request->banner_type;
        $banner->product_id=$request->product_id;
        $product=Product::find($request->product_id);
        $banner->product=$product->product_name;
        $banner->url="http://127.0.0.1:8000/product/".$request->product_id;
        if ($request->hasfile('product_image')) {
            $file = $request->file('product_image');
            $allowedfileExtension=['gif','jpg','png','jpeg'];
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $file->getClientOriginalName();
            $check=in_array($extension,$allowedfileExtension);
            if($check){
             $file->storeAs('public/uploads/banners',$filename);
             $file->move('uploads/banners', $filename);
             }
             $banner->image=$filename;
        }
        $banner->ispublished=1;
        $result=$banner->save();
        if($result){
            return back()->with('success','banner Added Success');
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
    public function updatestatus($id){
        $banner=Banner::find($id);
        if($banner->ispublished==1){
           $bannerstatus= DB::table('banners')
                     ->where('id', $id)
                     ->update([
                     'ispublished'=>0
                     ]);

         if($bannerstatus)
         {
             return back()->with('success','Status Changed');
         }
        }
        else{
            $bannerstatus= DB::table('banners')
            ->where('id', $id)
            ->update([
            'ispublished'=>1
            ]);
         if($bannerstatus)
         {
             return back()->with('success','Status Changed');
         }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
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
        $banner=Banner::find($id);
        $products=Product::all();
        $data=compact(['banner', 'products','categories', 'subcategories','childcategories','sub']);
        return view('pages.admin.banner.updatebanner')->with($data);
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
     $banner=Banner::find($id);
     $banner->banner_type=$request->banner_type;
     $banner->product_id=$request->product_id;
     $product=Product::find($request->product_id);
     $banner->product=$product->product_name;
     $banner->url="http://127.0.0.1:8000/product/".$request->product_id;
     if ($request->hasfile('product_image')) {
         $file = $request->file('product_image');
         $allowedfileExtension=['gif','jpg','png','jpeg'];
         $extension = $file->getClientOriginalExtension(); // getting image extension
         $filename = $file->getClientOriginalName();
         $check=in_array($extension,$allowedfileExtension);
         if($check){
          $file->storeAs('public/uploads/banners',$filename);
          $file->move('uploads/banners', $filename);
          }
          $banner->image=$filename;
     }
     $banner->ispublished=1;
     $result=$banner->save();
     if($result){
        return back()->with('success','banner Updated Success');
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner=Banner::find($id);
        $banner->delete();
        return back()->with('success','banner deleted Success');
    }
}
