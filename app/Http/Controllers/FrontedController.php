<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontedController extends Controller
{
    function index(){
        $top_categories = Category::where('is_top_category', 'yes')->get();
        $products = Product::latest()->limit(6)->get();
        return view('frontend.index', compact('top_categories', 'products'));
    }

    function about(){
        return view('about',);
    }
    function productdetails($product_id){

        $product = Product::find($product_id);
        return view('frontend.productdetails', compact('product',));
    }

    function contact(){
        return view('contact');
    }

    function contactpost(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success_message', 'Message send successfuly');
    }

    function team(){
        return view('team');
    }

    function services(){
        return view('services');
    }
}
