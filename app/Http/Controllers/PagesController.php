<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\CustomUser;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Review;
use App\Models\Banner;
use App\Models\Blog;
use Session;

class PagesController extends Controller
{
    public function index(){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        // $childcategorieshair= ChildCategory::where('category_id', '2')->where('subcategory_id', '1')->get();
        // $childcategories = ChildCategory::where('category_id', '2')->where('subcategory_id', '1')->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
        $products_list = Product::orderBy('id','DESC')->limit(8)->get();
        $featured_products=Product::where('product_feature', 'featured')->get();
        $banners=Banner::where('ispublished', 1)->where('banner_type', 'Main Banner')->get();
        $bannerfirst=Banner::where('ispublished', 1)->where('banner_type', 'first banner')->get();
        $bannersecond=Banner::where('ispublished', 1)->where('banner_type', 'Second banner')->get();
        $blogs=Blog::where('blog_status', 'publish')->get();
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['categories', 'subcategories', 'sub',  'childcategories','products','products_list','banners','featured_products','bannerfirst','bannersecond','blogs']);

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
        return view('pages.index')->with($data);

    }
    public function productDetail($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
        $product=Product::find($id);
        $reviews=Review::where('product_id', $id)->get();
        $similarproducts=Product::where('category_id', $product->category_id)->get();
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['sub' , 'product', 'reviews', 'similarproducts', 'categories', 'subcategories', 'childcategories','products']);
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
        return view('pages.productDetail')->with($data);
    }


    public function collection($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
        $sub=ChildCategory::limit(10)->get();
        $childcatcollection=ChildCategory::find($id)->product;
        $childcat=ChildCategory::find($id);
        $childcatname=$childcat->child_category_name;
        $data=compact(['sub','categories', 'subcategories','childcategories','products','childcatcollection','childcatname']);
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

        return view('pages.collection')->with($data);
    }

    public function about(){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['sub','categories', 'subcategories','childcategories','products']);
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
        return view('pages.about')->with($data);
    }
    public function userDashboard(){
        $user=CustomUser::find(session()->get('user_session'));
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $orders=Order::where('user_id', $user->id)->where('shipping_email', '!=' ,'shipping_email')->get();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['sub','categories', 'subcategories','childcategories','products','user', 'orders']);
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
        return view('pages.userDashboard')->with($data);
    }
    public function adminDashboard(){
        // $data = ['LoggedUserInfo'=>CustomUser::where('id','=',session('LoggedUser'))->first()];
        // return $data;
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $usercount=CustomUser::count();
        $orders_count=Order::count();
        $product_count=Product::count();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['categories', 'subcategories','childcategories','products','sub', 'usercount', 'orders_count', 'product_count']);
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
        return view('pages.admin.adminDashboard')->with($data);
    }

    public function user(){
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
        $users=CustomUser::all();
        $data=compact(['categories', 'subcategories','childcategories','products', 'users','sub']);
        return view('pages.admin.user')->with($data);
    }

    public function cart(){
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
        return view('pages.cart')->with($data);
    }




}
