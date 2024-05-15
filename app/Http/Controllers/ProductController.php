<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.product.index', compact('categories'));
    }
    public function insert(Request $request)
    {
        if(!$request->product_discounted_price){
            $product_discounted_price = $request->product_regular_price;
        }
        else{
            $product_discounted_price = $request->product_discounted_price;
        }
        if($request->product_discounted_price > $request->product_regular_price){
            return back()->with('regular_price_error', 'Discounted Price Can not be higher than Regular Price');
        }
        else{
            $product_id = Product::insertGetId([
                'category_id' => $request -> category_id,
                'product_name' => $request -> product_name,
                'product_short_description' => $request -> product_short_description,
                'product_long_description' => $request -> product_long_description,
                'product_regular_price' => $request -> product_regular_price,
                'product_discounted_price' => $product_discounted_price,
                'product_additional_information' => $request -> product_additional_information,
                'product_quantity' => $request -> product_quantity,
                'created_at' => Carbon::now()
            ]);
            if($request->hasFile('product_thumbnail_photo')){
             // store the photo in a variable
            $product_thumbnail_photo = $request->file('product_thumbnail_photo');
            // create neew name of the photo
            $new_name = Str::slug($request->category_id)."-". Str::slug($request -> product_name).Str::random(5).".". $product_thumbnail_photo->getClientOriginalExtension();
            // create new upload link
            $link = base_path('public/uploads/product_photos/product_thumbnail_photos/'. $new_name);
            // upload via image intervention
            Image::make($product_thumbnail_photo)->resize(800, 609)->save($link);

            // update to the database
             Product::find($product_id)->update([
             'product_thumbnail_photo' => $new_name
             ]);
             return back()->with('product_add', 'Product Added successfully!');
        }


        }


    }
}
