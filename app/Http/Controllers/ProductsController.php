<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Review;
use App\Models\CustomUser;
use Session;
use DB;

class ProductsController extends Controller
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
        $childcategories=ChildCategory::all();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['categories', 'subcategories','childcategories', 'products','sub']);
        view()->composer(
            'inc.footer',
            function ($view) {
                $sub=ChildCategory::limit(10)->get();
                $data=compact(['sub']);
                $view->with('data', $data);
            }
        );

        return view('pages.admin.product.listProduct')->with($data);
    }
    public function productlistbycategory($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories=ChildCategory::all();
        $products=Category::find($id)->product;
        return ["Result"=> $products];

    }
    public function activeproductlist(){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories=ChildCategory::all();
        $products=Product::where('product_status', 'Active')->get();
        return ["Result"=> $products];
    }
    public function inactiveproductlist(){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories=ChildCategory::all();
        $products=Product::where('product_status', 'Inactive')->get();
        return ["Result"=> $products];
    }

    public function addProductPage()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories=ChildCategory::all();
        view()->composer(
            'inc.footer',
            function ($view) {
                $sub=ChildCategory::limit(10)->get();
                $data=compact(['sub']);
                $view->with('data', $data);
            }
        );
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['categories','subcategories','childcategories','sub']);
        return view('pages.admin.product.product')->with($data);
    }

    public function productDetail(){
        return view('pages.admin.product.productDetail');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new Product;
        $product->uuid=rand();
        $product->category_id=$request->category_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->child_category_id=$request->childcategory_id;
        $product->product_name=$request->product_name;
        $product->product_description=$request->product_description;
        if ($request->hasfile('product_image')) {
            $file = $request->file('product_image');
            $allowedfileExtension=['gif','jpg','png','jpeg'];
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $file->getClientOriginalName();
            $check=in_array($extension,$allowedfileExtension);
            if($check){
             $file->storeAs('public/uploads/product_image',$filename);
             $file->move('uploads/product_image', $filename);
             }
             $product->product_image=$filename;
        }

        $product->product_price=$request->product_price;
        $files = [];
        if ($request->hasfile('file_upload')) {
            $allowedfileExtension=['pdf','jpg','png','jpeg'];
            foreach($request->file('file_upload') as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $check=in_array($extension,$allowedfileExtension);
            if($check){
                $file->storeAs('public/uploads/product_other_image',$filename);
                $file->move('uploads/product_other_image', $filename);
                $files[] = $filename;
        }
    }
   }
        $file=implode(',', $files);
        $product->other_images=$file;
        $product->product_status="Active";
        $product->product_feature=$request->product_feature;
        $product->product_date=date("jS  F Y ");
        $result=$product->save();
        if($result){
            return back()->with('success','Product Added Success');
        }
        }

    public function setfeature($id)
    {
        $product=Product::find($id);
       if($product->product_feature=="featured"){
          $prostatus= DB::table('products')
                    ->where('id', $id)
                    ->update([
                    'product_feature'=> "not featured"
                    ]);

        if($prostatus)
        {
            return back()->with('success','Status Changed');
        }
       }
       else{
        $prostatus= DB::table('products')
        ->where('id', $id)
        ->update([
        'product_feature' => "featured"
        ]);
        if($prostatus)
        {
            return back()->with('success','Status Changed');
        }
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
        $product=Product::find($id);
        $category=Category::find($product->category_id);
        $category_name=$category->category_name;
        $subcategory=SubCategory::find($product->subcategory_id);
        $subcategory_name=$subcategory->sub_category_name;
        $childcategory=ChildCategory::find($product->child_category_id);
        $childcategory_name=$childcategory->child_category_name;
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories=ChildCategory::all();
        view()->composer(
            'inc.footer',
            function ($view) {
                $sub=ChildCategory::limit(10)->get();
                $data=compact(['sub']);
                $view->with('data', $data);
            }
        );
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['sub', 'product','category_name','subcategory_name','childcategory_name','categories','subcategories','childcategories']);
        return view('pages.admin.product.updateproduct')->with($data);

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
        $product=Product::find($id);
        $product->category_id=$request->category_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->child_category_id=$request->childcategory_id;
        $product->product_name=$request->product_name;
        $product->product_description=$request->product_description;
        if ($request->hasfile('product_image')) {
            $file = $request->file('product_image');
            $allowedfileExtension=['gif','jpg','png','jpeg'];
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $file->getClientOriginalName();
            $check=in_array($extension,$allowedfileExtension);
            if($check){
             $file->storeAs('public/uploads/product_image',$filename);
             $file->move('uploads/product_image', $filename);
             }
             $product->product_image=$filename;
        }

        $product->product_price=$request->product_price;
        if ($request->hasfile('file-upload')) {
            $file = $request->file('file-upload');
            $allowedfileExtension=['gif','jpg','png','jpeg'];
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $file->getClientOriginalName();
            $check=in_array($extension,$allowedfileExtension);
            if($check){
             $file->storeAs('public/uploads/product_other_image',$filename);
             $file->move('uploads/product_other_image', $filename);

        }
        $product->other_image=$filename;
       }
       $result=$product->save();
       if($result){
        return back()->with('success','Product Updated');
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
        $product=Product::find($id);
        $product->delete();
        return back()->with('success','Product Deleted');
    }

    public function changestatus($id){
       $product=Product::find($id);
       if($product->product_status=="Active"){
          $prostatus= DB::table('products')
                    ->where('id', $id)
                    ->update([
                    'product_status'=> "Inactive"
                    ]);

        if($prostatus)
        {
            return back()->with('success','Status Changed');
        }
       }
       else{
        $prostatus= DB::table('products')
        ->where('id', $id)
        ->update([
        'product_status' => "Active"
        ]);
        if($prostatus)
        {
            return back()->with('success','Status Changed');
        }
       }
    }
    public function postreview($id, Request $request){
        if(session()->has('user_session'))
        {
            $review=new Review;
            $review->user_id=Session::get('user_session');
            $user=CustomUser::find(Session::get('user_session'));
            $review->user_name=$user->full_name;
            $review->product_id=$id;
            $review->review=$request->rating_description;
            $review->rating=$request->rating_id;
            $review->status=1;
            $save=$review->save();
            if($save){
                return back()->with('success','Review sent success');
            }
             }
          else{
            return redirect('/account/login');
        }

}
public function checkout(){
    if(session()->has('user_session'))
    {
        echo "hello";
        return ["Result"=>"Proceed to checkout"];

    }
    else{
        echo "hi";
        return redirect('/account/login');

    }
}
}
