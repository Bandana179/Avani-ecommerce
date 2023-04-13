<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;

class ChildCategoriesController extends Controller
{
    public function index(){
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
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories = \App\Models\ChildCategory::with(['category','subcategory'])->get();
        $data=compact(['categories', 'subcategories','childcategories', 'sub']);
        return view('pages.admin.childcategory')->with($data);

    }
    public function addchildcategory(Request $request){
        $childcategory=new ChildCategory;
        $childcategory->uuid=rand();
        $childcategory->child_category_name=$request->child_category_name;
        $childcategory->category_id=$request->category_id;
        $childcategory->subcategory_id=$request->subcategory_id;
        $result=$childcategory->save();
        if($result){
            return back()->with('success','ChildCategory Added Success');
        }
}

    public function delete($id){
        $childcategory=ChildCategory::find($id);
        $childcategory->delete();
        return back()->with('success','ChildCategory Deleted');

    }
    public function edit($id){
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
        $childcategory=ChildCategory::find($id);
        $category=Category::find($childcategory->category_id);
        $category_name=$category->category_name;
        $subcategory=SubCategory::find($childcategory->subcategory_id);
        $subcategory_name=$subcategory->sub_category_name;
        $categories=Category::all();
        $data=compact(['sub', 'category_name', 'subcategory_name','categories', 'subcategories', 'childcategory','categories','childcategories','products']);
        return view('pages.admin.updatechildcategory')->with($data);
    }

    public function update(Request $request, $id){
        $childcategory=ChildCategory::find($id);
        $childcategory->child_category_name=$request->child_category_name;
        $childcategory->category_id=$request->category_id;
        $childcategory->subcategory_id=$request->subcategory_id;
        $result=$childcategory->save();
        if($result){
            return redirect('/admin/dashboard/child-category')->with('success','Category updated');
        }
    }
}
