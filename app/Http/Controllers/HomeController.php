<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\UserNotification;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $categories = 
        // $produk = Product::all();
        $data = array('title' => 'Home');
        $notif = "";
        if(auth()->check()){
            $notif = UserNotification::where('notifiable_id', auth()->user()->id)->get();
        }
        $datas= Product::where('status', 1)->get();
        // $datas =DB::Table('products')->join('product_images','products.id','=','product_images.product_id')
        // ->select('products.*','product_images.image_name');
      
        return view('transaksi.home')->with(compact('data', 'datas', 'notif'));
    }

    public function detailProduct($id){
        $data = Product::find($id);
     $product_review = ProductReview::where('product_id', '=', $id)->get();
        $gambar_product = DB::Table('product_images')->where('product_id',$id)->first();
        // return $product_review;
        return view('transaksi.product-details',compact('data','gambar_product', 'product_review'));
    }
}
