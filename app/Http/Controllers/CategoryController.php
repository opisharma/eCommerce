<?php

namespace App\Http\Controllers;

use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.category.index', compact('categories'));
    }

    public function insert(Request $request)
    {
        if (isset($request->is_top_category)) {
            $is_top_category = "yes";
        }
        else {
            $is_top_category = "no";
        }
         // store the photo in a variable
         $category_photo = $request->file('category_photo');
         // create neew name of the photo
         $new_name = Str::slug($request->category_name)."-".Str::random(5).".". $category_photo->getClientOriginalExtension();
         // create new upload link
         $link = base_path('public/uploads/category_photos/'. $new_name);
         // upload via image intervention
         Image::make($category_photo)->resize(200, 256)->save($link);

         Category::insert([
            'category_name' => $request->category_name,
            'category_photo' => $new_name,
            'is_top_category' =>  $is_top_category,
            'created_at' => Carbon::now()
         ]);
         return back()->with('success', 'Category Added Successfully!');
    }
    public function deletecategory ($id)
    {
        category::find($id)->delete();
        return back();
    }
    public function edit($id)
    {
        $category = Category::find($id);
      return view('dashboard.category.edit', compact('category'));
    }
    public function update($id, Request $request)
    {

        if (isset($request->is_top_category)) {
            $is_top_category = "yes";
        }
        else {
            $is_top_category = "no";
        }

        category::find($id)->update([

            'category_name' => $request->category_name,
            'is_top_category' => $is_top_category,

        ]);

        if ($request->hasFile('category_photo')) {
            $current_photo_name = category::find($id)->category_photo;
            $current_photo_location = base_path('public/uploads/category_photos/'. $current_photo_name);
            unlink($current_photo_location);
            // store the photo in a variable
            $category_photo = $request->file('category_photo');
            // create neew name of the photo
            $new_name = Str::slug($request->category_name)."-".Str::random(5).".". $category_photo->getClientOriginalExtension();
            // create new upload link
            $link = base_path('public/uploads/category_photos/'. $new_name);
            // upload via image intervention
            Image::make($category_photo)->resize(200, 256)->save($link);

           category::find($id)->update([

            'category_photo' => $new_name
        ]);
        }
        return back();
    }

}
