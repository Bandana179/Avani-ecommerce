<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Product;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
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
        $categories = Category::all();
        $subcategories=SubCategory::all();
        $subtable = Category::Join("sub_categories","categories.id",'=','sub_categories.category_id')
            ->get(["categories.*","sub_categories.id as sub_id","sub_categories.sub_category_name"]);
        $data=compact(['categories', 'subcategories','childcategories','products','subtable', 'sub']);
        return view('pages.admin.subcategory')->with($data);
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
        $subcategory=new SubCategory;
        $subcategory->uuid=rand();
        $subcategory->category_id=$request->category_id;
        $category=Category::find($request->category_id);
        $subcategory->sub_category_name=$request->sub_category.'('.$category->category_name.')';
        $save=$subcategory->save();
        if($save){
            return back()->with('success','SubCategory Added');
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
        $subcategory=SubCategory::find($id);
        $subcategory->sub_category_name=$request->sub_category;
        $subcategory->category_id=$request->category_id;
        $result=$subcategory->save();
        if($result){
            // return back()->with('success','SubCategory Updated');
            return redirect('/admin/dashboard/sub-category')->with('success','Sub Category updated');
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
        $subcategory=SubCategory::find($id);
        $subcategory->delete();
        return back()->with('success','SubCategory Deleted');
    }

    public function  updatepage($id){
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
        $subcategory=SubCategory::find($id);
        $category=Category::find($subcategory->category_id);
        $category_name=$category->category_name;
        $categories=Category::all();
        $data=compact(['subcategory', 'categories','category_name','subcategories','childcategories','products','sub']);
        return view('pages.admin.subcategoryupdate')->with($data);


    }
}
