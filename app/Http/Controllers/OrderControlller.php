<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\CustomUser;
use App\Models\Order;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Session;

class OrderControlller extends Controller
{
    public function orderstore(Request $request){
        if(session()->has('user_session')){
            $userid=Session::get('user_session');
//            dd($request->all());
            $order=new Order;
            $order->order_number=rand();
            $order->user_id=$userid;
            $order->shipping_email=$request->get(value('shipping_email'));
            $order->shipping_phone=$request->get(value('shipping_phone'));
            $order->shipping_address=$request->get(value('shipping_address'));
            $order->order_payment_method=$request->get(value('order_payment_method'));
            $order->cart_items=$request->get(value('cart_items'));
            $order->items_price=$request->get(value('items_price'));
            $order->payment_status=0;
            $order->delivery_charge=$request->get(value('delivery_charge'));
            $order->total_price=$request->get(value('total_price'));
            $order->status=0;
            $order->save();
            $user=CustomUser::find($userid);
            $categories=Category::all();
            $subcategories=SubCategory::all();
            $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
            $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
            $sub=ChildCategory::limit(10)->get();
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
            $data=compact('user', 'order','categories','subcategories', 'childcategories','products', 'sub');
            return  view('pages.checkoutProcess.order')->with($data);


        }
        else{
            return redirect('/account/login');
        }
    }

    public function detail($id){
        $order=Order::find($id);
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories =\App\Models\ChildCategory::with(['category','subcategory'])->get();
        $products=\App\Models\Product::with(['category','subcategory','childcategory'])->get();
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['categories', 'subcategories','childcategories','products','sub', 'order']);
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
        return view('pages.checkoutprocess.order')->with($data);

    }
    public function index(){
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
        $orders=Order::where('shipping_email', '!=', 'shipping_email')->get();
        $sub=ChildCategory::limit(10)->get();
        $data=compact(['orders','categories', 'subcategories','childcategories','products','sub']);
        return view('pages.admin.order.order')->with($data);
    }
    public  function changeorderstatus($id){
        $order=Order::find($id);
        $order->payment_status=1;
        $order->status=1;
        $order->save();
        return redirect()->back()->with('success', 'status changed success');
    }
}
